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
*  $Id: yorsh-variablevalidation.inc.php 157 2005-09-24 14:55:53Z jim $
*
*/

/**
* Yorsh Variable Validation (Main Class File)
*
* Yorsh Variable Validation class enables you to maintain
* a central list of variables with attached properties
* so that you can easily check if they're valid or not.
* 
* This file is by itself of no use, you need to extend it with a another class
* that contain data in $_var_name_ref and $_var_constraint_ref
*
* Originally written for phpGraphy {@link http://phpgraphy.sourceforge.net}.
*
* @author JiM / aEGIS
* @version 0.3
* @copyright 2005 - jim [at] aegis [hyphen] corp [dot] org
*
* Changelog:
*   0.3 - 2006-02-03 - Renamed var_type to var_constraint following advices
*                      from guyz at phplondon's meeting (Thx guyz :p)
*
*/

class YorshVariableValidation
{

    /**
     * Array with the list of all recognized names of variables, a variable must list here
     * to be considered as valid. The name then point to a constraint that must exists in $_var_constraint_ref
     *
     * @see $_var_constraint_ref
     */
    var $_var_name_ref;

    /**
     * Array with all recognized/registered constraint and associated properties
     * supported properties
     * pregex: perl regular expression pattern
     * function: user function's name (must return true if test passed (take $value as only argument))
     *
     * Used by check_variable()
     *
     * @see $_var_name_ref
     */
    var $_var_constraint_ref;

    /**
     * If set to 1, the class will output DEBUG msgs using E_USER_WARNING
     */
    var $_debug;

    /**
    * Array containg the status of checked variables
    *
    * See sample structure below:
    *
    * array(varname => array(
    *                   'is_valid' => 0,       // Has it successfully passed the check ?
    *                   'found' => 0,         // Is the variable name referenced ?
    *                   'valid_constraint' => 0,    // Is the constraint linked to the variable valid ?
    *                   'empty_allowed' => 0, // Has it successfully passed the empty test
    *                   'not_too_long' => 0,  // Has it successfully passed the lenght test
    *                   'pregex' => 0,        // Has it successfully passed the regexp test
    *                   'function' => 0       // Has it successfully passed the custom function test
    *                   ));
    *
    */
    var $_var_status;


    /**
     * Class Initialization
     */
    function YorshVariableValidation()
    {

        // Populate variables as the class init doesn't work with PHP < 5)
        $_var_name_ref = array();
        $_var_constraint_ref = array();

        
        // Populate class variables
        $this->_var_name_ref = $_var_name_ref;
        $this->_var_constraint_ref = $_var_constraint_ref;
        $this->_debug = 0;
        $this->_var_status = array();

        return true;
    }


    /**
     * Set the debug mode, 1 = on, 0 = off (default)
     * @param int $value 
     * @see get_debug_mode()
     */
    function set_debug_mode($mode)
    {
        if ($mode == 1) {
            $this->_debug = 1;
        } else $this->_debug = 0;
    }


    /**
     * Get the current value of debug mode (1 = on, 0 = off)
     * @return true|false
     * @see set_debug_mode()
     */
    function get_debug_mode()
    {
        if ($this->_debug) return true;
        else return false;
    }


    /**
     * Function that check a variable by matching its name with a reference array
     * If the variable is listed in $var_name_ref, then all the properties are checked
     * and if one of them fail, it will return false. This is used in phpGraphy in
     * combination with a loop to check the user input data (GET/POST/COOKIE).
     * 
     * @param string $varname
     * @param string $value
     * @return true|false
     */
    function check_var($varname, $value) 
    {
    
        /**
        * Array of all peformed by the function
        * All values should be set to 1 for the test to be successful
        * 
        * @var var_check
        */

        $var_check['found']         = 0;
        $var_check['valid_constraint']    = 0;

        /* Check below are optionnal and thus will be initialized only if needed
        *
        *  Checks like empty_allowed and not_too_long may be performed in a regexp
        *  but if no regexp is really needed after, then use them as they're faster
        *
        $var_check['is_valid']      = 0;
        $var_check['empty_allowed'] = 0;
        $var_check['not_too_long']  = 0;
        $var_check['pregex']        = 0;
        $var_check['function']      = 0;

        */

        // Testing structure

        if ($this->_var_name_ref[$varname]) {

            $var_check['found'] = 1;

            if (is_array($this->_var_constraint_ref[$this->_var_name_ref[$varname]['constraint']])) {
        
                $var_check['valid_constraint'] = 1;

                if (isset($this->_var_name_ref[$varname]['empty']) && !$value) {

                    $var_check['empty_allowed'] = 0;

                    if ($this->_var_name_ref[$varname]['empty']) {

                        $var_check['empty_allowed'] = 1;

                    }

                }


                if (isset($this->_var_name_ref[$varname]['maxlength'])) {

                    $var_check['not_too_long']  = 0;

                    if (strlen($value) <= $this->_var_name_ref[$varname]['maxlength']) $var_check['not_too_long'] = 1;

                }

                if ($value) {
                    // Performing additional checks (pregex, function)

                    // additional.pregex
                    if (isset($this->_var_constraint_ref[$this->_var_name_ref[$varname]['constraint']]['pregex'])) {
                        $var_check['pregex'] = 0;
                        if (preg_match($this->_var_constraint_ref[$this->_var_name_ref[$varname]['constraint']]['pregex'], $value)) {
                            $var_check['pregex'] = 1;
                        }
                    }

                    // additional.function
                    if (isset($this->_var_constraint_ref[$this->_var_name_ref[$varname]['constraint']]['function'])) {

                        $var_check['function'] = 0;

                        if (function_exists($this->_var_constraint_ref[$this->_var_name_ref[$varname]['constraint']]['function'])) {
                            // Generic PHP function
                            if (call_user_func($this->_var_constraint_ref[$this->_var_name_ref[$varname]['constraint']]['function'], $value)) {
                                $var_check['function'] = 1;
                            }
                        } else {
                            // Internal function declared in an extend
                            if (call_user_func(array($this, $this->_var_constraint_ref[$this->_var_name_ref[$varname]['constraint']]['function']), $value)) {
                                $var_check['function'] = 1;
                            }
                        }

                    }

                }

            }

        }

        // Let's now analyse the results and to see if one of the check has failed.

        $var_check_failed = 0;


        // This rely on the Yorsh Error Handler to be properly handle
        // $debug_output = "DEBUG: Checking var($varname) ";
        // if (strlen($value) > 50) $debug_output.= "stripped_";
        // $debug_output.= "value(".substr($value, 0, 50).")";
        // Uncomment if needed but this is very verbose
        // trigger_error($debug_output, E_USER_NOTICE);

        // Preparing an output with all details if it has failed
        $debug_output = "DEBUG: var($varname) content(".substr($value, 0, 50).") lenght(".strlen($value).") FAILED to validate - ";

        foreach ($var_check as $check => $status) {

            $debug_output.= "$check(";

            if ($status) {

                $debug_output.= "OK";

            } else {

                $debug_output.= "NOK";
                $var_check_failed = 1;
            }

            $debug_output.= ") ";

        }
        
        if (!$var_check_failed) $var_check['is_valid'] = 1; else $var_check['is_valid'] = 0;
        
        // Store the results of the tests
        $this->_var_status[$varname] = $var_check;
        // When no debugger is around, line below might be quiet useful ;)
        // if ($this->_debug) print_r_html($this->_var_status);

        if (!$var_check_failed) {

            if ($this->_debug) {
                $debug_output = "DEBUG: var($varname) was successfully checked";
                trigger_error($debug_output, E_USER_NOTICE);
            }

            return true;

        } else {

            if ($this->_debug) trigger_error($debug_output, E_USER_NOTICE);
            return false;

        }

    } //check_variable()

    function is_valid($varname)
    {
    
        if ($this->_var_status[$varname]['is_valid']) return true; else return false;
        
    }

    function is_found($varname)
    {
    
        if ($this->_var_status[$varname]['found']) return true; else return false;
        
    }


    // Check that all checked variables are valid, return true|false
    function is_all_valid()
    {

        foreach ($this->_var_status as $varname) {
            if (!$varname['is_valid']) return false;
        }
    
        return true;
    }

    // get_var_description() is obsolete
    function get_var_description($varname)
    {

        if ($this->_var_constraint_ref[$this->_var_name_ref[$varname]['constraint']]['description']) {

            return $this->_var_constraint_ref[$this->_var_name_ref[$varname]['constraint']]['description'];

        } else return false;

    }

/******************************************************/
/* Everything below is reserved for debugging purposes */
/******************************************************/


    function get_global_status_array()
    {
        return $this->_var_status;
    }

    function get_var_status_array($varname)
    {
        if ($this->_var_status[$varname]) {

            return $this->_var_status[$varname];

        } else return false;
    }

    function get_varname_ref_array()
    {

        return $this->_var_name_ref;

    }
    
    /* TODO: Add the following functions
    
get_status_array
get_status_constraint
get_status_empty_allowed
get_status_not_too_long
get_status_pregex
get_status_function

get_var_array
get_var_constraint
get_var_empty
get_var_maxlength
get_var_pregex
get_var_function
get_var_description
    
    */

}

?>
