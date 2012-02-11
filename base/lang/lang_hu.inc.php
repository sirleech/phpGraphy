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
*  $Id: lang_hu.inc.php 406 2007-02-02 00:08:45Z jim $
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
    'language_name_english' => 'Hungarian',
    'language_name_native'  => 'Magyar',
    'country_code'          => 'hu',
    'charset'               => 'iso-8859-2',
    'direction'             => 'ltr',
    'for_version'           => '0.9.13',
    'translator_name'       => 'Besz�des Bal�zs',
    'translator_email'      => 'beszedes [at] gmail [dot] com'
    );

// Title of your website
$txt_site_title="Az �n phpGraphy gal�ri�m";

// txt_root_dir: text that specify the root of your gallery
$txt_root_dir="kezd�lap";

// the following variables defines the text used for navigating the gallery
// you can change them to fit your needs and also use images (http://tofz.org/ style)
// e.g: $txt_previous_page='<img src="/gfx/my_previous_image_button.gif">';


// Picture/Thumbs viewing/naviguation
$txt_files='f�jl(ok)';
$txt_dirs='mappa';
$txt_last_commented="legut�bb v�lem�nyezett k�pek";
$txt_top_rated="legt�bb szavazat k�pek";
$txt_last_added="friss k�pek";
$txt_last_added_per_directory="friss k�pek albumonk�nt";

// Rating (if activated)
$txt_no_rating="";
$txt_thumb_rating="�rt�kel�s :";
$txt_pic_rating="<br />�tlag : ";
$txt['%.1f with %s votes'] = '<b>%.1f</b>. helyez�s %s szavazattal';
$txt_option_rating="�rt�kelje a k�pet";
$txt['Best rating'] = 'Legjobb k�p';
$txt['Worst rating'] = 'Legrosszabb k�p';
$txt['Rate !'] = '�rt�keld!';

$txt_back_dir='^Vissza^';
$txt_previous_image='&lt;- El�z�';
$txt_next_image='K�vetkez� -&gt;';
$txt_hires_image=' +Nagy felbont�s+ ';
$txt_lores_image=' -Alacsony felbont�s- ';

$txt_previous_page='&lt;- El�z� lap -| ';
$txt_next_page=' |- K�vetkez� lap -&gt; ';

$txt_x_comments="V�lem�ny(ek)";

$txt_comments="V�lem�nyek:";
$txt_add_comment="V�lem�ny hozz�ad�sa";
$txt_comment_from="Felad�: ";
$txt_comment_on=" D�tum: ";
$txt['*filtered*'] = '*kisz�rve*';

// Last commented pictures page
$txt_last_commented_title="Utols� %s v�lem�nyezett k�p:";
$txt_comment_by="-t�l";

// Top rated pictures page
$txt_top_rated_title="Legjobb %s k�p:";

// Last added pictures/directories page
$txt['Last %s added pictures :'] = 'Utolj�ra felt�lt�tt %s k�p:';
$txt['Last %s added pictures per directory :'] = 'A k�nyvt�rba legut�bb felt�lt�tt %s k�p:';

// Top Right Menu (stuff displayed when in admin mode are under the admin section)
$txt_login="Bejelentkez�s";
$txt_logout="Kijelentkez�s";
$txt_random_pic="V�letlen k�p";


// Login page
$txt['authenticate yourself'] = 'Azonos�tsd magad';
$txt_login_form_login="felhaszn�l�:";
$txt_login_form_pass="jelsz�:";


// Add comment page
$txt_comment_form_name="Az �n neve:";
$txt_remember_me="(Eml�kezzen r�m)";
$txt_comment_form_comment="V�lem�ny:";

// Generic stuff (used in several places)
$txt_go_back = "Vissza";
$txt_form_submit = "Ment";
$txt_ok = "OK";
$txt_failed = "HIBA";
$txt_ie = 'pld: ';
$txt['NOTE: '] = 'FIGYELEM: ';
$txt['HTML and line breaks supported'] = 'HTML tartalom �s sort�r�s t�mogatott';
$txt['HTML tags will display in your post as text'] = 'HTML tag-ek sima sz�vegk�nt jelennek meg a v�lem�nyben';
$txt['Get Help'] = 'Seg�ts�g';
$txt['Save as'] = 'Ment�s m�sk�nt...';

// metadata section (EXIF/IPTC)

/* $txt_[exif|iptc]_custom: You can customize the way informations are displayed,
* all keywords are between '%' for a reference of all supported keywords,
* See Documentation for the complete list of available keywords
*/
$txt_exif_custom="%Exif.Make% %Exif.Model%<br />%Exif.ExposureTime%s f/%Exif.FNumber% at %Exif.FocalLength%mm (35mm equiv: %Exif.FocalLengthIn35mmFilm%mm) iso %Exif.ISO% %Exif.Flash%";
$txt_exif_missing_value="??";	// If EXIF requested field is not found, display this instead
$txt_exif_flash="vakuval"; // Test to display if flash was fired

$txt_iptc_custom="%Iptc.City% by %Iptc.ByLine%";
$txt_iptc_missing_value="";	// If IPTC requested field not found, display that instead

$txt['Found_IPTC_metadata'] = 'Van IPTC metaadat';
$txt['No_IPTC_metadata_found'] = 'Nincs IPTC metaadat';


$txt_show_me_more="T�bb info";

// SLIDESHOW
$txt['slideshow'] = 'Vet�t�s';
$txt['Slideshow previous'] = '&larr; El�z�';
$txt['Slideshow next'] = 'K�vetkez� &rarr;';
$txt['Slideshow play'] = 'Lej�tsz�s';
$txt['Slideshow pause'] = 'Megszak�t�s';
$txt['Slideshow close'] = 'Bez�r';
$txt['Slideshow delay'] = 'K�s�bb';
$txt['Slideshow %s sec'] = '%s sec.';
$txt['Slideshow slower'] = '+';
$txt['Slideshow faster'] = '-';
$txt['Slideshow hide captions'] = 'k�pal��r�s elrejt�se';
$txt['Slideshow show captions'] = 'k�pal��r�s mutat�sa';

/********************************************************************************
* ADMIN Section
* Text only displayed once you're loggued in as an admin
* So if you, the admin, speak english, you probably won't need to translate this
*********************************************************************************/

// Top right menu (admin text)
$txt_admin['admin'] = 'admin';
$txt_admin['Admin menu'] = 'Adminisztr�ci�';
$txt_admin['Create a new directory'] = "�j k�nyvt�r l�trehoz�sa";
$txt_admin['Upload pictures/files'] = "K�pek/f�jlok felt�lt�se";
$txt_admin['Batch Processing'] = 'Batch Feldolgoz�s'; 
$txt_admin['phpGraphy Settings'] = 'Be�ll�t�sok';
$txt_admin['Manage Users'] = 'Felhaszn�l�k kezel�se';
$txt_admin['View logfile'] = 'Log megtekint�se';

// Picture/Thumbs viewing/navigation
$txt_admin['picture settings'] = 'K�p be�ll�t�sok';
$txt_admin['directory settings'] = 'K�nyvt�r be�ll�t�sok';
$txt_admin['title:'] = 'C�m: ';
$txt_admin['security level:'] = 'Biztons�gi szint: ';
$txt_admin['inherited:'] = ' �r�kl�tt: ';
$txt_admin['cover picture:'] = 'Fed� k�p: ';
$txt['select as cover picture'] = 'Kiv�laszt�s a jelen k�nyvt�r fed�k�p�nek';
$txt['change/remove'] = 'M�dos�t/Elt�vol�t';
$txt['select one'] = 'Kiv�laszt�s...';
$txt['remove current'] = 'Jelenlegi elt�vol�t�sa';
$txt_delete_photo="K�p t�rl�se";
$txt_delete_photo_thumb="Kisk�pek �jragener�l�sa";
$txt_delete_directory_text="K�nyvt�r t�rl�se";
$txt_edit_welcome=".welcome szerkeszt�se";
$txt_del_comment="T�r�l";

// Confirmation box
$txt_ask_confirm="Biztos benne?";
$txt_delete_confirm="Biztos, hogy t�rli?";

// Image rotation (if available with your config)
$txt['Rotate'] = 'Forgat�s';
$txt['Rotate 90'] = 'Forgat�s 90�';
$txt['Rotate 180'] = 'Forgat�s 180�';
$txt['Rotate 270'] = 'Forgat�s 270�';


// Editing the .welcome page
$txt_editing = "Szerkeszt�s";
$txt_in_directory = "k�nyvt�rban";
$txt_save = "Ment�s";
$txt_cancel = "M�gsem";
$txt_clear_all = "Minden t�rl�se";


// Directory creation page
$txt_admin['Create a Directory'] = 'K�nyvt�r l�trehoz�sa';
$txt_admin['Current Directory:'] = 'Jelenlegi k�nyvt�r: ';
$txt_dir_to_create = "K�nyvt�r l�trehoz�sa:";

// Directory deletion
$txt_admin['Deleting %s'] = '%s t�rl�se';
$txt_admin['Directory deleted successfully'] = 'K�nyvt�r sikeresen t�r�lve';
$txt_admin['Problem while deleting this directory'] = 'Hiba t�rt�nt a k�nyvt�r t�rl�sekor';
$txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'] = 'Nem siker�lt, minden alk�nyvt�r kihagy�sa (Tulajdonos \'%s\' )';
$txt_admin['(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)'] = '(K�rem ellen�rizze a fenti hiba�zeneteket! A hiba elh�r�t�sa �rdek�ben lehet hogy t�r�lni kell egyes k�peket / k�nyvt�rakat, vagy a jogosults�gokat kell �t�ll�tani FTP kliens haszn�lat�val, mert minden val�sz�n�s�g szerint egyes f�jlok az FTP felhaszn�l�hoz tartoznak.)';

// Lowres/Thumbs generation page
$txt_admin['Generating all missing thumbnails/low res pictures: (be patient)'] = 'Hi�nyz� kisk�pek �s kisfelbont�s� k�pek gener�l�sa (legyen t�relemmel!):';
$txt_admin['Generating low res picture for %s'] = '%s k�pb�l kisfelbont�s� k�p gener�l�sa';
$txt_admin['Generating thumbnail picture for %s'] = '%s k�pb�l kisk�p gener�l�sa';
$txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'] = '<b>%s</b> kisfelbont�s� k�p �s <b>%s</b> kisk�p legener�lva.';
$txt_admin['Nothing to do.'] = 'Nincs mit tenni.';
$txt_admin['Your library contains <b>%s</b> pictures.'] = 'A k�nyvt�rban <b>%s</b> darab k�p van.';

$txt_admin['Batch action to execute: '] = 'V�grehajtand� batch feladat: ';
$txt_admin['Generate all thumbnails/lowres'] = '�sszes kisk�p / kisfelbont�s� k�p gener�l�sa';
$txt_admin['Delete all thumbnails/lowres'] = '�sszes kisk�p / kisfelbont�s� k�p t�rl�se';
$txt_admin['Delete all thumbnails'] = '�sszes kisk�p t�rl�se';
$txt_admin['Error while deleting %s'] = 'Hiba t�rt�nt a %s kisk�p t�rl�sekor!';
$txt_admin['Successfully deleted %s of %s files'] = 'Sikeresen t�r�ltem %s darab kisk�pet a(z) %s-b�l!';



// File upload page
$txt_current_dir="Jelenlegi k�nyvt�r :";
$txt_file_to_upload="Felt�ltend� f�jl(ok):";
$txt_upload_file_from_user="Felt�lt�s saj�tg�pr�l";
$txt_upload_file_from_url="Felt�lt�s hivatkoz�sr�l (URL)";
$txt_upload_change = "A felt�ltend� f�jlok sz�m�nak megv�ltoztat�sa ut�n az �sszes kor�bban kiv�lasztott f�jlt �jra ki kell v�lasztani. Javasolt most m�gsemet v�lasztani, felt�lteni a m�r kiv�lasztott k�peket �s k�vetkez� alkalommal egy nagyobb sz�mot megadni. Biztos, hogy folytatja?";

// User management
$txt_add_user = 'Felhaszn�l� l�trehoz�sa';
$txt_back_user_list = 'Vissza a felhaszn�l�k list�j�hoz';
$txt_confirm_del_user = 'Biztos, hogy t�rli ezt a felhaszn�l�t?';
$txt_user_info = 'Felhaszn�l�i adatok';
$txt_login_rule = 'Adjon meg egy max. 20 karakteres felhaszn�l�nevet!';
$txt_login_ie = 'pld: janos';
$txt_pass_rule = 'Adjon meg egy max. 32 karakteres jelsz�t';
$txt_sec_lvl_rule = 'Adjon meg egy biztons�gi szintet 1 �s 999 k�z�tt!';
$txt_sec_lvl_ie = "pld: 10";
$txt_admin['Password is encrypted and can not be recovered'] = '<b>FIGYELEM:</b> A jelsz� titkos�tott �s nem visszak�dolhat�. Lent viszont tud �jat megadni!';

$txt_um_login = 'Felhaszn�l�';
$txt_um_pass = 'Jelsz�';
$txt_um_sec_lvl = 'Biztons�gi szint';
$txt_um_edit = 'Szerkeszt�s';
$txt_um_del = 'T�rl�s';

// Configuration Editor page
$txt_admin['Settings'] = 'Be�ll�t�sok';
$txt_admin['Description'] = 'Le�r�s:';
$txt_admin['Example'] = 'P�lda:';
$txt_admin['Read-Only option'] = '<b>Csak olvashat�</b> - Biztons�gi okokb�l ezt a be�ll�t�st csak k�zzel tudja m�dos�tani az %s f�jlban, vagy haszn�lja az automata telep�t�t (install.php)!';
$txt_admin['Usage of install recommended'] = 'A <b>%s</b> haszn�lata aj�nlott a be�ll�t�s megv�ltoztat�s�hoz!';
$txt_admin['on'] = 'be';
$txt_admin['off'] = 'ki';
$txt_admin['Show advanced options'] = 'Halad� be�ll�t�sok';
$txt_admin['Value for %s is incorrect'] = 'A %s be�ll�t�shoz megadott �rt�k hib�s!';
$txt_admin['Successfully saved changes to config'] = 'A be�ll�t�sok m�dos�t�sa sikeresen mentve!';


// Misc
$txt_admin['INSTALL/DEBUG mode is active'] = "<b>FIGYELEM</b>: INSTALL/DEBUG m�d akt�v - Cs�kkentse \$debug_mode �rt�k�t a config.ini.php f�jlban!";
$txt_admin['Javascript Disabled'] = "<b>FIGYELEM</b>: Az �n b�ng�sz�je nem t�mogatja a Javascript-et, �gy egyes funkci�kat nem fog tudni haszn�lni!";


/********************************************************************************
* ERROR messages
* This section is far from being complete but 
*********************************************************************************/

// Unknow error
$txt_error['00000'] = 'Ismeretlen hiba t�rt�nt, k�rem jelentse a <a href="%s" target="_blank">fejleszt�knek</a>. Ne felejtse el meg�rni, hogy milyen k�r�lm�nyek k�z�tt t�rt�nt a hiba!';

// 1xx - Installation related

// 2xx - Filesystem permissions/ownership related
$txt_error['00201'] = "Figyelem, a 'use_direct_urls' be van kapcsolva �s m�g van egy .htaccess f�jl is a k�pek k�nyvt�r�ban. Val�sz�n�leg probl�m�i lesznek a k�pek megjelen�t�s�vel.";
$txt_error['00251'] = 'Ez a f�jl / k�nyvt�r nem �rhat�, ez t�bb hib�t is okozhat (pld: kisk�pek gener�l�sa, �tm�retez�s).';

// 3xx - PHP settings related
$txt_error['00301'] = "Figyelem, ez a parancs le�llhat, mert a max_execution_time �rt�ke t�l alacsony (%s m�sodperc) �s a phpGraphy sem tudta megn�velni.";
$txt_error['00303'] = "exec() le van tiltve ebben a PHP telep�t�sben.";

// 4xx - File upload related
$txt_error['00401'] = "A %s felt�lt�se nem siker�lt, egy k�p ugyanezzel a n�vvel m�r l�tezik. T�r�lje le l�tez� f�jlt a felt�lt�s el�tt!";

// 5xx - Misc
$txt_error['00501'] = "'topratings' �tnevez�sre ker�lt 'toprated're, friss�tse a linkjeit!";

// 8xx is related to user management
$txt_error['00800'] = "HIBA:";
$txt_error['00801'] = "Uid nincs be�ll�tva!";
$txt_error['00802'] = "Uid is nem sz�m!";
$txt_error['00803'] = "A felhaszn�l�n�v 1, max. 20 darab ilyen karaktert tartalmazhat: 0-9 a-z @ - _";
$txt_error['00804'] = "Felhaszn�l� nincs megadva!";
$txt_error['00805'] = "A jelsz� legal�bb 1, max. 32 darab ilyen karaktert tartalmazhat: 0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #";
$txt_error['00806'] = "Jelsz� nincs megadva!";
$txt_error['00807'] = "A biztons�gi szint egy sz�m kell legyen 1 �s 999 k�z�tt";
$txt_error['00808'] = "Biztons�gi szint nincs megadva!";
$txt_error['00809'] = "Felhaszn�l� m�r l�tezik!";



/********************************************************************************
* INSTALL Part
* Text only displayed during the install process
*********************************************************************************/

$txt_install['next step'] = 'K�vektez� l�p�s ->';

// Step 2
$txt_install['IP address check'] = 'IP c�m ellen�rz�se';
$txt_install['for security reasons, proove that it is your the admin'] = 'Biztons�gi okokb�l, be kell bizon�tania, hogy t�nyleg �n az oldal adminisztr�tora.';
$txt_install['finally, reload this page'] = 'V�g�l <a href="javascript:window.location.reload()">t�ltse �jra</a> ezt az oldalt';
$txt_install['copy INI_FILE.sample to INI_FILE'] = '%s f�jlt m�solja ide: %s';
$txt_install['located under the conf subdir of phpgraphy dir'] = 'a %s alk�nyvt�rban tal�lhat� a phpGraphy k�nyvt�rban';
$txt_install['open INI_FILE with your favorite text editor and replace admin_ip with your ip'] = 'Nyissa meg a %s a kedvenc szerkeszt�j�ben �s a %s �rt�ket cser�lje le az IP c�m�vel, ami %s';
$txt_install['upload INI_FILE on your webserver under the CONF_DIR dir'] = 'T�ltse fel a %s f�jlt a webszerveren a %s k�nyvt�rba';

// Step 3
$txt_install['Directories Permissions'] = 'K�nyvt�r Jogosults�gok';
$txt_install['test_result_passed'] = 'OK';
$txt_install['test_result_failed'] = 'HIBA';
$txt_install['Checking that the webuser can write in the following directories :'] = 'Webuser �r�si jogosults�gok ellen�rz�se a k�vetkez� k�nyvt�rakon :';
$txt_install['you can not proceed next step'] = 'Jav�tsa ki a fenti hib�kat �s <a href="javascript:window.location.reload()">t�ltse �jra</a> ezt az oldalt';
$txt_install['Is directory %s writable ?'] = 'A %s k�nyvt�r �rhat� ?';
$txt_install['Is file %s writable ?'] = 'A %s f�jl �rhat� ?';
$txt_install['Directory %s used to store the sessions is not writable and sessions support has been disabled'] = 'A <span class="annotation">(a session�k t�rol�s�ra haszn�lt)</span> %s k�nyvt�r nem �rhat�, session t�mogat�s lekapcsolva';

// Step 4
$txt_install['Image Tools Configuration'] = 'K�p Eszk�z Be�ll�t�sok';
$txt_install['Image Tools Configuration introduction'] = 'Ezen az oldalon kiv�laszthatja azokat a szoftvereket, amelyekkel a kisk�peket, alacsony felbont�s� k�peket gener�lja �s a forgat�sokat elv�gezheti. A telep�t� automatikusan a legjobb be�ll�t�sokat kiv�lasztotta, k�rj�k egyszer�en l�pjen tov�bb, hacsak t�nygel tudja mit csin�l :-).';
$txt_install['If you know what you re doing, please use this button'] = "Ha tudja mit csin�l, haszn�lja ezt a gombot";
$txt_install['Show me the details'] = 'Mutassa a r�szleteket';
$txt_install['choose your thumb generator'] = 'K�rem, v�lassza ki a k�pfeldolgoz� szoftvert: ';
$txt_install['gd not supported'] = 'GD t�mog�ts nincs beford�tva';
$txt_install['gd missing JPG support'] = 'A telep�tett GD verzi� nem tartalmazza a JPG t�mogat�st';
$txt_install['exec function disabled'] = 'exec() f�ggv�ny haszn�lata letiltva';
$txt_install['auto-detection failed'] = 'Automatikus felismer�s nem siker�lt';
$txt_install['you need to specify %s path'] = 'Meg <b>kell</b> adnia a <b>%s</b> el�r�s�t: ';
$txt_install['you need to specify the program path'] = 'Meg <b>kell</b> adnia a program el�r�s�t: ';
$txt_install['no thumb_generator found intro'] = 'Nem tal�ltam m�k�d� k�pfeldolgoz� programot, r�szleteket lent tal�lja.';
$txt_install['no thumb_generator found conclusion'] = 'Ha ez az �n szervere, akkor k�pes lehet megoldani ezt a probl�m�t, ellenkez� esetben nincs m�s megold�s, mint a kisk�pek �s kisfelbont�s� k�pek k�zzel val� felt�lt�se.';
$txt_install['choose your rotate tool'] = 'V�lassza ki a k�pforgat� programot: ';
$txt_install['rotate tool not available'] = 'A k�pforgat�s nem el�rhet�, mert az exec() f�ggv�ny haszn�lata le van tiltva.';
$txt_install['exif has been disabled'] = 'Exif t�mogat�s nem el�rhet� az �n PHP telep�t�s�ben, ez�rt le is van tiltva.';

// Step 5
$txt_install['Database configuration'] = 'Adatb�zis be�ll�t�s';
$txt_install['choose your database backend'] = 'V�lassza ki a haszn�lni k�v�nt adatb�zis fajt�t: ';
$txt_install['mysql details title'] = 'MySQL adatb�zis param�terek';
$txt_install['database host'] = 'Szerver hosztn�v :';
$txt_install['database name'] = 'Adatb�zis n�v :';
$txt_install['database user'] = 'Felhaszn�l� :';
$txt_install['database pass'] = 'Jelsz� :';
$txt_install['tables prefix'] = 'T�bla prefix :';
$txt_install['remove invalid characters'] = '* �rv�nytelen karaktereket el kell t�vol�tani';
$txt_install['mysql connection error, see errors'] = 'Nem lehet az adatb�zishoz kapcsol�dni, ellen�rizze a hib�(ka)t:';
$txt_install['database structure sucessfully created'] = 'Adatb�zis strukt�ra sikeresen l�trehozva';
$txt_install['database structure already exists'] = 'Egy megl�v� �rv�nyes adatb�zis strukt�ra l�tezik, tov�bbl�phet';
$txt_install['error while creating database structure'] = 'Hiba t�rt�nt az adatb�zis szerkezet l�trehoz�sa sor�n';

// Step 6
$txt_install['Administrator account creation'] = 'Adminisztr�tori Felhaszn�l� L�trehoz�sa';
$txt_install['Username'] = 'Felhaszn�l�n�v :';
$txt_install['Password'] = 'Jelsz� :';
$txt_install['Congratulations, administrator account %s has been created'] = 'Gratul�lunk, az adminisztr�tor felhaszn�l� (%s) sikeresen l�trehozva.';
$txt_install['An error has occured while creating your administrator account'] = 'Hiba t�rt�nt az adminisztr�tor felhaszn�l� l�trehoz�sa sor�n.';
$txt_install['please choose a login and password'] = 'A telep�t�si folyamat r�gt�n k�sz, v�lasszon egy felhaszn�l�t �s jelsz�t, amivel adminisztr�tork�nt azonos�tja mag�t.';
$txt_install['Configuration file has been saved'] = 'A konfigur�ci�s f�jl mentve.';
$txt_install['An error has occured while saving your configuration file'] = 'Hiba t�rt�nt a konfigur�ci�s f�jl ment�sekor.';
$txt_install['You can now access your phpgraphy site'] = '�n most m�r <a href="index.php">el�ri a phpGraphy gal�ri�j�t</a> !';
$txt_install['One or more problems have occured and your installation is NOT properly finished, please contact the phpGraphy DevTeam with the details of your error(s)'] = 'Hib�k t�rt�ntek, �gy az <b>�n telep�t�se nincs rendesen befejezve</b>, k�rem l�pjen kapcsolatba a phpGraphy fejleszt�kkel �s �rja meg nekik a felmer�lt hib�kat.';

// Initial .welcome file
$txt_install['welcome file content'] = '�dv�zl�m

�n vagyok a <b>.welcome</b> f�jl, amit a pictures k�nyvt�rban tal�l !
Ezt a tartalmat adminisztr�tork�nt bel�pve tudja szerkeszteni.

Egy alap telep�t�si ellen�rz� folyamat:

1/ Jelentkezzen be adminisztr�tork�nt.
2/ Pr�b�ljon meg k�nyvt�rat l�trehozni.
3/ Pr�b�ljon meg f�jlt felt�lteni (webfel�leten vagy FTP klienssel).
4/ Ellen�rizze, hogy a kisk�pek rendben l�trej�ttek.

Ha minden rendben m�k�dik, k�rem szerkesszen meg, �s �rjon ide egy saj�t �dv�zl� sz�veget.

<div style="border: solid 1px; width: 50%; padding: 5px;"><u>Tip:</u>
Ez itt egy p�lda a HTML haszn�lat�ra. �gy tud p�ld�ul egy linket elhelyezni, hogy megn�zhesse a <a href="?toprated=1">legt�bbre �rt�kelt k�epket</a>, vagy hasonl�an tud k�peket img tagekkel megjelen�teni.
</div>

K�sz�nj�k, hogy a phpGraphy-t v�lasztotta, rem�lem �r�m�t leli a szoftver haszn�lat�ban.
Ha egy hib�t tal�l, vagy �j funkci�t javasolna, k�rem l�pjen velem kapcsolatba. 
(Az el�r�seket a <a href="http://phpgraphy.sourceforge.net">phpGraphy weboldalon</a> tal�lja meg.)

	JiM / aEGIS.

(Magyar ford�t�s: Besz�des Bal�zs, beszedes[kukac]gmail[pont]com)
';


?>
