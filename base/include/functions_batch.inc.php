<?php

/*
*  Copyright (C) 2006 - phpGraphy DevTeam (http://phpgraphy.sourceforge.net)
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
*/

/* $Id: functions_batch.inc.php 377 2006-12-29 10:48:11Z jim $ */

/**
 * Perform an action on all the thumbnails and lowresolution pictures of the library
 * For now, 2 possibles actions (generate/delete) and 2 possibles targets (all/thumbs)
 * @param: string $action 
 * @param: string $target
 */

function batch_thumbnails_action($action,$target)
{
    global $handled_image_types_preg, $config;
    global $txt_admin;

    if ($action != 'generate' && $action != 'delete') {
        trigger_error(__FUNCTION__.'() Wrong action parameter "'.$action.'", must be either generate or delete', ERROR);
        return false;
    }

    if ($target != 'all' && $target != 'thumbs') {
        trigger_error(__FUNCTION__.'() Wrong target parameter "'.$target.'", must be either generate or delete', ERROR);
        return false;
    }

    // Generate array from target argument

    if ($action == 'generate' && $target == 'all') {
        // Same as previous behaviour, return original pictures paths
        $include_pattern = $handled_image_types_preg;
        $exclude_pattern = '/^\.thumbs/';
    } elseif ($action == 'delete' && $target == 'all') {
        $include_pattern = '/^(thumb|lr)_.+\.jpg$/i';
        $exclude_pattern = NULL;
    } elseif ($action == 'delete' && $target == 'thumbs') {
        $include_pattern = '/^thumb_.+\.jpg$/i';
        $exclude_pattern = NULL;
    }

    $find_ar=scan_dir_2($config['pictures_dir'], $include_pattern, $exclude_pattern);
    //print_r_html($find_ar);

    // Execute action on target
    
    if ($action == 'generate' && $target == 'all') {

        echo $txt_admin['Generating all missing thumbnails/low res pictures: (be patient)']."<br /><br />";
        flush();

        $gen_lr=0; $gen_th=0;
        $find_ar=scan_dir($config['pictures_dir'], $handled_image_types_preg);
        for($i=0;$find_ar[$i];$i++) {

            $generated = 0;
            $pic=substr($find_ar[$i],strlen($config['pictures_dir']));
            $lrdir=$config['pictures_dir'].dirname($pic)."/.thumbs";

            if(!is_dir($lrdir)) mkdir($lrdir,0755);
            if ($config['default_file_permissions']) chmod($lrdir, $config['default_file_permissions']);

            // low res check
            if(filesize($config['pictures_dir'].$pic)>=$config['lr_limit']) {
                $lrfile=$lrdir."/lr_".basename($pic);
                if(!file_exists($lrfile)) {
                    printf($txt_admin['Generating low res picture for %s']."<br />", $pic);
                    flush();
                    convert_image($config['pictures_dir'].$pic,$lrfile,$config['lr_res'],$config['lr_quality']);
                    $gen_lr++;
                    $generated = 1;
                }
            }

            // thumbnail check
            $prfile=$lrdir."/thumb_".basename($pic);
            if(!file_exists($prfile)) {
                printf($txt_admin['Generating thumbnail picture for %s']."<br />", $pic);
                flush();
                convert_image($config['pictures_dir'].$pic,$prfile,$config['thumb_res'],$config['thumb_quality']);
                $gen_th++;
                $generated = 1;
            }

            // title auto-import if either lowres/thumb has been generated and actual title is empty
            if ($generated) {
                if (($config['use_exif'] || $config['use_iptc']) && !db_get_title($pic) && preg_match('/\.jpe?g$/i',$pic) ) $title = import_metadata_title($pic);
            }
        }

        echo "<br />";
        if ($gen_lr || $gen_th) printf($txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'], $gen_lr, $gen_th);
        else echo $txt_admin['Nothing to do.'];

        echo "<br /><br />";

        printf($txt_admin['Your library contains <b>%s</b> pictures.']."<br />", sizeof($find_ar));

    } elseif ($action == 'delete') {

        if (!count($find_ar)) {
            echo $txt_admin['Nothing to do.'];
            return true;
        }

        $nb_deletions = 0;

        foreach($find_ar as $filepath) {

            if (!unlink($filepath)) {
                printf($txt_admin['Error while deleting %s'], $filepath);
                flush();
                $error = 1;
            } else {

                $nb_deletions++;
            }

        }
        
        if ($nb_deletions) {
            printf($txt_admin['Successfully deleted %s of %s files'], $nb_deletions, count($find_ar));
        }

    } // EOF action == 'delete'

}


/**
 * Try to increase time_limit whenever it's possible and display a warning if not possible
 * @param: int $new_time_limit (Time in seconds)
 */

function set_new_time_limit($new_time_limit)
{

    $success = 0;

    if (function_exists('ini_get') && $max_execution_time=ini_get('max_execution_time')) {
        
        if ($max_execution_time < $new_time_limit) {
        
            if (function_exists('ini_set') && ini_set('max_execution_time', $new_time_limit)) {
                $success = 1;
                trigger_error('DEBUG: '.__FUNCTION__.'(): Successfully increase value of max_execution_time to '.$new_time_limit, DEBUG);
            }

        } else return true;

    }

    if (! $success) {
        trigger_error('DEBUG: '.__FUNCTION__.'(): Unable to increase value of max_execution_time', DEBUG);
        return false;
    } else return true;

}

?>
