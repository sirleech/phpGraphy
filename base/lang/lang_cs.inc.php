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
    'language_name_native'  => 'Èeština',
    'country_code'          => 'cs',
    'charset'               => 'windows-1250',
    'direction'             => 'ltr',
    'for_version'           => '0.9.12',
    'translator_name'       => 'Vladimír Ajgl',
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
$txt_files='soubor(ù)';
$txt_dirs='adresáø(ù)';
$txt_last_commented="naposled okomentované obrázky";

// Rating (if activated)
$txt_no_rating="";
$txt_thumb_rating="hodnocení :";
$txt_pic_rating="hodnocení :";
$txt['%.1f with %s votes'] = '<b>%.1f</b> s %s hlasy';
$txt_option_rating="Ohodno obrázek";
$txt['Best rating'] = 'Nejlépší hodnocení';
$txt['Worst rating'] = 'Nejhorší hodnocení';
$txt['Rate !'] = 'Ohodno !';

$txt_back_dir='^Zpìt^';
$txt_previous_image='&lt;- Pøedchozí';
$txt_next_image='Následující -&gt;';
$txt_hires_image=' +Vysoké rozlišení+ ';
$txt_lores_image=' -Nízké rozlišení- ';

$txt_previous_page='&lt;- Pøedchozí strana -| ';
$txt_next_page=' |- Následující strana -&gt; ';

$txt_x_comments="komentáø(e)";

$txt_comments="Komentáøe :";
$txt_add_comment="Pøidej komentáø";
$txt_comment_from="Od: ";
$txt_comment_on=" na ";
$txt['*filtered*'] = '*filtrováno*';

// Last commented pictures page
$txt_last_commented_title="Posledních %s okomentovanıch obrázkù :";
$txt_comment_by="od";

// Top rated pictures page
$txt_top_rated_title=" %s nejlépe hodnocenıch obrázkù :";

// Last added pictures/directories page
$txt['Last %s added pictures :'] = ' %s naposledy pøidanıch obrázkù :';
$txt['Last %s added pictures per directory :'] = ' %s naposledy pøidanıch obrázkù podle adresáøù :';

// Top Right Menu (stuff displayed when in admin mode are under the admin section)
$txt_login="pøihlášení";
$txt_logout="odhlášení";
$txt_random_pic="náhodnı obrázek";


// Login page
$txt['authenticate yourself'] = ' pøihlašte se ';
$txt_login_form_login="jméno:";
$txt_login_form_pass="heslo:";


// Add comment page
$txt_comment_form_name="Vaše jméno:";
$txt_remember_me="(pamatuj si mì)";
$txt_comment_form_comment="Váš komentáø:";

// Generic stuff (used in several places)
$txt_go_back = "Zpìt";
$txt_form_submit = "Potvrdit";
$txt_ok = "OK";
$txt_failed = "SELHALO";
$txt_ie = 'napø.: ';
$txt['NOTE: '] = 'POZNÁMKA: ';
$txt['HTML and line breaks supported'] = 'HTML znaèky a zalomení øádkù jsou podporovány';
$txt['HTML tags will display in your post as text'] = 'HTML znaèky nejsou podporovány. Ve vašem pøíspìvku se zobrazí jako text.';


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

$txt_show_me_more="Uka více!";

// SLIDESHOW
$txt['slideshow'] = 'Slideshow';
$txt['Slideshow previous'] = '&larr; Pøedchozí';
$txt['Slideshow next'] = 'Následující &rarr;';
$txt['Slideshow play'] = 'Pøehraj';
$txt['Slideshow pause'] = 'Pauza';
$txt['Slideshow close'] = 'Zavøi';
$txt['Slideshow delay'] = 'Poèkej';
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
$txt_admin['Create a new directory'] = "Vytvoø novı adresáø";
$txt_admin['Upload pictures/files'] = "Nahraj obrázky/soubory";
$txt_admin['Batch Processing'] = 'Dávkové zpracování'; 
$txt_admin['phpGraphy Settings'] = 'Nastavení phpGraphy';
$txt_admin['Manage Users'] = 'Správa uivatelù';
$txt_admin['View logfile'] = 'Prohlíení log souborù';

// Picture/Thumbs viewing/navigation
$txt_admin['picture settings'] = 'Nastavení obrázku';
$txt_admin['directory settings'] = 'Nastavení adresáøe';
$txt_admin['title:'] = 'Popisek: ';
$txt_admin['security level:'] = 'Bezpeènostní úroveò: ';
$txt_admin['inherited:'] = ' Zdìdìno: ';
$txt_admin['cover picture:'] = 'Obrázek na obálku: ';
$txt['select as cover picture'] = 'Vyber jako obrázek na obálku tohoto adresáøe';
$txt['change/remove'] = 'Zmìò/odstraò';
$txt['select one'] = 'Vyber jeden...';
$txt['remove current'] = 'Odstraò souèasnı';
$txt_delete_photo="Sma obrázek";
$txt_delete_photo_thumb="Sma náhled obrázku";
$txt_delete_directory_text="Sma adresáø";
$txt_edit_welcome="Edituj .welcome";
$txt_del_comment="Smazat";

// Confirmation box
$txt_ask_confirm="Jsi si jistı?";
$txt_delete_confirm="Opravdu se má vymazat?";

// Image rotation (if available with your config)
$txt['Rotate'] = 'Otoè';
$txt['Rotate 90'] = 'Otoè o 90°';
$txt['Rotate 180'] = 'Otoè o 180°';
$txt['Rotate 270'] = 'Otoè o 270°';


// Editing the .welcome page
$txt_editing="Editace";
$txt_in_directory="v adresáøi";
$txt_save="Ulo";
$txt_cancel="Zruš";
$txt_clear_all="Sma vše";


// Directory creation page
$txt_admin['Create a Directory'] = 'Vytvoø adresáø';
$txt_admin['Current Directory:'] = 'Souèasnı adresáø: ';
$txt_dir_to_create="Vytvoø adresáø:";

// Directory deletion
$txt_admin['Deleting %s'] = 'Mazání %s';
$txt_admin['Directory deleted successfully'] = 'Adresáø úspìšnì smazán';
$txt_admin['Problem while deleting this directory'] = 'Potí pøi mazání tohoto adresáøe';
$txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'] = 'Selhalo, pøeskoèí všechny podadresáøe (Vlastník je \'%s\' )';
$txt_admin['(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)'] = '(Projdìte prosím vıše uvedené chybové zprávy. K vyøešení problémù budete muset adresáø smaza (nebo zmìnit jeho pøístupová práva) pøes váš FTP pøístup, protoe je pravdìpodobné, e nìkteré obrázky/adresáøe mají povolenı pøístup pouze z vašeho uivatelského úètu na FTP serveru.)';

// Lowres/Thumbs generation page
$txt_admin['Generating all missing thumbnails/low res pictures: (be patient)'] = 'Tvoøím chabìjící náhledy/obrázky s nízkım rozlišením. (buïte trpìliví, prosím)';
$txt_admin['Generating low res picture for %s'] = 'Vytváøení obrázkù s nízkım rozlišením pro %s';
$txt_admin['Generating thumbnail picture for %s'] = 'Vytváøení náhledù pro %s';
$txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'] = 'Vytvoøeno <b>%s</b> obrázkù s nízkım rozlišením a <b>%s</b> náhledù.';
$txt_admin['Nothing to do.'] = 'Nic dalšího na práci.';
$txt_admin['Your library contains <b>%s</b> pictures.'] = 'Vyše knihovna obsahuje <b>%s</b> obrázkù.';

$txt_admin['Batch action to execute: '] = 'Dávka k provedení: ';
$txt_admin['Generate all thumbnails/lowres'] = 'Vytvoø všechny náhledy/obrázky s nízkım rozlišením';
$txt_admin['Delete all thumbnails/lowres'] = 'Sma všechny náhledy/obrázky s nízkım rozlišením';
$txt_admin['Delete all thumbnails'] = 'Sma všechny náhledy';
$txt_admin['Error while deleting %s'] = 'Chyba pøi mazání %s';
$txt_admin['Successfully deleted %s of %s files'] = 'Úspìšnì smazáno %s z %s souborù.';



// File upload page
$txt_current_dir="Souèasnı adresáø :";
$txt_file_to_upload="Soubor(y) ke nataení:";
$txt_upload_file_from_user="Natáhni soubory z tvého poèítaèe";
$txt_upload_file_from_url="Natáhni soubor z URL umístìní";
$txt_upload_change = "Zmìna poètu natahovanıch souborù bude vyadovat znovuzadání všech souborù, které jste doteï vybrali. Doporuèujeme zrušit akci, natáhnout ji vybrané soubory a vybrat vìtší èíslo a pøi pøíštím vıbìru. Chcete pøesto pokraèovat?";

// User management
$txt_add_user = 'Pøidej uivatele';
$txt_back_user_list = 'Zpìt na seznam uivatelù';
$txt_confirm_del_user = 'Opravdu chcete smazat tohoto uivatele?';
$txt_user_info = 'Informace o uivateli';
$txt_login_rule = 'Zadej pøihlašovací jméno do délky 20 znakù';
$txt_login_ie = 'napø.: petr';
$txt_pass_rule = 'Zadej heslo do délky 32 znakù';
$txt_sec_lvl_rule = 'Zadej bezpeènostní úroveò mezi 1 a 999';
$txt_sec_lvl_ie = "napø.: 10";

$txt_um_login = 'Jméno';
$txt_um_pass = 'Heslo';
$txt_um_sec_lvl = 'Bezpeènostní úroveò';
$txt_um_edit = 'Uprav';
$txt_um_del = 'Sma';

// Configuration Editor page
$txt_admin['Settings'] = 'Nastavení';
$txt_admin['Description'] = 'Popis:';
$txt_admin['Example'] = 'Pøíklad:';
$txt_admin['Read-Only option'] = '<b>Read Only</b> - Z bezpeènostních dùvodù mùete zmìnit tuto volbu pouze ruènì editací %s nebo pouitím install.php.';
$txt_admin['Usage of install recommended'] = 'Doporuèeno pouít <b>%s</b> kì zmìnì tohoto nastavení';
$txt_admin['on'] = 'zapnuto';
$txt_admin['off'] = 'vypnuto';
$txt_admin['Show advanced options'] = 'pokroèilé volby';
$txt_admin['Value for %s is incorrect'] = 'Hodnota pro %s není správná';
$txt_admin['Successfully saved changes to config'] = 'Zmìny v konfiguraci úspìšnì uloeny';


// Misc
$txt_admin['INSTALL/DEBUG mode is active'] = "<b>VAROVÁNÍ</b>: INSTALL/DEBUG mode je aktivní - Snite hodnotu \$debug_mode v config.ini.php a skonèíte s ladìním.";
$txt_admin['Javascript Disabled'] = "<b>VAROVÁNÍ</b>: Váš prohlíeè (nebo bezpeènostní nastavení) nepodporuje Javascript. K nìkterım funkcím nebudete mít pøístup.";


/********************************************************************************
* ERROR messages
* This section is far from being complete but 
*********************************************************************************/

// 2xx is related to filesystem permissions/ownership
$txt_error['00251'] = 'Tento adresáø NEMÁ povoleno zapisování souborù. To mùe zpùsobit rùznì potíe (napø.: nemonost vytváøení náhledù nebo obrázkù s nízkım rozlišením)';

// 8xx is related to user management
$txt_error['00800'] = "CHYBA:";
$txt_error['00801'] = "Uid není nastaveno";
$txt_error['00802'] = "Uid není èíslo";
$txt_error['00803'] = "Pøihlašovací jméno musí obsahovat mezi 1 a 20 znaky z následujících rozsahù 0-9 a-z @ - _";
$txt_error['00804'] = "Pøihlašovací jméno není zadáno";
$txt_error['00805'] = "Heslo musí obsahovat mezi 1 a 32 znaky z následujících rozsahù 0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #";
$txt_error['00806'] = "Heslo není nastaveno";
$txt_error['00807'] = "Bezpeènostní úroveò musí bıt èíslo mezi 1 a 999";
$txt_error['00808'] = "Bezpeènostní úroveò nenastavena";
$txt_error['00809'] = "Pøihlašovací jméno u existuje";



/********************************************************************************
* INSTALL Part
* Text only displayed during the install process
*********************************************************************************/

$txt_install['next step'] = 'Další krok ->';

// Step 2
$txt_install['IP address check'] = 'Ovìøení IP adresy';
$txt_install['for security reasons, proove that it is your the admin'] = 'Z bezpeènostních dùvodù je tøeba prokázat, e jste opravdu administrátor tìchto stránek.';
$txt_install['finally, reload this page'] = 'Nakonec, <a href="javascript:window.location.reload()">znovu naètìte</a> tuto stránku';
$txt_install['copy INI_FILE.sample to INI_FILE'] = 'Zkopírujte soubor %s do %s';
$txt_install['located under the conf subdir of phpgraphy dir'] = 'umístìnı v podadresáøi %s adresáøe, kterı obsahuje phpGraphy';
$txt_install['open INI_FILE with your favorite text editor and replace admin_ip with your ip'] = 'Otevøte %s svım oblíbenım textovım editorem a nahra´dte hodnotu %s vaší skuteènou IP adresou, která je %s';
$txt_install['upload INI_FILE on your webserver under the CONF_DIR dir'] = 'Natáhnìte %s na váš webserver do adresáøe %s';

// Step 3
$txt_install['Directories Permissions'] = 'Pøístupová práva do adresáøù';
$txt_install['test_result_passed'] = 'OK';
$txt_install['test_result_failed'] = 'SELHALO';
$txt_install['Checking that the webuser can write in the following directories :'] = 'Kontrola, zdali program mùe zapisovat do následujících adresáøù:';
$txt_install['you can not proceed next step'] = 'Opravte vıše uvedené problémy a <a href="javascript:window.location.reload()">rznovu naètìte</a> stránku';
$txt_install['Is directory %s writable ?'] = 'Je adresáø %s zapisovatelnı?';
$txt_install['Is file %s writable ?'] = 'Je soubor %s zapisovatelnı?';
$txt_install['Directory %s used to store the sessions is not writable and sessions support has been disabled'] = 'Adresáø %s <span class="annotation">(pouívanı k ukládání sessions)</span> není zapisovatelnı, podpora sessions byla vypnuta.';
 
// Step 4
$txt_install['Image Tools Configuration'] = 'Konfigurace nástrojù pro práci s obrázky';
$txt_install['Image Tools Configuration introduction'] = 'Na této stránce mùete vybrat software pouitı k vytváøení náhledù a obrázkù s nízkım rozlišením. Stejnì tak zde mùete nadefinovat software pro otáèení obrázkù. Instalace sama našla nejlepší volby. Pokud si nejste jistí tím, co to udìlá, kdy nìco zmìníte, tak jednoduše pokraèujte dalším krokem.';
$txt_install['If you know what you re doing, please use this button'] = "Pokud víte, co dìláte, pouijte toto tlaèítko.";
$txt_install['Show me the details'] = 'Uka mi podrobnosti';
$txt_install['choose your thumb generator'] = 'Vyberte prosím software zpracovávající obrázky: ';
$txt_install['gd not supported'] = 'Podpora GD knihovny nebyla naisntalována';
$txt_install['gd missing JPG support'] = 'Nainstalovaná verze GD knihovny neobsahuje podporu JPG formátu';
$txt_install['exec function disabled'] = 'exec() funkce je zakázána';
$txt_install['auto-detection failed'] = 'Autodetekce selhala';
$txt_install['you need to specify %s path'] = '<b>Musíte</b> upøesnit <b>%s</b> cestu: ';
$txt_install['you need to specify the program path'] = '<b>Musíte</b> upøesnit cestu k programu: ';
$txt_install['no thumb_generator found intro'] = 'Nenalezen ádnı pracující software ke zpracování obrázkù. Detaily viz. níe.';
$txt_install['no thumb_generator found conclusion'] = 'Pokud jste vlastníkem server, mìli byste bıt schopni vyøešit tento problém. Jinak nemáte jinou monost, ne vytváøet náhledy a obrázky s nízkım rozlišením sami.';
$txt_install['choose your rotate tool'] = 'Vyberte prosím nástroj k otáèení obrázkù: ';
$txt_install['rotate tool not available'] = 'Otáèení obrázkù není pøístupné s vaší konfigurací, protoe byla zakázána funkce exec()';
$txt_install['exif has been disabled'] = 'Podpora Exif není ve vaší verzi PHP pøístupná a byla proto vypnuta.';

// Step 5
$txt_install['Database configuration'] = 'Nastavení databáze';
$txt_install['choose your database backend'] = 'Vyberte typ databáze, kterı pouíváte: ';
$txt_install['mysql details title'] = 'Parametry MySQL databáze';
$txt_install['database host'] = 'Jméno serveru: ';
$txt_install['database name'] = 'Název databáze: ';
$txt_install['database user'] = 'Uivatel: ';
$txt_install['database pass'] = 'Heslo: ';
$txt_install['tables prefix'] = 'Pøedpona tabulek: ';
$txt_install['remove invalid characters'] = '* odstraòte neplatné znaky';
$txt_install['mysql connection error, see errors'] = 'Není moné se pøipojit k databázi, chybové hlášení následuje:';
$txt_install['database structure sucessfully created'] = 'Databázová struktura byla úspìšnì vytvoøena';
$txt_install['database structure already exists'] = 'Byla nalezena platná databázová struktura. Pokraèujte dalším krokem.';
$txt_install['error while creating database structure'] = 'Pøi vytváøení databázové struktury se vyskytla chyba.';

// Step 6
$txt_install['Administrator account creation'] = 'Vytvoøení administrátorského úètu';
$txt_install['Username'] = 'Pøihlašovací jméno: ';
$txt_install['Password'] = 'Heslo: ';
$txt_install['Congratulations, administrator account %s has been created'] = 'Gratulujeme, administrátorskı úèet %s byl vytvoøen.';
$txt_install['An error has occured while creating your administrator account'] = 'Bìhem vytváøení administrátorského úètu se vyskytla chyba.';
$txt_install['please choose a login and password'] = 'Jste ji u konce instalace. Vyberte prosím pøihlašovací jméno a heslo, které budete pouívat k pøihlášení jako administrátor.';
$txt_install['Configuration file has been saved'] = 'Váš konfiguraèní soubor byl úspìšnì uloen.';
$txt_install['An error has occured while saving your configuration file'] = 'Bìhem ukládání konfiguraèního souboru se vyskytla chyba.';
$txt_install['You can now access your phpgraphy site'] = 'Nyní mùete zaèít pouívat <a href="index.php">vaší phpGraphy galerii</a> !';
$txt_install['One or more problems have occured and your installation is NOT properly finished, please contact the phpGraphy DevTeam with the details of your error(s)'] = 'Vyskytly se potíe, a proto <b>NEMOHLA bıt instalace dokonèena</b>, kontaktujte prosím phpGraphy DevTeam s detailním popisem vašich chyb.';

// Initial .welcome file
$txt_install['welcome file content'] = 'Ahoj

To jsem já, <b>.welcome</b> soubor z adresáøe s obrázky!
Mùeš zmìnit mùj obsah, pokud jsi pøihlášen jako administrátor.

Tady je nìkolik základních doporuèení k rozbìhání phpGraphy galerie

1/ Pøihlaš se jako administrátor
2/ Zkus vytvoøit adresáø
3/ Zkus nahrát nìjakı obrázek (buï pøes web nebo pomocí svého FTP úètu)
4/ Podívej se, jestli jsou správnì vytváøeny náhledy

Jakmile bude všechno správnì pracovat, uprav mì a ulo mì, kam se ti bude líbit.

<div style="border: solid 1px; width: 50%; padding: 5px;"><u>Tip:</u>
Tady je pøíklad pouití HTML znaèek. Mùete vytváøet odkazy, jako tøeba <a href="?toprated=1">nejlépe hodnocené obrázky</a> nebo vkládat obrázky pomocí znaèky img.
</div>

Thanks for choosing phpGraphy, I hope you will enjoy using this software
If you encounter a bug or you have a great new feature idea, please contact me.
(See <a href="http://phpgraphy.sourceforge.net">phpGraphy website</a> for contact details)

						JiM / aEGIS.
';


?>
