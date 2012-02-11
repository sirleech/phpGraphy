<?php 
/*
*  Copyright (c) 2004-2007 JiM / aEGIS (jim _at_ aegis _hyphen_ corp _dot_ org)
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
*  $Id: index.php 191 2005-10-09 21:20:01Z jim $
*
*/

if (function_exists('ini_get') && ini_get('register_globals')) {

    /* If register_globals is set to on, avoid possible config variable hacks */
   unset($config);

}

/*****
*
*        Local Constants Declaration
*
*****/

define('DIR_SEP', '/');
define('BASE_DIR', 'base' . DIR_SEP);                   // Contains application base files
define('INCLUDE_DIR', BASE_DIR. 'include' . DIR_SEP);   // Contains include files
define('LANG_DIR', BASE_DIR. 'lang' . DIR_SEP);         // Contains languages files
define('LOG_DIR', 'logs' . DIR_SEP);                    // Contains log(s) files
define('THEMES_DIR', 'themes' . DIR_SEP);               // Contains themes (one subdirectory per theme)
define('CONF_DIR', 'conf' . DIR_SEP);                   // Contains configuration files

define('INI_FILE', 'config.ini.php');
define('CONFIG_REF_FILE', 'default-config.inc.php');
define('DEFAULT_LANG_FILE', 'lang_en.inc.php');
define('HEADER_FILE', 'header.inc.php');
define('FOOTER_FILE', 'footer.inc.php');
define('PHPGRAPHY_VERSION','0.9.13');
define('LOG_FILE', LOG_DIR . 'phpgraphy.log');


/**********************************************
****        Include section                 ***
**********************************************/


require_once INCLUDE_DIR.CONFIG_REF_FILE;
require_once INCLUDE_DIR."functions_global.inc.php";
require_once INCLUDE_DIR."functions_config.inc.php";
require_once LANG_DIR.DEFAULT_LANG_FILE;

/**********************************************
****        Error Handler init              ***
**********************************************/

include_once INCLUDE_DIR."yorsh-errorhandler.class.php";

define('LOG_FILE', $config['data_dir'].'debug.log');

// Set PHP error reporting to max level
error_reporting(E_ALL ^ E_NOTICE);

// Define parameters depending of $config['debug_mode']

switch ($config['debug_mode']) {

    case 0:
        define('ERROR_REPORT_LEVEL', 'FATAL');
       // error_reporting(0);
        $error_display = 1;
        $error_log = 0;
        $error_verbose = 0;
        $error_generic = 1;

        break;

    case 1:
        define('ERROR_REPORT_LEVEL', 'ERROR');
        $error_display = 1;
        $error_log = 0;
        $error_verbose = 0;
        $error_generic = 0;

        break;

    case 2:
        define('ERROR_REPORT_LEVEL', 'WARNING');
        $error_display = 1;
        $error_log = 1;
        $error_verbose = 0;
        $error_generic = 0;

        break;

    case 3:
        define('ERROR_REPORT_LEVEL', 'DEBUG');
        $error_display = 1;
        $error_log = 1;
        $error_verbose = 1;
        $error_generic = 0;

        break;

    default:
        die("ERROR, Incorrect value for \$config['debug_mode'], please read the manual or refer directly to the config file to correct the problem");

}



$error_handler =& new YorshErrorHandler($error_display, $error_log, $error_verbose, $error_generic);


/***************************************************
****  Configuration  Initialization & Validation ***
***************************************************/

if (is_file(CONF_DIR.INI_FILE)) {
    
    load_config_ini(CONF_DIR.INI_FILE);

} else $config['install_mode'] = 1;

if (!validate_running_config()) {
    trigger_error(CONF_DIR.INI_FILE.' contains error(s), please correct the problem(s) and reload the page', FATAL);
}

// Constants depend on config.ini settings
/*
if ($config['script_name']) {
   define('SCRIPT_NAME', $config['script_name']); 
} else define('SCRIPT_NAME', $_SERVER['SCRIPT_NAME']);
*/
define('SCRIPT_NAME', 'install.php');

// To use for all theme related files
define('CURRENT_THEME_DIR', THEMES_DIR.$config['theme'].DIR_SEP);
$theme_dir = CURRENT_THEME_DIR;
$base_images_dir = BASE_DIR . 'images/';
$base_styles_dir = BASE_DIR . 'styles/';
$base_js_dir = BASE_DIR . 'js/';




/******************************
****  Installation process  ***
******************************/



    require_once INCLUDE_DIR.'yorsh-variablevalidation.class.php';
    if (!$config_validation = new ConfigYorshVariableValidation()) {
        trigger_error('DEBUG: Error while loading  ConfigYorshVariableValidation()', DEBUG);
    }
   
    $config_validation->set_debug_mode(1);


    if ($_REQUEST['language_file']) {
    
        if ($config_validation->check_var('language_file', $_REQUEST['language_file'])) {
        
        include_once LANG_DIR . $_REQUEST['language_file'];
        
            if ($config['admin_ip'] == $_SERVER['REMOTE_ADDR']) {
            
                if ($_POST['step'] == 4) {
                    
                    define('STEP', 4);
                    
                } elseif ($_POST['step'] == 5) {
                
                    if ($_POST['database_type'] == 'file' && $config_validation->check_var('database_type', $_POST['database_type'])) {
                        // Because file mode database doesn't require database creation, we can jump directly to step 6
                        define('STEP', 6);
                    
                    } else define('STEP', 5);
                
                } elseif ($_POST['step'] == 6 && $config_validation->check_var('database_type', $_POST['database_type'])) {
                
                    define('STEP', 6);
                
                } else define('STEP', 3);
                
            } else define('STEP', 2);
            
        } else define('STEP', 1);
        
    } else define('STEP', 1);


    // Overide default charset to UTF-8 mode (Step 1 only)
    if (STEP == 1) $language_file_info['charset'] = 'utf-8';
    $txt_site_title = 'phpGraphy installation';

    include CURRENT_THEME_DIR.HEADER_FILE;

    echo '<div id="installbox" style="margin: 2em 7em">'."\n";

// Menu bar

echo '<div id="stepsbar"><ul>';

$html = '';
for ($i=1; $i <= 6; $i++) {
    $html .= '<li';
    if ($i == STEP) $html .= ' class="activestep"'; 
    elseif ($i < STEP) $html .= ' class="previousstep"';
    elseif ($i > STEP) $html .= ' class="afterstep"';
    $html .= '>'.$i.'</li>';
}
echo $html;
unset($html);

echo "\n".'</ul></div><!--//stepbar-->
<div id="stepcontent">';

/*********************
*
*  S T E P   O N E
*
*********************/

    switch (STEP) {
        case 1:
            $html = 
'<h2>Language selection</h2>
<div>Welcome to phpGraphy installation page !</div>
<form name="lang" action="'.SCRIPT_NAME.'" method=get class="margintop">Choose your language: <select name="language_file" onchange="javascript:setTranslationInfo()">';

            // This technique is also used in functions_config.inc.php
            $language_files = scan_dir(LANG_DIR, '/^lang_[a-z]{2}\.inc\.php$/', NULL, 0);
            sort($language_files);
            foreach ($language_files as $language_file) {
                
                unset($language_info);
                $language_info = get_language_info($language_file);
                
                if (version_compare(PHPGRAPHY_VERSION, $language_info['for_version'], '<=')) {
                    $language_info['status'] = 'Uptodate';
                } else $language_info['status'] = 'Out of date' . ' (for version ' . $language_info['for_version'] . ')';
                
                $html .= '<option value="'.basename($language_file).'"';
                
                if (basename($language_file) == DEFAULT_LANG_FILE) {
                    $default_language_info = $language_info;
                    $html .= ' selected';
                }
                
                // If IE was handling the onclick for option tags, we could use the simple code below...
                // $html .= ' onclick="fillTranslationInfo(\''.$language_info['translator_name'].'\', \''.$language_info['translator_email'].'\', \''.$language_info['status'].'\', \''.$language_info['charset'].'\')"';
                // Instead we put everything in another array that we will copy later on as a Javascript array
                $js_language_info[basename($language_file)] = $language_info['translator_name'].','.$language_info['translator_email'].','.$language_info['status'].','.$language_info['charset'];
                $html .= '>'.$language_info['language_name_english'].', '.utf8_encode($language_info['language_name_native']).'</option>'."\n";
            
            }
            $html .= '</select>';
            
// Hack because IE doesn't support onclick in the option context
            $html .= '
<script type="text/javascript">
    var langArray = new Array();
';

foreach ($js_language_info as $language_file => $language_file_info) {
    /* This is used to display useful information about the languages */
    $html .= "  langArray['".$language_file."'] = '".$language_file_info."';\n";
}

            $html .= '</script>'."\n";
// End of the hack

            $html .= '
<div style="margin-top: 10px">Charset:  <span id="translation-charset">'.$default_language_info['charset'].'</span></div>
<div style="margin-top: 10px">Status: <span id="translation-status">'.$default_language_info['status'].'</span></div>
<div style="margin-top: 10px">Translation by: <span id="translator-name">'.$default_language_info['translator_name'].'</span> <span class="annotation">&lt;<span id="translator-email">'.$default_language_info['translator_email'].'</span>&gt;</span></div>
<div><button type="submit">'.$txt_install['next step'].'</button></div>
</form>
';
        echo $html;        
        break;

/*********************
*
*  S T E P   T W O
*
*********************/


       case 2:

        $html =
'<h2>'.$txt_install['IP address check'].'</h2>
<div id="step-instructions">'.$txt_install['for security reasons, proove that it is your the admin'].'
<ul>
<li>'.sprintf($txt_install['copy INI_FILE.sample to INI_FILE'],'<b>'.INI_FILE.'.sample</b>','<b>'.INI_FILE.'</b>').'<br /><span class="annotation">('.sprintf($txt_install['located under the conf subdir of phpgraphy dir'],'<b>'.CONF_DIR.'</b>').')</span></li>
<li>'.sprintf($txt_install['open INI_FILE with your favorite text editor and replace admin_ip with your ip'],'<b>'.INI_FILE.'</b>','<b>admin_ip</b>','<b>'.$_SERVER['REMOTE_ADDR'].'</b>').'</li>
<li>'.sprintf($txt_install['upload INI_FILE on your webserver under the CONF_DIR dir'],'<b>'.INI_FILE.'</b>','<b>'.CONF_DIR.'</b>').'</li>

<li>'.$txt_install['finally, reload this page'].'</li>

</ul></div>
';
// <div style="font-size: 120%; margin: 20px">Your IP address: <b>'.$_SERVER['REMOTE_ADDR'].'</b></div>
            
        echo $html;        
        break;

/*********************
*
*  S T E P   T H R E E 
*
*********************/
  
       case 3:

            $error = 0;

            $html  = '<h2>'.$txt_install['Directories Permissions'].'</h2>';
            $html .= '<form action="'.SCRIPT_NAME.'" method="post">';
            $html .= "\n".'<div id="step-instructions">'.$txt_install['Checking that the webuser can write in the following directories :'].'<ul>';
           
            // List of the paths to test
            $is_writable_array = array(
                $config['pictures_dir'],
                $config['data_dir'],
                CONF_DIR,
                CONF_DIR.INI_FILE,
                LOG_DIR
                );

            foreach($is_writable_array as $res_path) {

                $html .= '<li>';

                if (is_dir($res_path)) {
                    $html .= sprintf($txt_install['Is directory %s writable ?'], '<b>'.$res_path.'</b>');
                } elseif (is_file($res_path)) {
                    $html .= sprintf($txt_install['Is file %s writable ?'], '<b>'.$res_path.'</b>');
                } else {
                    $html .= 'Non expect error occured';
                }

                if (is_writable($res_path)) {
                    $html .= '<span class="passed">'.$txt_install['test_result_passed'].'</span>';
                } else {
                    $html .= '<span class="failed">'.$txt_install['test_result_failed'].'</span>'.scust_error('00251');
                    $error=1;
                }
                $html .= '</li>';

            }
            
            $html .= '</ul>';

            // Some hosts are disabling this function, such we disable sessions use by default (even if it might work)
            if (function_exists('session_save_path')) {
            
                if (!is_writable(session_save_path())) {
                    $html .= sprintf($txt_install['Directory %s used to store the sessions is not writable and sessions support has been disabled'], '<b>'.session_save_path().'</b>'); 
                    $html .= '<input type="hidden" name="use_session" value="0" />';
                } else $html .= '<input type="hidden" name="use_session" value="1" />';

            } else $html .= '<input type="hidden" name="use_session" value="0" />';
 
            $html .= '</div><!--//step-instructions-->';

            if ($error) {
                $html .= '<div style="margin-top: 20px; font-size: 110%; font-weight: bold;">'.$txt_install['you can not proceed next step'].'</div>';
            } else {
                $html .= '
<input type="hidden" name="language_file" value="'.$_GET['language_file'].'" />
<input type="hidden" name="step" value="4" />
<button type="submit">'.$txt_install['next step'].'</button></form>
';
            }
            
            // $html .= '</div>';
        
        echo $html;        
        break;

/*********************
*
*  S T E P    F O U R
*
*********************/

       case 4:

            // Initialize arrays
            $supported_thumb_generator = array(
                'convert' => array(
                    'supported' => 0,
                    'unsupported_error_msg' => '',
                    'path' => ''
                    ),
                'gd' => array(
                    'supported' => 0,
                    'unsupported_error_msg' => '',
                    ),
                'manual' => array(
                    'supported' => 1
                    )
                );

            $supported_rotate_tool = array(
                'exiftran' => array(
                    'supported' => 0,
                    'unsupported_error_msg' => '',
                    'path' => ''
                    ),
                'jpegtran' => array(
                    'supported' => 0,
                    'unsupported_error_msg' => '',
                    'path' => ''
                    ),
                'none' => array(
                    'supported' => 1
                    )
                );

            $supported_movie_extractor = array(
                'ffmpeg' => array(
                    'supported' => 0,
                    'unsupported_error_msg' => '',
                    'path' => ''
                    ),
                'none' => array(
                    'supported' => 1
                    )
                );
       
            if (function_exists("exec")) define('EXEC_ALLOWED', true); else define('EXEC_ALLOWED', false);
            
            // Is GD supported
            if (function_exists(gd_info)) {
            
                $gd_info = gd_info();
                
                if ($gd_info["JPG Support"] == true) {
                
                    $supported_thumb_generator['gd']['supported'] = 1;    
                    
                } else $supported_thumb_generator['gd']['unsupported_error_msg'] = $txt_install['gd missing JPG support'];    
                
            } else $supported_thumb_generator['gd']['unsupported_error_msg'] = $txt_install['gd not supported'];   

            
            // Is 'convert' supported
            if (EXEC_ALLOWED) {

                $supported_thumb_generator['convert']['supported'] = 1;
           
                if (@exec('convert')) {
                
                    $supported_thumb_generator['convert']['path'] = 'convert';
                    
                } else $supported_thumb_generator['convert']['unsupported_error_msg'] = $txt_install['auto-detection failed'];
            
            } else $supported_thumb_generator['convert']['unsupported_error_msg'] = $txt_install['exec function disabled'];


            // Rotate Tool detection
            if (EXEC_ALLOWED) {

                $supported_rotate_tool['exiftran']['supported'] = 1;
                $supported_rotate_tool['jpegtran']['supported'] = 1;

                unset($output);
                unset($errcode);

                @exec('exiftran -h', $output, $errcode);
           
                if ($errcode == 0) {
                
                    $supported_rotate_tool['exiftran']['path'] = 'exiftran';
                    
                } else $supported_rotate_tool['exiftran']['unsupported_error_msg'] = $txt_install['auto-detection failed'];

                unset($output);
                unset($errcode);

                @exec('jpegtran -h', $output, $errcode);

                if (get_os() == "WIN") $expected_errcode = 0; else $expected_errcode = 1;

                if ($errcode == $expected_errcode) {
                
                    $supported_rotate_tool['jpegtran']['path'] = 'jpegtran';
                    
                } else $supported_rotate_tool['jpegtran']['unsupported_error_msg'] = $txt_install['auto-detection failed'];

            
            }
            
            // Movie extractor detection
            if (EXEC_ALLOWED) {

                $supported_movie_extractor['ffmpeg']['supported'] = 1;

                unset($output);
                unset($errcode);

                @exec('ffmpeg -version', $output, $errcode);

                $expected_errcode = 1;

                if ($errcode == $expected_errcode) {
                
                    $supported_movie_extractor['ffmpeg']['path'] = 'ffmpeg';
                    
                } else $supported_movie_extractor['ffmpeg']['unsupported_error_msg'] = $txt_install['auto-detection failed'];

            }


            // Display phase
            
            $html = '<h2>'.$txt_install['Image Tools Configuration'].'</h2>';
            $html .= '<div>'.$txt_install['Image Tools Configuration introduction'].'</div>'."\n";
            $html .= '<form name="imagetools" action="'.SCRIPT_NAME.'" method="post" class="margintop">';
            
            $html .= '<div id="imgtoolsreview" style="display: none">';
            $html .= $txt_install['choose your thumb generator'];
            $html .= '<select name="thumb_generator" onchange="javascript:switchThumbGenerator()">';
            $thumb_generator_found = 0;
            
            foreach($supported_thumb_generator as $thumb_generator => $thumb_generator_info) {

                if ($thumb_generator_info['supported']) {
                    if ($thumb_generator != 'manual') $thumb_generator_found = 1;
                    $html .= '<option value="'.$thumb_generator.'"';
                    if ($thumb_generator == 'gd') {
                        $html .= ' selected';
                        $selected_thumb_generator = 'gd';
                    }
                    /* Same story here, because IE doesn't handle onclick, we have to a onchange hack instead
                    $html .= ' onclick="javascript:switch_display_';
                    if ($thumb_generator == 'convert' && $thumb_generator_info['path'] != 'convert') $html .= 'on'; else $html .= 'off';
                    $html .= '(\'thumb_generator_path\')"';
                    */
                    $html .= '>'.$thumb_generator.'</option>';
                }
            }

            $html .= '</select>';

            // If convert has been autodetected, no need to display the path, set some javascript var to handle it (grrr IE !!!)
            $html .= '<script type="text/javascript">';
            if ($thumb_generator == 'convert' && $thumb_generator_info['path'] != 'convert') {
                $html .= 'var hideConvertPath = 0;';
            } else {
                $html .= 'var hideConvertPath = 1;';
            }
            $html .= '</script>';
            
            $html .= '<div id="thumb_generator_path" style="display:';
            if ($selected_thumb_generator == 'gd' 
                || $supported_thumb_generator['convert']['path'] == 'convert' 
                || !$supported_thumb_generator['convert']['supported']) $html .= 'none"'; else $html .= 'block';
            $html .= '">'; //.$txt_install['specify convert path'];
            $html .= '<span class="errormsg">'.$txt_install['auto-detection failed'].'</span><br />'.sprintf($txt_install['you need to specify %s path'],'convert');
            $html .= '<input name="thumb_generator_path" value="" />';
            $html .= '<div class="annotation">('.$txt_ie.' /usr/bin/convert )</div>';
            $html .= '</div><!--//thumb_generator_path-->'."\n";
            
            if (!$thumb_generator_found) {
                $html .= '<div>';
                // Explaining to the user why no thumb_generator has been found.
                $html .= $txt_install['no thumb_generator found intro'];
                $html .= '<ul>';
                foreach ($supported_thumb_generator as $thumb_generator => $thumb_generator_info) {
                    if ($thumb_generator != 'manual') {
                        $html .= '<li style="margin-top: 5px">'.$thumb_generator_info['unsupported_error_msg'].'</li>';
                    }
                }
                $html .= '</ul>';
                $html .= $txt_install['no thumb_generator found conclusion'];
                $html .= '</div>';
            }
            
            $html .= '<hr />'."\n";
            
            if (EXEC_ALLOWED) {
            
                $html .= $txt_install['choose your rotate tool'].'<select name="rotate_tool" onchange="javascript:switchRotateTool()">';
                
                foreach($supported_rotate_tool as $rotate_tool => $rotate_tool_info) {
                
                    $html .= '<option value="'.$rotate_tool.'"';
                    /* no onclick on IE...
                    $html .= ' onclick="javascript:switch_display_';
                    if ($rotate_tool_info['path'] != $rotate_tool && $rotate_tool != 'none') $html .= 'on'; else $html .= 'off';
                    $html .= '(\'rotate_tool_path\')"';
                    */
                    if ($rotate_tool_info['path'] != $rotate_tool && $rotate_tool != 'none') {
                        $hide_rotate_tool[$rotate_tool] = 0;
                    } else {
                        $hide_rotate_tool[$rotate_tool] = 1;
                    }
                    
                    if ($rotate_tool_info['path'] == $rotate_tool && !$selected_rotate_tool) {
                        $selected_rotate_tool = $rotate_tool;
                        $html .= ' selected';
                    } elseif ($rotate_tool == 'none' && !$selected_rotate_tool) $html .= ' selected';
                    $html .= '>'.$rotate_tool.'</option>';
                }
                $html .= '</select>';
                
                // If convert has been autodetected, no need to display the path, set some javascript var to handle it (grrr IE !!!)
                $html .= '<script type="text/javascript">';
                $html .= 'var hideRotateToolPath = new Array;';
                foreach ($hide_rotate_tool as $rotate_tool => $value) {
                    $html .= "hideRotateToolPath['$rotate_tool'] = $value;";
                }
                $html .= '</script>';
                
                $html .= '<div id="rotate_tool_path" style="display:none">';
                $html .= '<span class="errormsg">'.$txt_install['auto-detection failed'].'</span><br />'.$txt_install['you need to specify the program path'];
                $html .= '<input name="rotate_tool_path" value="" />';
                $html .= '<div class="annotation">('.$txt_ie.' /usr/bin/exiftran, /usr/bin/jpegtran )</div>';
                $html .= '</div>';
            
            } else $html .= $txt_install['rotate tool not available'] . scust_error('00303');

            $html .= '<hr />'."\n";

            // TODO: Move these two to language file
            $txt_install['choose your movie extractor'] = 'Please select an optional movie extractor tool : ';
            $txt_install['movie extractor not available'] = 'Movie extractor is not available with your configuration because exec() has been disabled.';

            if (EXEC_ALLOWED) {
            
                $html .= $txt_install['choose your movie extractor'].'<select name="movie_extractor" onchange="javascript:switchMovieExtractor()">';
                foreach($supported_movie_extractor as $movie_extractor => $movie_extractor_info) {
                
                    $html .= '<option value="'.$movie_extractor.'"';

                    if ($movie_extractor_info['path'] != $movie_extractor && $movie_extractor != 'none') {
                        $hide_movie_extractor[$movie_extractor] = 0;
                    } else {
                        $hide_movie_extractor[$movie_extractor] = 1;
                    }
                   
                    if ($movie_extractor_info['path'] == $movie_extractor && !$selected_movie_extractor) {
                        $selected_movie_extractor = $movie_extractor;
                        $html .= ' selected';
                    } elseif ($movie_extractor == 'none' && !$selected_movie_extractor) $html .= ' selected';
                    $html .= '>'.$movie_extractor.'</option>';
                }
                $html .= '</select>';
                
                // If convert has been autodetected, no need to display the path, set some javascript var to handle it (grrr IE !!!)
                $html .= '<script type="text/javascript">';
                $html .= 'var hideMovieExtractorPath = new Array;';
                foreach ($hide_movie_extractor as $movie_extractor => $value) {
                    $html .= "hideMovieExtractorPath['$movie_extractor'] = $value;";
                }
                $html .= '</script>';
                
                $html .= '<div id="movie_extractor_path" style="display:none">';
                $html .= '<span class="errormsg">'.$txt_install['auto-detection failed'].'</span><br />'.$txt_install['you need to specify the program path'];
                $html .= '<input name="movie_extractor_path" value="" />';
                $html .= '<div class="annotation">('.$txt_ie.' /usr/bin/ffmpeg, C:\FFmpeg/FFmpeg.exe )</div>';
                $html .= '</div>';
            
            } else $html .= $txt_install['movie extractor not available'] . scust_error('00303');


            if (!function_exists('exif_read_data')) {
                $html .= '<input type="hidden" name="use_exif" value="0" />';
                $html .= '<hr />'."\n";
                $html .= $txt_install['exif has been disabled'];
            }

            $html .= '</div><!--//imgtoolsreview-->';
            $html .= '<div>';
            $html .= '<input type="hidden" name="language_file" value="'.$_POST['language_file'].'" />';
            $html .= '<input type="hidden" name="step" value="5" />';
            $html .= '<input type="hidden" name="use_session" value="'.$_POST['use_session'].'" />';
            $html .= '<button type="submit">'.$txt_install['next step'].'</button></div></form>';

            $html .= $txt_install['If you know what you re doing, please use this button'];
            $html .= '<a href="#" onclick="switch_display(\'imgtoolsreview\')"><button>'.$txt_install['Show me the details'].'</button></a>';

        echo $html;
        break;

/*********************
*
*  S T E P   F I V E 
*
*********************/

       case 5:

// (If you can read the code here, you're lucky because there are so many cases to handle... it's a real headach !

            $html = '<h2>'.$txt_install['Database configuration'].'</h2>';
            $html .= '<form action="'.SCRIPT_NAME.'" method="post" name="database">';
            
            if ($_POST['database_type'] == 'mysql') {
                // We expect the following variables, let's check them and handle errors in the HTML itself
                $user_input = array('database_type', 'db_host', 'db_name', 'db_user', 'db_pass', 'db_prefix');
                foreach ($user_input as $field_name) {
                    $config_validation->check_var($field_name, $_POST[$field_name] );
                }
            }
            
            if ($_POST['database_type'] == 'mysql' && $config_validation->is_all_valid()) {
            
                $html .= '<input type="hidden" name="database_type" value="mysql" />';
            
                // Everything seems ok, let's try to connect to the DB
                include_once INCLUDE_DIR.'db_mysql.inc.php';
                
                // Register config variables needed by the scripts
                $config['db_name'] = $_POST['db_name'];
                $config['db_prefix'] = $_POST['db_prefix'];
               
                // MySQL Connection Test - 1st Layer
                if (!mysql_db_connect($_POST['db_host'], $_POST['db_name'], $_POST['db_user'], $_POST['db_pass'])) {
                    $html .= '<div style="font-weight: bold">'.$txt_install['mysql connection error, see errors'].'</div>';
                    $html .= '<div class="errormsg">'.$mysql_error.'</div>';
                } else {
                    // Yeah, we made it, connection is ok, now trying to create the table structure if it doesn't already exists
                        
                    if (!db_check_struct()) {
                        // It doesn't already exists, creating the structure
                        if (db_create_struct()) {
                            $skip_form = 1;
                            $html .= $txt_install['database structure sucessfully created'];
                        } else {
                            $html .= '<div style="font-weight: bold">'.$txt_install['error while creating database structure'].'</div>';
                            $html .= '<div class="errormsg">'.mysql_error().'</div>';
                        }
                    } else {
                        $skip_form = 1;
                        $html .= $txt_install['database structure already exists'];
                    }
                    
                }
                
            } else {

                $html .= $txt_install['choose your database backend'];
                $html .= '<select name="database_type" onchange="javascript:switchDatabaseType()">';
                $html .= '<option value="file")">Flat Files</option>';
                if (function_exists('mysql_connect')) {
                    $html .= '<option value="mysql"';
                    if ($_POST['database_type'] == 'mysql') $html .= ' selected';
                    $html .= '>MySQL</option>';
                }
                $html .= '</select>';

            }
            
            
            if (!$skip_form) {
            
            $html .= "\n".'<div id="mysql-details" class="margintop" style="display:';
            if ($_POST['database_type'] == 'mysql') $html .= 'block'; else $html .='none';
            
            $html .= '"><div style="font-weight: bold">'.$txt_install['mysql details title'];
            $html .= '</div>'."\n".'<div class="margintop">';
            $html .= '<label for="db_host">'.$txt_install['database host'].'</label><input type="text" name="db_host" value="'.$_POST['db_host'].'" />';
            if ($_POST['database_type'] && !$config_validation->is_valid('db_host')) $html .= ' <span class="invalid-field">'.$txt_install['remove invalid characters'].'</span>';
            $html .= '<div class="annotation">('.$txt_ie.' localhost, mysql.yourprovider.com )</div>';
            $html .= '</div>'."\n".'<div class="margintop">';
            $html .= '<label for="db_name">'.$txt_install['database name'].'</label><input type="text" name="db_name" value="'.$_POST['db_name'].'" />';
            if ($_POST['database_type'] && !$config_validation->is_valid('db_name')) $html .= ' <span class="invalid-field">'.$txt_install['remove invalid characters'].'</span>';
            $html .= '<div class="annotation">('.$txt_ie.' phpgraphy )</div>';
            $html .= '</div>'."\n".'<div class="margintop">';
            $html .= '<label for="db_user">'.$txt_install['database user'].'</label><input type="text" name="db_user" value="'.$_POST['db_user'].'" />';
            if ($_POST['database_type'] && !$config_validation->is_valid('db_user')) $html .= ' <span class="invalid-field">'.$txt_install['remove invalid characters'].'</span>';
            $html .= '</div>'."\n".'<div class="margintop">';
            $html .= '<label for="db_pass">'.$txt_install['database pass'].'</label><input type="text" name="db_pass" value="'.$_POST['db_pass'].'" />';
            if ($_POST['database_type'] && !$config_validation->is_valid('db_pass')) $html .= ' <span class="invalid-field">'.$txt_install['remove invalid characters'].'</span>';
            $html .= '</div>'."\n".'<div class="margintop">';
            $html .= '<label for="db_prefix">'.$txt_install['tables prefix'].'</label><input type="text" name="db_prefix" value="';
            if (!$_POST['db_prefix']) $html .= 'phpg_'; else $html .= $_POST['db_prefix'];
            $html .= '" />';
            if ($_POST['database_type'] && !$config_validation->is_valid('db_prefix')) $html .= ' <span class="invalid-field">'.$txt_install['remove invalid characters'].'</span>';
            $html .= '</div>';
            $html .= '</div><!--//mysql-details-->'."\n";
            
            // By default, we want to step in this step as we will run several check, if file mode is selected, we will automatically jump to next step
            $html .= '<input type="hidden" name="step" value="5" />';

            } else {
                // If we arrive there, database have already been filled-in, we just need to forward them to the next step
                foreach ($user_input as $field_name) {
                    $html .= '<input type="hidden" name="'.$field_name.'" value="'.$_POST[$field_name].'" />';
                }
                // We're ready for next step !
                $html .= '<input type="hidden" name="step" value="6" />';
            }
            
            {
            $html .= '<div>';
            // The hidden input is not the cleanest one ever but unfortunately, not all hosts support sessions...
            $html .= '<input type="hidden" name="language_file" value="'.$_POST['language_file'].'" />';
            if ($_POST['thumb_generator']) $html .= '<input type="hidden" name="thumb_generator" value="'.$_POST['thumb_generator'].'" />';
            if ($_POST['thumb_generator_path']) $html .= '<input type="hidden" name="thumb_generator_path" value="'.$_POST['thumb_generator_path'].'" />';
            if ($_POST['rotate_tool']) $html .= '<input type="hidden" name="rotate_tool" value="'.$_POST['rotate_tool'].'" />';
            if ($_POST['rotate_tool_path']) $html .= '<input type="hidden" name="rotate_tool_path" value="'.$_POST['rotate_tool_path'].'" />';
            if ($_POST['movie_extractor']) $html .= '<input type="hidden" name="movie_extractor" value="'.$_POST['movie_extractor'].'" />';
            if ($_POST['movie_extractor_path']) $html .= '<input type="hidden" name="movie_extractor_path" value="'.$_POST['movie_extractor_path'].'" />';
            if ($_POST['use_exif']) $html .= '<input type="hidden" name="use_exif" value="'.$_POST['use_exif'].'" />';
            $html .= '<input type="hidden" name="use_session" value="'.$_POST['use_session'].'" />';
            $html .= '<button type="submit">'.$txt_install['next step'].'</button></div></form>';
            }

        echo $html;        
        break;

/*********************
*
*  S T E P   S I X 
*
*********************/


       case 6:

            include INCLUDE_DIR.'db_'.$_POST['database_type'].'.inc.php';
            include INCLUDE_DIR.'functions_user-management.inc.php';
            
            unset($user_info);

            $html = '<h2>'.$txt_install['Administrator account creation'].'</h2>';

            if ($_POST['database_type'] == 'mysql') {
                // We expect the following variables, let's check them and handle errors in the HTML itself
                $user_input = array('database_type', 'db_host', 'db_name', 'db_user', 'db_pass', 'db_prefix');
                foreach ($user_input as $field_name) {
                    $config_validation->check_var($field_name, $_POST[$field_name] );
                }
                
                if ($config_validation->is_all_valid()) {
                    include_once INCLUDE_DIR.'db_mysql.inc.php';
                
                    // Register config variables need by the scripts
                    $config['db_name'] = $_POST['db_name'];
                    $config['db_prefix'] = $_POST['db_prefix'];
               
                    if (!mysql_db_connect($_POST['db_host'], $_POST['db_name'], $_POST['db_user'], $_POST['db_pass'])) {
                        $html .= '<div style="font-weight: bold">'.$txt_install['mysql connection error, see errors'].'</div>';
                        $html .= '<div class="errormsg">'.$mysql_error.'</div>';
                    }
                }
                
            }


            if ($_POST['login'] || $_POST['password']) {

                // PROCESS+SAVE USER INFORMATION

                // Force default
                $_POST['security_level'] = 999;
                $_POST['uid'] = -1;

                $user_info = process_user_information();

                $error_message = '';
                if(isSet($user_info['error'])) {
                
                    $error_message = implode("<br>\n", $user_info['error']);
                    
                } else {
                    // Final msg
                    if (edit_user_information($user_info)) {
                      $html .= '<div>'.sprintf($txt_install['Congratulations, administrator account %s has been created'], '<b>'.$user_info['login'].'</b>').'</div>';
                    } else {
                      $error = 1;
                      $html .= '<div>'.$txt_install['An error has occured while creating your administrator account'].'</b></div>';
                    }
                                        
                    // Write INI_FILE
                    $expected_variables = array(
                        'language_file','thumb_generator','thumb_generator_path', 'rotate_tool', 'rotate_tool_path',
                        'use_exif', 'use_session', 'database_type', 'db_host', 'db_name', 'db_user', 'db_pass', 'db_prefix');
                    $new_config = array();
                    
                    foreach ($_POST as $key => $value) {
                        if ($config_validation->check_var($key, $value)) {
                            $new_config[$key] = $value;
                        }
                    }
                   
                    if (write_phpgraphy_ini(CONF_DIR.INI_FILE, $new_config)) {
                        $html .= '<div class="margintop">'.$txt_install['Configuration file has been saved'].'</div>';
                    } else {
                      $error = 1;
                      $html .= '<div>'.$txt_install['An error has occured while saving your configuration file'].'</b></div>';
                    }

                    // Create the initial .welcome file if not already there and pictures/ directory seems virgin
                    if (!is_file($config['pictures_dir'].'.welcome') && !scan_dir($config['pictures_dir'], NULL, 0)) {
                        write_welcome('.', $txt_install['welcome file content']);
                    }
                    
                    if (!$error) {
                      $html .= '<div class="margintop">'.$txt_install['You can now access your phpgraphy site'].'</div>';
                    } else {
                      $html .= '<div class="margintop">'.$txt_install['One or more problems have occured and your installation is NOT properly finished, please contact the phpGraphy DevTeam with the details of your error(s)'].'</div>';
                    }
                   
                }
            }
            
             if (isSet($user_info['error']) || (!$_POST['login'] && !$_POST['password'])) {

                $html .= '<form action="'.SCRIPT_NAME.'" method="post" name="user_management">';
            
                if (!$error_message) {
                    $html .= $txt_install['please choose a login and password'];
                } else {
                    $html .= '<div class="errormsg"><b>';
                    $html .= $txt_error["00800"];
                    $html .= '</b><br />'.$error_message.' </div>';
                }
            
                $html .= '<div class="margintop"><label for="login" title="'.$txt_login_rule.'">'.$txt_um_login.' :</label> 
                      <input id="login" name="login" type="text" title="'.$txt_login_rule.'" 
                       value="'.$user_info['login'].'" size="15" maxlength="20" tabindex="1" />
                      <div class="annotation">('.$txt_ie.' administrator)</div></div>';
                        
                $html .= '<div class="margintop"><label for="password" title="'.$txt_pass_rule.'">'.$txt_um_pass.' :</label>
                        <input id="password" name="password" type="password" title="'.$txt_pass_rule.'" 
                        value="" size="15" maxlength="32" tabindex="2" /></div>';
                        
                $html .= '<div>';
                // The hidden input is not the cleanest one ever but unfortunately, not all hosts support sessions...
                $html .= '<input type="hidden" name="language_file" value="'.$_POST['language_file'].'" />';
                $html .= '<input type="hidden" name="thumb_generator" value="'.$_POST['thumb_generator'].'" />';
                if ($_POST['thumb_generator_path']) $html .= '<input type="hidden" name="thumb_generator_path" value="'.$_POST['thumb_generator_path'].'" />';
                if ($_POST['rotate_tool']) $html .= '<input type="hidden" name="rotate_tool" value="'.$_POST['rotate_tool'].'" />';
                if ($_POST['rotate_tool_path']) $html .= '<input type="hidden" name="rotate_tool_path" value="'.$_POST['rotate_tool_path'].'" />';
                if ($_POST['movie_extractor']) $html .= '<input type="hidden" name="movie_extractor" value="'.$_POST['movie_extractor'].'" />';
                if ($_POST['movie_extractor_path']) $html .= '<input type="hidden" name="movie_extractor_path" value="'.$_POST['movie_extractor_path'].'" />';
                if ($_POST['use_exif']) $html .= '<input type="hidden" name="use_exif" value="'.$_POST['use_exif'].'" />';
                $html .= '<input type="hidden" name="use_session" value="'.$_POST['use_session'].'" />';
                $html .= '<input type="hidden" name="database_type" value="'.$_POST['database_type'].'" />';
                if ($_POST['database_type'] == 'mysql') {
                    $html .= '<input type="hidden" name="db_host" value="'.$_POST['db_host'].'" />';
                    $html .= '<input type="hidden" name="db_name" value="'.$_POST['db_name'].'" />';
                    $html .= '<input type="hidden" name="db_user" value="'.$_POST['db_user'].'" />';
                    $html .= '<input type="hidden" name="db_pass" value="'.$_POST['db_pass'].'" />';
                    $html .= '<input type="hidden" name="db_prefix" value="'.$_POST['db_prefix'].'" />';
                }
                $html .= '<input type="hidden" name="step" value="6" />';
                $html .= '<button type="submit" tabindex="3">'.$txt_form_submit.'</button></div></form>';
            }
            
        echo $html;
        break;

       default:

            $html = 'If you see this text, the install.php contain a logic error, please contact phpGraphy DevTeam.';
            
        echo $html;        
        break;


        break;

    }

?>
</div> <!--//stepcontent-->

<?php

if (STEP != 1) echo '<div style="margin-top: 20px"><a href="javascript:history.go(-1)">'.$txt_go_back.'</a></div>'."\n";

    echo '</div><!--//installbox-->'."\n";
    include CURRENT_THEME_DIR.FOOTER_FILE;
    // print_r_html($_REQUEST);
    die();


?>
