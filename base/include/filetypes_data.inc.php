<?php

/*
*  Copyright (C) 2000 Christophe Thibault
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
*  $Id: filetypes.inc.php 367 2006-09-27 14:47:46Z jim $
*
*/

// Some filetypes. Feel free to add your own there.

// The "player" field is for the favorite player (that is going to be suggested to view embeded content)
// Current supported players (supported means that phpGraphy can generate embedded HTML code for it)
// wmp = Windows Media Player, qt = QuickTime, rp = RealPlayer, flash = Macromedia Flash

class handledphpGraphyFileTypes extends phpGraphyFileTypes
{

    var $_handled_filetypes = array();

    function handledphpGraphyFileTypes() {

    $this->filetypes = $_handled_filetypes = array(

    // images filetypes
      'jpg'  => array('type' => 'image',    'mime' => "image/jpeg"),
      'jpeg' => array('type' => 'image',    'mime' => "image/jpeg"),
      'gif'  => array('type' => 'image',    'mime' => "image/gif"),
      'png'  => array('type' => 'image',    'mime' => "image/png"),

    // video filetypes
      'asf'  => array('type' => 'video',  'mime' => "video/x-ms-asf",         'icon' => "movie.gif", "player"=>"wmp"),
      'asx'  => array('type' => 'video',  'mime' => "video/x-ms-asf",         'icon' => "movie.gif", "player"=>"wmp"),
      'avi'  => array('type' => 'video',  'mime' => "video/x-msvideo",        'icon' => "movie.gif", "player"=>"wmp"),
      'mov'  => array('type' => 'video',  'mime' => "video/quicktime",        'icon' => "movie.gif", "player"=>"qt"),
      'mpg'  => array('type' => 'video',  'mime' => "video/mpeg",             'icon' => "movie.gif", "player"=>"wmp"),
      'mpeg' => array('type' => 'video',  'mime' => "video/mpeg",             'icon' => "movie.gif", "player"=>"wmp"),
      'rm'   => array('type' => 'video',  'mime' => "video/vnd.rn-realmedia", 'icon' => "movie.gif", "player"=>"rp"),
      'rv'   => array('type' => 'video',  'mime' => "video/vnd.rn-realvideo", 'icon' => "movie.gif", "player"=>"rp"),
      'swf'  => array('type' => 'video',  'mime' => "application/x-shockwave-flash", 'icon' => "movie.gif", "player"=>"flash"),
      'flv'  => array('type' => 'video',  'mime' => "video/x-flv",            'icon' => "movie.gif", "player"=>"flv"),
      'wmv'  => array('type' => 'video',  'mime' => "video/x-ms-wmv",         'icon' => "movie.gif", "player"=>"wmp"),
      'wmx'  => array('type' => 'video',  'mime' => "video/x-ms-wmx",         'icon' => "movie.gif", "player"=>"wmp"),

    // sound filetypes
      'wav'  => array('type' => 'audio',    'mime' => "audio/x-wav",          'icon' => "sound.gif"),
      'mp3'  => array('type' => 'audio',    'mime' => "audio/x-mpeg",         'icon' => "sound.gif", "player"=>"wmp"),
      'm3u'  => array('type' => 'audio',    'mime' => "audio/x-mpegurl",      'icon' => "sound.gif", "player"=>"wmp"),
      'pls'  => array('type' => 'audio',    'mime' => "audio/x-mpegurl",      'icon' => "sound.gif", "player"=>"wmp"),
      'ogg'  => array('type' => 'audio',    'mime' => "audio/ogg",            'icon' => "sound.gif"),
      'wma'  => array('type' => 'audio',    'mime' => "audio/x-ms-wma",       'icon' => "sound.gif"),

    // text filetypes
      'txt'  => array('type' => 'text',     'mime' => "text/plain",           'icon' => "text.gif"),
      'plan' => array('type' => 'text',     'mime' => "text/plain",           'icon' => "text.gif"),

    // archives
      'gz'   => array('type' => 'archive',    'mime' => "application/x-gzip",           'icon' => "text.gif"),
      'tar'  => array('type' => 'archive',    'mime' => "application/x-tar",            'icon' => "text.gif"),
      'zip'  => array('type' => 'archive',    'mime' => "application/x-zip-compressed", 'icon' => "text.gif"),

    // others
      'ai'   => array('type' => 'other',    'mime' => "application/postscript",     'icon' => "text.gif"),
      'eps'  => array('type' => 'other',    'mime' => "application/postscript",     'icon' => "text.gif"),
      'ico'  => array('type' => 'other',    'mime' => "image/x-icon",               'icon' => "text.gif"),
      'ttf'  => array('type' => 'other',    'mime' => "application/binary",         'icon' => "text.gif"),
      'pdf'  => array('type' => 'other',    'mime' => "application/pdf",            'icon' => "text.gif"), 

    );

    return true;

    }

}

?>
