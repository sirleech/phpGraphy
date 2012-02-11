<?php

/*
*  Copyright (C) 2007 - phpGraphy DevTeam (http://phpgraphy.sourceforge.net)
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
*/

/* $Id: functions_slideshow.inc.php 422 2007-12-18 12:38:33Z jim $ */

/**
 * Output the slideshow code
 * Requires 2 js library to be loaded AND an onLoad call in the body
 * The library came from : http://www.barelyfitz.com/projects/slideshow/
 * 
 * @author: oniryx
 */

function display_slideshow() 
{

    global $dir, $files, $handled_image_types_preg, $txt, $base_images_dir;

    $SCRIPT_NAME = SCRIPT_NAME;
    $js_var ='';

    foreach($files as $file_id=>$filename) {
        if (preg_match($handled_image_types_preg, $filename)) {
            $title = get_title($dir.$filename);
            $js_var .=<<<EOD

s = new slide();
s.src = "$SCRIPT_NAME?displaypic=$dir$filename&amp;non_lr=";
s.link = "$SCRIPT_NAME?display=$dir$filename";
s.text = "$title";
slides.add_slide(s);

EOD;
}
        }


echo <<<EOD
<script type="text/javascript">
<!--

slides = new slideshow("slides");

slides.pre_update_hook = function() {
        document.getElementById("slideshow").style.top=((xClientHeight()-this.slides[ this.current ].image.height)/2)+"px";
        document.getElementById("slideshow").style.left=((xClientWidth()-this.slides[ this.current ].image.width)/2)+"px";
}

slides.set_textid('slideshow-text');

//-->
</script>
<div id="slideshow">
    
    <div id="slideshow-text"></div>
    
    <a href="javascript:playPause()">
        <img name="SLIDESIMG" src="{$base_images_dir}unknown.gif" alt="{$txt['Slideshow close']}" id="slideshowimg" />
    </a>
    
</div>

    <div id="slideshow-control" onmouseover="showControl()" onmouseout="hideControl()">
    <span id="spanControl">
    <a onclick="javascript:slides.previous()" accesskey="z">{$txt['Slideshow previous']}</a> 
    <a onclick="javascript:play()" id="play" accesskey="x">{$txt['Slideshow play']}</a> 
    <a onclick="javascript:pause()" id="pause" accesskey="c">{$txt['Slideshow pause']}</a> 
    <a onclick="javascript:slides.next()" accesskey="v">{$txt['Slideshow next']}</a>
    <a onclick="javascript:hidecaptions()" id="hidecaptions" accesskey="h">{$txt['Slideshow hide captions']}</a>
    <a onclick="javascript:showcaptions()" id="showcaptions" accesskey="s">{$txt['Slideshow show captions']}</a>

    {$txt['Slideshow delay']}
        <a onclick="javascript:slower()" accesskey="+">{$txt['Slideshow slower']}</a>
        <a onclick="javascript:faster()" accesskey="-">{$txt['Slideshow faster']}</a> 
    <input type="text" name="delay" id="delay" value="3" size="1" readonly /> sec. 
     </span>
    </div>


<a id="close-slideshow" onclick="javascript:window.close()" accesskey="b">{$txt['Slideshow close']}</a>
    
<script type="text/javascript">
<!--
var slideshow_status='play';
var captions_status='show';

function init_slideshow() {
    if (document.images)
    {
        slides.set_image(document.images.SLIDESIMG);
        slides.update();
        setTimeout('hideControl()',4000);
        slideshow_status='play';
        showcaptions();
    }
}
function backToThumbnail() {
    slides.pause();
    document.getElementById("slideshow").style.display="none";
}
function slideshow() {
    init_slideshow();
    play();
}
function slower() {
    if(document.getElementById("delay").value<21) {
        document.getElementById("delay").value=(document.getElementById("delay").value*1)+1;
        slides.play(document.getElementById("delay").value * 1000);
    }
}
function faster() {
    if(document.getElementById("delay").value>1) {
        document.getElementById("delay").value-=1;
        slides.play(document.getElementById("delay").value * 1000);
    }
}
function play() {
    document.getElementById("play").style.display="none";
    document.getElementById("pause").style.display="inline";
    slides.play();
    slideshow_status='play';
}
function pause() {
    document.getElementById("pause").style.display="none";
    document.getElementById("play").style.display="inline";    
    slides.pause();
    slideshow_status='pause';
}
function hidecaptions() {
    document.getElementById("hidecaptions").style.display="none";
    document.getElementById("showcaptions").style.display="inline";
    document.getElementById("slideshow-captions").style.display="none";
    slides.showcaptions('hide');
}
function showcaptions() {
    document.getElementById("showcaptions").style.display="none";
    document.getElementById("hidecaptions").style.display="inline";
    document.getElementById("slideshow-captions").style.display="inline";
    slides.showcaptions('show');
}
function playPause() {
    if (slideshow_status == 'play') {
        pause();
    } else {
        play();
    }
}
function showControl() {
    document.getElementById("spanControl").style.visibility="visible";
}
function hideControl() {
    document.getElementById("spanControl").style.visibility="hidden";
}

$js_var

slideshow();

//-->
</script>
</div>
</body>
</html>
EOD;

}

?>
