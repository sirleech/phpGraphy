<?php
/*
*  Copyright (C) 2004-2007 JiM / aEGIS (jim _at_ aegis _hyphen_ corp _dot_ org) and phpGraphy DevTeam
*  Copyright (C) 2000-2001 Christophe Thibault
*  Rating system added by sIX / aEGIS
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
*  $Id: index.php 429 2008-06-25 11:05:06Z jim $
*
*/

/*
*  Feel free to modify anything you want here but remember that then, it's gonna be difficult
*  to upgrade so you better contact me so we can discuss about what you would like to change
*  and/or customize and if it make sense, you'll perhaps see what you've requested...
*  ...in the next release !
*
*  Remember, it's also YOU that help me to make/keep phpGraphy what it is actually !
*
*					JiM / aEGIS and the phpGraphy DevTeam
*/


if (function_exists('ini_get') && ini_get('register_globals')) {

    /* If register_globals is set to on, avoid possible config variable hacks */
    $config = null;
    unset($config);

}

if (function_exists('ini_get') && function_exists('ini_set')) {

    /* If there is no include path, try to set one by default */
    if (trim(ini_get('include_path')) == '') {
        @ini_set('include_path', '.');
    }

}


/*****
*
*        Local Constants Declaration (used internally, NOT in HTML output because of DIR_SEP)
*
*****/

define('DIR_SEP', '/');
define('PHPGRAPHY_DIR', dirname(__FILE__) . DIR_SEP);     // phpGraphy root absolute directory
define('BASE_DIR', 'base' . DIR_SEP);                     // Contains application base files (relative, for links)
define('BASE_DIR_ABS', PHPGRAPHY_DIR . 'base' . DIR_SEP); // Contains application base files (absolute, for includes)
define('INCLUDE_DIR', BASE_DIR_ABS. 'include' . DIR_SEP); // Contains include files
define('LANG_DIR', BASE_DIR_ABS . 'lang' . DIR_SEP);      // Contains languages files
define('LOG_DIR', PHPGRAPHY_DIR . 'logs' . DIR_SEP);       // Contains log(s) files
define('DATA_DIR', BASE_DIR_ABS . 'data' . DIR_SEP);      // Contains internal static data(s) files
define('THEMES_DIR', 'themes' . DIR_SEP);                 // Contains themes (one subdirectory per theme)
define('CONF_DIR', 'conf' . DIR_SEP);                     // Contains configuration files
define('TPL_ENGINE_DIR', BASE_DIR_ABS . '3rd-part/class.template' . DIR_SEP);

define('INI_FILE', 'config.ini.php');
define('CONFIG_REF_FILE', 'default-config.inc.php');
define('DEFAULT_LANG_FILE', 'lang_en.inc.php');
define('HEADER_FILE', 'header.inc.php');
define('FOOTER_FILE', 'footer.inc.php');
define('PHPGRAPHY_VERSION','0.9.13b');
define('LOG_FILE', LOG_DIR . 'phpgraphy.log');
define('CUSTOM_LANG_FILE', 'lang_cust.inc.php');

// NOTE: Usage of these constants is deprecated, please use phpGraphyNamingStandard class instead
define("DIRECTORY_PICTURE_NAME", "directory.jpg");
define("DIRECTORY_THUMB_PATH", ".thumbs/thumb_".DIRECTORY_PICTURE_NAME);


/**********************************************
****        Static Include section          ***
**********************************************/


require_once INCLUDE_DIR .  CONFIG_REF_FILE;
require_once INCLUDE_DIR . 'functions_global.inc.php';
require_once INCLUDE_DIR . 'functions_graphical.inc.php';


/***************************************************
****  Configuration  Initialization & Validation ***
***************************************************/

if (is_file(CONF_DIR.INI_FILE)) {

    load_config_ini(CONF_DIR.INI_FILE);

} else {
    // Redirect to installation page
    // header("Location: install.php");
    header( 'refresh: 3; url=install.php' );
    echo '<h3>New installation detected, you will be redirected in 3 seconds...</h3>';
    exit;

}

if (!validate_running_config()) {
    trigger_error(CONF_DIR.INI_FILE.' contains error(s), please correct the problem(s) and reload the page', E_USER_ERROR);
}


/*****************************************************
****          Dynamic Include/Define section       ***
*****************************************************/

// For internal use (include, etc.)
define('CURRENT_THEME_DIR', THEMES_DIR.$config['theme'].DIR_SEP);

// For external use (within content was will be output and for which we need '/')
$theme_dir = CURRENT_THEME_DIR;
$base_3rd_part_dir = BASE_DIR . '3rd-part/';
$base_images_dir = BASE_DIR . 'images/';
$base_styles_dir = BASE_DIR . 'styles/';
$base_js_dir = BASE_DIR . 'js/';


if ($config['script_name']) {
    define('SCRIPT_NAME', $config['script_name']);
} else define('SCRIPT_NAME', $_SERVER['SCRIPT_NAME']);

// You might want to use SERVER_NAME instead of HTTP_HOST - HTTP_HOST seems to deal better with domain alias than SERVER_NAME
define('HTTP_HOST', $_SERVER['HTTP_HOST']);

if ($config['use_exif'] || $config['use_iptc']) include_once INCLUDE_DIR."functions_metadata.inc.php";

if($config['database_type']=="mysql") require_once INCLUDE_DIR."db_mysql.inc.php";
elseif($config['database_type']=="file") require_once INCLUDE_DIR."db_file.inc.php";
else die("ERROR, Please choose either 'mysql' or 'file' as database type in your config file");


/**********************************************
****        Error Handler init              ***
**********************************************/

include_once INCLUDE_DIR . 'yorsh-errorhandler.class.php';

// Set PHP error reporting to max level
error_reporting(E_ALL ^ E_NOTICE);

// Define parameters depending of $config['debug_mode']

switch ($config['debug_mode']) {

    case 0:
    define('ERROR_REPORT_LEVEL', 'FATAL');
    // error_reporting(0);
    $error_display = 1;
    $error_log = 1;
    $error_verbose = 0;
    $error_generic = 1;

    break;

    case 1:
    define('ERROR_REPORT_LEVEL', 'ERROR');
    $error_display = 1;
    $error_log = 1;
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

    case 4:
    define('ERROR_REPORT_LEVEL', 'DEBUG');
    $error_display = 1;
    $error_log = 1;
    $error_verbose = 1;
    $error_generic = 0;

    break;

    default:
    die('<b>FATAL ERROR</b>, Current value set for <a href="docs/phpgraphy-manual.html#config.debug_mode"><b>debug_mode</b></a> in <b>conf/config.ini.php</b> is incorrect, please read the manual to see what values are allowed, correct the problem and reload this page');

}

$error_handler =& new YorshErrorHandler($error_display, $error_log, $error_verbose, $error_generic);

// Don't display DEBUG messages but keep them safe in a buffer
$error_handler->setBufferizeDebug(1);

/**********************************************
****    Configuration check & Init          ***
**********************************************/

if ($config['debug_mode'] >= 4) {
    $error_handler->disableDisplay();
    trigger_error('DEBUG: --MARK-- Configuration Check & Init', DEBUG);
    $error_handler->restoreDisplay();
}


if ($_GET['displaypic'] || $_GET['previewpic']) {
    /**
     * For now, only used to know if we can output error messages
     * Typically, when the script is called to display an image,
     * it's considered in BACKGROUND_MODE
     */
    define('BACKGROUND_MODE', TRUE);
    $error_handler->setDisplay(0);
}

if (is_readable(LANG_DIR.DEFAULT_LANG_FILE)) include_once LANG_DIR.DEFAULT_LANG_FILE; else trigger_error("Can NOT open the default language file '".DEFAULT_LANG_FILE."'", FATAL);


if ($config['database_type'] == 'mysql') {

    if (!mysql_db_connect($config['db_host'], $config['db_name'], $config['db_user'], $config['db_pass'])) {
        trigger_error("DEBUG: MySQL Error: ".$mysql_error, DEBUG);
        trigger_error("Unable to connect to MySQL database", FATAL);
    }
}

if (!is_writable($config['data_dir'])) {

    trigger_error("Your data directory is NOT writable, check the permissions", FATAL);

}

if (is_dir($config['data_dir'].'compiled')) {
    if (!is_writable($config['data_dir'].'compiled')) {
        trigger_error("'".$config['data_dir'].'compiled'."' directory is NOT writable, check the permissions", FATAL);
    }
} else {
    mkdir($config['data_dir'].'compiled');
}



if (!is_readable($config['pictures_dir'])) trigger_error('Can not access <b>pictures_dir</b> directory, either change the path in your config file or check the permissions', FATAL);

// Defining which image/types are handled (depending on the $config['thumb_generator'])
// TODO: Rewrite a clean method that is used everywhere, in the meantime, this should do the job
if ($config['thumb_generator'] == "convert") {

    // Unfortunately, even if convert does definitly handle tiff files,
    // the actual code because it assumes the thumb/lowres does have
    // the exact same name and so the same extension and browsers don't
    // handle anything but jpeg, gif and png...
    $handled_image_types_preg = '/\.(jpe?g|gif|png)$/i';

} elseif ($config['thumb_generator'] == "gd") {

    $handled_image_types_preg = '/\.(jpe?g|gif|png)$/i';

} else {
    // Fall-back to "manual", all the pictures are theoritically handled
    // the only limitation being the user web browser

    $handled_image_types_preg = '/\.(jpe?g|gif|png)$/i';

}

if ($config['language_file'] && $config['language_file'] != DEFAULT_LANG_FILE) {
    if (is_file(LANG_DIR.$config['language_file'])) {
        include_once LANG_DIR.$config['language_file'];
    } else trigger_error("Can NOT open non-default language file '".$config['language_file']."' defined in the config. ", ERROR);
}

if (is_file(CURRENT_THEME_DIR.CUSTOM_LANG_FILE)) include_once CURRENT_THEME_DIR.CUSTOM_LANG_FILE;

if ($config['use_sem'] && !function_exists(sem_get)) {
    $config['use_sem'] = 0;
    trigger_error("use_sem is actually set to active in your config file but your php was not compiled with the semaphore option. Please disable it as you may encounter problems", WARNING);
}

if ($config['use_direct_urls']) {
    if (is_file($config['pictures_dir'].'.htaccess')) cust_error('00201');
}

if (function_exists('ini_get') && ini_get('safe_mode')) {
    define('SAFE_MODE', true);
} else define('SAFE_MODE', false);


/**********************************************
****    Classes Init / Object creations     ***
**********************************************/

require_once INCLUDE_DIR . 'filetypes.class.php';
require_once INCLUDE_DIR . 'filetypes_data.inc.php';
$pgFileTypes = new handledphpGraphyFileTypes();

require_once INCLUDE_DIR . 'phpgraphy-naming-standard.class.php';
$phpGraphyNaming = new phpGraphyNamingStandard();

/**********************************************
****        Template Engine Init            ***
**********************************************/

if ($config['debug_mode'] >= 4) {
    $error_handler->disableDisplay();
    trigger_error('DEBUG: --MARK-- Template Engine Init', DEBUG);
    $error_handler->restoreDisplay();
}
require_once TPL_ENGINE_DIR."class.template.php";

$tpl = new template;
$tpl->force_compile = true;
$tpl->compile_check = true;
$tpl->cache = false;
$tpl->cache_lifetime = 3600;
$tpl->config_overwrite = false;
$tpl->template_dir = PHPGRAPHY_DIR . CURRENT_THEME_DIR . 'templates' . DIR_SEP;
$tpl->compile_dir = PHPGRAPHY_DIR . $config['data_dir'] . 'compiled';


/**********************************************
****        Session handling                ***
**********************************************/

if ($config['debug_mode'] >= 4) {
    $error_handler->setDisplay(0);
    trigger_error('DEBUG: --MARK-- Session Handling', DEBUG);
    $error_handler->setDisplay(1);
}

if ($config['use_session']) {

    if (is_writable(session_save_path())) {

        // Line below added so the page is still W3C valid
        if (function_exists("ini_set")) ini_set("arg_separator.output","&amp;");

        session_start();

    } else {

        $config['use_session'] = 0;
        trigger_error("\$config['use_session'] is set to 1 in the config file but the server session_save_path ".session_save_path()." is currently not writable - correct the directory problem or disable the sessions use", WARNING);

    }
}


/****************************************************************
****  $_REQUEST ($_GET / $_POST / $_COOKIE) input validation  ***
****************************************************************/

if ($config['debug_mode'] >= 4) {
    $error_handler->disableDisplay();
    trigger_error('DEBUG: --MARK-- $_REQUEST input validation', DEBUG);
    $error_handler->restoreDisplay();
}
require_once INCLUDE_DIR.'yorsh-variablevalidation.class.php';
// Extend the class with $_REQUEST data
require_once INCLUDE_DIR.'yorsh-varval-request_data.inc.php';

// Create object that will be used to validate $_REQUEST
$request_validation = new RequestYorshVariableValidation();

foreach ($_REQUEST as $varname => $value) {

    // Removing slashes if already added by magic_quotes_gpc
    // (We will handle the quote protection at the DB Layer)
    if (get_magic_quotes_gpc()) {
        $value=stripslashes($value);
    }

    if ($request_validation->check_var($varname, $value)) {
        // Registering $varname in the global scope if not a COOKIE
        if (!isset($_COOKIE[$varname])) {

            // trigger_error("DEBUG: Registering \$".$varname." in the global scope", WARNING);
            $$varname=$value;

        } else {

            // Unregistering COOKIE value from global scope, we don't want it there
            trigger_error("DEBUG: Cookie content for ".$varname." has been cleared from the global scope", DEBUG);
            if (isset($$varname)) $$varname = null;

        }

    } else {

        // Unregistering variable from globalscope if registered by register_globals
        $error_handler->disableDisplay();
        if (isset($$varname)) $$varname = null;
        trigger_error("DEBUG:".$varname." has not cleared from the global scope", DEBUG);
        $error_handler->restoreDisplay();

    }

}


/*****************************************
****   Login/Logout - SessionHandling  ***
*****************************************/

if ($config['debug_mode'] >= 4) {
    $error_handler->disableDisplay();
    trigger_error('DEBUG: --MARK-- Login/Logout - SessionHandling', DEBUG);
    $error_handler->restoreDisplay();
}
// Output Buffering
if ($config['use_ob']) ob_start();


// logout ?
if($logout) {
    if ($_COOKIE['phpGraphyLoginValue']) set_cookie_login_val("");
    session_unset();
    header("Location: " . SCRIPT_NAME);
    exit;
}

// logging in ?
$user_row = null;
$logged = 0;

if ($startlogin) {

    if (!headers_sent()) {

        if ($user_row=is_login_ok($user,$pass)) {
            if ($rememberme) {
                set_cookie_login_val($user_row["cookieval"]);
            }
            $_SESSION['phpGraphyLoginValue']=$user_row["cookieval"];
            $logged=1;
        } else {
            trigger_error("DEBUG: authentication of user '$user' FAILED", DEBUG);
            trigger_error("Authentication failed, invalid login/password", ERROR);
            $error_login=1;
            // Re-set $login to ask again for a login/pass
            $login=1;
        }

    } else trigger_error("In order for the authentication to work, you must resolve the error above", ERROR);

} elseif ($_COOKIE['phpGraphyLoginValue']) { // login cookie present ?

    if (!BACKGROUND_MODE) {
        $error_handler->disableDisplay();
        trigger_error("DEBUG:Found an authentication cookie, trying to match it with a login", DEBUG);
        $error_handler->restoreDisplay();
    }

    if ($user_row=db_get_login($_COOKIE['phpGraphyLoginValue'])) {
        if (!BACKGROUND_MODE) {
            $error_handler->disableDisplay();
            trigger_error('DEBUG:User \''.$user_row['login'].'\' successfully authenticated', DEBUG);
            $error_handler->restoreDisplay();
        }
        $logged=1;
    } else {
        set_cookie_login_val("");
        trigger_error("An invalid authentication cookie has been found and deleted", WARNING);
    }

} elseif ($_SESSION['phpGraphyLoginValue']) { // valid session present ?

    $error_handler->disableDisplay();
    trigger_error("DEBUG:Found a session cookie, trying to match it with a login", DEBUG);
    $error_handler->restoreDisplay();

    if ($user_row=db_get_login($_SESSION['phpGraphyLoginValue'])) {
        $error_handler->disableDisplay();
        trigger_error('DEBUG:User \''.$user_row['login'].'\' successfully authenticated', DEBUG);
        $error_handler->restoreDisplay();
        $logged=1;
    } else {
        trigger_error("Session authentication error, try closing your browser or removing the session cookie", WARNING);
    }

}

$admin=($user_row["seclevel"]==999);


/******************************************************
****   Main program - $_REQUEST dependant behavior  ***
******************************************************/

if ($config['debug_mode'] >= 4) {
    $error_handler->disableDisplay();
    trigger_error('DEBUG: --MARK-- Main program - $_REQUEST dependant behavior', DEBUG);
    $error_handler->restoreDisplay();
}
// Assign a value to $dir if not done already
if($display && (dirname($display) != ".")) $dir=dirname($display);

// Directory name NEED a trailing slash !
if($dir && substr($dir,-1)!='/') $dir.='/';


// pic rating update ?

if ($display && $rating) {
    // TODO: Translate errors
    if (!already_rated($display)) {
        if ($rating > 0 && $rating <= $config['highest_rating']) {
            if (!db_add_rating($display,$rating)) trigger_error("An error has occured while recording rating", WARNING);
        } else trigger_error("Rating value should be between 1 and ".$config['highest_rating'], ERROR);
    } else trigger_error("You've already voted", ERROR);
}

// adding comment ?

if(isset($addingcomment) && (trim($comment) || trim($user))) {

    if ((int)$user_row["seclevel"] < $config['postcomment_min_level']) {
        trigger_error("You don't have enough privileges to post a comment", E_USER_NOTICE);
        exit;
    }

    $picname=reformat($picname);
    if ($rememberme && $user) set_cookie_commentname_val($user);
    if (!$rememberme && $_COOKIE['phpGraphyVisitorName']) set_cookie_commentname_val("");
    // if value has been filtered, replace it with a filtered msg
    if ($_REQUEST['comment'] && !$comment) $comment = $txt['*filtered*'];
    if ($_REQUEST['user'] && !$user) $user = $txt['*filtered*'];

    db_add_user_comment($picname,$comment,$user); ?>
<html><script language="javascript">window.opener.location="?display=<?php echo rawurlencode($picname) ?>";window.close();</script></html>
<?php
exit;
}


/***************************************************
****         Main program but ADMIN only       *****
***************************************************/

if ($admin) {

    if ($config['debug_mode'] >= 4) {
        $error_handler->disableDisplay();
        trigger_error('DEBUG: --MARK-- Main program - ADMIN only part', DEBUG);
        $error_handler->restoreDisplay();
    }
    // pic comment update ?
    if ($updpic == "1" && $admin) db_update_pic($display,$dsc,$lev);

    // dir level update ?
    if ($updatedir && $admin) db_update_pic($dir,$dirtitle,$dirlevel);

    // directory cover picture change
    if ($dirthumbchange && $dirthumbnail && $admin) {
        if (is_file($phpGraphyNaming->getFileFullPath($dir.$dirthumbnail))) {

            $dirthumbnail = $phpGraphyNaming->getThumbPath($dir.$dirthumbnail);

        } elseif (is_file($phpGraphyNaming->pictures_directory.$phpGraphyNaming->getThumbPathForDirectory($dir.$dirthumbnail))) {

            $dirthumbnail = $phpGraphyNaming->getThumbPathForDirectory($dir.$dirthumbnail);

        } elseif ($dirthumbnail != "-remove-") {
            trigger_error("Unable to find source picture '$dirthumbnail' to update '$dir' cover.", ERROR);
            $dirthumbnail_error = 1;
        }

        if (!$dirthumbnail_error) {
            trigger_error("DEBUG:Updating directory cover for directory '$dir' with '$dirthumbnail'", DEBUG);
            update_directory_cover($dir, $dirthumbnail);
        }
    }

    // dir creation ?
    if ($admin && $dircreate && $createdirname != "") {
        if (!mkdir($config['pictures_dir'].$dir.$createdirname,0755)) trigger_error("Unable to create ".$dir, ERROR);
        if ($config['default_file_permissions']) chmod($config['pictures_dir'].$dir.$createdirname, $config['default_file_permissions']);
    }

    // file uploaded ?
    if ($admin && $picupload && is_array($_FILES['pictures'])) {

        trigger_error("DEBUG: File upload detected", E_USER_NOTICE);

        foreach ($_FILES["pictures"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
                $filename = basename($_FILES['pictures']['name'][$key]);
                $destpath = $config['pictures_dir'].$dir."/";
                trigger_error("DEBUG: Moving uploaded file \"$filename\" to $destpath", DEBUG);
                if (!is_file($destpath.$filename)) {

                    if (!move_uploaded_file($tmp_name, $destpath.$filename)) {
                        trigger_error("Failed to move uploaded file \"$filename\" to $destpath", ERROR);
                    }

                    if ($config['default_file_permissions']) {
                        trigger_error('DEBUG: Setting permissions of '.$filename.' to '.$config['default_file_permissions'], DEBUG);
                        chmod($destpath.$filename, octdec($config['default_file_permissions']));
                    }

                } else {
                    unlink($tmp_name);
                    cust_error('00401', $filename);
                }
            }
        }

    }

    // file copy from an url ? (Need PHP 4.3.0)
    if ($admin && $copyfromurl && $userurl) {

        $filename=basename($userurl);
        $full_dir=$config['pictures_dir'].$dir;

        if (!is_file($full_dir.$filename)) {

            if (is_writable($full_dir)) {
                if (!copy($userurl,$full_dir.$filename)) trigger_error('Copy from url failed', ERROR);
            } else trigger_error("Unable to write in $dir", ERROR);

            if ($config['default_file_permissions']) {
                trigger_error('DEBUG: Setting permissions of '.$filename.' to '.$config['default_file_permissions'], DEBUG);
                chmod($full_dir.$filename, octdec($config['default_file_permissions']));
            }

        } else {

            cust_error('00401', $filename);

        }
    }



    // deleting comment ?

    if($admin && $delcom) db_del_user_comment($display,$delcom);

    // updating .welcome ?

    if ($admin && $updwelcome && isset($welcomedata) && check_welcome($dir)) {
        if (strlen($welcomedata) < 10000) {
            write_welcome($dir,$welcomedata);
            echo "<html><script language=\"javascript\">window.opener.location=\"?dir=".rawurlencode($dir)."\";window.close();</script></html>";
        } else echo "Sorry more data (10k) than allowed, protection aborting the operation<br />";
        exit;
    }

    // rotating image ?

    // NB: As we use the user input validation now, we won't re-check the validity of the input

    if ($admin && $display && $rotatepic) {

        // Get the rotation value (1, 2 or 3)
        $rotate_value=$rotatepic;

        // We first delete the lowres and thumb as they won't be valid anymore
        delete_pic($display,"thumb");

        trigger_error("DEBUG: calling rotate_image($display,$rotate_value)", E_USER_NOTICE);
        rotate_image($config['pictures_dir'].$display, $rotate_value);

    }

    // pic delete
    if($updpic=="del"&&$admin) {
        delete_pic($display);
        //jump back to the directory after deleting the pic
        $dir=dirname($display);
        header("Location: ./?dir=$dir&startpic=$i");
        exit;
    }

    // Delete thumbs and lr pictures (handful function when generation has failed for some reasons)
    if($updpic=="delthumb"&&$admin) {
        delete_pic($display,"thumb");
        //jump back to the directory after deleting the pic
        $dir=dirname($display);
        header("Location: ./?dir=$dir&startpic=$i");
        exit;
    }

}// EOF if ($admin)

/***************************************************************
****  Main program (background operations/image display)   *****
***************************************************************/

if ($config['debug_mode'] >= 4) {
    $error_handler->disableDisplay();
    trigger_error('DEBUG: --MARK-- Main program - background operations/image display', DEBUG);
    $error_handler->restoreDisplay();
}

// If random picture, pickup a random pic and assign it to $display, $displaypic or $previewpic

if (isset($random)) {

    $level = 0;
    if ($logged) $level = (int)$user_row["seclevel"];
    $ok = 0;
    srand ((double) microtime() * 1000000);

    if ($find_ar=scan_dir($config['pictures_dir'], $handled_image_types_preg)) {

        $l=sizeof($find_ar) - 1;
        for($try=0;!$ok && $try<32;$try++) {
            $random_nb=rand(0,$l);
            $pickline=substr($find_ar[$random_nb],strlen($config['pictures_dir']));

            if (get_level($pickline) <= $level) $ok = 1;

        }

        if ($ok) {

            if (isset($previewpic)) {
                $previewpic = $pickline;
            } elseif (isset($displaypic)) {
                $displaypic = $pickline;
            } else {
                $display = $pickline;
                $dir = substr($display,0,strrpos($display,"/"))."/";
            }
        }

    }
}


// BEGIN - DISPLAYPIC

if($displaypic && get_level($displaypic)<=(int)$user_row["seclevel"]) {

    // This is all background, don't ouput errors
    $error_handler->disableDisplay();

    if ($config['debug_mode'] >= 4) {
        trigger_error('DEBUG: --MARK-- Main program - displaying picture in highres/lowres', DEBUG);
    }

    // If handled content but not image, send content with mime type
    if($pgFileTypes->isHandled($displaypic) && !$pgFileTypes->isImage($displaypic)) {
        header("Content-type: ".$pgFileTypes->getFileMimeType($displaypic));
        if ($mode == 'saveas') header('Content-Disposition: attachement; filename="'.basename($displaypic).'"');
        else header('Content-Disposition: inline; filename="'.basename($displaypic).'"');
        readfile($config['pictures_dir'].$displaypic);
        exit;
    }

    // Do we handle this type of picture ?
    if (!$pgFileTypes->isImage($displaypic)) {
        header("Content-type: image/gif");
        readfile($base_images_dir.'unknow_type.gif');
        trigger_error("Can't display '".basename($displaypic)."', picture type not supported", FATAL);
    }

    // Fall back to default - handled image type
    header("Content-type: " . $pgFileTypes->getFileMimeType($displaypic));

    if(filesize($phpGraphyNaming->getFileFullPath($displaypic))>=$config['lr_limit'] && !$non_lr) {

        // switch to lr_mode
        $lrdir = $phpGraphyNaming->getLowresFullDir($displaypic);
        $lrfile = $phpGraphyNaming->getLowresFullPath($displaypic);

        if(!file_exists($lrfile)) {

            if ($config['thumb_generator'] == 'manual') {
                trigger_error("No lowres found for '$displaypic' generate one yourself or choose a thumb_generator", FATAL);
            }

            if (!is_dir($lrdir)) {
                if (!@mkdir($lrdir,0755)) {
                    trigger_error("mkdir($lrdir) failed", ERROR);
                }
                if ($config['default_file_permissions']) chmod($lrdir, $config['default_file_permissions']);
            }

            if (!convert_image($phpGraphyNaming->getFileFullPath($displaypic),$lrfile,$config['lr_res'],$config['lr_quality'])) {
                trigger_error("convert_image() of '$displaypic' has failed", FATAL);
            }
        }

        if(file_exists($lrfile)) {
            header('Content-Disposition: inline; filename="'.'lr_'.basename($displaypic).'"');
            readfile($lrfile);
            trigger_error('DEBUG: --MARK-- Main program - Just displayed lowres pic "'.$lrfile.'"', DEBUG);
        } else {
            trigger_error("File '$lrfile' is not readable or does not exist", ERROR);
        }
        exit;

    } elseif (filesize($phpGraphyNaming->getFileFullPath($displaypic))<$config['lr_limit'] || (int)$user_row["seclevel"]>=$config['highres_min_level']) {

        header('Content-Disposition: inline; filename="'.basename($displaypic).'"');
        readfile($config['pictures_dir'].$displaypic);
        trigger_error('DEBUG: --MARK-- Main program - Just displayed highres pic "'.$displaypic.'"', DEBUG);
        exit;

    }

// We should never trigger the following one
trigger_error('A fatal error has occured will trying to display a picture', FATAL);
die;

}

// END - DISPLAYPIC

// BEGIN - PREVIEWPIC JS Mode - Javascript Code Generation (for remote inclusion)
if($previewpic && get_level($previewpic)<=(int)$user_row["seclevel"] && $mode == 'js') {

    $picinfo=getimagesize($phpGraphyNaming->getThumbFullPath($previewpic));
    $picinfo['title'] = get_title($previewpic);
    if ($_SERVER['HTTPS'] == on) $proto == 'https'; else $proto='http';

    header("Content-type: application/x-javascript");
    $html = "var phpg_txt = '';\n";
    $html .= "phpg_txt+='<div class=\"phpg_previewpic\";><a href=\"".$proto."://".$_SERVER['HTTP_HOST'].SCRIPT_NAME."?display=".rawurlencode($previewpic)."\"><img src=\"".$proto."://".$_SERVER['HTTP_HOST'].SCRIPT_NAME."?previewpic=".rawurlencode($previewpic)."\" width=\"".$picinfo[0]."\" alt=\"".addcslashes($picinfo['title'],"'")."\" title=\"".addcslashes($picinfo['title'],"'")."\" height=\"".$picinfo[1]."\" /></a></div>';\n";
    $html .= "document.write(phpg_txt);";

    echo $html;
    exit;

}


// BEGIN - PREVIEWPIC

if($previewpic && get_level($previewpic)<=(int)$user_row["seclevel"]) {

    // This is all background, don't ouput errors
    $error_handler->disableDisplay();

    if ($config['debug_mode'] >= 4) {
        trigger_error('DEBUG: --MARK-- Main program - displaying thumbnail', DEBUG);
    }

    $prdir = $phpGraphyNaming->getThumbFullDir($previewpic);
    if (!is_dir($prdir)) {
        if (!@mkdir($prdir,0755)) trigger_error("mkdir($prdir) failed", ERROR);
        if ($config['default_file_permissions']) chmod($lrdir, $config['default_file_permissions']);
    }

    $prfile = $phpGraphyNaming->getThumbFullPath($previewpic);

    // Is this a registered filetype ?

    if ($ft=$pgFileTypes->getFileInfo($previewpic)) {

        // Is this a picture ?
        if ($pgFileTypes->isImage($previewpic)) {
            header("Content-type: ".$pgFileTypes->getFileMimeType($previewpic));
            header('Content-Disposition: inline; filename="'.basename($previewpic).'"');

            if(!file_exists($prfile)) {

                if ($config['thumb_generator'] == 'manual') {
                    trigger_error("No thumbnail found for '$previewpic' generate one yourself or choose a thumb_generator", FATAL);
                }

                // No thumbnail found, generating one
                if (!convert_image($phpGraphyNaming->getFileFullPath($previewpic),$prfile,$config['thumb_res'],$config['thumb_quality'])) {
                    trigger_error("Error while generating thumbnail for '$previewpic'", FATAL);
                }
            }
            readfile($prfile);
            exit;

        } elseif ($pgFileTypes->isVideo($previewpic)) {

            // Is this a video ?

            if (!file_exists($prfile) && $config['movie_extractor'] == 'ffmpeg') {

                require_once INCLUDE_DIR . 'yorsh-ffmpeg-wrapper.class.php';

                // If thumbnail doesn't exists yet and video thumbnail support is enabled, try to create one

                // Get movie information
                if ($movie = new YorshffmpegWrapper($phpGraphyNaming->getFileFullPath($previewpic))) {

                    // Calculate size of the thumb
                    $thumb_res = calculate_thumb_size($movie->getVideoResolution(), 1);

                    // Generate thumb from movie
                    if ($movie->extractFrameToJpeg($prfile, 1, $thumb_res)) {

                        trigger_error("DEBUG: Successfully generated thumbnail for movie '".$previewpic."'", DEBUG);

                    } else trigger_error('Failed to generate thumbnail for movie \''.$previewpic.'\'', ERROR);

                } else trigger_error('Unable to gather information for movie \''.$previewpic.'\'', ERROR);

            }

            if (file_exists($prfile)) {
                // There is a thumbnail, displaying it
                header("Content-type: image/jpeg");
                header('Content-Disposition: inline; filename="'.$phpGraphyNaming->getThumbName($previewpic).'"');
                readfile($prfile);
                exit;
            } else {
                // No thumbnail, displaying an icon instead
                header("Content-type: ".$ft["mime"]);
                readfile($base_images_dir.$ft["icon"]);
                exit;
            }

        } else {

            // Ok if we arrive here, we have some handled content but without thumbnail, displaying icon

            header("Content-type: ".$ft["mime"]);
            readfile($base_images_dir.$ft["icon"]);
            exit;

        }

    } else {

        // Unknow filetype, display a questionmark icon
        header("Content-type: image/gif");
        readfile($base_images_dir.'unknow_type.gif');
        trigger_error("Can't display '".basename($previewpic)."', picture type not supported", FATAL);
        exit;
    }


    // We should never trigger the following one
    trigger_error('A fatal error has occured will trying to display a thumbnail', FATAL);
    die;

}

// END - PREVIEWPIC

// New way to check security, if not allowed, to redirect to the login page

// Protection against unauthorized directory viewing
$url=SCRIPT_NAME.'?dir='.urlencode($dir).'&login=1';
if ((get_level($dir) > (int)$user_row["seclevel"]) && !$login) {
    header("Location: ".$url);
    exit;
}

// Protection against unauthorized picture viewing
$url=SCRIPT_NAME.'?display='.urlencode($display).'&login=1';
if ((get_level($display) > (int)$user_row["seclevel"]) && !$login) {
    header("Location: ".$url);
    exit;
}


/*************************************************
****       Main program (HTML output)        *****
*************************************************/

if ($config['debug_mode'] >= 4) {
    $error_handler->disableDisplay();
    trigger_error('DEBUG: --MARK-- Main program - HTML output (Displaying Header)', DEBUG);
    $error_handler->restoreDisplay();
}

if(!isset($rss)) {
    include CURRENT_THEME_DIR.HEADER_FILE;
    if ($admin && $config['debug_mode'] >= 2) echo '<div class="errormsg">'.$txt_admin['INSTALL/DEBUG mode is active'].'</div>';
    echo '<noscript><div class="errormsg">'.$txt_admin['Javascript Disabled'].'</div></noscript>';
} else {
    // RSS FEED
    header('Content-type: application/rss+xml');
}

// Login form

if($login) {

    $html = '<fieldset id="loginbox">
<legend>'.$txt['authenticate yourself'].'</legend>
<form method="post" action="'.SCRIPT_NAME.'" name="login">
<div class="margintop"><label for="user" class="floatlabel">'.$txt_login_form_login.'</label> <input type="text" name="user" class="input-box" /></div>
<div class="margintop"><label for="pass" class="floatlabel">'.$txt_login_form_pass.'</label> <input type="password" name="pass" class="input-box" /></div>';
    if ($config['use_session']) {
        // Will only display this box is we can use session, else force the cookie use
        $html .= '<div class="small"><input type="checkbox" name="rememberme" />'.$txt_remember_me.'</div>';
    } else {
        $html .= '<input type="hidden" name="rememberme" value="on" />';
    }
    $html .= '<input type="hidden" name="startlogin" value="1" />
<input type="hidden" name="dir" value="'.$dir.'" />
<input type="submit" value="'.$txt_form_submit.'" class="submit-button, margintop" style="margin-left: 4.5em" />
</form>
</fieldset>';

    echo $html;
    include CURRENT_THEME_DIR.FOOTER_FILE;
    exit;

} else if($create&&$admin) {

    // Create directory form

?>
<fieldset>
<legend><?php echo $txt_admin['Create a Directory'] ?></legend>
<form method=post action="<?php echo SCRIPT_NAME; ?>" name="createdir">
<div class=".formfield"><?php echo $txt_admin['Current Directory:'];
if ($dir) echo $dir; else echo $txt_root_dir; ?>
</div>
<div style="margin: 5px 0"><?php echo $txt_dir_to_create ?> <input name="createdirname" size=50 /></div>
<div class=".formfield"><input type="hidden" name="dircreate" value="1" />
<input type="hidden" name="dir" value="<?php echo $dir ?>" />
<input type="submit" value="<?php echo $txt_form_submit ?>" class="button-1" /></div>
</form>
</fieldset>
<?php
echo '<div style="text-align: left"><a href="'.SCRIPT_NAME.'?dir='.rawurlencode($dir).'">'.$txt_go_back.'</a></div>';
include CURRENT_THEME_DIR.FOOTER_FILE;
exit;

} else if($upload&&$admin) {

    // Upload file form

    $html = '';
    $html .= $txt_current_dir." ";
    if (trim($dir) != "") $html .= "(".$dir.")"; else $html .= "root/";

    $html .= '<fieldset id="uploadfromhd" class="formfield">';
    $html .= '<legend>'.$txt_upload_file_from_user.'</legend>';

    echo $html;

    // Assigning a default value to $nb_ul_fields
    if (!$nb_ul_fields || $nb_ul_fields > 10) $nb_ul_fields = 5;

?>
<form name="uploadfields" action="<?php echo SCRIPT_NAME; ?>" method="get">
<?php echo $txt_file_to_upload ?>
<input type="hidden" name="upload" value="1" />
<input type="hidden" name="dir" value="<?php echo $dir ?>" />
<select name="nb_ul_fields" onchange="checkUploadField('<?php echo rawurlencode($txt_upload_change) ?>')">
    <option value="1" <?php if (!$nb_ul_fields || $nb_ul_fields == 1) echo "selected" ?>>1</option>
    <option value="5" <?php if ($nb_ul_fields == 5) echo "selected" ?>>5</option>
    <option value="10" <?php if ($nb_ul_fields == 10) echo "selected" ?>>10</option>
</select>
</form>
<form name="fileupload" action="<?php echo SCRIPT_NAME; ?>" enctype="multipart/form-data" method="post">
<br />
<input name="pictures[]" id="firstpicturefield" size="55" maxlength="100" type="file" class="button-2" /><br />
<?php for ($i < 0; $i < $nb_ul_fields - 1;$i++) { ?>
<input name="pictures[]" size="55" maxlength="100" type="file" class="button-2"/><br />
<?php } ?>
<input id="submitupload" value="<?php echo $txt_form_submit ?>" type="submit" class="button-1" />
<input name="picupload" value="1" type="hidden" />
<input type="hidden" name="dir" value="<?php echo $dir ?>" />
</form>

<?php
if (version_compare(phpversion(), "4.3.0", ">=") && function_exists('ini_get') && ini_get('allow_url_fopen')) {
    // Copy from URL is only available since 4.3.0
    echo '</fieldset>';
    echo '<fieldset id="uploadfromurl" class="formfield">';
    echo '<legend>'.$txt_upload_file_from_url." (http:// or ftp://)</legend>";
?>

<form method="post" action="<?php echo SCRIPT_NAME; ?>" name="urlupload">
URL: <input type="text" name="userurl" size="100" maxlength="120" class="formfield" /><br />
<input type="submit" value="<?php echo $txt_form_submit ?>" class="button-1" />
<input type="hidden" name="copyfromurl" value="1" />
<input type="hidden" name="dir" value="<?php echo $dir ?>" />
</form>
<?php
}
echo '</fieldset><div style="text-align: left"><a href="'.SCRIPT_NAME.'?dir='.rawurlencode($dir).'">'.$txt_go_back.'</a></div>';
include CURRENT_THEME_DIR.FOOTER_FILE;
exit;
} else if($addcomment && $config['use_comments']) {

    // "Add comment" popup window

    $picname=reformat($picname);
  ?>
    <form name="addcomment" method=post action="<?php echo SCRIPT_NAME; ?>">
    <?php echo $txt_comment_form_name ?><font face="Courier" size=1><input type=text name=user size=30 value="<?php if ($_COOKIE['phpGraphyVisitorName']) echo $_COOKIE['phpGraphyVisitorName']; ?>" tabindex="1" /></font>
    <input type="checkbox" name="rememberme"<?php if ($_COOKIE['phpGraphyVisitorName']) echo "checked"; ?> tabindex="3" />
    <span class="small"><?php echo $txt_remember_me ?></span><br />
    <?php echo $txt_comment_form_comment ?> <br /><font face="Courier" size=1><textarea name=comment cols="40" rows="3" tabindex="2"></textarea></font>
    <div class="notes"><?php echo '<b>'.$txt['NOTE: '].'</b>'.$txt['HTML tags will display in your post as text']; ?></div>
    <input type=submit class="button-1" tabindex="4" value="<?php echo $txt_add_comment ?>" />
	<button type=button class="button-2" tabindex="5" onclick="window.self.close();"><?php echo $txt_cancel ?></button>
    <input type=hidden name=addingcomment value="1" />
    <input type=hidden name=picname value="<?php echo $picname ?>" />
    </form>
    <script type="text/javascript">document.addcomment.<?php if ($_COOKIE['phpGraphyVisitorName']) echo "comment"; else echo "user"; ?>.focus();</script>
  <?
  include CURRENT_THEME_DIR.FOOTER_FILE;
  exit;
} else if($admin && $editwelcome) {

    // "Edit .welcome" popup window

?>
  <?php echo $txt_editing." '.welcome' ".$txt_in_directory." ".$dir." :<br />"; ?>
	<span class="notes"><?php echo '<b>'.$txt['NOTE: '].'</b>'.$txt['HTML and line breaks supported'] ?></span>
  <?php if (check_welcome($dir)) { ?>
  <form name="editwelcome" method="post" action="<?php echo SCRIPT_NAME ?>">
  <input type="hidden" name="dir" value="<?php echo $dir ?>" />
  <input type="hidden" name="updwelcome" value="1" />
  <textarea name="welcomedata" cols="87" rows="15" class="medium" tabindex="0"><?php echo read_welcome($dir) ?></textarea><br />
  <button type=submit class="button-1"><?php echo $txt_save ?></button>
  <button type=button class="button-2" onclick="window.self.close();"><?php echo $txt_cancel ?></button>
  <button type=button class="button-2" onclick="document.editwelcome.welcomedata.value=''; return true;"><?php echo $txt_clear_all ?></button>
  </form>
<?php
  }
  include CURRENT_THEME_DIR.FOOTER_FILE;
  exit;

} else if ($admin && $mode == 'viewlog') {

    $logfile_content = read_n_lastlines(LOG_FILE, 30);
    if ($logfile_content) {
        echo '<fieldset style="font-size: 0.85em">';
        echo '<legend>'.$txt_admin['View logfile'].'</legend>';
        foreach ($logfile_content as $line) echo html_safe($line).'<br />';
        echo '</fieldset>';
        echo '<div style="text-align: left"><a href="'.SCRIPT_NAME.'">'.$txt_go_back.'</a></div>';
    }
    include CURRENT_THEME_DIR.FOOTER_FILE;
    exit;
}

// directory delete (recursive)

if($deldir && $dir && $admin) {
    if (delete_dir($dir)) echo "<b>".$txt_admin['Directory deleted successfully']."</b>"; else printf("<b>%s</b><br />%s", $txt_admin['Problem while deleting this directory'], $txt_admin['(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)']);
    echo "<br />";
    echo "<div class=\"small\"><a href=\"?dir=\">".$txt_go_back."</a></div>";
    include CURRENT_THEME_DIR.FOOTER_FILE;
    exit;
}


// Thumbnails/Lowres Batch Management (previously Generate all section)
if ($mode == 'batch' && $admin) {

    if ($batch_action) {

        // 2 Sub modes for now (generate/delete)
        include INCLUDE_DIR . 'functions_batch.inc.php';

        if (strstr($batch_action, 'generate')) $action = 'generate';
        elseif (strstr($batch_action, 'delete')) $action = 'delete';

        if (strstr($batch_action, 'all')) $target = 'all';
        elseif (strstr($batch_action, 'thumbs')) $target = 'thumbs';

        // Try to temporary increase value of max_execution_time to 15min
        $new_time_limit = 900;
        set_new_time_limit($new_time_limit);

        if (function_exists('ini_get') && $max_execution_time=ini_get('max_execution_time')) {
            if ($max_execution_time < $new_time_limit) {
                cust_error('00301', $max_execution_time);
            }
        } else cust_error('00301');

        batch_thumbnails_action($action, $target);

        $html = '';
        $html .= '<div class="small"><a href="'.SCRIPT_NAME.'?mode=batch">'.$txt_go_back.'</a></div>';

    } else {

        //  Display a menu to choose between all available actions

        $html .= '<form method="get" action="'.SCRIPT_NAME.'" style="margin: 1.5em 0">';
        $html .= $txt_admin['Batch action to execute: '];
        $html .= '<select name="batch_action">';
        $html .= '<option value="generateall">'.$txt_admin['Generate all thumbnails/lowres'].'</option>';
        $html .= '<option value="deleteall">'.$txt_admin['Delete all thumbnails/lowres'].'</option>';
        $html .= '<option value="deletethumbs">'.$txt_admin['Delete all thumbnails'].'</option>';
        $html .= '</select>';
        $html .= '<input type="hidden" name="mode" value="'.$mode.'" />';
        $html .= '<input id="submit" name="submit" type="submit" value="'.$txt_form_submit.'" tabindex="4" />';
        $html .= '</form>';
        $html .= '<div class="small"><a href="'.SCRIPT_NAME.'">'.$txt_go_back.'</a></div>';


    }

    if ($config['debug_mode'] >= 2 && function_exists('ini_get')) trigger_error('DEBUG: max_execution_time value='.ini_get('max_execution_time'), DEBUG);

    echo $html;


    include CURRENT_THEME_DIR.FOOTER_FILE;
    exit;
}


// Available only with php-cli - generate thumbnails and lowres
if (php_sapi_name() == 'cli' && $argv[1] == 'batch_action=generateall') {

    include INCLUDE_DIR . 'functions_batch.inc.php';
    batch_thumbnails_action('generate', 'all');
    exit;

}

// Users management

if($mode == 'um' && $admin) {
    echo '<a href="' . SCRIPT_NAME . '">'.$txt_go_back.'</a><br>';
    include INCLUDE_DIR."functions_user-management.inc.php";
    switch($action) {
        case 'edit':
        {
            $user_info = null;
            unset($user_info);

            // PROCESS+SAVE USER INFORMATION
            if(count($_POST)) {
                $user_info = process_user_information();

                $error_message = '';
                if(isSet($user_info['error'])) {
                    $error_message = implode("<br>\n", $user_info['error']);
                } else {
                    edit_user_information($user_info);
                    die('<script type="text/javascript">document.location.href="' . SCRIPT_NAME . '?mode=um"</script>');
                }
            }

            // Display user information
            $uid = null;
            unset($uid);
            if(isSet($_GET['uid']) && is_numeric($_GET['uid'])) {
                $uid = $_GET['uid'];
            } else {
                trigger_error("uid variable missing or incorrect", FATAL);
            }

            if(!isSet($user_info)) {
                $user_info = get_user_information($uid);
                if (is_password_encrypted($user_info['password'])) $user_info['password_is_encrypted'] = 1;
            }

            echo '
                    <!--
                    This form was inspired by this tutorial :
                    http://www.fredcavazza.net/tutoriels/formulaire/SVF_intro.htm
                    -->
                    <form name="user_management" id="user_management" method="post" action="">
                    <div id="bodyForm">
                    <fieldset><legend>'.$txt_user_info.' | <a href="' . SCRIPT_NAME . '?mode=um">'.$txt_back_user_list.'</a></legend>
                    <div class="errormsg"><b>';
            if ($error_message) echo$txt_error["00800"];
            echo '</b> '.$error_message.' </div>

                    <p>
                    <label for="login" title="'.$txt_login_rule.'">'.$txt_um_login.' :</label>
                    <input id="login" name="login" type="text" title="'.$txt_login_rule.'"
                    value="'.$user_info['login'].'" size="10" maxlength="20" tabindex="1">
                    <span class="legend">'.$txt_login_ie.'</span>
                    </p>

                    <p>
                    <label for="security_level" title="'.$txt_sec_lvl_rule.'">'.$txt_um_sec_lvl.':</label>
                    <input id="security_level" name="security_level" type="text" title="'.$txt_sec_lvl_rule.'"
                    value="'.$user_info['security_level'].'" size="3" maxlength="3" tabindex="3" />
                    <span class="legend">'.$txt_sec_lvl_ie.'</span>
                    </p>

                    ';

            if ($user_info['password_is_encrypted']) echo '<hr /><p class="small">'.$txt_admin['Password is encrypted and can not be recovered'].'</p>';

             echo  '<p>
                    <label for="password" title="'.$txt_pass_rule.'">'.$txt_um_pass.' :</label>
                    <input id="password" name="password" type="text" title="'.$txt_pass_rule.'"
                    value="';
            if (!$user_info['password_is_encrypted']) echo $user_info['password'];
             echo  '" size="15" maxlength="32" tabindex="2" />
                    </p>
                    </fieldset>
                    </div>
                    <div id="bottomForm">
                    <input id="uid" name="uid" type="hidden" value="',$uid.'" />
                    <input id="submit" name="submit" type="submit" value="'.$txt_form_submit.'" tabindex="4" />
                    </div>
                    </form>
                    ';
            break;
        }
        case 'display':
        default	:
        {
            if(isSet($_GET['delUser']) && is_numeric($_GET['delUser'])) {
                delete_user($_GET['delUser']);
                die('<script type="text/javascript">document.location.href="' . SCRIPT_NAME . '?mode=um"</script>');
            }

            $all_user_info = get_all_user_information($filename);

            echo "
                    <table class=\"um\">
                    <caption>$txt_user_management |
                    <a href=\"" . SCRIPT_NAME . "?mode=um&action=edit&uid=-1\">$txt_add_user</a>
                    </caption>
                    <tr><th>$txt_um_login</th>
                    <th>$txt_um_pass</th>
                    <th>$txt_um_sec_lvl</th>
                    <th>$txt_um_edit</th>
                    <th>$txt_um_del</th>
                    </tr>
                    ";
            foreach($all_user_info as $user_id => $user) {
                echo "
                        <tr>
                        <td>{$user['login']}</td>
                        <td>".str_pad(NULL, strlen($user['login']), "*")."</td>
                        <td>{$user['security_level']}</td>
                        <td><a href=\"" . SCRIPT_NAME . "?mode=um&action=edit&uid=$user_id\">
                        <img src=\"".$base_images_dir."edit.gif\" border=\"0\"></a></td>
                        <td>";
                if ($user_row['login'] != $user['login']) echo "<a onClick=\"javascript:if(confirm('$txt_confirm_del_user')){document.location.href='" . SCRIPT_NAME . "?mode=um&delUser=$user_id';}\"><img src=\"".$base_images_dir."delete_cross.gif\" /></a>";
                echo "
                        </td>
                        </tr>
                        ";
            }
            echo "</table>\n";
            break;
        }
    }
    include CURRENT_THEME_DIR.FOOTER_FILE;
    exit;
}

// Configuration Editor Mode

if ($mode == 'config' && $admin) {

    require INCLUDE_DIR."functions_config.inc.php";

    if ($updateconfig) {

        $config_validation = new ConfigYorshVariableValidation();

        foreach ($_POST as $key => $value) {
            if ($config_validation->check_var($key, $value)) {
                // Because config variables are not recognized by the YorshVariableValidation systen
               //  We've to handle the quotes there

                if (get_magic_quotes_gpc()) {
                    $value = stripslashes($value);
                }

                // Variable is valid

               // Putting it in the array that will be passed to the write_ini function
                $new_config[$key] = $value;

                // Setting it for the running script
                $config[$key] = $value;

            } elseif ($config_validation->is_found($key)) {
                // Variable has been recognized as an official config variable but the value is incorrect
                $config_error[$key] = sprintf($txt_admin['Value for %s is incorrect'], $key);
            } else {
                // Variable not recognized not be there, discarding it
            }

        }

        if (is_array($config_error)) {
            $config_update_msg = '<div class="errormsg">';
            foreach ($config_error as $value) {
                $config_update_msg  .= '<b>ERROR:</b> '.$value.'<br />';
            }
            $config_update_msg  .= '</div>';
        } else {
            // Saving config file
            if (write_phpgraphy_ini(CONF_DIR.INI_FILE, $new_config)) {
                $config_update_msg = '<div class="successmsg">'.$txt_admin['Successfully saved changes to config'].'</div>';
            }
        }

    }

    $config_array = config2array(INCLUDE_DIR.CONFIG_REF_FILE);
    $config_array = order_config_by_cat($config_array);

    // Set a default category
    if (!$cat) $cat = 'main';

    display_config_categories($config_array, $cat, $subcat, $advanced);

    echo '<div style="text-align: left"><a href="'.SCRIPT_NAME.'">'.$txt_go_back.'</a></div>';

    include CURRENT_THEME_DIR.FOOTER_FILE;
    exit;
}

/*******************************************************************
****   Special Pages Display (Last commented/added, Top rated)   ***
*******************************************************************/

if (isset($lastcommented) && $config['use_comments']) {

    // Display last commented pictures page

    // Reformat/Check argument supplied by user
    $last_commented_dir=reformat($lastcommented);

    // Get last commented pictures array
    // Expected array format : picname, pictitle, by, datetime (already sanitized)
    $last_commented=get_last_commented($last_commented_dir, $config['nb_last_commented']+1,(int)$user_row["seclevel"], $from);
    
    if ($last_commented) {
        $last_page = count($last_commented)==($config['nb_last_commented']+1) ? false : true;
        if(!$last_page) array_pop($last_commented);
        foreach($last_commented as $key => $value) {
            $last_commented[$key]['picurl'] = rawurlencode($last_commented[$key]['picname']);
            $last_commented[$key]['pictitle'] = get_title($last_commented[$key]['picname']);
            if ($rss) {
                // We need to encode the two following in UTF8
                $last_commented[$key]['pictitle'] = utf8_encode($last_commented[$key]['pictitle']);
                $last_commented[$key]['by'] = utf8_encode($last_commented[$key]['by']);
            }
        }
    } else {
      $last_page = true;
    }

    //TPL
    $tpl->assign("mode", 'lastcommented');
    $tpl->assign("pictures", $last_commented);
    $tpl->assign("page_title", sprintf($txt_last_commented_title, $config['nb_last_commented']));
    $tpl->assign("txt_comment_by", $txt_comment_by);
    $tpl->assign("txt_go_back", $txt_go_back);
    $tpl->assign("dir_url", rawurlencode($last_commented_dir));

    $tpl->assign("page_from", 'lastcommented' );
    $tpl->assign("prev", $from-$config['nb_last_commented'] );
    $tpl->assign("next", $last_page ? -1 : ($from+$config['nb_last_commented']) );
    $tpl->assign("nb_of_pictures", $from-$config['nb_last_commented']<0?null:999);
    $tpl->assign("txt_previous_page", $txt_previous_page );
    $tpl->assign("txt_next_page", $txt_next_page );

    $tpl->assign('page_uri', 'http://'.$_SERVER['SERVER_NAME'].SCRIPT_NAME);

    $tpl->display("top-and-last".(isset($rss)?'-rss':'').".tpl");
    if(!isset($rss)) include CURRENT_THEME_DIR.FOOTER_FILE;
    exit;

} else if(isset($_GET['topratings']) && $config['use_rating']) {

    cust_error('00501');

} else if(isset($toprated) && $config['use_rating']) {

    // Display top rated pictures page

    // Get top rated pictures
    // Expected array format : picname, pictitle, rating
    $c=get_top_ratings("/", $config['nb_top_rating']+1, (int)$user_row["seclevel"], $from);

    // Change rating to a decimal number (ie: 10 become 10.0) and add a place number
    $i = 1;
    if ($c) {
        $last_page = count($c)==($config['nb_top_rating']+1) ? false : true;
        if(!$last_page) array_pop($c);
        foreach($c as $key => $value) {
            $c[$key]['place'] = $i+$from;
            // $c[$key]['rating'] = sprintf("%.1f",$c[$key]['rating']);
            // $c[$key]['nb_votes'] = sprintf("%s",$c[$key]['nb_votes']);
            $c[$key]['X_with_X_votes'] = sprintf($txt['%.1f with %s votes'], $c[$key]['rating'], $c[$key]['nb_votes']);
            $c[$key]['picurl'] = rawurlencode($c[$key]['picname']);
            $c[$key]['pictitle'] = get_title($c[$key]['picname']);
            $i++;
        }
    } else {
      $last_page = true;
    }

    //TPL

    $tpl->assign("mode", 'toprated');
    $tpl->assign("pictures", $c);
    $tpl->assign("page_title", sprintf($txt_top_rated_title, $config['nb_top_rating']));
    $tpl->assign("dir_url", $toprated);
    $tpl->assign("txt_go_back", $txt_go_back);

    $tpl->assign("page_from", 'toprated' );
    $tpl->assign("prev", $from-$config['nb_top_rating'] );
    $tpl->assign("next", $last_page ? -1 : $from+$config['nb_top_rating'] );
    $tpl->assign("nb_of_pictures", $from-$config['nb_last_commented']<0?null:999);
    $tpl->assign("txt_previous_page", $txt_previous_page );
    $tpl->assign("txt_next_page", $txt_next_page );

    $tpl->assign('page_uri', 'http://'.$_SERVER['SERVER_NAME'].SCRIPT_NAME);

    $tpl->display("top-and-last".(isset($rss)?'-rss':'').".tpl");
    if(!isset($rss)) include CURRENT_THEME_DIR.FOOTER_FILE;

    exit;

} else if (isset($lastaddedpictures) || isset($lastaddedpicturesperdir)) {

    // Display last added pictures page / last added pictures per directory
    require_once INCLUDE_DIR."functions_last_added.inc.php";

    // Get a simple array with key = filename and value = filemtime
    if (isset($lastaddedpictures)) {
        $last_added_array = get_last_added_files(".", $config['nb_last_added']+1, (int)$user_row["seclevel"], $from);
        $page_from='lastaddedpictures';

    } elseif (isset($lastaddedpicturesperdir)) {
        $last_added_array = get_last_added_files_per_dir(".", $config['nb_last_added']+1, (int)$user_row["seclevel"], $from);
        $page_from='lastaddedpicturesperdir';

    }

    // Index array with text keys instead of numbers, add pictitle field
    $i=0;
    if ($last_added_array) {
        $last_page = count($last_added_array)>intval($config['nb_last_added']) ? false : true;
        if(!$last_page) array_pop($last_added_array);
        foreach ($last_added_array as $key => $value) {
            $last_added_tpl[$i]['picurl'] = rawurlencode($key);
            $last_added_tpl[$i]['pictitle'] = get_title($key);
            $last_added_tpl[$i]['datetime'] = date("Y-m-d H:i:s", $value);
            $i++;
        }
    }

    //TPL
    $tpl->assign("mode", 'lastaddedpictures');
    $tpl->assign("pictures", $last_added_tpl);
    $tpl->assign("page_title", sprintf($txt['Last %s added pictures :'], $config['nb_last_added']));
    $tpl->assign("txt_go_back", $txt_go_back);

    $tpl->assign("page_from", $page_from );
    $tpl->assign("prev", $from-$config['nb_last_added'] );
    $tpl->assign("next", $last_page? -1 : ($from+$config['nb_last_added']) );
    $tpl->assign("nb_of_pictures", $from-$config['nb_last_commented']<0?null:999);
    $tpl->assign("txt_previous_page", $txt_previous_page );
    $tpl->assign("txt_next_page", $txt_next_page );

    $tpl->assign('page_uri', 'http://'.$_SERVER['SERVER_NAME'].SCRIPT_NAME);

    $tpl->display("top-and-last".(isset($rss)?'-rss':'').".tpl");
    if(!isset($rss)) include CURRENT_THEME_DIR.FOOTER_FILE;

    exit;
}


/**************************************************
****   Common Display (Browse, Display pics)   ****
**************************************************/

if ($config['debug_mode'] >= 4) {
    $error_handler->disableDisplay();
    trigger_error('DEBUG: --MARK-- Main program - HTML output (Common Display/reading directory content)', DEBUG);
    $error_handler->restoreDisplay();
}
  // scan dir

$nb_dirs  = 0;
$nb_files = 0;
$dirs[0]  = "";
$files[0] = "";

if (!is_dir($config['pictures_dir'].$dir)) trigger_error("The directory you've requested doesn't exists", FATAL);
elseif (!is_readable($config['pictures_dir'].$dir)) trigger_error("The directory you've requested is not readable", FATAL);
$dh=dir($config['pictures_dir'].$dir);

while ($file=$dh->read()) {

    // if (preg_match($config['exclude_files_preg'], $file)) continue;
    if (preg_match($config['exclude_files_preg'], $file)) continue;

    if(!is_readable($config['pictures_dir'].$dir.$file)) {
        trigger_error("DEBUG: Permission denied when trying to read ".$dir.$file, DEBUG);
        continue;
    }

    if(is_dir($config['pictures_dir'].$dir.$file)) {
        // directory
        if(get_level($dir.$file."/")<=(int)$user_row["seclevel"])
        $dirs[$nb_dirs++]=$file;
    } else {
        // file
        if(get_level($dir.$file)<=(int)$user_row["seclevel"])
        $files[$nb_files++]=$file;
    }

}

$dh->close();

if ($config['debug_mode'] >= 4) {
    $error_handler->disableDisplay();
    trigger_error('DEBUG: --MARK-- Main program - HTML output (Common Display/properties.ini handling)', DEBUG);
    $error_handler->restoreDisplay();
}
// Check if there is a .properties.ini file and apply valid content
if (file_exists($config['pictures_dir'].$dir.'.properties.ini')) {
    trigger_error("DEBUG:Found a .properties.ini in $dir", DEBUG);
    if ($properties = read_properties_ini($config['pictures_dir'].$dir.'.properties.ini')) {

        // FIXME: For now we are not using it anywhere else but it's very likely that it will change and such it might be a good
        // idea to do it only once
        $config_validation = new ConfigYorshVariableValidation();

        foreach ($properties as $directive => $value) {

            if ($config_validation->check_var($directive, $value)) {
                trigger_error("DEBUG:Valid directive '$directive' found in .properties.ini", DEBUG);
                $config[$directive] = $value;
            } else trigger_error('Incorrect value for property "'.$directive.'" in file ".properties.ini"', WARNING);
        }
    } else trigger_error('Error while reading properties file ".properties.ini"', WARNING);
}

// How to sort directories (datetime or filename)
if ($config['dirs_sort_by'] == 'datetime') {
    $dirs = sort_files_by_datetime($config['pictures_dir'].$dir, $dirs);
} else {
    sort($dirs);
}

// How to sort files (datetime or filename)
if ($config['files_sort_by'] == 'datetime') {
    $files = sort_files_by_datetime($config['pictures_dir'].$dir, $files);
} else {
    sort($files);
}

// Inverse the sort order ?
if ($config['dirs_sort_order'] == "desc") $dirs=array_reverse($dirs);
if ($config['files_sort_order'] == "desc") $files=array_reverse($files);


// SLIDESHOW

if ($mode == 'slideshow') {

    include INCLUDE_DIR . 'functions_slideshow.inc.php';

    display_slideshow();

    // include CURRENT_THEME_DIR.FOOTER_FILE;
    exit;

}


// display current dir

    // Gathering info to provide to template


    // -> $nav_path
    if(!$dir) $nav_path = $txt_root_dir."/"; else $nav_path = '<a href="?dir=">'.$txt_root_dir.'</a>/';
    $alldirs=explode("/",$dir);
    $alldirtmp = '';
    $titledir = '';
    for($i=0;$alldirs[$i];$i++) {

        $alldirtmp.=$alldirs[$i]."/";
        if($alldirs[$i+1] || $display) $nav_path .= '<a href="?dir='.rawurlencode($alldirtmp).'">';

        // Get title of directories
        $titledir = db_get_title(implode('/',array_slice($alldirs, 0, $i+1)).DIR_SEP);
        if ($titledir == '') $nav_path .= $alldirs[$i]; else $nav_path .= $titledir;

        if($alldirs[$i+1] || $display) $nav_path .= '</a>/';



    }

    // -> $nb_dirs, $nb_files
    if ($nb_dirs) $nb_dirs_txt  = "$nb_dirs $txt_dirs";
    if ($nb_files) $nb_files_txt = "$nb_files $txt_files";

    // -> $dir_url
    $dir_url = rawurlencode($dir);

    // -> $navbar_menu
    if (!$logged) {
        $navbar_menu[] = '<a href="?dir='.rawurlencode($dir).'&amp;login=1">'.$txt_login.'</a>';
    } else {
        $navbar_menu[] = $user_row["login"].' - <a href="?logout=1">'.$txt_logout.'</a>';
    }
    $navbar_menu[] = '<a href="?random=1">'.$txt_random_pic.'</a>';
    if ($nb_files > 1) {
        $navbar_menu[] = "<a href=\"#\" onclick=\"javascript:window.open('".SCRIPT_NAME."?mode=slideshow&amp;dir=".rawurlencode($dir)."','slideshow','scrollbar=no,status=no,resizable=1,width='+screen.availWidth+',height='+screen.availHeight+',fullscreen=yes')\">".$txt['slideshow']."</a>";
    }

    if ($admin) {
        $html = '';
        $html .= '<a href="javascript:switch_display(\'adminmenu\')">'.$txt_admin['admin'].'</a>';
        $html .= '<fieldset id="adminmenu" style="display: none">';
        $html .= '<legend>Admin menu</legend><ul>';
        $html .= '<li><a href="?dir='.rawurlencode($dir).'&amp;create=1">'.$txt_admin['Create a new directory'].'</a></li>';
        $html .= '<li><a href="?mode=batch">'.$txt_admin['Batch Processing'].'</a></li>';
        $html .= '<li><a href="?mode=um">'.$txt_admin['Manage Users'].'</a></li>';
        $html .= '<li><a href="?mode=config">'.$txt_admin['phpGraphy Settings'].'</a></li>';
        if ($config['debug_mode'] >= 2) $html .= '<li><a href="?mode=viewlog">'.$txt_admin['View logfile'].'</a></li>';
        $html .= '<li><a href="?dir='.rawurlencode($dir).'&amp;upload=1">'.$txt_admin['Upload pictures/files'].'</a></li>';
        $html .= '</ul></fieldset><!--//adminmenu-->';
        $navbar_menu[] = $html;
    }

    // Define mode (browse/view)
    if ($display) $mode = 'display'; else $mode = 'browse';

// BEGIN - BROWSE

if ($config['debug_mode'] >= 4) {
    $error_handler->disableDisplay();
    trigger_error('DEBUG: --MARK-- Main program - HTML output (Common Display/mode='.$mode.')', DEBUG);
    $error_handler->restoreDisplay();
}

    // Mode dependent code
    if ($mode == 'browse') {


        // Directory Settings admin form (edit directory security level, edit .welcome)
        if ($admin && $dir) {
            $html = '';
            $html .= '<fieldset id="admindirectory">';
            $html .= '<legend>'.$txt_admin['directory settings'].'</legend>';
            $html .= '<form name="admindir" method="post" action="'.SCRIPT_NAME.'">'."\n";
            $html .= '<div class="formfield"><label for="dirtitle">'.$txt_admin['title:'].'</label>';
            $html .= '<input type="text" name="dirtitle" value="'.db_get_title($dir).'" /></div>'."\n";

            $html .= '<div class="formfield"><label for="dirlevel">'.$txt_admin['security level:'].'</label>';
            $html .= '<input type="text" name="dirlevel" value="'.get_level_real($dir).'" size="4" />';
            $html .= $txt_admin['inherited:'].get_level($dir).'</div>'."\n";


            if ($config['directory_display_mode'] == "picture") {


                $html .= '<div class="formfield"><label for="dirthumbnail">'.$txt_admin['cover picture:'].'</label>';
                $html .= '<select name="dirthumbnail" onchange="document.admindir.dirthumbchange.value=\'1\';">';

                if (is_file($phpGraphyNaming->getThumbFullPathForDirectory($dir))
                && is_readable($phpGraphyNaming->getThumbFullPathForDirectory($dir))) {
                    $html .= '<option value="">'.$txt['change/remove'].'</option>';
                    $html .= '<optgroup label="------">';
                    $html .= '<option value="-remove-">'.$txt['remove current'].'</option>';
                    $html .= '</optgroup><optgroup label="------">';
                } else {
                    $html .= '<option value="">'.$txt['select one'].'</option>';
                    $html .= '<optgroup label="------">';

                }

                // List directories with a directory cover
                foreach ($dirs as $value) {

                    if ($value && is_readable($phpGraphyNaming->getThumbFullPathForDirectory($dir.$value))
                    && is_file($phpGraphyNaming->getThumbFullPathForDirectory($dir.$value))) {
                        $html .= '<option>'.$value.'</option>';
                    }

                }

                // List handled images files of the current directory
                foreach ($files as $value) {

                    if (preg_match($handled_image_types_preg, $value)) {
                        $html .= '<option>'.$value.'</option>';
                    }

                }

                $html .= '</optgroup></select>';
                $html .= "</div>\n";

            }
            $html .= '<input type=hidden name="dir" value="'.$dir.'" />';
            $html .= '<input type=hidden name="updatedir" value="0" />';
            $html .= '<input type=hidden name="dirthumbchange" value="0" />'."\n";

            $html .= '<button class="button-1" onclick="javascript:document.admindir.updatedir.value=\'1\';document.admindir.submit();">'.$txt_form_submit.'</button>';

            if (!is_writable($config['pictures_dir'].$dir))
                $html .= '<div class="errormsg"><b>WARNING:</b>'.$txt_error['00251'].'</div>';

            $html .= '</form>';

            $html .= '</fieldset><!--//admindir-->';

            $admin_directory_settings = $html;

        }

        // Edit welcome button (Only on page 1)
        if ($admin && !$startpic) {
            $admin_edit_welcome = '<button class="button-2" onclick="';
            $admin_edit_welcome .= "enterWindow=window.open('?dir=".rawurlencode($dir)."&amp;editwelcome=1";
            $admin_edit_welcome .= "&amp;popup=1','editwelcome','width=650,height=400,top=150,left=200');";
            $admin_edit_welcome .= 'return false">'.$txt_edit_welcome.'</button>';
        }

        // Welcome file (Only on page 1)
        if (file_exists($config['pictures_dir'].$dir.".welcome") && !$startpic) {
            $html = '';
            $html .= '<div id="welcome">';
            $html .= nl2br(file_get_contents($config['pictures_dir'].$dir."/.welcome"));
            $html .= "</div>\n";
            $welcome_file = $html;
        }

        if ($config['debug_mode'] >= 4) {
            $error_handler->disableDisplay();
            trigger_error('DEBUG: --MARK-- Main program - HTML output (Common Display/Displaying directories list)', DEBUG);
            $error_handler->restoreDisplay();
        }


        // Displaying directories list (Only on page 1)
        if (!$startpic) {
            $directories = array();
            // Get default thumb width (will be used as default value)
            $thumb_res_dims = explode("x",$config['thumb_res']);
            $thumb_res_width = $thumb_res_dims[0];

            for($i=0;$i<$nb_dirs;$i++) {

                // Initialize variables
                $directory_picture_info = '';
                $cover_url = '';
                $dir_title = '';


                // This is common to the 3 modes
                if (!$dir_title = db_get_title($dir.$dirs[$i].DIR_SEP)) $dir_title = $dirs[$i];

                // Fill-in informations in the directories array (will passed to the template engine)
                $directories[$i]['name'] = $dirs[$i];
                $directories[$i]['title'] = $dir_title;
                $directories[$i]['url'] = rawurlencode($dir.$dirs[$i]);

                // The picture mode need to gather more data
                if ($config['directory_display_mode'] == "picture") {

                    // Get sub directory information (number of files/dirs)
                    $scan_dir_res = scan_dir($config['pictures_dir'].$dir.$dirs[$i], NULL, NULL);
                    $dir_info_res = get_dir_info($scan_dir_res);
                    // Ok now we've what we need, just count
                    $dir_extra_info = count_files_dirs($dir_info_res);

                    $directory_picture = $config['pictures_dir'].$dir.$dirs[$i].DIR_SEP.DIRECTORY_THUMB_PATH;

                    // Get picture size to display the correct frame size
                    if (is_readable($directory_picture) && is_file($directory_picture)) $directory_picture_info = getimagesize($directory_picture);

                    // The actual border are 10px long each which make 2 * 20 = 40px + the actual thumb size give us the total frame width
                    // FIXME: This calcul should be made at the template level so that the user is free to change the border sizes
                    //        Unfortunately, I didn't find any way of doing it, such for the moment it's gonna stay like this
                    $frame_border_size = 40;

                    if ($directory_picture_info[0]) {
                        $frame_width = $directory_picture_info[0] + $frame_border_size;
                    } else $frame_width = $thumb_res_width + $frame_border_size;

                    if (is_readable($directory_picture)) {
                        if ($config['use_direct_urls']) {
                            $cover_url = $directory_picture;
                        } else {
                            $cover_url = '?previewpic='.rawurlencode($dir.$dirs[$i].DIR_SEP.DIRECTORY_PICTURE_NAME);
                        }
                    } elseif ($config['cover_picture_mode'] == 'random') {
                        // Assign random picture

                        // Is there some files in the subdir ?
                        if ($dir_extra_info['file']) {
                            // Yes, try to use them
                            //print_r_html($dir_info_res);
                            $cover_url = select_random_directory_cover($dir_info_res, $dir.$dirs[$i]);
                        }

                        // No picture has been found so far, trying to get a directory cover thumb
                        if (!$cover_url) {
                            trigger_error("DEBUG: Searching for existing directory covers in subfolders of '".$dir.$dirs[$i]."'", DEBUG);
                            $scan_subdir_res = scan_dir_2($config['pictures_dir'].$dir.$dirs[$i], '/thumb_directory.jpg$/');
                            $subdir_info_res = get_dir_info($scan_subdir_res);
                            $cover_url = select_random_directory_cover($subdir_info_res, $dir.$dirs[$i]);
                        }

                        // If we succeed, assign picture to $cover_url, otherwise assign default icon
                        if ($cover_url) {

                            $cover_url = '?previewpic='.rawurlencode($dir.$dirs[$i].DIR_SEP.DIRECTORY_PICTURE_NAME);

                        } else $cover_url = $base_images_dir . 'unknown.gif';

                    } else {

                        $cover_url = $base_images_dir . 'unknown.gif';

                    }

                    if ($admin) {
                        $directories[$i]['delete_dir_cross'] = "<a href=\"javascript:if(confirm('".rawurlencode($txt_delete_confirm)."')){document.deletedir.deldir.value=1;document.deletedir.dir.value='".rawurlencode(addslashes($dir.$dirs[$i]))."';document.deletedir.submit();}\" onMouseOver=\"self.status='".$txt_delete_directory_text." ".addslashes($dirs[$i])."';return true;\" onMouseOut=\"self.status='';return true;\" title=\"".$txt_delete_directory_text." '".$dirs[$i].'\'"><img src="'.$base_images_dir.'delete_cross.gif" alt="'.$txt_delete_directory_text.'" class="icon" /></a>';
                    }

                    $directories[$i]['cover_url'] = $cover_url;
                    // Part below might need to be revised
                    $directories[$i]['nb_subdirs'] = $dir_extra_info['dir'];
                    $directories[$i]['nb_files'] = $dir_extra_info['file'];
                    $directories[$i]['frame_width'] = $frame_width;


                } //if $config['directory_display_mode'] == "picture")

            }

        }

        if ($config['debug_mode'] >= 4) {
            $error_handler->disableDisplay();
            trigger_error('DEBUG: --MARK-- Main program - HTML output (Common Display/Displaying thumbs)', DEBUG);
            $error_handler->restoreDisplay();
        }
        // $td_width
        $td_width = 100 / $config['nb_col'];

        // Displaying thumbs

        if(!$startpic) $startpic=0;

        $thumb_matrix = array();

        switch($config['thumbs_order']) {
            case 'L2R':
            {
                for($row=1,$i=$startpic,$iMax=($startpic+$config['nb_thumbs_max']);$i<$nb_files && $i<$iMax;$row++) {
                    for($col_id=0;$col_id<$config['nb_col'] && $i<$nb_files && $i<$iMax;$col_id++) {
                        $thumb_matrix[ $row ][] = $files[$i++];
                    }
                }
                break;
            }
            case 'T2B':
            {
                $nb_row = ceil((($nb_files-$startpic)>$config['nb_thumbs_max']?$config['nb_thumbs_max']:($nb_files-$startpic))/$config['nb_col']);

                for($i=$startpic, $iMax=($startpic+$config['nb_thumbs_max']); $i<$iMax && $i<$nb_files; ) {
                    for($row=1; $row<=$nb_row && $i<$iMax && $i<$nb_files;$row++) {
                        $thumb_matrix[ $row ][] = $files[$i++];
                    }
                }

                foreach($thumb_matrix as $row_id=>$row) {
                    if(!$row_id && count($row)<$config['nb_col'] && isSet($thumb_matrix[$row_id+1]) ) {
                        while(count($thumb_matrix[$row_id])<$config['nb_col']) {
                            $thumb_matrix[$row_id][] = array_pop($thumb_matrix[ ($row_id+1) ]);
                        }
                    }
                    sort($thumb_matrix[$row_id]);
                }

                $i = $startpic+$config['nb_thumbs_max'];
                if($i>$nb_files) $i=$nb_files;
                break;
            }
            case 'R2L':
            {
                for($row_id=1,$i=$startpic,$iMax=($startpic+$config['nb_thumbs_max']);$i<$nb_files && $i<$iMax;$row_id++) {
                    $thumb_matrix[$row_id] = array();
                    for($col_id=0;$col_id<$config['nb_col'];$col_id++) {
                        array_unshift($thumb_matrix[$row_id], ($i<$nb_files && $i<$iMax ? $files[$i++]: ''));
                    }
                }
                break;
            }
        }

        if ($config['debug_mode'] >= 4) {
            $error_handler->disableDisplay();
            trigger_error('DEBUG: --MARK-- Main program - HTML output (Common Display/Gathering information about pictures)', DEBUG);
            $error_handler->restoreDisplay();
        }

        // Create another array from ordered_files with pictures details
        if ($thumb_matrix) {
        foreach($thumb_matrix as $key1 => $table_row) {

            foreach ($table_row as $key2 => $filename) {

                $title = '';
                $class = '';
                $url   = '';
                $link  = '';
                $nb_comments = '';
                $rating = '';
                $select_as_cover = '';

                $title = db_get_title($dir.$filename);

                // Actions when the thumbnail doesn't already exists
                $thumb_filename = $phpGraphyNaming->getThumbFullPath($dir.$filename);
                 if (($config['use_exif'] || $config['use_iptc']) &&
                     !file_exists($thumb_filename) &&
                     !$title && preg_match('/\.jpe?g$/i',$filename)) {

                    $title = import_metadata_title($dir.$filename);

                }

                $ft = $pgFileTypes->getFileInfo($filename);

                // Is this an handled picture or video file
                if ($pgFileTypes->isImage($filename) || $pgFileTypes->isVideo($filename)) {
                    // Yep we do !
                    $class = 'thumbnail';

                    if ($config['use_direct_urls'] && file_exists($phpGraphyNaming->getThumbFullPath($dir.$filename))) {
                        $url = $phpGraphyNaming->getThumbFullPath($dir.$filename);
                    } else {
                        $url = SCRIPT_NAME.'?previewpic='.rawurlencode($dir.$filename);
                    }

                    $link = SCRIPT_NAME.'?display='.rawurlencode($dir.$filename);

                    if ($config['use_comments']) {
                        $nb_comments = get_nb_comments($dir.$filename);
                    }

                    if ($config['use_rating'] && $rating_ar = get_rating($dir.$filename)) {
                        $rating = sprintf("%.1f", $rating_ar['rating']);
                    }

                } elseif ($pgFileTypes->isHandled($filename)) {
                    // Yep we do although just as an icon
                    $class = 'icon';
                    $url = $base_images_dir.$ft["icon"];
                    $link = SCRIPT_NAME.'?display='.rawurlencode($dir.$filename);

                } else if ($filename) {
                    // Ok we don't handle it, assign default values
                    $class = 'icon';
                    $url = $base_images_dir.'unknow_type.gif';
                } else {
                    $url = $base_images_dir.'blank.gif';
                }

                // Option to select thumb as directory cover
                if ($pgFileTypes->isImage($filename) || $pgFileTypes->isVideo($filename)) {

                    $cover_ready = 0;

                    if ($pgFileTypes->isVideo($filename)) {
                        // We need to check that there is already a thumb for it
                        if (is_file($phpGraphyNaming->getThumbFullPath($dir.$filename))) {
                            $cover_ready = 1;
                        }

                    } else $cover_ready = 1;

                    if ($cover_ready) {
                        $select_as_cover = '<a href="'.SCRIPT_NAME.'?dir='.rawurlencode($dir).'&amp;dirthumbnail='.rawurlencode($filename).'&amp;dirthumbchange=1" onMouseOver="self.status=\''.$txt['select as cover picture'].'\'" onMouseOut="self.status=\';return true;\'" title="'.$txt['select as cover picture'].'"><img src="'.$base_images_dir.'mini-ff.gif" alt="mini-ff" class="icon" /></a>';
                    }

                }

                $thumbnails[$key1][$key2]['name']  = $filename;
                $thumbnails[$key1][$key2]['title'] = $title;
                $thumbnails[$key1][$key2]['class'] = $class;
                $thumbnails[$key1][$key2]['url']   = $url;
                $thumbnails[$key1][$key2]['link']  = $link;
                $thumbnails[$key1][$key2]['nb_comments']  = $nb_comments;
                $thumbnails[$key1][$key2]['rating']  = $rating;
                $thumbnails[$key1][$key2]['select_as_cover']  = $select_as_cover;

                }
            }

            }

        if ($config['debug_mode'] >= 4) {
            $error_handler->disableDisplay();
            trigger_error('DEBUG: --MARK-- Main program - HTML output (Common Display/Lauching Pager)', DEBUG);
            $error_handler->restoreDisplay();
        }

    // PAGER
    $html = '';

    if($nb_files && ceil($nb_files/$config['nb_thumbs_max'])>1){

        $delta  = 2;
        $dicoto = 1;
        $pager_switch = 10;

        $max_page     = ceil($nb_files/$config['nb_thumbs_max'])-1;
        $current_page = ceil($startpic/$config['nb_thumbs_max']);
        $pager = array();

        $delta = ($max_page>$pager_switch?$delta:$max_page);

        for($i=-$delta; $i<=$delta; $i++) {

            if( ($current_page+$i)>0 && ($current_page+$i)<$max_page) {

                $pager[] = $current_page+$i;

            }

        }

        if($dicoto>0) {

            for($i=0;$i<$dicoto;$i++) {

                $value = ceil($pager[0]/2);

                if($value!=0 && $value!=$pager[0]) {

                    array_unshift($pager, $value);

                }

                $id_last = count($pager)-1;
                $value = ceil(($pager[$id_last]+$max_page)/2);


                if($value!=$max_page && $value!=$pager[$id_last]) {

                    array_push($pager, $value);

                }

            }

        }

        array_unshift($pager, 0);
        array_push($pager, $max_page);

        $aHref = '<a href="'.basename(SCRIPT_NAME).'?dir='.rawurlencode($dir)."&amp;startpic=";

        foreach($pager as $id=>$page) {

            if($current_page!=$page) {

                $pager[$id] = $aHref.($page*$config['nb_thumbs_max']).'">'.($page+1).'</a>';

                if($page!=$max_page && $pager[ $id+1 ] != ($page+1)) {

                    $pager[$id] .= '...';

                } else {

                    $pager[$id] .= ' ';

                }

            } else {

                $pager[$id] = ($page+1).' ';

            }

        }

        if($current_page>0) {
            $html .= $aHref.(($current_page-1)*$config['nb_thumbs_max']).'">'.$txt_previous_page.'</a>';
        }

        $html .= implode('', $pager);

        if($current_page<$max_page) {
            $html .= $aHref.(($current_page+1)*$config['nb_thumbs_max']).'">'.$txt_next_page.'</a>';
        }

        $pager = $html;

    }
    // END - PAGER

// END - BROWSE

// BEGIN - DISPLAY

    } elseif ($mode == 'display') {

        // Physical existence check
        if (!file_exists($config['pictures_dir'].$display)) trigger_error("The file you've requested doesn't exists", FATAL);

        // Setting file type
        $picture = $pgFileTypes->getFileInfo($display);

        // Set default filetype if not already set
        if (!$picture['type']) $picture['type'] = 'unknown';


        // Everything related to the picture will be put in the $picture array
        $picture['name'] = basename($display);
        $picture['path'] = rawurlencode($display);

        if (isset($non_lr)) {
            if ($config['use_direct_urls']) {
                $picture['url'] = $phpGraphyNaming->getFileFullPath($display);
            } else {
                $picture['url'] = SCRIPT_NAME . '?displaypic='.$picture['path'].'&amp;non_lr=1';
            }
        } else {
            if ($config['use_direct_urls'] && file_exists($phpGraphyNaming->getLowresFullPath($display))) {
                $picture['url'] = $phpGraphyNaming->getLowresFullPath($display);
            } else {
                $picture['url'] = SCRIPT_NAME . '?displaypic='.$picture['path'];
            }
        }

        // Disable EXIF/IPTC if not a JPEG
        if (!preg_match("/jpe?g/i",$display)) {

            $config['use_exif'] = 0;
            $config['use_iptc'] = 0;

        }

        for($i=0;$i<$nb_files && basename($display)!=$files[$i];$i++);

            $title = db_get_title($display);

            if ($config['use_iptc']) {
               // Load IPTC header
               $iptc_header=get_iptc_data($config['pictures_dir'].$display);
            }


            if ($config['use_exif']) {
                // Load EXIF header
                $exif_header=get_exif_data($config['pictures_dir'].$display);
            }

            // Trying to import title from EXIF/IPTC if not alredy set to some value
            if (!$title && ($exif_header || $iptc_header) && preg_match('/\.jpe?g$/i',$display)) $title = import_metadata_title($display);

            if ($title != "") $picture['title'] = nl2br(html_safe($title));
            else $picture['title'] = basename($display);

            if ($config['use_iptc']) {
                if ($iptc_header) $picture['metadata_found'] = 1; else $picture['metadata_found'] = 0;
            }

        // Picture Naviguation (Previous / Up / Next)
        // TODO: Handle this at the template level
        $html = '';

        if($i!=0) $html .= '<a href="?display='.rawurlencode($dir.$files[$i-1]).'">'.$txt_previous_image.'</a>';
        $startpic=0;
        while ($i+1>$startpic+($config['nb_thumbs_max'])) { $startpic=$startpic+$config['nb_thumbs_max']; }
        $html .= ' <a href="?dir='.rawurlencode($dir).'&amp;startpic='.$startpic.'">'.$txt_back_dir.'</a>';

        $html .= " (".($i+1)."/".$nb_files.") ";

        if ($picture['type'] == 'image') {
            if(filesize($config['pictures_dir'].$display)>=$config['lr_limit'] && !$non_lr && (int)$user_row["seclevel"]>=$config['highres_min_level']) $html .= " <a href=\"?display=".rawurlencode($display)."&amp;non_lr=1\">".$txt_hires_image."</a> ";
            if(filesize($config['pictures_dir'].$display)>=$config['lr_limit'] && $non_lr) $html .= " <a href=\"?display=".rawurlencode($display)."\">".$txt_lores_image."</a> ";
        }

        if($files[$i+1]) $html .= "<a href=\"?display=".rawurlencode($dir.$files[$i+1])."\">".$txt_next_image."</a>";
        $picnavbar = $html;

        // Picture settings admin box


        if ($admin) {

            $html = '<fieldset id="adminpicture">
                <legend>'.$txt_admin['picture settings'].'</legend>
                <form name="picupdateform" action="'.basename(SCRIPT_NAME).'">
                <div class="formfield">
                    <label for="">'.$txt_admin['title:'].'</label>
                    <input type="text" name="dsc" size=50 value="'.$title.'" />
                </div>
                <div class="formfield">
                    <label for="lev">'.$txt_admin['security level:'].'</label>
                    <input name="lev" value="'.get_level_real($display).'" size=4 />
                    '.$txt_admin['inherited:'] . get_level($dir).'
                </div>';


            if ($config['rotate_tool'] != "manual") {

                $html .= '<div class="formfield" id="rotatebox">'.
                    '<input type=hidden name=rotatepic value="0" />'.$txt['Rotate'].
                    "<button onclick=\"javascript:document.picupdateform.rotatepic.value='3';document.picupdateform.submit();\" class=\"rotatebutton\">".
                    '<img src="'.$base_images_dir.'rotate270.gif" alt="'.$txt['Rotate 270'].'" border=0 /></button>'.
                    "<button onclick=\"javascript:document.picupdateform.rotatepic.value='2';document.picupdateform.submit();\" class=\"rotatebutton\">".
                    '<img src="'.$base_images_dir.'rotate180.gif" alt="'.$txt['Rotate 180'].'" border=0 /></button>'.
                    "<button onclick=\"javascript:document.picupdateform.rotatepic.value='1';document.picupdateform.submit();\" class=\"rotatebutton\">".
                    '<img src="'.$base_images_dir.'rotate90.gif" alt="'.$txt['Rotate 90'].'" border=0 /></button>';
                $html .= '</div>';

            }


            $html .= '<div class="formfield">'.
                '<input type=hidden name=display value="'.$display.'" />'.
                '<input type=hidden name=updpic value="1" />'.
                '<button type=submit class="button-1">'.$txt_form_submit.'</button>';

            $html .= '<input type=button class="button-2" value="'.$txt_delete_photo.'" onclick="'.
            "javascript:if(confirm('".$txt_delete_confirm."')){document.picupdateform.updpic.value='del';document.picupdateform.submit();}\" />";

            $html .= '<input type=button class="button-2" value="'.$txt_delete_photo_thumb.'" onclick="'.
            "javascript:if(confirm('".$txt_ask_confirm."')){document.picupdateform.updpic.value='delthumb';document.picupdateform.submit();}\" />";
            $html .= '</div>';

            $html .= "</form>\n</fieldset>\n";

            $adminpicturebox = $html;

        }


        if ($config['use_rating']) {

            $rating = '';
            $rating_ar = get_rating($display);
            $rating['current_rating_raw'] = $rating_ar['rating'];
            $rating['current_rating_formatted'] = sprintf($txt['%.1f with %s votes'], $rating_ar['rating'], $rating_ar['nb_votes']);
            $rating['already_rated'] = already_rated($display);


            for ($a = $config['highest_rating']; $a > 0; $a--) {

                if ($a == 1) $text_value = $a . ' - ' . $txt['Worst rating'];
                elseif ($a == $config['highest_rating']) $text_value = $a . ' - '. $txt['Best rating'];
                else $text_value = $a;

                $rating['select_options'][$a] = array('value' => $a, 'text' => $text_value );
            }

            $rate_url="?display=".rawurlencode($display);
            if (strpos($rate_url, "?")!==false) $rate_url.="&amp;rating="; else $rate_url.="?rating=";
            $rating['form_url'] = $rate_url;

            $txt['no_rating'] = $txt_no_rating;
            $txt['pic_rating'] = $txt_pic_rating;
            $txt['rate'] = $txt['Rate !'];
            $txt['option_rating'] = $txt_option_rating;

        }

        // display comment message if it exists (Obsolete since 0.9.12, will be soon replaced)
        /*
        if(file_exists($config['pictures_dir'].$display."_comment")) {
          $comment_file = readfile($config['pictures_dir'].$display."_comment");
        }
        */

        // Picture link and link_title
        if ($config['picture_link_action'] == 'nextpic') {

            if (isset($random)) {
                $picture['link'] = SCRIPT_NAME . '?random=1';
                $picture['link_title'] = html_safe($txt_next_image);
            } elseif ($files[$i+1]) {
                $picture['link'] = SCRIPT_NAME . '?display='.rawurlencode($dir.$files[$i+1]);
                $picture['link_title'] = html_safe($txt_next_image);
            }

        } elseif ($config['picture_link_action'] == 'switchres' && (int)$user_row["seclevel"] >= $config['highres_min_level']) {

            if (isset($non_lr)) {
                $picture['link'] = SCRIPT_NAME . '?display='.rawurlencode($dir.$files[$i]);
                $picture['link_title'] = html_safe($txt_lores_image);

            } else {
                $picture['link'] = SCRIPT_NAME . '?display='.rawurlencode($dir.$files[$i]).'&amp;non_lr=1';
                $picture['link_title'] = html_safe($txt_hires_image);
            }

        }



        // EXIF Metadata
        if ($config['use_exif'] && !empty($exif_header)) {
            $metadata = $exif_header;
            $picture['formatted_exif_metadata'] = reformat_exif_txt($txt_exif_custom,$exif_header);
        }

        // IPTC Metadata
        if ($config['use_iptc'] && !empty($iptc_header)) {
           if (is_array($exif_header)) $metadata=$exif_header + $iptc_header; else $metadata=$iptc_header;
           $picture['formatted_iptc_metadata'] = reformat_iptc_txt($txt_iptc_custom,$iptc_header);
        }

        // Metadata Raw Table
        if (($config['use_exif'] && !empty($exif_header)) || ($config['use_iptc'] && !empty($iptc_header))) {
            // Because we can NOT trust metadata's content, we've to filter it
            foreach ($metadata as $key => $value) {
                $metadata_safe[html_safe($key)] = html_safe($value);
            }
            // We don't need the original array anymore
            unset($metadata);

            $picture['metadata_array'] = $metadata_safe;
            $txt['show_me_more'] = $txt_show_me_more;

           }

        if ($config['use_comments']) {

            if ((int)$user_row["seclevel"] >= $config['postcomment_min_level']) {
                $picture['user_can_post_comments'] = 1;
                $txt['add_comment'] = $txt_add_comment;
            }

            if (get_nb_comments($display)) {
                $txt['comments'] = $txt_comments;
                $txt['comment_from'] = $txt_comment_from;
                $txt['comment_on'] = $txt_comment_on;
                $txt['del_comment'] = $txt_del_comment;
                // This contain user's data but it is already sanitizied
                $comments = get_user_comments($display);
            }

        }

    }


if ($config['debug_mode'] >= 4) {
    $error_handler->disableDisplay();
    trigger_error('DEBUG: --MARK-- Main program - HTML output (Common Display/Preparing Template)', DEBUG);
    $error_handler->restoreDisplay();
}
    //TPL - Template part

    // Common part
    $tpl->assign('config', $config);
    $tpl->assign('mode', $mode);
    $tpl->assign('admin', $admin);
    $tpl->assign('script_name', basename(SCRIPT_NAME));


    // Navigation bar - required by navbar.tpl (also common)
    $tpl->assign('dir_url', $dir_url);
    $tpl->assign('nav_path', $nav_path);
    $tpl->assign('nb_dirs', $nb_dirs_txt);
    $tpl->assign('nb_files', $nb_files_txt);
    $tpl->assign('navbar_menu', $navbar_menu);
    $tpl->assign('txt_last_commented', $txt_last_commented);
    $tpl->assign('txt_top_rated', $txt_top_rated);
    $tpl->assign('txt_last_added', $txt_last_added);
    $tpl->assign('txt_last_added_per_directory', $txt_last_added_per_directory);

    // Now handling mode dependent part
    if ($mode == 'browse') {

        $tpl->assign('admin_directory_settings', $admin_directory_settings);
        $tpl->assign('admin_edit_welcome', $admin_edit_welcome);
        $tpl->assign('welcome_file', $welcome_file);
        $tpl->assign('directories', $directories);
        $tpl->assign('frame_width', $frame_width);
            // FIXME:  While variables get renamed we need this hack
            $txt['dirs'] = $txt_dirs;
            $txt['files'] = $txt_files;
        $tpl->assign('frame_width', $frame_width);
        $tpl->assign('delete_dir_cross', $delete_dir_cross);

        $tpl->assign('thumbnails', $thumbnails);
            // FIXME:  While variables get renamed we need this hack
            $txt['thumb_comments'] = $txt_x_comments;
            $txt['thumb_rating'] = $txt_thumb_rating;

        $tpl->assign('td_width', $td_width);


        $tpl->assign('pager', $pager);

        $tpl->assign('txt', $txt);

        // Everything has been prepared - let's display it !
        $tpl->display('browse.tpl');

    } elseif ($mode == 'display') {

        $tpl->assign('picture', $picture);
        $tpl->assign('base_images_dir', $base_images_dir);
        $tpl->assign('picnavbar', $picnavbar);
        $tpl->assign('adminpicturebox', $adminpicturebox);
        $tpl->assign('rating', $rating);
        $tpl->assign('comments', $comments);
        $tpl->assign('use_direct_urls', $config['use_direct_urls']);

            // FIXME:  While variables get renamed we need this hack
            $txt['Save_as'] = $txt['Save as'];
        $tpl->assign('txt', $txt);

if ($config['debug_mode'] >= 4) {
    $error_handler->disableDisplay();
    trigger_error('DEBUG: --MARK-- Main program - HTML output (Common Display/Displaying Template)', DEBUG);
    $error_handler->restoreDisplay();
}
        // Everything has been prepared - let's display it !
        $tpl->display('display.tpl');

    }
if ($config['debug_mode'] >= 4) {
    $error_handler->disableDisplay();
    trigger_error('DEBUG: --MARK-- Main program - HTML output (Common Display/Displaying footer)', DEBUG);
    $error_handler->restoreDisplay();
}

?>
<?php include CURRENT_THEME_DIR.FOOTER_FILE; ?>

<?php
// Output Buffering
if ($config['use_ob']) ob_end_flush();
?>
