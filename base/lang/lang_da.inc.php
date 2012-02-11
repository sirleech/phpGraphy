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
*  $Id: lang_da.inc.php 406 2007-02-02 00:08:45Z jim $
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
    'language_name_english' => 'Danish',
    'language_name_native'  => 'Dansk',
    'country_code'          => 'da',
    'charset'               => 'iso-8859-1',
    'direction'             => 'ltr',
    'for_version'           => '0.9.12',
    'translator_name'       => 'Erik S&oslash;ndergaard Poulsen',
    'translator_email'      => 'esp [AT] studmed [DOT] au [DOT] dk'
    );

// Title of your website
$txt_site_title="Min phpGraphy side";

// txt_root_dir: text that specify the root of your gallery
$txt_root_dir="rodmappe";

// the following variables defines the text used for navigating the gallery
// you can change them to fit your needs and also use images (http://tofz.org/ style)
// e.g: $txt_previous_page='<img src="/gfx/my_previous_image_button.gif">';


// Picture/Thumbs viewing/navigation
$txt_files='fil(er)';
$txt_dirs='mappe(r)';
$txt_last_commented="sidst kommenterede billeder";

// Rating (if activated)
$txt_no_rating="";
$txt_thumb_rating="Bed&oslash;mmelse:";
$txt_pic_rating="Gennemsnits bed&oslash;mmelse: ";
$txt['%.1f with %s votes'] = '<b>%.1f</b> med %s stemme(r)';
$txt_option_rating="Bed&oslash;m billede";
$txt['Best rating'] = 'Bedst';
$txt['Worst rating'] = 'V&aelig;rst';
$txt['Rate !'] = 'Bed&oslash;m!';

$txt_back_dir=' ^Op^ ';
$txt_previous_image=' &lt;- Forrige';
$txt_next_image='N&aelig;ste -&gt; ';
$txt_hires_image=' +H&oslash;j opl&oslash;sning+ ';
$txt_lores_image=' -Lav opl&oslash;sning- ';

$txt_previous_page='&lt;- Forrige side -| ';
$txt_next_page=' |- N&aelig;ste side -&gt; ';

$txt_x_comments="kommentar(er)";

$txt_comments="Kommentarer:";
$txt_add_comment="Tilf&oslash;j kommentar";
$txt_comment_from="Fra: ";
$txt_comment_on=" p&aring ";
$txt['*filtered*'] = '*filtreret*';

// Last commented pictures page
$txt_last_commented_title="Sidste %s kommenterede billeder:";
$txt_comment_by="af";

// Top rated pictures page
$txt_top_rated_title="Bedste %s bed&oslash;mte billeder:";

// Last added pictures/directories page
$txt['Last %s added pictures :'] = 'Sidsts %s tilf&oslash;jede billeder:';
$txt['Last %s added pictures per directory :'] = 'Sidste %s tilf&oslash;jede billeder per mappe :';

// Top Right Menu (stuff displayed when in admin mode are under the admin section)
$txt_login="login";
$txt_logout="logout";
$txt_random_pic="tilf&aelig;ldigt billede";


// Login page
$txt['authenticate yourself'] = 'Tilkendegiv dig selv';
$txt_login_form_login="brugernavn:";
$txt_login_form_pass="kodeord:";


// Add comment page
$txt_comment_form_name="Dit navn:";
$txt_remember_me="(Husk mig)";
$txt_comment_form_comment="Din kommentar:";

// Generic stuff (used in several places)
$txt_go_back = "Tilbage";
$txt_form_submit = "Send";
$txt_ok = "OK";
$txt_failed = "FEJL";
$txt_ie = 'ie: ';
$txt['NOTE: '] = 'NOTE: ';
$txt['HTML and line breaks supported'] = 'HTML indhold og "line breaks" er underst&oslash;ttet ';
$txt['HTML tags will display in your post as text'] = 'HTML tags i dit indl&aelig; vil blive vist som tekst';


// metadata section (EXIF/IPTC)

/* $txt_[exif|iptc]_custom: You can customize the way informations are displayed,
* all keywords are between '%' for a reference of all supported keywords,
* See Documentation for the complete list of available keywords
*/
$txt_exif_custom="%Exif.Make% %Exif.Model%<br />%Exif.ExposureTime%s f/%Exif.FNumber% å&aring; %Exif.FocalLength%mm (35mm equiv: %Exif.FocalLengthIn35mmFilm%mm) iso %Exif.ISO% %Exif.Flash%";
$txt_exif_missing_value="??";	// If EXIF requested field is not found, display this instead
$txt_exif_flash="med blitz"; // Test to display if flash was fired

$txt_iptc_custom="%Iptc.City% af %Iptc.ByLine%";
$txt_iptc_missing_value="";	// If IPTC requested field not found, display that instead

$txt['Found_IPTC_metadata'] = 'Fandt IPTC metadata';
$txt['No_IPTC_metadata_found'] = 'Ingen IPTC metadata fundet';

$txt_show_me_more="Vis mig mere";

// SLIDESHOW
$txt['Slideshow launch'] = 'Vis som diasshow...';
$txt['Slideshow previous'] = '&larr; Forrige';
$txt['Slideshow next'] = 'N&aelig;ste &rarr;';
$txt['Slideshow play'] = 'Afspil';
$txt['Slideshow pause'] = 'Pause';
$txt['Slideshow close'] = 'Luk';
$txt['Slideshow delay'] = 'Ventetid';
$txt['Slideshow %s sec'] = '%s sek.';
$txt['Slideshow slower'] = '+';
$txt['Slideshow faster'] = '-';

/********************************************************************************
* ADMIN Section
* Text only displayed once you're loggued in as an admin
* So if you, the admin, speak english, you probably won't need to translate this
*********************************************************************************/

// Top right menu (admin text)
$txt_admin['admin'] = 'admin';
$txt_admin['Admin menu'] = 'Adminmenu';
$txt_admin['Create a new directory'] = "Opret en ny mappe";
$txt_admin['Upload pictures/files'] = "Upload billeder/filer";
$txt_admin['Generate Lowres/Thumbnails'] = "Generer lavopl&oslash;sninger/thumbnails";
$txt_admin['phpGraphy Settings'] = 'phpGraphy indstillinger';
$txt_admin['Manage Users'] = 'Administrer brugere';
$txt_admin['View logfile'] = 'Vis logfil';

// Picture/Thumbs viewing/navigation
$txt_admin['picture settings'] = 'Billedindstillinger';
$txt_admin['directory settings'] = 'Mappeindstillinger';
$txt_admin['title:'] = 'Titel: ';
$txt_admin['security level:'] = 'Sikkerhedsniveau: ';
$txt_admin['inherited:'] = ' Tidligere: ';
$txt_admin['cover picture:'] = 'Mappebillede: ';
$txt['select as cover picture'] = 'Anvend som mappebillede for denne mappe';
$txt['change/remove'] = 'Rediger/Slet';
$txt['select one'] = 'V&aelig;lg et...';
$txt['remove current'] = 'Slet dette';
$txt_delete_photo="Slet billede";
$txt_delete_photo_thumb="Slet thumbnail";
$txt_delete_directory_text="Slet mappe";
$txt_edit_welcome="Rediger .welcome-filen";
$txt_del_comment="Slet";

// Confirmation box
$txt_ask_confirm="Er du sikker?";
$txt_delete_confirm="Er du sikker p&aring; du vil slette?";

// Image rotation (if available with your config)
$txt['Rotate'] = 'Roter';
$txt['Rotate 90'] = 'Roter 90°';
$txt['Rotate 180'] = 'Roter 180°';
$txt['Rotate 270'] = 'Roter 270°';


// Editing the .welcome page
$txt_editing="Redigerer";
$txt_in_directory="i mappe";
$txt_save="Gem";
$txt_cancel="Annuller";
$txt_clear_all="Ryd alt";


// Directory creation page
$txt_admin['Create a Directory'] = 'Opret en mappe';
$txt_admin['Current Directory:'] = 'Denne mappe: ';
$txt_dir_to_create="Opret denne mappe:";

// Directory deletion
$txt_admin['Deleting %s'] = 'Sletter %s';
$txt_admin['Directory deleted successfully'] = 'Mappen blev korrekt slettet';
$txt_admin['Problem while deleting this directory'] = 'Problem under sletning af mappe';
$txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'] = 'Fejl, vil springe alle undermapper over (Ejeren er \'%s\' )';
$txt_admin['(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)'] = '(V&aelig;r venlig at notere ovenst&aring;ende fejlmeddelelser, for at rette disse kan du blive n&oslash;dt til at slette (eller &aelig;ndre rettigheder) vha. af din FTP-adgang eftersom det er meget muligt at nogle billeder/mapper er ejet af din FTP-bruger.)';

// Lowres/Thumbs generation page
$txt_admin['Generating all missing thumbnails/low res pictures: (be patient)'] = 'Genererer alle manglende lavopl&oslash;sninger/thumbnails: (Hav t&aring;lmodighed)';
$txt_admin['Generating low res picture for %s'] = 'Genererer lavopl&oslash;sningsbillede af %s';
$txt_admin['Generating thumbnail picture for %s'] = 'Genererer thumbnail billede af %s';
$txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'] = 'Genererede <b>%s</b> lavopl&oslash;sningsbilleder og <b>%s</b> thumbnails.';
$txt_admin['Nothing to do.'] = 'Intet at generere.';
$txt_admin['Your library contains <b>%s</b> pictures.'] = 'Dine mapper indeholder <b>%s</b> billeder.';

$txt_admin['Batch action to execute: '] = 'Udf&oslash;relse af batch-opgaver: ';
$txt_admin['Generate all thumbnails/lowres'] = 'Generer alle thumbnails/lavopl&oslash;sninger';
$txt_admin['Delete all thumbnails/lowres'] = 'Slet alle thumbnails/lavopl&oslash;sninger';
$txt_admin['Delete all thumbnails'] = 'Slet alle thumbnails';
$txt_admin['Error while deleting %s'] = 'Fejl under sletning af %s';
$txt_admin['Successfully deleted %s of %s files'] = '%s ud af %s filer blev slettet';



// File upload page
$txt_current_dir="Nuv&aelig;rende mappe:";
$txt_file_to_upload="Upload fil(er):";
$txt_upload_file_from_user="Upload fil(er) fra din computer";
$txt_upload_file_from_url="Upload en fil fra et URL";
$txt_upload_change = "&Æalig;ndring af uploadfelter vil kr&aelig;ve at du genv&aelig;lger alle de filer du netop har valgt. Det anbefales at du annullerer og uploader de nuv&aelig;rende billeder for derefter at v&aelig;lge et st&oslash;rre antal felter. Vil du forts&aelig;tte?";

// User management
$txt_add_user = 'Tilf&oslash;j bruger';
$txt_back_user_list = 'Tilbage til brugerliste';
$txt_confirm_del_user = 'Er du sikker p&aring; du vil slette denne bruger?';
$txt_user_info = 'Brugerinformation';
$txt_login_rule = 'Angiv et brugernavn p&åring; op til 20 karakterer';
$txt_login_ie = 'f.eks.: Fissan';
$txt_pass_rule = 'Angiv et kodeord p&åring; op til 32 karakterer';
$txt_sec_lvl_rule = 'Angiv et sikkerhedsniveau mellem 1 og 999';
$txt_sec_lvl_ie = "f.eks.: 10";

$txt_um_login = 'Brugernavn';
$txt_um_pass = 'Kodeord';
$txt_um_sec_lvl = 'Sikkerhedsniveau';
$txt_um_edit = 'Rediger';
$txt_um_del = 'Slet';

// Configuration Editor page
$txt_admin['Settings'] = 'Indstillinger';
$txt_admin['Description'] = 'Beskrivelse:';
$txt_admin['Example'] = 'Eksempel:';
$txt_admin['Read-Only option'] = '<b>Read Only</b> - Af sikkerhedshensyn kan du kun &aelig;ndre denne indstilling manuelt ved at editere %s eller ved at bruge install.php.';
$txt_admin['Usage of install recommended'] = 'Brugen af <b>%s</b> er anbefalet til at &aelig;ndre denne indstilling';
$txt_admin['on'] = 'til';
$txt_admin['off'] = 'fra';
$txt_admin['Show advanced options'] = 'Vis avancerede indstillinger';
$txt_admin['Value for %s is incorrect'] = 'V&aelig;rdien for %s er ugyldig';
$txt_admin['Successfully saved changes to config'] = '&AElig;ndringerne i konfigurationen blev succesfuldt gemt';


// Misc
$txt_admin['INSTALL/DEBUG mode is active'] = "<b>ADVARSEL</b>: INSTALL/DEBUG mode er aktiv - S&aelig;nk v&arlig;rdien af \$debug_mode i config.ini.php n&aring;r du er f&aelig;rdig.";
$txt_admin['Javascript Disabled'] = "<b>ADVARSEL</b>: Din browser underst&oslash;tter ikke Javascript. Du vil ikke have fuld funktionalitet.";


/********************************************************************************
* ERROR messages
* This section is far from being complete but 
*********************************************************************************/

// 2xx is related to filesystem permissions/ownership
$txt_error['00251'] = 'Mappen er IKKE skrivbar. Dette kan medf&oslash;re forskellige problemer (f.eks. med at generere thumbs/lavopl&oslash;sningsbilleder)';

// 8xx is related to user management
$txt_error['00800'] = "FEJL:";
$txt_error['00801'] = "Uid er ikke sat";
$txt_error['00802'] = "Uid er ikke numerisk";
$txt_error['00803'] = "Brugernavnet skal best&aring; af fra 1 til 20 af disse karakterer 0-9 a-z @ - _";
$txt_error['00804'] = "Brugernavn er ikke sat";
$txt_error['00805'] = "Kodeordet skal best&aring; af fra 1 til 32 af disse karakterer 0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #";
$txt_error['00806'] = "Kodeord er ikke sat";
$txt_error['00807'] = "Sikkerhedsniveau skal være et nummer fra 1 til 999";
$txt_error['00808'] = "Sikkerhedsniveau er ikke sat";
$txt_error['00809'] = "Brugernavnet findes allerede";



/********************************************************************************
* INSTALL Part
* Text only displayed during the install process
*********************************************************************************/

$txt_install['next step'] = 'N&aelig;ste skridt ->';

// Step 2
$txt_install['IP address check'] = 'Kontrol af IP-adresse';
$txt_install['for security reasons, proove that it is your the admin'] = 'Af sikkerhedshensyn skal du bevise at du er administrator af denne side';
$txt_install['finally, reload this page'] = 'Til slut, <a href="javascript:window.location.reload()">opdater</a> denne side';
$txt_install['copy INI_FILE.sample to INI_FILE'] = 'Kopier filen ved navn %s til %s';
$txt_install['located under the conf subdir of phpgraphy dir'] = 'findes i %s undermappen i din phpGraphy mappe';
$txt_install['open INI_FILE with your favorite text editor and replace admin_ip with your ip'] = '&Aring;bn %s med din favorit tekst-editor og udskift %s med din ip-adresse som er %s';
$txt_install['upload INI_FILE on your webserver under the CONF_DIR dir'] = 'Upload %s til din webserver i %s undermappen';

// Step 3
$txt_install['Directories Permissions'] = 'Mappeadgang';
$txt_install['test_result_passed'] = 'OK';
$txt_install['test_result_failed'] = 'FEJL';
$txt_install['Checking that the webuser can write in the following directories :'] = 'Unders&oslash;ger om webbrugeren har skriveadgang til f&oslash;lgende mapper :';
$txt_install['you can not proceed next step'] = 'Ret ovenst&aring;ende problem(er) og <a href="javascript:window.location.reload()">opdater</a> denne side';
$txt_install['Is directory %s writable ?'] = 'Er mappen %s skrivbar ?';
$txt_install['Is file %s writable ?'] = 'Er filen %s skrivbar ?';
$txt_install['Directory %s used to store the sessions is not writable and sessions support has been disabled'] = 'Mappen %s <span class="annotation">(brugt til at gemme sessions)</span> er ikke skrivbar og session underst&oslash;ttelse er blevet deaktiveret.';

// Step 4
$txt_install['Image Tools Configuration'] = 'Konfiguration af billedbehandlingsv&aelig;rkt&oslash;jer';
$txt_install['Image Tools Configuration introduction'] = 'P&aring; denne side kan du v&aelig;lge den software der skal bruges til at generere thumbnails og lavopl&oslash;sningsbilleder samt rotere dem. Installationen har automatisk fundet de bedste valg, a&aring; medmindre du ved hvad du laver, skal du bare g&aring; videre til n&aelig;ste skridt.';
$txt_install['If you know what you re doing, please use this button'] = "Hvis du ved hvad du laver, s&aring; tryk p&aring; denne knap";
$txt_install['Show me the details'] = 'Vis mig detaljerne';
$txt_install['choose your thumb generator'] = 'V&aelig;lg venligst dit billedbehandlingsprogram: ';
$txt_install['gd not supported'] = 'GD underst&oslash;ttelse er ikke kompileret p&aring; serveren';
$txt_install['gd missing JPG support'] = 'Den installerede GD version har ikke JPG-underst&oslash;ttelse inkulderet';
$txt_install['exec function disabled'] = 'exec() funktion er deaktiveret';
$txt_install['auto-detection failed'] = 'Auto-detektion fejlede';
$txt_install['you need to specify %s path'] = 'Du <b>skal</b> angive <b>%s</b> sti: ';
$txt_install['you need to specify the program path'] = 'Du <b>skal</b> angive programstien: ';
$txt_install['no thumb_generator found intro'] = 'Intet fungerende billedbehandlingsprogram blev fundet, se nedenst&aring;ende detaljer.';
$txt_install['no thumb_generator found conclusion'] = 'Hvis dette er din server skal du fors&oslash;ge at l&oslash;se problemerne, ellers har du intet andet valg end at uploade thumbnails and lavopl&oslash;sningsbilleder selv.';
$txt_install['choose your rotate tool'] = 'V&aelig; venligst dit billedrotationssoftware: ';
$txt_install['rotate tool not available'] = 'Billedrotation er ikke mulig med din konfiguration da exec() er deaktiveret.';
$txt_install['exif has been disabled'] = 'Exif support er ikke tilg&arlig;ngelig i din PHP installation og er derfor deaktiveret';

// Step 5
$txt_install['Database configuration'] = 'Database konfiguration';
$txt_install['choose your database backend'] = 'V&aelig;lg den database backend du vil bruge: ';
$txt_install['mysql details title'] = 'MySQL Database parametre';
$txt_install['database host'] = 'Server hostname:';
$txt_install['database name'] = 'Database navn:';
$txt_install['database user'] = 'User:';
$txt_install['database pass'] = 'Password:';
$txt_install['tables prefix'] = 'Tabeller prefix:';
$txt_install['remove invalid characters'] = '* Fjern ugyldige karakterer';
$txt_install['mysql connection error, see errors'] = 'Kunne ikke f&aring; forbindelse til databasen. Se nedenst&aring;ende fejlmeddelelse(r):';
$txt_install['database structure sucessfully created'] = 'Databasestrukturen blev succefuldt oprettet';
$txt_install['database structure already exists'] = 'En eksisterende brugbar databasestruktur blev fundet, du kan g&aring; videre til n&aelig;ste skridt';
$txt_install['error while creating database structure'] = 'Der skete en fejl under oprettelse af databasestrukturen';

// Step 6
$txt_install['Administrator account creation'] = 'Oprettelse af administratorkonto';
$txt_install['Username'] = 'Brugernavn :';
$txt_install['Password'] = 'Kodeord :';
$txt_install['Congratulations, administrator account %s has been created'] = 'Tillykke, administratorkonto %s blev oprettet';
$txt_install['An error has occured while creating your administrator account'] = 'Der skete en fejl under oprettelsen af din administratorkonto.';
$txt_install['please choose a login and password'] = 'Du er n&aelig;sten f&aelig;rdig med installationen. V&aelig;lg venligst det brugernavn og kodeord du vil bruge til at logge ind som administrator.';
$txt_install['Configuration file has been saved'] = 'Din konfigurationsfil er blevet gemt.';
$txt_install['An error has occured while saving your configuration file'] = 'Der opstod en fejl i forbindelse med lagring af din konfigurationsfil.';
$txt_install['You can now access your phpgraphy site'] = 'Du har nu <a href="index.php">adgang til din phpGraphy side</a>!';
$txt_install['One or more problems have occured and your installation is NOT properly finished, please contact the phpGraphy DevTeam with the details of your error(s)'] = 'Et eller flere problemer er opst&aring;et og <b>din installation er IKKE korrekt afsluttet</b>, v&aelig;r venlig at kontakte phpGraphy DevTeam med detaljer vedr. dine problemer.';

// Initial .welcome file
$txt_install['welcome file content'] = 'Hej

Jeg er <b>.welcome</b>-filen placeret i din billedmappe (pictures)!
Du kan &aelig;ndre mig online n&aring;r der er logget ind som admin.

Her er en grundl&aelig;ggende fremgangsm&aring;de til verifikation af installationen:

1/ Log ind som admin
2/ Pr&oslash;v at oprette en mappe
3/ Pr&oslash;v at uploade et billede (enten via webinterfacet eller via din FTP-klient)
4/ Se om der bliver dannet et korrekt thumbnail

N&aring;r det hele virker kan du skrive lige hvad du har lyst til her.

<div style="border: solid 1px; width: 50%; padding: 5px;"><u>Tip:</u>
Her er et eksempel p&aring; brug af HTML. Du kan f.eks. lave links som dette <a href="?toprated=1">bedst bed&oslash;mte billeder</a> eller inkludere billeder vha. img links.
</div>

Tak fordi du valgte phpGraphy. Vi h&aring;ber du vil nyde at bruge dette software.
St&oslash;der du p&aring; bugs eller har gode ideer til nye features bedes du kontakte udviklingsholde.
(Se <a href="http://phpgraphy.sourceforge.net">phpGraphy website</a> for kontaktdetaljer)

						JiM / aEGIS.
';


?>
