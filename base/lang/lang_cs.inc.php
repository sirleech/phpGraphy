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
*  $Id: lang_en.inc.php 336 2006-04-12 12:18:30Z jim $
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
    'language_name_english' => 'Czech',
    'language_name_native'  => '�e�tina',
    'country_code'          => 'cs',
    'charset'               => 'windows-1250',
    'direction'             => 'ltr',
    'for_version'           => '0.9.12',
    'translator_name'       => 'Vladim�r Ajgl',
    'translator_email'      => 'vlada [at] ajgl [dot] cz'
    );

// Title of your website
$txt_site_title="Moje phpGraphy galerie";

// txt_root_dir: text that specify the root of your gallery
$txt_root_dir="fotky";

// the following variables defines the text used for navigating the gallery
// you can change them to fit your needs and also use images (http://tofz.org/ style)
// e.g: $txt_previous_page='<img src="/gfx/my_previous_image_button.gif">';


// Picture/Thumbs viewing/navigation
$txt_files='soubor(�)';
$txt_dirs='adres��(�)';
$txt_last_commented="naposled okomentovan� obr�zky";

// Rating (if activated)
$txt_no_rating="";
$txt_thumb_rating="hodnocen� :";
$txt_pic_rating="hodnocen� :";
$txt['%.1f with %s votes'] = '<b>%.1f</b> s %s hlasy';
$txt_option_rating="Ohodno� obr�zek";
$txt['Best rating'] = 'Nejl�p�� hodnocen�';
$txt['Worst rating'] = 'Nejhor�� hodnocen�';
$txt['Rate !'] = 'Ohodno� !';

$txt_back_dir='^Zp�t^';
$txt_previous_image='&lt;- P�edchoz�';
$txt_next_image='N�sleduj�c� -&gt;';
$txt_hires_image=' +Vysok� rozli�en�+ ';
$txt_lores_image=' -N�zk� rozli�en�- ';

$txt_previous_page='&lt;- P�edchoz� strana -| ';
$txt_next_page=' |- N�sleduj�c� strana -&gt; ';

$txt_x_comments="koment��(e)";

$txt_comments="Koment��e :";
$txt_add_comment="P�idej koment��";
$txt_comment_from="Od: ";
$txt_comment_on=" na ";
$txt['*filtered*'] = '*filtrov�no*';

// Last commented pictures page
$txt_last_commented_title="Posledn�ch %s okomentovan�ch obr�zk� :";
$txt_comment_by="od";

// Top rated pictures page
$txt_top_rated_title=" %s nejl�pe hodnocen�ch obr�zk� :";

// Last added pictures/directories page
$txt['Last %s added pictures :'] = ' %s naposledy p�idan�ch obr�zk� :';
$txt['Last %s added pictures per directory :'] = ' %s naposledy p�idan�ch obr�zk� podle adres��� :';

// Top Right Menu (stuff displayed when in admin mode are under the admin section)
$txt_login="p�ihl�en�";
$txt_logout="odhl�en�";
$txt_random_pic="n�hodn� obr�zek";


// Login page
$txt['authenticate yourself'] = ' p�ihla�te se ';
$txt_login_form_login="jm�no:";
$txt_login_form_pass="heslo:";


// Add comment page
$txt_comment_form_name="Va�e jm�no:";
$txt_remember_me="(pamatuj si m�)";
$txt_comment_form_comment="V� koment��:";

// Generic stuff (used in several places)
$txt_go_back = "Zp�t";
$txt_form_submit = "Potvrdit";
$txt_ok = "OK";
$txt_failed = "SELHALO";
$txt_ie = 'nap�.: ';
$txt['NOTE: '] = 'POZN�MKA: ';
$txt['HTML and line breaks supported'] = 'HTML zna�ky a zalomen� ��dk� jsou podporov�ny';
$txt['HTML tags will display in your post as text'] = 'HTML zna�ky nejsou podporov�ny. Ve va�em p��sp�vku se zobraz� jako text.';


// metadata section (EXIF/IPTC)

/* $txt_[exif|iptc]_custom: You can customize the way informations are displayed,
* all keywords are between '%' for a reference of all supported keywords,
* See Documentation for the complete list of available keywords
*/
$txt_exif_custom="%Exif.Make% %Exif.Model%<br />%Exif.ExposureTime%s f/%Exif.FNumber% at %Exif.FocalLength%mm (35mm equiv: %Exif.FocalLengthIn35mmFilm%mm) iso %Exif.ISO% %Exif.Flash%";
$txt_exif_missing_value="??";	// If EXIF requested field is not found, display this instead
$txt_exif_flash="s bleskem"; // Test to display if flash was fired

$txt_iptc_custom="%Iptc.City% od %Iptc.ByLine%";
$txt_iptc_missing_value="";	// If IPTC requested field not found, display that instead

$txt['Found_IPTC_metadata'] = 'IPTC metadata nalezena';
$txt['No_IPTC_metadata_found'] = 'IPTC metadata nenalezena';

$txt_show_me_more="Uka� v�ce!";

// SLIDESHOW
$txt['slideshow'] = 'Slideshow';
$txt['Slideshow previous'] = '&larr; P�edchoz�';
$txt['Slideshow next'] = 'N�sleduj�c� &rarr;';
$txt['Slideshow play'] = 'P�ehraj';
$txt['Slideshow pause'] = 'Pauza';
$txt['Slideshow close'] = 'Zav�i';
$txt['Slideshow delay'] = 'Po�kej';
$txt['Slideshow %s sec'] = '%s s';
$txt['Slideshow slower'] = '+';
$txt['Slideshow faster'] = '-';

/********************************************************************************
* ADMIN Section
* Text only displayed once you're loggued in as an admin
* So if you, the admin, speak english, you probably won't need to translate this
*********************************************************************************/

// Top right menu (admin text)
$txt_admin['admin'] = 'Admin';
$txt_admin['Admin menu'] = 'Admin menu';
$txt_admin['Create a new directory'] = "Vytvo� nov� adres��";
$txt_admin['Upload pictures/files'] = "Nahraj obr�zky/soubory";
$txt_admin['Batch Processing'] = 'D�vkov� zpracov�n�'; 
$txt_admin['phpGraphy Settings'] = 'Nastaven� phpGraphy';
$txt_admin['Manage Users'] = 'Spr�va u�ivatel�';
$txt_admin['View logfile'] = 'Prohl�en� log soubor�';

// Picture/Thumbs viewing/navigation
$txt_admin['picture settings'] = 'Nastaven� obr�zku';
$txt_admin['directory settings'] = 'Nastaven� adres��e';
$txt_admin['title:'] = 'Popisek: ';
$txt_admin['security level:'] = 'Bezpe�nostn� �rove�: ';
$txt_admin['inherited:'] = ' Zd�d�no: ';
$txt_admin['cover picture:'] = 'Obr�zek na ob�lku: ';
$txt['select as cover picture'] = 'Vyber jako obr�zek na ob�lku tohoto adres��e';
$txt['change/remove'] = 'Zm��/odstra�';
$txt['select one'] = 'Vyber jeden...';
$txt['remove current'] = 'Odstra� sou�asn�';
$txt_delete_photo="Sma� obr�zek";
$txt_delete_photo_thumb="Sma� n�hled obr�zku";
$txt_delete_directory_text="Sma� adres��";
$txt_edit_welcome="Edituj .welcome";
$txt_del_comment="Smazat";

// Confirmation box
$txt_ask_confirm="Jsi si jist�?";
$txt_delete_confirm="Opravdu se m� vymazat?";

// Image rotation (if available with your config)
$txt['Rotate'] = 'Oto�';
$txt['Rotate 90'] = 'Oto� o 90�';
$txt['Rotate 180'] = 'Oto� o 180�';
$txt['Rotate 270'] = 'Oto� o 270�';


// Editing the .welcome page
$txt_editing="Editace";
$txt_in_directory="v adres��i";
$txt_save="Ulo�";
$txt_cancel="Zru�";
$txt_clear_all="Sma� v�e";


// Directory creation page
$txt_admin['Create a Directory'] = 'Vytvo� adres��';
$txt_admin['Current Directory:'] = 'Sou�asn� adres��: ';
$txt_dir_to_create="Vytvo� adres��:";

// Directory deletion
$txt_admin['Deleting %s'] = 'Maz�n� %s';
$txt_admin['Directory deleted successfully'] = 'Adres�� �sp�n� smaz�n';
$txt_admin['Problem while deleting this directory'] = 'Pot� p�i maz�n� tohoto adres��e';
$txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'] = 'Selhalo, p�esko�� v�echny podadres��e (Vlastn�k je \'%s\' )';
$txt_admin['(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)'] = '(Projd�te pros�m v��e uveden� chybov� zpr�vy. K vy�e�en� probl�m� budete muset adres�� smaza (nebo zm�nit jeho p��stupov� pr�va) p�es v� FTP p��stup, proto�e je pravd�podobn�, �e n�kter� obr�zky/adres��e maj� povolen� p��stup pouze z va�eho u�ivatelsk�ho ��tu na FTP serveru.)';

// Lowres/Thumbs generation page
$txt_admin['Generating all missing thumbnails/low res pictures: (be patient)'] = 'Tvo��m chab�j�c� n�hledy/obr�zky s n�zk�m rozli�en�m. (bu�te trp�liv�, pros�m)';
$txt_admin['Generating low res picture for %s'] = 'Vytv��en� obr�zk� s n�zk�m rozli�en�m pro %s';
$txt_admin['Generating thumbnail picture for %s'] = 'Vytv��en� n�hled� pro %s';
$txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'] = 'Vytvo�eno <b>%s</b> obr�zk� s n�zk�m rozli�en�m a <b>%s</b> n�hled�.';
$txt_admin['Nothing to do.'] = 'Nic dal��ho na pr�ci.';
$txt_admin['Your library contains <b>%s</b> pictures.'] = 'Vy�e knihovna obsahuje <b>%s</b> obr�zk�.';

$txt_admin['Batch action to execute: '] = 'D�vka k proveden�: ';
$txt_admin['Generate all thumbnails/lowres'] = 'Vytvo� v�echny n�hledy/obr�zky s n�zk�m rozli�en�m';
$txt_admin['Delete all thumbnails/lowres'] = 'Sma� v�echny n�hledy/obr�zky s n�zk�m rozli�en�m';
$txt_admin['Delete all thumbnails'] = 'Sma� v�echny n�hledy';
$txt_admin['Error while deleting %s'] = 'Chyba p�i maz�n� %s';
$txt_admin['Successfully deleted %s of %s files'] = '�sp�n� smaz�no %s z %s soubor�.';



// File upload page
$txt_current_dir="Sou�asn� adres�� :";
$txt_file_to_upload="Soubor(y) ke nata�en�:";
$txt_upload_file_from_user="Nat�hni soubory z tv�ho po��ta�e";
$txt_upload_file_from_url="Nat�hni soubor z URL um�st�n�";
$txt_upload_change = "Zm�na po�tu natahovan�ch soubor� bude vy�adovat znovuzad�n� v�ech soubor�, kter� jste dote� vybrali. Doporu�ujeme zru�it akci, nat�hnout ji� vybran� soubory a vybrat v�t�� ��slo a� p�i p��t�m v�b�ru. Chcete p�esto pokra�ovat?";

// User management
$txt_add_user = 'P�idej u�ivatele';
$txt_back_user_list = 'Zp�t na seznam u�ivatel�';
$txt_confirm_del_user = 'Opravdu chcete smazat tohoto u�ivatele?';
$txt_user_info = 'Informace o u�ivateli';
$txt_login_rule = 'Zadej p�ihla�ovac� jm�no do d�lky 20 znak�';
$txt_login_ie = 'nap�.: petr';
$txt_pass_rule = 'Zadej heslo do d�lky 32 znak�';
$txt_sec_lvl_rule = 'Zadej bezpe�nostn� �rove� mezi 1 a 999';
$txt_sec_lvl_ie = "nap�.: 10";

$txt_um_login = 'Jm�no';
$txt_um_pass = 'Heslo';
$txt_um_sec_lvl = 'Bezpe�nostn� �rove�';
$txt_um_edit = 'Uprav';
$txt_um_del = 'Sma�';

// Configuration Editor page
$txt_admin['Settings'] = 'Nastaven�';
$txt_admin['Description'] = 'Popis:';
$txt_admin['Example'] = 'P��klad:';
$txt_admin['Read-Only option'] = '<b>Read Only</b> - Z bezpe�nostn�ch d�vod� m��ete zm�nit tuto volbu pouze ru�n� editac� %s nebo pou�it�m install.php.';
$txt_admin['Usage of install recommended'] = 'Doporu�eno pou��t <b>%s</b> k� zm�n� tohoto nastaven�';
$txt_admin['on'] = 'zapnuto';
$txt_admin['off'] = 'vypnuto';
$txt_admin['Show advanced options'] = 'pokro�il� volby';
$txt_admin['Value for %s is incorrect'] = 'Hodnota pro %s nen� spr�vn�';
$txt_admin['Successfully saved changes to config'] = 'Zm�ny v konfiguraci �sp�n� ulo�eny';


// Misc
$txt_admin['INSTALL/DEBUG mode is active'] = "<b>VAROV�N�</b>: INSTALL/DEBUG mode je aktivn� - Sni�te hodnotu \$debug_mode v config.ini.php a� skon��te s lad�n�m.";
$txt_admin['Javascript Disabled'] = "<b>VAROV�N�</b>: V� prohl�e� (nebo bezpe�nostn� nastaven�) nepodporuje Javascript. K n�kter�m funkc�m nebudete m�t p��stup.";


/********************************************************************************
* ERROR messages
* This section is far from being complete but 
*********************************************************************************/

// 2xx is related to filesystem permissions/ownership
$txt_error['00251'] = 'Tento adres�� NEM� povoleno zapisov�n� soubor�. To m��e zp�sobit r�zn� pot�e (nap�.: nemo�nost vytv��en� n�hled� nebo obr�zk� s n�zk�m rozli�en�m)';

// 8xx is related to user management
$txt_error['00800'] = "CHYBA:";
$txt_error['00801'] = "Uid nen� nastaveno";
$txt_error['00802'] = "Uid nen� ��slo";
$txt_error['00803'] = "P�ihla�ovac� jm�no mus� obsahovat mezi 1 a 20 znaky z n�sleduj�c�ch rozsah� 0-9 a-z @ - _";
$txt_error['00804'] = "P�ihla�ovac� jm�no nen� zad�no";
$txt_error['00805'] = "Heslo mus� obsahovat mezi 1 a 32 znaky z n�sleduj�c�ch rozsah� 0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #";
$txt_error['00806'] = "Heslo nen� nastaveno";
$txt_error['00807'] = "Bezpe�nostn� �rove� mus� b�t ��slo mezi 1 a 999";
$txt_error['00808'] = "Bezpe�nostn� �rove� nenastavena";
$txt_error['00809'] = "P�ihla�ovac� jm�no u� existuje";



/********************************************************************************
* INSTALL Part
* Text only displayed during the install process
*********************************************************************************/

$txt_install['next step'] = 'Dal�� krok ->';

// Step 2
$txt_install['IP address check'] = 'Ov��en� IP adresy';
$txt_install['for security reasons, proove that it is your the admin'] = 'Z bezpe�nostn�ch d�vod� je t�eba prok�zat, �e jste opravdu administr�tor t�chto str�nek.';
$txt_install['finally, reload this page'] = 'Nakonec, <a href="javascript:window.location.reload()">znovu na�t�te</a> tuto str�nku';
$txt_install['copy INI_FILE.sample to INI_FILE'] = 'Zkop�rujte soubor %s do %s';
$txt_install['located under the conf subdir of phpgraphy dir'] = 'um�st�n� v podadres��i %s adres��e, kter� obsahuje phpGraphy';
$txt_install['open INI_FILE with your favorite text editor and replace admin_ip with your ip'] = 'Otev�te %s sv�m obl�ben�m textov�m editorem a nahra�dte hodnotu %s va�� skute�nou IP adresou, kter� je %s';
$txt_install['upload INI_FILE on your webserver under the CONF_DIR dir'] = 'Nat�hn�te %s na v� webserver do adres��e %s';

// Step 3
$txt_install['Directories Permissions'] = 'P��stupov� pr�va do adres���';
$txt_install['test_result_passed'] = 'OK';
$txt_install['test_result_failed'] = 'SELHALO';
$txt_install['Checking that the webuser can write in the following directories :'] = 'Kontrola, zdali program m��e zapisovat do n�sleduj�c�ch adres���:';
$txt_install['you can not proceed next step'] = 'Opravte v��e uveden� probl�my a <a href="javascript:window.location.reload()">rznovu na�t�te</a> str�nku';
$txt_install['Is directory %s writable ?'] = 'Je adres�� %s zapisovateln�?';
$txt_install['Is file %s writable ?'] = 'Je soubor %s zapisovateln�?';
$txt_install['Directory %s used to store the sessions is not writable and sessions support has been disabled'] = 'Adres�� %s <span class="annotation">(pou��van� k ukl�d�n� sessions)</span> nen� zapisovateln�, podpora sessions byla vypnuta.';
 
// Step 4
$txt_install['Image Tools Configuration'] = 'Konfigurace n�stroj� pro pr�ci s obr�zky';
$txt_install['Image Tools Configuration introduction'] = 'Na t�to str�nce m��ete vybrat software pou�it� k vytv��en� n�hled� a obr�zk� s n�zk�m rozli�en�m. Stejn� tak zde m��ete nadefinovat software pro ot��en� obr�zk�. Instalace sama na�la nejlep�� volby. Pokud si nejste jist� t�m, co to ud�l�, kdy� n�co zm�n�te, tak jednodu�e pokra�ujte dal��m krokem.';
$txt_install['If you know what you re doing, please use this button'] = "Pokud v�te, co d�l�te, pou�ijte toto tla��tko.";
$txt_install['Show me the details'] = 'Uka� mi podrobnosti';
$txt_install['choose your thumb generator'] = 'Vyberte pros�m software zpracov�vaj�c� obr�zky: ';
$txt_install['gd not supported'] = 'Podpora GD knihovny nebyla naisntalov�na';
$txt_install['gd missing JPG support'] = 'Nainstalovan� verze GD knihovny neobsahuje podporu JPG form�tu';
$txt_install['exec function disabled'] = 'exec() funkce je zak�z�na';
$txt_install['auto-detection failed'] = 'Autodetekce selhala';
$txt_install['you need to specify %s path'] = '<b>Mus�te</b> up�esnit <b>%s</b> cestu: ';
$txt_install['you need to specify the program path'] = '<b>Mus�te</b> up�esnit cestu k programu: ';
$txt_install['no thumb_generator found intro'] = 'Nenalezen ��dn� pracuj�c� software ke zpracov�n� obr�zk�. Detaily viz. n�e.';
$txt_install['no thumb_generator found conclusion'] = 'Pokud jste vlastn�kem server, m�li byste b�t schopni vy�e�it tento probl�m. Jinak nem�te jinou mo�nost, ne� vytv��et n�hledy a obr�zky s n�zk�m rozli�en�m sami.';
$txt_install['choose your rotate tool'] = 'Vyberte pros�m n�stroj k ot��en� obr�zk�: ';
$txt_install['rotate tool not available'] = 'Ot��en� obr�zk� nen� p��stupn� s va�� konfigurac�, proto�e byla zak�z�na funkce exec()';
$txt_install['exif has been disabled'] = 'Podpora Exif nen� ve va�� verzi PHP p��stupn� a byla proto vypnuta.';

// Step 5
$txt_install['Database configuration'] = 'Nastaven� datab�ze';
$txt_install['choose your database backend'] = 'Vyberte typ datab�ze, kter� pou��v�te: ';
$txt_install['mysql details title'] = 'Parametry MySQL datab�ze';
$txt_install['database host'] = 'Jm�no serveru: ';
$txt_install['database name'] = 'N�zev datab�ze: ';
$txt_install['database user'] = 'U�ivatel: ';
$txt_install['database pass'] = 'Heslo: ';
$txt_install['tables prefix'] = 'P�edpona tabulek: ';
$txt_install['remove invalid characters'] = '* odstra�te neplatn� znaky';
$txt_install['mysql connection error, see errors'] = 'Nen� mo�n� se p�ipojit k datab�zi, chybov� hl�en� n�sleduje:';
$txt_install['database structure sucessfully created'] = 'Datab�zov� struktura byla �sp�n� vytvo�ena';
$txt_install['database structure already exists'] = 'Byla nalezena platn� datab�zov� struktura. Pokra�ujte dal��m krokem.';
$txt_install['error while creating database structure'] = 'P�i vytv��en� datab�zov� struktury se vyskytla chyba.';

// Step 6
$txt_install['Administrator account creation'] = 'Vytvo�en� administr�torsk�ho ��tu';
$txt_install['Username'] = 'P�ihla�ovac� jm�no: ';
$txt_install['Password'] = 'Heslo: ';
$txt_install['Congratulations, administrator account %s has been created'] = 'Gratulujeme, administr�torsk� ��et %s byl vytvo�en.';
$txt_install['An error has occured while creating your administrator account'] = 'B�hem vytv��en� administr�torsk�ho ��tu se vyskytla chyba.';
$txt_install['please choose a login and password'] = 'Jste ji� u konce instalace. Vyberte pros�m p�ihla�ovac� jm�no a heslo, kter� budete pou��vat k p�ihl�en� jako administr�tor.';
$txt_install['Configuration file has been saved'] = 'V� konfigura�n� soubor byl �sp�n� ulo�en.';
$txt_install['An error has occured while saving your configuration file'] = 'B�hem ukl�d�n� konfigura�n�ho souboru se vyskytla chyba.';
$txt_install['You can now access your phpgraphy site'] = 'Nyn� m��ete za��t pou��vat <a href="index.php">va�� phpGraphy galerii</a> !';
$txt_install['One or more problems have occured and your installation is NOT properly finished, please contact the phpGraphy DevTeam with the details of your error(s)'] = 'Vyskytly se pot�e, a proto <b>NEMOHLA b�t instalace dokon�ena</b>, kontaktujte pros�m phpGraphy DevTeam s detailn�m popisem va�ich chyb.';

// Initial .welcome file
$txt_install['welcome file content'] = 'Ahoj

To jsem j�, <b>.welcome</b> soubor z adres��e s obr�zky!
M��e� zm�nit m�j obsah, pokud jsi p�ihl�en jako administr�tor.

Tady je n�kolik z�kladn�ch doporu�en� k rozb�h�n� phpGraphy galerie

1/ P�ihla� se jako administr�tor
2/ Zkus vytvo�it adres��
3/ Zkus nahr�t n�jak� obr�zek (bu� p�es web nebo pomoc� sv�ho FTP ��tu)
4/ Pod�vej se, jestli jsou spr�vn� vytv��eny n�hledy

Jakmile bude v�echno spr�vn� pracovat, uprav m� a ulo� m�, kam se ti bude l�bit.

<div style="border: solid 1px; width: 50%; padding: 5px;"><u>Tip:</u>
Tady je p��klad pou�it� HTML zna�ek. M��ete vytv��et odkazy, jako t�eba <a href="?toprated=1">nejl�pe hodnocen� obr�zky</a> nebo vkl�dat obr�zky pomoc� zna�ky img.
</div>

Thanks for choosing phpGraphy, I hope you will enjoy using this software
If you encounter a bug or you have a great new feature idea, please contact me.
(See <a href="http://phpgraphy.sourceforge.net">phpGraphy website</a> for contact details)

						JiM / aEGIS.
';


?>
