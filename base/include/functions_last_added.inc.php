<?php

/*
*  Copyright (C) 2005 JiM / aEGIS
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

/**
 * $Id: functions_last_added.inc.php 422 2007-12-18 12:38:33Z jim $
 *
 * This file contains a collection of functions used by the last_added_pictures page of phpGraphy
 * Note: All are relying on the mtime value to get the result
 *
 * get_last_added_files          - Return last modified files (w/ security check)
 * get_last_added_files_per_dir  - Return last modified picture per directory (w/ security check)
 * scan_last_added_files         - Scan for last modified files
 * scan_last_added_dirs          - Scan for last modified directories
 * scan_last_added_files_per_dir - Scan for latest modified file per directory
 *
 */


/**
 * @function: get_last_added_files
 * @param: $dir, $max, $seclevel, $from
 * @description: Return an array containing the last $max modified files which have passed the security
 *               level check.
 * @see: scan_last_added_files(), filter_array_by_seclevel()
 */

function get_last_added_files($dir, $max=15, $seclevel=0, $from=0)
{

    // Because of the security level check, we have to get a lot of files in the first array to be sure that we'll have enough to display after the check, without affecting performance to much. We have to find a coef number, 10 seem to be a nice number, with a minimum scan of 50 files.

    $max += $from;
    $scan_max = $max * 10;
    if ($scan_max < 50) $scan_max = 50;
    $counter = 0;

    $last_added_files = scan_last_added_files($dir, $scan_max, $from);

    foreach ($last_added_files as $filename => $filemtime) {

        if (get_level($filename) > $seclevel) {
            // Seclevel check failed, removing entry from the array
            unset($last_added_files[$filename]);
        } else $counter++;

        if ($counter >= $max) {
            // Ok, we have enough entries, slicing the array to the max value
            $last_added_files = array_slice($last_added_files, 0, $max);
            break;
        }

    }

    return $last_added_files;

}

/**
 * @function: get_last_added_files_per_dir
 * @param: $dir, $max, $seclevel, $from
 * @description: Return an array containing last modified file per directory with a limit
 *               of $max results, all of them have passed the security level check.
 * @see: scan_last_added_dirs()
 */

function get_last_added_files_per_dir($dir, $max=15, $seclevel=0, $from=0)
{

    global $config;

    if (!is_int($max) || $max > 100) $max=100;

    $last_files=array();
    $i=0;

    // Get last modified directories
    $dirs = scan_last_added_dirs($dir);

    while (list($dir, $val) = each($dirs)) {

        if ($i>=$max) break;

        $fulldir=$config['pictures_dir'].$dir;
        $valid_dir=0;
        $files=array();

        $dh  = opendir($fulldir);

        while (false !== ($filename = readdir($dh))) {

            if ($dir != ".") $shortpath=$dir."/".$filename; else $shortpath=$filename;

            // Skipping $config['exclude_files_preg'], directories and those that failed the security level
            if (preg_match($config['exclude_files_preg'], $filename) || !is_file($fulldir."/".$filename) || get_level($shortpath) > $seclevel) continue;
            $valid_dir=1;
            // Put all files from this directory to this array (Will do something with the content soon)
            $files[$dir."/".$filename] = filemtime($fulldir."/".$filename);
        }


        // We have found a valid directory (containing something new) so get the most recent file
        if ($valid_dir) {
            if($j<=$from) {
                // Sort files of the directory to take only the most recent one and add it to our final array
                arsort($files);
                list($filename,$filemtime) = each($files);
                $last_files[$filename] = $filemtime;
                $i++;
            }
            $j++;
        }

    }

    if ($last_files) {
        arsort($last_files);
        return array_slice($last_files,$from,$max);
    } else return;
}

/**
 * @function: scan_last_added_files
 * @param: $dir, $max, $from
 * @description: Return an array containing the last $max modified files by parsing
 *              the directory $dir and all its sub-directories.
 */

function scan_last_added_files($dir, $max=15, $from=0)
{

    global $config;
    global $global_counter;

    $fulldir=$config['pictures_dir'].$dir;

    if (!is_array($array)) $array=array();
    if (!is_dir($fulldir)) return false;

    $dh  = opendir($fulldir);

    while (false !== ($filename = readdir($dh))) {

        if ($config['debug_mode']) $global_counter++;

        // Skipping directories and files contained in $config['exclude_files_preg']
        if (preg_match($config['exclude_files_preg'], $filename)) continue;

        // Normalizing the path
        $fullpath=str_replace("//","/",$fulldir."/".$filename);
        if ($dir != ".") $shortpath=$dir."/".$filename; else $shortpath=$filename;

        if (!is_dir($fullpath)) {

            // Getting last file modification
            $array[$shortpath] = filemtime($fullpath);

        } elseif ($temp_array=scan_last_added_files($shortpath)) {

            $array=$array + $temp_array;

        }

    }

    // Sorting the array
    arsort($array);

    // Keeping only the $max top entries
    $array=array_slice($array,$from,$max);

    if ($array) return $array; else return;

}


/**
 * @function: scan_last_added_dirs
 * @param: $dir, $array
 * @description: Return an array containing all directories found from $dir
 *               Last modified directories are at the top of the array
 */

function scan_last_added_dirs($dir, $array=array()) {

    global $config;

    $fulldir=$config['pictures_dir'].$dir;

    if (!is_dir($fulldir)) return false;
    $dh  = opendir($fulldir);
    while (false !== ($filename = readdir($dh))) {

        // Skipping directories and files contained in $config['exclude_files_preg']
        if (preg_match($config['exclude_files_preg'], $filename)) continue;

        // Normalizing the path
        $fullpath = str_replace("//","/",$fulldir."/".$filename);
        if ($dir != ".") $shortpath = $dir."/".$filename; else $shortpath = $filename;

        if (is_dir($fullpath)) {
            $array[$shortpath] = filemtime($fullpath);
            if ($temp_array=scan_last_added_dirs($shortpath)) $array=$array + $temp_array;
        }

    }

    arsort($array);

    if ($array) return $array; else return;

}

/**
 * @function: scan_last_added_files_per_dir
 * @param: $dirs, $max
 * @description: Return an array containing the latest modified of each directory specified
 *               in the required argument $dirs. It will return up to $max files.
 *               This function is usually used with scan_last_added_dirs()
 * @see: scan_last_added_dirs()
 * @see: get_last_added_files_per_dir() (Same function but with security checks)
 */

function scan_last_added_files_per_dir($dirs=array(),$max=15) {

    global $config;

    if (!is_int($max) || $max > 100) $max=100;

    $last_files=array();
    $i=0;

    while (list($dir, $val) = each($dirs)) {

        if ($i>=$max) break;

        $fulldir=$config['pictures_dir'].$dir;
        $valid_dir=0;
        $files=array();

        $dh  = opendir($fulldir);

        while (false !== ($filename = readdir($dh))) {

            // Skipping directories and files contained in $config['exclude_files_preg']
            if (preg_match($config['exclude_files_preg'], $filename) || !is_file($fulldir."/".$filename)) continue;
            $valid_dir=1;
            // Put all files from this directory to this array (Will do something with the content soon)
            $files[$dir."/".$filename] = filemtime($fulldir."/".$filename);
        }


        // We have found a valid directory (containing something new) so get the most recent file
        if ($valid_dir) {
            // Sort files of the directory to take only the most recent one and add it to our final array
            arsort($files);
            list($filename,$filemtime) = each($files);
            $last_files[$filename] = $filemtime;
            $i++;
        }

    }

    if ($last_files) {
        arsort($last_files);
        return $last_files;
    } else return;

}


/* Some examples on how to use those functions

// Timings below are from a test made with a directory containing 100+ sub-directories and 3500+ files
// for a total of 2.5GB of data

// Last added pictures per directory - 0.18s
$last_added=scan_last_added_files_per_dir(scan_last_added_dirs("."), 15);

// Last added pictures (absolute) - 0.54s
//$last_added=scan_last_added_files(".", 15);

print_r($last_added);

*/

?>
