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
* $Id: phpgraphy-naming-standard.class.php 408 2007-02-03 17:17:06Z jim $
*
*/

/**
 * Class hosting functions related to naming conventions used within phpGraphy
 * Depends on $config, $handled_image_types_preg and filetypes.inc.php
 *
 * There is 4 types of requests Dir/Name/Path/FullPath
 *
 *     Dir : return the directory from a given path
 *    Name : return the name from a given path
 *    Path : return the path (Dir + Name) from a given path
 * FullPath: return the full path (including phpGraphy root)
 *
 * for the 3 different picture states (with a filename or filepath as argument)
 *
 *   File : Original file (Highres for a picture, or source for any other type)
 *  Thumb : Thumbnail file (only valid for pictures and videos)
 * Lowres : Lowres file (only valid for pictures)
 *
 * with an optionnal ForDirectory statement (with dirname or dirpath as argument)
 *
 * ie: getThumbName('test/picture.jpg') will return 'thumb_picture.jpg'
 *     getThumbPath('test/picture.jpg') will return 'test/.thumbs/thumb_picture.jpg'
 *     getLowresPath('test/picture.jpg') will return 'test/.thumbs/lr_picture.jpg'
 *     getLowresFullPath('test/picture.jpg') will return 'pictures/test/.thumbs/lr_picture.jpg'
 *                                            (assuming pictures/ is phpGraphy 'pictures_dir')
 *     getThumbPathForDirectory('test/') will return 'test/.thumbs/thumb_directory.jpg'
 *
 */

class phpGraphyNamingStandard
{

    function phpGraphyNamingStandard() 
    {
        global $config, $handled_image_types_preg;

        $this->pictures_directory = $config['pictures_dir'];
        return true;
    }

    function getPicturesDir() {
    
        return $this->pictures_directory;
    }

    function getFileName($filepath)
    {
        return basename($filepath);
    }

    function getFileDir($filepath)
    {
        return dirname($filepath);
    }

    function getFilePath($filepath)
    {
        return $filepath;
    }

    function getFileFullPath($filepath)
    {
        return $this->pictures_directory.$filepath;
    }

    function getThumbName($filename)
    {
        global $pgFileTypes;

        // Handled picture types
        if ($pgFileTypes->isImage($filename)) {
            return 'thumb_'.$this->getFileName($filename);
        }
        // Handled video types
        if ($pgFileTypes->isVideo($filename)) {
            return 'thumb_'.$this->getFileName($filename).'.jpg';
        }

        return false;
    }

    function getThumbDir($filepath)
    {
        return dirname($filepath).'/.thumbs';
    }

    function getThumbFullDir($filepath)
    {
        return $this->pictures_directory.$this->getThumbDir($filepath);
    }

    function getThumbPath($filepath)
    {
        return $this->getThumbDir($filepath).'/'.$this->getThumbName($filepath);
    }

    function getThumbFullPath($filepath)
    {
        return $this->pictures_directory.$this->getThumbPath($filepath);
    }

    function getThumbDirForDirectory($dirpath)
    {
        return str_replace('//','/', $dirpath . '/.thumbs');
    }

    function getThumbNameForDirectory($dirpath)
    {
        return $this->getThumbName('directory.jpg');
    }

    function getThumbPathForDirectory($dirpath)
    {
        return str_replace('//', '/', $dirpath . '/.thumbs/'.$this->getThumbNameForDirectory($dirpath));
    }

    function getThumbFullPathForDirectory($dirpath)
    {
        return $this->pictures_directory.$this->getThumbPathForDirectory($dirpath);
    }

    function getLowresName($filename)
    {
        global $pgFileTypes;

        // Handled picture types
        if ($pgFileTypes->isImage($filename)) {
            return 'lr_'.$this->getFileName($filename);
        } else return false;

    }

    function getLowresDir($filepath)
    {
        // Same for thumb, such using same function
        return $this->getThumbDir($filepath);
    }

    function getLowresFullDir($filepath)
    {
        // Same for thumb, such using same function
        return $this->getThumbFullDir($filepath);
    }

    function getLowresPath($filepath)
    {
        return $this->getLowresDir($filepath).'/'.$this->getLowresName($filepath);
    }

    function getLowresFullPath($filepath)
    {
        global $pgFileTypes;

        if (! $pgFileTypes->isImage($filepath)) {
            return $this->getFileFullPath($filepath);
        } else {
            return $this->pictures_directory.$this->getLowResPath($filepath);
        }
    }

}

?>
