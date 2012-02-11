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
*  $Id: lang_ru.inc.php 406 2007-02-02 00:08:45Z jim $
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
    'language_name_english' => 'Russian',
    'language_name_native'  => 'Russian',
    'country_code'          => 'ru',
    'charset'               => 'windows-1251',
    'direction'             => 'ltr',
    'for_version'           => '0.9.11',
    'translator_name'       => 'Roman Boutyrchik',
    'translator_email'      => 'greenstars [at] land [dot] ru'
    );

// Title of your website
$txt_site_title="Галерея";

// txt_root_dir: text that specify the root of your gallery
$txt_root_dir="Главная";

// the following variables defines the text used for navigating the gallery
// you can change them to fit your needs and also use images (http://tofz.org/ style)
// e.g: $txt_previous_page='<img src="/gfx/my_previous_image_button.gif">';


// Picture/Thumbs viewing/navigation
$txt_files='файл(ов)';
$txt_dirs='каталог(ов)';
$txt_last_commented="Последние комментарии к изображениям";

// Rating (if activated)
$txt_no_rating="";
$txt_thumb_rating="Рейтинг :";
$txt_pic_rating="Средний рейтинг : ";
$txt_option_rating="Оцените картинку";
$txt['Best rating'] = 'Лучший рейтинг';
$txt['Worst rating'] = 'Худший рейтинг';
$txt['Rate !'] = 'Оценить !';

$txt_back_dir='Вверх';
$txt_previous_image='Предыдущая';
$txt_next_image='Следующая';
$txt_hires_image='Оригинальный размер';
$txt_lores_image='Уменьшенный';

$txt_previous_page='Предыдущая страница -| ';
$txt_next_page=' |- Следующая страница';

$txt_x_comments="комментарий(ев)";

$txt_comments="Комментарии :";
$txt_add_comment="Добавить комментарий";
$txt_comment_from="От: ";
$txt_comment_on=" on ";
$txt['*filtered*'] = '*filtered*';

// Last commented pictures page
$txt_last_commented_title="Последние %s комментариев:";
$txt_comment_by="От";

// Top rated pictures page
$txt_top_rated_title="%s наиболее высоко оцениваемых изображений :";

// Last added pictures/directories page
$txt['Last %s added pictures :'] = '%s последних добавленных изображений :';
$txt['Last %s added pictures per directory :'] = '%s последних добавленных изображений из каталога :';

// Top Right Menu (stuff displayed when in admin mode are under the admin section)
$txt_login="Вход";
$txt_logout="Выход";
$txt_random_pic="Случайное изображение ";


// Login page
$txt['authenticate yourself'] = 'Авторизируйтесь';
$txt_login_form_login="Логин:";
$txt_login_form_pass="Пароль:";


// Add comment page
$txt_comment_form_name="Ваше имя:";
$txt_remember_me="(Запомнить меня)";
$txt_comment_form_comment="Ваш комментарий:";

// Generic stuff (used in several places)
$txt_go_back = "Вернуться";
$txt_form_submit = "Отправить";
$txt_ok = "OK";
$txt_failed = "НЕУДАЧНО";
$txt_ie = 'ie: ';
$txt['NOTE: '] = 'ЗАМЕТКА: ';
$txt['HTML and line breaks supported'] = 'Поддержка HTML кода включена';
$txt['HTML tags will display in your post as text'] = 'HTML код будет отображен как текст';


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

$txt_show_me_more="Показать все";

// SLIDESHOW
$txt['Slideshow launch'] = 'Показать как слайд-шоу...';
$txt['Slideshow previous'] = '&larr; Предыдущая';
$txt['Slideshow next'] = 'Следующая &rarr;';
$txt['Slideshow play'] = 'Старт';
$txt['Slideshow pause'] = 'Пауза';
$txt['Slideshow close'] = 'Закрыть';
$txt['Slideshow delay'] = 'Задержка';
$txt['Slideshow %s sec'] = '%s sec.';
$txt['Slideshow slower'] = '+';
$txt['Slideshow faster'] = '-';

/********************************************************************************
* ADMIN Section
* Text only displayed once you're loggued in as an admin
* So if you, the admin, speak english, you probably won't need to translate this
*********************************************************************************/

// Top right menu (admin text)
$txt_admin['admin'] = 'Администратор';
$txt_admin['Admin menu'] = 'Меню Администратора';
$txt_admin['Create a new directory'] = "Создать новый каталог";
$txt_admin['Upload pictures/files'] = "Закачать изображения";
$txt_admin['Generate Lowres/Thumbnails'] = "Сгенерировать Thumbnails";
$txt_admin['phpGraphy Settings'] = 'Настройки';
$txt_admin['Manage Users'] = 'Управление пользователями';
$txt_admin['View logfile'] = 'Смотреть log';

// Picture/Thumbs viewing/navigation
$txt_admin['picture settings'] = 'Настройки изображений';
$txt_admin['directory settings'] = 'Настройки каталогов';
$txt_admin['title:'] = 'Title: ';
$txt_admin['security level:'] = 'Уровень безопасности: ';
$txt_admin['inherited:'] = ' Наследование: ';
$txt_admin['cover picture:'] = 'Изображение обложки: ';
$txt['select as cover picture'] = 'Выберите изображение для текущего каталога';
$txt['change/remove'] = 'Изменить/Удалить';
$txt['select one'] = 'Выбрать...';
$txt['remove current'] = 'Удалить текущую';
$txt_delete_photo="Удалить изображениеo";
$txt_delete_photo_thumb="Сгенерировать thumb снова";
$txt_delete_directory_text="Удалить каталог";
$txt_edit_welcome="Изменить приветствие";
$txt_del_comment="Удалить";

// Confirmation box
$txt_ask_confirm="Вы уверены ?";
$txt_delete_confirm="Вы уверены в удалении ?";

// Image rotation (if available with your config)
$txt['Rotate'] = 'Повернуть';
$txt['Rotate 90'] = 'Повернуть на 90°';
$txt['Rotate 180'] = 'Повернуть на 180°';
$txt['Rotate 270'] = 'Повернуть на 270°';


// Editing the .welcome page
$txt_editing="Редактирование";
$txt_in_directory="в каталоге";
$txt_save="Сохранить";
$txt_cancel="Отмена";
$txt_clear_all="Очистить все";


// Directory creation page
$txt_admin['Create a Directory'] = 'Создать каталог';
$txt_admin['Current Directory:'] = 'Текущий каталог: ';
$txt_dir_to_create="Каталог для создания:";

// Directory deletion
$txt_admin['Deleting %s'] = 'Удаление %s';
$txt_admin['Directory deleted successfully'] = 'Каталог удален успешно';
$txt_admin['Problem while deleting this directory'] = 'Проблема при удалении этого каталога';
$txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'] = 'Неудача, будут пропущены все под-каталоги (Держатель \'%s\' )';
$txt_admin['(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)'] = '(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)';

// Lowres/Thumbs generation page
$txt_admin['Generating all missing thumbnails/low res pictures: (be patient)'] = 'Создать все пропущенные thumbnails: (требуется время)';
$txt_admin['Generating low res picture for %s'] = 'Создать уменьшенные изображения для %s';
$txt_admin['Generating thumbnail picture for %s'] = 'Создать thumbnail для %s';
$txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'] = 'Создано <b>%s</b> уменьшенных изображений и <b>%s</b> thumbnails.';
$txt_admin['Nothing to do.'] = 'Nothing to do.';
$txt_admin['Your library contains <b>%s</b> pictures.'] = 'Ваша библиотека содержит <b>%s</b> изображений.';


// File upload page
$txt_current_dir="Текущий каталог :";
$txt_file_to_upload="Файл(ов) для закачки:";
$txt_upload_file_from_user="Закачать файл(ы) с вашего компьютера";
$txt_upload_file_from_url="Закачать файл с URL";
$txt_upload_change = "Изменение числа закачиваемых файлов требует, чтобы Вы перевыбрали все файлы, которые уже предварительно выбраны. Рекомендуем Вам сначала закачать те файлы, которые уже выбраны, а потом выбрать большее кол-во в следующий раз. Вы все еще хотите продолжить?";

// User management
$txt_add_user = 'Добавить пользователя';
$txt_back_user_list = 'Вернуться к списку пользователей';
$txt_confirm_del_user = 'Вы точно хотите удалить этого пользователя?';
$txt_user_info = 'Информация о пользователе';
$txt_login_rule = 'Определить login до 20 символов';
$txt_login_ie = 'например: john';
$txt_pass_rule = 'Определить password до 32 символов';
$txt_sec_lvl_rule = 'Определить уровень доступа от 1 до 999';
$txt_sec_lvl_ie = "например: 10";

$txt_um_login = 'Login';
$txt_um_pass = 'Password';
$txt_um_sec_lvl = 'Уровень доступа';
$txt_um_edit = 'Редактировать';
$txt_um_del = 'Удалить';

// Configuration Editor page
$txt_admin['Settings'] = 'Настройки';
$txt_admin['Description'] = 'Описание:';
$txt_admin['Example'] = 'Пример:';
$txt_admin['Read-Only option'] = '<b>Только чтение</b> - Из соображений безопасности, вы можете изменять эту опцию только вручную %s или используя install.php.';
$txt_admin['Usage of install recommended'] = 'Usage of <b>%s</b> is recommended to change this setting';
$txt_admin['on'] = 'on';
$txt_admin['off'] = 'off';
$txt_admin['Show advanced options'] = 'Показать дополнительные опции';
$txt_admin['Value for %s is incorrect'] = 'Значение для %s неверно';
$txt_admin['Successfully saved changes to config'] = 'Изменения сохранены';


// Misc
$txt_admin['INSTALL/DEBUG mode is active'] = "<b>WARNING</b>: INSTALL/DEBUG mode is active - Lower the value of \$debug_mode in config.ini.php once you're done.";
$txt_admin['Javascript Disabled'] = "<b>WARNING</b>: Your browser doesn't support Javascript and you won't be able to access some functions";


/********************************************************************************
* ERROR messages
* This section is far from being complete but 
*********************************************************************************/

// 8xx is related to user management
$txt_error['00800'] = "ОШИБКА:";
$txt_error['00801'] = "Значение Uid не задано";
$txt_error['00802'] = "Значение Uid не числовое";
$txt_error['00803'] = "Login должен содержать от 1 до 20 символов 0-9 a-z @ - _";
$txt_error['00804'] = "Login не задан";
$txt_error['00805'] = "Password должен содержать от  1 до 32 символов 0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #";
$txt_error['00806'] = "Password не задан";
$txt_error['00807'] = "Уровень доступа должен быть равен значению от 1 до 999";
$txt_error['00808'] = "Уровень доступа не задан";
$txt_error['00809'] = "Login уже создан";



/********************************************************************************
* INSTALL Part
* Text only displayed during the install process
*********************************************************************************/

$txt_install['next step'] = 'Дальше ->';

// Step 2
$txt_install['IP address check'] = 'Проверка IP';
$txt_install['for security reasons, proove that it is your the admin'] = 'Из соображений безопасности, вы должны указать, что являетесь администратором сайта.';
$txt_install['finally, reload this page'] = 'Последний этап, <a href="javascript:window.location.reload()">обновите</a> эту страницу';
$txt_install['copy INI_FILE.sample to INI_FILE'] = 'Переименуйте файл %s в %s';
$txt_install['located under the conf subdir of phpgraphy dir'] = 'расположенный в папке %s';
$txt_install['open INI_FILE with your favorite text editor and replace admin_ip with your ip'] = 'Откройте %s любым текстовым редактором и измените значение %s на ваш IP - %s';
$txt_install['upload INI_FILE on your webserver under the CONF_DIR dir'] = 'Закачайте %s на ваш сервер в папку %s';

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
$txt_install['Image Tools Configuration'] = 'Настройка Image Tools';
$txt_install['Image Tools Configuration introduction'] = 'На этой странице вы можете выбрать способ генерации thumbnail\'ов и уменьшенных изображений. Инсталлятор автоматически определит лучший вариант и если вы не знаете, что выбрать, то просто перейдите к следующему шагу.';
$txt_install['If you know what you re doing, please use this button'] = "Если вы сами хотите настроить эту опцию, нажмите кнопку";
$txt_install['Show me the details'] = 'Показать детали';
$txt_install['choose your thumb generator'] = 'Выберите способ для обработки изображений: ';
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
$txt_install['Database configuration'] = 'Настройки БД';
$txt_install['choose your database backend'] = 'Выберите БД, которую вы будете использовать: ';
$txt_install['mysql details title'] = 'Параметры БД MySQL';
$txt_install['database host'] = 'Server hostname :';
$txt_install['database name'] = 'Database name :';
$txt_install['database user'] = 'User :';
$txt_install['database pass'] = 'Password :';
$txt_install['tables prefix'] = 'Tables prefix :';
$txt_install['remove invalid characters'] = '* Remove invalid character(s)';
$txt_install['mysql connection error, see errors'] = 'Невозможно соединиться с БД:';
$txt_install['database structure sucessfully created'] = 'Структура БД создана';
$txt_install['database structure already exists'] = 'Вы можете перейти к следующему шагу';
$txt_install['error while creating database structure'] = 'An error has occured while creating the database structure';

// Step 6
$txt_install['Administrator account creation'] = 'Создание аккаунта администратора';
$txt_install['Username'] = 'Username :';
$txt_install['Password'] = 'Password :';
$txt_install['Congratulations, administrator account %s has been created'] = 'Поздравляем, аккаунт %s создан';
$txt_install['An error has occured while creating your administrator account'] = 'An error has occured while creating your administrator account.';
$txt_install['please choose a login and password'] = 'You\'re about to finish the installation process, please choose a login and a password that you\'ll use to authenticate yourself as Administrator.';
$txt_install['Configuration file has been saved'] = 'Ваши настройки сохранены.';
$txt_install['An error has occured while saving your configuration file'] = 'An error has occured while saving your configuration file.';
$txt_install['You can now access your phpgraphy site'] = 'Теперь вы можете исрользовать вашу <a href="index.php">галерею phpGraphy</a> !';
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
Russian language pack by <a href="mailto:greenstars@land.ru">Roman / zam35</a>
						JiM / aEGIS.
';


?>
