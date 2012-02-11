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
$txt_root_dir=" G��wny album";

// the following variables defines the text used for navigating the gallery
// you can change them to fit your needs and also use images (http://tofz.org/ style)
// e.g: $txt_previous_page='<img src="/gfx/my_previous_image_button.gif">';


// Picture/Thumbs viewing/navigation
$txt_files='plik(�w)';
$txt_dirs='album(�w)';
$txt_last_commented="ostatnio skomentowane";

// Rating (if activated)
$txt_no_rating="brak ocen";
$txt_thumb_rating="ocena: ";
$txt_pic_rating="�rednia ocena : ";
$txt_option_rating="Oce� t� fotk�";
$txt['Best rating'] = 'Super';
$txt['Worst rating'] = 'Cienka';
$txt['Rate !'] = 'Oce� !';

$txt_back_dir='^Wr��^';
$txt_previous_image='&lt;- Poprzednia';
$txt_next_image='Nast�pna -&gt;';
$txt_hires_image=' +Super jako��+ ';
$txt_lores_image=' -Niska jako��- ';

$txt_previous_page='&lt;- Poprzednia strona -| ';
$txt_next_page=' |- Nast�pna strona -&gt; ';

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
$txt['Last %s added pictures per directory :'] = '%s ostatnio dodanych fotek z podzia�em na albumy :';

// Top Right Menu (stuff displayed when in admin mode are under the admin section)
$txt_login="login";
$txt_logout="logout";
$txt_random_pic="losowa fotka";


// Login page
$txt['authenticate yourself'] = 'Przedstaw si�';
$txt_login_form_login="login:";
$txt_login_form_pass="has�o:";


// Add comment page
$txt_comment_form_name="Nick:";
$txt_remember_me="(Zapami�taj mnie)";
$txt_comment_form_comment="Tw�j komentarxz:";

// Generic stuff (used in several places)
$txt_go_back = "Wr��";
$txt_form_submit = "Wy�lij";
$txt_ok = "OK";
$txt_failed = "B��D";
$txt_ie = 'np: ';
$txt['NOTE: '] = 'UWAGA: ';
$txt['HTML and line breaks supported'] = 'tagi HTML i ko�ce linii dozwolone';
$txt['HTML tags will display in your post as text'] = 'tagi HTML b�d� wy�wietlane jako tekst';


// metadata section (EXIF/IPTC)

/* $txt_[exif|iptc]_custom: You can customize the way informations are displayed,
* all keywords are between '%' for a reference of all supported keywords,
* See Documentation for the complete list of available keywords
*/
$txt_exif_custom="%Exif.Make% %Exif.Model%<br />%Exif.ExposureTime%s f/%Exif.FNumber% at %Exif.FocalLength%mm (35mm equiv: %Exif.FocalLengthIn35mmFilm%mm) iso %Exif.ISO% %Exif.Flash%";
$txt_exif_missing_value="??";	// If EXIF requested field is not found, display this instead
$txt_exif_flash="u�yto lampy"; // Test to display if flash was fired

$txt_iptc_custom="%Iptc.City% by %Iptc.ByLine%";
$txt_iptc_missing_value="??";	// If IPTC requested field not found, display that instead

$txt_show_me_more="Show me more";

// SLIDESHOW
//$txt['Slideshow launch'] = 'Zr�b pokaz fotek...';
$txt['Slideshow previous'] = '&larr; Poprzednia';
$txt['Slideshow next'] = 'Nast�pna &rarr;';
$txt['Slideshow play'] = 'Odtwarzaj';
$txt['Slideshow pause'] = 'Pauza';
$txt['Slideshow close'] = 'Zamknij';
$txt['Slideshow delay'] = 'Op�nienie';
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
$txt_admin['Create a new directory'] = "Stw�rz nowy album";
$txt_admin['Upload pictures/files'] = "Wgraj fotki";
//$txt_admin['Generate Lowres/Thumbnails'] = "Generuj miniatury";
$txt_admin['phpGraphy Settings'] = 'Ustawienia silnika';
$txt_admin['Manage Users'] = 'Zarz�dzaj u�ytkownikami';
$txt_admin['View logfile'] = 'Zobacz log';

// Picture/Thumbs viewing/navigation
$txt_admin['picture settings'] = 'Ustawienia Fotek';
$txt_admin['directory settings'] = 'Ustawienia Album�w';
$txt_admin['title:'] = 'Tytu�: ';
$txt_admin['security level:'] = 'Poziom bezpiecze�stwa: ';
$txt_admin['inherited:'] = ' Dziedziczony: ';
$txt_admin['cover picture:'] = 'Ok�adka albumu: ';
$txt['select as cover picture'] = 'Wybierz jako ok�adk�';
$txt['change/remove'] = 'Zmie�/Usu�';
$txt['select one'] = 'Wybierz jadn�...';
$txt['remove current'] = 'Usu� aktualn�';
$txt_delete_photo="Kasuj fotk�";
$txt_delete_photo_thumb="Wygeneruj miniatur�";
$txt_delete_directory_text="Kasuj album";
$txt_edit_welcome="Edytuj plik .welcome";
$txt_del_comment="Kasuj";

// Confirmation box
$txt_ask_confirm="Jeste� pewien ?";
$txt_delete_confirm="Na pewno chcesz skasowa� ?";

// Image rotation (if available with your config)
$txt['Rotate'] = 'Obr��';
$txt['Rotate 90'] = 'Obr�� o 90�';
$txt['Rotate 180'] = 'Obr�� o 180�';
$txt['Rotate 270'] = 'Obr�� o 270�';


// Editing the .welcome page
$txt_editing="Edycja";
$txt_in_directory="w albumie";
$txt_save="Zapisz";
$txt_cancel="Anuluj";
$txt_clear_all="Wyczy�� wszystko";


// Directory creation page
$txt_admin['Create a Directory'] = 'Nowy Album';
$txt_admin['Current Directory:'] = 'Aktywny Album: ';
$txt_dir_to_create="Nazwa albumu kt�ry chcesz stworzy�:";

// Directory deletion
$txt_admin['Deleting %s'] = 'Kasuj� %s';
$txt_admin['Directory deleted successfully'] = 'Album skasowany';
$txt_admin['Problem while deleting this directory'] = 'Problem podczas kasowania albumu';
$txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'] = 'B��d, pomin� wszystkie podkatalogi (W�a�cicielem jest \'%s\' )';
$txt_admin['(Please check errors msgs above, to resolve )'] = '(Sprawd� ustawienia FTP i/lub uprawnienia podkatalog�w i plik�w)';

// Lowres/Thumbs generation page
$txt_admin['Generating all missing thumbnails/low res pictures: (be patient)'] = 'Generuj� miniatury (b�d� cierpliwy...)';
$txt_admin['Generating low res picture for %s'] = 'Generuj� fotki w niskej jako��i dla %s';
$txt_admin['Generating thumbnail picture for %s'] = 'Generuj� miniatury dla %s';
$txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'] = 'Wygenerowano <b>%s</b> fotek w niskiej jako��i oraz <b>%s</b> miniatur.';
$txt_admin['Nothing to do.'] = 'Nie mam tu nic do roboty.';
$txt_admin['Your library contains <b>%s</b> pictures.'] = 'Tw�j album zawiera <b>%s</b> fotek.';


// File upload page
$txt_current_dir="Aktywny album :";
$txt_file_to_upload="Plik(i) do wgrania:";
$txt_upload_file_from_user="Wgraj plik(i) z twojego komputera";
$txt_upload_file_from_url="Wgraj plik z adresu URL";
$txt_upload_change = "Je�li zmienisz liczb� fotek do wgrania musisz ponownie zaznaczy� nazwy plik�w do przes�ania. Wci�z chcesz kontynuowa� ?";

// User management
$txt_add_user = 'Dodaj u�ytkownika';
$txt_back_user_list = 'Wr�� do listy u�ytkownik�w';
$txt_confirm_del_user = 'Chcesz skasowa� tego u�ytkownika ?';
$txt_user_info = 'Informacje o u�ytkowniku';
$txt_login_rule = 'Wybierz login (max 20 znak�w)';
$txt_login_ie = 'np: osamabinaladen';
$txt_pass_rule = 'Wybierz has�o (max 32 znaki)';
$txt_sec_lvl_rule = 'Wybierz poziom zabezpiecze� pomi�dzy 1 a 999';
$txt_sec_lvl_ie = "np: 10 (999 to admin)";

$txt_um_login = 'Login';
$txt_um_pass = 'Has�o';
$txt_um_sec_lvl = 'Poziom zabezpiecze�';
$txt_um_edit = 'Edytuj';
$txt_um_del = 'Kasuj';

// Configuration Editor page
$txt_admin['Settings'] = 'Ustawienia';
$txt_admin['Description'] = 'Opis:';
$txt_admin['Example'] = 'Przyk�ad:';
$txt_admin['Read-Only option'] = '<b>Tylko Odczyt</b> - mo�esz to zmieni� poprzez r�czn� edycj� %s lub poprzez u�ycie install.php.';
$txt_admin['Usage of install recommended'] = 'Polecam u�y� <b>%s</b> aby dokona� zmian tego parametru';
$txt_admin['on'] = 'w��czone';
$txt_admin['off'] = 'wy��czone';
$txt_admin['Show advanced options'] = 'Poka� zaawansowane opcje';
$txt_admin['Value for %s is incorrect'] = 'Warto�� %s jest nieprawid�owa';
$txt_admin['Successfully saved changes to config'] = 'Zapisano zmiany w konfiguracji';


// Misc
$txt_admin['INSTALL/DEBUG mode is active'] = "<b>UWAGA</b>: rozszerzone logowanie w��czone - obni� warto�� \$debug_mode w config.ini.php";
$txt_admin['Javascript Disabled'] = "<b>WARNING</b>: Twoja przegl�darka nie obs�uguje Javascript-niekt�re funkcje zosta�y wy��czone";


/********************************************************************************
* ERROR messages
* This section is far from being complete but 
*********************************************************************************/

// 8xx is related to user management
$txt_error['00800'] = "B��D:";
$txt_error['00801'] = "Brak UID";
$txt_error['00802'] = "UID nie jest cyfr�";
$txt_error['00803'] = "Login powinien zawiera� od 1 do 20 znak�w: 0-9 a-z @ - _";
$txt_error['00804'] = "Brak loginu";
$txt_error['00805'] = "Has�o powinno zawiera� od 1 do 32 znak�w: 0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #";
$txt_error['00806'] = "Brak has�a";
$txt_error['00807'] = "Poziom zabezpiecze� powinien by� cyfra pomi�dzy 1 a 999";
$txt_error['00808'] = "Poziom zabezpiecze� nie zosta� ustawiony";
$txt_error['00809'] = "Taki u�ytkownik juz istnieje-wybierz inny login";



/********************************************************************************
* INSTALL Part
* Text only displayed during the install process
*********************************************************************************/

$txt_install['next step'] = 'Nast�pny Krok ->';

// Step 2
$txt_install['IP address check'] = 'Sprawdzanie adresu IP';
$txt_install['for security reasons, proove that it is your the admin'] = 'Musisz potwierdzi�, �e jeste� administratorem tej strony.';
$txt_install['finally, reload this page'] = 'Potem kliknij <a href="javascript:window.location.reload()">TUTAJ</a> �eby prze�adowa� stron�';
$txt_install['copy INI_FILE.sample to INI_FILE'] = 'Przekopiowano plik %s na %s';
$txt_install['located under the conf subdir of phpgraphy dir'] = 'po�o�ony w podkatalogu %s';
$txt_install['open INI_FILE with your favorite text editor and replace admin_ip with your ip'] = 'Otw�rz %s w edytorze i zamien warto�� %s na tw�j adres IP: %s (to adres admina z kt�rego b�dzie si� ��czy�)';
$txt_install['upload INI_FILE on your webserver under the CONF_DIR dir'] = 'Wgraj %s na tw�j serwer do podkatalogu %s';

// Step 3
$txt_install['Directories Permissions'] = 'Uprawnienia Katalog�w';
$txt_install['test_result_passed'] = 'OK';
$txt_install['test_result_failed'] = 'B��D';
$txt_install['Checking that the webuser can write in the following directories :'] = 'Sprawdzam prawa zapisu serwera www do podkatalog�w :';
$txt_install['you can not proceed next step'] = 'Rozwi�� problem(y) przedstawiony poni�ej i kliknij <a href="javascript:window.location.reload()">TUTAJ</a> aby prze�adowa� stron�';
$txt_install['Is directory %s writable ?'] = 'Czy katalog %s ma prawa zapisu ?';
$txt_install['Is file %s writable ?'] = 'Czy plik %s ma prawa zapisu ?';
$txt_install['Directory %s used to store the sessions is not writable and sessions support has been disabled'] = 'Katalog %s <span class="annotation">(u�ywany do przechowywania sesji)</span> nie ma praw zapisu-wy��czam obs�ug� sesji';

// Step 4
$txt_install['Image Tools Configuration'] = 'Konfiguracja Narz�dzi Graficznych';
$txt_install['Image Tools Configuration introduction'] = 'Na tej stronie mo�esz wybra� narz�dzia do generowania miniatur i fotek w niskiej rozdzielczo�ci. System wykryje ustawienia automatycznie. NIE zmieniaj nic, chyba �e wiesz co robisz';
$txt_install['If you know what you re doing, please use this button'] = "Je�li jeste� pewnien to naci�nij ten przycisk";
$txt_install['Show me the details'] = 'Poka� detale';
$txt_install['choose your thumb generator'] = 'Wybierz program do obr�bki grafiki: ';
$txt_install['gd not supported'] = 'Nie ma wsparcia dla biblioteki GD';
$txt_install['gd missing JPG support'] = 'Zainstalowania biblioteka GD nie ma wsparcia dla formatu JPG';
$txt_install['exec function disabled'] = 'Funkcja exec() jest zablokowana';
$txt_install['auto-detection failed'] = 'Auto-detekcja nie powiod�a si�';
$txt_install['you need to specify %s path'] = '<b>Musisz</b> poda� �cie�k� do <b>%s</b>: ';
$txt_install['you need to specify the program path'] = '<b>Musisz</b> poda� �cie�k� do programu: ';
$txt_install['no thumb_generator found intro'] = 'Nie znaleziono �adnego oprogramowania do obr�bki grafiki-zobacz poni�sze komunikaty.';
$txt_install['no thumb_generator found conclusion'] = 'Je�li jeste� administratorem tego serwera, to mo�esz to szybko naprawi�. W przeciwnym razie b�dziesz musia� sam wgrywa� miniatury i fotki w niskiej jako�ci';
$txt_install['choose your rotate tool'] = 'Wybierz program od obracania fotek: ';
$txt_install['rotate tool not available'] = 'Obracanie nie jest mo�liwe, poniewa� funkcja exec() jest zablokowana.';
$txt_install['exif has been disabled'] = 'Twoje PHP nie wspiera formatu EXIF-funcja zosta�a wy��czona';

// Step 5
$txt_install['Database configuration'] = 'Konfiguracja Bazy Danych';
$txt_install['choose your database backend'] = 'Wybierz baz�: ';
$txt_install['mysql details title'] = 'Paramerty bazy MySQL';
$txt_install['database host'] = 'Nazwa serwera :';
$txt_install['database name'] = 'Nazwa bazy :';
$txt_install['database user'] = 'Login :';
$txt_install['database pass'] = 'Has�o :';
$txt_install['tables prefix'] = 'Prefix tabel :';
$txt_install['remove invalid characters'] = '* Usu� niepoprawny znak(i)';
$txt_install['mysql connection error, see errors'] = 'Nie mog� pod��czy� si� do bazy, sprawd� poni�sze b��dy:';
$txt_install['database structure sucessfully created'] = 'Struktura bazy utworzona';
$txt_install['database structure already exists'] = 'Znaleziono struktur� bazy danych, mo�esz przej�� do nast�pnego kroku';
$txt_install['error while creating database structure'] = 'Wyst�pi� b��d podczas tworzenia bazy danych';

// Step 6
$txt_install['Administrator account creation'] = 'Tworzenie Konta Adminstratora';
$txt_install['Username'] = 'Login :';
$txt_install['Password'] = 'Has�o :';
$txt_install['Congratulations, administrator account %s has been created'] = 'Gratulacje, konto adminstratora %s zosta�o utworzone';
$txt_install['An error has occured while creating your administrator account'] = 'Wyst�pi� b��d podczas tworzenia konta adminstratora.';
$txt_install['please choose a login and password'] = 'Instalacja prawie dobieg�a ko�ca, wybierz login i has�o dla Administratora.';
$txt_install['Configuration file has been saved'] = 'Twoja konfiguracja zosta�a zapisana.';
$txt_install['An error has occured while saving your configuration file'] = 'Wyst�pi� b��d podczas zapisywania konfiguracji.';
$txt_install['You can now access your phpgraphy site'] = 'Kliknij <a href="index.php">TUTAJ</a> �eby zobaczy� swoj� galeri�!';
$txt_install['One or more problems have occured and your installation is NOT properly finished, please contact the phpGraphy DevTeam with the details of your error(s)'] = 'Wyst�pi� jeden lub wi�cej problem(�w) i instalacja <b>NIE ZAKO�CZY�A SI� POPRAWNIE</b>, skontaktuj si� z autorem skryptu podaj�c detale b��du(�w).';

// Initial .welcome file
$txt_install['welcome file content'] = 'Witam,

Jestem plikiem o nazwie <b>.welcome</b>, kt�ry znajduje si� w g��wnym katalogu galerii !
Mo�esz zmieni� moj� zawarto�� je�li jeste� zalogowany jako Adminstrator.

Uproszczona procedura kontrolna:

1/ Zaloguj si� jako admin
2/ Spr�buj stworzy� album(katalog)
3/ Spr�buj wgra� plik poprzez interfejs WWW albo FTP
4/ Sprawd�, czy miniatury wygenerowa�y si� poprawnie

Je�li wszystko jest ok, zmie� zawarto�� pliku .welcome na co tylko chcesz.

<div style="border: solid 1px; width: 50%; padding: 5px;"><u>Porada:</u>
Mo�esz u�ywa� tag�w HTML aby tworzy� linki jak np: <a href="?toprated=1">najfajniejsze fotki</a> lub w��cza� fotki z wykorzystaniem znacznik�w IMG.
</div>

Dzi�ki za u�ywanie phpGraphy, licz�, �e b�dziesz zadowolony z u�ywania tego oprograowania.
Je�li znalaz�e� b��d lub masz nowe, fajne idee skontaktuj si� ze mn� poprzez stron� WWW.
(Zerknij <a href="http://phpgraphy.sourceforge.net">TUTAJ</a> �eby zobaczy� detale)

						JiM / aEGIS.
';

//latest translation for version 0.9.12
$txt['%.1f with %s votes']='%.lf z %s g�osami';                                    
$txt_admin['Batch action to execute: ']='Przetwarzanie do wykonania';
$txt_admin['Batch Processing']='Przetwarzanie wsadowe';                                
$txt_admin['Delete all thumbnails']='Kasuj wszystkie miniatury';                           
$txt_admin['Delete all thumbnails/lowres']='Kasuj wszystkie miniatury i obrazy w niskiej rozdzielczo�ci';                    
$txt_admin['Error while deleting %s']='B��d podczas kasowania %s';                         
$txt_admin['Generate all thumbnails/lowres']='Generuj wszystkie miniatury/fotki wniskiej rozdzielczo�ci';                  
$txt_admin['Successfully deleted %s of %s files']='Skasowano %s z %s plik�w';             
$txt_error['00251']='00251';                                           
$txt['Found_IPTC_metadata']='Fotka posiada dane w formacie IPTC';                                  
$txt['No_IPTC_metadata_found']='Brak danych w formacie IPTC';                                
$txt['slideshow']='pokaz slajd�w'; 

?>
