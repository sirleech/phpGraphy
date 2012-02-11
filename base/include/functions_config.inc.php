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

/* $Id: functions_config.inc.php 386 2007-01-05 11:35:04Z jim $ */

// This file contains functions related to phpGraphy configuration file 
// (used either by configuration editor or the installer)

/** 
 * Read default-config.inc.php and dump its content into an array
 */
function config2array($input_filename) 
{

  // TODO: Internal debug mode (need to be adapated to Yorsh Standard
  $debug_mode = 0;

  $directive_ref=array(
	'name' => "/directive:[ \t]+([a-zA-Z0-9_]*)/",
	'type' => "/type:[ \t]+(boolean|int|string|select\{.+\}|special)/",
	'valid_from' => "/valid_from:[ \t]+([0-9\.]+)/",
	'obsolete_since' => "/obsolete_since:[ \t]+([0-9\.]+)/",
	'replaced_by' => "/replaced_by:[ \t]+([a-z_]+)/",
	'category' => "/category:[ \t]+(.*)/",
	'tags' => "/tags:[ \t]+(.*)/",
	'desc' => "/description:[ \t]+(.*)/",
	'example' => "/example:[ \t]+(.*)/"
	);

  if (!is_readable($input_filename)) die($input_filename." is not readable.\n");

  $fh=fopen($input_filename,'r');

  while (!feof($fh)) {
    $line=fgets($fh);

    // DEBUG
    if ($debug_mode) echo "FILE-CONTENT:" . $line;

/*
    $start_regexp="/^\/\*\*\*$/"; // Works fine with LF only (doesn't work with CRLF)
    $end_regexp="/^\*\*\*\/$/";
*/

    $start_regexp="/^\/\*\*\*\r?$/";
    $end_regexp="/^\*\*\*\/\r?$/";

    // echo "LINE: ".$line."\n";
    if (preg_match($start_regexp, $line)) {
        // Enabling parser
        $parser="on";

        if ($debug_mode) echo "DEBUG: Detected beginning of interesting content, enabling parser"."\n";

        }

    if (preg_match($end_regexp, $line)) {
       // Disabling parser
       $parser="off";

        if ($debug_mode) echo "DEBUG: Detected end of interesting content, disabling parser"."\n";

       // Analysing the directive (for later use)
       if ($directive['name']) {
          // Adding it to the final array
          $result[$directive['name']]=$directive;

          if ($debug_mode) echo "DEBUG: Adding directive to array"."\n";
	  }
       unset($directive);
       }


  if ($parser == "on") {

     foreach ($directive_ref as $directive_name => $directive_regexp)
       {
       preg_match($directive_regexp, $line, $matches);

       if ($directive_name != "desc" && $matches[1]) 
          {
	  $directive[$directive_name]=$matches[1];
	  // Turn off description mode
	  unset($directive_description);
	  }
       elseif ($directive_name == "desc") {
	      // We need to concatenate the first line with all the following until it's the end
	      if ($matches[1]) {
	         // First line (normal behavior)
                 $directive[$directive_name]=$matches[1];
		 $directive_description=1;
	         } 
	      }
       }

     if ($directive_description) {

	// This check is to avoid taking the first line again
        if ($directive_description > 1) {
       	   preg_match("/\*[ \t]+(.*)/", $line, $matches);
       	   if ($matches) $directive['desc']=$directive['desc'] . " " . $matches[1];
	   }

	$directive_description++;
        }


     } else {
        // Parser off for comment but we still need to get the default value
  	$pattern="/^\\$([a-zA-Z0-9_\[\]\']+)[ ]?=[ ]?(.+);/";
	preg_match($pattern, $line, $matches);

	// $matches[1] is the variable name
	// $matches[2] is the variable value
	// if ($matches) print_r($matches);
	if ($result[$matches[1]]) $result[$matches[1]]['default']=$matches[2];
        }

 
    $i++;
    if ($i > 2000) die("SECURITY MODE TRIGGERED\n");
  }

  // DEBUG
  // print_r($result);

  if ($result) return $result; else return false;

} // End of config2array()

function order_config_by_cat($config_array)
{

    foreach ($config_array as $key => $val) {

        $category = $config_array[$key]['category'];
        list($cat, $subcat) = explode( '/',$category);
        $config_by_cat[trim($cat)][trim($subcat)][$key] = $config_array[$key];
        
    }

    return $config_by_cat;


}

function display_config_categories($config_by_cat, $category = NULL, $sub_category = NULL, $advanced = 0) 
{

    global $config, $config_update_msg;
    global $txt_form_submit, $txt, $txt_admin;

    $html = "\n".'<fieldset id="adminconfig">';
    $html .= '<legend>'.$txt_admin['Settings'].'</legend>';

    $html .= '<div id="configmenu">';

    foreach($config_by_cat as $cat => $sub_cat_ar) {

        $j=0;

        if($cat == "") continue;

        if ($cat != $old_cat && $i != 0) $html .= '</ul>'."\n";

        if ($cat != $old_cat) {
            $html .= "\n".'<div class="category">'.$cat.'</div><ul>';
        }

        foreach($config_by_cat[$cat] as $sub_cat => $sub_cat_ar) {
            // Check that there is content to display (not everything with the notingui tag)
            {
                $skip_sub_cat = 1;

                foreach ($sub_cat_ar as $directive_info) {
                    if (!strstr($directive_info['tags'], 'notingui')) {
                        $skip_sub_cat = 0;
                    }
                }

                if ($skip_sub_cat) continue;

            }

            // If not in advanced mode, check that the sub_category has something to display
            if (!$advanced) {
                $skip_sub_cat = 1;

                foreach ($sub_cat_ar as $directive_info) {
                    if (!strstr($directive_info['tags'], 'advanced')) {
                        $skip_sub_cat = 0;
                    }
                }

                if ($skip_sub_cat) continue;

            }


            // Assign a default sub_category if non selected
            if (!$sub_category) $sub_category = $sub_cat;

            if ($sub_cat != '') {
                $html .= '<li>';
                if ($sub_cat != $sub_category) {
                    $html .= '<a href="?mode=config&amp;cat='.$cat.'&amp;subcat='.$sub_cat;
                    if ($advanced) $html .= '&amp;advanced=1';
                    $html .= '">';
                } else $html .= '<span id="selected">&gt; ';

                $html .= $sub_cat;
                if ($sub_cat != $sub_category) $html .= '</a>'; else $html .= '</span>';
                $html .= '</li>';
            }

        }

        $old_cat = $cat;
        $i++;

    }
    $html .= '</ul>';
    
    // Handle the advanced user mode
    $html .= "\n".'<div id="advancedbox"><form method="get" name="advancedform" action="'.SCRIPT_NAME.'">';
    $html .= ' <input name="advanced" type="checkbox" value="1"';
    if ($advanced) $html .= ' checked';
    $html .= '" onclick="javascript:document.advancedform.submit();" />';
    $html .= $txt_admin['Show advanced options'];
    $html .= '<input type="hidden" name="mode" value="config" />';
    $html .= '<input type="hidden" name="cat" value="'.$category.'" />';
    $html .= '<input type="hidden" name="subcat" value="'.$sub_category.'" />';
    $html .= '</form></div><!--//advancedbox-->'."\n";

    $html .= "\n".'</div><!--//configmenu-->'."\n";

    $html .= '<div id="configdirectives">';
    
    // If config has been update, display msg (success/error)
    if ($config_update_msg) {
        $html .= $config_update_msg;
    }

    $html .= '<form method="post" name="config" action="'.SCRIPT_NAME.'">';

    // Layer 3 - Options
    // print_r_html($config_by_cat[$category][$sub_category]);
    if ($category && $config_by_cat[$category] 
    && $sub_category && $config_by_cat[$category][$sub_category]) {
        
        foreach($config_by_cat[$category][$sub_category] as $directive => $directive_ar) {

            if (strstr($directive_ar['tags'], 'notingui')) continue;

            $html .= '<fieldset class="directive"';
            if (strstr($directive_ar['tags'], 'advanced') && !$advanced) {
                $html .= ' style="display: none"';
            }
            $html .= '>';
            if (strstr($directive_ar['tags'], 'readonly')) $html .= '<div class="readonly">'.sprintf($txt_admin['Read-Only option'], INI_FILE).'</div>';
            if (strstr($directive_ar['tags'], 'install')) $html .= '<div class="readonly"><b>'.$txt['NOTE: '].'</b>'.sprintf($txt_admin['Usage of install recommended'], 'install.php').'</div>';
            $html .= '<label for="'.$directive.'">'.$directive.'</label>';

            if ($directive_ar['type'] == 'boolean') {
                
                $html .= '<select name="'.$directive.'"';
                if (strstr($directive_ar['tags'], 'readonly')) $html .= ' disabled';
                $html .= '>';
                $html .= '<option value="1"';
                if ($config[$directive]) $html .= ' selected';
                $html .= '>'.$txt_admin['on'].'</option>';
                $html .= '<option value="0"';
                if (!$config[$directive]) $html .= ' selected';
                $html .= '>'.$txt_admin['off'].'</option>';
                $html .= '</select>';

            } elseif (strstr($directive_ar['type'], 'select')) {

                $html .= '<select name="'.$directive.'"';
                if (strstr($directive_ar['tags'], 'readonly')) $html .= ' disabled';
                $html .= '>';
                if (preg_match('/^select{(.+)}$/', $directive_ar['type'], $matches)) {
                    $directive_options = explode(',', $matches[1]);
                    foreach ($directive_options as $option) {
                        $html .= '<option';
                        if ($config[$directive] == $option) $html .= ' selected';
                        $html .= '>'.$option.'</option>';
                    }
                }
                $html .= '</select>';

            } elseif ($directive_ar['type'] == 'special') {

                // Special type call a function named get_config_$directive
                // The exepected returned content is a simple array with both
                // keys and content, key will be assigned as value and content
                // as desc

                $directive_options = call_user_func('get_config_'.$directive);

                $html .= '<select name="'.$directive.'"';
                if (strstr($directive_ar['tags'], 'readonly')) $html .= ' disabled';
                $html .= '>';
                foreach ($directive_options as $value => $desc) {
                    $html .= '<option value="'.$value.'"';
                    if ($config[$directive] == $value) $html .= ' selected';
                    $html .= '>'.$desc.'</option>';
                }
                $html .= '</select>';


            } else {

                $html .= '<input type="text" name="'.$directive.'" value="'.$config[$directive].'" title="'.html_safe($directive_ar['desc']).'"';
                if (strstr($directive_ar['tags'], 'readonly')) $html .= ' disabled';
                $html .= ' />';

            }

            $html .= '<div class="description"><b>'.$txt_admin['Description'].'</b> '.html_safe($directive_ar['desc']).'</div>';
            if ($directive_ar['example'] && $directive_ar['type'] != 'special') $html .= '<div class="example"><b>'.$txt_admin['Example'].'</b> '.html_safe($directive_ar['example']).'</div>';

            $html .= '</fieldset>';

        }

    }
    
    $html .= '<div><input type="hidden" name="mode" value="config" />';
    $html .= '<input type="hidden" name="cat" value="'.$category.'" />';
    $html .= '<input type="hidden" name="subcat" value="'.$sub_category.'" />';
    $html .= '<input type="hidden" name="updateconfig" value="1" />';
    $html .= '<input type="hidden" name="advanced" value="'.$advanced.'">';
    $html .= '<button type="submit" class="button-1">'.$txt_form_submit.'</button></div>';
    $html .= '</form>'."\n";
    
    $html .= '</div><!--//configdirectives--></fieldset>';

    echo $html;

}

function display_config_by_cat($config_by_cat) 
{

    $html = '';
    $i=0;

    foreach($config_by_cat as $cat => $sub_cat_ar) {

        $j=0;
        if($cat == "") continue;

        if ($cat != $old_cat && $i != 0) $html .= '</ul></li></ul>'."\n";
        if ($cat != $old_cat) $html .= '<ul><li>'.$cat.'<ul>';

        foreach($sub_cat_ar as $sub_cat => $directive_ar) {

            $html .= '<li>'.$sub_cat.'<ul>';

            foreach($directive_ar as $directive => $directive_info_ar) {
                
                $html .= '<li>'.$directive;
                if ($directive_info_ar['type']) $html .= ' ('.trim($directive_info_ar['type']).')';
                if ($directive_info_ar['tags']) $html .= ' ('.trim($directive_info_ar['tags']).')';
                $html .= '</li>';

            }
            $html .= '</ul></li>';

        }

        $old_cat = $cat;
        $i++;

    }
    $html .= '</ul></li></ul>'."\n";

    echo $html;

}

function get_config_language_file()
{

    // This technique is also used in install.php
    $language_files = scan_dir(LANG_DIR, '/^lang_[a-z]{2}\.inc\.php$/', NULL, 0);

    sort($language_files);
    foreach ($language_files as $language_file) {
                                                                                         
        unset($language_info);
        $language_info = get_language_info($language_file);
        $output_array[basename($language_file)] = $language_info['language_name_english'].', '.$language_info['language_name_native'];

    }

    return $output_array;

}

function get_config_theme()
{

    // This technique is also used in install.php
    $themes_dirs = scan_dir(THEMES_DIR, '/^[a-z0-9-]+$/', NULL, 0);

    sort($themes_dirs);
    foreach ($themes_dirs as $theme_dir) {

        if (!is_dir($theme_dir) || !is_file($theme_dir.DIR_SEP.'theme_info.inc.php')) continue;

        unset($theme_info);
        include $theme_dir.DIR_SEP.'theme_info.inc.php';

        if (!$theme_info['theme_name']) $theme_info['theme_name'] = basename($theme_dir);

        $output_array[basename($theme_dir)] = $theme_info['theme_name'];

    }

    return $output_array;

}

function get_config_metadata_title_field()
{

    global $config;

    require_once INCLUDE_DIR."functions_metadata.inc.php";

    if ($config['use_exif']) $exif_ref = get_exif_ref();
    if ($config['use_iptc']) $iptc_ref = get_iptc_ref();

    if ($exif_ref && $iptc_ref) $metadata_ref = $exif_ref + $iptc_ref;
    elseif ($exif_ref) $metadata_ref = $exif_ref;
    elseif ($iptc_ref) $metadata_ref = $iptc_ref;

    foreach ($metadata_ref as $metadata_field) {
        $output_array[$metadata_field] = $metadata_field;
    }
    
    if ($output_array) {
        asort($output_array);
        return $output_array;
    }

}

/**
 * Write phpgraphy config.ini.php using an array containing all the directives
 * Note that it does create a backup first, if the backup failed, it doesn't 
 * overwrite the config. Note also that it does discard everything which is equal 
 * to the default phpGraphy value  (found in default-config.inc.php)
 *
 * @param: string $ini_filepath - path for config.ini.php
 * @param: array $array - New configuration settings
 * @return: true|false
 */
function write_phpgraphy_ini($ini_filepath, $array)
{

    global $config;
    
    $data = '; <?php die() ?>
; phpGraphy configuration script
;
; This is where you should configure all your settings, it can be done either
; manually but it\'s highly recommended to use the admin web interface 
; if you\'re not an experienced user.
;
; For the list of possibles directives and associated values, please read
; the manual available either under the docs/ subdirectory or online from
; phpGraphy website (http://phpgraphy.sourceforge.net)
;
; Any non-alphanumeric characters value needs to be enclosed in double-quotes (")

';


    // Handling of existing config
    if (is_file($ini_filepath)) {
        // Config file does already exists
        
        // Creating a backup
        if (!copy($ini_filepath,str_replace('.php','.bak.php',$ini_filepath))) {
            trigger_error("Failed to create a backup copy of $ini_filepath", WARNING);
            return false;
        }
        
        // Reading actual content to preserve old-variables
        if (!$current_config = parse_ini_file($ini_filepath)) {
            trigger_error("Error while parsing current configuration, aborting change", ERROR);
            return false;
        }
        
    }

    
    // Creating new config array
    if ($current_config) {

        $new_config = $current_config;

        // Append new values
        if ($array) {
            foreach ($array as $key => $value) {
                $new_config[$key] = $value;
            }
        }

    } else {

        $new_config = $array;

    }
    
    // Loading default config value (in order to only write those which are different)
    $default_config = get_default_config();

    // Preparing file
    foreach($new_config as $key => $value) {

        // Discarding everything different from default value (to facilitate upgrade)
        if ($new_config[$key] == $default_config[$key]) continue;

        if (is_numeric($value) || is_bool($value)) {
            $data .= $key." = ".$value."\n";
        } else {
            $data .= $key." = \"".$value."\"\n";
        }

    }

    if (!$fh=fopen($ini_filepath,"w")) return false;
    
    if ($config['use_flock']) flock($fh,LOCK_EX);

    if (!fwrite($fh, $data)) return false;

    return true;

}

/**
 * Gets default config value
 */
function get_default_config() {

    // Load default config file
    include INCLUDE_DIR.CONFIG_REF_FILE;

    return $config;

}

?>
