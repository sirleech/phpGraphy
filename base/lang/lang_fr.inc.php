<?php

/*
*  Copyright (C) 2004-2007 phpGraphy DevTeam
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
*  $Id: lang_fr.inc.php 406 2007-02-02 00:08:45Z jim $
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
    'language_name_english' => 'French',
    'language_name_native'  => 'Français',
    'country_code'          => 'fr',
    'charset'               => 'iso-8859-1',
    'direction'             => 'ltr',
    'for_version'           => '0.9.13',
    'translator_name'       => 'phpGraphy Dev Team',
    'translator_email'      => 'phpgraphy [dash] devteam [at] lists [dot] sourceforge [dot] net'
    );

// Title of your website
$txt_site_title="mon site phpGraphy";

// txt_root_dir: text that specify the root of your gallery
$txt_root_dir="Index";

// the following variables defines the text used for navigating the gallery
// you can change them to fit your needs and also use images (http://tofz.org/ style)
// e.g: $txt_previous_page='<img src="/gfx/my_previous_image_button.gif">';

// Picture/Thumbs viewing/naviguation
$txt_files='fichier(s)';
$txt_dirs='rep(s)';
$txt_last_commented="dernières images commentées";
$txt_top_rated="images les mieux notées";
$txt_last_added="dernières images rajoutées";
$txt_last_added_per_directory="dernières images rajoutées par répertoire";


// Rating (if activated)
$txt_no_rating="";
$txt_thumb_rating="note :";
$txt_pic_rating="Note:";
$txt['%.1f with %s votes'] = '<b>%.1f</b> avec %s vote(s)';
$txt_option_rating="Noter cette image";
$txt['Best rating'] = 'Meilleure note';
$txt['Worst rating'] = 'Moins bonne note';
$txt['Rate !'] = 'Rate !';

$txt_back_dir='^Haut^';
$txt_previous_page='<- Page précédente -| ';
$txt_next_page=' |- Page suivante -> ';
$txt_hires_image=' +Haute résolution+ ';
$txt_lores_image=' -Basse résolution- ';

$txt_previous_image='<- Précédente';
$txt_next_image='Suivante ->';

$txt_x_comments="commentaire(s)";

$txt_comments="Commentaires :";
$txt_add_comment="Ajouter un commentaire";
$txt_comment_from="De: ";
$txt_comment_on=" le ";
$txt['*filtered*'] = '*filtré*';

// Last commented pictures page
$txt_last_commented_title="Les %s dernières images commentées";
$txt_comment_by="par";

// Top rated pictures page
$txt_top_rated_title="Les %s images les mieux notées :";

// Last added pictures/directories page
$txt['Last %s added pictures :'] = 'Les %s images les plus récentes :';
$txt['Last %s added pictures per directory :'] = 'Les %s images les plus récentes par répertoire :';

// Top Right Menu (stuff displayed when in admin mode are under the admin section)
$txt_login="s'authentifier";
$txt_logout="se déconnecter";
$txt_random_pic="image aléatoire";


// Login page
$txt['authenticate yourself'] = 'Authentifiez vous';
$txt_login_form_login="Utilisateur:";
$txt_login_form_pass="Mot de passe:";


// Add comment page
$txt_comment_form_name="Votre nom:";
$txt_remember_me="(Mémoriser mon nom)";
$txt_comment_form_comment="Votre commentaire:";

// Generic stuff (used in several places)
$txt_go_back = "Page précédente";
$txt_form_submit = "Validez";
$txt_ok = "VALIDE";
$txt_failed = "ERREUR";
$txt_ie = 'ex: ';
$txt['NOTE: '] = 'NOTE: ';
$txt['HTML and line breaks supported'] = 'Le HTML et les retours à la ligne sont supportés';
$txt['HTML tags will display in your post as text'] = 'Les tags HTML seront transformés en texte';
$txt['Get Help'] = "Obtenir de l'aide";
$txt['Save as'] = 'Enregistrer sous...';

// metadata section (EXIF/IPTC)

/* $txt_[exif|iptc]_custom: You can customize the way informations are displayed,
* all keywords are between '%' for a reference of all supported keywords,
* See Documentation for the complete list of available keywords
*/
$txt_exif_custom="%Exif.Make% %Exif.Model%<br />%Exif.ExposureTime%s f/%Exif.FNumber% at %Exif.FocalLength%mm (équivalent 35mm: %Exif.FocalLengthIn35mmFilm%mm) iso%Exif.ISO% %Exif.Flash%";
$txt_exif_missing_value="??";	// If EXIF requested field is not found, display this instead
$txt_exif_flash="avec flash"; // Test to display if flash was fired

$txt_iptc_custom="%Iptc.City% par %Iptc.ByLine%";
$txt_iptc_missing_value="";	// If IPTC requested field not found, display that instead

$txt['Found_IPTC_metadata'] = 'Contient des metadonnées IPTC';
$txt['No_IPTC_metadata_found'] = 'Aucune metadonnée IPTC trouvée';

$txt_show_me_more="Plus d'infos";

// SLIDESHOW
$txt['slideshow'] = 'diaporama';
$txt['Slideshow previous'] = '&larr; Précédente';
$txt['Slideshow next'] = 'Suivante &rarr;';
$txt['Slideshow play'] = 'Lecture';
$txt['Slideshow pause'] = 'Pause';
$txt['Slideshow close'] = 'Fermer';
$txt['Slideshow delay'] = 'Delai';
$txt['Slideshow %s sec'] = '%s sec.';
$txt['Slideshow slower'] = '+';
$txt['Slideshow faster'] = '-';
$txt['Slideshow hide captions'] = 'cacher la légende';
$txt['Slideshow show captions'] = 'afficher la légende';

/********************************************************************************
* ADMIN Section
* Text only displayed once you're loggued in as an admin
* So if you, the admin, speak english, you probably won't need to translate this
*********************************************************************************/

// Top right menu (admin text)
$txt_admin['admin'] = 'admin';
$txt_admin['Admin menu'] = 'Menu Administrateur';
$txt_admin['Create a new directory'] = "Créer un nouveau répertoire";
$txt_admin['Upload pictures/files'] = "Envoyer des images/fichiers";
$txt_admin['Batch Processing'] = 'Traitement par lot'; 
$txt_admin['phpGraphy Settings'] = 'Paramètres de phpGraphy';
$txt_admin['Manage Users'] = 'Gestion des utilisateurs';
$txt_admin['View logfile'] = 'Voir le fichier de log';

// Picture/Thumbs viewing/naviguation
$txt_admin['picture settings'] = "Propriétés de l'image";
$txt_admin['directory settings'] = 'Propriétés du répertoire';
$txt_admin['title:'] = 'Titre: ';
$txt_admin['security level:'] = 'Niveau de sécurité: ';
$txt_admin['inherited:'] = 'Herité: ';
$txt_admin['cover picture:'] = 'Image de couverture: ';
$txt['select as cover picture'] = 'Sélectionner comme image de couverture pour le répertoire en cours';
$txt['change/remove'] = 'Changer/Supprimer';
$txt['select one'] = 'Choisir...';
$txt['remove current'] = "Supprimer l'actuelle";
$txt_delete_photo="Supprimer la photo";
$txt_delete_photo_thumb="Regénérer les vignettes";
$txt_delete_directory_text="Supprimer le répertoire";
$txt_edit_welcome="Editer le .welcome";
$txt_del_comment="Supprimer";

// Confirmation box
$txt_ask_confirm="Confirmer ?";
$txt_delete_confirm="Confirmer la suppression ?";
// Image rotation (if available with your config)
$txt['Rotate'] = 'Rotation';
$txt['Rotate 90'] = 'Rotation à 90°';
$txt['Rotate 180'] = 'Rotation à 180°';
$txt['Rotate 270'] = 'Rotation à 270°';


// Editing the .welcome page
$txt_editing="Edition de";
$txt_in_directory="dans le répertoire";
$txt_save="Sauvegarder";
$txt_cancel="Annuler";
$txt_clear_all="Effacer tout";
// Directory creation page
$txt_admin['Create a Directory'] = 'Créer un répertoire';
$txt_admin['Current Directory:'] = 'Répertoire courant: ';
$txt_dir_to_create="Répertoire à créer:";

// Directory deletion
$txt_admin['Deleting %s'] = 'Suppression de %s';
$txt_admin['Directory deleted successfully'] = 'Répertoire supprimé avec succès';
$txt_admin['Problem while deleting this directory'] = 'Problème lors de la suppression du répertoire';
$txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'] = 'Erreur, suppression des sous-répertoires suspendue (Propriétaire: \'%s\' )';
$txt_admin['(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)'] = "(Reportez vous aux messages d'erreurs ci-dessus, pour résoudre le problème, vous devrez sans doute utiliser votre compte FTP pour supprimez ou changer les permissions des fichiers/répertoires posant problème.)";

// Lowres/Thumbs generation page
$txt_admin['Generating all missing thumbnails/low res pictures: (be patient)'] = 'Génération des vignettes et images basse-résolution en cours: (soyez patient)';
$txt_admin['Generating low res picture for %s'] = 'Génération de la basse résolution pour %s';
$txt_admin['Generating thumbnail picture for %s'] = 'Génération de la vignette pour %s';
$txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'] = '<b>%s</b> image(s) basse-résolution et <b>%s</b> vignette(s) ont été générées.';
$txt_admin['Nothing to do.'] = 'Aucune opération à effectuer.';
$txt_admin['Your library contains <b>%s</b> pictures.'] = 'Votre collection contient <b>%s</b> images.';

$txt_admin['Batch action to execute: '] = 'Traitement par lot a lancer: ';
$txt_admin['Generate all thumbnails/lowres'] = 'Générer toutes les vignettes/basse-résolutions';
$txt_admin['Delete all thumbnails/lowres'] = 'Supprimer toutes les vignettes/basse-résolutions';
$txt_admin['Delete all thumbnails'] = 'Supprimer toutes les vignettes';
$txt_admin['Error while deleting %s'] = 'Erreur lors de la suppression de %s';
$txt_admin['Successfully deleted %s of %s files'] = '%s fichier(s) sur %s supprimé(s) avec succès';


// File upload page
$txt_current_dir="Répertoire courant:";
$txt_file_to_upload="Fichier à envoyer:";
$txt_upload_file_from_user="Envoyer un fichier depuis votre ordinateur";
$txt_upload_file_from_url="Copier un fichier depuis une URL";
$txt_upload_change = "En changeant le nombre de fichiers à uploader simultanement, vous allez perdre tous les fichiers déja selectionnés. Il est recommandé d'annuler, envoyer les fichiers actuellements sélectionnés et changer le nombre la fois d'après. Etes vous sur de vouloir continuer ?";

// User management
$txt_add_user = 'Ajouter un utilisateur';
$txt_back_user_list = 'Retour &agrave; la liste';
$txt_confirm_del_user = 'Voulez vous vraiment effacer cet utilisateur  ?';
$txt_user_info = 'Information utilisateur';
$txt_login_rule = 'Saisir un login (jusqu\'à 20 charactères';
$txt_login_ie = 'ex: didier';
$txt_pass_rule = 'Saisir un mot de passe';
$txt_sec_lvl_rule = 'Préciser un niveau de sécurité entre 1 et 999';
$txt_sec_lvl_ie = "ex: 10";
$txt_admin['Password is encrypted and can not be recovered'] = '<b>NOTE:</b> Le mot de passe est encrypté et ne peut être réveler, en revanche vous pouvez en rentrer un nouveau ci-dessous.';

$txt_um_login = 'Identifiant';
$txt_um_pass = 'Mot de passe';
$txt_um_sec_lvl = 'Niveau de sécurité';
$txt_um_edit = 'Modifier';
$txt_um_del = 'Supprimer';

// Configuration Editor page
$txt_admin['Settings'] = 'Paramètres';
$txt_admin['Description'] = 'Description:';
$txt_admin['Example'] = 'Exemple:';
$txt_admin['Read-Only option'] = '<b>Lecture seule</b> - Pour des raisons de sécurité, cette option est uniquement modifiable en éditant le fichier de configuration ou en utilisant install.php';
$txt_admin['Usage of install recommended'] = "L'utilisation de <b>%s</b> est vivement recommendée pour modifier ce paramètre";
$txt_admin['on'] = 'activé';
$txt_admin['off'] = 'désactivé';
$txt_admin['Show advanced options'] = 'Afficher les options avancées';
$txt_admin['Value for %s is incorrect'] = 'Valeur de %s incorrecte';
$txt_admin['Successfully saved changes to config'] = 'La nouvelle configuration a été mise à jour avec succès';


// Misc
$txt_admin['INSTALL/DEBUG mode is active'] = "<b>ATTENTION</b>: le mode INSTALLATION/DEBUGUAGE est actif, n'oubliez pas de rebaisser la valeur de \$debug_mode quand vous avez fini.";
$txt_admin['Javascript Disabled'] = "<b>ATTENTION</b>: Votre naviguateur web ne gère pas le Javascript, vous n'aurez pas accès à certaines fonctionnalités ";


/********************************************************************************
* ERROR messages
* This section is far from being complete but 
*********************************************************************************/

// Unknow error
$txt_error['00000'] = 'Une erreur inconnue s\'est produite, merci de la reporter à <a href="%s" target="_blank">l\'équipe de Dévelopement</a> en prenant soit de préciser le contexte et la facon dont cela vous est arrivé.';

// 1xx - Installation related

// 2xx - Filesystem permissions/ownership related
$txt_error['00201'] = "Attention 'use_direct_urls' est activé et vous avez toujours un fichier .htaccess dans votre répertoire d'images. Il y a de grandes chances que les images ne s'affichent pas.";
$txt_error['00251'] = "Ce fichier/répertoire n'est pas accessible en écriture, cela pour causer des problèmes (notamment pour générer les vignettes/basse-résolution par exemple)";

// 3xx - PHP settings related
$txt_error['00301'] = "Attention, cette page peut faire un 'timeout' car la valeur de 'max_execution_time' est trop faible (%s secondes) et phpGraphy n'a pas réussi à l'augmenter";
$txt_error['00303'] = "La fonction exec() est desactivé sur votre installation PHP";

// 4xx - File upload related
$txt_error['00401'] = "Le téléchargement de %s a échoué, un fichier du même nom existe déja, vous devez supprimer l'autre fichier du même nom avant d'envoyer le nouveau.";

// 5xx - Misc
$txt_error['00501'] = "'topratings' a été renommé en 'toprated', veuillez mettre vos liens à jour.";

// 8xx is related to user management
$txt_error['00800'] = "ERREUR:";
$txt_error['00801'] = "Uid inexistant";
$txt_error['00802'] = "Uid non numérique";
$txt_error['00803'] = "L'identifiant doit contenir entre 1 et 20 de ces caractères  0-9 a-z @ - _";
$txt_error['00804'] = "Identifiant inexistant";
$txt_error['00805'] = "Le mot de passe doit contenir entre  1 et 32 de ces caractères 0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #";
$txt_error['00806'] = "Mot de passe inexistant";
$txt_error['00807'] = "Le niveau de sécurité doit être compris entre 1 et 999";
$txt_error['00808'] = "Niveau de sécurité inexistant";
$txt_error['00809'] = "Le nom d'utilisateur existe déja";



/********************************************************************************
* INSTALL Part
* Text only displayed during the install process
*********************************************************************************/

$txt_install['next step'] = 'Etape suivante ->';

// Step 2
$txt_install['IP address check'] = 'Vérification d\'adresse IP';
$txt_install['for security reasons, proove that it is your the admin'] = 'Pour des raisons de sécurité, vous devez prouver que vous êtes réellement l\'administrateur de ce site.';
$txt_install['finally, reload this page'] = 'Pour terminer, <a href="javascript:window.location.reload()">rafraîchissez</a> cette page';
$txt_install['copy INI_FILE.sample to INI_FILE'] = 'Copier le fichier %s en %s';
$txt_install['located under the conf subdir of phpgraphy dir'] = 'situé dans le sous-répertoire %s de phpGraphy';
$txt_install['open INI_FILE with your favorite text editor and replace admin_ip with your ip'] = 'Ouvrir le fichier %s avec votre éditeur de texte préferé et remplacer la valeur du champ %s avec votre adresse ip qui est %s';
$txt_install['upload INI_FILE on your webserver under the CONF_DIR dir'] = 'Télecharger %s sur votre serveur web dans le sous-répertoire %s';

// Step 3
$txt_install['Directories Permissions'] = 'Droits/Permissions des répertoires';
$txt_install['test_result_passed'] = 'VALIDE';
$txt_install['test_result_failed'] = 'ERREUR';
$txt_install['Checking that the webuser can write in the following directories :'] = "Vérification des droits de l'utilisateur web sur les répertoires suivants :";
$txt_install['you can not proceed next step'] = 'Corrigez le(s) problème(s) rencontrés ci-dessus et <a href="javascript:window.location.reload()">rafraîchisser</a> la page';
$txt_install['Is directory %s writable ?'] = "Le répertoire %s est-t'il accessible en écriture ?";
$txt_install['Is file %s writable ?'] = "Le fichier %s est-t'il accessible en écriture ?";
$txt_install['Directory %s used to store the sessions is not writable and sessions support has been disabled'] = 'Le répertoire %s <span class="annotation">(utilisé pour stocker les informations de session)</span> n\'est pas accessible en écriture et l\'utilisation des sessions a été désactivé.';

// Step 4
$txt_install['Image Tools Configuration'] = "Paramètrage des logiciels de manipulation d'image";
$txt_install['Image Tools Configuration introduction'] = "Sur cette page vous pouvez choisir les logiciels utilisés pour générer les vignettes et les images basse-résolution ainsi que celui pour effectuer la rotation. L'installation a détecté les meilleurs choix et à moins que vous ne sachiez ce que vous faites, il est conseillé de simplement passer à l\'étate suivante.";
$txt_install['If you know what you re doing, please use this button'] = "Si vous savez ce que vous faites, cliquez sur le bouton ci-dessous";
$txt_install['Show me the details'] = 'Accéder aux détails';
$txt_install['choose your thumb generator'] = 'Choisissez le logiciel de génération des vignettes et basse-résolution: ';
$txt_install['gd not supported'] = 'GD n\'est pas supporté par le serveur web';
$txt_install['gd missing JPG support'] = 'La version de GD qui est installé ne gère par le support des fichiers JPEG';
$txt_install['exec function disabled'] = 'La fonction exec() est désactivée';
$txt_install['auto-detection failed'] = 'La détection automatique a échouée';
$txt_install['you need to specify %s path'] = 'Vous <b>devez</b> spécifier le chemin de <b>%s</b> : ';
$txt_install['you need to specify the program path'] = 'Vous <b>devez</b> spécifier le chemin du programme: ';
$txt_install['no thumb_generator found intro'] = "Aucun logiciel de manipulation n'a été détecté, cf détails ci-dessous.";
$txt_install['no thumb_generator found conclusion'] = "Si il s'agit de votre propre serveur, vous devriez pouvoir résoudre les problèmes, sinon contacter l'administrateur du serveur ou génerez et envoyez les vignettes et les images basse-résolution vous-même.";
$txt_install['choose your rotate tool'] = 'Choisissez un logiciel pour la rotation des images: ';
$txt_install['rotate tool not available'] = 'La rotation des images n\'est pas disponible avec votre configuration car la fonction exec() a été désactivée.';
$txt_install['exif has been disabled'] = 'Le support Exif n\'est pas disponible avec votre configuration et a été désactivé';

// Step 5
$txt_install['Database configuration'] = 'Configuration de la base de données';
$txt_install['choose your database backend'] = 'Choisissez le type de base de données que vous souhaitez utiliser: ';
$txt_install['mysql details title'] = 'Paramètres MySQL';
$txt_install['database host'] = 'Nom de l\'hôte :';
$txt_install['database name'] = 'Nom de la base de données :';
$txt_install['database user'] = 'Utilisateur :';
$txt_install['database pass'] = 'Mot de passe :';
$txt_install['tables prefix'] = 'Prefix des tables :';
$txt_install['remove invalid characters'] = '* Enlevez le(s) caractère(s) invalide(s)';
$txt_install['mysql connection error, see errors'] = 'Impossible de se connecter à la base de données, vérifiez le(s) erreur(s) ci-dessous';
$txt_install['database structure sucessfully created'] = 'La structure de la base de données a été créee avec succès';
$txt_install['database structure already exists'] = 'Une structure de base de données valide a été trouvée, vous pouvez passer à l\'étape suivante';
$txt_install['error while creating database structure'] = 'Une erreur s\'est produite lors de la création de la base de données';

// Step 6
$txt_install['Administrator account creation'] = "Création du compte d'Administrateur";
$txt_install['Username'] = "Nom d'utilisateur :";
$txt_install['Password'] = 'Mot de passe :';
$txt_install['Congratulations, administrator account %s has been created'] = 'Félicitations, votre compte d\'administrateur %s a été créer avec succès';
$txt_install['An error has occured while creating your administrator account'] = "Une erreur s'est produite lors de la création de votre compte d'Administrateur.";
$txt_install['please choose a login and password'] = "Vous êtes sur le point de terminer la procédure d\'installation, choisissez un nom d'utilisateur et un mot de passe qui vous servira à vous authentifier en tant qu\'Administrateur.";
$txt_install['Configuration file has been saved'] = 'Le fichier de configuration a été sauvegardé avec succès.';
$txt_install['An error has occured while saving your configuration file'] = 'Un problème est survenu lors de la sauvegarde du fichier de configuration.';
$txt_install['You can now access your phpgraphy site'] = 'Vous pouvez accéder dès maintenant à <a href="index.php">votre site phpGraphy</a> !';
$txt_install['One or more problems have occured and your installation is NOT properly finished, please contact the phpGraphy DevTeam with the details of your error(s)'] = 'Un ou plusieurs problèmes sont survenus, <b>l\'installation n\'est pas terminée</b>, contactez l\'équipe de développement phpGraphy avec le détail des erreurs qui sont survenus.';

// Initial .welcome file
$txt_install['welcome file content'] = 'Bonjour

Je suis le fichier <b>.welcome</b> situé dans le répertoire pictures/ !
Vous pouvez me modifier une fois authentifié en tant qu\'Administrateur.

Voici quelques instructions afin de valider votre installation :

1/ Authentifiez-vous en tant qu\'Administrateur
2/ Essayez de créer un répertoire
3/ Essayer d\'envoyer une image (soit par l\'interface web ou en utilisant votre client FTP)
4/ Vérifiez si les vignettes sont correctement générées

Une fois que tout fonctione, éditer ce fichier et mettez votre propre texte

<div style="border: solid 1px; width: 50%; padding: 5px;"><u>Tip:</u>
Voici un exemple d\'utilisation de code HTML, vous pouvez créer des liens comme celui-ci <a href="?toprated=1">Images les mieux notées</a>.
</div>

Merci d\'avoir choisi phpGraphy, j\'espère que vous apprécierez son utilision.
Si vous rencontrez des problèmes, trouvez un bug ou même si vous avez des suggestions afin de l\'améliorer, n\'hésitez pas à me contacter.
(Cf <a href="http://phpgraphy.sourceforge.net">le site de phpGraphy</a> pour les détails)

						JiM / aEGIS.
';

?>
