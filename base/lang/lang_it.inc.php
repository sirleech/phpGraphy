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
*  $Id: lang_it.inc.php 406 2007-02-02 00:08:45Z jim $
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
    'language_name_english' => 'Italiano',
    'language_name_native'  => 'Italiano',
    'country_code'          => 'it',
    'charset'               => 'iso-8859-15',
    'direction'             => 'ltr',
    'for_version'           => '0.9.12',
    'translator_name'       => 'croko',
    'translator_email'      => 'croko [at] baslug [dot] org'
    );

// Title of your website
$txt_site_title="il mio sito con phpGraphy";

// txt_root_dir: text that specify the root of your gallery
$txt_root_dir="root";

// the following variables defines the text used for navigating the gallery
// you can change them to fit your needs and also use images (http://tofz.org/ style)
// e.g: $txt_previous_page='<img src="/gfx/my_previous_image_button.gif">';


// Picture/Thumbs viewing/navigation
$txt_files='file';
$txt_dirs='cartella/e';
$txt_last_commented="ultime foto commentate";

// Rating (if activated)
$txt_no_rating="SV";
$txt_thumb_rating="voto :";
$txt_pic_rating="Voto : ";
$txt_option_rating="Vota questa foto";
$txt['%.1f with %s votes'] = '<b>%.1f</b> con %s voto/i';
$txt['Best rating'] = 'Voto migliore';
$txt['Worst rating'] = 'Voto peggiore';
$txt['Rate !'] = 'Vota !';

$txt_back_dir='^Su^';
$txt_previous_image='&lt;- Precedente';
$txt_next_image='Successivo -&gt;';
$txt_hires_image=' +Alta ris+ ';
$txt_lores_image=' -Bassa ris- ';

$txt_previous_page='&lt;- Pagina precedente -| ';
$txt_next_page=' |- Pagina successiva -&gt; ';

$txt_x_comments="commento/i";

$txt_comments="Commenti :";
$txt_add_comment="Lascia un commento";
$txt_comment_from="Da: ";
$txt_comment_on=" il ";
$txt['*filtered*'] = '*censurato*';

// Last commented pictures page
$txt_last_commented_title="Ultime %s foto commentate :";
$txt_comment_by="da";

// Pagina foto più votate
$txt_top_rated_title="%s più votate :";

// Pagina ultime foto/cartelle aggiunte
$txt['Last %s added pictures :'] = 'Ultime %s foto aggiunte :';
$txt['Last %s added pictures per directory :'] = 'Ultime %s foto aggiunte per cartella :';

// Menù in alto a destra (compare quando si è nella modalità amministratore sotto la sezione amministratore)
$txt_login="accedi";
$txt_logout="esci";
$txt_random_pic="foto casuale";


// Pagina di registrazione
$txt['authenticate yourself'] = 'Autenticati';
$txt_login_form_login="utente:";
$txt_login_form_pass="pass:";


// Pagina per lasciare i commenti
$txt_comment_form_name="Tuo nome:";
$txt_remember_me="(Ricordami)";
$txt_comment_form_comment="Tuo commento:";

// Messaggi generici (usate in molte parti)
$txt_go_back = "Vai indietro";
$txt_form_submit = "Invia";
$txt_ok = "OK";
$txt_failed = "FALLITO";
$txt_ie = 'es: ';
$txt['NOTE: '] = 'NOTA: ';
$txt['HTML and line breaks supported'] = 'Il codice HTML e le interruzioni di riga sono supportati';
$txt['HTML tags will display in your post as text'] = 'I tag HTML verranno mostrati nel tuo messaggio come testo';


// sezione metadata (EXIF/IPTC)

/* $txt_[exif|iptc]_custom: Puoi personalizzare il modo in cui vengono mostrate le informazioni,
* tutte le parole chiavi sono comprese fra '%' . Per un riferimento a tutte quelle supportate,
* vedi la Documentazione per la lista completa di quelle disponibili
*/
$txt_exif_custom="%Exif.Make% %Exif.Model%<br />%Exif.ExposureTime%s f/%Exif.FNumber% at %Exif.FocalLength%mm (35mm equiv: %Exif.FocalLengthIn35mmFilm%mm) iso %Exif.ISO% %Exif.Flash%";
$txt_exif_missing_value="??";	// Se il campo EXIF richiesto non venisse trovato, verrà visualizzato questo invece
$txt_exif_flash="with flash"; // Testo da visualizzare se il flash è acceso

$txt_iptc_custom="%Iptc.City% by %Iptc.ByLine%";
$txt_iptc_missing_value="";	// Se il campo IPTC richiesto non fosse trovato, verrà visualizzato questo invece

$txt['Found_IPTC_metadata'] = 'Trovato IPTC metadata';
$txt['No_IPTC_metadata_found'] = 'Nessun IPTC metadata trovato';

$txt_show_me_more="Mostrami di più";

// PRESENTAZIONE
$txt['slideshow'] = 'presentazione';
$txt['Slideshow previous'] = '&larr; Precedente';
$txt['Slideshow next'] = 'Successiva &rarr;';
$txt['Slideshow play'] = 'Play';
$txt['Slideshow pause'] = 'Pausa';
$txt['Slideshow close'] = 'Chiudi';
$txt['Slideshow delay'] = 'Ritardo';
$txt['Slideshow %s sec'] = '%s sec.';
$txt['Slideshow slower'] = '+';
$txt['Slideshow faster'] = '-';

/********************************************************************************
* Sezione AMMINISTRATORE
* Testo visualizzato quando sei registrato come amministratore
* Se tu, l'amministratore, parli inglese, probabilmente non vorrai tradurre questo
*********************************************************************************/

// Menù in alto a destra (testo amministratore admin)
$txt_admin['admin'] = 'amministratore';
$txt_admin['Admin menu'] = 'Menù amministratore';
$txt_admin['Create a new directory'] = "Crea nuova cartella";
$txt_admin['Upload pictures/files'] = "Carica foto/file";
$txt_admin['Batch Processing'] = 'Coda Processi'; 
$txt_admin['phpGraphy Settings'] = 'impostazioni phpGraphy';
$txt_admin['Manage Users'] = 'Gestione Utenti';
$txt_admin['View logfile'] = 'Guarda i logfile';

// Picture/Thumbs viewing/navigation
$txt_admin['picture settings'] = 'Impostazioni Foto';
$txt_admin['directory settings'] = 'Impostazioni Cartelle';
$txt_admin['title:'] = 'Titolo: ';
$txt_admin['security level:'] = 'livello di sicurezza: ';
$txt_admin['inherited:'] = ' Precedente: ';
$txt_admin['cover picture:'] = 'Foto copertina: ';
$txt['select as cover picture'] = 'Scegli una Foto come Copertina per la cartella corrente';
$txt['change/remove'] = 'Cambia/Rimuovi';
$txt['select one'] = 'Scegli una...';
$txt['remove current'] = 'Elimina corrente';
$txt_delete_photo="Elimina foto";
$txt_delete_photo_thumb="Rigenera anteprima";
$txt_delete_directory_text="Elimina cartella";
$txt_edit_welcome="Modifica .welcome";
$txt_del_comment="Elimina";

// Box di conferma
$txt_ask_confirm="Sei sicuro ?";
$txt_delete_confirm="Sei sicuro di volerla eliminare ?";

// Rotazione foto (se disponibile con la tua configurazione)
$txt['Rotate'] = 'Ruota';
$txt['Rotate 90'] = 'Ruota di 90°';
$txt['Rotate 180'] = 'Ruota di 180°';
$txt['Rotate 270'] = 'Ruota di 270°';


// Edita la pagina .welcom
$txt_editing="Modifica";
$txt_in_directory="nella cartella";
$txt_save="Salva";
$txt_cancel="Cancella";
$txt_clear_all="Pulisci tutto";


// Pagina creazione cartelle
$txt_admin['Create a Directory'] = 'Crea una Cartella';
$txt_admin['Current Directory:'] = 'Cartella Corrente: ';
$txt_dir_to_create="Cartella da creare:";

// Cancellazione cartelle
$txt_admin['Deleting %s'] = 'Stai eliminando %s';
$txt_admin['Directory deleted successfully'] = 'Cartella eliminata con successo';
$txt_admin['Problem while deleting this directory'] = 'È sorto un problema durante l\' eliminazione di questa cartella';
$txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'] = 'Failed, verranno saltate tutte le sotto cartelle (Il propietario è \'%s\' )';
$txt_admin['(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)'] = '(Per piacere controlla il messaggio di errore sottostante, per risolvere questo problema dovresti eliminare (o cambiare i permessi) usando il tuo accesso FTP in modo che le foto/cartelle appartengano al tuo utente FTP.)';

// Lowres/Thumbs generation page
$txt_admin['Generating all missing thumbnails/low res pictures: (be patient)'] = 'Sto generando tutte le anteprime/miniature: (abbi pazienza)';
$txt_admin['Generating low res picture for %s'] = 'Ho generato foto a bassa risoluzione per %s';
$txt_admin['Generating thumbnail picture for %s'] = 'Ho generato le anteprime delle foto per %s';
$txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'] = 'Ho generato <b>%s</b> miniature e <b>%s</b> anteprime.';
$txt_admin['Nothing to do.'] = 'Non c\'è neinte da fare.';
$txt_admin['Your library contains <b>%s</b> pictures.'] = 'La tua raccolta contiene <b>%s</b> foto.';

$txt_admin['Batch action to execute: '] = 'Coda azioni da eseguire: ';
$txt_admin['Generate all thumbnails/lowres'] = 'Genera tutte le anteprime/miniature';
$txt_admin['Delete all thumbnails/lowres'] = 'Cancella tutte le anteprime/miniature';
$txt_admin['Delete all thumbnails'] = 'Cancella tutte le anteprime';
$txt_admin['Error while deleting %s'] = 'Errore durante l\'eliminazione %s';
$txt_admin['Successfully deleted %s of %s files'] = 'Eliminati con successo %s di %s file';



// Pagina caricamento file
$txt_current_dir="Cartella corrente :";
$txt_file_to_upload="File da caricare:";
$txt_upload_file_from_user="Carica file dal tuo computer";
$txt_upload_file_from_url="Carica file da un URL";
$txt_upload_change = "Cambiando il numero dei campi di caricamento dovrai riselezionare tutti i file che avevi selezionato in precedenza. È raccomandato eliminare, carica i file attuali a seleziona un numero maggiore la prossima volta. Vuoi ancora continuare ?";

// Gestione utenti
$txt_add_user = 'Aggiungi un utente';
$txt_back_user_list = 'Torna alla lista utenti';
$txt_confirm_del_user = 'Sei sicuro di voler eliminare questo utente ?';
$txt_user_info = 'Informazioni utente';
$txt_login_rule = 'Specifica un login di massimo 20 caratteri';
$txt_login_ie = 'es: john';
$txt_pass_rule = 'Specifica una password di massimo 32 caratteri';
$txt_sec_lvl_rule = 'Specifica un livello di sicurezza fra 1 e 999';
$txt_sec_lvl_ie = "es: 10";

$txt_um_login = 'Login';
$txt_um_pass = 'Password';
$txt_um_sec_lvl = 'Livello di sicurezza';
$txt_um_edit = 'Modifica';
$txt_um_del = 'Elimina';

// Pagina editor della configurazione
$txt_admin['Settings'] = 'Impostazioni';
$txt_admin['Description'] = 'Descrizione:';
$txt_admin['Example'] = 'Esempio:';
$txt_admin['Read-Only option'] = '<b>Sola lettura</b> - Per ragioni di sicurezza, puoi solo modificare questa opzione manualmente andando a modificare %s o utilizzando install.php.';
$txt_admin['Usage of install recommended'] = 'È raccomandato l\'uso di <b>%s</b> per cambiare questa impostazione';
$txt_admin['on'] = 'on';
$txt_admin['off'] = 'off';
$txt_admin['Show advanced options'] = 'Mostra le impostazione avanzate';
$txt_admin['Value for %s is incorrect'] = 'Il valore per %s è scorretto';
$txt_admin['Successfully saved changes to config'] = 'Cambiamenti alla configurazione salvati con successo';


// Misc
$txt_admin['INSTALL/DEBUG mode is active'] = "<b>ATTENZIONE</b>: Modalità INSTALL/DEBUG attiva - Abbassa il valore di \$debug_mode in config.ini.php e avrai fatto.";
$txt_admin['Javascript Disabled'] = "<b>ATTENZIONE</b>: Il tuo browser non supporta Javascript e potresti non accedere ad alcune funzioni";


/********************************************************************************
* Messaggi di ERRORE
* Questa sezione è lontanta dall'essere completata
*********************************************************************************/

// 2xx is related to filesystem permissions/ownership
$txt_error['00251'] = 'Questa cartella NON è scrivibile, questo potrebbe causare vari problemi (es: per generare le anteprime/miniature delle foto)';

// 8xx is related to user management
$txt_error['00800'] = "ERRORE:";
$txt_error['00801'] = "Uid non impostato";
$txt_error['00802'] = "Uid non numerico";
$txt_error['00803'] = "Il Login può contenere da 1 a 20 di questi caratteri 0-9 a-z @ - _";
$txt_error['00804'] = "Login non impostato";
$txt_error['00805'] = "La Password può contenere da 1 a 32 di questi caratteri 0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #";
$txt_error['00806'] = "Password non impostata";
$txt_error['00807'] = "Il Livello di sicurezza può contenere un numero da 1 a 999";
$txt_error['00808'] = "Livello di sicurezza non impostato";
$txt_error['00809'] = "Login già esistente";



/********************************************************************************
* INSTALL Part
* Text only displayed during the install process
*********************************************************************************/

$txt_install['next step'] = 'Passo Successivo ->';

// Step 2
$txt_install['IP address check'] = 'controlla l\'indirizzo IP';
$txt_install['for security reasons, proove that it is your the admin'] = 'Per motivi di sicurezza, devi provare che sei realmente l\'amministratore di questo sito.';
$txt_install['finally, reload this page'] = 'In fine, <a href="javascript:window.location.reload()">ricarica</a> questa pagina';
$txt_install['copy INI_FILE.sample to INI_FILE'] = 'Copio il file chiamato %s in %s';
$txt_install['located under the conf subdir of phpgraphy dir'] = 'locato sotto la sottocartella %s della cartella del tuo phpGraphy';
$txt_install['open INI_FILE with your favorite text editor and replace admin_ip with your ip'] = 'Apri %s con il tuo programma di testi preferito e sostituisci il valore di %s con il tuo indirizzor ip che è %s';
$txt_install['upload INI_FILE on your webserver under the CONF_DIR dir'] = 'Carica %s sul tuo webserver sotto la cartella %s ';

// Step 3
$txt_install['Directories Permissions'] = 'Permessi delle Cartelle';
$txt_install['test_result_passed'] = 'OK';
$txt_install['test_result_failed'] = 'FALLITO';
$txt_install['Checking that the webuser can write in the following directories :'] = 'Sto controllando che l\'utente web possa scrivere nelle seguenti cartelle :';
$txt_install['you can not proceed next step'] = 'Correggi i/il problema/i elencati sopra e <a href="javascript:window.location.reload()">ricarica</a> la pagina';
$txt_install['Is directory %s writable ?'] = 'La cartella %s è scrivibile ?';
$txt_install['Is file %s writable ?'] = 'Il file %s è scrivibile ?';
$txt_install['Directory %s used to store the sessions is not writable and sessions support has been disabled'] = 'La cartella %s <span class="annotation">(utilizzata per immagazzinare le sessioni)</span> non è scrivibile e il supporto alle sessioni è stato disabilitato';

// Step 4
$txt_install['Image Tools Configuration'] = 'Configurazione Strumenti per le Foto';
$txt_install['Image Tools Configuration introduction'] = 'Su questa pagina puoi selezionare il software usato per generare le anteprime e le miniature delle foto, così come quello usato per ruotarle. L\'installazione ha rilevato automaticamente le migliori scelte a meno che non tu non sappia cosa stai facendo, per favore vai semplicemente al prossimo passo.';
$txt_install['If you know what you re doing, please use this button'] = "Se sai cosa stai facendo, per favore usa questo bottone";
$txt_install['Show me the details'] = 'Mostrami i dettagli';
$txt_install['choose your thumb generator'] = 'Per favore seleziona il tuo software per elaborare le immagini: ';
$txt_install['gd not supported'] = 'Il supporto a GD non è stato compilato';
$txt_install['gd missing JPG support'] = 'La versione di GD installata non ha il supporto JPG compilato';
$txt_install['exec function disabled'] = 'La funzione exec() è disabilitata';
$txt_install['auto-detection failed'] = 'Auto-rilevamento fallito';
$txt_install['you need to specify %s path'] = '<b>Devi</b> specificare il percorso di <b>%s</b>: ';
$txt_install['you need to specify the program path'] = '<b>Devi</b> specificare il percorso del programma: ';
$txt_install['no thumb_generator found intro'] = 'Non è stato trovato un software funzionante per l\'elaborazione delle immagini, vedi i dettagli sotto.';
$txt_install['no thumb_generator found conclusion'] = 'Se questo è il tuo server, dovresti poter risolvere il problema, altrimenti non hai scelta e devi caricare tu le anteprime e le miniature.';
$txt_install['choose your rotate tool'] = 'Per favore seleziona il tuo software per ruotare le immagini: ';
$txt_install['rotate tool not available'] = 'Rotazione Immagini non disponibile con la tua configurazione perchè exec() è stato disabilitato.';
$txt_install['exif has been disabled'] = 'Supporto a Exif non disponibile con la tua installazione di PHP ed è stato disabilitato';

// Step 5
$txt_install['Database configuration'] = 'Configurazione database';
$txt_install['choose your database backend'] = 'Scegli il tipo di database che vuoi usare: ';
$txt_install['mysql details title'] = 'Parametri database MySQL';
$txt_install['database host'] = 'Hostname server :';
$txt_install['database name'] = 'Nome database :';
$txt_install['database user'] = 'Utente :';
$txt_install['database pass'] = 'Password :';
$txt_install['tables prefix'] = 'Tabella prefissi :';
$txt_install['remove invalid characters'] = '* Rimuovi i caratteri non validi';
$txt_install['mysql connection error, see errors'] = 'Impossibile connettersi al database, controlla gli errori qui sotto:';
$txt_install['database structure sucessfully created'] = 'Struttura del database creata con successo';
$txt_install['database structure already exists'] = 'Una struttura valida esistente del database è stata trovata, puoi procere al prossimo passo';
$txt_install['error while creating database structure'] = 'Un errore è avvenuto durante la creazione della struttura del database';

// Step 6
$txt_install['Administrator account creation'] = 'Creazione Account Amministratore';
$txt_install['Username'] = 'Utente :';
$txt_install['Password'] = 'Password :';
$txt_install['Congratulations, administrator account %s has been created'] = 'Congratulazioni, l\'account dell\'amministratore %s è stato creato.';
$txt_install['An error has occured while creating your administrator account'] = 'Un errore è avvenuto durante la crezione del tuo account di amministratore.';
$txt_install['please choose a login and password'] = 'Stai per completare la procedura d\'installazione, per favore scegli una login e una password che userai per autenticarti come Amministratore.';
$txt_install['Configuration file has been saved'] = 'Il tuo file di configurazione è stato salvato.';
$txt_install['An error has occured while saving your configuration file'] = 'Un errore è avvenuto durante il salvataggio del file della tua configurazione.';
$txt_install['You can now access your phpgraphy site'] = 'Ora puoi accedere <a href="index.php">al tuo sito con phpGraphy</a> !';
$txt_install['One or more problems have occured and your installation is NOT properly finished, please contact the phpGraphy DevTeam with the details of your error(s)'] = 'Uno o più probolemi sono avvenuti e <b>la tua installazione non è terminata correttamente</b>, per favore contatta il DevTeam di phpGraphy con i dettagli del/i tuo/i errore/i.';

// Initial .welcome file
$txt_install['welcome file content'] = 'Ciao

sono il file <b>.welcome</b> collocato nella cartella delle tue foto !
Puoi modificare il mio contenuto online una volta che avrai effettuato accesso come amministratore.

Questa è la procedura di base per convalidare l\'installazione:

1/ Accedi come amministratore
2/ Prova a creare una cartella
3/ Prova a caricare un file (either attraverso l\'inferfaccia web or attraverso il tuo client FTP)
4/ Vedi se le anteprime sono generate correttamente

Una volta che tutto questo funziona, per favore modificami e mettimi in un posto dove vuoi qui.

<div style="border: solid 1px; width: 50%; padding: 5px;"><u>Suggerimento:</u>
Questo è un semplice uso di HTML, puoi creare collegamenti come uno per vedere le <a href="?toprated=1">foto più votate</a> o includere foto usando la funzione img links.
</div>

Grazie per aver scelto phpGraphy, spero ti divertirai usando questo software.
Se riscontri un errore di programmazione o hai una idea innovativa per una nuova funzionalità, per favore contattami.
(Guarda il <a href="http://phpgraphy.sourceforge.net">sito di phpGraphy</a> per dettagi sul contatto)

						JiM / aEGIS.
';


?>
