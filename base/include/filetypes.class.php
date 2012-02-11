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
* $Id$
*
*/


/**
 * This class is an attempt to make life easier within phpGraphy code
 * on the filetypes side so that in one function call, it's possible
 * to know if the file is a handled picture or video.
 *
 * @author: JiM / aEGIS
 */
class phpGraphyFileTypes
{

    var $_handled_filetypes = array();


    function phpGraphyFileTypes() 
    {
        // Nothing done here since this class is only useful when used with a data subclass
        return true;
    }


    /** 
     * Return file's type if known and false if unknown (based on file's extension)
     * @param: string $filename
     */
    function getFileType($filename)
    {

        if ($filetype = $this->filetypes[$this->getFileExtension($filename)]['type']) {
            return $filetype;
        } else {
            return false;
        }

    }

    /** 
     * Return file's mime type if known and false if unknown (based on file's extension)
     * @param: string $filename
     */
    function getFileMimeType($filename)
    {

        if ($filetype = $this->filetypes[$this->getFileExtension($filename)]['mime']) {
            return $filetype;
        } else {
            return false;
        }

    }

    /** 
     * Return file's information as an hashed array, false if unknown (based on file's extension)
     * @param: string $filename
     */
    function getFileInfo($filename)
    {

        if ($filetype = $this->filetypes[$this->getFileExtension($filename)]) {
            return $filetype;
        } else {
            return false;
        }

    }

    /** 
     * Return true if $filename is handled (known in our database)
     * @param: string $filename
     */
    function isHandled($filename)
    {

        if (isset($this->filetypes[$this->getFileExtension($filename)])) {
            return true;
        } else {
            return false;
        }

    }

    /** 
     * Return true if $filename is an image (based on file's extension)
     * @param: string $filename
     */
    function isImage($filename)
    {

        if ($this->filetypes[$this->getFileExtension($filename)]['type'] == 'image') {
            return true;
        } else {
            return false;
        }

    }

    /** 
     * Return true if $filename is a video (based on file's extension)
     * @param: string $filename
     */
    function isVideo($filename)
    {

        if ($this->filetypes[$this->getFileExtension($filename)]['type'] == 'video') {
            return true;
        } else {
            return false;
        }

    }

    /**
     * Return a filename's extension in lowercase
     * Only using the filename given as argument to guess (not dealing with the file header)
     * @param: string $filename
     */
    function getFileExtension($filename)
    {
        if (preg_match('/\.(\w{3,4})$/i', $filename, $match)) {

            return strtolower($match[1]);

        } else {
            //trigger_error("Failed to retrieve extension of file '$filename'", E_USER_WARNING);
            return false;
        }

    }

}

?>
