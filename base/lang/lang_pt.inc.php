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
*  $Id: lang_en.inc.php 275 2005-12-14 22:44:01Z jim $
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
    'language_name_english' => 'Portuguese',
    'language_name_native'  => 'Português',
    'country_code'          => 'pt',
    'charset'               => 'iso-8859-1',
    'direction'             => 'ltr',
    'for_version'           => '0.9.11',
    'translator_name'       => 'Augusto Braun',
    'translator_email'      => 'augusto [_at_] designedby [_dot_] com [_dot_] br'
    );

// Title of your website
$txt_site_title="Rock Produções";

// txt_root_dir: text that specify the root of your gallery
$txt_root_dir="Galeria de Imagens ";

// the following variables defines the text used for navigating the gallery
// you can change them to fit your needs and also use images (http://tofz.org/ style)
// e.g: $txt_previous_page='<img src="/gfx/my_previous_image_button.gif">';


// Picture/Thumbs viewing/navigation
$txt_files='arquivo(s)';
$txt_dirs='pasta(s)';
$txt_last_commented="última foto comentada";

// Rating (if activated)
$txt_no_rating="";
$txt_thumb_rating="Avaliação :";
$txt_pic_rating="Avaliação média : ";
$txt_option_rating="Avalie esta foto";
$txt['Best rating'] = 'Melhor avaliação';
$txt['Worst rating'] = 'Menos cotada';
$txt['Rate !'] = 'Avalie';

$txt_back_dir='^Up^';
$txt_previous_image='&lt;- Anterior';
$txt_next_image='Próximo -&gt;';
$txt_hires_image=' + Alta Resolução + ';
$txt_lores_image=' - Baixa Resolução - ';

$txt_previous_page='&lt;- Página anterior -| ';
$txt_next_page=' |- Próxima página -&gt; ';

$txt_x_comments="comentário(s)";

$txt_comments="Comentários :";
$txt_add_comment="Adicionar comentário";
$txt_comment_from="De: ";
$txt_comment_on=" em ";
$txt['*filtered*'] = '*filtrado*';

// Last commented pictures page
$txt_last_commented_title="ültimas %s  fotos comentadas :";
$txt_comment_by="por";

// Top rated pictures page
$txt_top_rated_title="As %s fotos mais votadas :";

// Last added pictures/directories page
$txt['Last %s added pictures :'] = 'Últimas %s fotos adicionadas :';
$txt['Last %s added pictures per directory :'] = 'Últimas %s fotos adicionadas por pasta :';

// Top Right Menu (stuff displayed when in admin mode are under the admin section)
$txt_login="entrar";
$txt_logout="sair";
$txt_random_pic="foto aleatória";


// Login page
$txt['authenticate yourself'] = 'Autentique-se';
$txt_login_form_login="Login:";
$txt_login_form_pass="Senha:";


// Add comment page
$txt_comment_form_name="Seu Nome:";
$txt_remember_me="(Lembrar)";
$txt_comment_form_comment="Seu Comentário:";

// Generic stuff (used in several places)
$txt_go_back = "Voltar";
$txt_form_submit = "Enviar";
$txt_ok = "OK";
$txt_failed = "FALHA";
$txt_ie = 'ex.: ';
$txt['NOTE: '] = 'NOTE: ';
$txt['HTML and line breaks supported'] = 'Conteúdo HTML e quebras de linha permitidos';
$txt['HTML tags will display in your post as text'] = 'Códigos HTML serão convertidos em texto';


// metadata section (EXIF/IPTC)

/* $txt_[exif|iptc]_custom: You can customize the way informations are displayed,
* all keywords are between '%' for a reference of all supported keywords,
* See Documentation for the complete list of available keywords
*/
$txt_exif_custom="%Exif.Make% %Exif.Model%<br />%Exif.ExposureTime%s f/%Exif.FNumber% at %Exif.FocalLength%mm (35mm equiv: %Exif.FocalLengthIn35mmFilm%mm) iso %Exif.ISO% %Exif.Flash%";
$txt_exif_missing_value="??";	// If EXIF requested field is not found, display this instead
$txt_exif_flash="with flash"; // Test to display if flash was fired

$txt_iptc_custom="%Iptc.City% by %Iptc.ByLine%";
$txt_iptc_missing_value="";	// If IPTC requested field not found, display that instead

$txt_show_me_more="Show me more";

// SLIDESHOW
$txt['Slideshow launch'] = 'Iniciar slideshow...';
$txt['Slideshow previous'] = '&larr; Anterior';
$txt['Slideshow next'] = 'Próximo &rarr;';
$txt['Slideshow play'] = 'Iniciar';
$txt['Slideshow pause'] = 'Pausar';
$txt['Slideshow close'] = 'Fechar';
$txt['Slideshow delay'] = 'Atraso';
$txt['Slideshow %s sec'] = '%s seg.';
$txt['Slideshow slower'] = '+';
$txt['Slideshow faster'] = '-';

/********************************************************************************
* ADMIN Section
* Text only displayed once you're loggued in as an admin
* So if you, the admin, speak english, you probably won't need to translate this
*********************************************************************************/

// Top right menu (admin text)
$txt_admin['admin'] = 'administrador';
$txt_admin['Admin menu'] = 'Menu de Administrador';
$txt_admin['Create a new directory'] = "Criar novo diretório";
$txt_admin['Upload pictures/files'] = "Enviar fotos/arquivos";
$txt_admin['Generate Lowres/Thumbnails'] = "Gerar amostrar";
$txt_admin['phpGraphy Settings'] = 'Configurações';
$txt_admin['Manage Users'] = 'Gerenciar Usuários';
$txt_admin['View logfile'] = 'Ver Log';

// Picture/Thumbs viewing/navigation
$txt_admin['picture settings'] = 'Configurações da Foto';
$txt_admin['directory settings'] = 'Configurações de Diretório';
$txt_admin['title:'] = 'Título: ';
$txt_admin['security level:'] = 'Nível de Segurança: ';
$txt_admin['inherited:'] = ' Filiado: ';
$txt_admin['cover picture:'] = 'Foto de Capa: ';
$txt['select as cover picture'] = 'Selecione como Foto de Capa para este diretório';
$txt['change/remove'] = 'Alterar/Remover';
$txt['select one'] = 'Selecione...';
$txt['remove current'] = 'Remover atual';
$txt_delete_photo="Deletar Foto";
$txt_delete_photo_thumb="Regerar Amostra";
$txt_delete_directory_text="Deletar Diretório";
$txt_edit_welcome="Editar .welcome";
$txt_del_comment="Deletar";

// Confirmation box
$txt_ask_confirm="Tem Certeza ?";
$txt_delete_confirm="Tem certeza que deseja deletar ?";

// Image rotation (if available with your config)
$txt['Rotate'] = 'Rotatacionar';
$txt['Rotate 90'] = 'Rotatacionar 90°';
$txt['Rotate 180'] = 'Rotatacionar 180°';
$txt['Rotate 270'] = 'Rotatacionar 270°';


// Editing the .welcome page
$txt_editing="Editando";
$txt_in_directory="no diretório";
$txt_save="Salvar";
$txt_cancel="Cancelar";
$txt_clear_all="Limpar todos";


// Directory creation page
$txt_admin['Create a Directory'] = 'Criar Directório';
$txt_admin['Current Directory:'] = 'Criar Directório: ';
$txt_dir_to_create="Directório a criar:";

// Directory deletion
$txt_admin['Deleting %s'] = 'Deletando %s';
$txt_admin['Directory deleted successfully'] = 'Directório deletado com sucesso';
$txt_admin['Problem while deleting this directory'] = 'Erro ao deletar este diretório';
$txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'] = 'Erro, evitando todos os diretórios (Dono \'%s\' )';
$txt_admin['(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)'] = '(Por favor cheque as mensagens de erro acima, para solucionar você deve deletar (ou alterar permissões) utilizando seu acesso a FTP já que os diretórios criados pertencem ao seu usuário de FTP.)';

// Lowres/Thumbs generation page
$txt_admin['Generating all missing thumbnails/low res pictures: (be patient)'] = 'Gerando amostras que faltam em Baixa resolução. Aguarde.';
$txt_admin['Generating low res picture for %s'] = 'Gerando Amostra de Baixa Resolução %s';
$txt_admin['Generating thumbnail picture for %s'] = 'Gerando Amostra para %s';
$txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'] = 'Gerando <b>%s</b> Fotos em baixa <b>%s</b> amostras.';
$txt_admin['Nothing to do.'] = 'Nada a fazer.';
$txt_admin['Your library contains <b>%s</b> pictures.'] = 'Sua biblioteca contém <b>%s</b> fotos.';


// File upload page
$txt_current_dir="Diretório atual :";
$txt_file_to_upload="Arquivo(s) para Enviar:";
$txt_upload_file_from_user="Enviar Arquivo(s) de seu computador";
$txt_upload_file_from_url="Enviar arquivo a partir de URL";
$txt_upload_change = "Alterando os números de campos de envio requer que você selecione novamente todos o arquivos selecionados anteriormente. É recomendável cancelar, enviar o arquivo atual e escolher um número maior na próxima vez. Deseja continuar ?";

// User management
$txt_add_user = 'Adicionar usuário';
$txt_back_user_list = 'Voltar para lista de usuários';
$txt_confirm_del_user = 'Tem certeza que deseja remover este usuário  ?';
$txt_user_info = 'Informações do usuário';
$txt_login_rule = 'Especifique um usuário com até 20 caracteres';
$txt_login_ie = 'ex.: joao';
$txt_pass_rule = 'Especifique uma senha com até 32 caracteres';
$txt_sec_lvl_rule = 'Especificar um nível de segurança entre 1 e 999';
$txt_sec_lvl_ie = "ex: 10";

$txt_um_login = 'Login';
$txt_um_pass = 'Senha';
$txt_um_sec_lvl = 'Nível de Segurança';
$txt_um_edit = 'Editar';
$txt_um_del = 'Deletar';

// Configuration Editor page
$txt_admin['Settings'] = 'Condigurações';
$txt_admin['Description'] = 'Descrição:';
$txt_admin['Example'] = 'Exemplo:';
$txt_admin['Read-Only option'] = '<b>Somente leitura</b> - Por razões de segurança, você só pode modificar esta opção manualmente editando %s ou utilizando install.php.';
$txt_admin['Usage of install recommended'] = 'Us de <b>%s</b> é recomendável alterar esta configuração';
$txt_admin['on'] = 'on';
$txt_admin['off'] = 'off';
$txt_admin['Show advanced options'] = 'Mostrar opções avançadas';
$txt_admin['Value for %s is incorrect'] = 'O valor de %s está incorreto';
$txt_admin['Successfully saved changes to config'] = 'Configurações salvas com sucesso';


// Misc                               .
$txt_admin['INSTALL/DEBUG mode is active'] = "<b>ATENÇÃO</b>: INSTALL/DEBUG mode está ativo - Diminua o valor de \$debug_mode em config.ini.php quando estiver pronto.";
$txt_admin['Javascript Disabled'] = "<b>ATENÇÃO</b>: Seu navegadr não suporta Javascript e você não terá acesso a algumas funções";


/********************************************************************************
* ERROR messages
* This section is far from being complete but 
*********************************************************************************/

// 8xx is related to user management
$txt_error['00800'] = "ERRO:";
$txt_error['00801'] = "Uid não informado";
$txt_error['00802'] = "Uid não é numérico";
$txt_error['00803'] = "Login deve contar de 1 a 20 dos caracteres 0-9 a-z @ - _";
$txt_error['00804'] = "Login não informado";
$txt_error['00805'] = "Senha deve conter de 1  32 dos cacarteres 0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #";
$txt_error['00806'] = "senha não informada";
$txt_error['00807'] = "Nível de segurança deve ser entre 1 e 999";
$txt_error['00808'] = "Nível de segurança não informado";
$txt_error['00809'] = "Login já existe";



/********************************************************************************
* INSTALL Part
* Text only displayed during the install process
*********************************************************************************/

$txt_install['next step'] = 'Next Step ->';

// Step 2
$txt_install['IP address check'] = 'IP address check';
$txt_install['for security reasons, proove that it is your the admin'] = 'For security reasons, you need to prove that you really are the administrator of this site.';
$txt_install['finally, reload this page'] = 'Finally, <a href="javascript:window.location.reload()">reload</a> this page';
$txt_install['copy INI_FILE.sample to INI_FILE'] = 'Copy the file named %s to %s';
$txt_install['located under the conf subdir of phpgraphy dir'] = 'located under the %s subdirectory of your phpGraphy directory';
$txt_install['open INI_FILE with your favorite text editor and replace admin_ip with your ip'] = 'Open %s with your favorite text-editor and replace the value of %s with your ip address which is %s';
$txt_install['upload INI_FILE on your webserver under the CONF_DIR dir'] = 'Upload %s on your webserver under the %s subdirectory';

// Step 3
$txt_install['Directories Permissions'] = 'Directories Permissions';
$txt_install['test_result_passed'] = 'OK';
$txt_install['test_result_failed'] = 'FAILED';
$txt_install['Checking that the webuser can write in the following directories :'] = 'Checking that the webuser can write in the following directories :';
$txt_install['you can not proceed next step'] = 'Correct the problem(s) listed above and <a href="javascript:window.location.reload()">reload</a> the page';
$txt_install['Is directory %s writable ?'] = 'Is directory %s writable ?';
$txt_install['Is file %s writable ?'] = 'Is file %s writable ?';
$txt_install['Directory %s used to store the sessions is not writable and sessions support has been disabled'] = 'Directory %s <span class="annotation">(used to store the sessions)</span> is not writable and sessions support has been disabled';

// Step 4
$txt_install['Image Tools Configuration'] = 'Image Tools Configuration';
$txt_install['Image Tools Configuration introduction'] = 'On this page you can select the software used to generate thumbnails and lowresolution pictures, as well as one used to rotate them. The installation has automatically detected the best choices and unless you know what you\'re doing, please simply proceed to next step.';
$txt_install['If you know what you re doing, please use this button'] = "If you know what you're doing, please use this button";
$txt_install['Show me the details'] = 'Show me the details';
$txt_install['choose your thumb generator'] = 'Please select your image processing software: ';
$txt_install['gd not supported'] = 'GD support has not been compiled in';
$txt_install['gd missing JPG support'] = 'Installed GD version hasn\'t JPG support compiled in';
$txt_install['exec function disabled'] = 'exec() function is disabled';
$txt_install['auto-detection failed'] = 'Auto-detection failed';
$txt_install['you need to specify %s path'] = 'You <b>need</b> to specify <b>%s</b> path: ';
$txt_install['you need to specify the program path'] = 'You <b>need</b> to specify the program path: ';
$txt_install['no thumb_generator found intro'] = 'No working image processing software have been found, see details below.';
$txt_install['no thumb_generator found conclusion'] = 'If this is your server, you should be able to resolve the problems, else you have no choice but to upload thumbnails and low-resolution pictures yourself.';
$txt_install['choose your rotate tool'] = 'Please select your image rotation software: ';
$txt_install['rotate tool not available'] = 'Image Rotation is not available with your configuration because exec() has been disabled.';
$txt_install['exif has been disabled'] = 'Exif support is not available with your PHP installation and has been disabled';

// Step 5
$txt_install['Database configuration'] = 'Database configuration';
$txt_install['choose your database backend'] = 'Choose the database backend you want to use: ';
$txt_install['mysql details title'] = 'MySQL Database parameters';
$txt_install['database host'] = 'Server hostname :';
$txt_install['database name'] = 'Database name :';
$txt_install['database user'] = 'User :';
$txt_install['database pass'] = 'Password :';
$txt_install['tables prefix'] = 'Tables prefix :';
$txt_install['remove invalid characters'] = '* Remove invalid character(s)';
$txt_install['mysql connection error, see errors'] = 'Unable to connect to the database, check error(s) below:';
$txt_install['database structure sucessfully created'] = 'Database structure successfully created';
$txt_install['database structure already exists'] = 'An existing valid database structure has been found, you can proceed to next step';
$txt_install['error while creating database structure'] = 'An error has occured while creating the database structure';

// Step 6
$txt_install['Administrator account creation'] = 'Administrator Account Creation';
$txt_install['Username'] = 'Username :';
$txt_install['Password'] = 'Password :';
$txt_install['Congratulations, administrator account %s has been created'] = 'Congratulations, administror account %s has been created';
$txt_install['An error has occured while creating your administrator account'] = 'An error has occured while creating your administrator account.';
$txt_install['please choose a login and password'] = 'You\'re about to finish the installation process, please choose a login and a password that you\'ll use to authenticate yourself as Administrator.';
$txt_install['Configuration file has been saved'] = 'Your configuration file has been saved.';
$txt_install['An error has occured while saving your configuration file'] = 'An error has occured while saving your configuration file.';
$txt_install['You can now access your phpgraphy site'] = 'You can now <a href="index.php">access your phpGraphy site</a> !';
$txt_install['One or more problems have occured and your installation is NOT properly finished, please contact the phpGraphy DevTeam with the details of your error(s)'] = 'One or more problems have occured and <b>your installation is NOT properly finished</b>, please contact the phpGraphy DevTeam with the details of your error(s).';

// Initial .welcome file
$txt_install['welcome file content'] = 'Hello

I\'m the <b>.welcome</b> file located in your pictures directory !
You can edit my content online once you\'re loggued-in as admin.

Here is a basic install validation procedure:

1/ Log-in as admin
2/ Try to create a directory
3/ Try to upload a file (either via the web interface or via your FTP client)
4/ See if the thumbnail get correctly generated

Once all this is working, please edit me and put whatever you want here.

<div style="border: solid 1px; width: 50%; padding: 5px;"><u>Tip:</u>
Here is an example of HTML use, you can create links like one to see the <a href="?toprated=1">top rated pictures</a> or include pictures using img links.
</div>

Thanks for choosing phpGraphy, I hope you will enjoy using this software
If you encounter a bug or you have a great new feature idea, please contact me.
(See <a href="http://phpgraphy.sourceforge.net">phpGraphy website</a> for contact details)

						JiM / aEGIS.
';


?>
