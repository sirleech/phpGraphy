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
*  $Id: lang_pl.inc.php 406 2007-02-02 00:08:45Z jim $
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
    'language_name_english' => 'Polish',
    'language_name_native'  => 'Polish',
    'country_code'          => 'pl',
    'charset'               => 'iso-8859-2',
    'direction'             => 'ltr',
    'for_version'           => '0.9.12',
    'translator_name'       => 'Darek Kramin',
    'translator_email'      => '[kramer] kramer [at] irc [dot] pl'
    );

// Title of your website
$txt_site_title="my phpGraphy site";

// txt_root_dir: text that specify the root of your gallery
$txt_root_dir=" G³ówny album";

// the following variables defines the text used for navigating the gallery
// you can change them to fit your needs and also use images (http://tofz.org/ style)
// e.g: $txt_previous_page='<img src="/gfx/my_previous_image_button.gif">';


// Picture/Thumbs viewing/navigation
$txt_files='plik(ów)';
$txt_dirs='album(ów)';
$txt_last_commented="ostatnio skomentowane";

// Rating (if activated)
$txt_no_rating="brak ocen";
$txt_thumb_rating="ocena: ";
$txt_pic_rating="¦rednia ocena : ";
$txt_option_rating="Oceñ tê fotkê";
$txt['Best rating'] = 'Super';
$txt['Worst rating'] = 'Cienka';
$txt['Rate !'] = 'Oceñ !';

$txt_back_dir='^Wróæ^';
$txt_previous_image='&lt;- Poprzednia';
$txt_next_image='Nastêpna -&gt;';
$txt_hires_image=' +Super jako¶æ+ ';
$txt_lores_image=' -Niska jako¶æ- ';

$txt_previous_page='&lt;- Poprzednia strona -| ';
$txt_next_page=' |- Nastêpna strona -&gt; ';

$txt_x_comments="komentarz(y)";

$txt_comments="Komentarze :";
$txt_add_comment="Dodaj komentarz";
$txt_comment_from="od: ";
$txt_comment_on=" dnia ";
$txt['*filtered*'] = '*filtr aktywny*';

// Last commented pictures page
$txt_last_commented_title="Ostatnie %s komentarzy :";
$txt_comment_by="przez";

// Top rated pictures page
$txt_top_rated_title="Lista %s najlepszych fotek :";

// Last added pictures/directories page
$txt['Last %s added pictures :'] = '%s ostatnio dodanych fotek :';
$txt['Last %s added pictures per directory :'] = '%s ostatnio dodanych fotek z podzia³em na albumy :';

// Top Right Menu (stuff displayed when in admin mode are under the admin section)
$txt_login="login";
$txt_logout="logout";
$txt_random_pic="losowa fotka";


// Login page
$txt['authenticate yourself'] = 'Przedstaw siê';
$txt_login_form_login="login:";
$txt_login_form_pass="has³o:";


// Add comment page
$txt_comment_form_name="Nick:";
$txt_remember_me="(Zapamiêtaj mnie)";
$txt_comment_form_comment="Twój komentarxz:";

// Generic stuff (used in several places)
$txt_go_back = "Wróæ";
$txt_form_submit = "Wy¶lij";
$txt_ok = "OK";
$txt_failed = "B£¡D";
$txt_ie = 'np: ';
$txt['NOTE: '] = 'UWAGA: ';
$txt['HTML and line breaks supported'] = 'tagi HTML i koñce linii dozwolone';
$txt['HTML tags will display in your post as text'] = 'tagi HTML bêd± wy¶wietlane jako tekst';


// metadata section (EXIF/IPTC)

/* $txt_[exif|iptc]_custom: You can customize the way informations are displayed,
* all keywords are between '%' for a reference of all supported keywords,
* See Documentation for the complete list of available keywords
*/
$txt_exif_custom="%Exif.Make% %Exif.Model%<br />%Exif.ExposureTime%s f/%Exif.FNumber% at %Exif.FocalLength%mm (35mm equiv: %Exif.FocalLengthIn35mmFilm%mm) iso %Exif.ISO% %Exif.Flash%";
$txt_exif_missing_value="??";	// If EXIF requested field is not found, display this instead
$txt_exif_flash="u¿yto lampy"; // Test to display if flash was fired

$txt_iptc_custom="%Iptc.City% by %Iptc.ByLine%";
$txt_iptc_missing_value="??";	// If IPTC requested field not found, display that instead

$txt_show_me_more="Show me more";

// SLIDESHOW
//$txt['Slideshow launch'] = 'Zrób pokaz fotek...';
$txt['Slideshow previous'] = '&larr; Poprzednia';
$txt['Slideshow next'] = 'Nastêpna &rarr;';
$txt['Slideshow play'] = 'Odtwarzaj';
$txt['Slideshow pause'] = 'Pauza';
$txt['Slideshow close'] = 'Zamknij';
$txt['Slideshow delay'] = 'Opó¼nienie';
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
$txt_admin['Admin menu'] = 'Menu Administratora';
$txt_admin['Create a new directory'] = "Stwórz nowy album";
$txt_admin['Upload pictures/files'] = "Wgraj fotki";
//$txt_admin['Generate Lowres/Thumbnails'] = "Generuj miniatury";
$txt_admin['phpGraphy Settings'] = 'Ustawienia silnika';
$txt_admin['Manage Users'] = 'Zarz±dzaj u¿ytkownikami';
$txt_admin['View logfile'] = 'Zobacz log';

// Picture/Thumbs viewing/navigation
$txt_admin['picture settings'] = 'Ustawienia Fotek';
$txt_admin['directory settings'] = 'Ustawienia Albumów';
$txt_admin['title:'] = 'Tytu³: ';
$txt_admin['security level:'] = 'Poziom bezpieczeñstwa: ';
$txt_admin['inherited:'] = ' Dziedziczony: ';
$txt_admin['cover picture:'] = 'Ok³adka albumu: ';
$txt['select as cover picture'] = 'Wybierz jako ok³adkê';
$txt['change/remove'] = 'Zmieñ/Usuñ';
$txt['select one'] = 'Wybierz jadn±...';
$txt['remove current'] = 'Usuñ aktualn±';
$txt_delete_photo="Kasuj fotkê";
$txt_delete_photo_thumb="Wygeneruj miniaturê";
$txt_delete_directory_text="Kasuj album";
$txt_edit_welcome="Edytuj plik .welcome";
$txt_del_comment="Kasuj";

// Confirmation box
$txt_ask_confirm="Jeste¶ pewien ?";
$txt_delete_confirm="Na pewno chcesz skasowaæ ?";

// Image rotation (if available with your config)
$txt['Rotate'] = 'Obróæ';
$txt['Rotate 90'] = 'Obróæ o 90°';
$txt['Rotate 180'] = 'Obróæ o 180°';
$txt['Rotate 270'] = 'Obróæ o 270°';


// Editing the .welcome page
$txt_editing="Edycja";
$txt_in_directory="w albumie";
$txt_save="Zapisz";
$txt_cancel="Anuluj";
$txt_clear_all="Wyczy¶æ wszystko";


// Directory creation page
$txt_admin['Create a Directory'] = 'Nowy Album';
$txt_admin['Current Directory:'] = 'Aktywny Album: ';
$txt_dir_to_create="Nazwa albumu który chcesz stworzyæ:";

// Directory deletion
$txt_admin['Deleting %s'] = 'Kasujê %s';
$txt_admin['Directory deleted successfully'] = 'Album skasowany';
$txt_admin['Problem while deleting this directory'] = 'Problem podczas kasowania albumu';
$txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'] = 'B³±d, pominê wszystkie podkatalogi (W³a¶cicielem jest \'%s\' )';
$txt_admin['(Please check errors msgs above, to resolve )'] = '(Sprawd¼ ustawienia FTP i/lub uprawnienia podkatalogów i plików)';

// Lowres/Thumbs generation page
$txt_admin['Generating all missing thumbnails/low res pictures: (be patient)'] = 'Generujê miniatury (b±d¼ cierpliwy...)';
$txt_admin['Generating low res picture for %s'] = 'Generujê fotki w niskej jako¶æi dla %s';
$txt_admin['Generating thumbnail picture for %s'] = 'Generujê miniatury dla %s';
$txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'] = 'Wygenerowano <b>%s</b> fotek w niskiej jako¶æi oraz <b>%s</b> miniatur.';
$txt_admin['Nothing to do.'] = 'Nie mam tu nic do roboty.';
$txt_admin['Your library contains <b>%s</b> pictures.'] = 'Twój album zawiera <b>%s</b> fotek.';


// File upload page
$txt_current_dir="Aktywny album :";
$txt_file_to_upload="Plik(i) do wgrania:";
$txt_upload_file_from_user="Wgraj plik(i) z twojego komputera";
$txt_upload_file_from_url="Wgraj plik z adresu URL";
$txt_upload_change = "Je¶li zmienisz liczbê fotek do wgrania musisz ponownie zaznaczyæ nazwy plików do przes³ania. Wci±z chcesz kontynuowaæ ?";

// User management
$txt_add_user = 'Dodaj u¿ytkownika';
$txt_back_user_list = 'Wróæ do listy u¿ytkowników';
$txt_confirm_del_user = 'Chcesz skasowaæ tego u¿ytkownika ?';
$txt_user_info = 'Informacje o u¿ytkowniku';
$txt_login_rule = 'Wybierz login (max 20 znaków)';
$txt_login_ie = 'np: osamabinaladen';
$txt_pass_rule = 'Wybierz has³o (max 32 znaki)';
$txt_sec_lvl_rule = 'Wybierz poziom zabezpieczeñ pomiêdzy 1 a 999';
$txt_sec_lvl_ie = "np: 10 (999 to admin)";

$txt_um_login = 'Login';
$txt_um_pass = 'Has³o';
$txt_um_sec_lvl = 'Poziom zabezpieczeñ';
$txt_um_edit = 'Edytuj';
$txt_um_del = 'Kasuj';

// Configuration Editor page
$txt_admin['Settings'] = 'Ustawienia';
$txt_admin['Description'] = 'Opis:';
$txt_admin['Example'] = 'Przyk³ad:';
$txt_admin['Read-Only option'] = '<b>Tylko Odczyt</b> - mo¿esz to zmieniæ poprzez rêczn± edycjê %s lub poprzez u¿ycie install.php.';
$txt_admin['Usage of install recommended'] = 'Polecam u¿yæ <b>%s</b> aby dokonaæ zmian tego parametru';
$txt_admin['on'] = 'w³±czone';
$txt_admin['off'] = 'wy³±czone';
$txt_admin['Show advanced options'] = 'Poka¿ zaawansowane opcje';
$txt_admin['Value for %s is incorrect'] = 'Warto¶æ %s jest nieprawid³owa';
$txt_admin['Successfully saved changes to config'] = 'Zapisano zmiany w konfiguracji';


// Misc
$txt_admin['INSTALL/DEBUG mode is active'] = "<b>UWAGA</b>: rozszerzone logowanie w³±czone - obni¿ warto¶æ \$debug_mode w config.ini.php";
$txt_admin['Javascript Disabled'] = "<b>WARNING</b>: Twoja przegl±darka nie obs³uguje Javascript-niektóre funkcje zosta³y wy³±czone";


/********************************************************************************
* ERROR messages
* This section is far from being complete but 
*********************************************************************************/

// 8xx is related to user management
$txt_error['00800'] = "B£¡D:";
$txt_error['00801'] = "Brak UID";
$txt_error['00802'] = "UID nie jest cyfr±";
$txt_error['00803'] = "Login powinien zawieraæ od 1 do 20 znaków: 0-9 a-z @ - _";
$txt_error['00804'] = "Brak loginu";
$txt_error['00805'] = "Has³o powinno zawieraæ od 1 do 32 znaków: 0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #";
$txt_error['00806'] = "Brak has³a";
$txt_error['00807'] = "Poziom zabezpieczeñ powinien byæ cyfra pomiêdzy 1 a 999";
$txt_error['00808'] = "Poziom zabezpieczeñ nie zosta³ ustawiony";
$txt_error['00809'] = "Taki u¿ytkownik juz istnieje-wybierz inny login";



/********************************************************************************
* INSTALL Part
* Text only displayed during the install process
*********************************************************************************/

$txt_install['next step'] = 'Nastêpny Krok ->';

// Step 2
$txt_install['IP address check'] = 'Sprawdzanie adresu IP';
$txt_install['for security reasons, proove that it is your the admin'] = 'Musisz potwierdziæ, ¿e jeste¶ administratorem tej strony.';
$txt_install['finally, reload this page'] = 'Potem kliknij <a href="javascript:window.location.reload()">TUTAJ</a> ¿eby prze³adowaæ stronê';
$txt_install['copy INI_FILE.sample to INI_FILE'] = 'Przekopiowano plik %s na %s';
$txt_install['located under the conf subdir of phpgraphy dir'] = 'po³o¿ony w podkatalogu %s';
$txt_install['open INI_FILE with your favorite text editor and replace admin_ip with your ip'] = 'Otwórz %s w edytorze i zamien warto¶æ %s na twój adres IP: %s (to adres admina z którego bêdzie siê ³±czy³)';
$txt_install['upload INI_FILE on your webserver under the CONF_DIR dir'] = 'Wgraj %s na twój serwer do podkatalogu %s';

// Step 3
$txt_install['Directories Permissions'] = 'Uprawnienia Katalogów';
$txt_install['test_result_passed'] = 'OK';
$txt_install['test_result_failed'] = 'B£¡D';
$txt_install['Checking that the webuser can write in the following directories :'] = 'Sprawdzam prawa zapisu serwera www do podkatalogów :';
$txt_install['you can not proceed next step'] = 'Rozwi±¿ problem(y) przedstawiony poni¿ej i kliknij <a href="javascript:window.location.reload()">TUTAJ</a> aby prze³adowaæ stronê';
$txt_install['Is directory %s writable ?'] = 'Czy katalog %s ma prawa zapisu ?';
$txt_install['Is file %s writable ?'] = 'Czy plik %s ma prawa zapisu ?';
$txt_install['Directory %s used to store the sessions is not writable and sessions support has been disabled'] = 'Katalog %s <span class="annotation">(u¿ywany do przechowywania sesji)</span> nie ma praw zapisu-wy³±czam obs³ugê sesji';

// Step 4
$txt_install['Image Tools Configuration'] = 'Konfiguracja Narzêdzi Graficznych';
$txt_install['Image Tools Configuration introduction'] = 'Na tej stronie mo¿esz wybraæ narzêdzia do generowania miniatur i fotek w niskiej rozdzielczo¶ci. System wykryje ustawienia automatycznie. NIE zmieniaj nic, chyba ¿e wiesz co robisz';
$txt_install['If you know what you re doing, please use this button'] = "Je¶li jeste¶ pewnien to naci¶nij ten przycisk";
$txt_install['Show me the details'] = 'Poka¿ detale';
$txt_install['choose your thumb generator'] = 'Wybierz program do obróbki grafiki: ';
$txt_install['gd not supported'] = 'Nie ma wsparcia dla biblioteki GD';
$txt_install['gd missing JPG support'] = 'Zainstalowania biblioteka GD nie ma wsparcia dla formatu JPG';
$txt_install['exec function disabled'] = 'Funkcja exec() jest zablokowana';
$txt_install['auto-detection failed'] = 'Auto-detekcja nie powiod³a siê';
$txt_install['you need to specify %s path'] = '<b>Musisz</b> podaæ ¶cie¿kê do <b>%s</b>: ';
$txt_install['you need to specify the program path'] = '<b>Musisz</b> podaæ ¶cie¿kê do programu: ';
$txt_install['no thumb_generator found intro'] = 'Nie znaleziono ¿adnego oprogramowania do obróbki grafiki-zobacz poni¿sze komunikaty.';
$txt_install['no thumb_generator found conclusion'] = 'Je¶li jeste¶ administratorem tego serwera, to mo¿esz to szybko naprawiæ. W przeciwnym razie bêdziesz musia³ sam wgrywaæ miniatury i fotki w niskiej jako¶ci';
$txt_install['choose your rotate tool'] = 'Wybierz program od obracania fotek: ';
$txt_install['rotate tool not available'] = 'Obracanie nie jest mo¿liwe, poniewa¿ funkcja exec() jest zablokowana.';
$txt_install['exif has been disabled'] = 'Twoje PHP nie wspiera formatu EXIF-funcja zosta³a wy³±czona';

// Step 5
$txt_install['Database configuration'] = 'Konfiguracja Bazy Danych';
$txt_install['choose your database backend'] = 'Wybierz bazê: ';
$txt_install['mysql details title'] = 'Paramerty bazy MySQL';
$txt_install['database host'] = 'Nazwa serwera :';
$txt_install['database name'] = 'Nazwa bazy :';
$txt_install['database user'] = 'Login :';
$txt_install['database pass'] = 'Has³o :';
$txt_install['tables prefix'] = 'Prefix tabel :';
$txt_install['remove invalid characters'] = '* Usuñ niepoprawny znak(i)';
$txt_install['mysql connection error, see errors'] = 'Nie mogê pod³±czyæ siê do bazy, sprawd¼ poni¿sze b³êdy:';
$txt_install['database structure sucessfully created'] = 'Struktura bazy utworzona';
$txt_install['database structure already exists'] = 'Znaleziono strukturê bazy danych, mo¿esz przej¶æ do nastêpnego kroku';
$txt_install['error while creating database structure'] = 'Wyst±pi³ b³±d podczas tworzenia bazy danych';

// Step 6
$txt_install['Administrator account creation'] = 'Tworzenie Konta Adminstratora';
$txt_install['Username'] = 'Login :';
$txt_install['Password'] = 'Has³o :';
$txt_install['Congratulations, administrator account %s has been created'] = 'Gratulacje, konto adminstratora %s zosta³o utworzone';
$txt_install['An error has occured while creating your administrator account'] = 'Wyst±pi³ b³±d podczas tworzenia konta adminstratora.';
$txt_install['please choose a login and password'] = 'Instalacja prawie dobieg³a koñca, wybierz login i has³o dla Administratora.';
$txt_install['Configuration file has been saved'] = 'Twoja konfiguracja zosta³a zapisana.';
$txt_install['An error has occured while saving your configuration file'] = 'Wyst±pi³ b³±d podczas zapisywania konfiguracji.';
$txt_install['You can now access your phpgraphy site'] = 'Kliknij <a href="index.php">TUTAJ</a> ¿eby zobaczyæ swoj± galeriê!';
$txt_install['One or more problems have occured and your installation is NOT properly finished, please contact the phpGraphy DevTeam with the details of your error(s)'] = 'Wyst±pi³ jeden lub wiêcej problem(ów) i instalacja <b>NIE ZAKOÑCZY£A SIÊ POPRAWNIE</b>, skontaktuj siê z autorem skryptu podaj±c detale b³êdu(ów).';

// Initial .welcome file
$txt_install['welcome file content'] = 'Witam,

Jestem plikiem o nazwie <b>.welcome</b>, który znajduje siê w g³ównym katalogu galerii !
Mo¿esz zmieniæ moj± zawarto¶æ je¶li jeste¶ zalogowany jako Adminstrator.

Uproszczona procedura kontrolna:

1/ Zaloguj siê jako admin
2/ Spróbuj stworzyæ album(katalog)
3/ Spróbuj wgraæ plik poprzez interfejs WWW albo FTP
4/ Sprawd¼, czy miniatury wygenerowa³y siê poprawnie

Je¶li wszystko jest ok, zmieñ zawarto¶æ pliku .welcome na co tylko chcesz.

<div style="border: solid 1px; width: 50%; padding: 5px;"><u>Porada:</u>
Mo¿esz u¿ywaæ tagów HTML aby tworzyæ linki jak np: <a href="?toprated=1">najfajniejsze fotki</a> lub w³±czaæ fotki z wykorzystaniem znaczników IMG.
</div>

Dziêki za u¿ywanie phpGraphy, liczê, ¿e bêdziesz zadowolony z u¿ywania tego oprograowania.
Je¶li znalaz³e¶ b³±d lub masz nowe, fajne idee skontaktuj siê ze mn± poprzez stronê WWW.
(Zerknij <a href="http://phpgraphy.sourceforge.net">TUTAJ</a> ¿eby zobaczyæ detale)

						JiM / aEGIS.
';

//latest translation for version 0.9.12
$txt['%.1f with %s votes']='%.lf z %s g³osami';                                    
$txt_admin['Batch action to execute: ']='Przetwarzanie do wykonania';
$txt_admin['Batch Processing']='Przetwarzanie wsadowe';                                
$txt_admin['Delete all thumbnails']='Kasuj wszystkie miniatury';                           
$txt_admin['Delete all thumbnails/lowres']='Kasuj wszystkie miniatury i obrazy w niskiej rozdzielczo¶ci';                    
$txt_admin['Error while deleting %s']='B³±d podczas kasowania %s';                         
$txt_admin['Generate all thumbnails/lowres']='Generuj wszystkie miniatury/fotki wniskiej rozdzielczo¶ci';                  
$txt_admin['Successfully deleted %s of %s files']='Skasowano %s z %s plików';             
$txt_error['00251']='00251';                                           
$txt['Found_IPTC_metadata']='Fotka posiada dane w formacie IPTC';                                  
$txt['No_IPTC_metadata_found']='Brak danych w formacie IPTC';                                
$txt['slideshow']='pokaz slajdów'; 

?>
