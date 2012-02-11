<?php
/*
*  Copyright (C) 2004-2007 JiM / aEGIS and the phpGraphy DevTeam
*  Copyright (C) 2000-2001 Christophe Thibault
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
*  $Id: functions_global.inc.php 421 2007-11-30 12:08:38Z oniryx $
*
*/

/*
    Block of functions that used to be inside index.php (will progressively be
    move into others separate functions files)
*/


function set_cookie_login_val($val)
{
    global $error_handler;

    $expiration_date = time()+(3600*24*365*3);
    $domain = HTTP_HOST;

    $error_handler->disableDisplay();

    // I had a lot of problem with both IE/FireFox (under Windows) not accepting cookies with a domain equal to 'localhost', issuing a warning
    if (strstr(HTTP_HOST, 'localhost')) {
        // Changing domain to false in order to increase compatibility
        $domain = false;
        trigger_error(__FUNCTION__.'(): HTTP_HOST is equal to \'localhost\', you webbrowser might not like this kind of cookies, trying a trick', WARNING);
    }

    setcookie("phpGraphyLoginValue",$val,$expiration_date,($path=dirname(SCRIPT_NAME)=='.'?'/':$path),$domain);

    if ($val) trigger_error('DEBUG:Set-Cookie: phpGraphyLoginValue='.$val.'; expires='.date('D, d-M-Y H:i:s', $expiration_date).'; path='.dirname(SCRIPT_NAME).'; domain='.$domain, DEBUG);
    else trigger_error('DEBUG:setcookie("phpGraphyLoginValue")->remove', DEBUG);

    $error_handler->restoreDisplay();
}

function set_cookie_commentname_val($val)
{
  setcookie("phpGraphyVisitorName",$val,time()+(3600*24*365),dirname(SCRIPT_NAME),HTTP_HOST);
}

function get_level($pic)
{

    /*
    Return the absolute level (Inherited) by checking all directory below and return the highest

    The actual way of checking levels is really DB intensive and such, I've added a cache here
    that should give us at least a peformance boost of 50% but the real question is more, would
    it be not better if only the directories were handling security level ? In the meantime,
    this comment will stay here :)

    Added by JiM, 2005-09-28

    */


    static $cache_ar = array();
    static $cache_hit = 0;
    static $cache_miss = 0;

    // Performing a cache check
    if (isset($cache_ar[$pic])) {
        // Cache HIT
        $cache_hit++;
        // echo "HIT:$cache_hit";
        return (int)$cache_ar[$pic];
    } else {
        // Cache MISS
        $cache_miss++;
        // echo "MISS:$cache_miss";
    }

    // The picture fullpath doesn't contain any "/", we'll assume there's no directory below
    if(!strstr($pic,"/")) {
        $l=get_level_db($pic);
        if($l!=0) {
            // Adding to cache
            $cache_ar[$pic] = $l;
            return (int)$l;
        }
        $l2 = get_level_db($pic."/");
        return (int) $l2;
    }

    $l=get_level_db($pic);
    if($l!=0) {
        $cache_ar[$pic] = $l;
        return (int)$l;
    }

    $l2=get_level_db($pic."/");
    if($l2!=0) {
        $cache_ar[$pic."/"] = $l2;
        return (int)$l2;
    }

    $l3 = get_level(substr($pic,0,strrpos($pic,"/")));
    $cache_ar[substr($pic,0,strrpos($pic,"/"))] = $l3;
    return (int)($l3);

}

function get_level_real($pic) {
// Return the real picture/directory level by simply checking the DB)
  if(!strstr($pic,"/")) return (int)get_level_db($pic);
  $l=get_level_db($pic);
  if($l!=0) return (int)$l;
  $l2=get_level_db($pic."/");
  if($l2!=0) return (int)$l2;
  return (int)(get_level_real(substr($pic,0,strrpos($pic,"/"))));
}

function reformat($s)
{
  // ANTI HACK stuff
  if(substr($s,0,1)==".") $s="";
  if(substr($s,0,1)=="/") $s="";
  if($s) $s=stripslashes($s);
  if(strstr(dirname($s),"..")) $s="";
  if(strstr(dirname($s),"./")) $s="";
  if(strstr($s,".thumbs")) $s="";
  if(strstr($s,"/.")) $s="";
  if($s=="." || $s=="./") $s="";
  if($s==".." || $s=="../") $s="";
  return($s);
}

// image convertion functions

function wait_convert_proc() {

  global $sem;

  register_shutdown_function("end_convert_proc");
  $sem=sem_get(31337);
  sem_acquire($sem);

}

function end_convert_proc() {

	global $sem;

  sem_release($sem);
  register_shutdown_function("");

}


/**
 * Generic exec_cmd() function
 * Perform an exec() call but perform additionnal debugging
 * Note that no sanitization is done at this level, it need to be done BEFORE
 */
function exec_cmd($cmd, $calling_function)
{
    global $config;

    if ($config['debug_mode'] >= 2) {
        trigger_error("DEBUG: cmd($cmd) called by $calling_function", DEBUG );
    }

    @exec($cmd,$exec_output,$exec_return);

    if ($exec_return) {

        if ($config['debug_mode'] >= 2) {
            trigger_error("DEBUG: cmd() returncode[".$exec_return."], returnerror[".$exec_output[0]." ".$exec_output[1]."])", DEBUG );
        }
        return false;

    } else return true;

}

function delete_pic($display,$mode=null) {

// Delete a picture from the disk and also its reference in the db
// if $mode == thumb then it only delete the lowres and the thumb of the picture

  global $config;

  if ($mode != "thumb") db_delete_pic($display);
  $filename=$config['pictures_dir'].$display;
  $thumbname=$config['pictures_dir'].dirname($display)."/.thumbs/thumb_".basename($display);
  $lrname=$config['pictures_dir'].dirname($display)."/.thumbs/lr_".basename($display);

  if ($mode != "thumb" && file_exists($filename))
     {
     if (!unlink($filename)) $error=1;
     }

  if (file_exists($thumbname))
     {
     if (!unlink($thumbname)) $error=1;
     }

  if (file_exists($lrname))
     {
     if (!unlink($lrname)) $error=1;
     }

if ($error) return false; else return true;

}


function delete_dir($dir,$delete_error=null) {

    global $config;
    global $txt_admin, $txt_ok, $txt_failed;

    $fulldir=ereg_replace("//","/",$config['pictures_dir']."/".$dir);

    if (!is_dir($fulldir)) return false;
    printf("<div><b>".$txt_admin['Deleting %s']."</b></div>", $fulldir);
    $dh  = opendir($fulldir);
    while (false !== ($filename = readdir($dh))) {

        if ($filename == ".." || $filename == ".") continue;

        $fullpath=ereg_replace("//","/",$fulldir."/".$filename);

        if (!is_writable($fullpath)) {
            printf($txt_admin['Deleting %s'].": ", $fullpath);
	       $fileowner=posix_getpwuid(fileowner($fullpath));
	       printf($txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'], $fileowner[name]);
	       $delete_error++;
	       continue;
	   }

        if (is_dir($fullpath)) {
	       if (!delete_dir($dir."/".$filename,$delete_error)) $delete_error++;
	    } else {
            printf($txt_admin['Deleting %s'].": ", $fullpath);
            if (ereg("\.thumbs", $fulldir) || ereg("\.(jpg|jpeg|gif|png)$", $fulldir)) {
                if (!unlink($fullpath)) {
                    echo $txt_failed."<br />";
                    $delete_error++;
		        } else echo $txt_ok."<br />";
            } else {
	           if (!delete_pic($dir."/".$filename)) {
	               echo $txt_failed."<br />";
                    $delete_error++;
	           } else echo $txt_ok."<br />";
		    }
        }
     }


if (!$delete_error) {
   if (rmdir($fulldir)) return true;
}

return false;
}

function check_welcome($dir) {
// This function need to be run before editing a .welcome file, it's checking if we'll be able to write the file and if not return an error with informations.

  global $config;

  $filename=".welcome";
  $fullpath=ereg_replace("//","/",$config['pictures_dir']."/".$dir."/".$filename);

  if (!is_file($fullpath) && !is_writable(dirname($fullpath))) {
     echo "<div class=\"errormsg\"><b>Aborting</b>, phpGraphy doesn't have enough rights to create a file in this directory, please check the file/directory permissions and reload this page when done</div>";
     return false;
     }

  if (is_readable($fullpath) && !is_writable($fullpath)) {
     echo "<div class=\"errormsg\"><b>Aborting</b>, phpGraphy doesn't have enough rights to modify the .welcome file, please check its permissions and reload this page when done</div>";
     return false;
     }

return true;

}

function read_welcome($dir) {

  global $config;

  $filename=".welcome";
  $fullpath=ereg_replace("//","/",$config['pictures_dir']."/".$dir."/".$filename);

if (!is_readable($fullpath)) return false;

  if ($filecontent=file_get_contents($fullpath))return $filecontent; else return false;

}

/**
 * Write welcome file
 *
 * @param string $dir
 * @param string $welcomedata
 */
function write_welcome($dir,$welcomedata) {

    global $config;

    if (!isset($welcomedata)) {
        trigger_error("DEBUG: Variable \$welcomedata is not set", DEBUG);
        return false;
    }

    trigger_error('DEBUG: Editing .welcome file in '.$dir, DEBUG);

    $filename=".welcome";
    $fullpath=ereg_replace("//","/",$config['pictures_dir'].$dir."/".$filename);

    if (!$welcomedata) { unlink($fullpath); return; }

    $fp=fopen($fullpath,'w');
    if (!$fp) {
     trigger_error('Failed to write in .welcome file.', ERROR);
     return false;
     }
    fputs($fp, stripslashes($welcomedata));
    fclose($fp);
    return true;

}

function display_2d_array($array,$class = null) {

// Input two-dimensions array, output table using optional specified class
// This function convert all HTML contents into HTML entities

if (!is_array($array)) return;

echo "<table class=\"".$class."\">";
$i=0;
foreach ($array as $key => $value) {
  echo "<tr class=\"rowbgcolor";
  if ($i%2) echo 2; else echo 1;
  echo "\"><td>".html_safe($key)."</td><td>".html_safe($value)."</td></tr>\n";
  $i++;
  }
echo "</table>";

}


/**
 * Select a random picture from a directory ressource array as would return get_dir_info()
 * and assign it as directory cover using update_directory_cover()
 * Return true if successful, false if not
 */

function select_random_directory_cover($dir_info_res, $target_dir)
{
    global $config, $phpGraphyNaming, $pgFileTypes;

    $i = 0;

    // Find a picture that we do handle or an already generated video thumb
    while ($i < 100) {

        $random_nb = rand(0,count($dir_info_res));

        if ($pgFileTypes->isImage($dir_info_res[$random_nb]['name'])) {

            $filepath = $dir_info_res[$random_nb]['name'];
            break;

        } elseif ($pgFileTypes->isVideo($dir_info_res[$random_nb]['name'])) {

                $thumbpath = $phpGraphyNaming->getThumbPath($dir_info_res[$random_nb]['name']);

                if (is_file($thumbpath)) {
                    $thumbnail_is_video = 1;
                    $filepath = $thumbpath;
                    break;
                } else unset($thumbpath);

        }
        $i++;
    }

    if (!$filepath) return false;

    // Is this a standard highres picture or an existing directory cover thumb ?
    if (preg_match('/thumb_directory\.jpg$/', $filepath)) {

      $thumbpath = $filepath;

    } elseif ($thumbnail_is_video) {
        // Is this a video's thumb ?

        // Then nothing to do

    } else {

        // Is there already a thumb for it ?
        $thumbpath = $phpGraphyNaming->getThumbPath($filepath);

        if (!is_file($thumbpath)) {
            // Generate a thumb
            if (!convert_image($filepath, $thumbpath, $config['thumb_res'], $config['thumb_quality'])) {
                trigger_error('DEBUG:'.__FUNCTION__.'(): convert_image() returned an error, aborting process', DEBUG);
                return false;
            }
        }

    }

    // Assign it as directory cover (will copy file and update db)

    // Remove pictures_dir as update_directory_cover handle that internally
    $source_thumb = str_replace($config['pictures_dir'], '', $thumbpath);
    // Add a trailing slash to the directory
    $target_dir = $target_dir . '/';

    if (update_directory_cover($target_dir, $source_thumb)) {
        return true;
    } else return false;

}


/**
 * Display an error icon with a link using the provided error code
 */
function print_error_icon($error_code)
{
    global $base_images_dir;

    echo '<a href="http://phpgraphy.sourceforge.net/help.php?error_code='.$error_code.'"><img src="'.$base_images_dir.'help.gif"></a>';

}

/**
 * Update Directory Cover Picture by copying a thumbnail
 * 'source_thumb' is basically the source picture and dir
 * the destination where the directory cover will be created.
 */

function update_directory_cover($target_dir, $source_thumb)
{
    global $config;

    if (trim($source_thumb) == "") return false;

    $src_pic = $config['pictures_dir'] . $source_thumb;
    $dst_pic = $config['pictures_dir'] . $target_dir . DIRECTORY_THUMB_PATH;

    // Remove request detected
    if ($source_thumb == "-remove-") {

        if (!is_file($dst_pic)) {
            trigger_error("DEBUG: Existing directory thumbnail ($dst_pic) not found", DEBUG);
            return false;
        }

        if (!unlink($dst_pic)) {
            trigger_error("Failed to remove the current directory thumbnail picture, check the permissions", WARNING);
            return false;
            }
        echo "Successfully removed current directory thumbnail";
        return true;
    }

    // Normal request, copy file as directory thumb
    if (!is_file($src_pic)) {
            trigger_error("Source thumbnail ($src_pic) not found", WARNING);
            return false;
        }

    if (!is_dir(dirname($dst_pic))) {
        mkdir(dirname($dst_pic),0755);
        if ($config['default_file_permissions']) chmod(dirname($dst_pic), $config['default_file_permissions']);
    }

    if (!@copy($src_pic, $dst_pic)) {
        trigger_error("Failed to copy the new directory thumbnail picture, check the permissions", WARNING);
        trigger_error("DEBUG: copy of ($src_pic) to ($dst_pic) failed", DEBUG);

    } else return true;


}


/* Scan a directory and return an array with all files/sub-directories
 * (skipping working dirs/files like .thumbs, .welcome, etc...)
 */
function scan_dir($dir = '.', $search_pattern = NULL, $recurs = 1)
{

	global $config;

    // Both values below are the same as scanning from root_dir
	// if ($dir == '.' || $dir == '/') $dir="";

    // $fulldir=str_replace("//","/",$config['pictures_dir']."/".$dir);
    $fulldir = $dir;

    if (!is_array($result)) $result=array();

	if (!is_dir($fulldir)) {
		trigger_error("'$fulldir' is not a directory", WARNING);
		return false;
	}

	if (!$dh  = opendir($fulldir)) {
		trigger_error("Unable to open '$fulldir'", WARNING);
		return false;
	}

	while (false !== ($filename = readdir($dh))) {
		unset($match);

		// Skipping directories and files contained in $config['exclude_files_preg']
		if (preg_match($config['exclude_files_preg'], $filename)) continue;

		// Normalizing the path
		$fullpath=str_replace("//","/",$fulldir."/".$filename);

        if (is_readable($fullpath) && is_dir($fullpath) && $recurs) {

            if ($temp_array=scan_dir($dir."/".$filename,$search_pattern))
                $result = array_merge($result,$temp_array);

		} else {
        	if (isset($search_pattern)) {
                if (preg_match($search_pattern, $filename)) $match=1;
            } else $match=1;

			if (isset($match)) $result[]=$fullpath;
		}

    }

    if ($result) return $result; else return;

} // EOF scan_dir()

/**
 * scan_dir_2 - Rewrite of the scan_dir() function, removed the phpGraphy specifics
 * bits and added an $exclude_pattern argument before the $recurs one
 *
 * return a list of files/directory - you can specify a search pattern
 * and also if you want it to be recursive or not.
 * TODO: Replace the previous scan_dir() function by this one
 */
function scan_dir_2($dir = '.', $include_pattern = NULL, $exclude_pattern = NULL, $recurs = 1)
{

    if (!isset($result) && !is_array($result)) $result=array();

	if (!is_dir($dir)) {
		trigger_error("'$dir' is not a directory", WARNING);
		return false;
	}

	if (!$dh  = opendir($dir)) {
		trigger_error("Unable to open '$dir'", WARNING);
		return false;
	}

	while (false !== ($filename = readdir($dh))) {
		unset($match);

        // Skipping . and .. to avoid a nice loop
        if (preg_match('/^\.{1,2}$/', $filename)) continue;

		// Skipping directories and files contained in $exclude_pattern
        if (isset($exclude_pattern) && preg_match($exclude_pattern, $filename)) {
            continue;
        }

		// Normalizing the path
		$fullpath=str_replace("//","/",$dir."/".$filename);

        if (is_readable($fullpath) && is_dir($fullpath) && $recurs) {

            if ($temp_array=scan_dir_2($dir."/".$filename,$include_pattern,$exclude_pattern))
                $result = array_merge($result,$temp_array);

		} else {
        	if (isset($include_pattern)) {
                if (preg_match($include_pattern, $filename)) $match=1;
            } else $match=1;

			if (isset($match)) $result[]=$fullpath;
		}

    }

    if ($result) return $result; else return;

} // EOF scan_dir_2()


/**
 * get_dir_info()
 *
 * Take an simple array containing files and directories (like the one returned
 * by the scandir() function, analyse each of them and create a multi-dimensional
 * array with additionnal information like type, size, mtime, etc.
 *
 */
function get_dir_info($scan_dir_res)
{

    if (!$scan_dir_res) return false;

    foreach($scan_dir_res as $value) {
        if (is_readable($value) && $file_info = @stat($value)) {
            // if (is_dir($value)) $type = 'dir'; else $type = 'file';
            $dir_info[]=array(
                'name'  => $value,
                'size'  => $file_info['size'],
                'mtime' => $file_info['mtime'],
                'type'  => filetype($value)
                // Commented out as not really accurate and time consuming
                // 'mimetype' => mime_content_type($value)
                );
        }
    }

    return $dir_info;

}

/**
 * count_files_dir()
 *
 * Take a multi-dimensional array containing files and directories (like the one
 * returned by get_dir_info() and return the number of files and directories in
 * a simple array.
 *
 */
function count_files_dirs($dir_info)
{

    if (!$dir_info) return false;

    $temp_ar = array();

    foreach($dir_info as $dir_entry) {
        array_push($temp_ar, $dir_entry['type']);
    }

    return array_count_values($temp_ar);
}


/**
 * read_n_lastlines()
 *
 * Read a file starting from the end and return an array containing
 * the n lastlines. Note that the output isn't sorted and such
 * the last line of the file is the first ref in the array.
 *
 */
function read_n_lastlines($file, $nb_lines = 15)
{
    global $config;

    // Those settings are fine for both unix/dos file format (not Macintosh !)
    $linebreak = "\n";
    $offset = -2;

    $fh = @fopen($file, "rt");
    if ($config['use_flock']) flock($fh,LOCK_SH);

    $pos = $offset;
    $t = '';

    for ($i=2;$i < $nb_lines; $i++) {

        while ($t != $linebreak) {
            fseek($fh, $pos, SEEK_END);
            $t = fgetc($fh);

            if ((int)ftell($fh) > 1) {
                $pos = $pos - 1;
            } else {
                // We've reached the beginning of the file, requires special treatment
                rewind($fh);
                // Note the trim() which enable us to handle properly unix and dos format
                $line[] = trim(fgets($fh));
                break 2;
            }

        }

        $line[] = trim(fgets($fh));
        $t = '';

    }

       fclose($fh);
       return $line;
}

/**
 * sort_files_by_datetime()
 * Take an simple array of files/directory, and will return it but sorted by datetime
 */
function sort_files_by_datetime($current_dir, $files)
{

    // Get mtime for every entry
    foreach($files as $file) {
        $fullpath = $current_dir.$file;
        $temp_array[$file]=filemtime($fullpath);
    }

    // Sort entries
    asort($temp_array);

    // Rebuild a simple array
    foreach($temp_array as $file => $filemtime) {
        $output[]=$file;
    }

    return $output;

}

/**
 * Equivalent to print_r() but encapsulated with <pre> so that it's readable in a browser
 * @see print_r()
 */
function print_r_html($array)
{

    echo "<pre>";
    print_r($array);
    echo "</pre>";

}

/**
 * Transform specials characters into HTML entities
 *
 * This function is to be used instead of htmlentities/htmlspecialchars
 * Its ultimate goal is to properly handle multiple charsets/languages
 * Doing this in one place instead of several is going to be easier to
 * maintain.
 */
function html_safe($input)
{

    return htmlspecialchars($input);

}

/**
 * Return current running operating system (UNIX/WIN)
 *
 * This function need to be called when there's something specific to a particular OS
 * This way the detection routing is handled in a central location.
 * @return string UNIX|WIN
 */
function get_os()
{

    if (substr(PHP_OS, 0, 3) == "WIN") return "WIN"; else return "UNIX";

}

/**
 * Convert a size in bytes to a human readable format (KB MB)
 */
function convert_bytes_to_humanreadable($size_in_bytes)
{

    $precision = 2;

    if (!is_numeric($size_in_bytes)) {
        trigger_error(__FUNCTION__."(): value '$size_in_bytes' is NOT numeric", ERROR);
        return false;
    }

    if ($size_in_bytes > (1024 * 1024 * 1024)) {
        // Ok we're talking in GigaBytes
        $readable_size = round(($size_in_bytes / 1024 / 1024 / 1024), $precision) . 'G';
    } elseif ($size_in_bytes > (1024 * 1024)) {
        // Ok we're talking in MegaBytes
        $readable_size = round(($size_in_bytes / 1024 / 1024), $precision) . 'M';
    } elseif ($size_in_bytes > 1024) {
        // Ok we're talking in KiloBytes
        $readable_size = round(($size_in_bytes / 1024), $precision) . 'K';
    } else {
        // Nothing to do, this is really bytes :)
        $readable_size = $size_in_bytes . 'Bytes';
    }

    return $readable_size;

}

/**
 * Convert a size from human readable format (with a unit like K, M, G for Kilobytes, Megabytes, etc.)
 * to a size in bytes.
 */
function convert_humanreadable_to_bytes($val)
{

   $val = trim($val);
   $last = strtolower($val{strlen($val)-1});
   switch($last) {
       // The 'G' modifier is available since PHP 5.1.0
       case 'g':
           $val *= 1024;
       case 'm':
           $val *= 1024;
       case 'k':
           $val *= 1024;
   }

   return $val;

}


function validate_running_config() {

    global $config;

    $error = 0;

    require_once INCLUDE_DIR.'yorsh-variablevalidation.class.php';
    require_once INCLUDE_DIR.'yorsh-varval-config_data.inc.php';

    $config_validation = new ConfigYorshVariableValidation();

    // Uncommenting the line below make it very verbose
    // $config_validation->set_debug_mode(1);

    foreach ($config as $varname => $value) {

        // trigger_error("Validating ".$varname."...", WARNING);

        if (!$config_validation->check_var($varname, $value)) {

            if (!$config_validation->is_found($varname)) {
                trigger_error('Configuration error, directive <b>'.$varname.'</b> is either unknown or obsolete', E_USER_WARNING);
            } else {
                trigger_error('Configuration error, current value for <b>'.$varname.'</b> is invalid', E_USER_WARNING);
                //FIXME:LANG
                if ($config['debug_mode']) echo '<div>See phpgraphy manual for more information about <b><a href="docs/phpgraphy-manual.html#config.'.$varname.'">'.$varname.'</a></b></div>';
            }

            // config.$varname


            // Unset the value so that it doesn't break anything
            $config[$varname] = '';
            $error = 1;

        }

    }

    if ($error) return false; else return true;

}

function load_config_ini($ini_filepath) {

    global $config;

    if (!$user_config = parse_ini_file($ini_filepath)) {
        trigger_error('Unable to load '.$ini_filepath.', please check the syntax of the file', FATAL);
    }

    // Override current $config values with the ones found in the INI_FILE
    foreach($user_config as $key => $value) {
        $config[$key] = $value;
    }

    return true;

}

function read_properties_ini($ini_filepath) {

    global $config;

    if (!$properties = parse_ini_file($ini_filepath)) {
        trigger_error('Unable to load '.$ini_filepath.', please check the syntax of the file', WARNING);
        return false;
    }

    $allowed_directives = array('files_sort_by','files_sort_order','dirs_sort_by','dirs_sort_order');

    // Return array that contain only allowed directives
    foreach($properties as $key => $value) {
        if (array_search($key, $allowed_directives)) $directives[$key] = $value;
    }

    return $directives;

}

/**
 * Return the language_file_info array of a phpGraphy's language file
 * @param: string $language_file - Full path of the language file
 * @return: array $language_file_info
 */
function get_language_info($language_file)
{

    include $language_file;
    return $language_file_info;

}

/**
 * Front-end for db_get_user_comments()
 * Does filter user data (user, text) by using the html_safe() function
 */
function get_user_comments($filepath)
{

    $user_comments = db_get_user_comments($filepath);

    if (!$user_comments) return;

    // Two fields to filter (user and text)
    foreach ($user_comments as $key => $comment_entry) {
        $user_comments[$key]['user'] = html_safe($comment_entry['user']);
        $user_comments[$key]['text'] = html_safe($comment_entry['text']);
    }

    return $user_comments;

}


/**
 * Front-end for db_get_last_commented()
 * Does filter user data (by) by using the html_safe() function
 */
function get_last_commented($filepath, $nb_last_commented, $seclevel, $from)
{

    $last_commented = db_get_last_commented($filepath, $nb_last_commented, $seclevel, $from);

    if (!$last_commented) return;

    // One field to filter (user and text)
    foreach ($last_commented as $key => $comment_entry) {
        $last_commented[$key]['by'] = html_safe($comment_entry['by']);
    }

    return $last_commented;

}

/**
 * Get picture's title (if not title is set, return filename (without dir)
 */
function get_title($filepath)
{

    if (!$title = db_get_title($filepath)) {
        $title = basename($filepath);
    }

    return $title;

}

/**
 * Frontend for db_top_rating()
 * Return an indexed array containing 2 fields (rating, nb_votes)
 */
function get_rating($filepath) {

    if ($val = db_get_rating($filepath)) {

        // Differences between rating calculation handled by next function
        $output['rating'] = calculate_rating_score($val['avg_rating'], $val['nb_votes']);
        $output['nb_votes'] = $val['nb_votes'];

        return $output;

    }

}

/**
 * Comparison function to be used along with a array sorting function
 * Used by the get_top_ratings() function of phpGraphy
 */
function rating_cmp($a, $b) {
  if($a['rating'] == $b['rating']) return 0;
  return ($a['rating'] < $b['rating'])?1:-1;
}

/**
 * Frontend for db_get_top_ratings()
 * Fetch more data than requested in order to apply the rating formula
 * and remove files that shouldn't be viewed (security level check)
 */
function get_top_ratings($dir = null, $nb_top_rating = 10, $seclevel = 0, $from = 0)
{

    global $config;

    // For Flat-File backend, assign default directory
    if (!$dir && $config['database_type'] == 'file') $dir = '/';

    // Increase the fetched number of results
    // (some might be discarded because of security level, etc.)
    $limit=(int)$nb_top_rating * 10;

    // Retrieve indexed array (avg_rating, nb_votes)
    if (!$db_rating_data = db_get_top_ratings($dir, $limit, $seclevel, $from)) {
        return;
    }

    // Filter array (seclevel, existing files)
    $i=0;
    foreach ($db_rating_data as $key => $val) {
        if (strstr(dirname($val['filename']).'/',$dir)
        && is_readable($config['pictures_dir'].stripcslashes($val['filename']))
        && get_level($val['filename'])<=(int)$seclevel) {

            $ret[$i]['picname'] = $val['filename'];

            // Differences between rating calculation handled by next function
            $ret[$i]['rating'] = calculate_rating_score($val['avg_rating'], $val['nb_votes']);

            $ret[$i]['nb_votes'] = $val['nb_votes'];
            $i++;
        }
    }

    if (!$ret) return;

    usort($ret,"rating_cmp");

    // Limit the number of entries to the requested number
    $ret=array_slice($ret,0,$nb_top_rating);

    return $ret;

}

/**
 * Calculate a rating using two input parameters (avg_rating and nb_votes)
 * and using config parameters (rating_score_mode, rating_pre_votes)
 * @param: string $avg_rating
 * @param: string $nb_votes
 */
function calculate_rating_score($avg_rating, $nb_votes)
{

    global $config;

    if ($config['rating_score_mode'] == 'formula') {
        // Magic formula mode

        $factor = 1;
        $rating_score = ($avg_rating * $nb_votes) * ($avg_rating * $factor);

        return $rating_score;

    } else {
        // Average mode

        // Without pre-votes ?
        if (!$config['rating_pre_votes']) return $avg_rating;

        // With pre-votes
        $pre_rating_note = $config['highest_rating'] / 2;
        $pre_rating_nb_votes = $config['rating_pre_votes'];
        $rating = (($avg_rating * $nb_votes) + ($pre_rating_note * $pre_rating_nb_votes))
                  / ($nb_votes + $pre_rating_nb_votes);
        return $rating;

    }

}

/**
 * Return an error string to the user using an errorcode, these types of errors are only displayed
 * to the user and not logged in the log file. An help link is provided pointing to phpGraphy
 * website where we'll maintain a user commentable database to help users resolve their problems.
 * @param: string $error_code
 * @param: optional string $arg0 - Passed to the sprintf function
 * @param: optional string $arg1 - Passed to the sprintf function
 * @param: optional string $arg2 - Passed to the sprintf function
 * @param: optional string $arg3 - Passed to the sprintf function
 */
function scust_error($error_code, $arg0 = null, $arg1 = null, $arg2 = null, $arg3 = null)
{
    global $txt, $txt_error, $base_images_dir, $language_file_info;

    if (!$txt_error[$error_code]) {
        scust_error('00000', 'https://trac.phpgraphy.org/trac/newticket?version='.PHPGRAPHY_VERSION);
        return;
    }

    $get_help_icon = ' <a href="http://www.phpgraphy.org/error.php?error_code='.$error_code.'&pref_lang='.$language_file_info['country_code'].'&version='.PHPGRAPHY_VERSION.'" target="_blank"><img src="'.$base_images_dir.'help.gif" alt="'.$txt['Get Help'].'" title="'.$txt['Get Help'].'" class="icon" /></a>';

    if ($arg0) {

        // I know, code below could be optimised but so far, that'll still do the job :)
        if ($arg3) $error_msg = sprintf($txt_error[$error_code], $arg0, $arg1, $arg2, $arg3);
        elseif ($arg2) $error_msg = sprintf($txt_error[$error_code], $arg0, $arg1, $arg2);
        elseif ($arg1) $error_msg = sprintf($txt_error[$error_code], $arg0, $arg1);
        else $error_msg = sprintf($txt_error[$error_code], $arg0);

    } else {

       $error_msg = $txt_error[$error_code];

    }

    return '<div class="errormsg"><b>PHPG-'.$error_code.'</b> '. $error_msg . $get_help_icon . '</div>';

}

/*
 * Output error string returned by scust_error()
 * @see: scust_error()
 */
function cust_error($error_code, $arg0 = null, $arg1 = null, $arg2 = null, $arg3 = null)
{
    echo scust_error($error_code, $arg0, $arg1, $arg2, $arg3);
}



/**
 * Check if the user password is encrypted or not
 * return true if encrypted and false if not
 * @param: string $password
 */
function is_password_encrypted($password)
{

    if (substr($password, 0, 4) === "====") return true; else return false;

}

/**
 * Encrypt password using sha1 algorithm
 * @param: string $password
 */
function encrypt_password($password)
{

    // Checking if password isn't already encrypted (even if already done before)
    if (!is_password_encrypted($password)) {

        $encrypted_password = '====' . sha1($password);
        return $encrypted_password;

    } else return $password;

}

/**
 * Frontend for db_is_login_ok, handle encrypted passwords
 * @param: string $login
 * @param: string $pass
 */
function is_login_ok($login, $pass)
{

    global $config;

    // We have to do various during the transition period

    // Hashed password is only supported with file db backend
    if ($config['database_type'] == 'file' && db_is_password_hashed($login)) {
        if ($user_row=db_is_login_ok($login,encrypt_password($pass))) {
            return $user_row;
        }
    } elseif ($user_row=db_is_login_ok($login,$pass)) {
        return $user_row;
    } else return false;

}

/**
 * Replacement for official file_get_contents function when using PHP < 4.3.0
 * @param: string $url
 */
if (!function_exists('file_get_contents'))
{   
  function file_get_contents($url)
  {
    $temp = "";
    $fp = @fopen ($url, "r");
    if ($fp)
    {
      while ($data=fgets($fp, 1024))
        $temp .= $data;
      fclose ($fp);
    }
    return $temp;
  }
}

?>
