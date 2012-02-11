<?php

/*
*  Copyright (C) 2004-2005 JiM / aEGIS (jim@aegis-corp.org)
*  Copyright (C) 2004-2007 phpGraphy DevTeam 
*  Copyright (C) 2000-2001 Christophe Thibault
*  Copyright translation (C) 2006-2007 Floris Lambrechts
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
*  $Id: lang_nl.inc.php 425 2007-12-27 16:50:34Z jim $
*
*/

/* phpGraphy language file
*
* Gelieve enkel te wijzigen volgens de richtlijnen van de documentatie.
* 
* 
* 
*
* 
* 
* 
* 
* 
*/

$language_file_info = array(
    'language_name_english' => 'Dutch',
    'language_name_native'  => 'Nederlands',
    'country_code'          => 'nl',
    'charset'               => 'iso-8859-1',
    'direction'             => 'ltr',
    'for_version'           => '0.9.13',
    'translator_name'       => 'Floris Lambrechts',
    'translator_email'      => 'florisla _on_ gmail [dot] com'
    );

// Title of your website
$txt_site_title="mijn phpGraphy site";

// txt_root_dir: text that specify the root of your gallery
$txt_root_dir="start";

// the following variables defines the text used for navigating the gallery
// you can change them to fit your needs and also use images (http://tofz.org/ style)
// e.g: $txt_previous_page='<img src="/gfx/my_previous_image_button.gif">';


// Picture/Thumbs viewing/naviguation
$txt_files='bestanden';
$txt_dirs='mappen';
$txt_last_commented="meest recente commentaar";
$txt_top_rated="best beoordeeld";
$txt_last_added="laatst toegevoegd";
$txt_last_added_per_directory="laatst toegevoegd per map";

// Rating (if activated)
$txt_no_rating="";
$txt_thumb_rating="beoordeling :";
$txt_pic_rating="<br />Gemiddelde beoordeling : ";
$txt['%.1f with %s votes'] = '<b>%.1f</b> met %s stemmen';
$txt_option_rating="Beoordeel deze afbeelding";
$txt['Best rating'] = 'Beste beoordeling';
$txt['Worst rating'] = 'Slechtste beoordeling';
$txt['Rate !'] = 'Beoordeel!';

$txt_back_dir='^Omhoog^';
$txt_previous_image='&lt;- Vorige';
$txt_next_image='Volgende -&gt;';
$txt_hires_image=' +Hoge resolutie+ ';
$txt_lores_image=' -Lage resolutie- ';

$txt_previous_page='&lt;- Vorige pagina -| ';
$txt_next_page=' |- Volgende pagina -&gt; ';

$txt_x_comments="commentaar";

$txt_comments="Commentaar: ";
$txt_add_comment="Voeg commentaar toe";
$txt_comment_from="Van: ";
$txt_comment_on=" op ";
$txt['*filtered*'] = '*gefilterd*';

// Last commented pictures page
$txt_last_commented_title= "%s laats beoordeelde afbeeldingen :";
$txt_comment_by="door";

// Top rated pictures page
$txt_top_rated_title="%s best beoordeelde afbeeldingen:";

// Last added pictures/directories page
$txt['Last %s added pictures :'] = '%s meest recent toegevoegde afbeeldingen: ';
$txt['Last %s added pictures per directory :'] = '%s meest recent toegevoegde afbeeldingen per map: ';

// Top Right Menu (stuff displayed when in admin mode are under the admin section)
$txt_login="inloggen";
$txt_logout="uitloggen";
$txt_random_pic="willekeurige afbeelding";


// Login page
$txt['authenticate yourself'] = 'Authentificeer uzelf';
$txt_login_form_login="login:";
$txt_login_form_pass="wachtwoord:";


// Add comment page
$txt_comment_form_name="Uw naam:";
$txt_remember_me="(Onthoud mij)";
$txt_comment_form_comment="Uw commentaar:";

// Generic stuff (used in several places)
$txt_go_back = "Keer terug";
$txt_form_submit = "Verzend";
$txt_ok = "OK";
$txt_failed = "MISLUKT";
$txt_ie = 'ie: ';
$txt['NOTE: '] = 'NOOT: ';
$txt['HTML and line breaks supported'] = 'HTML inhoud en regelovergangen zijn toegestaan';
$txt['HTML tags will display in your post as text'] = 'HTML tags zullen verschijnen als tekst';
$txt['Get Help'] = 'Help';
$txt['Save as'] = 'Opslaan als...';

// metadata section (EXIF/IPTC)

/* $txt_[exif|iptc]_custom: You can customize the way informations are displayed,
* all keywords are between '%' for a reference of all supported keywords,
* See Documentation for the complete list of available keywords
*/
$txt_exif_custom="%Exif.Make% %Exif.Model%<br />%Exif.ExposureTime%s f/%Exif.FNumber% op %Exif.FocalLength%mm (35mm equiv: %Exif.FocalLengthIn35mmFilm%mm) iso %Exif.ISO% %Exif.Flash%";
$txt_exif_missing_value="??";	// If EXIF requested field is not found, display this instead
$txt_exif_flash="met flits"; // Test to display if flash was fired

$txt_iptc_custom="%Iptc.City% door %Iptc.ByLine%";
$txt_iptc_missing_value="";	// If IPTC requested field not found, display that instead

$txt['Found_IPTC_metadata'] = 'IPTC metadata gevonden';
$txt['No_IPTC_metadata_found'] = 'Geen IPTC metadata gevonden';

$txt_show_me_more="Toon meer";

// SLIDESHOW
$txt['slideshow'] = 'diashow';
$txt['Slideshow previous'] = '&larr; Vorige';
$txt['Slideshow next'] = 'Volgende &rarr;';
$txt['Slideshow play'] = 'Start';
$txt['Slideshow pause'] = 'Pause';
$txt['Slideshow close'] = 'Stop';
$txt['Slideshow delay'] = 'Vertraging';
$txt['Slideshow %s sec'] = '%s sec.';
$txt['Slideshow slower'] = '+';
$txt['Slideshow faster'] = '-';
$txt['Slideshow hide captions'] = 'verberg beschrijving'; 
$txt['Slideshow show captions'] = 'toon beschrijving'; 

/********************************************************************************
* ADMIN Section
* Text only displayed once you're loggued in as an admin
* So if you, the admin, speak english, you probably won't need to translate this
*********************************************************************************/

// Top right menu (admin text)
$txt_admin['admin'] = 'beheer';
$txt_admin['Admin menu'] = 'Beheer Menu';
$txt_admin['Create a new directory'] = "Maak een nieuwe Map";
$txt_admin['Upload pictures/files'] = "Upload Afbeeldingen";
$txt_admin['Batch Processing'] = 'Bulk verwerking';
$txt_admin['phpGraphy Settings'] = 'phpGraphy Instellingen';
$txt_admin['Manage Users'] = 'Beheer Gebruikers';
$txt_admin['View logfile'] = 'Bekijk Logfiles';

// Picture/Thumbs viewing/navigation
$txt_admin['picture settings'] = 'Afbeelding Instellingen';
$txt_admin['directory settings'] = 'Map Instellingen';
$txt_admin['title:'] = 'Titel: ';
$txt_admin['security level:'] = 'Beveiligingsniveau: ';
$txt_admin['inherited:'] = ' Overgeërfd: ';
$txt_admin['cover picture:'] = 'Hoofdafbeelding: ';
$txt['select as cover picture'] = 'Selecteer als hoofdafbeelding voor de huidige map';
$txt['change/remove'] = 'Wijzig/Verwijder';
$txt['select one'] = 'Selecteer...';
$txt['remove current'] = 'Verwijder huidige';
$txt_delete_photo="Verwijder afbeelding";
$txt_delete_photo_thumb="Vernieuw postzegel";
$txt_delete_directory_text="Verwijder map";
$txt_edit_welcome="Bewerk .welcome";
$txt_del_comment="Verwijder";

// Confirmation box
$txt_ask_confirm="Bent u zeker?";
$txt_delete_confirm="Ben u zeker van het verwijderen?";

// Image rotation (if available with your config)
$txt['Rotate'] = 'Draaien';
$txt['Rotate 90'] = 'Draai 90°';
$txt['Rotate 180'] = 'Draai 180°';
$txt['Rotate 270'] = 'Draai 270°';


// Editing the .welcome page
$txt_editing="Bewerken";
$txt_in_directory="in map";
$txt_save="Opslaan";
$txt_cancel="Annuleren";
$txt_clear_all="Alles wissen";


// Directory creation page
$txt_admin['Create a Directory'] = 'Maak een Map aan';
$txt_admin['Current Directory:'] = 'Huidige Map: ';
$txt_dir_to_create="Aan te maken map:";

// Directory deletion
$txt_admin['Deleting %s'] = 'Aan het verwijderen: %s';
$txt_admin['Directory deleted successfully'] = 'Map succesvol verwijderd';
$txt_admin['Problem while deleting this directory'] = 'Probleem bij het verdijderen van de map';
$txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'] = 'Mislukt, submappen worden overgeslagen (Eigenaar is \'%s\' )';
$txt_admin['(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)'] = '(Gelieve de boodschappen hierboven te bekijken. Om het probleem op te lossen moet u misschien zelf bestanden verwijderen (of permissies veranderen) via FTP toegang. Hoogstwaarschijnlijk heeft uw FTP account wel voldoende rechten hiervoor.)';

// Lowres/Thumbs generation page
$txt_admin['Generating all missing thumbnails/low res pictures: (be patient)'] = 'Ontbrekende postzegels / lage resolutie afbeeldingen aan het genereren: (even geduld aub)';
$txt_admin['Generating low res picture for %s'] = 'Lage resolutie afbeelding aan het maken voor %s';
$txt_admin['Generating thumbnail picture for %s'] = 'Postzegel aan het maken voor %s';
$txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'] = '<b>%s</b> lage resolutie afbeeldingen en <b>%s</b> postzegels aangemaakt.';
$txt_admin['Nothing to do.'] = 'Er is niks te doen.';
$txt_admin['Your library contains <b>%s</b> pictures.'] = 'Uw bibliotheek bevat <b>%s</b> afbeeldingen.';

$txt_admin['Batch action to execute: '] = 'Bulk verwerking om uit te voeren: ';
$txt_admin['Generate all thumbnails/lowres'] = 'Genereer alle postzegels / lage resolutie afbeeldingen';
$txt_admin['Delete all thumbnails/lowres'] = 'Verwijder alle postzegels / lage resolutie afbeeldingen';
$txt_admin['Delete all thumbnails'] = 'Verwijder alle postzegels';
$txt_admin['Error while deleting %s'] = 'Fout bij verwijderen %s';
$txt_admin['Successfully deleted %s of %s files'] = '%s van %s bestanden succesvol verwijderd';



// File upload page
$txt_current_dir="Huidige map:";
$txt_file_to_upload="Bestanden om te uploaden: ";
$txt_upload_file_from_user="Bestanden uploaden vanaf uw computer";
$txt_upload_file_from_url="Upload een bestand van een URL";
$txt_upload_change = "Na een wijziging van het aantal, zult u alle reeds geselecteerde bestanden opnieuw moeten selecteren. U wordt aangeraden om niet te annuleren, door te gaan met het uploaden en volgende keer te beginnen met een groter aantal.  Wilt u nog steeds doorgaan?";

// User management
$txt_add_user = 'Gebruiker toevoegen';
$txt_back_user_list = 'Terug naar de gebruikerslijst';
$txt_confirm_del_user = 'Ben u zeker dat u deze gebruiker wilt verwijderen?';
$txt_user_info = 'Gebruikers informatie';
$txt_login_rule = 'Geef een gebruikersnaam van maximaal 20 tekens';
$txt_login_ie = 'bvb: jan';
$txt_pass_rule = 'Geef een wachtwoord van maximaal 32 tekens';
$txt_sec_lvl_rule = 'Geef een beveiligingsniveau tussen 1 en 999';
$txt_sec_lvl_ie = "bvb: 10";
$txt_admin['Password is encrypted and can not be recovered'] = '<b>OPGELET:</b> Het wachtwoord is verleuteld en kan niet meer terug worden opgevraagd.  Hieronder kun je evenwel wel een nieuw wachtwoord ingeven.';

$txt_um_login = 'Gebruikersnaam';
$txt_um_pass = 'Wachtwoord';
$txt_um_sec_lvl = 'Beveiligingsniveau';
$txt_um_edit = 'Bewerk';
$txt_um_del = 'Verwijder';

// Configuration Editor page
$txt_admin['Settings'] = 'Instellingen';
$txt_admin['Description'] = 'Beschrijving:';
$txt_admin['Example'] = 'Voorbeeld:';
$txt_admin['Read-Only option'] = '<b>Read Only</b> - Om beveiligingsredenen kunt u deze optie enkel wijzigen via install.php of door het manueel bewerken van %s.';
$txt_admin['Usage of install recommended'] = 'U wordt aangeraden om <b>%s</b> te gebruiken om deze instelling te wijzigen';
$txt_admin['on'] = 'aan';
$txt_admin['off'] = 'uit';
$txt_admin['Show advanced options'] = 'Toon geavanceerde opties';
$txt_admin['Value for %s is incorrect'] = 'De waarde voor %s is niet correct';
$txt_admin['Successfully saved changes to config'] = 'De gewijzigde instellingen zijn succesvol opgeslagen';


// Misc
$txt_admin['INSTALL/DEBUG mode is active'] = "<b>WAARSCHUWING</b>: INSTALL/DEBUG mode is geactiveerd - Verlaag de waarde van \$debug_mode in config.ini.php zodra je klaar bent.";
$txt_admin['Javascript Disabled'] = "<b>WAARSCHUWING</b>: Uw browser ondersteunt geen Javascript en u zult daarom niet alle functies kunnen gebruiken.";


/********************************************************************************
* ERROR messages
* This section is far from being complete but 
*********************************************************************************/

// Unknow error
$txt_error['00000'] = 'Er is een onbekende fout is opgetreden, gelieve deze te <a href="%s" target="_blank">melden aan het DevTeam</a> tesamen met de context waarin hij optrad.';

// 1xx - Installation related

// 2xx - Filesystem permissions/ownership related
$txt_error['00201'] = "Waarschuwing: 'use_direct_urls' is actief en u heeft nog steeds een .htaccess bestand in uw 'pictures' map. Waarschijnlijk zult u problemen ondervinden om afbeeldingen weer te geven.";
$txt_error['00251'] = 'Dit bestand/map is NIET schrijfbaar; dit kan verschillende problemen veroorzaken (voor het genereren van de postzegels/lage resolutie afbeeldingen)';

// 3xx - PHP settings related
$txt_error['00301'] = "Waarschuwing, deze pagina kan een timeout geven omdat de max_execution_time waarde te laag is (%s seconds) -- phpGraphy kon dit niet aanpassen";
$txt_error['00303'] = "exec() is uitgeschakeld op uw PHP installatie";

// 4xx - File upload related
$txt_error['00401'] = "Upload van %s is mislukt, een bestand met deze naam bestaat reeds -- u moet dit bestand verwijderen alvorens verder te gaan.";

// 5xx - Misc
$txt_error['00501'] = "'topratings' is hernoemd naar 'toprated', gelieve uw links overeenkomstig aan te passen.";

// 8xx is related to user management
$txt_error['00800'] = "FOUT:";
$txt_error['00801'] = "Uid is niet gezet";
$txt_error['00802'] = "Uid is niet numeriek";
$txt_error['00803'] = "Gebruikernaam moet 1 tot 20 van de volgende tekens bevatten: 0-9 a-z @ - _";
$txt_error['00804'] = "Gebruikernaam is niet gezet";
$txt_error['00805'] = "Paswoord moet 1 tot 32 van de volgende tekens bevatten: 0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #";
$txt_error['00806'] = "Paswoord is niet gezet";
$txt_error['00807'] = "Beveiligingsniveau moet een getal zijn tussen 1 en 999";
$txt_error['00808'] = "Beveiligingsniveau is niet gezet";
$txt_error['00809'] = "Gebruikernaam bestaat reeds";



/********************************************************************************
* INSTALL Part
* Text only displayed during the install process
*********************************************************************************/

$txt_install['next step'] = 'Volgende Stap ->';

// Step 2
$txt_install['IP address check'] = 'IP-adres controle';
$txt_install['for security reasons, proove that it is your the admin'] = 'Omwille van de veiligheid, moet je bewijzen dat jij de beheerder bent van deze site.';
$txt_install['finally, reload this page'] = 'Tenslotte, <a href="javascript:window.location.reload()">herlaad</a> deze pagina';
$txt_install['copy INI_FILE.sample to INI_FILE'] = 'Kopieer het bestand %s naar %s';
$txt_install['located under the conf subdir of phpgraphy dir'] = 'onder de %s sub-map of jouw phpGraphy map';
$txt_install['open INI_FILE with your favorite text editor and replace admin_ip with your ip'] = 'Open %s in je favoriete tekst-editor en vervang de waarde van %s door jouw ip adres, zijnde %s';
$txt_install['upload INI_FILE on your webserver under the CONF_DIR dir'] = 'Upload %s naar je webserver onder de submap %s';

// Step 3
$txt_install['Directories Permissions'] = 'Map Toegansrechten';
$txt_install['test_result_passed'] = 'OK';
$txt_install['test_result_failed'] = 'MISLUKT';
$txt_install['Checking that the webuser can write in the following directories :'] = 'Controleren of de web gebruiker kan schrijven in de volgende mappen:';
$txt_install['you can not proceed next step'] = 'Los de bovenstaande problemen op en <a href="javascript:window.location.reload()">herlaad</a> deze pagina';
$txt_install['Is directory %s writable ?'] = 'Is de map %s beschrijfbaar?';
$txt_install['Is file %s writable ?'] = 'Is bestand %s beschrijfbaar?';
$txt_install['Directory %s used to store the sessions is not writable and sessions support has been disabled'] = 'De map %s <span class="annotation">(gebruikt om sessies op te slaan)</span> is niet beschrijfbaar en ondersteuning voor sessies is uitgeschakeld';

// Step 4
$txt_install['Image Tools Configuration'] = 'Afbeelding-hulpmiddelen Configuratie';
$txt_install['Image Tools Configuration introduction'] = 'Op deze pagina kunt u de software selecteren waarme postzegels en lage resolutie afbeeldingen gemaakt worden, en waarmee afbeeldingen gedraaid worden. De installatie heeft automatisch de beste keuzes gedetecteerd, en u wordt dan ook aangeraden om gewoon over te gaan naar de volgende stap.';
$txt_install['If you know what you re doing, please use this button'] = "Als u zeker bent van wat u doet, gebruik deze knop";
$txt_install['Show me the details'] = 'Toon me de details';
$txt_install['choose your thumb generator'] = 'Gelieve uw beeldbewerkingssoftware te selecteren:';
$txt_install['gd not supported'] = 'Ondersteuning voor GD is niet mee ingecompileerd';
$txt_install['gd missing JPG support'] = 'De geïnstalleerde versie van GD heeft geen JPG ondersteuning ingecompileerd';
$txt_install['exec function disabled'] = 'exec() functie is uitgeschakeld';
$txt_install['auto-detection failed'] = 'Auto-detectie faalde';
$txt_install['you need to specify %s path'] = 'U <b>moet</b> het pad van <b>%s</b> opgeven: ';
$txt_install['you need to specify the program path'] = 'U <b>moet</b> het programma pad opgeven: ';
$txt_install['no thumb_generator found intro'] = 'Er is geen werkende beeldbewerkingssoftware gevonden; zie details hieronder.';
$txt_install['no thumb_generator found conclusion'] = 'Indien dit uw server is, zou u in staat moeten zijn om de problemen op te lossen. Indien niet, dan zult u de lage resolutie afbeeldingen zelf moeten uploaden.';
$txt_install['choose your rotate tool'] = 'Gelieve uw software voor het draaien van afbeeldingen te selecteren: ';
$txt_install['rotate tool not available'] = 'Afbeeldingen draaien is niet mogelijk in uw configuratie omdat exec() uitgeschakeld is.';
$txt_install['exif has been disabled'] = 'Exif ondersteuning is niet beschikbaar in uw PHP installatie en is uitgeschakeld';

// Step 5
$txt_install['Database configuration'] = 'Databank configuratie';
$txt_install['choose your database backend'] = 'Kies het databank systeem dat u wilt gebruiken: ';
$txt_install['mysql details title'] = 'MySQL Databank parameters';
$txt_install['database host'] = 'Server hostname :';
$txt_install['database name'] = 'Databank naam :';
$txt_install['database user'] = 'Gebruikersnaam :';
$txt_install['database pass'] = 'Wachtwoord :';
$txt_install['tables prefix'] = 'Tabellen prefix :';
$txt_install['remove invalid characters'] = '* Verwijder ongeldige teken(s)';
$txt_install['mysql connection error, see errors'] = 'Kon geen verbinding maken met databank, zie onderstaande fout(en):';
$txt_install['database structure sucessfully created'] = 'Databank structuur succesvol aangemaakt';
$txt_install['database structure already exists'] = 'Een bestaande, geldige databank structuur is aangetroffen. U kunt verder gaan naar de volgende stap.';
$txt_install['error while creating database structure'] = 'Er is een fout opgetreden bij het aanmaken van de databank structuur';

// Step 6
$txt_install['Administrator account creation'] = 'Beheerder Account maken';
$txt_install['Username'] = 'Gebruikersnaam :';
$txt_install['Password'] = 'Wachtwoord :';
$txt_install['Congratulations, administrator account %s has been created'] = 'Proficiat, beheerders account %s is aangemaakt';
$txt_install['An error has occured while creating your administrator account'] = 'Er is een fout opgetreden bij het maken van uw beheerders account.';
$txt_install['please choose a login and password'] = 'Het installatieproces is bijna voltooid; gelieve een gebruikersnaam en wachtwoord te kiezen waarmee u zichzelf zal authenticeren als beheerder.';
$txt_install['Configuration file has been saved'] = 'Uw configuratie is opgeslagen.';
$txt_install['An error has occured while saving your configuration file'] = 'Er is een fout opgetreden bij het opslaan van uw configuratiebestand.';
$txt_install['You can now access your phpgraphy site'] = 'U kunt nu uw <a href="index.php">phpGraphy site bezoeken</a>!';
$txt_install['One or more problems have occured and your installation is NOT properly finished, please contact the phpGraphy DevTeam with the details of your error(s)'] = 'Er zijn problemen opgetreden en <b>uw installatie in NIET geslaagd</b>, gelieve het phpGraphy DevTeam te contacteren met zoveel mogelijk informatie over de fout(en).';

// Initial .welcome file
$txt_install['welcome file content'] = 'Hallo

Ik ben het <b>.welcome</b> bestand in uw pictures map!
U kunt mijn inhoud online aanpassen als u inlogt als beheerder.

Hier is een eenvoudige installatie procedure:

1/ Log in als beheerder
2/ Probeer een map te maken
3/ Probeer een afbeelding te uploaden (via de web interface of via uw FTP programma)
4/ Kijk na of de postzegel correct aangemaakt werd

Eens dit alles naar wens werkt, verandert u mij en zet u hier tekst naar uw keuze in de plaats.

<div style="border: solid 1px; width: 50%; padding: 5px;"><u>Tip:</u>
Hier is een voorbeeld van het gebruik van HTML, u kunt ook hyperlinks toevoegen zoals bijvoorbeeld naar <a href="?toprated=1">de best beoordeelde afbeeldingen</a> of andere afbeeldingen tonen via HTML img elementen.
</div>

Bedankt om te kiezen voor phpGraphy, ik hoop dat deze software u bevalt.
Als u een bug ontdekt, of een goed idee hebt voor nieuwe mogelijkheden, neem dan contact met ons op.
(Zie de <a href="http://phpgraphy.sourceforge.net">phpGraphy website</a> voor contactgegevens)

						JiM / aEGIS.
';


?>
