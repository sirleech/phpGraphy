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
*  $Id: lang_no.inc.php 406 2007-02-02 00:08:45Z jim $
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
    'language_name_english' => 'Norwegian',
    'language_name_native'  => 'Norsk bokmål',
    'country_code'          => 'no',
    'charset'               => 'iso-8859-1',
    'direction'             => 'ltr',
    'for_version'           => '0.9.11',
    'translator_name'       => 'Cato Lund',
    'translator_email'      => 'cato [at] seffern [dot] org' 
    );
// ta gjerne kontakt med ovenforstående oversetter dersom du har forslag til språklige forbedringer, eventuelt feil

// Title of your website
$txt_site_title="Min phpGraphy Side";

// txt_root_dir: text that specify the root of your gallery
$txt_root_dir="start";

// the following variables defines the text used for navigating the gallery
// you can change them to fit your needs and also use images (http://tofz.org/ style)
// e.g: $txt_previous_page='<img src="/gfx/my_previous_image_button.gif">';


// Picture/Thumbs viewing/naviguation
$txt_files='File(r)';
$txt_dirs='Mappe(r)';
$txt_last_commented="Siste kommentarer";

// Rating (if activated)
$txt_no_rating="";
$txt_thumb_rating="Rangering :";
$txt_pic_rating="Gjennomsnittlig rangering : ";
$txt_option_rating="Ranger dette bildet";
$txt['Best rating'] = 'Best rangering';
$txt['Worst rating'] = 'Verst rangering';
$txt['Rate !'] = 'Ranger!';

$txt_back_dir='^Opp^';
$txt_previous_image='&lt;- Forrige';
$txt_next_image='Neste -&gt;';
$txt_hires_image=' +Høy kval+ ';
$txt_lores_image=' -Lav kval- ';

$txt_previous_page='&lt;- Forrige side -| ';
$txt_next_page=' |- Neste Side -&gt; ';

$txt_x_comments="kommentar(er)";

$txt_comments="Kommentarer :";
$txt_add_comment="Legg til kommentar";
$txt_comment_from="Fra: ";
$txt_comment_on=" den ";
$txt['*filtered*'] = '*Filtrert*';

// Last commented pictures page
$txt_last_commented_title="Siste %s kommenterte bilder :";
$txt_comment_by="av";

// Top rated pictures page
$txt_top_rated_title="Topp %s rangerte bilder :";

// Last added pictures/directories page
$txt['Last %s added pictures :'] = 'Siste %s tilføyde bilder :';
$txt['Last %s added pictures per directory :'] = 'Siste %s tilføyde bilder per mappe :';

// Top Right Menu (stuff displayed when in admin mode are under the admin section)
$txt_login="logg inn";
$txt_logout="logg ut";
$txt_random_pic="Tilfeldig bilde";


// Login page
$txt['authenticate yourself'] = 'Identifiser deg selv';
$txt_login_form_login="brukernavn:";
$txt_login_form_pass="passord:";


// Add comment page
$txt_comment_form_name="Ditt navn:";
$txt_remember_me="(husk meg)";
$txt_comment_form_comment="Din kommentar:";

// Generic stuff (used in several places)
$txt_go_back = "Gå tilbake";
$txt_form_submit = "Send";
$txt_ok = "OK";
$txt_failed = "Mislykket";
$txt_ie = 'dvs: ';
$txt['NOTE: '] = 'OBS: ';
$txt['HTML and line breaks supported'] = 'HTML innhold og linjeskift er støttet';
$txt['HTML tags will display in your post as text'] = 'HTML kode vises i din post som tekst';


// metadata section (EXIF/IPTC)

/* $txt_[exif|iptc]_custom: You can customize the way informations are displayed,
* all keywords are between '%' for a reference of all supported keywords,
* See Documentation for the complete list of available keywords
*/
$txt_exif_custom="%Exif.Make% %Exif.Model%<br />%Exif.ExposureTime%s f/%Exif.FNumber% at %Exif.FocalLength%mm (35mm equiv: %Exif.FocalLengthIn35mmFilm%mm) iso %Exif.ISO% %Exif.Flash%";
$txt_exif_missing_value="??";	// If EXIF requested field is not found, display this instead
$txt_exif_flash="med flash"; // Test to display if flash was fired

$txt_iptc_custom="%Iptc.City% av %Iptc.ByLine%";
$txt_iptc_missing_value="";	// If IPTC requested field not found, display that instead

$txt_show_me_more="Vis meg mer!";

// SLIDESHOW
$txt['Slideshow launch'] = 'Vis som lysbildefremvisning...';
$txt['Slideshow previous'] = '&larr; Forrige';
$txt['Slideshow next'] = 'neste &rarr;';
$txt['Slideshow play'] = 'Spill';
$txt['Slideshow pause'] = 'Pause';
$txt['Slideshow close'] = 'Lukk';
$txt['Slideshow delay'] = 'Pause';
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
$txt_admin['Create a new directory'] = "Lag ny mappe";
$txt_admin['Upload pictures/files'] = "Last opp filer/bilder";
$txt_admin['Generate Lowres/Thumbnails'] = "Produser miniatyrbilde";
$txt_admin['phpGraphy Settings'] = 'phpGraphy instillinger';
$txt_admin['Manage Users'] = 'Administrer  Bruker(e)';
$txt_admin['View logfile'] = 'Se loggfil';

// Picture/Thumbs viewing/naviguation
$txt_admin['picture settings'] = 'Bilde instillinger';
$txt_admin['directory settings'] = 'Mappe instillinger';
$txt_admin['title:'] = 'Tittel: ';
$txt_admin['security level:'] = 'Sikkerhetsnivå: ';
$txt_admin['inherited:'] = ' Arvet: ';
$txt_admin['cover picture:'] = 'framside bilde: ';
$txt['select as cover picture'] = 'Velg framside bilde for nåværende mappe';
$txt['change/remove'] = 'Endre/Fjern';
$txt['select one'] = 'Velg en...';
$txt['remove current'] = 'Fjern denne';
$txt_delete_photo="Slett bilde";
$txt_delete_photo_thumb="Regenerer minibilde";
$txt_delete_directory_text="Slett mappe";
$txt_edit_welcome="Editer .Velkommen";
$txt_del_comment="Slett";

// Confirmation box
$txt_ask_confirm="Er du sikker ?";
$txt_delete_confirm="Ønsker du virkelig å slette ?";

// Image rotation (if available with your config)
$txt['Rotate'] = 'Roter';
$txt['Rotate 90'] = 'Roter 90°';
$txt['Rotate 180'] = 'Roter 180°';
$txt['Rotate 270'] = 'Roter 270°';


// Editing the .welcome page
$txt_editing="Editer";
$txt_in_directory="i mappe";
$txt_save="lagre";
$txt_cancel="avbryt";
$txt_clear_all="nullstill alle";


// Directory creation page
$txt_admin['Create a Directory'] = 'Opprett mappe';
$txt_admin['Current Directory:'] = 'Nåværende mappe: ';
$txt_dir_to_create="Opprettelse av mappe:";

// Directory deletion
$txt_admin['Deleting %s'] = 'Sletter %s';
$txt_admin['Directory deleted successfully'] = 'Mappen ble vellykket slettet';
$txt_admin['Problem while deleting this directory'] = 'Det oppstod et problem under sletting av mappe';
$txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'] = 'Mislykket, undermapper blir ikke berørt (Eier er \'%s\' )';
$txt_admin['(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)'] = '(Vær vennlig og sjekk ovenforståened feilmelding. For å løse dette problemet så kan det hende du må slette (eller endre brukerrettigheter) ved å benytte din FTP tilgang siden det er meget sannsynlig at disse bildene/mappene tilhører din FTP bruker.)';

// Lowres/Thumbs generation page
$txt_admin['Generating all missing thumbnails/low res pictures: (be patient)'] = 'Regenererer alle resterende miniatyrbilder: (vær tålmodig)';
$txt_admin['Generating low res picture for %s'] = 'Regenererer lav kvalitetsbilder for %s';
$txt_admin['Generating thumbnail picture for %s'] = 'Regenererer miniatyrbilder  for %s';
$txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'] = 'Regenererte <b>%s</b> lav kvalitets bilder og <b>%s</b> miniatyrbilder.';
$txt_admin['Nothing to do.'] = 'Ikke noe å utføre';
$txt_admin['Your library contains <b>%s</b> pictures.'] = 'Ditt bibliotek inneholder  <b>%s</b> bilder.';


// File upload page
$txt_current_dir="Nåværende mappe :";
$txt_file_to_upload="Fil(er) til opplasting:";
$txt_upload_file_from_user="Last opp fil(er) fra din maskin";
$txt_upload_file_from_url="Last opp fil(er) fra en web adresse";
$txt_upload_change = "Endring av antall opplastingsfelt vil medføre at du må velge samtlige filer på nytt igjen. Det anbefales å kansellere, laste opp de nåværende valgte filene for deretter å øke antall neste gang. Ønsker du fremdeles å fortsette?";

// User management
$txt_add_user = 'Legg til bruker';
$txt_back_user_list = 'Tilbake til brukerlisten';
$txt_confirm_del_user = 'Ønsker du å slette denne brukeren  ?';
$txt_user_info = 'Bruker informasjon';
$txt_login_rule = 'Spesifiser en bruker med opptil 20 tegn';
$txt_login_ie = 'f.eks: john';
$txt_pass_rule = 'Spesifiser et passord med opptil 35 tegn';
$txt_sec_lvl_rule = 'Spesifiser et passordnivå mellom 1 og 999';
$txt_sec_lvl_ie = "f.eks: 10";

$txt_um_login = 'Brukernavn';
$txt_um_pass = 'Passord';
$txt_um_sec_lvl = 'Sikkerhetsnivå';
$txt_um_edit = 'Editer';
$txt_um_del = 'Slett';

// Configuration Editor page
$txt_admin['Settings'] = 'Instillinger';
$txt_admin['Description'] = 'Beskrivelse:';
$txt_admin['Example'] = 'Eksempel:';
$txt_admin['Read-Only option'] = '<b>Kun leserettigheter</b> - Av sikkerhetsmessige årsaker så kan du bare modifisere denne instillingen manuelt ved å editere %s eller ved å bruke install.php';
$txt_admin['Usage of install recommended'] = 'Bruk av <b>%s</b> det er anbefalt å endre denne instillingen';
$txt_admin['on'] = 'På';
$txt_admin['off'] = 'Av';
$txt_admin['Show advanced options'] = 'Vis detaljerte instillinger';
$txt_admin['Value for %s is incorrect'] = 'Verdi for %s er ugyldig';
$txt_admin['Successfully saved changes to config'] = 'Endringer ble vellykket lagret i konfigurasjonen';


// Misc
$txt_admin['INSTALL/DEBUG mode is active'] = "<b>ADVARSEL</b>: INSTALL/DEBUG modus er aktiv - Reduser verdien av \$debug_mode i config.ini.php straks du er ferdig.";
$txt_admin['Javascript Disabled'] = "<b>ADVARSEL</b>: Nettleseren din støtter ikke javascript, slik at enkelte funksjoner vil være utilgjengelig.";


/********************************************************************************
* ERROR messages
* This section is far from being complete but
*********************************************************************************/

// 8xx is related to user management
$txt_error['00800'] = "FEIL:";
$txt_error['00801'] = "Uid er ikke satt";
$txt_error['00802'] = "Uid har ingen tallverdi";
$txt_error['00803'] = "Brukernavn / login bør inneholde fra 1 til 20 av følgende tegn: 0-9 a-z @ - _";
$txt_error['00804'] = "Login er ikke satt";
$txt_error['00805'] = "Passord bør inneholde fra 1 til 32 av følgende tegn: 0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #";
$txt_error['00806'] = "Passord er ikke satt";
$txt_error['00807'] = "Sikkerhetsnivået må være en tallverdi mellom 1 and 999";
$txt_error['00808'] = "Sikkerhetesnivå er ikke satt";
$txt_error['00809'] = "Login / brukernavnet eksisterer allerede";



/********************************************************************************
* INSTALL Part
* Text only displayed during the install process
*********************************************************************************/

$txt_install['next step'] = 'Neste steg ->';

// Step 2
$txt_install['IP address check'] = 'IP adress sjekk';
$txt_install['for security reasons, proove that it is your the admin'] = 'Av sikkerhetsmessige årsaker så trenger du å bevise at du virkelig er administratoren for denne siden.';
$txt_install['finally, reload this page'] = 'Endelig, <a href="javascript:window.location.reload()">reload</a> denne siden';
$txt_install['copy INI_FILE.sample to INI_FILE'] = 'Kopier følgende fil %s til %s';
$txt_install['located under the conf subdir of phpgraphy dir'] = 'lokalisert under %s undermappe in din phpGraphy mappe.';
$txt_install['open INI_FILE with your favorite text editor and replace admin_ip with your ip'] = 'Åpne %s med ditt favoritt editeringsprogram og erstatt verdien av %s med din IP adresse som er %s';
$txt_install['upload INI_FILE on your webserver under the CONF_DIR dir'] = 'Last opp %s på din webserver under %s undermappa';

// Step 3
$txt_install['Directories Permissions'] = 'Mappe rettigheter';
$txt_install['test_result_passed'] = 'OK';
$txt_install['test_result_failed'] = 'MISLYKKET';
$txt_install['Checking that the webuser can write in the following directories :'] = 'Sjekker at web-brukeren kan skrive til følgende mapper:';
$txt_install['you can not proceed next step'] = 'Correct the problem(s) listed above and <a href="javascript:window.location.reload()">reload</a> the page';
$txt_install['Is directory %s writable ?'] = 'Er korrekte skriverettigheter til %s satt?';
$txt_install['Is file %s writable ?'] = 'Er korrekte skriverettigheter til filen %s satt ?';
$txt_install['Directory %s used to store the sessions is not writable and sessions support has been disabled'] = 'Mappe %s <span class="annotation">(benyttet til å lagre sessions)</span> er ikke skrivbar og session støtte har blitt deaktivert';

// Step 4
$txt_install['Image Tools Configuration'] = 'Bilde verkøy konfigurasjon';
$txt_install['Image Tools Configuration introduction'] = 'På denne siden kan du velge programvare brukt til å generere miniatyrbilder og lav kvalitetsbilder, i tillegg til et til å rotere dem. Installasjonsprosessen har automatisk dektektert de beste valgene og med mindre du vet hva du driver med, vær vennlig å bare fortsett til neste steg.';
$txt_install['If you know what you re doing, please use this button'] = "If you know what you're doing, please use this button";
$txt_install['Show me the details'] = 'Vis meg detaljene';
$txt_install['choose your thumb generator'] = 'Vær vennlig å velg et bilde behandlingsprogram: ';
$txt_install['gd not supported'] = 'GD støtte er ikke kompilert på serveren';
$txt_install['gd missing JPG support'] = 'Installert GD version har ikke JPG støtte inkludert.';
$txt_install['exec function disabled'] = 'exec() funksjon har blitt deaktivert';
$txt_install['auto-detection failed'] = 'Systemet feilet med å finne en egnet valg';
$txt_install['you need to specify %s path'] = 'Du <b>må</b> spesifisere en <b>%s</b> bane: ';
$txt_install['you need to specify the program path'] = 'Du <b>må</b> spesifisere bane til programvare: ';
$txt_install['no thumb_generator found intro'] = 'Ingen fungerende bildebehandlingsprogram ble funnet. Vær vennlig og se nedenforstående detaljer:';
$txt_install['no thumb_generator found conclusion'] = 'Dersom dette er din server, så burde du være i stand til å løse problemet selv. Om ikke, så har du ikke noe annet valg enn å laste opp miniatyrbildene og lav kvalitetsbildene på egenhånd..';
$txt_install['choose your rotate tool'] = 'Vær vennlig og velg programvare for rotering av bilder: ';
$txt_install['rotate tool not available'] = 'Bilde rotering er ikke tilgjengelig med din konfigurasjon fordi exec() ikke er fungerende.';
$txt_install['exif has been disabled'] = 'Exif støtte er ikke tilgjengelig med din PHP installasjon og er derav ikke tilgjengelig.';

// Step 5
$txt_install['Database configuration'] = 'Database konfigurasjon';
$txt_install['choose your database backend'] = 'Velg database backend som du ønsker å benytte: ';
$txt_install['mysql details title'] = 'MySQL Database parametere';
$txt_install['database host'] = 'Tjener vertsnavn :';
$txt_install['database name'] = 'Database navn :';
$txt_install['database user'] = 'Bruker :';
$txt_install['database pass'] = 'Passord :';
$txt_install['tables prefix'] = 'Tabell prefiks :';
$txt_install['remove invalid characters'] = '* Fjern ugyldige tegn';
$txt_install['mysql connection error, see errors'] = 'Ingen kontakt med databasen oppnådd, sjekk feilmelding(er) nedenfor:';
$txt_install['database structure sucessfully created'] = 'Database struktur ble vellykket opprettet';
$txt_install['database structure already exists'] = 'En eksisterende og gyldig database struktur er blitt funnet, og du kan fortsette til neste steg';
$txt_install['error while creating database structure'] = 'Det har skjedd en feil mens databasen strukturen ble forsøkt opprettet';

// Step 6
$txt_install['Administrator account creation'] = 'Opprettelse av administrator konto';
$txt_install['Username'] = 'Brukernavn :';
$txt_install['Password'] = 'Passord :';
$txt_install['Congratulations, administrator account %s has been created'] = 'Gratulerer, administrator brukerkontoen %s har blitt opprettet';
$txt_install['An error has occured while creating your administrator account'] = 'Det skjedde en feil mens administrator kontoen ble forsøkt opprettet.';
$txt_install['please choose a login and password'] = 'Du er i ferd med å fullføre installasjons prosessen. Vær vennlig og velg et brukernavn og passord som du ønsker å benytte.';
$txt_install['Configuration file has been saved'] = 'Din konfigurasjonsfil har blitt lagret.';
$txt_install['An error has occured while saving your configuration file'] = 'Det har oppstått en feil mens konfigurasjonsfilen ble forsøkt opprettet';
$txt_install['You can now access your phpgraphy site'] = 'Du kan nå <a href="index.php">aksessere din phpGraphy side</a> !';
$txt_install['One or more problems have occured and your installation is NOT properly finished, please contact the phpGraphy DevTeam with the details of your error(s)'] = 'En eller flere feil oppstod og <b>din installasjon er ikke korrekt gjennomført</b>. Vær vennlig og kontakt phpGraphy DevTeamet med en detaljert feilbeskrivelse.';

// Initial .welcome file
$txt_install['welcome file content'] = 'Hei

Jeg er <b>.welcome</b> filen lokalisert i din bilde mappe (pictures) !
Du kan modifisere mitt innhold straks du er logget inn som admin.

Here is a basic install validation procedure:
Nedenfor står en simpel verifiseringsprosedyre for å sjekke om installasjonen er vellykket.

1/ Logg inn som admin
2/ Prøv å opprett en mappe
3/ Prøv å last opp en fil (enten via web brukergrensesnittet eller ved hjelp av en FTP-klient)
4/ Sjekk om miniatyrbildene blir generert korrekt

Straks alt ovenforstående fungerer, editer meg gjerne og putt hva du måtte ønske her.

<div style="border: solid 1px; width: 50%; padding: 5px;"><u>Tips:</u>
Her er et eksempel på HTML bruk. Du kan opprette linker som  <a href="?toprated=1">top rangerte bilder</a> eller inkludere et eller flere bilder ved å benytte <img> html-tagen.
</div>

Takk for at du valgte phpGraphy. Jeg håper du har stor glede av å benytte denne programvaren
Hvis du kommer over en feil / bug eller har forslag til nye funksjoner, så vær vennlig å ta kontakt med meg.
(See <a href="http://phpgraphy.sourceforge.net">phpGraphy hjemmeside</a> for kontakt informasjon)

						JiM / aEGIS.
';


?>
