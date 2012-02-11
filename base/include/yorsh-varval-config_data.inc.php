<?php

/*
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
*  $Id: yorsh-variablevalidation-data.inc.php 160 2005-09-25 23:04:04Z jim $
*
*/

/**
* Yorsh Variable Validation (Class extend with phpGraphy config data)
*
* Yorsh Variable Validation class enables you to maintain
* a central list of variables with attached properties
* so that you can easily check if they're valid.
*
* Originally written for phpGraphy {@link http://phpgraphy.sourceforge.net}.
*
* @author JiM / aEGIS
* @version 0.3
* @copyright 2005 - jim [at] aegis [hyphen] corp [dot] org
*
*/


class ConfigYorshVariableValidation extends YorshVariableValidation
{

    var $_var_name_ref = array();
    var $_var_constraint_ref = array();


    /**
     * Copy of the original initialization but with values for both $_var_name_ref and $_var_constraint_ref
     */
    function ConfigYorshVariableValidation() 
    {

    $this->_debug = 0;
    $this->_var_status = array();
    $this->_var_name_ref = array(

    // Sample of variables using basic constraints (bool, int, string)

    // bool: value must be a single character (either 0 or 1), can not be empty (empty != zero)
        'bool' => array(
            'constraint' => 'bool',
            ),
    // int: value must be integer number with a maximum length of 32 characters, can not be empty
        'int' => array(
            'constraint' => 'int',
            'empty' => 0,       // This line is not really needed as if not present at all, empty is not allowed
            'maxlength' => 32   // Maxlength is the lenght in characters, not the maximum value of the integer
            ),
    // string: value can be anything with a maximum length of 255 characters, can not be empty
        'string' => array(
            'constraint' => 'string',
            'empty' => 0,       // This line is not really needed as if not present at all, empty is not allowed
            'maxlength' => 255
            ),
    // End of the examples, the following stuff is real !

        'admin_ip' => array(
            'constraint' => 'ip_address',
            'empty' => 1,
            ),
        'cover_picture_mode' => array(
            'constraint' => 'cover_picture_mode',
            'empty' => 1
            ),
        'data_dir' => array(
            'constraint' => 'path_with_trailing_slash',
            'maxlength' => 1024
            ),
        'database_type' => array(
            'constraint' => 'database_type',
            'empty' => 0
            ),
        'db_name' => array(
            'constraint' => 'database_name',
            'empty' => 1,
            'maxlength' => 48
            ),
        'db_host' => array(
            'constraint' => 'hostname',
            'empty' => 1,
           ),
        'db_user' => array(
            'constraint' => 'username',
            'empty' => 1,
            'maxlength' => 32
           ),
        'db_pass' => array(
            'constraint' => 'password',
            'empty' => 1,
            'maxlength' => 32
           ),
        'db_prefix' => array(
            'constraint' => 'word',
            'empty' => 1,
            'maxlength' => 32
           ),
        'db_use_mysql_pconnect' => array(
            'constraint' => 'bool'
          ),
        'debug_mode' => array(
            'constraint' => 'debug_mode',
            ),
        'default_file_permissions' => array(
            'constraint' => 'file_mode',
            'empty' => 1
            ),
        'dirs_sort_by' => array(
            'constraint' => 'sort_by',
            ),
        'dirs_sort_order' => array(
            'constraint' => 'sort_order',
            ),
        'directory_display_mode' => array(
            'constraint' => 'directory_display_mode',
            ),
        'exclude_files_preg' => array(
            'constraint' => 'pregex',
            'maxlength' => 1024
            ),
        'files_sort_by' => array(
            'constraint' => 'sort_by',
            ),
        'files_sort_order' => array(
            'constraint' => 'sort_order',
            ),
        'highres_min_level' => array(
            'constraint' => 'int',
            'maxlength' => 3
            ),
        'highest_rating' => array(
            'constraint' => 'int',
            'maxlength' => 2
            ),     
        'install_mode' => array(
            'constraint' => 'bool'
            ),
        'language_file' => array(
            'constraint' => 'language_file'
            ),
        'lr_limit' => array(
            'constraint' => 'arithmetic_expression'
            ),
        'lr_res' => array(
            'constraint' => 'picture_resolution',
            ),
        'lr_quality' => array(
            'constraint' => 'picture_quality',
            ),
        'metadata_title_field' => array(
            'constraint' => 'metadata_field'
            ),
        'movie_extractor' => array(
            'constraint' => 'movie_extractor',
            ),
        'movie_extractor_path' => array(
            'constraint' => 'internal_path',
            'empty' => 1,
            ),
        'nb_thumbs_max' => array(
            'constraint' => 'int',
            'maxlength' => 3
            ),        
        'nb_col' => array(
            'constraint' => 'int',
            'maxlength' => 2
            ),        
        'nb_last_added' => array(
            'constraint' => 'int',
            'maxlength' => 3
            ),        
        'nb_last_commented' => array(
            'constraint' => 'int',
            'maxlength' => 3
            ),        
        'nb_top_rating' => array(
            'constraint' => 'int',
            'maxlength' => 3
            ),        
        'picture_link_action' => array(
            'constraint' => 'picture_link_action',
            ),
        'pictures_dir' => array(
            'constraint' => 'path_with_trailing_slash',
            'maxlength' => 1024,
            ),
        'postcomment_min_level' => array(
            'constraint' => 'int',
            'maxlength' => 3
            ),
        'rating_score_mode' => array(
            'constraint' => 'rating_score_mode'
            ),
        'rating_pre_votes' => array(
            'constraint' => 'int',
            'maxlength' => 1
            ),
        'rotate_tool' => array(
            'constraint' => 'rotate_tool',
            ),
        'rotate_tool_path' => array(
            'constraint' => 'internal_path',
            'empty' => 1
            ),
        'rotate_tool_args' => array(
            'constraint' => 'string', // This is very permissive but the arguments are filtered when exec is called
            'empty' => 1
            ),
        'script_name' => array(
            'constraint' => 'script_name',
            'maxlength' => 200
            ),
        'theme' => array(
            'constraint' => 'theme_name',
            'maxlength' => 20
            ),
        'thumb_generator' => array(
            'constraint' => 'thumb_generator',
            ),
        'thumb_generator_path' => array(
            'constraint' => 'internal_path',
            'empty' => 1,
            ),
        'thumb_res' => array(
            'constraint' => 'picture_resolution',
            ),
        'thumb_aspect' => array(
            'constraint' => 'thumb_aspect',
            ),
        'thumb_quality' => array(
            'constraint' => 'picture_quality',
            ),
        'thumbs_order' => array(
            'constraint' => 'thumbs_order',
            ),
        'use_comments' => array(
            'constraint' => 'bool'
            ),
        'use_exif' => array(
            'constraint' => 'bool'
            ),
        'use_direct_urls' => array(
            'constraint' => 'bool'
            ),
        'use_flock' => array(
            'constraint' => 'bool'
            ),
        'use_iptc' => array(
            'constraint' => 'bool'
            ),
        'use_ob' => array(
            'constraint' => 'bool'
            ),
        'use_rating' => array(
            'constraint' => 'bool'
            ),
        'use_sem' => array(
            'constraint' => 'bool'
            ),
        'use_session' => array(
            'constraint' => 'bool'
            ),
      
    );
            


    $this->_var_constraint_ref = array(

        /* Basic constraints */

        'bool' => array(
            'pregex' => '/^(0|1)$/'
            ),
        'int' => array(
            'function' => 'is_numeric'
            ),
        'string' => array(
            'pregex' => '/^.+$/' // Match everything BUT doesn't accept CR/LF and such must be used with caution
            ),
        'alpha' => array(
            'pregex' => '/^[a-z]+$/i'
            ),
        'alphanum' => array(
            'pregex' => '/^[a-z0-9]+$/i'
            ),
        'pregex' => array(
            'function' => 'validate_preg' // Validate the syntax of a perl regular expression
            ),
        'word' => array(
            'pregex' => '/^\w+$/' // PCRE word (include the '_')
            ),
        'multiline' => array(
            'pregex' => '/^.+$/m' // Match everything AND accept CR/LF and such must be used with caution
            ),

        /* Custom constraints */

        'arithmetic_expression' => array(
            'pregex' => '/^[0-9]+(\+-*\/)?([0-9]+)?$/'
            ),
        'cover_picture_mode' => array(
            'pregex' => '/^(random|manual)$/'
            ),
        'database_type' => array(
            'pregex' => '/^(file|mysql)$/'
            ),
        'debug_mode' => array(
            'pregex' => '/^[01234]$/'
            ),
        'database_name' => array(
            'pregex' => '/^[a-zA-Z0-9\._-]+$/'
            ),
        'directory_display_mode' => array(
            'pregex' => '/^(name|icon|picture)$/'
            ),
        'filename' => array(
            // same as path without the /
            'pregex' => '/^[\w\.,\[\]\(\)\ \'-]{0,255}$/',
            ),
        'file_mode' => array(
            'pregex' => '/^0[7654210]{3}$/',
            ),
        'hostname' => array(
            'pregex' => '/^[a-z0-9\.-]{2,255}$/'
            ),
        'internal_path' => array(
            // alphanumeric and . , - _ [ ] / ' (Would be nice to discard '../')
            // Null allowed and 255 chars max as the mysql field is also limited to 255
            'pregex' => '/^[\w\.,:\[\]\(\)\ \'\/-]{0,255}$/',
            'function' => 'validate_internal_path'
            ),
        'ip_address' => array(
            // Can be optimised as it doesn't really check if the ip address is within a valid range, just the basic syntaxe
            'pregex' => '/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/'
            ),
        'language_file' => array(
            'pregex' => '/^lang_[a-z]{2}\.inc\.php$/'
            ),
        'metadata_field' => array(
            'pregex' => '/^(Iptc|Exif)\.[a-zA-Z0-9]+$/'
            ),
        'movie_extractor' => array(
            'pregex' => '/^(ffmpeg|none)$/'
            ),
        'password' => array(
            // Some special characters are allowed (no space)
            'pregex' => '/^[\w!?^&\*@#,:;\(\)\/\.+-]+$/'
            ),
        'picture_link_action' => array(
            'pregex' => '/^(nextpic|switchres)$/'
            ),
        'path_with_trailing_slash' => array(
            'pregex' => '/^[\w\.,:\[\]\(\)\ \'\/-]+\/$/',
            'description' => 'absolute or relative path with a trailing slash'
            ),
        'picture_resolution' => array(
            'pregex' => '/^[0-9]{1,4}x[0-9]{1,4}$/'
            ),
        'picture_quality' => array(
            'function' => 'validate_jpeg_quality'
            ),
        'rating_score_mode' => array(
            'pregex' => '/^(average|formula)$/'
            ),
        'rotate_tool' => array(
            'pregex' => '/^(manual|jpegtran|exiftran)$/'
            ),
        'script_name' => array(
           'pregex' => '/^\/?[a-zA-Z0-9\.]+$/'
            ),
        'sort_by' => array(
            'pregex' => '/^(filename|datetime)$/',
            ),
        'sort_order' => array(
            'pregex' => '/^(asc|desc)$/i',
            ),
        'theme_name' => array(
            'pregex' => '/^[a-z0-9_-]+$/'
            ),
        'thumb_generator' => array(
            'pregex' => '/^(manual|convert|gd)$/'
            ),
        'thumb_aspect' => array(
            'pregex' => '/^(normal|square)$/'
            ),
        'thumbs_order' => array(
            'pregex' => '/^(L2R|T2B|R2L)$/'
            ),
        'text_wo_html' => array(
            'function' => 'validate_no_html' 
            ),
        'username' => array(
            'pregex' => '/^[\w@\.-]+$/' // alphanumeric, but also '-', '_', '@', '.'
            ),

    );

        return true;

    }


    /**
    * User function to validate perl regular expression, it does just check that the expression is
    * valid, not if it does match a pattern. 
    * (Found on php.net - Submitted by alexbodn at 012 dot n@t dot il)
    *
    * @param string $preg
    * @return true | false
    */
    /* Commented out because not working...
    function validate_preg($preg)
    {

        $prefix = "";
        $suffix = "";
        
        if ($str[0] != '^') $prefix = '^';
        
        if ($str[strlen($str) - 1] != '$') $suffix = '$';
        
        $estr = preg_replace("'^/'", "\\/", preg_replace("'([^/])/'", "\\1\\/", $str));
        
        if (@preg_match("/".$prefix.$estr.$suffix."/", $str, $matches)) {
            return true; 
        } else return false;

    }
    */

    function validate_preg($preg)
    {
        // While we can find a way to do it without any error msg output, return true
        return true; 
    }

    /**
     * Validate that the argument is valid jpeg quality number (between 1 and 100)
     *
     * @param int $quality
     * @return true | false
     */
    function validate_jpeg_quality($quality) 
    {
        if ($quality > 0 && $quality <= 100) return true; else return false;
    }

    /**
     * User function to validate path
     *
     * @var $input
     * @return true | false
     */
    function validate_internal_path($path)
    {

        // TODO
        return true;

    }

}

?>
