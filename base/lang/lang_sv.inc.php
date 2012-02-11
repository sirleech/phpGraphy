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
*  $Id: lang_sv.inc.php 406 2007-02-02 00:08:45Z jim $
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
    'language_name_english' => 'Swedish',
    'language_name_native'  => 'Svenska',
    'country_code'          => 'sv',
    'charset'               => 'iso-8859-1',
    'direction'             => 'ltr',
    'for_version'           => '0.9.12',
    'translator_name'       => 'H�kan Olsson',
    'translator_email'      => 'kontakt [at] nordicnature [dot] net' 
    );
// tag g�rna kontakt med mig ang�ende spr�kliga f�rb�ttringar och fel

// Title of your website
$txt_site_title="Min phpGraphy Sida";

// txt_root_dir: text that specify the root of your gallery
$txt_root_dir="start";

// the following variables defines the text used for navigating the gallery
// you can change them to fit your needs and also use images (http://tofz.org/ style)
// e.g: $txt_previous_page='<img src="/gfx/my_previous_image_button.gif">';


// Picture/Thumbs viewing/naviguation
$txt_files='Fil(er)';
$txt_dirs='Mapp(ar)';
$txt_last_commented="Sist kommenterade bilder";

// Rating (if activated)
$txt_no_rating="";
$txt_thumb_rating="Betyg :";
$txt_pic_rating="Genomsnittligt betyg : ";
$txt['%.1f with %s votes'] = '<b>%.1f</b> with %s vote(s)';
$txt_option_rating="Betygs�tt den h�r bilden";
$txt['Best rating'] = 'H�gsta betyg';
$txt['Worst rating'] = 'L�gsta betyg';
$txt['Rate !'] = 'Betygs�tt!';

$txt_back_dir='^Upp^';
$txt_previous_image='&lt;- F�reg�ende';
$txt_next_image='N�sta -&gt;';
$txt_hires_image=' +H�g kval+ ';
$txt_lores_image=' -L�g kval- ';

$txt_previous_page='&lt;- F�reg�ende sida -| ';
$txt_next_page=' |- N�sta sida -&gt; ';

$txt_x_comments="kommentar(er)";

$txt_comments="Kommentarer :";
$txt_add_comment="L�gg till kommentar";
$txt_comment_from="Fr�n: ";
$txt_comment_on=" p� ";
$txt['*filtered*'] = '*Filtrerad*';

// Last commented pictures page
$txt_last_commented_title="Sist %s kommenterade bilder :";
$txt_comment_by="av";

// Top rated pictures page
$txt_top_rated_title="H�gst %s betygsatta bilder :";

// Last added pictures/directories page
$txt['Last %s added pictures :'] = 'Sist %s tillagda bilder :';
$txt['Last %s added pictures per directory :'] = 'Sist %s tillagda bilder per mapp :';

// Top Right Menu (stuff displayed when in admin mode are under the admin section)
$txt_login="logga in";
$txt_logout="logga ut";
$txt_random_pic="Slumpm�ssig bild";


// Login page
$txt['authenticate yourself'] = 'Identifiera dig sj�lv';
$txt_login_form_login="anv�ndarnamn:";
$txt_login_form_pass="l�senord:";


// Add comment page
$txt_comment_form_name="Ditt namn:";
$txt_remember_me="(kom ih�g mig)";
$txt_comment_form_comment="Din kommentar:";

// Generic stuff (used in several places)
$txt_go_back = "G� tillbaka";
$txt_form_submit = "Skicka";
$txt_ok = "OK";
$txt_failed = "Misslyckat";
$txt_ie = 'dvs: ';
$txt['NOTE: '] = 'OBS: ';
$txt['HTML and line breaks supported'] = 'HTML inneh�ll och radbrytningar �r till�tet';
$txt['HTML tags will display in your post as text'] = 'HTML kod visas i din kommentar som text';


// metadata section (EXIF/IPTC)

/* $txt_[exif|iptc]_custom: You can customize the way informations are displayed,
* all keywords are between '%' for a reference of all supported keywords,
* See Documentation for the complete list of available keywords
*/
$txt_exif_custom="%Exif.Make% %Exif.Model%<br />%Exif.ExposureTime%s f/%Exif.FNumber% at %Exif.FocalLength%mm (35mm equiv: %Exif.FocalLengthIn35mmFilm%mm) iso %Exif.ISO% %Exif.Flash%";
$txt_exif_missing_value="??";	// If EXIF requested field is not found, display this instead
$txt_exif_flash="med blixt"; // Test to display if flash was fired

$txt_iptc_custom="%Iptc.City% av %Iptc.ByLine%";
$txt_iptc_missing_value="";	// If IPTC requested field not found, display that instead

$txt['Found_IPTC_metadata'] = 'Hittade IPTC metadata';
$txt['No_IPTC_metadata_found'] = 'Ingen IPTC metadata hittad';

$txt_show_me_more="Visa mig mera!";

// SLIDESHOW
$txt['Slideshow'] = 'Bildspel';
$txt['Slideshow previous'] = '&larr; F�reg�ende';
$txt['Slideshow next'] = 'n�sta &rarr;';
$txt['Slideshow play'] = 'Starta';
$txt['Slideshow pause'] = 'Paus';
$txt['Slideshow close'] = 'St�ng';
$txt['Slideshow delay'] = 'F�rdr�jning';
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
$txt_admin['Admin menu'] = 'Admin meny';
$txt_admin['Create a new directory'] = "Skapa en ny mapp";
$txt_admin['Upload pictures/files'] = "Ladda upp filer/bilder";
$txt_admin['Batch Processing'] = 'G�r tumnaglar/l�guppl�sta bilder'; 
$txt_admin['phpGraphy Settings'] = 'phpGraphy inst�llningar';
$txt_admin['Manage Users'] = 'Administrera  Anv�ndare';
$txt_admin['View logfile'] = 'Se loggfil';

// Picture/Thumbs viewing/naviguation
$txt_admin['picture settings'] = 'Bild inst�llningar';
$txt_admin['directory settings'] = 'Mapp inst�llningar';
$txt_admin['title:'] = 'Titel: ';
$txt_admin['security level:'] = 'S�kerhetsniv�: ';
$txt_admin['inherited:'] = ' �rvd: ';
$txt_admin['cover picture:'] = 'omslagsbild: ';
$txt['select as cover picture'] = 'V�lj omslagsbild f�r den h�r mappen';
$txt['change/remove'] = '�ndra/Ta bort';
$txt['select one'] = 'V�lj en...';
$txt['remove current'] = 'Ta bort nuvarande';
$txt_delete_photo="Ta bort bild";
$txt_delete_photo_thumb="Skapa tumnagel p� nytt";
$txt_delete_directory_text="Ta bort mapp";
$txt_edit_welcome="Redigera .welcome";
$txt_del_comment="Ta bort";

// Confirmation box
$txt_ask_confirm="�r du s�ker ?";
$txt_delete_confirm="Vill du verkligen ta bort ?";

// Image rotation (if available with your config)
$txt['Rotate'] = 'Rotera';
$txt['Rotate 90'] = 'Rotera 90�';
$txt['Rotate 180'] = 'Rotera 180�';
$txt['Rotate 270'] = 'Rotera 270�';


// Editing the .welcome page
$txt_editing="Redigera";
$txt_in_directory="i mappen";
$txt_save="Spara";
$txt_cancel="avbryt";
$txt_clear_all="Rensa allt";


// Directory creation page
$txt_admin['Create a Directory'] = 'Skapa en mapp';
$txt_admin['Current Directory:'] = 'Nuvarande mapp: ';
$txt_dir_to_create="Mapp som ska skapas:";

// Directory deletion
$txt_admin['Deleting %s'] = 'Tar bort %s';
$txt_admin['Directory deleted successfully'] = 'Mappen blev borttagen';
$txt_admin['Problem while deleting this directory'] = 'Det uppstod ett problem n�r mappen skulle tas bort';
$txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'] = 'Misslyckades, kommer att strunta i alla undermappar (�garen �r \'%s\' )';
$txt_admin['(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)'] = '(Var v�nlig och kolla ovanst�ende felmeddelande. F�r att l�sa det h�r problemet s� kan det h�nda att du m�ste ta bort (eller �ndra anv�ndarr�ttigheter) genom att anv�nda FTP,eftersom det �r mycket troligt att en del bilder/mappar tillh�rdin FTP anv�ndare.)';

// Lowres/Thumbs generation page
$txt_admin['Generating all missing thumbnails/low res pictures: (be patient)'] = 'Skapar alla tumnaglar/l�guppl�sta bilder som saknas: (ha t�lamod)';
$txt_admin['Generating low res picture for %s'] = 'Skapar l�g uppl�sta bilder f�r %s';
$txt_admin['Generating thumbnail picture for %s'] = 'Skapar tumnaglar  f�r %s';
$txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'] = 'Skapade <b>%s</b> l�guppl�sta bilder och <b>%s</b> tumnaglar.';
$txt_admin['Nothing to do.'] = 'Ingenting att g�ra';
$txt_admin['Your library contains <b>%s</b> pictures.'] = 'Ditt bibliotek inneh�ller <b>%s</b> bilder.';

$txt_admin['Batch action to execute: '] = 'M�ngdaktion att utf�ra: ';
$txt_admin['Generate all thumbnails/lowres'] = 'Skapa alla tumnaglar/l�guppl�sta';
$txt_admin['Delete all thumbnails/lowres'] = 'Ta bort alla tumnaglar/l�guppl�sta';
$txt_admin['Delete all thumbnails'] = 'Ta bort alla tumnaglar';
$txt_admin['Error while deleting %s'] = 'Fel n�r det togs bort %s';
$txt_admin['Successfully deleted %s of %s files'] = 'Lyckades ta bort %s av %s filer';



// File upload page
$txt_current_dir="Nuvarande mapp :";
$txt_file_to_upload="Fil(er) att ladda upp:";
$txt_upload_file_from_user="Ladda upp fil(er) fr�n din dator";
$txt_upload_file_from_url="Ladda upp fil(er) fr�n en web adress";
$txt_upload_change = "�ndring av antal uppladdningsf�lt kommer att medf�ra att du m�ste v�lja om samtliga filer p� nytt igen. Det rekommenderas att du avbryter. Ladda upp filerna som du har valt, och d�refter kan du v�lja fler uppladdningsf�lt n�sta g�ng. Vill du forts�tta �nd�?";

// User management
$txt_add_user = 'L�gg till anv�ndare';
$txt_back_user_list = 'Tillbaka till anv�ndar\' listan';
$txt_confirm_del_user = '�r du s�ker p� att du vill ta bort den h�r anv�ndaren  ?';
$txt_user_info = 'Anv�ndar information';
$txt_login_rule = 'V�lj ett anv�ndarnamn med upp till 20 tecken';
$txt_login_ie = 't ex: john';
$txt_pass_rule = 'V�lj ett l�senord med upp till 35 tecken';
$txt_sec_lvl_rule = 'V�lj en s�kerhetsniv� mellan 1 och 999';
$txt_sec_lvl_ie = "t ex: 10";

$txt_um_login = 'Anv�ndarnamn';
$txt_um_pass = 'L�senord';
$txt_um_sec_lvl = 'S�kerhetsniv�';
$txt_um_edit = 'Redigera';
$txt_um_del = 'Ta bort';

// Configuration Editor page
$txt_admin['Settings'] = 'Inst�llningar';
$txt_admin['Description'] = 'Beskrivning:';
$txt_admin['Example'] = 'Exempel:';
$txt_admin['Read-Only option'] = '<b>Bara l�sr�ttigheter</b> - Av s�kerhetssk�l s� kan du bara modifiera den h�r inst�llningen genom att manuellt modifiera %s eller genom att anv�nda install.php';
$txt_admin['Usage of install recommended'] = 'Anv�ndning av <b>%s</b> �r rekommenderad f�r att �ndra den h�r inst�llningen';
$txt_admin['on'] = 'P�';
$txt_admin['off'] = 'Av';
$txt_admin['Show advanced options'] = 'Visa avancerade inst�llningar';
$txt_admin['Value for %s is incorrect'] = 'V�rdet f�r %s �r felaktigt';
$txt_admin['Successfully saved changes to config'] = 'Lyckades med att spara �ndringarna till konfigurationen';


// Misc
$txt_admin['INSTALL/DEBUG mode is active'] = "<b>VARNING</b>: INSTALLATION/FELS�KNINGSL�GE �r aktivt - Minska v�rdet p� \$debug_mode i config.ini.php s� fort du �r f�rdig.";
$txt_admin['Javascript Disabled'] = "<b>VARNING</b>: Din webbl�sare st�djer inte javascript, s� vissa funktioner kommer att vara otillg�ngliga.";


/********************************************************************************
* ERROR messages
* This section is far from being complete but
*********************************************************************************/

// 2xx is related to filesystem permissions/ownership
$txt_error['00251'] = 'Den h�r mappen �r INTE skrivbar, det kan orsaka vissa problem (dvs: att skapa tumnaglar/l�guppl�sta bilder)';
// 8xx is related to user management
$txt_error['00800'] = "FEL:";
$txt_error['00801'] = "Uid �r inte inst�llt";
$txt_error['00802'] = "Uid �r inte numerisk";
$txt_error['00803'] = "Anv�ndarnamn b�r inneh�lla 1 till 20 av f�ljande tecken: 0-9 a-z @ - _";
$txt_error['00804'] = "Anv�ndarnamn �r inte inst�llt";
$txt_error['00805'] = "L�senord b�r inneh�lla fr�n 1 till 32 av f�ljande tecken: 0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #";
$txt_error['00806'] = "L�senord �r inte inst�llt";
$txt_error['00807'] = "S�kerhetsniv�n ska vara ett nummer mellan 1 och 999";
$txt_error['00808'] = "S�kerhetsniv�n �r inte inst�lld";
$txt_error['00809'] = "Anv�ndarnamnet finns redan";



/********************************************************************************
* INSTALL Part
* Text only displayed during the install process
*********************************************************************************/

$txt_install['next step'] = 'N�sta steg ->';

// Step 2
$txt_install['IP address check'] = 'IP adress kontroll';
$txt_install['for security reasons, proove that it is your the admin'] = 'Av s�kerhetssk�l, s� m�ste du visa att du �r administrat�r f�r den h�r siten.';
$txt_install['finally, reload this page'] = '�ntligen, <a href="javascript:window.location.reload()">ladda om</a> den h�r sidan';
$txt_install['copy INI_FILE.sample to INI_FILE'] = 'Kopiera f�ljande fil %s till %s';
$txt_install['located under the conf subdir of phpgraphy dir'] = 'finns under %s undermapp i din phpGraphy mapp.';
$txt_install['open INI_FILE with your favorite text editor and replace admin_ip with your ip'] = '�ppna %s med din text-redigerare (t ex wordpad) och ers�tt v�rdet av %s med din IP adress som �r %s';
$txt_install['upload INI_FILE on your webserver under the CONF_DIR dir'] = 'Ladda upp %s p� din webbserver under %s undermapp';

// Step 3
$txt_install['Directories Permissions'] = 'Mapp r�ttigheter';
$txt_install['test_result_passed'] = 'OK';
$txt_install['test_result_failed'] = 'MISSLYCKAT';
$txt_install['Checking that the webuser can write in the following directories :'] = 'Kollar att web-anv�ndaren kan skriva till f�ljande mappar:';
$txt_install['you can not proceed next step'] = 'R�tta till de problem som �r listade ovanf�r och <a href="javascript:window.location.reload()">ladda om</a> sidan';
$txt_install['Is directory %s writable ?'] = '�r mappen %s skrivbar?';
$txt_install['Is file %s writable ?'] = '�r filen %s skrivbar ?';
$txt_install['Directory %s used to store the sessions is not writable and sessions support has been disabled'] = 'Mappen %s <span class="annotation">(anv�nd till att lagra sessions)</span> �r inte skrivbar och session st�d har blivit avaktiverat';

// Step 4
$txt_install['Image Tools Configuration'] = 'Bildverktygs konfiguration';
$txt_install['Image Tools Configuration introduction'] = 'P� den h�r sidan kan du v�lja programvara som anv�nds till att generera tumnaglar/l�guppl�sningsbilder, s�v�l som ett f�r att rotera dem. Installationsprocessen har automatiskt hittat de b�sta valen, och om du inte vet vad du g�r, var v�nlig och forts�tt till n�sta steg.';
$txt_install['If you know what you re doing, please use this button'] = "Om du vet vad du g�r, anv�nd den h�r knappen";
$txt_install['Show me the details'] = 'Visa mig detaljerna';
$txt_install['choose your thumb generator'] = 'Var sn�ll och v�lj ditt bildbehandlingsprogram: ';
$txt_install['gd not supported'] = 'GD st�d �r inte kompilerat p� servern';
$txt_install['gd missing JPG support'] = 'Installerad GD version har inte JPG st�d inkluderat.';
$txt_install['exec function disabled'] = 'exec() funktionen har blivit avaktiverad';
$txt_install['auto-detection failed'] = 'Den automatiska konfigurationen misslyckades';
$txt_install['you need to specify %s path'] = 'Du <b>m�ste</b> specifiera <b>%s</b> s�kv�g: ';
$txt_install['you need to specify the program path'] = 'Du <b>m�ste</b> specifisera s�kv�gen till programmet: ';
$txt_install['no thumb_generator found intro'] = 'Inget fungerande bildebehandlingsprogram hittades. Se detaljerna nedan:';
$txt_install['no thumb_generator found conclusion'] = 'Om det h�r �r din server, s� borde du kunna l�sa problemen. Om inte, s� har du inte n�got annat val, �n att g�ra och ladda upp tumnaglar/l�guppl�sningsbilder sj�lv..';
$txt_install['choose your rotate tool'] = 'Var v�nlig och v�lj programvara f�r rotering av bilder: ';
$txt_install['rotate tool not available'] = 'Bild rotering �r inte tillg�nglig med din konfiguration f�r att exec() har st�ngts av.';
$txt_install['exif has been disabled'] = 'Exif st�d �r inte tillg�nglig med din PHP installation och har d�rf�r st�ngts av.';

// Step 5
$txt_install['Database configuration'] = 'Database konfiguration';
$txt_install['choose your database backend'] = 'V�lj databas st�d som du vill anv�nda: ';
$txt_install['mysql details title'] = 'MySQL Databas parametrar';
$txt_install['database host'] = 'Serverns v�rdnamn :';
$txt_install['database name'] = 'Databas namn :';
$txt_install['database user'] = 'Anv�ndare :';
$txt_install['database pass'] = 'L�senord :';
$txt_install['tables prefix'] = 'Tabell prefix :';
$txt_install['remove invalid characters'] = '* Ta bort ogiltiga tecken';
$txt_install['mysql connection error, see errors'] = 'Kunde inte kontakta databasen, kolla felmeddelande(n) nedanf�r:';
$txt_install['database structure sucessfully created'] = 'Lyckades skapa databasens struktur';
$txt_install['database structure already exists'] = 'En existerande och giltig databas struktur har hittats, s� du kan forts�tta till n�sta steg';
$txt_install['error while creating database structure'] = 'Ett fel har uppst�tt n�r databasens struktur skapades';

// Step 6
$txt_install['Administrator account creation'] = 'Skapa konto till administrat�ren';
$txt_install['Username'] = 'Anv�ndarnamn :';
$txt_install['Password'] = 'L�senord :';
$txt_install['Congratulations, administrator account %s has been created'] = 'Gratulerar, administrat�rens anv�ndarkonto %s har skapats';
$txt_install['An error has occured while creating your administrator account'] = 'Det uppstd ett fel n�r ditt administrat�rkonto skulle skapas.';
$txt_install['please choose a login and password'] = 'Du �r p� v�g att fullg�ra installationsprocessen. Var v�nlig och v�lj ett anv�ndarnamn och l�senord som du kommer att anv�nda f�r att identifiera dig som administrat�r.';
$txt_install['Configuration file has been saved'] = 'Din konfigurationsfil har sparats.';
$txt_install['An error has occured while saving your configuration file'] = 'Ett fel har uppst�tt n�r din konfigurationsfil skulle sparas';
$txt_install['You can now access your phpgraphy site'] = 'Du kan nu <a href="index.php">anv�nda din phpGraphy sida</a> !';
$txt_install['One or more problems have occured and your installation is NOT properly finished, please contact the phpGraphy DevTeam with the details of your error(s)'] = 'Ett eller flera fel uppstod och <b>din installation �r INTE korrekt genomf�rd</b>. Var v�nlig och kontakta phpGraphy DevTeamet med en detaljerad felbeskrivning.';

// Initial .welcome file
$txt_install['welcome file content'] = 'Hej




Jeg �r <b>.welcome</b> filen som finns i din bildmapp (pictures) !
Du kan modifiera mitt inneh�ll s� fort du �r inloggad som administrat�r.

H�r �r en procedur f�r att kolla om installationen har lyckats:

1/ Logga in som administrat�r
2/ Pr�va att skapa en mapp
3/ Pr�va att ladda upp en fil (antingen via web anv�ndargr�nssnittet eller med hj�lp av en FTP-klient)
4/ Kolla om tumnageln blir korrekt skapad

S� fort punkterna ovanf�r fungerar, s� kan du ta bort det h�r och skriva in vad du vill.

<div style="border: solid 1px; width: 50%; padding: 5px;"><u>Tips:</u>
H�r �r ett exempel p� HTML anv�ndning, du kan skapa l�nkar f�r att se <a href="?toprated=1">h�gst betygsatta bilder</a> eller inkludera bilder genom att anv�nda <img> l�nkar.
</div>

Tack f�r att du valde phpGraphy. Jag hoppas att du har stor gl�dje av att anv�nda programmet
Om du hittar ett fel / bug eller har f�rslag till nya funktioner, s� var v�nlig ta kontakt med mig.
(See <a href="http://phpgraphy.sourceforge.net">phpGraphy hemsida</a> f�r kontakt information)

						JiM / aEGIS.
';


?>
