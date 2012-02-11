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
*  $Id: yorsh-errorhandler.class.php 365 2006-09-27 14:16:52Z jim $
*
*/

/**
* Yorsh Custom Error Handler
*
* Yorsh Error Handler is just another custom ErrorHandler written in PHP, 
* originally for phpGraphy {@link http://phpgraphy.sourceforge.net}.
*
* @author JiM / aEGIS
* @version 0.2
* @copyright 2005 - jim [at] aegis [hyphen] corp [dot] org
*
*/

class YorshErrorHandler
{

// Values defined below won't be set with PHP4 except array's - It will work as expected with PHP5

    /**
    * Display variable, if set errors will be displayed
    * @see $errsev, ERROR_REPORT_LEVEL, LOG_FILE
    * @access private
    */
    var $_display = 1;

    /**
    * Previous value of display (used when temporary disabling display. to be able to restore previous state)
    * @see $_display
    * @access private
    */
    var $_saved_display = 0;


    /**
    * Log variable, if set, errors will be logged
    * @see $errsev, ERROR_REPORT_LEVEL, LOG_FILE
    * @access private
    * @var _log
    */
    var $_log = 0;

    /**
    * Verbose variable, if set errors msgs will have more details added such as filename,
    * line number, and context.
    * @access private
    * @var _verbose
    */
    var $_verbose = 0;

    /**
    * If enabled, DEBUG messages won't be displayed but stored in an array so that they can
    * be retrieved later. This setting doesn't impact logging but impact display
    * @access private
    * @var _bufferize_debug
    */
    var $_bufferize_debug = 0;

    /**
    * Used to store DEBUG msgs when bufferize_debug is enabled
    * @access private
    * @array debug_buffer
    */
    var $_debug_buffer = array();

    /**
    * Generic msg for fatal, if set a generic error msg will be displayed for fatal error
    * instead of the normal usual one.
    * @see $debug_mode
    * @access private
    * @var _generic_fatal
    */
    var $_generic_msg = 0;

    /**
    * Error level array, contain the differents errors level allowed
    * @see ERROR_REPORT_LEVEL
    * @access private
    * @var _error_levels
    */
    var $_error_levels = array('FATAL' => 256, 'ERROR' => 512, 'WARNING' => 1024, 'DEBUG' => 1025);


    /**
    * Error report level converted from string to the integer value
    * @see ERROR_REPORT_LEVEL
    * @access private
    * @var _error_report_level
    */
    var $_error_report_level = 512;


    /**
    * Class Initialisation function
    *
    * This function take two optionnal arguments as inputs, $_display and $_log which can both be changed after.
    * It return true if it has successfully replaced the default error handler.
    *
    * @param bool $_display, bool $_log, bool $_verbose, bool $_generic_msg
    * @return true|false
    * @see set_error_handler()
    */

    function YorshErrorHandler($_display = 1, $_log = 0, $_verbose = 0, $_generic_msg = 0)
    {

        // Populate class variables 
        // (And also init default values as PHP4 does not handle this at the declaration time)
        $this->_display = $_display;
        $this->_generic_msg = $_generic_msg;
        $this->_log = $_log;
        $this->_verbose = $_verbose;
        $this->_bufferize_debug = $_bufferize_debug;
        $this->_debug_buffer = $_debug_buffer;

        // Check the value of ERROR_REPORT_LEVEL
        $valid_values="";
        foreach ($this->_error_levels as $key => $value) {
           if (isset($valid_values)) $valid_values .= ", ";
           $valid_values .= $key;
        }

        if (!defined('ERROR_REPORT_LEVEL')) {
            trigger_error("ERROR_REPORT_LEVEL is not defined. Using default value.", E_USER_NOTICE);
            $this->_error_report_level = $this->_error_levels = 512;
        }
        if (!array_key_exists(ERROR_REPORT_LEVEL, $this->_error_levels)) {
            trigger_error("The error level defined for ERROR_REPORT_LEVEL is not supported valid values are $valid_values", E_USER_ERROR);
        } else {
            $this->_error_report_level = $this->_error_levels[ERROR_REPORT_LEVEL];
        }

        // Define constants for customized error level definition
        define('FATAL', E_USER_ERROR);
        define('ERROR', E_USER_WARNING);
        define('WARNING', E_USER_NOTICE);
        define('DEBUG', E_USER_NOTICE);

        // Take over from PHP error handling
        if (set_error_handler(array(&$this, 'handleError'))) return true; else return false;
    }

    /**
    * Handling Error function, replace the PHP's one
    *
    * This function take five arguments and should be called using the php function trigger_error()
    * There are others settings to change its behavior: $_display, $_log, $generic and off course
    * ERROR_REPORT_LEVEL.
    *
    * @see trigger_error(), set_error_handler(),  $_display, $_log, $generic, $_error_report_level
    * @param int $errno, string $errstr, string $errfile, int $errline, array $errcontext
    */

    function handleError($errno, $errstr, $errfile, $errline, $errcontext)
    {

        global $txt_errmsg;

        // As we use the $_verbose variable in the displayError function to include details,

        switch ($errno) {
            case FATAL:
                $errsev="FATAL";

                switch ($this->_generic_msg) {
                    case 0:
                        if ($this->_display) {
                            $this->displayError('FATAL ERROR', $errstr, $errfile, $errline, $errcontext);
                        }

                        // Log part
                        if ($this->_log) {
                           $this->logError($errsev, $errstr, $errfile, $errline, $errcontext); 
                        }
                        break;


                    case 1:
                        if ($this->_display) {
                            echo $txt_errmsg['fatal_generic'];
                        }

                        // Log part
                        if ($this->_log) {
                           $this->logError($errsev, $errstr, $errfile, $errline, $errcontext); 
                        }
                        break;

                }

                // Stop application
                exit;

                break;

            case ERROR:
                $errsev="ERROR";

                // Check the ERROR_LEVEL_REPORT
                if ($errno > $this->_error_report_level) return;

                // Display part
                if ($this->_display) {
                    $this->displayError($errsev, $errstr, $errfile, $errline, $errcontext);
                }

                // Log part
                if ($this->_log) {
                   $this->logError($errsev, $errstr, $errfile, $errline, $errcontext); 
                }

                break;

            // This uses the E_USER_NOTICE level and as there is only 3 levels available, we'll use for WARNING & DEBUG
            // If $errstr contains 'DEBUG:' at the beginning, we'll assume it's a DEBUG severity rather than a WARNING
            case WARNING:
                

                // Dissociating WARNING from DEBUG msgs
                if (preg_match('/^DEBUG:(.*)/', $errstr, $matches)) {
                    $errsev='DEBUG';
                    $errno=1025;
                    $errstr=$matches[1];
                } else {
                    $errsev='WARNING';
                }

                // Check the ERROR_LEVEL_REPORT
                if ($errno > $this->_error_report_level) return;
                
                // Add error to the buffer if bufferize_debug is enabled and if it's a debug msg
                if ($errsev == 'DEBUG' && $this->_bufferize_debug) {
                    // Store Errors in a buffer
                    $this->_debug_buffer[] = array(
                        'errsev' => $errsev,
                        'errstr' => $errstr,
                        'errfile' => $errfile,
                        'errline' => $errline,
                        'errcontext' => $errcontext
                        );
                }

                // Display part
                if ($this->_display && ($errsev != 'DEBUG' || !$this->_bufferize_debug)) {
                    $this->displayError($errsev, $errstr, $errfile, $errline, $errcontext);
                }

                // Log part
                if ($this->_log) {
                   $this->logError($errsev, $errstr, $errfile, $errline, $errcontext); 
                }
                break;

            default:
                // Handling of PHP generated errors
                $errortypes = array (
                    E_ERROR   => array( "str" => "ERROR", "no" => 256),
                    E_WARNING => array( "str" => "WARNING", "no" => 512),
                    E_PARSE   => array( "str" => "PARSE", "no" => 1025),
                    E_NOTICE  => array( "str" => "NOTICE", "no" => 1025)
                    );

                if (array_key_exists($errno, $errortypes)) {
                    // Check the ERROR_LEVEL_REPORT (errno are checked against the new defined values)
                    if ($errortypes[$errno]['no'] >= $this->_error_report_level) return;

                    // Display part
                    if ($this->_display) {
                        $this->displayError('PHP_'.$errortypes[$errno]['str'], $errstr, $errfile, $errline, $errcontext);
                    }
                }
        }

    }

    /**
    * Ouput the error to the screen using HTML formatted string
    *
    * This function take five arguments and is called from the main handleError()
    * It's behavior change depending on the value of $_verbose which we could associate
    * to a debug flag, add filename, linenumber to the output
    *
    * @see handleError(), $_verbose
    * @param int $errno, string $errstr, string $errfile, int $errline, array $errcontext
    */

    function displayError($errsev, $errstr, $errfile = null, $errline = null, $errcontext = null)
    {
        
        echo "<b>$errsev:</b> $errstr";
        if ($this->_verbose) {
            echo " in file <b>".basename($errfile)."</b> at line <b>$errline</b>";

            // The context may be interesting but is really verbose
            /*
            if ($errcontext) {
                echo "<br />See context below:<br /><pre>";
                var_dump($errcontext);
                echo "<pre>";
            }
            */
        }
        echo "<br />";

    }

    /**
    * Log the error to a file
    *
    * This function take five arguments and is called from the main handleError()
    * It's behavior change depending on the value of $_verbose which we could associate
    * to a debug flag, add filename, linenumber to the output
    *
    * @see handleError(), LOG_FILE
    * @param int $errno, string $errstr, string $errfile, int $errline, array $errcontext
    */

    function logError($errsev, $errstr, $errfile = null, $errline = null, $errcontext = null)
    {

        $errormsg=date("Y-m-d H:i:s")." ".$errsev." ".basename($errfile).":".$errline." ".strip_tags($errstr)."\n";
        error_log($errormsg, 3, LOG_FILE);

    }

    function setVerbose($verbose)
    {
        $this->_verbose = $verbose;
        return;
    }

    function getVerbose()
    {
        return $this->_verbose;
    }


    function setDisplay($display)
    {
        $this->_display = $display;
        return;
    }

    function getDisplay()
    {
        return $this->_display;
    }

    function disableDisplay()
    {
        // Save the current value of display
        $this->_saved_display = $this->_display;
        $this->setDisplay(0);
        return;
    }

    function restoreDisplay()
    {
        // Restore the previous value of display
        $this->_display = $this->_saved_display;
        return;
    }

    function setLog($log)
    {
        $this->_log = $log;
        return;
    }

    function getLog()
    {
        return $this->_log;
    }


    /**
     * Set status of bufferize_debug mode. 1 to enable, 0 to disable
     * @return true if succeed
     */
    function setBufferizeDebug($arg)
    {
        $this->_bufferize_debug = $arg;
        return true;
    }

    /**
     * Return status of bufferize_debug mode, 1 if enabled, 0 if disabled
     * @return var
     */
    function getBufferizeDebug()
    {
        return $this->_bufferize_debug;
    }

    /**
     * Return the content of the Debug Buffer
     * @return array
     */
    function getDebugBuffer() 
    {
        return $this->_debug_buffer;
    }

    function setGenericMsg($generic_msg)
    {
        $this->_generic_msg = $generic_msg;
        return;
    }

    function getGenericMsg()
    {
        return $this->_generic_msg;
    }

}

?>
