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
*  $Id: yorsh-varval-request_data.inc.php 422 2007-12-18 12:38:33Z jim $
*
*/

/**
* Yorsh Variable Validation (Class extend with phpGraphy $_REQUEST data)
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

class RequestYorshVariableValidation extends YorshVariableValidation
{

    var $_var_name_ref = array();
    var $_var_constraint_ref = array();


    function RequestYorshVariableValidation()
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
            'empty' => '0',
            'maxlength' => '32'
            ),
    // string: value can be anything with a maximum length of 255 characters, can not be empty
        'string' => array(
            'constraint' => 'string',
            'empty' => '0',
            'maxlength' => '255'
            ),

        /* COOKIE */

        'PHPSESSID' => array(
            'constraint' => 'alphanum',
            'empty' => 0,
            'maxlength' => 33
            ),
        'phpGraphyLoginValue' => array(
            constraint => 'int',
            'maxlength' => 150
            ),
        'phpGraphyVisitorName' => array(
            constraint => 'username',
            'maxlength' => 35
            ),

        /* GET/POST */

        'action' => array(
            'constraint' => 'alpha',
            'empty' => 0,
            'maxlength' => 7
            ),
        'addcomment' => array(
            'constraint' => 'bool'
            ),
        'addingcomment' => array(
            'constraint' => 'bool'
            ),
        // Advanced mode (used with $mode=config)
        'advanced' => array(
            'constraint' => 'bool'
            ),
        'rss' => array(
            'constraint' => 'bool',
            ),
        'batch_action' => array(
            'constraint' => 'batch_action'
            ),
        // Category (used with $mode=config)
        'cat' => array(
            'constraint' => 'alpha',
            'maxlength' => 10
            ),
        'comment' => array(
            'constraint' => 'multiline',
            'maxlength' => 1024
            ),
        'create' => array(
            'constraint' => 'bool'
            ),
        'createdirname' => array(
            'constraint' => 'external_path'
            ),
        'copyfromurl' => array(
            'constraint' => 'bool'
            ),
        'delcom' => array(
            'constraint' => 'int',
            'maxlenght' => 4
            ),
        'deldir' => array(
            'constraint' => 'bool'
            ),
        'dir' => array(
            'constraint' => 'external_path'
            ),
        'dircreate' => array(
            'constraint' => 'bool'
            ),
        'dirlevel' => array(
            'constraint' => 'int',
            'maxlength' => 4
            ),
        'dirthumbnail' => array(
            'constraint' => 'filename'
            ),
        'dirtitle' => array(
            'constraint' => 'string',
            'maxlength' => 100
            ),
        'dirthumbchange' => array(
            'constraint' => 'bool'
            ),
        'display' => array(
            'constraint' => 'external_path'
            ),
        'displaypic' => array(
            'constraint' => 'external_path'
            ),
        'dsc' => array(
            'constraint' => 'string',
            'maxlength' => 1024
            ),
        'editwelcome' => array(
            'constraint' => 'bool'
            ),
        'from' => array(
            'constraint' => 'int'
            ),
        'lastaddedpictures' => array(
            'constraint' => 'external_path'
            ),
        'lastaddedpicturesperdir' => array(
            'constraint' => 'bool'
            ),
        'lastcommented' => array(
            'constraint' => 'external_path'
            ),
        'lev' => array(
            'constraint' => 'int',
            'maxlength' => 4
            ),
        'login' => array(
            'constraint' => 'bool'
            ),
        'logout' => array(
            'constraint' => 'bool'
            ),
        // phpGraphy mode (config, display, etc.)
        'mode' => array(
            'constraint' => 'mode'
            ),
        // Number of upload form fields
        'nb_ul_fields' => array(
            'constraint' => 'int',
            'maxlength' => 2
            ),
        'non_lr' => array(
            'constraint' => 'bool'
            ),
        'pass' => array(
            'constraint' => 'password',
            'empty' => 0,
            'maxlength' => 32
            ),
        'picupload' => array(
            'constraint' => 'bool'
            ),
        'picname' => array(
            'constraint' => 'external_path'
            ),
        'picuploadname' => array(
            'constraint' => 'filename',
            'empty' => 0,
            'maxlength' => 50
            ),
        'popup' => array(
            'constraint' => 'bool'
            ),
        'previewpic' => array(
            'constraint' => 'external_path'
            ),
        'random' => array(
            'constraint' => 'bool'
            ),
        'rating' => array(
            'constraint' => 'int',
            'maxlength' => 4
            ),
        'rememberme' => array(
            'constraint' => 'checkbox'
            ),
        'rotatepic' => array(
            'constraint' => 'int',
            'maxlength' => 1
            ),
        'startlogin' => array(
            'constraint' => 'bool'
            ),
        'startpic' => array(
            'constraint' => 'int',
            'maxlength' => 8
            ),
        // Sub-Category (used with $mode=config)
        'subcat' => array(
            'constraint' => 'alpha',
            'maxlength' => 10
            ),
        'toprated' => array(
            'constraint' => 'external_path'
            ),
        'updwelcome' => array(
            'constraint' => 'bool'
            ),
        'updpic' => array(
            'constraint' => 'updpic',
            'empty' => 0
            ),
        'updatedir' => array(
            'constraint' => 'bool',
            ),
        'upload' => array(
            'constraint' => 'bool'
            ),
        // Used to activate the config update
        'updateconfig' => array(
            'constraint' => 'bool'
            ),
        'user' => array(
            'constraint' => 'string',
            'empty' => 0,
            'maxlength' => 30,
            'desc' => 'Username when posting a comment'
            ),
        'userurl' => array(
            'constraint' => 'url',
            'empty' => 0,
            'maxlength' => 512
            ),
        'welcomedata' => array(
            'constraint' => 'multiline',
            'empty' => 1,
            'maxlength' => 4096
            ),
        'uid' => array(
            'constraint' => 'int',
            'empty' => 0
            )
        );


    /**
     * Array with all recognized/registered constraint and associated properties
     * supported properties
     * pregex: perl regular expression pattern
     * function: user function's name (must return true if test passed (take $value as only argument))
     *
     * Used by check_variable()
     *
     * @see var_name_ref
     */
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
        'word' => array(
            'pregex' => '/^\w+$/' // PCRE word (include the '_')
            ),
        'multiline' => array(
            'pregex' => '/^.+$/m' // Match everything AND accept CR/LF and such must be used with caution
            ),

        /* Custom constraints */

        'batch_action' => array(
            'pregex' => '/^(generateall|delete(all|thumbs))$/'
            ),
        'checkbox' => array(
            'pregex' => '/^(on)?$/'        // checkbox forms are only set 'on' when checked else nothing
            ),
        'mode' => array(
            'pregex' => '/^(config|um|viewlog|slideshow|batch|saveas|js)$/'
            ),
        'username' => array(
            'pregex' => '/^[\w@\.-]+$/' // alphanumeric, but also '-', '_', '@', '.'
            ),
        'password' => array(
            // Some special characters are allowed (no space)
            'pregex' => '/^[\w!?^&\*@#,:;\(\)\/\.+-]+$/'
            ),
        'external_path' => array(
            // alphanumeric and . , - _ [ ] / ' & # (Would be nice to discard '../')
            // Null allowed and 255 chars max as the mysql field is also limited to 255
            // Accented characters (in hex): \xdf\xe0\xe1\xe2\xe3\xe4\xe5\xe6\xe7\xe8\xe9\xea\xeb\xec\xed\xee\xef\xf0\xf1\xf2\xf3\xf4\xf5\xf6\xf9\xfa\xfb\xfc\xfd\xff
            'pregex' => '/^[\w\.,@#~&\[\]\(\)\ \'\/\xdf\xe0\xe1\xe2\xe3\xe4\xe5\xe6\xe7\xe8\xe9\xea\xeb\xec\xed\xee\xef\xf0\xf1\xf2\xf3\xf4\xf5\xf6\xf9\xfa\xfb\xfc\xfd\xff-]{0,255}$/',
            'function' => 'validate_external_path'
            ),
        'filename' => array(
            // same as path without the /
            'pregex' => '/^[\w\.,@#~&\[\]\(\)\ \'\xdf\xe0\xe1\xe2\xe3\xe4\xe5\xe6\xe7\xe8\xe9\xea\xeb\xec\xed\xee\xef\xf0\xf1\xf2\xf3\xf4\xf5\xf6\xf9\xfa\xfb\xfc\xfd\xff-]{0,255}$/',
            ),
        'url' => array(
           'pregex' => '/^(http|ftp):\/\/.+$/'
            ),
        'text_wo_html' => array(
            'function' => 'validate_no_html'
            ),
        'updpic' => array(
            'pregex' => '/^(1|del|delthumb)$/'
            )

        );

    }


    /**
     * User function to validate an external path (called from an url)
     * The path need to be relative and should NOT be starting with either
     * a . or ./ or all equivalents, starting with a / is also NOT allowed
     * This is to prevent eventual security level checks bypass.
     *
     * @param string $path
     * @return true | false
     */
    function validate_external_path($path)
    {

        if (substr($path,0,1) == ".")  return false;
        if (substr($path,0,1) == "/")  return false;
        if (substr($path,0,1) == "~") return false;
        if (substr($path,0,2) == "./") return false;
        if (substr($path,0,2) == "/.") return false;

        if (strstr($path, ".."))       return false;
        if (strstr($path,".thumbs"))   return false;

        return true;

    }

    /**
     * User function to validate that a string doesn't contain any HTML
     * (This function is only here for test, you should not rely on it)
     *
     * @var $input
     * @return true | false
     */
    function validate_no_html($input)
    {

        // This regexp deny any content between barkets
        if (preg_match('/<.+>/m', $input)) return false;

        return true;

    }

}

?>
