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
    'translator_name'       => 'Håkan Olsson',
    'translator_email'      => 'kontakt [at] nordicnature [dot] net' 
    );
// tag gärna kontakt med mig angående språkliga förbättringar och fel

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
$txt_option_rating="Betygsätt den här bilden";
$txt['Best rating'] = 'Högsta betyg';
$txt['Worst rating'] = 'Lägsta betyg';
$txt['Rate !'] = 'Betygsätt!';

$txt_back_dir='^Upp^';
$txt_previous_image='&lt;- Föregående';
$txt_next_image='Nästa -&gt;';
$txt_hires_image=' +Hög kval+ ';
$txt_lores_image=' -Låg kval- ';

$txt_previous_page='&lt;- Föregående sida -| ';
$txt_next_page=' |- Nästa sida -&gt; ';

$txt_x_comments="kommentar(er)";

$txt_comments="Kommentarer :";
$txt_add_comment="Lägg till kommentar";
$txt_comment_from="Från: ";
$txt_comment_on=" på ";
$txt['*filtered*'] = '*Filtrerad*';

// Last commented pictures page
$txt_last_commented_title="Sist %s kommenterade bilder :";
$txt_comment_by="av";

// Top rated pictures page
$txt_top_rated_title="Högst %s betygsatta bilder :";

// Last added pictures/directories page
$txt['Last %s added pictures :'] = 'Sist %s tillagda bilder :';
$txt['Last %s added pictures per directory :'] = 'Sist %s tillagda bilder per mapp :';

// Top Right Menu (stuff displayed when in admin mode are under the admin section)
$txt_login="logga in";
$txt_logout="logga ut";
$txt_random_pic="Slumpmässig bild";


// Login page
$txt['authenticate yourself'] = 'Identifiera dig själv';
$txt_login_form_login="användarnamn:";
$txt_login_form_pass="lösenord:";


// Add comment page
$txt_comment_form_name="Ditt namn:";
$txt_remember_me="(kom ihåg mig)";
$txt_comment_form_comment="Din kommentar:";

// Generic stuff (used in several places)
$txt_go_back = "Gå tillbaka";
$txt_form_submit = "Skicka";
$txt_ok = "OK";
$txt_failed = "Misslyckat";
$txt_ie = 'dvs: ';
$txt['NOTE: '] = 'OBS: ';
$txt['HTML and line breaks supported'] = 'HTML innehåll och radbrytningar är tillåtet';
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
$txt['Slideshow previous'] = '&larr; Föregående';
$txt['Slideshow next'] = 'nästa &rarr;';
$txt['Slideshow play'] = 'Starta';
$txt['Slideshow pause'] = 'Paus';
$txt['Slideshow close'] = 'Stäng';
$txt['Slideshow delay'] = 'Fördröjning';
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
$txt_admin['Batch Processing'] = 'Gör tumnaglar/lågupplösta bilder'; 
$txt_admin['phpGraphy Settings'] = 'phpGraphy inställningar';
$txt_admin['Manage Users'] = 'Administrera  Användare';
$txt_admin['View logfile'] = 'Se loggfil';

// Picture/Thumbs viewing/naviguation
$txt_admin['picture settings'] = 'Bild inställningar';
$txt_admin['directory settings'] = 'Mapp inställningar';
$txt_admin['title:'] = 'Titel: ';
$txt_admin['security level:'] = 'Säkerhetsnivå: ';
$txt_admin['inherited:'] = ' Ärvd: ';
$txt_admin['cover picture:'] = 'omslagsbild: ';
$txt['select as cover picture'] = 'Välj omslagsbild för den här mappen';
$txt['change/remove'] = 'Ändra/Ta bort';
$txt['select one'] = 'Välj en...';
$txt['remove current'] = 'Ta bort nuvarande';
$txt_delete_photo="Ta bort bild";
$txt_delete_photo_thumb="Skapa tumnagel på nytt";
$txt_delete_directory_text="Ta bort mapp";
$txt_edit_welcome="Redigera .welcome";
$txt_del_comment="Ta bort";

// Confirmation box
$txt_ask_confirm="Är du säker ?";
$txt_delete_confirm="Vill du verkligen ta bort ?";

// Image rotation (if available with your config)
$txt['Rotate'] = 'Rotera';
$txt['Rotate 90'] = 'Rotera 90°';
$txt['Rotate 180'] = 'Rotera 180°';
$txt['Rotate 270'] = 'Rotera 270°';


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
$txt_admin['Problem while deleting this directory'] = 'Det uppstod ett problem när mappen skulle tas bort';
$txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'] = 'Misslyckades, kommer att strunta i alla undermappar (Ägaren är \'%s\' )';
$txt_admin['(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)'] = '(Var vänlig och kolla ovanstående felmeddelande. För att lösa det här problemet så kan det hända att du måste ta bort (eller ändra användarrättigheter) genom att använda FTP,eftersom det är mycket troligt att en del bilder/mappar tillhördin FTP användare.)';

// Lowres/Thumbs generation page
$txt_admin['Generating all missing thumbnails/low res pictures: (be patient)'] = 'Skapar alla tumnaglar/lågupplösta bilder som saknas: (ha tålamod)';
$txt_admin['Generating low res picture for %s'] = 'Skapar låg upplösta bilder för %s';
$txt_admin['Generating thumbnail picture for %s'] = 'Skapar tumnaglar  för %s';
$txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'] = 'Skapade <b>%s</b> lågupplösta bilder och <b>%s</b> tumnaglar.';
$txt_admin['Nothing to do.'] = 'Ingenting att göra';
$txt_admin['Your library contains <b>%s</b> pictures.'] = 'Ditt bibliotek innehåller <b>%s</b> bilder.';

$txt_admin['Batch action to execute: '] = 'Mängdaktion att utföra: ';
$txt_admin['Generate all thumbnails/lowres'] = 'Skapa alla tumnaglar/lågupplösta';
$txt_admin['Delete all thumbnails/lowres'] = 'Ta bort alla tumnaglar/lågupplösta';
$txt_admin['Delete all thumbnails'] = 'Ta bort alla tumnaglar';
$txt_admin['Error while deleting %s'] = 'Fel när det togs bort %s';
$txt_admin['Successfully deleted %s of %s files'] = 'Lyckades ta bort %s av %s filer';



// File upload page
$txt_current_dir="Nuvarande mapp :";
$txt_file_to_upload="Fil(er) att ladda upp:";
$txt_upload_file_from_user="Ladda upp fil(er) från din dator";
$txt_upload_file_from_url="Ladda upp fil(er) från en web adress";
$txt_upload_change = "Ändring av antal uppladdningsfält kommer att medföra att du måste välja om samtliga filer på nytt igen. Det rekommenderas att du avbryter. Ladda upp filerna som du har valt, och därefter kan du välja fler uppladdningsfält nästa gång. Vill du fortsätta ändå?";

// User management
$txt_add_user = 'Lägg till användare';
$txt_back_user_list = 'Tillbaka till användar\' listan';
$txt_confirm_del_user = 'Är du säker på att du vill ta bort den här användaren  ?';
$txt_user_info = 'Användar information';
$txt_login_rule = 'Välj ett användarnamn med upp till 20 tecken';
$txt_login_ie = 't ex: john';
$txt_pass_rule = 'Välj ett lösenord med upp till 35 tecken';
$txt_sec_lvl_rule = 'Välj en säkerhetsnivå mellan 1 och 999';
$txt_sec_lvl_ie = "t ex: 10";

$txt_um_login = 'Användarnamn';
$txt_um_pass = 'Lösenord';
$txt_um_sec_lvl = 'Säkerhetsnivå';
$txt_um_edit = 'Redigera';
$txt_um_del = 'Ta bort';

// Configuration Editor page
$txt_admin['Settings'] = 'Inställningar';
$txt_admin['Description'] = 'Beskrivning:';
$txt_admin['Example'] = 'Exempel:';
$txt_admin['Read-Only option'] = '<b>Bara läsrättigheter</b> - Av säkerhetsskäl så kan du bara modifiera den här inställningen genom att manuellt modifiera %s eller genom att använda install.php';
$txt_admin['Usage of install recommended'] = 'Användning av <b>%s</b> är rekommenderad för att ändra den här inställningen';
$txt_admin['on'] = 'På';
$txt_admin['off'] = 'Av';
$txt_admin['Show advanced options'] = 'Visa avancerade inställningar';
$txt_admin['Value for %s is incorrect'] = 'Värdet för %s är felaktigt';
$txt_admin['Successfully saved changes to config'] = 'Lyckades med att spara ändringarna till konfigurationen';


// Misc
$txt_admin['INSTALL/DEBUG mode is active'] = "<b>VARNING</b>: INSTALLATION/FELSÖKNINGSLÄGE är aktivt - Minska värdet på \$debug_mode i config.ini.php så fort du är färdig.";
$txt_admin['Javascript Disabled'] = "<b>VARNING</b>: Din webbläsare stödjer inte javascript, så vissa funktioner kommer att vara otillgängliga.";


/********************************************************************************
* ERROR messages
* This section is far from being complete but
*********************************************************************************/

// 2xx is related to filesystem permissions/ownership
$txt_error['00251'] = 'Den här mappen är INTE skrivbar, det kan orsaka vissa problem (dvs: att skapa tumnaglar/lågupplösta bilder)';
// 8xx is related to user management
$txt_error['00800'] = "FEL:";
$txt_error['00801'] = "Uid är inte inställt";
$txt_error['00802'] = "Uid är inte numerisk";
$txt_error['00803'] = "Användarnamn bör innehålla 1 till 20 av följande tecken: 0-9 a-z @ - _";
$txt_error['00804'] = "Användarnamn är inte inställt";
$txt_error['00805'] = "Lösenord bör innehålla från 1 till 32 av följande tecken: 0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #";
$txt_error['00806'] = "Lösenord är inte inställt";
$txt_error['00807'] = "Säkerhetsnivån ska vara ett nummer mellan 1 och 999";
$txt_error['00808'] = "Säkerhetsnivån är inte inställd";
$txt_error['00809'] = "Användarnamnet finns redan";



/********************************************************************************
* INSTALL Part
* Text only displayed during the install process
*********************************************************************************/

$txt_install['next step'] = 'Nästa steg ->';

// Step 2
$txt_install['IP address check'] = 'IP adress kontroll';
$txt_install['for security reasons, proove that it is your the admin'] = 'Av säkerhetsskäl, så måste du visa att du är administratör för den här siten.';
$txt_install['finally, reload this page'] = 'Äntligen, <a href="javascript:window.location.reload()">ladda om</a> den här sidan';
$txt_install['copy INI_FILE.sample to INI_FILE'] = 'Kopiera följande fil %s till %s';
$txt_install['located under the conf subdir of phpgraphy dir'] = 'finns under %s undermapp i din phpGraphy mapp.';
$txt_install['open INI_FILE with your favorite text editor and replace admin_ip with your ip'] = 'Öppna %s med din text-redigerare (t ex wordpad) och ersätt värdet av %s med din IP adress som är %s';
$txt_install['upload INI_FILE on your webserver under the CONF_DIR dir'] = 'Ladda upp %s på din webbserver under %s undermapp';

// Step 3
$txt_install['Directories Permissions'] = 'Mapp rättigheter';
$txt_install['test_result_passed'] = 'OK';
$txt_install['test_result_failed'] = 'MISSLYCKAT';
$txt_install['Checking that the webuser can write in the following directories :'] = 'Kollar att web-användaren kan skriva till följande mappar:';
$txt_install['you can not proceed next step'] = 'Rätta till de problem som är listade ovanför och <a href="javascript:window.location.reload()">ladda om</a> sidan';
$txt_install['Is directory %s writable ?'] = 'Är mappen %s skrivbar?';
$txt_install['Is file %s writable ?'] = 'Är filen %s skrivbar ?';
$txt_install['Directory %s used to store the sessions is not writable and sessions support has been disabled'] = 'Mappen %s <span class="annotation">(använd till att lagra sessions)</span> är inte skrivbar och session stöd har blivit avaktiverat';

// Step 4
$txt_install['Image Tools Configuration'] = 'Bildverktygs konfiguration';
$txt_install['Image Tools Configuration introduction'] = 'På den här sidan kan du välja programvara som används till att generera tumnaglar/lågupplösningsbilder, såväl som ett för att rotera dem. Installationsprocessen har automatiskt hittat de bästa valen, och om du inte vet vad du gör, var vänlig och fortsätt till nästa steg.';
$txt_install['If you know what you re doing, please use this button'] = "Om du vet vad du gör, använd den här knappen";
$txt_install['Show me the details'] = 'Visa mig detaljerna';
$txt_install['choose your thumb generator'] = 'Var snäll och välj ditt bildbehandlingsprogram: ';
$txt_install['gd not supported'] = 'GD stöd är inte kompilerat på servern';
$txt_install['gd missing JPG support'] = 'Installerad GD version har inte JPG stöd inkluderat.';
$txt_install['exec function disabled'] = 'exec() funktionen har blivit avaktiverad';
$txt_install['auto-detection failed'] = 'Den automatiska konfigurationen misslyckades';
$txt_install['you need to specify %s path'] = 'Du <b>måste</b> specifiera <b>%s</b> sökväg: ';
$txt_install['you need to specify the program path'] = 'Du <b>måste</b> specifisera sökvägen till programmet: ';
$txt_install['no thumb_generator found intro'] = 'Inget fungerande bildebehandlingsprogram hittades. Se detaljerna nedan:';
$txt_install['no thumb_generator found conclusion'] = 'Om det här är din server, så borde du kunna lösa problemen. Om inte, så har du inte något annat val, än att göra och ladda upp tumnaglar/lågupplösningsbilder själv..';
$txt_install['choose your rotate tool'] = 'Var vänlig och välj programvara för rotering av bilder: ';
$txt_install['rotate tool not available'] = 'Bild rotering är inte tillgänglig med din konfiguration för att exec() har stängts av.';
$txt_install['exif has been disabled'] = 'Exif stöd är inte tillgänglig med din PHP installation och har därför stängts av.';

// Step 5
$txt_install['Database configuration'] = 'Database konfiguration';
$txt_install['choose your database backend'] = 'Välj databas stöd som du vill använda: ';
$txt_install['mysql details title'] = 'MySQL Databas parametrar';
$txt_install['database host'] = 'Serverns värdnamn :';
$txt_install['database name'] = 'Databas namn :';
$txt_install['database user'] = 'Användare :';
$txt_install['database pass'] = 'Lösenord :';
$txt_install['tables prefix'] = 'Tabell prefix :';
$txt_install['remove invalid characters'] = '* Ta bort ogiltiga tecken';
$txt_install['mysql connection error, see errors'] = 'Kunde inte kontakta databasen, kolla felmeddelande(n) nedanför:';
$txt_install['database structure sucessfully created'] = 'Lyckades skapa databasens struktur';
$txt_install['database structure already exists'] = 'En existerande och giltig databas struktur har hittats, så du kan fortsätta till nästa steg';
$txt_install['error while creating database structure'] = 'Ett fel har uppstått när databasens struktur skapades';

// Step 6
$txt_install['Administrator account creation'] = 'Skapa konto till administratören';
$txt_install['Username'] = 'Användarnamn :';
$txt_install['Password'] = 'Lösenord :';
$txt_install['Congratulations, administrator account %s has been created'] = 'Gratulerar, administratörens användarkonto %s har skapats';
$txt_install['An error has occured while creating your administrator account'] = 'Det uppstd ett fel när ditt administratörkonto skulle skapas.';
$txt_install['please choose a login and password'] = 'Du är på väg att fullgöra installationsprocessen. Var vänlig och välj ett användarnamn och lösenord som du kommer att använda för att identifiera dig som administratör.';
$txt_install['Configuration file has been saved'] = 'Din konfigurationsfil har sparats.';
$txt_install['An error has occured while saving your configuration file'] = 'Ett fel har uppstått när din konfigurationsfil skulle sparas';
$txt_install['You can now access your phpgraphy site'] = 'Du kan nu <a href="index.php">använda din phpGraphy sida</a> !';
$txt_install['One or more problems have occured and your installation is NOT properly finished, please contact the phpGraphy DevTeam with the details of your error(s)'] = 'Ett eller flera fel uppstod och <b>din installation är INTE korrekt genomförd</b>. Var vänlig och kontakta phpGraphy DevTeamet med en detaljerad felbeskrivning.';

// Initial .welcome file
$txt_install['welcome file content'] = 'Hej




Jeg är <b>.welcome</b> filen som finns i din bildmapp (pictures) !
Du kan modifiera mitt innehåll så fort du är inloggad som administratör.

Här är en procedur för att kolla om installationen har lyckats:

1/ Logga in som administratör
2/ Pröva att skapa en mapp
3/ Pröva att ladda upp en fil (antingen via web användargränssnittet eller med hjälp av en FTP-klient)
4/ Kolla om tumnageln blir korrekt skapad

Så fort punkterna ovanför fungerar, så kan du ta bort det här och skriva in vad du vill.

<div style="border: solid 1px; width: 50%; padding: 5px;"><u>Tips:</u>
Här är ett exempel på HTML användning, du kan skapa länkar för att se <a href="?toprated=1">högst betygsatta bilder</a> eller inkludera bilder genom att använda <img> länkar.
</div>

Tack för att du valde phpGraphy. Jag hoppas att du har stor glädje av att använda programmet
Om du hittar ett fel / bug eller har förslag till nya funktioner, så var vänlig ta kontakt med mig.
(See <a href="http://phpgraphy.sourceforge.net">phpGraphy hemsida</a> för kontakt information)

						JiM / aEGIS.
';


?>
