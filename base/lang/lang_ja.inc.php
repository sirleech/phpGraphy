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
*  $Id: lang_ja.inc.php 406 2007-02-02 00:08:45Z jim $
*  EN-Revision: r275
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
    'language_name_english' => 'Japanese',
    'language_name_native'  => '日本語',
    'country_code'          => 'ja',
    'charset'               => 'UTF-8',
    'direction'             => 'ltr',
    'for_version'           => '0.9.12',
    'translator_name'       => 'Tadashi Jokagi',
    'translator_email'      => 'elf2000 [at] users [dot] sourceforge [dot] net'
    );

// Title of your website
$txt_site_title="私の phpGraphy のサイト";

// txt_root_dir: text that specify the root of your gallery
$txt_root_dir="root";

// the following variables defines the text used for navigating the gallery
// you can change them to fit your needs and also use images (http://tofz.org/ style)
// e.g: $txt_previous_page='<img src="/gfx/my_previous_image_button.gif">';


// Picture/Thumbs viewing/navigation
$txt_files='ファイル';
$txt_dirs='ディレクトリ';
$txt_last_commented="最後にコメントされた写真";

// Rating (if activated)
$txt_no_rating="";
$txt_thumb_rating="評価 :";
+$txt_pic_rating="評価 :";
+$txt['%.1f with %s votes'] = '<b>%.1f</b> (投票数 : %s)';
$txt_option_rating="この写真を評価する";
$txt['Best rating'] = 'いい評価';
$txt['Worst rating'] = '悪い評価';
$txt['Rate !'] = '投票 !';

$txt_back_dir='^上へ^';
$txt_previous_image='&lt;- 前へ';
$txt_next_image='次へ -&gt;';
$txt_hires_image=' +高い解像度+ ';
$txt_lores_image=' -低い解像度- ';

$txt_previous_page='&lt;- 前のページ -| ';
$txt_next_page=' |- 次のページ -&gt; ';

$txt_x_comments="コメント";

$txt_comments="コメント :";
$txt_add_comment="コメントを追加する";
$txt_comment_from="From: ";
$txt_comment_on=" on ";
$txt['*filtered*'] = '*filtered*';

// Last commented pictures page
$txt_last_commented_title="最後の %s コメントの写真 :";
$txt_comment_by="by";

// Top rated pictures page
$txt_top_rated_title="トップ %s 評価の写真 :";

// Last added pictures/directories page
$txt['Last %s added pictures :'] = '最後に %s 追加した写真 :';
$txt['Last %s added pictures per directory :'] = '最後に %s 追加したディレクトリ毎の写真 :';

// Top Right Menu (stuff displayed when in admin mode are under the admin section)
$txt_login="ログイン";
$txt_logout="ログアウト";
$txt_random_pic="ランダム写真";


// Login page
$txt['authenticate yourself'] = '認証';
$txt_login_form_login="ログイン:";
$txt_login_form_pass="パスワード:";


// Add comment page
$txt_comment_form_name="名前:";
$txt_remember_me="(覚える)";
$txt_comment_form_comment="コメント:";

// Generic stuff (used in several places)
$txt_go_back = "戻る";
$txt_form_submit = "送信する";
$txt_ok = "OK";
$txt_failed = "FAILED";
$txt_ie = '例: ';
$txt['NOTE: '] = 'NOTE: ';
$txt['HTML and line breaks supported'] = 'HTML コンテンツと改行をサポート';
$txt['HTML tags will display in your post as text'] = 'HTML タグはテキストとして表示されるでしょう';


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

$txt['Found_IPTC_metadata'] = 'IPTC メタデータが見つかりました';
$txt['No_IPTC_metadata_found'] = ' IPTC メタデータが見つかりませんでした';

$txt_show_me_more="Show me more";

// SLIDESHOW
$txt['slideshow'] = 'スライドショー';
$txt['Slideshow previous'] = '&larr; 前へ';
$txt['Slideshow next'] = '次へ &rarr;';
$txt['Slideshow play'] = '再生';
$txt['Slideshow pause'] = '一時停止';
$txt['Slideshow close'] = '閉じる';
$txt['Slideshow delay'] = '遅延';
$txt['Slideshow %s sec'] = '%s 秒';
$txt['Slideshow slower'] = '+';
$txt['Slideshow faster'] = '-';

/********************************************************************************
* ADMIN Section
* Text only displayed once you're loggued in as an admin
* So if you, the admin, speak english, you probably won't need to translate this
*********************************************************************************/

// Top right menu (admin text)
$txt_admin['admin'] = '管理';
$txt_admin['Admin menu'] = '管理メニュー';
$txt_admin['Create a new directory'] = "新規ディレクトリの作成";
$txt_admin['Upload pictures/files'] = "写真/ファイルのアップロード";
$txt_admin['Batch Processing'] = 'バッチ処理中'; 
$txt_admin['phpGraphy Settings'] = 'phpGraphy の設定';
$txt_admin['Manage Users'] = 'ユーザーの管理';
$txt_admin['View logfile'] = 'ログファイルの閲覧';

// Picture/Thumbs viewing/navigation
$txt_admin['picture settings'] = '写真の設定';
$txt_admin['directory settings'] = 'ディレクトリの設定';
$txt_admin['title:'] = '題名: ';
$txt_admin['security level:'] = 'セキュリティのレベル: ';
$txt_admin['inherited:'] = ' 継承: ';
$txt_admin['cover picture:'] = '写真カバー: ';
$txt['select as cover picture'] = '現在のディレクトリのカバー写真として選択する';
$txt['change/remove'] = '変更/削除';
$txt['select one'] = '1 つ選択してください...';
$txt['remove current'] = 'これを削除';
$txt_delete_photo="写真を削除する";
$txt_delete_photo_thumb="サムネイルの再生成";
$txt_delete_directory_text="ディレクトリの削除";
$txt_edit_welcome=".welcome の編集";
$txt_del_comment="削除";

// Confirmation box
$txt_ask_confirm="本当にしますか ?";
$txt_delete_confirm="本当に削除しますか ?";

// Image rotation (if available with your config)
$txt['Rotate'] = '回転';
$txt['Rotate 90'] = '90 度回転';
$txt['Rotate 180'] = '180 度回転';
$txt['Rotate 270'] = '270 度回転';


// Editing the .welcome page
$txt_editing="編集中";
$txt_in_directory="in directory";
$txt_save="保存する";
$txt_cancel="取り消し";
$txt_clear_all="すべて消去";


// Directory creation page
$txt_admin['Create a Directory'] = 'ディレクトリを作成する';
$txt_admin['Current Directory:'] = '現在のディレクトリ: ';
$txt_dir_to_create="作成するディレクトリ:";

// Directory deletion
$txt_admin['Deleting %s'] = '%s の削除中';
$txt_admin['Directory deleted successfully'] = 'ディレクトリの削除に成功しました';
$txt_admin['Problem while deleting this directory'] = 'このディレクトリの削除中に問題です';
$txt_admin['Failed, will skip all subdirectories (Owner is \'%s\' )'] = '失敗しました。すべてのサブディレクトリを飛ばすでしょう (オーナーが「%s」です)';
$txt_admin['(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)'] = '(Please check errors msgs above, to resolve this you may have to delete (or change permissions) using your FTP access as it\'s very likely some pictures/directories belong to your FTP user.)';

// Lowres/Thumbs generation page
$txt_admin['Generating all missing thumbnails/low res pictures: (be patient)'] = 'すべての見当たらないサムネイル/低解像度写真を生成中: (忍耐強く)';
$txt_admin['Generating low res picture for %s'] = '%s の低解像度写真を生成中';
$txt_admin['Generating thumbnail picture for %s'] = '%s のサムネイル写真を生成中';
$txt_admin['Generated <b>%s</b> low res pictures and <b>%s</b> thumbnails.'] = '<b>%s</b> は低解像度写真とサムネイル<b>%s</b>を生成しました。';
$txt_admin['Nothing to do.'] = '何もしません。';
$txt_admin['Your library contains <b>%s</b> pictures.'] = 'ライブラリは画像 <b>%s</b> を含みます。';

$txt_admin['Batch action to execute: '] = '実行するバッチ操作: ';
$txt_admin['Generate all thumbnails/lowres'] = 'すべてのサムネイル・低解像度を生成する';
$txt_admin['Delete all thumbnails/lowres'] = 'すべてのサムネイル・低解像度を削除する';
$txt_admin['Delete all thumbnails'] = 'すべてのサムネイルを削除する';
$txt_admin['Error while deleting %s'] = '%s の削除中にエラー';
$txt_admin['Successfully deleted %s of %s files'] = '%2$s ファイル中 %$1s ファイルの削除に成功しました';
 


// File upload page
$txt_current_dir="Current directory :";
$txt_file_to_upload="アップロードするファイル数:";
$txt_upload_file_from_user="コンピューターからファイルをアップロードする";
$txt_upload_file_from_url="URL からファイルをアップロードする";
$txt_upload_change = "Changing the numbers of upload fields will require you to re-select all the files that you have previously choosen. It is recommend to Cancel, upload the actual files and choose a bigger number next time. Do you still want to continue ?";

// User management
$txt_add_user = 'ユーザーを追加する';
$txt_back_user_list = 'ユーザー一覧に戻る';
$txt_confirm_del_user = '本当にこのユーザーを削除しますか?';
$txt_user_info = 'ユーザー情報';
$txt_login_rule = '20 文字までのログイン名を指定します。';
$txt_login_ie = '例: john';
$txt_pass_rule = '32 文字までのパスワードを指定します。';
$txt_sec_lvl_rule = '1 と 999 の間でセキュリティーレベルを指定します。';
$txt_sec_lvl_ie = "例: 10";

$txt_um_login = 'ログイン名';
$txt_um_pass = 'パスワード';
$txt_um_sec_lvl = 'セキュリティレベル';
$txt_um_edit = '編集';
$txt_um_del = '削除';

// Configuration Editor page
$txt_admin['Settings'] = '設定';
$txt_admin['Description'] = '説明:';
$txt_admin['Example'] = '例:';
$txt_admin['Read-Only option'] = '<b>読み込み専用</b> - セキュリティー上の理由で、手動で %s を編集するか、install.php を用いてのみこのオプションを修正することができます。';
$txt_admin['Usage of install recommended'] = 'この設定を変更するためは <b>%s</b>の使用が推奨されます。';
$txt_admin['on'] = 'オン';
$txt_admin['off'] = 'オフ';
$txt_admin['Show advanced options'] = '高度なオプションを表示する';
$txt_admin['Value for %s is incorrect'] = '%s の値は間違っています';
$txt_admin['Successfully saved changes to config'] = '設定ファイルへ変更を保存することに成功しました';


// Misc
$txt_admin['INSTALL/DEBUG mode is active'] = "<b>警告</b>: INSTALL/DEBUG モードが有効 - 一旦終了し、config.ini.php にある \$debug_mode の値を低くしてください。";
$txt_admin['Javascript Disabled'] = "<b>警告</b>: ブラウザーは Javascript をサポートしていません。また、いくつかの機能にアクセスすることができないでしょう。";


/********************************************************************************
* ERROR messages
* This section is far from being complete but 
*********************************************************************************/

// 8xx is related to user management
$txt_error['00800'] = "エラー:";
$txt_error['00801'] = "UID が設定されていません";
$txt_error['00802'] = "UID が数字ではありません";
$txt_error['00803'] = "ログイン名は 1 から 20 文字で、「0-9 a-z @ - _」のいずれかの文字でなければいけません。";
$txt_error['00804'] = "ログイン名が設定されていません";
$txt_error['00805'] = "パスワードは 1 から 32 文字で、「0-9 a-z @ - _ , . : ; ( ) ^ ? ! / + * & #」のいずれかの文字でなければいけません。";
$txt_error['00806'] = "パスワードが設定されていません";
$txt_error['00807'] = "セキュリティレベルは 1 から 999 の間の整数でなければなりません。";
$txt_error['00808'] = "セキュリティレベルが設定されていません";
$txt_error['00809'] = "ログイン名は既に存在します";



/********************************************************************************
* INSTALL Part
* Text only displayed during the install process
*********************************************************************************/

$txt_install['next step'] = '次のステップ ->';

// Step 2
$txt_install['IP address check'] = 'IP アドレスの確認';
$txt_install['for security reasons, proove that it is your the admin'] = 'セキュリティー上の理由で、実際にこのサイトの管理者であることを証明する必要があります。';
$txt_install['finally, reload this page'] = '最後にこのページを <a href="javascript:window.location.reload()">再読み込み</a> する';
$txt_install['copy INI_FILE.sample to INI_FILE'] = 'ファイル「%s」をファイル名「%s」としてコピーする';
$txt_install['located under the conf subdir of phpgraphy dir'] = 'phpGraphy ディレクトリのサブディレクトリ「%s」にあります';
$txt_install['open INI_FILE with your favorite text editor and replace admin_ip with your ip'] = 'お気に入りのテキストエディタで「%s」を開き、「%s」の値をあなたの IP アドレスである %s に置換する';
$txt_install['upload INI_FILE on your webserver under the CONF_DIR dir'] = '%s をウェブサーバーのサブディレクトリ「%s」の下にアップロードする';

// Step 3
$txt_install['Directories Permissions'] = 'ディレクトリの権限';
$txt_install['test_result_passed'] = 'OK';
$txt_install['test_result_failed'] = '失敗';
$txt_install['Checking that the webuser can write in the following directories :'] = 'ウェブサーバーが次のディレクトリで書き込みができることをチェックします:';
$txt_install['you can not proceed next step'] = '上に挙げられた問題を修正し、ページを <a href="javascript:window.location.reload()">再読み込み</a> します。';
$txt_install['Is directory %s writable ?'] = 'ディレクトリ「%s」は書き込みできるか ?';
$txt_install['Is file %s writable ?'] = 'ファイル %s は書き込みできるか ?';
$txt_install['Directory %s used to store the sessions is not writable and sessions support has been disabled'] = 'ディレクトリ「%s」<span class="annotation">(セッションの保存に使用)</span>は書き込めないか、セッションのサポートが無効です。';

// Step 4
$txt_install['Image Tools Configuration'] = '画像ツールの設定';
$txt_install['Image Tools Configuration introduction'] = 'このページは、低解像度化、サムネイル生成に使用するソフトウェアの選択と、回転させるために使用するソフトウェアの選択ができます。インストールソフトウェアは、自動的に最良の選択を検知しました。もし、何を行っているか知らなくていいなら、単に次のステップに移ってください。';
$txt_install['If you know what you re doing, please use this button'] = "何を行っているか知りたい場合、このボタンを使用してください	";
$txt_install['Show me the details'] = '詳細を表示する';
$txt_install['choose your thumb generator'] = '画像処理のソフトウェアを選択してください: ';
$txt_install['gd not supported'] = 'GD はコンパイル時にサポートされていません';
$txt_install['gd missing JPG support'] = 'インストールされている GD のバージョンは JPEG サポートを含んでコンパイルされていません';
$txt_install['exec function disabled'] = 'exec() 関数は無効です';
$txt_install['auto-detection failed'] = '児童検知に失敗しました';
$txt_install['you need to specify %s path'] = '<b>%s</b> のパスを指定する <b>必要</b> があります: ';
$txt_install['you need to specify the program path'] = 'プログラムのパスを指定する <b>必要</b> があります: ';
$txt_install['no thumb_generator found intro'] = '画像処理のソフトウェアを見つけられません。下記の詳細を参照してください。';
$txt_install['no thumb_generator found conclusion'] = 'これがあなたのサーバーである場合、その問題を解決することができるに違いありません。さもなければ、サムネールをアップロードする以外ありません。また、低解像度自分自身を描写します。';
$txt_install['choose your rotate tool'] = '画像回転に使用するソフトウェアを選択してください: ';
$txt_install['rotate tool not available'] = '画像の回転は設定で exec() が無効になっているため、利用できません。';
$txt_install['exif has been disabled'] = 'EXIF サポートは PHP のインストールで無効なので利用できません。';

// Step 5
$txt_install['Database configuration'] = 'データベースの設定';
$txt_install['choose your database backend'] = '使用したいバックエンドデータベースを選択します: ';
$txt_install['mysql details title'] = 'MySQL データベースのパラメーター';
$txt_install['database host'] = 'サーバーのホスト名 :';
$txt_install['database name'] = 'データベース名 :';
$txt_install['database user'] = 'ユーザー名 :';
$txt_install['database pass'] = 'パスワード :';
$txt_install['tables prefix'] = 'テーブル接頭語 :';
$txt_install['remove invalid characters'] = '* 無効な文字の削除';
$txt_install['mysql connection error, see errors'] = 'データベースに接続できません。下記のエラーを確認してください:';
$txt_install['database structure sucessfully created'] = 'データベース構造の作成に成功しました。';
$txt_install['database structure already exists'] = '既存の有効なデータベース構造が見つかりました。次のステップに移ることができます。';
$txt_install['error while creating database structure'] = 'データベース構造の作成中にエラーが発生しました。';

// Step 6
$txt_install['Administrator account creation'] = '管理者アカウントの作成';
$txt_install['Username'] = 'ユーザー名 :';
$txt_install['Password'] = 'パスワード :';
$txt_install['Congratulations, administrator account %s has been created'] = 'おめでとうございます。管理者アカウント「%s」を作成しました。';
$txt_install['An error has occured while creating your administrator account'] = '管理者アカウントの作成中にエラーが発生しました。';
$txt_install['please choose a login and password'] = 'インストール処理を終了するところです。管理者として自分自身を認証るために使用するログイン名およびパスワードを選択してください。';
$txt_install['Configuration file has been saved'] = '設定ファイルを保存しました。';
$txt_install['An error has occured while saving your configuration file'] = '設定ファイルの保存中にエラーが発生しました。';
$txt_install['You can now access your phpgraphy site'] = '<a href="index.php">あなたの phpGraphy サイト</a> にアクセスできます!';
$txt_install['One or more problems have occured and your installation is NOT properly finished, please contact the phpGraphy DevTeam with the details of your error(s)'] = '1 つ以上の問題が生じました。また、<b>インストールは適切に終了されません。</b>エラーの詳細と共に phpGraphy 開発チームに連絡をとってください。';

// Initial .welcome file
$txt_install['welcome file content'] = 'こんにちは

これは写真ディレクトリに配置されたファイル <b>.welcome</b> です!
一旦管理者としてログインし、オンラインでこの内容を編集できます。

ここは基本的なインストール検証手続きです:

1/ 管理者としてログインしてください
2/ ディレクトリの作成を試みてください
3/ ファイルのアップロードを試みてください (ウェブインターフェース経由か FTP クライアント経由で)
4/ サムネイルが正しく生成されたか確認してください

一旦すべてこれが処理中ならば、これを編集し、ここに望むものを何でも置いてください。

<div style="border: solid 1px; width: 50%; padding: 5px;"><u>ティップ:</u>
ここに、HTML の使用の例があります。画像と考えられたトップを参照かあるいはimgリンクを使用して、画像を含めるために1のようなリンクを作成することができます。
<a href="?toprated=1">トップ評価の写真</a>を参照するか、img リンクを用いて写真を含んだリンクを作成することができます。
</div>

phpGrapy を選んでくれてありがとう。
私は、このソフトウェアを使用するのを楽しむことを望みます。バグに遭遇するか、すばらしい新機能アイデアを持っている場合、私と連絡をとってください。
(連絡先の詳細は <a href="http://phpgraphy.sourceforge.net">phpGraphy ウェブサイト</a> を参照してください)

						JiM / aEGIS.
';


?>
