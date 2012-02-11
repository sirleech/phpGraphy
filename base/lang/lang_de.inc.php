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
*  $Id: lang_de.inc.php 406 2007-02-02 00:08:45Z jim $
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
    'language_name_english' => 'German',
    'language_name_native'  => 'Deutsch',
    'country_code'          => 'de',
    'charset'               => 'iso-8859-1',
    'direction'             => 'ltr',
    'for_version'           => '0.9.11',
    'translator_name'       => 'Christof Schmeisser',
    'translator_email'      => 'christof [dot] schmeisser [_at_] gmx [dot] de'
    );

// Title of your website
$txt_site_title="Meine phpGraphy Seite";

// txt_root_dir: text that specify the root of your gallery
$txt_root_dir="root";

// the following variables defines the text used for navigating the gallery
// you can change them to fit your needs and also use images (http://tofz.org/ style)
// e.g: $txt_previous_page='<img src="/gfx/my_previous_image_button.gif">';


// Picture/Thumbs viewing/navigation
$txt_files='Datei(en)';
$txt_dirs='Ordner';
$txt_last_commented="zuletzt kommentierte Bilder";

// Rating (if activated)
$txt_no_rating="";
$txt_thumb_rating="Bewertung :";
$txt_pic_rating="Durcschn. Bewertung : ";
$txt_option_rating="Bewerte dieses Bild";
$txt['Best rating'] = 'H&ouml;chste Bewertung';
$txt['Worst rating'] = 'Schlechteste Bewertung';
$txt['Rate !'] = 'Bewerte !';

$txt_back_dir='^Nach oben^';
$txt_previous_image='&lt;- Zur&uuml;ck';
$txt_next_image='Vor -&gt;';
$txt_hires_image=' +Hohe Aufl&ouml;sung+ ';
$txt_lores_image=' -Niedrige Aufl&ouml;sung- ';

$txt_previous_page='&lt;- Seite zur&uuml;ck -| ';
$txt_next_page=' |- Seite vor -&gt; ';

$txt_x_comments="Kommentar(e)";

$txt_comments="Kommentare :";
$txt_add_comment="Kommentar schreiben";
$txt_comment_from="Von: ";
$txt_comment_on=" am ";
$txt['*filtered*'] = '*gefiltert*';

// Last commented pictures page
$txt_last_commented_title="Die letzten %s Kommentierten Bilder :";
$txt_comment_by="von";

// Top rated pictures page
$txt_top_rated_title="Top %s bewertete Bilder:";

// Last added pictures/directories page
$txt['Last %s added pictures :'] = 'Die neuesten %s Bilder :';
$txt['Last %s added pictures per directory :'] = 'Last %s added pictures per directory :';

// Top Right Menu (stuff displayed when in admin mode are under the admin section)
$txt_login="Einloggen";
$txt_logout="Ausloggen";
$txt_random_pic="Zufallsbild";


// Login page
$txt['authenticate yourself'] = 'Anmelden';
$txt_login_form_login="benutzername:";
$txt_login_form_pass="Passwort:";


// Add comment page
$txt_comment_form_name="Dein Name:";
$txt_remember_me="(merken)";
$txt_comment_form_comment="Dein Kommentar:";

// Generic stuff (used in several places)
$txt_go_back = "Zur&uuml;ck";
$txt_form_submit = "Abschicken";
$txt_ok = "OK";
$txt_failed = "FEHLGESCHLAGEN";
$txt_ie = 'z.B.: ';
$txt['NOTE: '] = 'NOTIZ: ';
$txt['HTML and line breaks supported'] = 'HTML und Zeilenumbr&uuml;che werden unterst&uuml;tzt';
$txt['HTML tags will display in your post as text'] = 'HTML-Tags werden als Text dargestellt';


// metadata section (EXIF/IPTC)

/* $txt_[exif|iptc]_custom: You can customize the way informations are displayed,
* all keywords are between '%' for a reference of all supported keywords,
* See Documentation for the complete list of available keywords
*/
$txt_exif_custom="%Exif.Make% %Exif.Model%<br />%Exif.ExposureTime%s f/%Exif.FNumber% at %Exif.FocalLength%mm (35mm equiv: %Exif.FocalLengthIn35mmFilm%mm) iso %Exif.ISO% %Exif.Flash%";
$txt_exif_missing_value="??";	// If EXIF requested field is not found, display this instead
$txt_exif_flash="Mit Blitz"; // Test to display if flash was fired

$txt_iptc_custom="%Iptc.City% by %Iptc.ByLine%";
$txt_iptc_missing_value="";	// If IPTC requested field not found, display that instead

$txt_show_me_more="Show me more";

// SLIDESHOW
$txt['Slideshow launch'] = 'Diashow starten...';
$txt['Slideshow previous'] = '&larr; Zur&uuml;ck';
$txt['Slideshow next'] = 'Vor &rarr;';
$txt['Slideshow play'] = 'Abspielen';
$txt['Slideshow pause'] = 'Pause';
$txt['Slideshow close'] = 'Schlie&szlig;en';
$txt['Slideshow delay'] = 'Anzeigedauer';
$txt['Slideshow %s sec'] = '%s Sekunden.';
$txt['Slideshow slower'] = '+';
$txt['Slideshow faster'] = '-';

/********************************************************************************
* ADMIN Section
* Text only displayed once you're loggued in as an admin
* So if you, the admin, speak english, you probably won't need to translate this
*********************************************************************************/

// Top right menu (admin text)
$txt_admin['admin'] = 'Administrator';
$txt_admin['Admin menu'] = 'Adminmen&uuml;';
$txt_admin['Create a new directory'] = "Neuen Ordner erstellen";
$txt_admin['Upload pictures/files'] = "Bilder/Dateien hochladen";
$txt_admin['Generate Lowres/Thumbnails'] = "Thumbnails/niedrige Auflösung generieren";
$txt_admin['phpGraphy Settings'] = 'phpGraphy Einstellungen';
$txt_admin['Manage Users'] = 'Benutzerverwaltung';
$txt_admin['View logfile'] = 'Logdatei anschauen';

// Picture/Thumbs viewing/navigation
$txt_admin['picture settings'] = 'Bildereinstellungen';
$txt_admin['directory settings'] = 'Ordnereinstellungen';
$txt_admin['title:'] = 'Titel: ';
$txt_admin['security level:'] = 'Sicherheitsstufe: ';
$txt_admin['inherited:'] = ' Vererbt: ';
$txt_admin['cover picture:'] = 'Coverbild: ';
$txt['select as cover picture'] = 'Als Coverbild des aktuellen Ordners ausw&auml;hlen';
$txt['change/remove'] = '&Auml;ndern/ L&ouml;schen';
$txt['select one'] = 'Auswahl treffen';
$txt['remove current'] = 'Jetziges entfernen';
$txt_delete_photo="Bild l&ouml;schen";
$txt_delete_photo_thumb="Thumbnail erneut generieren";
$txt_delete_directory_text="Ordner l&ouml;schen";
$txt_edit_welcome=".welcome editieren";
$txt_del_comment="l&ouml;schen";

// Confirmation box
$txt_ask_confirm="Sicher?";
$txt_delete_confirm="Wirklich l&ouml;schen?";

// Image rotation (if available with your config)
$txt['Rotate'] = 'Drehen';
$txt['Rotate 90'] = '90° drehen';
$txt['Rotate 180'] = '180° drehen';
$txt['Rotate 270'] = '270° drehen';


// Editing the .welcome page
$txt_editing="Editieren";
$txt_in_directory="In Ordner";
$txt_save="Sichern";
$txt_cancel="Abbrechen";
$txt_clear_all="Alles l&ouml;schen";


// Directory creation page
$txt_admin['Create a Directory'] = 'Ein Verzeichnis erstellen';
$txt_admin['Current Directory:'] = 'Aktuelles Verzeichnis: ';
$txt_dir_to_create="Zu erstellendes Verzeichnis:";

// Directory deletion
$txt_admin['Deleting %s'] = 'L&ouml;sche %s';
$txt_admin['Directory deleted successfully'] = 'Verzeichnis erfolgreich entfernt';
$txt_admin['Problem while deleting this directory'] = 'Probleme beim entfernen des Verzeichnisses';
$txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'] = 'Fehlgeschlagen, Unterverzeichnise werden &uuml;bersprungen (Besitzer ist \'%s\' )';
$txt_admin['(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)'] = '(Bitte obige Fehlermeldung &uuml;berpr&uuml;fen. Um das Problem zu l&ouml;sen muss mittels FTP Zugang die berechtigung gel&ouml;scht oder geändert werden.)';

// Lowres/Thumbs generation page
$txt_admin['Generating all missing thumbnails/low res pictures: (be patient)'] = 'Fehlende Thumbnails/ niedr. Aufl&ouml;sungsbilder werden generiert: (Bitte warten)';
$txt_admin['Generating low res picture for %s'] = ' %s niedrige Aufl&ouml;sungsbilder generiert';
$txt_admin['Generating thumbnail picture for %s'] = '%s Thumbnails generiert';
$txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'] = '<b>%s</b>niedrige Aufl&ouml;sungsbilder und <b>%s</b> Thumbnails generiert.';
$txt_admin['Nothing to do.'] = 'Nichts zu tun.';
$txt_admin['Your library contains <b>%s</b> pictures.'] = 'Die Datenbank enth&auml;lt <b>%s</b> Bilder.';


// File upload page
$txt_current_dir="Aktuelles Verzeichnis:";
$txt_file_to_upload="Datei(en) zum Upload:";
$txt_upload_file_from_user="Dateien vom Computer hochladen";
$txt_upload_file_from_url="Dateien mit einer URL hochladen";
$txt_upload_change = "Das &Auml;ndern der Anzahl hochzuladener Dateien erfordert das erneute ausw&auml;hlen aller Dateien. Es wird empfohlen abzubrechen und die momentan ausgew&auml;hlten Dateien hochzuladen und das n&auml;chste mal eine h&ouml;here Nummer auszuw&auml;hlen. Willst Du trotzdem weitermachen?";

// User management
$txt_add_user = 'benutzer erstellen';
$txt_back_user_list = 'Zur&uuml;ck zur Benutzer&uuml;bersicht';
$txt_confirm_del_user = 'benutzer wirklich l&ouml;schen?';
$txt_user_info = 'Benutzerinformation';
$txt_login_rule = 'Benutzername angeben (max 20 Zeichen)';
$txt_login_ie = 'z.B.: john';
$txt_pass_rule = 'Passwort angeben (max 32 Zeichen';
$txt_sec_lvl_rule = 'Sicherheitsstufe zwischen 1 und 999 angeben';
$txt_sec_lvl_ie = "z.B: 10";

$txt_um_login = 'Benutzername';
$txt_um_pass = 'Passwort';
$txt_um_sec_lvl = 'Sicherheitsstufe';
$txt_um_edit = 'Bearbeiten';
$txt_um_del = 'L&ouml;schen';

// Configuration Editor page
$txt_admin['Settings'] = 'Einstellungen';
$txt_admin['Description'] = 'beschreibung:';
$txt_admin['Example'] = 'Beispiel:';
$txt_admin['Read-Only option'] = '<b>Nur lesend</b> - Aus Gr&uuml;nden der Sicherheit kann diese Option nur durch manuelles editieren der  %s oder mit hilfe der install.php erfolgen.';
$txt_admin['Usage of install recommended'] = 'Die Verwendung der <b>%s</b> wird zum &Auml;ndern der Option ben&ouml;tigt';
$txt_admin['on'] = 'an';
$txt_admin['off'] = 'aus';
$txt_admin['Show advanced options'] = 'Erweiterte Optionen einblenden';
$txt_admin['Value for %s is incorrect'] = 'Der Wert von "%s" ist falsch';
$txt_admin['Successfully saved changes to config'] = '&Auml;nderungen wurden erfolgreich &uuml;bernommen';


// Misc
$txt_admin['INSTALL/DEBUG mode is active'] = "<b>ACHTUNG</b>: INSTALL/DEBUG Modus ist aktiviert - Nach beendigung den Wert \$debug_mode in der config.ini.php &auml;ndern.";
$txt_admin['Javascript Disabled'] = "<b>ACHTUNG</b>: Der Browser unterst&uuml;tzt kein Javascript. Deshalb sind einige Funktionen nicht zug&auml;nglich";


/********************************************************************************
* ERROR messages
* This section is far from being complete but 
*********************************************************************************/

// 8xx is related to user management
$txt_error['00800'] = "FEHLER:";
$txt_error['00801'] = "Uid ist nicht eingetragen";
$txt_error['00802'] = "Uid ist nicht numerisch";
$txt_error['00803'] = "Benutzername sollte aus 1 bis 20 dieser Zeichen bestehen: 0-9 a-z @ - _";
$txt_error['00804'] = "Benutzername ist nicht eingetragen";
$txt_error['00805'] = "Das Passwortsollte aus 1 bis 32 dieser Zeichen bestehen: 0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #";
$txt_error['00806'] = "Passwort ist nicht eingetragen";
$txt_error['00807'] = "Die Sicherheitsstufe muss eine Nummer zwischen 1 und 999 sein";
$txt_error['00808'] = "Sicherheitsstufe nicht eingegeben";
$txt_error['00809'] = "Benutzername existiert bereits";



/********************************************************************************
* INSTALL Part
* Text only displayed during the install process
*********************************************************************************/

$txt_install['next step'] = 'N&auml;chster Schritt ->';

// Step 2
$txt_install['IP address check'] = '&Uuml;berpr&uuml;fung der IP Adresse';
$txt_install['for security reasons, proove that it is your the admin'] = 'Aus Sicherheitsgr&uuml;nden muss sichergestellt sein, dass Du der Administrator bist.';
$txt_install['finally, reload this page'] = 'Zuletzt, <a href="javascript:window.location.reload()">lade die Seite erneut</a>';
$txt_install['copy INI_FILE.sample to INI_FILE'] = 'Benenne die Datei %s um in %s';
$txt_install['located under the conf subdir of phpgraphy dir'] = 'located under the %s subdirectory of your phpGraphy directory';
$txt_install['open INI_FILE with your favorite text editor and replace admin_ip with your ip'] = '&Ouml;ffne die Datei %s mit einem beliebigen Editor und ersetze den Wert %s mit Deiner IP Adresse (Diese ist %s)';
$txt_install['upload INI_FILE on your webserver under the CONF_DIR dir'] = 'Lade %s auf Deinen Webserver ins Unterverzeichnis %s';

// Step 3
$txt_install['Directories Permissions'] = 'Verzeichnisberechtigungen';
$txt_install['test_result_passed'] = 'JA';
$txt_install['test_result_failed'] = 'FEHLER';
$txt_install['Checking that the webuser can write in the following directories :'] = '&Uuml;berpr&uuml;fen ob in folgende Ordner geschrieben werden kann:';
$txt_install['you can not proceed next step'] = 'Obige Fehler beheben und <a href="javascript:window.location.reload()">Seite aktualisieren</a>';
$txt_install['Is directory %s writable ?'] = 'Kann in Verzeichnis %s geschrieben werden?';
$txt_install['Is file %s writable ?'] = 'Ist die Datei %s ver&auml;nderbar?';
$txt_install['Directory %s used to store the sessions is not writable and sessions support has been disabled'] = 'In das Verzeichnis %s <span class="annotation">(ben&ouml;tigt um die Sessions zu speichern)</span> kann nicht geschrieben werden. Daher wurde die Sessionunterst&uuml;tzung deaktiviert';

// Step 4
$txt_install['Image Tools Configuration'] = 'Bildeditierfunktionen konfigurieren';
$txt_install['Image Tools Configuration introduction'] = 'Auf dieser Seite kann man die Werkzeuge einstellen, die zum generieren von Thumbnails, Bildern in niedrigerer Aufl&ouml;sung und zum rotieren selbiger dienen. Die Installation hat automatisch die besten Werte erkannt. Wenn Du Dir nicht sicher bist, gehe einfach zum n&auml;chsten Schritt &uuml;ber.';
$txt_install['If you know what you re doing, please use this button'] = "Wenn Du weißt was Du machst benutze bitte diesen Button";
$txt_install['Show me the details'] = 'Details anzeigen';
$txt_install['choose your thumb generator'] = 'Bitte die Bildbearbeitungssoftware ausw&auml;hlen: ';
$txt_install['gd not supported'] = 'GD Unterst&uuml;tzung wurde nicht kompilliert. ';
$txt_install['gd missing JPG support'] = 'Installeirte GD Version hat keine JPEG Unterst&uuml;tzung';
$txt_install['exec function disabled'] = 'exec() Funktion ist deaktiviert';
$txt_install['auto-detection failed'] = 'Autoerkennung fehlgeschlagen';
$txt_install['you need to specify %s path'] = 'Der Pfad von <b>%s</b> <b>muss</b> angegeben werden: ';
$txt_install['you need to specify the program path'] = 'Der Programmpfad <b>muss</b>angegeben werden: ';
$txt_install['no thumb_generator found intro'] = 'Es wurde keine funktionierende Bildbearbeitungssoftware erkannt, Details siehe unten.';
$txt_install['no thumb_generator found conclusion'] = 'Wenn Das Dein Server ist, solltest Du in der Lge sein die probleme zu l&ouml;sen, sonst m&uuml;ssen Thumbnails und Bilder niedrigerer Aufl&ouml;sung manuell hochgeladen werden.';
$txt_install['choose your rotate tool'] = 'Bitte Softwre zum Rotieren von Bildern ausw&auml;hlen: ';
$txt_install['rotate tool not available'] = 'Bilddrehung ist mit dieser Konfiguration nicht m&ouml;glich, da exec() deaktiviert wurde.';
$txt_install['exif has been disabled'] = 'Exif wird mit dieser PHP Installation nicht unterst&uuml;tzt und wurde deshalb deaktiviert.';

// Step 5
$txt_install['Database configuration'] = 'Datenbankkonfiguration';
$txt_install['choose your database backend'] = 'Gew&uuml;nschte Datenbank ausw&auml;hlen: ';
$txt_install['mysql details title'] = 'MySQL Parameter';
$txt_install['database host'] = 'Hostname des Servers :';
$txt_install['database name'] = 'Name der Datenbank :';
$txt_install['database user'] = 'DB-Benutzer :';
$txt_install['database pass'] = 'DB-Passwort :';
$txt_install['tables prefix'] = 'Tabellenprefix :';
$txt_install['remove invalid characters'] = '* Ung&uuml;ltige Zeichen entfernen';
$txt_install['mysql connection error, see errors'] = 'Keine Verbindung zur Datenbank, folgende(n) Fehler &uuml;berpr&uuml;fen:';
$txt_install['database structure sucessfully created'] = 'Tabellen erfolgreich angelegt';
$txt_install['database structure already exists'] = 'Die Tabellen existieren bereits, weiter zum n&auml;chsten Schritt.';
$txt_install['error while creating database structure'] = 'Beim Erstellen der Tabellen ist ein Fehler aufgetreten.';

// Step 6
$txt_install['Administrator account creation'] = 'Anlegen des Administratorkontos';
$txt_install['Username'] = 'Benutzername :';
$txt_install['Password'] = 'Passwort :';
$txt_install['Congratulations, administrator account %s has been created'] = 'Gl&uuml;ckwunsch, das Administratorkonto %s wurde erfolgreich erstellt';
$txt_install['An error has occured while creating your administrator account'] = 'Beim Erstellen des Administratorkontos trat ein Fehler auf.';
$txt_install['please choose a login and password'] = 'Die Installationsroutine ist fast beendet. Bitte einen Benutzername und Passwort f&uuml;r das Administratorkonto angeben.';
$txt_install['Configuration file has been saved'] = 'Die Konfiguration wurde gespeichert.';
$txt_install['An error has occured while saving your configuration file'] = 'Beim Speichern der Konfiguration trat ein Fehler auf.';
$txt_install['You can now access your phpgraphy site'] = 'Du hast jetzt Zugriff auf deine <a href="index.php">phpGraphy Seite</a> !';
$txt_install['One or more problems have occured and your installation is NOT properly finished, please contact the phpGraphy DevTeam with the details of your error(s)'] = 'Ein oder mehrere Fehler traten auf. DIe Installation ist <b>nicht fehlerfrei beendet worden</b>! Bitte kontaktiere das phpGraphy DevTeam mit einer detaillierten Fehlerbeschreibung!';

// Initial .welcome file
$txt_install['welcome file content'] = 'Hallo

Ich bin die .welcome Datei, welche sich in Deinem Bilderverzeichnis befindet.
Du kannst mich &auml;ndern, wenn Du als Administrator angemeldet bist.

Das ist die Standardvorgehensweise nach der Installation:

1/ Melde Dich als Administrator an
2/ Versuche ein Verzeichnis zu erstellen
3/ Versuche eine Datei hochzuladen (Entweder mit dem Webfrontend oder dem FTP Zugang)
4/ Schau nach ob alle Thumbnails fehlerfrei generiert wurden.

Wenn das funktioniert &auml;ndere mich bitte wie immer Du willst!

<div style="border: solid 1px; width: 50%; padding: 5px;"><u>Tip:</u>
Das ist ein Beispiel f&uuml;r HTML in der .welcome Datei. mit diesem Link kann man z.B. die <a href="?toprated=1">Bilder mit Topbewertung</a>  ansehen.
Oder f&uuml;ge Bilder und Links ein.</div>

Danke f&uuml;r die Wahl zu phpGraphy, ich hoffe die Arbeit mit dieser Software macht Spa&szlig;!
Wenn Du einen Fehler entdeckst oder ein tolle Idee zum Verbessern hast kontaktiere mich!
(Auf <a href="http://phpgraphy.sourceforge.net">der phpGraphy Seite</a> sind die Kontaktdetails)

						JiM / aEGIS.
';


?>
