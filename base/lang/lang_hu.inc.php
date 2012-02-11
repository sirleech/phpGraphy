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
    'translator_name'       => 'Beszédes Balázs',
    'translator_email'      => 'beszedes [at] gmail [dot] com'
    );

// Title of your website
$txt_site_title="Az én phpGraphy galériám";

// txt_root_dir: text that specify the root of your gallery
$txt_root_dir="kezdõlap";

// the following variables defines the text used for navigating the gallery
// you can change them to fit your needs and also use images (http://tofz.org/ style)
// e.g: $txt_previous_page='<img src="/gfx/my_previous_image_button.gif">';


// Picture/Thumbs viewing/naviguation
$txt_files='fájl(ok)';
$txt_dirs='mappa';
$txt_last_commented="legutóbb véleményezett képek";
$txt_top_rated="legtöbb szavazat képek";
$txt_last_added="friss képek";
$txt_last_added_per_directory="friss képek albumonként";

// Rating (if activated)
$txt_no_rating="";
$txt_thumb_rating="Értékelés :";
$txt_pic_rating="<br />Átlag : ";
$txt['%.1f with %s votes'] = '<b>%.1f</b>. helyezés %s szavazattal';
$txt_option_rating="Értékelje a képet";
$txt['Best rating'] = 'Legjobb kép';
$txt['Worst rating'] = 'Legrosszabb kép';
$txt['Rate !'] = 'Értékeld!';

$txt_back_dir='^Vissza^';
$txt_previous_image='&lt;- Elõzõ';
$txt_next_image='Következõ -&gt;';
$txt_hires_image=' +Nagy felbontás+ ';
$txt_lores_image=' -Alacsony felbontás- ';

$txt_previous_page='&lt;- Elõzõ lap -| ';
$txt_next_page=' |- Következõ lap -&gt; ';

$txt_x_comments="Vélemény(ek)";

$txt_comments="Vélemények:";
$txt_add_comment="Vélemény hozzáadása";
$txt_comment_from="Feladó: ";
$txt_comment_on=" Dátum: ";
$txt['*filtered*'] = '*kiszûrve*';

// Last commented pictures page
$txt_last_commented_title="Utolsó %s véleményezett kép:";
$txt_comment_by="-tól";

// Top rated pictures page
$txt_top_rated_title="Legjobb %s kép:";

// Last added pictures/directories page
$txt['Last %s added pictures :'] = 'Utoljára feltöltött %s kép:';
$txt['Last %s added pictures per directory :'] = 'A könyvtárba legutóbb feltöltött %s kép:';

// Top Right Menu (stuff displayed when in admin mode are under the admin section)
$txt_login="Bejelentkezés";
$txt_logout="Kijelentkezés";
$txt_random_pic="Véletlen kép";


// Login page
$txt['authenticate yourself'] = 'Azonosítsd magad';
$txt_login_form_login="felhasználó:";
$txt_login_form_pass="jelszó:";


// Add comment page
$txt_comment_form_name="Az Ön neve:";
$txt_remember_me="(Emlékezzen rám)";
$txt_comment_form_comment="Vélemény:";

// Generic stuff (used in several places)
$txt_go_back = "Vissza";
$txt_form_submit = "Ment";
$txt_ok = "OK";
$txt_failed = "HIBA";
$txt_ie = 'pld: ';
$txt['NOTE: '] = 'FIGYELEM: ';
$txt['HTML and line breaks supported'] = 'HTML tartalom és sortörés támogatott';
$txt['HTML tags will display in your post as text'] = 'HTML tag-ek sima szövegként jelennek meg a véleményben';
$txt['Get Help'] = 'Segítség';
$txt['Save as'] = 'Mentés másként...';

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


$txt_show_me_more="Több info";

// SLIDESHOW
$txt['slideshow'] = 'Vetítés';
$txt['Slideshow previous'] = '&larr; Elõzõ';
$txt['Slideshow next'] = 'Következõ &rarr;';
$txt['Slideshow play'] = 'Lejátszás';
$txt['Slideshow pause'] = 'Megszakítás';
$txt['Slideshow close'] = 'Bezár';
$txt['Slideshow delay'] = 'Késõbb';
$txt['Slideshow %s sec'] = '%s sec.';
$txt['Slideshow slower'] = '+';
$txt['Slideshow faster'] = '-';
$txt['Slideshow hide captions'] = 'képaláírás elrejtése';
$txt['Slideshow show captions'] = 'képaláírás mutatása';

/********************************************************************************
* ADMIN Section
* Text only displayed once you're loggued in as an admin
* So if you, the admin, speak english, you probably won't need to translate this
*********************************************************************************/

// Top right menu (admin text)
$txt_admin['admin'] = 'admin';
$txt_admin['Admin menu'] = 'Adminisztráció';
$txt_admin['Create a new directory'] = "Új könyvtár létrehozása";
$txt_admin['Upload pictures/files'] = "Képek/fájlok feltöltése";
$txt_admin['Batch Processing'] = 'Batch Feldolgozás'; 
$txt_admin['phpGraphy Settings'] = 'Beállítások';
$txt_admin['Manage Users'] = 'Felhasználók kezelése';
$txt_admin['View logfile'] = 'Log megtekintése';

// Picture/Thumbs viewing/navigation
$txt_admin['picture settings'] = 'Kép beállítások';
$txt_admin['directory settings'] = 'Könyvtár beállítások';
$txt_admin['title:'] = 'Cím: ';
$txt_admin['security level:'] = 'Biztonsági szint: ';
$txt_admin['inherited:'] = ' Öröklött: ';
$txt_admin['cover picture:'] = 'Fedõ kép: ';
$txt['select as cover picture'] = 'Kiválasztás a jelen könyvtár fedõképének';
$txt['change/remove'] = 'Módosít/Eltávolít';
$txt['select one'] = 'Kiválasztás...';
$txt['remove current'] = 'Jelenlegi eltávolítása';
$txt_delete_photo="Kép törlése";
$txt_delete_photo_thumb="Kisképek újragenerálása";
$txt_delete_directory_text="Könyvtár törlése";
$txt_edit_welcome=".welcome szerkesztése";
$txt_del_comment="Töröl";

// Confirmation box
$txt_ask_confirm="Biztos benne?";
$txt_delete_confirm="Biztos, hogy törli?";

// Image rotation (if available with your config)
$txt['Rotate'] = 'Forgatás';
$txt['Rotate 90'] = 'Forgatás 90°';
$txt['Rotate 180'] = 'Forgatás 180°';
$txt['Rotate 270'] = 'Forgatás 270°';


// Editing the .welcome page
$txt_editing = "Szerkesztés";
$txt_in_directory = "könyvtárban";
$txt_save = "Mentés";
$txt_cancel = "Mégsem";
$txt_clear_all = "Minden törlése";


// Directory creation page
$txt_admin['Create a Directory'] = 'Könyvtár létrehozása';
$txt_admin['Current Directory:'] = 'Jelenlegi könyvtár: ';
$txt_dir_to_create = "Könyvtár létrehozása:";

// Directory deletion
$txt_admin['Deleting %s'] = '%s törlése';
$txt_admin['Directory deleted successfully'] = 'Könyvtár sikeresen törölve';
$txt_admin['Problem while deleting this directory'] = 'Hiba történt a könyvtár törlésekor';
$txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'] = 'Nem sikerült, minden alkönyvtár kihagyása (Tulajdonos \'%s\' )';
$txt_admin['(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)'] = '(Kérem ellenõrizze a fenti hibaüzeneteket! A hiba elhárítása érdekében lehet hogy törölni kell egyes képeket / könyvtárakat, vagy a jogosultságokat kell átállítani FTP kliens használatával, mert minden valószínûség szerint egyes fájlok az FTP felhasználóhoz tartoznak.)';

// Lowres/Thumbs generation page
$txt_admin['Generating all missing thumbnails/low res pictures: (be patient)'] = 'Hiányzó kisképek és kisfelbontású képek generálása (legyen türelemmel!):';
$txt_admin['Generating low res picture for %s'] = '%s képbõl kisfelbontású kép generálása';
$txt_admin['Generating thumbnail picture for %s'] = '%s képbõl kiskép generálása';
$txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'] = '<b>%s</b> kisfelbontású kép és <b>%s</b> kiskép legenerálva.';
$txt_admin['Nothing to do.'] = 'Nincs mit tenni.';
$txt_admin['Your library contains <b>%s</b> pictures.'] = 'A könyvtárban <b>%s</b> darab kép van.';

$txt_admin['Batch action to execute: '] = 'Végrehajtandó batch feladat: ';
$txt_admin['Generate all thumbnails/lowres'] = 'Összes kiskép / kisfelbontású kép generálása';
$txt_admin['Delete all thumbnails/lowres'] = 'Összes kiskép / kisfelbontású kép törlése';
$txt_admin['Delete all thumbnails'] = 'Összes kiskép törlése';
$txt_admin['Error while deleting %s'] = 'Hiba történt a %s kiskép törlésekor!';
$txt_admin['Successfully deleted %s of %s files'] = 'Sikeresen töröltem %s darab kisképet a(z) %s-ból!';



// File upload page
$txt_current_dir="Jelenlegi könyvtár :";
$txt_file_to_upload="Feltöltendõ fájl(ok):";
$txt_upload_file_from_user="Feltöltés sajátgéprõl";
$txt_upload_file_from_url="Feltöltés hivatkozásról (URL)";
$txt_upload_change = "A feltöltendõ fájlok számának megváltoztatása után az összes korábban kiválasztott fájlt újra ki kell választani. Javasolt most mégsemet választani, feltölteni a már kiválasztott képeket és következõ alkalommal egy nagyobb számot megadni. Biztos, hogy folytatja?";

// User management
$txt_add_user = 'Felhasználó létrehozása';
$txt_back_user_list = 'Vissza a felhasználók listájához';
$txt_confirm_del_user = 'Biztos, hogy törli ezt a felhasználót?';
$txt_user_info = 'Felhasználói adatok';
$txt_login_rule = 'Adjon meg egy max. 20 karakteres felhasználónevet!';
$txt_login_ie = 'pld: janos';
$txt_pass_rule = 'Adjon meg egy max. 32 karakteres jelszót';
$txt_sec_lvl_rule = 'Adjon meg egy biztonsági szintet 1 és 999 között!';
$txt_sec_lvl_ie = "pld: 10";
$txt_admin['Password is encrypted and can not be recovered'] = '<b>FIGYELEM:</b> A jelszó titkosított és nem visszakódolható. Lent viszont tud újat megadni!';

$txt_um_login = 'Felhasználó';
$txt_um_pass = 'Jelszó';
$txt_um_sec_lvl = 'Biztonsági szint';
$txt_um_edit = 'Szerkesztés';
$txt_um_del = 'Törlés';

// Configuration Editor page
$txt_admin['Settings'] = 'Beállítások';
$txt_admin['Description'] = 'Leírás:';
$txt_admin['Example'] = 'Példa:';
$txt_admin['Read-Only option'] = '<b>Csak olvasható</b> - Biztonsági okokból ezt a beállítást csak kézzel tudja módosítani az %s fájlban, vagy használja az automata telepítõt (install.php)!';
$txt_admin['Usage of install recommended'] = 'A <b>%s</b> használata ajánlott a beállítás megváltoztatásához!';
$txt_admin['on'] = 'be';
$txt_admin['off'] = 'ki';
$txt_admin['Show advanced options'] = 'Haladó beállítások';
$txt_admin['Value for %s is incorrect'] = 'A %s beállításhoz megadott érték hibás!';
$txt_admin['Successfully saved changes to config'] = 'A beállítások módosítása sikeresen mentve!';


// Misc
$txt_admin['INSTALL/DEBUG mode is active'] = "<b>FIGYELEM</b>: INSTALL/DEBUG mód aktív - Csökkentse \$debug_mode értékét a config.ini.php fájlban!";
$txt_admin['Javascript Disabled'] = "<b>FIGYELEM</b>: Az Ön böngészõje nem támogatja a Javascript-et, így egyes funkciókat nem fog tudni használni!";


/********************************************************************************
* ERROR messages
* This section is far from being complete but 
*********************************************************************************/

// Unknow error
$txt_error['00000'] = 'Ismeretlen hiba történt, kérem jelentse a <a href="%s" target="_blank">fejlesztõknek</a>. Ne felejtse el megírni, hogy milyen körülmények között történt a hiba!';

// 1xx - Installation related

// 2xx - Filesystem permissions/ownership related
$txt_error['00201'] = "Figyelem, a 'use_direct_urls' be van kapcsolva és még van egy .htaccess fájl is a képek könyvtárában. Valószínûleg problémái lesznek a képek megjelenítésével.";
$txt_error['00251'] = 'Ez a fájl / könyvtár nem írható, ez több hibát is okozhat (pld: kisképek generálása, átméretezés).';

// 3xx - PHP settings related
$txt_error['00301'] = "Figyelem, ez a parancs leállhat, mert a max_execution_time értéke túl alacsony (%s másodperc) és a phpGraphy sem tudta megnövelni.";
$txt_error['00303'] = "exec() le van tiltve ebben a PHP telepítésben.";

// 4xx - File upload related
$txt_error['00401'] = "A %s feltöltése nem sikerült, egy kép ugyanezzel a névvel már létezik. Törölje le létezõ fájlt a feltöltés elõtt!";

// 5xx - Misc
$txt_error['00501'] = "'topratings' átnevezésre került 'toprated're, frissítse a linkjeit!";

// 8xx is related to user management
$txt_error['00800'] = "HIBA:";
$txt_error['00801'] = "Uid nincs beállítva!";
$txt_error['00802'] = "Uid is nem szám!";
$txt_error['00803'] = "A felhasználónév 1, max. 20 darab ilyen karaktert tartalmazhat: 0-9 a-z @ - _";
$txt_error['00804'] = "Felhasználó nincs megadva!";
$txt_error['00805'] = "A jelszó legalább 1, max. 32 darab ilyen karaktert tartalmazhat: 0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #";
$txt_error['00806'] = "Jelszó nincs megadva!";
$txt_error['00807'] = "A biztonsági szint egy szám kell legyen 1 és 999 között";
$txt_error['00808'] = "Biztonsági szint nincs megadva!";
$txt_error['00809'] = "Felhasználó már létezik!";



/********************************************************************************
* INSTALL Part
* Text only displayed during the install process
*********************************************************************************/

$txt_install['next step'] = 'Kövektezõ lépés ->';

// Step 2
$txt_install['IP address check'] = 'IP cím ellenõrzése';
$txt_install['for security reasons, proove that it is your the admin'] = 'Biztonsági okokból, be kell bizonítania, hogy tényleg Ön az oldal adminisztrátora.';
$txt_install['finally, reload this page'] = 'Végül <a href="javascript:window.location.reload()">töltse újra</a> ezt az oldalt';
$txt_install['copy INI_FILE.sample to INI_FILE'] = '%s fájlt másolja ide: %s';
$txt_install['located under the conf subdir of phpgraphy dir'] = 'a %s alkönyvtárban található a phpGraphy könyvtárban';
$txt_install['open INI_FILE with your favorite text editor and replace admin_ip with your ip'] = 'Nyissa meg a %s a kedvenc szerkesztõjében és a %s értéket cserélje le az IP címével, ami %s';
$txt_install['upload INI_FILE on your webserver under the CONF_DIR dir'] = 'Töltse fel a %s fájlt a webszerveren a %s könyvtárba';

// Step 3
$txt_install['Directories Permissions'] = 'Könyvtár Jogosultságok';
$txt_install['test_result_passed'] = 'OK';
$txt_install['test_result_failed'] = 'HIBA';
$txt_install['Checking that the webuser can write in the following directories :'] = 'Webuser írási jogosultságok ellenõrzése a következõ könyvtárakon :';
$txt_install['you can not proceed next step'] = 'Javítsa ki a fenti hibákat és <a href="javascript:window.location.reload()">töltse újra</a> ezt az oldalt';
$txt_install['Is directory %s writable ?'] = 'A %s könyvtár írható ?';
$txt_install['Is file %s writable ?'] = 'A %s fájl írható ?';
$txt_install['Directory %s used to store the sessions is not writable and sessions support has been disabled'] = 'A <span class="annotation">(a sessionök tárolására használt)</span> %s könyvtár nem írható, session támogatás lekapcsolva';

// Step 4
$txt_install['Image Tools Configuration'] = 'Kép Eszköz Beállítások';
$txt_install['Image Tools Configuration introduction'] = 'Ezen az oldalon kiválaszthatja azokat a szoftvereket, amelyekkel a kisképeket, alacsony felbontású képeket generálja és a forgatásokat elvégezheti. A telepítõ automatikusan a legjobb beállításokat kiválasztotta, kérjük egyszerûen lépjen tovább, hacsak ténygel tudja mit csinál :-).';
$txt_install['If you know what you re doing, please use this button'] = "Ha tudja mit csinál, használja ezt a gombot";
$txt_install['Show me the details'] = 'Mutassa a részleteket';
$txt_install['choose your thumb generator'] = 'Kérem, válassza ki a képfeldolgozó szoftvert: ';
$txt_install['gd not supported'] = 'GD támogáts nincs befordítva';
$txt_install['gd missing JPG support'] = 'A telepített GD verzió nem tartalmazza a JPG támogatást';
$txt_install['exec function disabled'] = 'exec() függvény használata letiltva';
$txt_install['auto-detection failed'] = 'Automatikus felismerés nem sikerült';
$txt_install['you need to specify %s path'] = 'Meg <b>kell</b> adnia a <b>%s</b> elérését: ';
$txt_install['you need to specify the program path'] = 'Meg <b>kell</b> adnia a program elérését: ';
$txt_install['no thumb_generator found intro'] = 'Nem találtam mûködõ képfeldolgozó programot, részleteket lent találja.';
$txt_install['no thumb_generator found conclusion'] = 'Ha ez az Ön szervere, akkor képes lehet megoldani ezt a problémát, ellenkezõ esetben nincs más megoldás, mint a kisképek és kisfelbontású képek kézzel való feltöltése.';
$txt_install['choose your rotate tool'] = 'Válassza ki a képforgató programot: ';
$txt_install['rotate tool not available'] = 'A képforgatás nem elérhetõ, mert az exec() függvény használata le van tiltva.';
$txt_install['exif has been disabled'] = 'Exif támogatás nem elérhetõ az Ön PHP telepítésében, ezért le is van tiltva.';

// Step 5
$txt_install['Database configuration'] = 'Adatbázis beállítás';
$txt_install['choose your database backend'] = 'Válassza ki a használni kívánt adatbázis fajtát: ';
$txt_install['mysql details title'] = 'MySQL adatbázis paraméterek';
$txt_install['database host'] = 'Szerver hosztnév :';
$txt_install['database name'] = 'Adatbázis név :';
$txt_install['database user'] = 'Felhasználó :';
$txt_install['database pass'] = 'Jelszó :';
$txt_install['tables prefix'] = 'Tábla prefix :';
$txt_install['remove invalid characters'] = '* érvénytelen karaktereket el kell távolítani';
$txt_install['mysql connection error, see errors'] = 'Nem lehet az adatbázishoz kapcsolódni, ellenõrizze a hibá(ka)t:';
$txt_install['database structure sucessfully created'] = 'Adatbázis struktúra sikeresen létrehozva';
$txt_install['database structure already exists'] = 'Egy meglévõ érvényes adatbázis struktúra létezik, továbbléphet';
$txt_install['error while creating database structure'] = 'Hiba történt az adatbázis szerkezet létrehozása során';

// Step 6
$txt_install['Administrator account creation'] = 'Adminisztrátori Felhasználó Létrehozása';
$txt_install['Username'] = 'Felhasználónév :';
$txt_install['Password'] = 'Jelszó :';
$txt_install['Congratulations, administrator account %s has been created'] = 'Gratulálunk, az adminisztrátor felhasználó (%s) sikeresen létrehozva.';
$txt_install['An error has occured while creating your administrator account'] = 'Hiba történt az adminisztrátor felhasználó létrehozása során.';
$txt_install['please choose a login and password'] = 'A telepítési folyamat rögtön kész, válasszon egy felhasználót és jelszót, amivel adminisztrátorként azonosítja magát.';
$txt_install['Configuration file has been saved'] = 'A konfigurációs fájl mentve.';
$txt_install['An error has occured while saving your configuration file'] = 'Hiba történt a konfigurációs fájl mentésekor.';
$txt_install['You can now access your phpgraphy site'] = 'Ön most már <a href="index.php">eléri a phpGraphy galériáját</a> !';
$txt_install['One or more problems have occured and your installation is NOT properly finished, please contact the phpGraphy DevTeam with the details of your error(s)'] = 'Hibák történtek, így az <b>Ön telepítése nincs rendesen befejezve</b>, kérem lépjen kapcsolatba a phpGraphy fejlesztõkkel és írja meg nekik a felmerült hibákat.';

// Initial .welcome file
$txt_install['welcome file content'] = 'Üdvözlöm

Én vagyok a <b>.welcome</b> fájl, amit a pictures könyvtárban talál !
Ezt a tartalmat adminisztrátorként belépve tudja szerkeszteni.

Egy alap telepítési ellenõrzõ folyamat:

1/ Jelentkezzen be adminisztrátorként.
2/ Próbáljon meg könyvtárat létrehozni.
3/ Próbáljon meg fájlt feltölteni (webfelületen vagy FTP klienssel).
4/ Ellenõrizze, hogy a kisképek rendben létrejöttek.

Ha minden rendben mûködik, kérem szerkesszen meg, és írjon ide egy saját üdvözlõ szöveget.

<div style="border: solid 1px; width: 50%; padding: 5px;"><u>Tip:</u>
Ez itt egy példa a HTML használatára. Így tud például egy linket elhelyezni, hogy megnézhesse a <a href="?toprated=1">legtöbbre értékelt kéepket</a>, vagy hasonlóan tud képeket img tagekkel megjeleníteni.
</div>

Köszönjök, hogy a phpGraphy-t választotta, remélem örömét leli a szoftver használatában.
Ha egy hibát talál, vagy új funkciót javasolna, kérem lépjen velem kapcsolatba. 
(Az eléréseket a <a href="http://phpgraphy.sourceforge.net">phpGraphy weboldalon</a> találja meg.)

	JiM / aEGIS.

(Magyar fordítás: Beszédes Balázs, beszedes[kukac]gmail[pont]com)
';


?>
