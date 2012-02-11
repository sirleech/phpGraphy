<?php
/*
*  Copyright (C) 2004-2007 JiM / aEGIS and the phpGraphy DevTeam
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
*  $Id: default-config.inc.php 399 2007-01-28 15:46:56Z jim $
*
*/

/*****
*
*      /!\ WARNING, READ THIS /!\ WARNING, READ THIS /!\ WARNING, READ THIS /!\
*
* Since release 0.9.11, this file shouldn't be edited anymore, it is used to initialize
* default configuration values, if you want to change some settings, you can now either
* use the web interface or edit config.ini.php file located in the conf directory.
*
*      /!\ WARNING, READ THIS /!\ WARNING, READ THIS /!\ WARNING, READ THIS /!\
*
*****/


/*****
*
* Installation related
*
*****/

/***
* directive: admin_ip
* type: string
* available_from: 0.9.10
* category: main/misc
* tags: notingui, advanced
* description: Your IP address, it need to be provided during the installation procedure
*   so that nobody else is able to create an administrator account on your behalf.
*   If you don't know what your IP address is don't worry it will be given to you 
*   during the installation procedure.
* example: "193.29.43.244", "192.168.0.1", "127.0.0.1"
***/
$config['admin_ip'] = '';

/***
* directive: install_mode
* type: boolean
* available_from: 0.9.10
* category: main/misc
* tags: notingui, advanced 
* description: Enable install_mode, you'll then be redirected to the installation process pages
***/
$config['install_mode'] = 0;



/*****
*
* Directories location
*
*****/


/***
* directive: pictures_dir
* type: string
* available_from: 0.9.11
* category: main/path
* tags: readonly, advanced
* description: Path to your pictures (with a trailing slash '/'), replace the old $root_config variable
* example: "pictures/" or "/home/http/htdocs/pictures/" or "../pictures/")
***/
$config['pictures_dir'] = 'pictures/';

/***
* directive: data_dir
* type: string
* category: main/path
* tags: readonly, advanced
* description:	Path to data files (with a trailing slash '/'). 
*   This directory is mainly used with the flat file database backend but 
*   it contains also others data files like one for the EXIF function.
* example: "data/" or "../data/"
***/
$config['data_dir'] = 'data/';



/*****
*
* Thumbnails/Lowres pictures generation related
*
*****/


/***
* directive: thumb_generator
* type: select{gd,convert,manual}
* category: main/imagetools
* tags: install
* description: Tool used to generate thumbnails/lowresolution pictures.
* 	"gd" is the default and recommended choice.
* 	"convert" requires exec() permission and the ImageMagick to be installed and accessible from php.
* 	"manual" is a fallback choice if you want to handle thumbnails and low res images yourself.
*  note: The "auto" option is obsolete since version 0.9.11
***/
$config['thumb_generator'] = 'gd';

/***
* directive: thumb_generator_path
* type: string
* available_from: 0.9.11
* category: main/imagetools
* tags: advanced, install
* description:	If you use convert as 'thumb_generator', you may have to specify its path
* 		using this directive if it's not autodetected (ie: not in the $PATH, %PATH%).
*       note: This directive replace the old 'convert_path' one
* example: "/usr/bin/convert" or "C:\ImageMagick\convert.exe"
***/
$config['thumb_generator_path'] = '';

/***
* directive: movie_extractor
* type: select{ffmpeg,none}
* category: main/imagetools
* available_from: 0.9.13
* tags: install
* description: Tool used to extract frames from movies and generate a thumbnail from it
* 	"ffmpeg" requires exec() permission and the ffmpeg binary to be installed and accessible from php.
* 	"none" is the default choice
***/
$config['movie_extractor'] = 'none';

/***
* directive: movie_extractor_path
* type: string
* category: main/imagetools
* available_from: 0.9.13
* tags: advanced,install
* description: If you use ffmpeg as 'movie_extractor', you may have to specify its path
*       using this directive if not autodetected (ie: not in the $PATH, %PATH%).
* example: "/usr/bin/ffmpeg" or "C:\FFmpeg\FFmpeg.exe"
***/
$config['movie_extractor_path'] = '';

/***
* directive: thumb_res
* type: string
* category: display/pictures
* tags: 
* description:	Size (in pixels) of the generated thumbnails, width per height.
* Note that thumb_aspect will influes on the final dimensions by preserving or
* not the aspect ratio.
* example: "100x100"
***/
$config['thumb_res'] = '100x100';

/***
* directive: thumb_quality
* type: select{10,20,30,40,50,60,70,80,90,100}
* category: display/pictures
* tags: advanced
* description: Quality (from 10 to 100) of the generated thumbnails
***/
$config['thumb_quality'] = 60;

/***
* directive: thumb_aspect
* type: select{normal,square}
* category: display/pictures
* available_from: 0.9.12
* description: Aspect of generated thumbnails. 'normal' (default) preserve the ratio
* between width and height, the largest side won't be larger than the one specified
* in thumb_res. 'square' picture is cropped in the center, also note that only
* the left number of thumb_res is used.
***/
$config['thumb_aspect'] = 'normal';

/***
* directive: lr_limit
* type: string
* category: display/pictures
* tags: advanced
* description:	Size (in bytes) where we generate a low resolution picture.
*		Basically, if the picture is bigger than this size, a low resolution
*		picture will be generated.
* example: "1024*100" mean that if a picture is more than 100KBytes, we generate a low res.
***/
$config['lr_limit'] = 1024*100;

/***
* directive: lr_res
* type: string
* category: display/pictures
* tags: 
* description: Size (in pixels) of the generated low resolution pictures.
***/
$config['lr_res'] = '800x600';

/***
* directive: lr_quality
* type: select{10,20,30,40,50,60,70,80,90,100}
* category: display/pictures
* tags: advanced
* description: Quality (from 10 to 100) of the generated low resolution pictures.
***/
$config['lr_quality'] = 80;

/***
* directive: rotate_tool
* type: select{manual,exiftran,jpegtran}
* available_from: 0.9.10
* category: main/imagetools
* tags: install
* description: Tool used to losslessly rotate your pictures.
*   You can choose between "exiftran" and "jpegtran", both require exec() permission and
*   of course the choosen binary need to be accessible from php. "manual" is an equivalent to disabled
* 	as it will hide the rotate options.
* note: "auto" is obsolete since 0.9.11
***/
$config['rotate_tool'] = 'manual';

/***
* directive: rotate_tool_path
* type: string
* available_from: 0.9.10
* category: main/imagetools
* tags: install, advanced
* description: If you've setup a rotate_tool and it doesn't work,
*   you might need to specify its path here.
* example: "/usr/bin/exiftran"
***/
$config['rotate_tool_path'] = '';

/***
* directive: rotate_tool_args
* type: string
* available_from: 0.9.10
* category: main/imagetools
* tags: advanced
* description: Use this variable to redefine default arguments passed to rotate_tool,
*              change this with care, default should be fine in most cases.
* example: for jpegtran, "-copy all -perfect"
***/
$config['rotate_tool_args'] = '';



/*****
*
* Display and Functions preferences
*
*****/


/***
* directive: theme
* type: special
* available_from: 0.9.11
* category: display/layout
* description: Name of the active theme
*              (located under themes/ with a valid theme structure)
* example: "default", "mytheme"
***/
$config['theme'] = 'default'; 

/***
* directive: directory_display_mode
* type: select{picture,icon,name}
* available_from: 0.9.11
* category: display/layout
* description: Choose the way you want to display directories when in browsing mode.
*   'picture'  display a picture with a nice frame border effect around, handle directory
*   title and also display statistics for each directory (numbers of files and sub-directories)
*   'icon' display a small folder icon just before the directory name.
*   'name' oldschool mode, only display the directory name.
***/
$config['directory_display_mode'] = 'picture';

/***
* directive: cover_picture_mode
* type: select{random,manual}
* available_from: 0.9.12
* category: display/layout
* description: When using the 'picture' mode of 'directory_display_mode' and no cover 
*    picture is actually set for a directory, what should phpGraphy do about it ?
*   'random'    Select automatically one random picture from the directory
*   'manual'    Don't do anything and let you handle the situation
*   Note that the 'random' mode can slow down your site as it does scan the content of 
*   every directory without cover.
***/
$config['cover_picture_mode'] = 'random';

/***
* directive: nb_thumbs_max
* type: int
* category: display/layout
* description: Maximum number of thumbnails per page. See also nb_col.
* tags: advanced
* example: "10" mean that you'll get 10 pictures per page
***/
$config['nb_thumbs_max'] = 12; 

/***
* directive: nb_col
* type: int
* available_from: 0.9.11
* category: display/layout
* tags: advanced
* description: Maximum number of columns per page to display the thumbnails.
*   See also nb_thumbs_max.
* example: "5" mean that you'll get 5 columns of pictures per page
***/
$config['nb_col'] = 3; 

/***
* directive: thumbs_order
* type: select{L2R,T2B,R2L}
* available_from: 0.9.11
* category: display/layout
* tags: advanced
* description: Set the order to display the thumbnails
*              L2R (left to right starting from the top), 
*              T2B (top to bottom starting from the left),
*              R2L (right to left starting from the top)
* example: "L2R" mean that you'll get the first picture on the top left corner and
*          the next one will be on its right
***/
$config['thumbs_order'] = 'T2B';

/***
* directive: files_sort_by
* type: select{filename,datetime}
* available_from: 0.9.11
* category: display/layout
* tags: advanced
* description: Default sort method for files, you can 
*              choose between 'filename' (default) and 'datetime'.
* example: "filename" or "datetime"
***/
$config['files_sort_by'] = 'filename';

/***
* directive: files_sort_order
* type: select{asc,desc}
* available_from: 0.9.11
* category: display/layout
* tags: advanced
* description: Default sort order for directories, you can 
*              choose between 'asc' (default) and 'desc' (reverse)
* example: "asc" or "desc"
***/
$config['files_sort_order'] = 'asc';

/***
* directive: dirs_sort_by
* type: select{filename,datetime}
* available_from: 0.9.11
* category: display/layout
* tags: advanced
* description: Default sort method for directory, you can 
*              choose between 'filename' (default) and 'datetime'.
* example: "filename" or "datetime"
***/
$config['dirs_sort_by'] = 'filename';

/***
* directive: dirs_sort_order
* type: select{asc,desc}
* available_from: 0.9.11
* category: display/layout
* tags: advanced
* description: Default sort order for directories, you can 
*              choose between 'asc' (default) and 'desc' (reverse)
* example: "asc" or "desc"
***/
$config['dirs_sort_order'] = 'desc';

/***
* directive: highres_min_level
* type: int
* category: display/pictures
* available_from: 0.9.10
* description:	Mininum level to be able to see high resolution pictures,
*		Value can be from 0 to 999.
*		"1" means that you need to be authenticated to see them,
*		"0" mean that everyone as access to them.
***/
$config['highres_min_level'] = 1;

/***
* directive: picture_link_action
* type: select{nextpic,switchres}
* category: display/layout
* available_from: 0.9.12
* tags: advanced
* description: Action when clicking on a picture (lowres/highres) in display mode
*		'nextpic' Jump to the next picture of the current directory (or a random one when in random mode)
*		'switchres' Switch between High Resolution and Low Resolution pictures. Note that access to High Resolution
*       pictures is limited by highres_min_level, such if the user hasn't sufficients privileges, the link won't
*       even be displayed.
***/
$config['picture_link_action'] = 'nextpic';

/***
* directive: use_comments
* type: boolean
* category: modules/comments
* description: Enable/Disable the use of the comments system
***/
$config['use_comments'] = 1;

/***
* directive: postcomment_min_level
* type: int
* available_from: 0.9.11
* category: modules/comments
* description: Minimum level required to post comments on images. 0 means that
*       everybody (including non authenticated visitors) can post comments. Any value greater
*       than 0 means that you need to be authenticated will a level at least equal
*       to the one specified here.
***/
$config['postcomment_min_level'] = 0;

/***
* directive: nb_last_commented
* type: int
* category: modules/comments
* description: Numbers of pictures on the last commented pictures page
***/
$config['nb_last_commented'] = 10;

/***
* directive: use_rating
* type: boolean
* category: modules/rating
* description: Enable/Disable the use of the rating system
***/
$config['use_rating'] = 1;

/***
* directive: nb_top_rating
* type: int
* category: modules/rating
* description: Numbers of pictures on the top rated pictures page
***/
$config['nb_top_rating'] = 10;

/***
* directive: highest_rating
* type: int
* available_from: 0.9.11
* category: modules/rating
* description: The maximum rating that can be given to a picture, from 1 to this number
*              Change this carefully, especially if you have already some pictures rated
*              as it would falsify the results.
***/
$config['highest_rating'] = 5;

/***
* directive: rating_score_mode
* type: select{average,formula}
* available_from: 0.9.12
* category: modules/rating
* description: Choose the way the global rating (score) is calculated for a picture.
*       'average' - Add the sum of all votes plus the rating_pre_votes and divide by the number of votes
*       'formula' - Use a formula that will compute average rating and number of votes to give a score.
*       This method give a better thought as the number of votes as a real impact on the final score.
***/
$config['rating_score_mode'] = 'average';

/***
* directive: rating_pre_votes
* type: int
* available_from: 0.9.13
* category: modules/rating
* tags: advanced
* description: When using 'average' as rating_score_mode, add some default votes with an average rating,
*              this is to avoid that a picture with a single vote of 5 get a highest final rating than 
*              a picture with 4 votes of 5 and 1 vote of 4. It can be assimilated to a counter-balance.
*              Value is a integer between 0 and 9.
***/
$config['rating_pre_votes'] = 3;

/***
* directive: nb_last_added
* type: int
* available_from: 0.9.11
* category: modules/lastadded
* description: Numbers of pictures/directories on the last added pictures/directories page
***/
$config['nb_last_added'] = 10;

/***
* directive: use_exif
* type: boolean
* category: modules/metadata
* description:	Enable/Disable the use of the EXIF metadata.
*   If enabled, EXIF metadata will be displayed under each
*   picture that contains such information. Note that you
*   can customize the display of thoses informations by using
*   your own custom language file.
***/
$config['use_exif'] = 1;

/***
* directive: use_iptc
* type: boolean
* category: modules/metadata
* description:	Enable/Disable the use of the IPTC metadata.
*		If enabled, IPTC metadata will be displayed under each
*		picture that contains such information.
***/
$config['use_iptc'] = 1;

/***
* directive: metadata_title_field
* type: special
* category: modules/metadata
* description:	This define which EXIF/IPTC field should be used to fill (if empty)
*		the picture title.
* example: 'Iptc.ObjectName' or 'Iptc.Headline' or 'Exif.JpegComment'
***/
$config['metadata_title_field'] = 'Iptc.ObjectName';

/***
* directive: language_file
* type: special
* category: main/lang
* description:	Change the default language to one available in base/lang/ directory.
*   Please note that the english language will	still be used as fall-back, so if you
*   get some english text, it means that the external language file is incomplete.
* example: "lang_fr.inc.php"
***/
$config['language_file'] = '';



/*****
*
* Database preference/settings
*
*****/


/***
* directive: database_type
* type: select{file,mysql}
* category: main/database
* tags: readonly, install
* description:	This define your database backend. For now, you have the choice
*		between 'file' for default Flat Files Database and 'mysql' for MySQL.
***/
$config['database_type'] = 'file';

/***
* directive: db_host
* type: string
* available_from: 0.9.11
* category: main/database
* tags: readonly, install, advanced
* description: Name of the host running the MySQL database, if you don't know
*              try the default setting 'localhost', else ask your hosting compagny.
*              NOTE: Only needed if using MySQL.
* example: 'localhost', 'mysql.provider.com'
***/
$config['db_host'] = '';

/***
* directive: db_name
* type: string
* available_from: 0.9.11
* category: main/database
* tags: readonly, install, advanced
* description: Name of the database that will contain phpGraphy tables.
*              NOTE: Only needed if using MySQL.
* example: 'phpgraphy', 'accountname'
***/
$config['db_name'] = '';

/***
* directive: db_user
* type: string
* available_from: 0.9.11
* category: main/database
* tags: readonly, install, advanced
* description: Username of your MySQL account.
*              NOTE: Only needed if using MySQL.
***/
$config['db_user'] = '';

/***
* directive: db_pass
* type: string
* available_from: 0.9.11
* category: main/database
* tags: notingui
* description: Password of your MySQL account.
*              NOTE: Only needed if using MySQL.
***/
$config['db_pass'] = '';

/***
* directive: db_prefix
* type: string
* available_from: 0.9.11
* category: main/database
* tags: readonly, install, advanced
* description: Prefix used for phpGraphy tables
*              NOTE: Only needed if using MySQL.
* example: 'phpg_', 'phpgraphy_'
***/
$config['db_prefix'] = '';

/***
* directive: db_use_mysql_pconnect
* type: boolean
* available_from: 0.9.12
* category: main/database
* tags: advanced
* description: Enable/disable MySQL persistent connection 'mysql_pconnect()'
*              See http://www.php.net/manual/en/features.persistent-connections.php for details.
*              NOTE: Only needed if using MySQL.
***/
$config['db_use_mysql_pconnect'] = 1;


/*****
*
* Behaviour related variables
*
*****/


/***
* directive: debug_mode
* type: select{0,1,2,3,4}
* category: main/behavior
* tags: advanced
* description:	Change verbosity of the errors messages. If you have any problems that you can't resolve,
*               start by increasing the value of this setting. Keep also in mind that setting a high level
*               of debugging might reveal details about your configuration.
*	        0 = disabled, 1 = normal, 2 = verbose, 3 = development/debugging, 4 = development/debugging+
***/
$config['debug_mode'] = 2;

/***
* directive: use_session
* type: boolean
* category: main/behavior
* tags: advanced
* description:	Enable/Disable session authentication scheme.
*		On some servers, it's not available/possible, and such you won't have the
*       choice but to use the default cookie authentication mechanism.
*		If use_session is enable, checking the 'remember me' box on the login page
*       will use cookie instead of session authentication scheme.
***/
$config['use_session'] = 1;

/***
* directive: use_ob
* type: boolean
* category: main/behavior
* tags: advanced
* description:	Enable/Disable "Output Buffering". You can improve performance by  
*		more than 20% if enabled but you might also have some border effects in some
*		very specific cases.
***/
$config['use_ob'] = 0;

/***
* directive: use_flock
* type: boolean
* category: main/behavior
* tags: advanced
* description:	Enable/Disable "File Locking" mechanism. This option is only used
*		with the flat file database backend and is HIGHLY recommended to avoid data loss
*		due to concurrents writing access. It may be turned off on small sites but
*		if you've have to turn it off, I would rather recommend you to use MySQL.
***/
$config['use_flock'] = 1;

/***
* directive: use_sem
* type: boolean
* category: main/behavior
* tags: advanced
* description:	Enable/Disable "Semaphore" mechanism. This option is only used
*	when you've choosen 'convert' as thumb_generator. It allow to restrict
*	the number of simultaneous processes and such will limit the use of your
*   CPU when generating all thumbnails/lowresolution pictures.
*	This feature is still experimental, use it carrefully.
***/
$config['use_sem'] = 0;

/***
* directive: script_name
* type: string
* available_from: 0.9.11
* category: main/behavior
* tags: advanced
* description: Use *ONLY* if you have problem with forms.
*    On some PHP installation, the global variable SCRIPT_NAME is filled with erronous values.
*    It should normally contain the path to access your page like "/phpgraphy/index.php"
*   or "index.php" but in some cases it get filled in with values like "/cgi-bin/php"
*   If you're in this case, use this directive to correct the problem.
* example: "index.php" or "/phpgraphy/index.php"
***/
$config['script_name'] = '';

/***
* directive: exclude_files_preg
* type: string
* available_from: 0.9.10
* category: display/pictures
* tags: advanced
* description:	This variable contain a perl regexp (Regular Expression) 
* of files/directories to exclude when parsing directories.
* Please modify it carefully as an improper value may break your whole site
* and/or render previously invisible files visible.
***/
$config['exclude_files_preg'] = '/^(\..*|_comment|thumbs.db)/i';

/***
* directive: default_file_permissions
* type: int
* available_from: 0.9.13
* category: main/behavior
* tags: advanced
* description:	If set, file permissions will be changed to the value specified here, acceptable values
*               are the same as the ones accepted by the chmod command of the form 0xxx. 
*               See http://php.net/manual/en/function.chmod.php for details
* example: '0664', '0644', '0600'
***/
$config['default_file_permissions'] = '';

/***
* directive: use_direct_urls
* type: int
* available_from: 0.9.13
* category: main/behavior
* tags: advanced
* description: WARNING - Read very carefully what will happen if you enable this feature.
*              If set to 1, phpGraphy will try to use whenever possible direct links to pictures.
*              This is a huge benefit performance wise, however than means that people can browse through your
*              pictures directory directly (without the phpGraphy interface). It is not recommended to use the
*              flat file database along with this option as people will be able to see some data files stored in
*              the pictures directory. To summarize, enabling this option completely disable any "security level"
*              feature of phpGraphy.
*              Note that you need to remove the default .htaccess file located in the pictures/ directory so that
*              pictures become directly accessible (such direct_urls name).
*              This option is recommended for popular public sites along with mysql as backend database.
***/
$config['use_direct_urls'] = 0;

/*****
*
* List of obsoletes variables, kept here in case someone is wondering what did happen to them.
*
* $root_dir has been replaced by $config['pictures_dir']
* $convert_path has been replaced by $config['thumb_generator_path']
* $sDB, $sUser, $sPass, $sServer have been replaced by $config['db_name, db_user, db_password, db_host']
* 
* Soon obsolete: $sTable, $sTableUsers, $sTableComments, $sTableRatings
*                To be replaced by the use of $config['db_prefix']
*
*****/

/***
* directive: root_dir
* type: string
* obsolete_since: 0.9.11
* replaced_by: pictures_dir
* description: Path to your pictures (with trailing '/').
* example: "pictures/" or "/home/http/htdocs/pictures/" or "../pictures/")
***/

/***
* directive: icons_dir
* type: string
* obsolete_since: 0.9.11
* tags: readonly, advanced
* description:	Path to icons/images used by phpGraphy (with trailing '/'),
* 		        default should be fine in most cases.
* example: "graphics/" or "someothername/"
***/


/***
* directive: convert_path
* type: string
* obsolete_since: 0.9.11
* replaced_by: thumb_generator_path
* description:	If you use convert as $config['thumb_generator'], you can specify its path
* 		using this directive (leave blank for auto detection).
* example: "/usr/bin/convert"
***/

/***
* directive: nb_pic_max
* type: string
* obsolete_since: 0.9.11
* replaced_by: nb_thumbs_max
* description: Maximum number of pictures per column (2 columns per page)
* example: "5" mean that you'll get 10 pictures per page
***/

/***
* directive: iptc_title_field
* type: special
* obsolete_since: 0.9.11
* replaced_by: metadata_title_field
* description:	This define which IPTC field should be used to fill (if empty)
*		the picture title/description.
* example: 'Iptc.ObjectName' or 'Iptc.Headline'
***/

?>
