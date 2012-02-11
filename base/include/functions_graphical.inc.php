<?php

/*
*  Copyright (C) 2002-2007 JiM / aEGIS and the phpGraphy DevTeam
*
*  This program is free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2, or (at your option)
*  any later version.
*
*  This program is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  You should have received a copy of the GNU General Public License
*  along with this program; if not, write to the Free Software
*  Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
*
* $Id: functions_graphical.inc.php 422 2007-12-18 12:38:33Z jim $
*
*/

/**
 * Resize an image using either ImageMagick or GD
 * Return true if new image has been successfully generated, otherwise return false
 * When generating a thumbnail (as opposed to generating a lowresolution picture),
 * you can specify to generate square ones by using configuration directives.
 */
function convert_image($sourcepic, $destpic, $res="800x600", $quality=60)
{

  global $config, $handled_image_types_preg;

  // Is this a thumbnail or lowres ?
  if ($res == $config['thumb_res']) {

    // Two specificities for thumbs: square mode and removal of every embeded profile
    $mode = 'thumbnail';
    if ($config['thumb_aspect'] == 'square') $square_mode = true; else $square_mode = false;

  } else {

    // Force no square
    $mode = 'lowres';
    $square_mode = NULL;

  }

  
  if (!preg_match($handled_image_types_preg, $sourcepic)) {

    trigger_error('convert_image(): "'.$sourcepic.'" is not an handled picture type', ERROR);
    return false;

  }

  if (!is_file($sourcepic)) {

  	if ($config['debug_mode'] >= 2) 
        trigger_error("convert_image(): sourcepic($sourcepic) not found", WARNING);
    return false;

  }

  if (!is_dir(dirname($destpic))) {

    if (!mkdir(dirname($destpic), 0755)) return false; 
    if ($config['default_file_permissions']) chmod(dirname($destpic), $config['default_file_permissions']);

  }

  // No ouput can be made during this process, when $config['debug_mode'] is set to 2, the whole process is logged
  // into a debug.log file located inside your $config['data_dir']

  if($config['use_sem']) wait_convert_proc();


  // Checking if picture is still being modified/uploaded
  if (filemtime($sourcepic) > (time()+2)) {

  	if ($config['debug_mode'] >= 2)
        trigger_error("convert_image(): picture datetime is too recent, aborting process", WARNING);
    return false;

  }

  // If using GD or convert along with square_mode, we need to compute picture's variables
  // This could certainly be optimized/regrouped but at least, I can certify that it's working like this :)
  if (($config['thumb_generator'] == 'convert' && $square_mode) || $config['thumb_generator'] == 'gd') {

        // Getting image dimensions
        list($srcW, $srcH, $type, $attr) = getimagesize($sourcepic);

        $dims = explode("x",$res);
        // Default to square (Might be rescaled after)
        $dstW = $dims[0];
        // Using only the left part of $res in square mode
        if ($square_mode) $dstH = $dims[0]; else $dstH = $dims[1];

        // Calculate new dimensions and/or areas of the source picture to copy
        if ($square_mode && $config['thumb_generator'] == 'gd') {

            // GD crop and copy at the same time

            // Calculate which portion of the picture to copy
            if ($srcW > $srcH) {

                $srcX = ($srcW - $srcH) / 2;
                $srcY = 0;
                // Resize width to match height
                $srcW = $srcH;

            } elseif ($srcW < $srcH) {

                $srcX = 0;
                $srcY = ($srcH - $srcW) / 2;
                // Resize height to match width
                $srcH = $srcW;

            } else {
                // Nothing to do, it's already a square
                $srcX = 0;
                $srcY = 0;
            }

        } elseif ($square_mode && $config['thumb_generator'] == 'convert') {

            // convert resize first and then crop (in a single call but the values of the arguments are completely differents)

            if ($srcW > $srcH) {

                // Calculate picture ratio
                $picratio = $srcW / $srcH;

                // Applying ratio to requested dimensions so that our resized thumbs is ready to be cropped
                $dstH = $dstH;              // Remain the same (won't be cropped)
                $dstW = round($dstW * $picratio);  // Bigger than requested as it'll be cropped 

                // Ok now we've our -geometry values, we need to calculate srcX and srcY for the resized picture
                $srcX = round(($dstW - $dstH) / 2);
                $srcY = 0;

                // Fine, we've all our arguments
                $convert_geometry_args = '-geometry '.$dstW.'x'.$dstH.' -crop '.$dims[0].'x'.$dims[0].'+'.$srcX.'+'.$srcY;

            } elseif ($srcW < $srcH) {

                // Calculate picture ratio
                $picratio = $srcH / $srcW;

                // Applying ratio to requested dimensions so that our resized thumbs is ready to be cropped
                $dstW = $dstW;              // Remain the same (won't be cropped)
                $dstH = round($dstH * $picratio);  // Bigger than requested as it'll be cropped 

                // Ok now we've our -geometry values, we need to calculate srcX and srcY for the resized picture
                $srcX = 0;
                $srcY = round(($dstH - $dstW) / 2);

                // Fine, we've all our arguments
                $convert_geometry_args = '-geometry '.$dstW.'x'.$dstH.' -crop '.$dims[0].'x'.$dims[0].'+'.$srcX.'+'.$srcY;

            } else {
                // Nothing to do, it's already a square
                $srcX = 0;
                $srcY = 0;

                // Using -size as it's faster (but unpredictable when combined with crop)
                $convert_geometry_args = '-size '.$dstW.'x'.$dstH;
            }


        } else {
        
            // Not square_mode, convert doesn't need those variables but GD does

            // Common to all cases
            $srcX = 0;
            $srcY = 0;

            if ($srcW > $srcH) {
                // Width is bigger than height
                $dstW=$dims[0];
                $dstH=round($dims[0] * ($srcH / $srcW));
                //$srcW = $srcH;

            } elseif ($srcW < $srcH) {
                // Height is bigger than width
                $dstW=round($dims[1] * ($srcW / $srcH));
                $dstH=$dims[1];
                //$srcH = $srcW;

            }

        }

  }

  //trigger_error('DEBUG: '.__FUNCTION__."(): Computed values are: srcX($srcX) srcY($srcY) srcW($srcW) srcH($srcH) dstW($dstW) dstH($dstH)", DEBUG);

  // Everything should now be ok, let's do the real job !


  if ($config['thumb_generator']=="convert") {
    
    if (!function_exists('exec')) {  
        trigger_error('convert_image(convert): Can not run convert as exec() is disabled', ERROR);
        return false;
    }

    if ($config['thumb_generator_path']) {

        $convert_path = $config['thumb_generator_path'];

    } else {

        $convert_path = 'convert';

    }

    if ($mode == 'thumbnail') {
        // For thumbnails, we remove everything that could save on the final size
        $convert_profile_args = '+profile "*"';
    } else {
        // For lowres, we remove most of the profiles but IPTC (in order to preserve copyright stuff)
        $convert_profile_args = '+profile "exif" +profile "icc" +profile "xmp"';
    }

    if (!$convert_geometry_args) {
        // We don't have any geometry arguments yet, assigning defaults (should not occur when square_mode is enabled)
        // "-resize" or "-geometry" takes 5 sec
        // "-size" takes 1 sec but the size isn't always the requested one
        // "-size" + "-geometry" takes 3 sec and the size is the correct one
        $convert_geometry_args = '-size '.$res.' -geometry '.$res;
    }

    $cmd = $convert_path.' '.$convert_geometry_args.' -quality '.$quality.' '.$convert_profile_args;
    $cmd .= ' '.escapeshellarg($sourcepic).' '.escapeshellarg($destpic);

    if (!exec_cmd($cmd, __FUNCTION__)) {
        trigger_error(__FUNCTION__.'(convert): Error while resizing picture '.$sourcepic, ERROR);
        return false;
    }

    // We're done, exiting
    if (is_file($destpic)) return true; else return false;


  } elseif ($config['thumb_generator']=="gd") {

        trigger_error('DEBUG:convert_image(gd): Generating picture for "'.$sourcepic.'"', DEBUG);

        // Identifying image type
        if (preg_match('/\.(jpg|jpeg)$/i',$sourcepic)) $type = 'jpeg';
        elseif (preg_match('/\.png$/i', $sourcepic))  $type = 'png';
        elseif (preg_match('/\.gif$/i', $sourcepic))  $type = 'gif';
        else {
            debug_image("Unsupported extension !");
            trigger_error(__FUNCTION__.'(gd): Unsupported picture extension "'.$sourcepic.'"', WARNING);
            return false;
        }

        // Special DEBUG, useful on configuration which have an effective memory_limit (tip found on php.net given by yaroukh at gmail dot com)
        if ($config['debug_mode'] > 2 && function_exists('memory_get_usage')) {

            $picture_info = getimagesize($sourcepic);

            $memory_needed = round(($picture_info[0] * $picture_info[1] * $picture_info['bits'] * $picture_info['channels'] / 8 + pow(2, 16)) * 1.65);
            if (function_exists('get_cfg_var')) $memory_limit_hr = get_cfg_var('memory_limit');
            $memory_limit = convert_humanreadable_to_bytes($memory_limit_hr);
            $memory_usage = memory_get_usage();

            if ($memory_limit < ($memory_usage + $memory_needed)) {
                // Ok we need to issue a warning, let's convert to a human readable format (ie: 8M)
                $memory_needed_hr = convert_bytes_to_humanreadable($memory_needed);
                $memory_usage_hr = convert_bytes_to_humanreadable($memory_usage);

                trigger_error('Low memory condition detected, next function might crash - memory_limit('.$memory_limit_hr.') < current_memory_usage('.$memory_usage_hr.') + memory_needed('.$memory_needed_hr.')', WARNING);
            }

        }

        if ($type == 'jpeg') {
            trigger_error('DEBUG:'.__FUNCTION__.'(gd): running imagecreatefromjpeg()', DEBUG);
            $im=imagecreatefromjpeg($sourcepic);
            if (!$im) {
                trigger_error(__FUNCTION__.'(gd): imagecreatefromjpeg() FAILED trying with imagecreatefromstring()', WARNING);
                $im = imagecreatefromstring(file_get_contents($sourcepic));
                if(!$im) trigger_error(__FUNCTION__.'(gd): imagecreatefromstring() FAILED', ERROR);
            }
        } elseif ($type == 'png') {
            trigger_error('DEBUG:'.__FUNCTION__.'(gd): running imagecreatefrompng()', DEBUG);
            if (!$im=imagecreatefrompng($sourcepic)) trigger_error(__FUNCTION__.'(gd): imagecreatefromjpeg FAILED', ERROR);
        } elseif ($type == 'gif') {
            trigger_error('DEBUG:'.__FUNCTION__.'(gd): running imagecreatefromgif()', DEBUG);
            if (!$im=imagecreatefromgif($sourcepic)) trigger_error(__FUNCTION__.'(gd): imagecreatefromjpeg FAILED', ERROR);
        }
        
        if ($im == "") {
            debug_image("Error loading file!");
            trigger_error('convert_image(gd): Unable to load image "'.$sourcepic.'"', ERROR);
            return false;
        }


        
        // Using TrueColor now, it requires GD 2.0.1 or later
        if (!$im2=ImageCreateTrueColor($dstW,$dstH)) {
            trigger_error('convert_image(gd): Unable to create GD image for "'.$sourcepic.'"', ERROR);
            return false;
        }
        
        if (!ImageCopyResampled($im2,$im,0,0,$srcX,$srcY,$dstW,$dstH,$srcW,$srcH)) {
            trigger_error('convert_image(gd): Unable to copy resampled image for "'.$sourcepic.'"', ERROR);
            return false;
        }
        
        if (SAFE_MODE) {
            trigger_error('DEBUG:convert_image(gd): safe_mode is turned on, trying to pre-create the picture', DEBUG);
            if (! $fh=fopen($destpic,'w')) {
                trigger_error('convert_image(gd): failed to pre-create picture "'.$destpic.'"', WARNING);
            }
            fclose($fh);
        }
        
        if ($type == 'jpeg') {
            if (!imagejpeg($im2,$destpic,$quality)) {
                trigger_error('convert_image(gd): Unable to create jpeg image "'.$destpic.'"', ERROR);
                $error = 1;
            }
        } else if ($type == 'png') {
            if (!imagepng($im2,$destpic)) {
                trigger_error('convert_image(gd): Unable to create png image "'.$destpic.'"', ERROR);
                $error = 1;
            }
        } else if ($type == 'gif') {
            if (!imagegif($im2,$destpic)) {
                trigger_error('convert_image(gd): Unable to create gif image "'.$destpic.'"', ERROR);
                $error = 1;
            }
        }

        if (SAFE_MODE && $error) {
            trigger_error('DEBUG:convert_image(gd): Removing pre-created picture "'.$destpic.'"', DEBUG);
            unlink($destpic);
        }

        if ($error) {
            debug_image("Error creating file!");
            return false;
        }

        ImageDestroy($im);
        ImageDestroy($im2);

        // Assuming everything went fine
        return true;

  } // end of gd part

  if($config['use_sem']) end_convert_proc();

}

/**
 * Show debug info in GD image format
 * Used along with convert_image() and GD
 */
function debug_image($str){
    $im = ImageCreate (150, 50); /* Create a blank image */
    $bgc = ImageColorAllocate ($im, 255, 255, 255);
    $tc  = ImageColorAllocate ($im, 0, 0, 0);
    ImageFilledRectangle ($im, 0, 0, 150, 30, $bgc);
    /* Output an errmsg */
    ImageString ($im, 1, 5, 5, $str, $tc);
    ImageJPEG($im);
}

/**
* Rotate image function - rotate_image()
*
* This function take two arguments, a picture name and a rotation
* angle. Besides this it uses a global variable which specifies
* which method to call to handle the rotation. It is just a
* standard API to be called.
*
* @param: string $picname
* @param: int $rotate (1 for 90deg, 2 for 180 deg, 3 for 270)
* @return true|false
*/

function rotate_image($picname, $rotation_value)
{

    global $config;

    $picname_tmp = $picname.".tmp";

    if (! is_file($picname)) {
        trigger_error("Can not open file $picname, please check that the file exists and is readable", E_USER_WARNING);
        return false;
    }

    if (! is_writable(dirname($picname))) {
        trigger_error("Can not write in ".dirname($picname).", aborting", E_USER_WARNING);
        return false;
    }

    if (! is_writable($picname)) {
        trigger_error("Not enough permissions on ".$picname.", aborting", E_USER_WARNING);
        return false;
    }

    if ($rotation_value < 1 || $rotation_value > 3) {
        trigger_error("Incorrect rotation_value, please select a number between 1 and 3", E_USER_WARNING);
        return false;
    }


    // All prior checks have been passed, now preparing the command line (tool dependent)

    switch($config['rotate_tool']) 
    {
        case "exiftran":
            // Translate phpgraphy rotation code to the matching exiftran argument
            if ($rotation_value == 1) $rotation_arg = "-9";
            elseif ($rotation_value == 2) $rotation_arg = "-1";
            elseif ($rotation_value == 3) $rotation_arg = "-2";

            // Set defaults if not specified
            if (!$config['rotate_tool_path']) $config['rotate_tool_path'] = "exiftran";
            if (!$config['rotate_tool_args']) $config['rotate_tool_args'] = "-p";

            $cmd=$config['rotate_tool_path']." ".$rotation_arg." -i ".$config['rotate_tool_args']." ".escapeshellarg($picname)." -o ".escapeshellarg($picname_tmp);

            break;

        case "jpegtran":
            // Translate phpgraphy rotation code to the matching jpegtran argument
            if ($rotation_value == 1) $rotation_arg = "-rotate 90";
            elseif ($rotation_value == 2) $rotation_arg = "-rotate 180";
            elseif ($rotation_value == 3) $rotation_arg = "-rotate 270";

            // Set defaults if not specified
            if (!$config['rotate_tool_path']) $config['rotate_tool_path'] = "jpegtran";
            if (!$config['rotate_tool_args']) $config['rotate_tool_args'] = "-copy all";

            $cmd = $config['rotate_tool_path']." ".$rotation_arg." ".$config['rotate_tool_args']." ".escapeshellarg($picname);
            if (get_os() == "WIN") $cmd .= " "; else $cmd .= " > ";
            $cmd .= escapeshellarg($picname_tmp);

            break;

    }

    // Common part for both exiftran and jpegtran

    trigger_error("DEBUG: rotate_image(): ".$cmd, DEBUG);
    @exec($cmd);

    if (! is_file($picname_tmp)) {
        trigger_error("Failed to rotate picture ".$picname, ERROR);
        return false;
    }

    if (filesize($picname_tmp) < 10) {
        trigger_error("DEBUG: Result of picture rotation for \"$picname\" is too small, deleting result", DEBUG); 
        unlink($picname_tmp);
        trigger_error("Failed to rotate picture ".$picname, ERROR);
        return false;
    }

    if (! rename($picname_tmp, $picname)) {
        trigger_error("Failed to copy rotated file ".$picname_tmp, ERROR);
        return false;
    }

    // If here, everything should has normally been fine
    return true;

}



/**
 * Calculate size of the to-be-generated thumbnail
 * based on settings from phpGraphy preferences.
 * @param: string $pic_res - Picture resolution using format WxH
 * @param: int $is_movie - When extracting frame from movies, size must be dividable by 2
 *                         This parameter will make sure it is and lower size if necessary
 */
function calculate_thumb_size($pic_res, $is_movie = 0) {

    global $config;

    if ($config['thumb_aspect'] == 'square') {
        return $config['thumb_res'];
    }

    list($srcW, $srcH) = explode("x", $pic_res);
    list($dstW, $dstH) = explode("x", $config['thumb_res']);

    if ($srcW > $srcH) {
        // Width is bigger than height
        $dstH = (int) round($dstW * ($srcH / $srcW));
    } elseif ($srcW < $srcH) {
        // Height is bigger than width
        $dstW = (int) round($dstH * ($srcW / $srcH));
    }

    if ($is_movie) {
        if (!is_int($dstW / 2)) {
            $dstW--;
        }
        if (!is_int($dstH / 2)) {
            $dstH--;
        }
    }

    return $dstW . 'x' . $dstH;

}

