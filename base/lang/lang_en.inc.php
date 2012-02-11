<?php

/*
*  Copyright (C) 2004-2007 phpGraphy DevTeam
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
*  $Id: lang_en.inc.php 408 2007-02-03 17:17:06Z jim $
*
*/

/* phpGraphy language file
*
* Please DO NOT MODIFY this file directly
* You can use it as reference to create a file in another language,
* or to start building your own custom language file,
* For details, see Documentation.
*
* It is actually divided into of 4 main parts:
*   - General
*   - Admin
*   - Install
*   - Error
*/

$language_file_info = array(
    'language_name_english' => 'English',
    'language_name_native'  => 'English',
    'country_code'          => 'en',
    'charset'               => 'iso-8859-1',
    'direction'             => 'ltr',
    'for_version'           => '0.9.13',
    'translator_name'       => 'phpGraphy DevTeam',
    'translator_email'      => 'phpgraphy [dash] devteam [at] lists [dot] sourceforge [dot] net'
    );

// Title of your website
$txt_site_title="my phpGraphy site";

// txt_root_dir: text that specify the root of your gallery
$txt_root_dir="root";

// the following variables defines the text used for navigating the gallery
// you can change them to fit your needs and also use images (http://tofz.org/ style)
// e.g: $txt_previous_page='<img src="/gfx/my_previous_image_button.gif">';


// Picture/Thumbs viewing/navigation
$txt_files='file(s)';
$txt_dirs='dir(s)';
$txt_last_commented="last commented pictures";
$txt_top_rated="top rated pictures";
$txt_last_added="last added pictures";
$txt_last_added_per_directory="last added pictures per directory";

// Rating (if activated)
$txt_no_rating="";
$txt_thumb_rating="rating :";
$txt_pic_rating="rating :";
$txt['%.1f with %s votes'] = '<b>%.1f</b> with %s vote(s)';
$txt_option_rating="Rate this pic";
$txt['Best rating'] = 'Best rating';
$txt['Worst rating'] = 'Worst rating';
$txt['Rate !'] = 'Rate !';

$txt_back_dir='^Up^';
$txt_previous_image='&lt;- Previous';
$txt_next_image='Next -&gt;';
$txt_hires_image=' +High res+ ';
$txt_lores_image=' -Low res- ';

$txt_previous_page='&lt;- Previous page -| ';
$txt_next_page=' |- Next page -&gt; ';

$txt_x_comments="comment(s)";

$txt_comments="Comments :";
$txt_add_comment="Add comment";
$txt_comment_from="From: ";
$txt_comment_on=" on ";
$txt['*filtered*'] = '*filtered*';

// Last commented pictures page
$txt_last_commented_title="Last %s commented pictures :";
$txt_comment_by="by";

// Top rated pictures page
$txt_top_rated_title="Top %s rated pictures :";

// Last added pictures/directories page
$txt['Last %s added pictures :'] = 'Last %s added pictures :';
$txt['Last %s added pictures per directory :'] = 'Last %s added pictures per directory :';

// Top Right Menu (stuff displayed when in admin mode are under the admin section)
$txt_login="login";
$txt_logout="logout";
$txt_random_pic="random pic";


// Login page
$txt['authenticate yourself'] = 'Authenticate yourself';
$txt_login_form_login="login:";
$txt_login_form_pass="pass:";


// Add comment page
$txt_comment_form_name="Your name:";
$txt_remember_me="(Remember me)";
$txt_comment_form_comment="Your comment:";

// Generic stuff (used in several places)
$txt_go_back = "Go back";
$txt_form_submit = "Submit";
$txt_ok = "OK";
$txt_failed = "FAILED";
$txt_ie = 'ie: ';
$txt['NOTE: '] = 'NOTE: ';
$txt['HTML and line breaks supported'] = 'HTML content and line breaks are supported';
$txt['HTML tags will display in your post as text'] = 'HTML tags will display in your post as text';
$txt['Get Help'] = 'Get Help';
$txt['Save as'] = 'Save as...';

// metadata section (EXIF/IPTC)

/* $txt_[exif|iptc]_custom: You can customize the way informations are displayed,
* all keywords are between '%' for a reference of all supported keywords,
* See Documentation for the complete list of available keywords
*/
$txt_exif_custom="%Exif.Make% %Exif.Model%<br />%Exif.ExposureTime%s f/%Exif.FNumber% at %Exif.FocalLength%mm (35mm equiv: %Exif.FocalLengthIn35mmFilm%mm) iso %Exif.ISO% %Exif.Flash%";
$txt_exif_missing_value="??";	// If EXIF requested field is not found, display this instead
$txt_exif_flash="with flash"; // Test to display if flash was fired

$txt_iptc_custom="%Iptc.City% by %Iptc.ByLine%";
$txt_iptc_missing_value="";	// If IPTC requested field not found, display that instead

$txt['Found_IPTC_metadata'] = 'Found IPTC metadata';
$txt['No_IPTC_metadata_found'] = 'No IPTC metadata found';

$txt_show_me_more="Show me more";

// SLIDESHOW
$txt['slideshow'] = 'slideshow';
$txt['Slideshow previous'] = '&larr; Previous';
$txt['Slideshow next'] = 'Next &rarr;';
$txt['Slideshow play'] = 'Play';
$txt['Slideshow pause'] = 'Pause';
$txt['Slideshow close'] = 'Close';
$txt['Slideshow delay'] = 'Delay';
$txt['Slideshow %s sec'] = '%s sec.';
$txt['Slideshow slower'] = '+';
$txt['Slideshow faster'] = '-';
$txt['Slideshow hide captions'] = 'hide captions';
$txt['Slideshow show captions'] = 'show captions';

/********************************************************************************
* ADMIN Section
* Text only displayed once you're loggued in as an admin
* So if you, the admin, speak english, you probably won't need to translate this
*********************************************************************************/

// Top right menu (admin text)
$txt_admin['admin'] = 'admin';
$txt_admin['Admin menu'] = 'Admin menu';
$txt_admin['Create a new directory'] = "Create a new directory";
$txt_admin['Upload pictures/files'] = "Upload pictures/files";
$txt_admin['Batch Processing'] = 'Batch Processing';
$txt_admin['phpGraphy Settings'] = 'phpGraphy Settings';
$txt_admin['Manage Users'] = 'Manage Users';
$txt_admin['View logfile'] = 'View logfile';

// Picture/Thumbs viewing/navigation
$txt_admin['picture settings'] = 'Picture Settings';
$txt_admin['directory settings'] = 'Directory Settings';
$txt_admin['title:'] = 'Title: ';
$txt_admin['security level:'] = 'Security level: ';
$txt_admin['inherited:'] = ' Inherited: ';
$txt_admin['cover picture:'] = 'Cover picture: ';
$txt['select as cover picture'] = 'Select as Cover Picture for current directory';
$txt['change/remove'] = 'Change/Remove';
$txt['select one'] = 'Select one...';
$txt['remove current'] = 'Remove current';
$txt_delete_photo="Delete photo";
$txt_delete_photo_thumb="Regen thumb";
$txt_delete_directory_text="Delete directory";
$txt_edit_welcome="Edit .welcome";
$txt_del_comment="Delete";

// Confirmation box
$txt_ask_confirm="Are you sure ?";
$txt_delete_confirm="Are you sure to delete ?";

// Image rotation (if available with your config)
$txt['Rotate'] = 'Rotate';
$txt['Rotate 90'] = 'Rotate 90°';
$txt['Rotate 180'] = 'Rotate 180°';
$txt['Rotate 270'] = 'Rotate 270°';


// Editing the .welcome page
$txt_editing="Editing";
$txt_in_directory="in directory";
$txt_save="Save";
$txt_cancel="Cancel";
$txt_clear_all="Clear all";


// Directory creation page
$txt_admin['Create a Directory'] = 'Create a Directory';
$txt_admin['Current Directory:'] = 'Current Directory: ';
$txt_dir_to_create="Directory to create:";

// Directory deletion
$txt_admin['Deleting %s'] = 'Deleting %s';
$txt_admin['Directory deleted successfully'] = 'Directory deleted successfully';
$txt_admin['Problem while deleting this directory'] = 'Problem while deleting this directory';
$txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'] = 'Failed, will skip all subdirectories (Owner is \'%s\' )';
$txt_admin['(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)'] = '(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)';

// Lowres/Thumbs generation page
$txt_admin['Generating all missing thumbnails/low res pictures: (be patient)'] = 'Generating all missing thumbnails/low res pictures: (be patient)';
$txt_admin['Generating low res picture for %s'] = 'Generating low res picture for %s';
$txt_admin['Generating thumbnail picture for %s'] = 'Generating thumbnail picture for %s';
$txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'] = 'Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.';
$txt_admin['Nothing to do.'] = 'Nothing to do.';
$txt_admin['Your library contains <b>%s</b> pictures.'] = 'Your library contains <b>%s</b> pictures.';

$txt_admin['Batch action to execute: '] = 'Batch action to execute: ';
$txt_admin['Generate all thumbnails/lowres'] = 'Generate all thumbnails/lowres';
$txt_admin['Delete all thumbnails/lowres'] = 'Delete all thumbnails/lowres';
$txt_admin['Delete all thumbnails'] = 'Delete all thumbnails';
$txt_admin['Error while deleting %s'] = 'Error while deleting %s';
$txt_admin['Successfully deleted %s of %s files'] = 'Successfully deleted %s of %s files';



// File upload page
$txt_current_dir="Current directory :";
$txt_file_to_upload="File(s) to Upload:";
$txt_upload_file_from_user="Upload file(s) from your computer";
$txt_upload_file_from_url="Upload a file from an URL";
$txt_upload_change = "Changing the numbers of upload fields will require you to re-select all the files that you have previously choosen. It is recommend to Cancel, upload the actual files and choose a bigger number next time. Do you still want to continue ?";

// User management
$txt_add_user = 'Add user';
$txt_back_user_list = 'Back to the user\' list';
$txt_confirm_del_user = 'Are you sure to delete this user  ?';
$txt_user_info = 'User information';
$txt_login_rule = 'Specify a login up to 20 characters';
$txt_login_ie = 'ie: john';
$txt_pass_rule = 'Specify a password up to 32 characters';
$txt_sec_lvl_rule = 'Specify a security level between 1 and 999';
$txt_sec_lvl_ie = "ie: 10";
$txt_admin['Password is encrypted and can not be recovered'] = '<b>NOTE:</b> Password is encrypted and can not be recovered, however you can type a new one below.';

$txt_um_login = 'Login';
$txt_um_pass = 'Password';
$txt_um_sec_lvl = 'Security level';
$txt_um_edit = 'Edit';
$txt_um_del = 'Delete';

// Configuration Editor page
$txt_admin['Settings'] = 'Settings';
$txt_admin['Description'] = 'Description:';
$txt_admin['Example'] = 'Example:';
$txt_admin['Read-Only option'] = '<b>Read Only</b> - For security reasons, you can only modify this option by manually editing %s or by using install.php.';
$txt_admin['Usage of install recommended'] = 'Usage of <b>%s</b> is recommended to change this setting';
$txt_admin['on'] = 'on';
$txt_admin['off'] = 'off';
$txt_admin['Show advanced options'] = 'Show advanced options';
$txt_admin['Value for %s is incorrect'] = 'Value for %s is incorrect';
$txt_admin['Successfully saved changes to config'] = 'Successfully saved changes to config';


// Misc
$txt_admin['INSTALL/DEBUG mode is active'] = "<b>WARNING</b>: INSTALL/DEBUG mode is active - Lower the value of \$debug_mode in config.ini.php once you're done.";
$txt_admin['Javascript Disabled'] = "<b>WARNING</b>: Your browser doesn't support Javascript and you won't be able to access some functions";


/********************************************************************************
* ERROR messages
* This section is far from being complete but
*********************************************************************************/

// Unknow error
$txt_error['00000'] = 'An unknown error has been triggered, please <a href="%s" target="_blank">report it to the DevTeam</a> along with the context on how it did happen.';

// 1xx - Installation related

// 2xx - Filesystem permissions/ownership related
$txt_error['00201'] = "Warning 'use_direct_urls' is turned on and you still have an .htaccess file in your pictures directory. It's very likely that you'll have trouble displaying pictures.";
$txt_error['00251'] = 'This file/directory is NOT writable, this may cause various problems (ie: to generate thumbs/lowres pictures)';

// 3xx - PHP settings related
$txt_error['00301'] = "Warning, this page may timeout because max_execution_time value is too low (%s seconds) and phpGraphy wasn't able to increase it";
$txt_error['00303'] = "exec() has been disabled on your PHP installation";
$txt_error['00304'] = "Warning, exif related functions are not available on this server, set use_exif to 0 in your phpGraphy config file or recompile your PHP installation";
 
// 4xx - File upload related
$txt_error['00401'] = "Upload of %s failed, a file with the same name already exists, you've to delete the existing file before.";

// 5xx - Misc
$txt_error['00501'] = "'topratings' has been renamed to 'toprated', please update your links accordingly.";

// 8xx is related to user management
$txt_error['00800'] = "ERROR:";
$txt_error['00801'] = "Uid is not set";
$txt_error['00802'] = "Uid is non numeric";
$txt_error['00803'] = "Login should contain from 1 to 20 of this character 0-9 a-z @ - _";
$txt_error['00804'] = "Login is not set";
$txt_error['00805'] = "Password should contain from 1 to 32 of this character 0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #";
$txt_error['00806'] = "Password is not set";
$txt_error['00807'] = "Security level should be a number between 1 and 999";
$txt_error['00808'] = "Security level not set";
$txt_error['00809'] = "Login already exist";



/********************************************************************************
* INSTALL Part
* Text only displayed during the install process
*********************************************************************************/

$txt_install['next step'] = 'Next Step ->';

// Step 2
$txt_install['IP address check'] = 'IP address check';
$txt_install['for security reasons, proove that it is your the admin'] = 'For security reasons, you need to prove that you really are the administrator of this site.';
$txt_install['finally, reload this page'] = 'Finally, <a href="javascript:window.location.reload()">reload</a> this page';
$txt_install['copy INI_FILE.sample to INI_FILE'] = 'Copy the file named %s to %s';
$txt_install['located under the conf subdir of phpgraphy dir'] = 'located under the %s subdirectory of your phpGraphy directory';
$txt_install['open INI_FILE with your favorite text editor and replace admin_ip with your ip'] = 'Open %s with your favorite text-editor and replace the value of %s with your ip address which is %s';
$txt_install['upload INI_FILE on your webserver under the CONF_DIR dir'] = 'Upload %s on your webserver under the %s subdirectory';

// Step 3
$txt_install['Directories Permissions'] = 'Directories Permissions';
$txt_install['test_result_passed'] = 'OK';
$txt_install['test_result_failed'] = 'FAILED';
$txt_install['Checking that the webuser can write in the following directories :'] = 'Checking that the webuser can write in the following directories :';
$txt_install['you can not proceed next step'] = 'Correct the problem(s) listed above and <a href="javascript:window.location.reload()">reload</a> the page';
$txt_install['Is directory %s writable ?'] = 'Is directory %s writable ?';
$txt_install['Is file %s writable ?'] = 'Is file %s writable ?';
$txt_install['Directory %s used to store the sessions is not writable and sessions support has been disabled'] = 'Directory %s <span class="annotation">(used to store the sessions)</span> is not writable and sessions support has been disabled';

// Step 4
$txt_install['Image Tools Configuration'] = 'Image Tools Configuration';
$txt_install['Image Tools Configuration introduction'] = 'On this page you can select the software used to generate thumbnails and lowresolution pictures, as well as one used to rotate them. The installation has automatically detected the best choices and unless you know what you\'re doing, please simply proceed to next step.';
$txt_install['If you know what you re doing, please use this button'] = "If you know what you're doing, please use this button";
$txt_install['Show me the details'] = 'Show me the details';
$txt_install['choose your thumb generator'] = 'Please select your image processing software: ';
$txt_install['gd not supported'] = 'GD support has not been compiled in';
$txt_install['gd missing JPG support'] = 'Installed GD version hasn\'t JPG support compiled in';
$txt_install['exec function disabled'] = 'exec() function is disabled';
$txt_install['auto-detection failed'] = 'Auto-detection failed';
$txt_install['you need to specify %s path'] = 'You <b>need</b> to specify <b>%s</b> path: ';
$txt_install['you need to specify the program path'] = 'You <b>need</b> to specify the program path: ';
$txt_install['no thumb_generator found intro'] = 'No working image processing software have been found, see details below.';
$txt_install['no thumb_generator found conclusion'] = 'If this is your server, you should be able to resolve the problems, else you have no choice but to upload thumbnails and low-resolution pictures yourself.';
$txt_install['choose your rotate tool'] = 'Please select your image rotation software: ';
$txt_install['rotate tool not available'] = 'Image Rotation is not available with your configuration because exec() has been disabled.';
$txt_install['exif has been disabled'] = 'Exif support is not available with your PHP installation and has been disabled';

// Step 5
$txt_install['Database configuration'] = 'Database configuration';
$txt_install['choose your database backend'] = 'Choose the database backend you want to use: ';
$txt_install['mysql details title'] = 'MySQL Database parameters';
$txt_install['database host'] = 'Server hostname :';
$txt_install['database name'] = 'Database name :';
$txt_install['database user'] = 'User :';
$txt_install['database pass'] = 'Password :';
$txt_install['tables prefix'] = 'Tables prefix :';
$txt_install['remove invalid characters'] = '* Remove invalid character(s)';
$txt_install['mysql connection error, see errors'] = 'Unable to connect to the database, check error(s) below:';
$txt_install['database structure sucessfully created'] = 'Database structure successfully created';
$txt_install['database structure already exists'] = 'An existing valid database structure has been found, you can proceed to next step';
$txt_install['error while creating database structure'] = 'An error has occured while creating the database structure';

// Step 6
$txt_install['Administrator account creation'] = 'Administrator Account Creation';
$txt_install['Username'] = 'Username :';
$txt_install['Password'] = 'Password :';
$txt_install['Congratulations, administrator account %s has been created'] = 'Congratulations, administror account %s has been created';
$txt_install['An error has occured while creating your administrator account'] = 'An error has occured while creating your administrator account.';
$txt_install['please choose a login and password'] = 'You\'re about to finish the installation process, please choose a login and a password that you\'ll use to authenticate yourself as Administrator.';
$txt_install['Configuration file has been saved'] = 'Your configuration file has been saved.';
$txt_install['An error has occured while saving your configuration file'] = 'An error has occured while saving your configuration file.';
$txt_install['You can now access your phpgraphy site'] = 'You can now <a href="index.php">access your phpGraphy site</a> !';
$txt_install['One or more problems have occured and your installation is NOT properly finished, please contact the phpGraphy DevTeam with the details of your error(s)'] = 'One or more problems have occured and <b>your installation is NOT properly finished</b>, please contact the phpGraphy DevTeam with the details of your error(s).';

// Initial .welcome file
$txt_install['welcome file content'] = 'Hello

I\'m the <b>.welcome</b> file located in your pictures directory !
You can edit my content online once you\'re loggued-in as admin.

Here is a basic install validation procedure:

1/ Log-in as admin
2/ Try to create a directory
3/ Try to upload a file (either via the web interface or via your FTP client)
4/ See if the thumbnail get correctly generated

Once all this is working, please edit me and put whatever you want here.

<div style="border: solid 1px; width: 50%; padding: 5px;"><u>Tip:</u>
Here is an example of HTML use, you can create links like one to see the <a href="?toprated=1">top rated pictures</a> or include pictures using img links.
</div>

Thanks for choosing phpGraphy, I hope you will enjoy using this software
If you encounter a bug or you have a great new feature idea, please contact me.
(See <a href="http://phpgraphy.sourceforge.net">phpGraphy website</a> for contact details)

						JiM / aEGIS.
';


?>
