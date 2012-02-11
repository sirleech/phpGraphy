<?php

/*
*  Copyright (C) 2004-2005 JiM / aEGIS (jim@aegis-corp.org)
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
*  $Id: lang_he.inc.php 406 2007-02-02 00:08:45Z jim $
*
*/

/* phpGraphy language file - Hebrew
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
    'language_name_english' => 'Hebrew',
    'language_name_native'  => 'עברית',
    'country_code'          => 'he',
    'charset'               => 'Windows-1255',
    'direction'             => 'rtl',
    'for_version'           => '0.9.11',
    'translator_name'       => 'Tom Sella',
    'translator_email'      => 'tsella [at] gmail [dot] com'
    );

// Title of your website
$txt_site_title="האתר שלי - phpGraphy";

// txt_root_dir: text that specify the root of your gallery
$txt_root_dir="כניסה";

// the following variables defines the text used for navigating the gallery
// you can change them to fit your needs and also use images (http://tofz.org/ style)
// e.g: $txt_previous_page='<img src="/gfx/my_previous_image_button.gif">';

// Picture/Thumbs viewing/naviguation
$txt_files='קבצים';
$txt_dirs='ספריות';
$txt_last_commented=" תגובות שנוספו לאחרונה ";

// Rating (if activated)
$txt_no_rating="";
$txt_thumb_rating="דרוג :";
$txt_pic_rating="<br />דרוג ממוצע : ";
$txt_option_rating="דרג תמונה זו";
$txt['Best rating'] = 'מדורגת גבוה ביותר';
$txt['Worst rating'] = 'מדורגת נמוך ביותר';
$txt['Rate !'] = 'דרג !';

$txt_back_dir='^ספריית אב^';
$txt_previous_image='&lt;- תמונה קודמת';
$txt_next_image='תמונה הבאה -&gt;';
$txt_hires_image=' +רזולוציה גבוהה+ ';
$txt_lores_image=' -רזולוזיה נמוכה- ';

$txt_previous_page='&lt;- דף תמונות קודם -| ';
$txt_next_page=' |- דף תמונות הבא -&gt; ';

$txt_x_comments="תגובות";

$txt_comments="תגובות :";
$txt_add_comment="הוסף תגובה";
$txt_comment_from="מאת: ";
$txt_comment_on=" בתאריך ";
$txt['*filtered*'] = '*מסוננת*';

// Last commented pictures page
$txt_last_commented_title=$nb_last_commented." התגובות האחרונות :";
$txt_comment_by="על ידי";

// Top rated pictures page
$txt_top_rated_title=$nb_top_rating." הציונים הגבוהים ביותר :";

// Last added pictures/directories page
$txt['Last %s added pictures :'] = '%s תמונות שנוספו לאחרונה :';
$txt['Last %s added pictures per directory :'] = '%s תמונות שנוספו לספריה :';

// Top Right Menu (stuff displayed when in admin mode are under the admin section)
$txt_login="התחבר";
$txt_logout="התנתק";
$txt_random_pic="תמונה אקראית";


// Login page
$txt['authenticate yourself'] = 'הזדהה';
$txt_login_form_login="שם משתמש:";
$txt_login_form_pass="סיסמא:";


// Add comment page
$txt_comment_form_name="שם מלא:";
$txt_remember_me="זכור אותי";
$txt_comment_form_comment="תגובתך:";

// Generic stuff (used in several places)
$txt_go_back = "חזור אחורה";
$txt_form_submit = "שלח";
$txt_ok = "הצליח";
$txt_failed = "נכשל";
$txt_ie = 'לדוגמא : ';
$txt['NOTE: '] = 'לתשומת ליבך : ';
$txt['HTML and line breaks supported'] = 'תוכן HTML ושורות נפרדות נתמכים';
$txt['HTML tags will display in your post as text'] = 'תגי HTML יוצגו כטקסט';


// metadata section (EXIF/IPTC)

/* $txt_[exif|iptc]_custom: You can customize the way informations are displayed,
* all keywords are between '%' for a reference of all supported keywords,
* See Documentation for the complete list of available keywords
*/
$txt_exif_custom="%Exif.Make% %Exif.Model%<br>%Exif.ExposureTime%s f/%Exif.FNumber% at %Exif.FocalLength%mm (35mm equiv: %Exif.FocalLengthIn35mmFilm%mm) iso %Exif.ISO% %Exif.Flash%";
$txt_exif_missing_value="??";	// If EXIF requested field is not found, display this instead
$txt_exif_flash="צולם עם פלאש"; // Test to display if flash was fired

$txt_iptc_custom="%Iptc.ByLine% על ידי %Iptc.City%";
$txt_iptc_missing_value="";	// If IPTC requested field not found, display that instead

$txt_show_me_more="הצג מידע נוסף";

// SLIDESHOW
$txt['Slideshow launch'] = 'הצג כמצגת...';
$txt['Slideshow previous'] = '&larr; הקודם';
$txt['Slideshow next'] = 'הבא &rarr;';
$txt['Slideshow play'] = 'התחל';
$txt['Slideshow pause'] = 'עצור';
$txt['Slideshow close'] = 'סגור';
$txt['Slideshow delay'] = 'המתן';
$txt['Slideshow %s sec'] = '%s שניות.';
$txt['Slideshow slower'] = '+';
$txt['Slideshow faster'] = '-';

/********************************************************************************
* ADMIN Section
* Text only displayed once you're loggued in as an admin
* So if you, the admin, speak english, you probably won't need to translate this
*********************************************************************************/

// Top right menu (admin text)
$txt_admin['admin'] = 'admin';
$txt_admin['Admin menu'] = 'תפריט מנהל';
$txt_admin['Create a new directory'] = "צור ספריה חדשה";
$txt_admin['Upload pictures/files'] = "העלה תמונות וקבצים";
$txt_admin['Generate Lowres/Thumbnails'] = "צור דוגמיות";
$txt_admin['phpGraphy Settings'] = 'הגדרות phpGraphy';
$txt_admin['Manage Users'] = 'נהול משתמשים';
$txt_admin['View logfile'] = 'הצגת דוחות';

// Picture/Thumbs viewing/naviguation
$txt_admin['picture settings'] = 'הגדרות תמונה';
$txt_admin['directory settings'] = 'הגדרות ספריה';
$txt_admin['title:'] = 'כותרת : ';
$txt_admin['security level:'] = 'רמת גישה: ';
$txt_admin['inherited:'] = ' נורש: ';
$txt_admin['cover picture:'] = 'תמונת אלבום: ';
$txt['select as cover picture'] = 'בחר כתמונת אלבום לספריה';
$txt['change/remove'] = 'שנה/הסר';
$txt['select one'] = 'בחר מרשימה...';
$txt['remove current'] = 'הסר נוכחי';
$txt_delete_photo="מחק תמונה";
$txt_delete_photo_thumb="צור דוגמית מחדש";
$txt_delete_directory_text="מחק ספריה";
$txt_edit_welcome="<button>ערוך קובץ .welcome</button>";
$txt_del_comment="מחק";

// Confirmation box
$txt_ask_confirm="האם אתה בטוח ?";
$txt_delete_confirm="האם למחוק ?";

// Image rotation (if available with your config)
$txt['Rotate'] = 'סובב';
$txt['Rotate 90'] = 'סובב 90°';
$txt['Rotate 180'] = 'סובב 180°';
$txt['Rotate 270'] = 'סובב 270°';


// Editing the .welcome page
$txt_editing="עריכה";
$txt_in_directory="בספריה";
$txt_save="שמור";
$txt_cancel="בטל";
$txt_clear_all="נקה הכל";


// Directory creation page
$txt_admin['Create a Directory'] = 'צור ספריה';
$txt_admin['Current Directory:'] = 'ספריה נוכחית: ';
$txt_dir_to_create="ספריה ליצירה:";

// Directory deletion
$txt_admin['Deleting %s'] = 'מוחק %s';
$txt_admin['Directory deleted successfully'] = 'ספריה נמחקה בהצלחה';
$txt_admin['Problem while deleting this directory'] = 'שגיאה בעת מחיקת ספריה';
$txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'] = 'נכשל, מדלג על כל תת-הספריות (בעלים \'%s\' )';
$txt_admin['(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)'] = '(נא לבדוק את השגיאות המופיעות למעלה. על מנת לפתור שגיאות אלו יתכן ותדרש מחיקה על ידי משתמש FTP מאחר ואפשר שקבצים ו/או ספריות משויכים אליו.)';

// Lowres/Thumbs generation page
$txt_admin['Generating all missing thumbnails/low res pictures: (be patient)'] = 'מייצר את כל הדוגמיות החסרות : )סבלנות)';
$txt_admin['Generating low res picture for %s'] = 'מייצר תמונה מוקטנת עבור %s';
$txt_admin['Generating thumbnail picture for %s'] = 'מייצר דוגמית עבור %s';
$txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'] = 'יוצרו <b>%s</b> תמונות מוקטנות ו-<b>%s</b> דוגמיות.';
$txt_admin['Nothing to do.'] = 'לא נדרשות פעולות.';
$txt_admin['Your library contains <b>%s</b> pictures.'] = 'ספרייתך כוללת <b>%s</b> תמונות.';

// File upload page
$txt_current_dir="ספריה נוכחית :";
$txt_file_to_upload="קובץ להעלאה:";
$txt_upload_file_from_user="העלה קובץ ממחשבך";
$txt_upload_file_from_url="העלה קובץ מאתר";
$txt_upload_change = "שינוי מספר שדות העלאת קבצים דורש בחירה מחדש של כל הקבצים. מומלץ לבטל, לעלות הקבצים, ובפעם הבאה לבחור מספר שדות מתאים יותר. האם אתה בטוח שברצונך להמשיך בשינוי?";

// User management
$txt_add_user = 'הוסף משתמש';
$txt_back_user_list = 'חזור לרשימת משתמשים';
$txt_confirm_del_user = 'האם אתה בטוח ברצונך למחוק משתמש זה  ?';
$txt_user_info = 'פרטי משתמש';
$txt_login_rule = 'הזן שם עד 20 תוים';
$txt_login_ie = 'לדוגמא: john';
$txt_pass_rule = 'הזן סיסמא עד 32 תוים';
$txt_sec_lvl_rule = 'הזן רמת גישה מ-1 עד 999';
$txt_sec_lvl_ie = "לדוגמא: 10";

$txt_um_login = 'שם משתמש';
$txt_um_pass = 'סיסמא';
$txt_um_sec_lvl = 'רמת גישה';
$txt_um_edit = 'ערוך';
$txt_um_del = 'מחק';

// Configuration Editor page
$txt_admin['Settings'] = 'הגדרות';
$txt_admin['Description'] = 'תאור:';
$txt_admin['Example'] = 'דוגמא:';
$txt_admin['Read-Only option'] = '<b>קריאה בלבד</b> - מסיבות אבטחה, הינך רשאי לשנות הגדרה זו על ידי עריכה ידנית של %s בלבד, או על ידי שימוש ב-install.php.';
$txt_admin['Usage of install recommended'] = 'שימוש ב-<b>%s</b> מומלץ לשינוי הגדרה זו';
$txt_admin['on'] = 'מופעל';
$txt_admin['off'] = 'כבוי';
$txt_admin['Show advanced options'] = 'הצג הגדרות מתקדמות';
$txt_admin['Value for %s is incorrect'] = 'הערך עבור %s שגוי';
$txt_admin['Successfully saved changes to config'] = 'שינוי הגדרות נשמרו בהצלחה';


// Misc
$txt_admin['INSTALL/DEBUG mode is active'] = "<b>WARNING</b>: INSTALL/DEBUG mode is active - Lower the value of \$debug_mode in config.ini.php once you're done.";
$txt_admin['Javascript Disabled'] = "<b>אזהרה</b>: הדפדפן שלך אינו תומך Javascript ועל כן חלק מתכונות הגלריה עשויות שלא לעבוד.";


/********************************************************************************
* ERROR messages
* This section is far from being complete but
*********************************************************************************/

        // 8xx is related to user management
$txt_error['00800'] = "שגיאה:";
$txt_error['00801'] = "מזהה משתמש אינו מוגדר";
$txt_error['00802'] = "מזהה משתמש אינו מספרי";
$txt_error['00803'] = "על שם המשתמש להכיל 1 עד 20 תוים, מבין 0-9 a-z @ - _";
$txt_error['00804'] = "שם משתמש אינו קיים";
$txt_error['00805'] = "על סיסמת המשתמש להכיל 1 עד 32 תוים, מבין 0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #";
$txt_error['00806'] =  "סיסמא אינה מוגדרת";
$txt_error['00807'] = "על רמת הגישה להיות מספר בין 1 עד 999";
$txt_error['00808'] = "רמת הגישה אינה מוגדרת";
$txt_error['00809'] = "שם משתמש קיים";



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
$txt_install['An error has occured while creating your administrator account'] = 'An error has occured while creating your administrator account.';
$txt_install['please choose a login and password'] = 'You\'re about to finish the installation process, please choose a login and a password that you\'ll use to authenticate yourself as Administrator.';
$txt_install['Configuration file has been saved'] = 'Your configuration file has been saved.';
$txt_install['An error has occured while saving your configuration file'] = 'An error has occured while saving your configuration file.';
$txt_install['You can now access your phpgraphy site'] = 'You can now <a href="index.php">access your phpGraphy site</a> !';
$txt_install['One or more problems have occured and your installation is NOT properly finished, please contact the phpGraphy DevTeam with the details of your error(s)'] = 'One or more problems have occured and <b>your installation is NOT properly finished</b>, please contact the phpGraphy DevTeam with the details of your error(s).';

// Initial .welcome file
$txt_install['welcome file content'] = 'שלום

אני קובץ התוכן <b>.welcome</b> בספריית התמונות שלך !
אתה יכול לערוך את תוכני לאחר שתכנס למערכת במנהל.

תוכל לבדוק ההתקנה על ידי מספר פעולות פשוטות:

1/ הכנס כמנהל
2/ נסה ליצור ספריה
3/ נסה להעלות תמונה על ידי הממשק ובעזרת תוכנת FTP
4/ בדוק כי התמונות המוקטנות והדוגמיות נוצרו כהלכה

לאחר שהכל עובר, ערוך אותי (.welcome) על מנת להציג טקסט אחר במיקום זה.

<div style="border: solid 1px; width: 50%; padding: 5px;"><u>טיפ:</u>
יש ביכולתך לשלב תגי HTML, לדוגמא <a href="?toprated=1">תמונות בעות דרוג גבוה</a> או להוסיף תגי IMG להצגת תמונות.
</div>

תודה על בחירתך בשימוש phpGrpahy, אני מקווה שתהנה.
במידה ותתקל בבעיה, או שיש לך רעיון מדהים, אנא צור עימי קשר.
(ראה <a href="http://phpgraphy.sourceforge.net">phpGraphy אתר</a> לפרטי התקשרות)

						JiM / aEGIS.
';


?>
