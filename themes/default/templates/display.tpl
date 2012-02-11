<%*
    Default display template

    Used when displaying lowres/highres picture

    Layout
      - Navigation bar (Using an include of navbar.tpl)
      - Title & rating
      - Picture
      - Metadata
      - Comments

*%>

<%* !! Navigation bar !! *%>

<% include file="navbar.tpl" %>


<%* !! Title & Rating !! *%>
<%*
    Picture properties
        $picture[type]              - In reality should be filetype (image/video/audio/text/etc.)
        $picture[name]              - Real filename (without directory path)
        $picture[title]             - Title
        $picture[url]               - URL of the picture/file (to use within img)
        $picture[path]              - Full path of the picture (directory + filename)
        $picture[link]              - URL when clicking on the picture (to use with ahref)
        $picture[metadata_found]    - Set to 1 if the picture does contains IPTC metadata
        $picture[mime]              - MIME type (if listed in filetypes.inc.php) - Used for videos
        $picture[player]            - Recommended player (used along with video)
        $rating                     - An array dedicated to the rating module

*%>

<div id="displaypicture">
    <div id="pictitle">
    <span class="big"><% $picture[title] %></span>

    <% if $config[use_iptc] %>
        <span id="metadataicon">
        <% if $picture[metadata_found] %>
            <img src="<% $base_images_dir %>metadata_on.gif" alt="<% $txt[Found_IPTC_metadata] %>" title="<% $txt[Found_IPTC_metadata] %>" />
        <% else %>
            <img src="<% $base_images_dir %>metadata_off.gif" alt="<% $txt[No_IPTC_metadata_found] %>" title="<% $txt[No_IPTC_metadata_found] %>" />
        <% /if %>
        </span>
    <% /if %>
    </div><!--//pictitle-->
    <div id="picnav">
        <% $picnavbar %>
    </div><!--//picnav-->
    <%* Pictures settings [admin only] *%>
    <% if $admin %>
        <% $adminpicturebox %>
    <% /if %>

    <% if $config[use_rating] %>
        <div id="currentrating">
        <% if $rating[current_rating_raw] %>
            <% $txt[pic_rating] %> <% $rating[current_rating_formatted] %>
        <% else %>
            <% $txt[no_rating] %>
        <% /if %>
        <% if ! $rating[already_rated] %>
            <form id="picrating" action="<% $script_name %>" method="post">
            <input type="hidden" name="display" value="<% $display %>" />
            <select name="rating" onchange='document.location.href="<% $rating[form_url] %>" + this.options[this.selectedIndex].value'>
                <option value='null'><% $txt[option_rating] %></option>
            <% foreach value=option_rating from=$rating[select_options] %>
                <option value="<% $option_rating[value] %>"><% $option_rating[text] %></option>
            <% /foreach %>
            </select>
            <noscript><button type="submit"><% $txt[rate] %></button></noscript>
            </form><!--picrating-->
        <% /if %>
        </div>
    <% /if %>

    <% if $picture[link] %>
        <a href="<% $picture[link] %>" title="<% $picture[link_title] %>">
    <% /if %>
    <% if $picture[type] == 'image' %>
        <img src="<% $picture[url] %>" alt="<% $picture[title] %>" class="picture" />
    <% elseif $picture[type] == 'video' %>

        <%* Firefox doesnt need all this crap but IE does... *%>

        <% if $picture[player] == 'qt' %>

            <object classid='clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B' width="320"
            height="240" codebase='http://www.apple.com/qtactivex/qtplugin.cab'>
                <param name='src' value="<% $picture[url] %>">
                <param name='autoplay' value="true">
                <param name='controller' value="true">
                <param name='loop' value="true">
                <embed src="<% $picture[url] %>" width="320" height="240" autoplay="true" 
                controller="true" loop="true" pluginspage='http://www.apple.com/quicktime/download/'>
                </embed>
            </object>

        <% elseif $picture[player] == 'wmp' %>

            <object width="320" height="240" 
          classid="CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95" 
          codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701"
          standby="Loading Microsoft Windows Media Player components..." type="application/x-oleobject">
          <param name="fileName" value="<% $picture[url] %>">
          <param name="animationatStart" value="true">
          <param name="transparentatStart" value="true">
          <param name="autoStart" value="true">
          <param name="showControls" value="true">
          <param name="loop" value="false">
          <embed type="application/x-mplayer2"
            pluginspage="http://microsoft.com/windows/mediaplayer/en/download/"
            name="mediaPlayer" displaysize="4" autosize="-1" 
            bgcolor="darkblue" showcontrols="true" showtracker="-1" 
            showdisplay="0" showstatusbar="-1" videoborder3d="-1" width="320" height="240"
            src="<% $picture[url] %>" autostart="true" designtimesp="5311" loop="false">
          </embed>
          </object>
        <% elseif $picture[player] == 'rp' %>

            <!-- begin video window... -->
            <object classid="clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA"
            width="320" height="240">
            <param name="src" value="<% $picture[url] %>">
            <param name="autostart" value="true">
            <param name="controls" value="imagewindow">
            <param name="console" value="video">
            <param name="loop" value="true">
            <embed src="<% $picture[url] %>" width="320" height="240" 
            loop="true" type="audio/x-pn-realaudio-plugin" controls="imagewindow" console="video" autostart="true">
            </embed>
            <!-- ...end video window -->
            <!-- begin control panel... -->
            </object><br /><object classid='clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA'
              width="320" height="30">
              <param name="src" value="<% $picture[url] %>">
              <param name="autostart" value="true">
              <param name="controls" value="ControlPanel">
              <param name="console" value="video">
              <embed src="<% $picture[url] %>" width="320" height="30" 
              controls="ControlPanel" type="audio/x-pn-realaudio-plugin" console="video" autostart="true">
              </embed>
              </object>
            <!-- ...end control panel -->

        <% elseif $picture[player] == 'flash' %>

            <object type="application/x-shockwave-flash" data="<% $picture[url] %>" width="320" height="240" >
                <param name="movie" value="<% $picture[url] %>" />
                <param name="quality" value="high" />
                <param name="menu" value="true" />
            </object>

        <% elseif $picture[player] == 'flv' %>

            <div id="flvplayer"><a href="http://www.macromedia.com/go/getflashplayer">Get Flash</a> to see this player.</div>
            <script type="text/javascript">
                var so = new SWFObject('base/3rd-part/flv-player/flvplayer.swf','player','400','400','7');
                so.addParam("allowfullscreen","true");
                <% if $use_direct_urls %>
                so.addVariable("file","../../../<% $picture[url] %>");
                <% else %>
                so.addVariable("file","<% $picture[url] %>");
                <% /if %>
                so.addVariable("displayheight","300");
                so.addVariable("title","<% $picture[name] %>");
                so.write('flvplayer');
            </script>

        <% /if %>
    <% elseif $picture[type] == 'audio' %>
        <a href="<% $picture[url] %>"><img src="base/images/sound.gif" alt="<% $picture[title] %>" class="icon" /></a>
    <% else %>
        <img src="base/images/unknown.gif" alt="<% $picture[title] %>" class="icon" />
    <% /if %>
    <% if $picture[link] %></a><% /if %>
    
    <% if $config[use_exif] && $picture[formatted_exif_metadata] %>
        <div class="exifmetadata">
        <% $picture[formatted_exif_metadata] %>
        </div>
    <% /if %>
    <% if $config[use_iptc] && $picture[formatted_iptc_metadata] %>
        <div class="iptcmetadata">
        <% $picture[formatted_iptc_metadata] %>
        </div>
    <% /if %>
    <% if ($config[use_iptc] || $config[use_exif]) && $picture[metadata_array] %>
        <div style="text-align: center">
            <a href="javascript:switch_display('metadatadiv')"><% $txt[show_me_more] %></a>
        </div>
        <div id="metadatadiv" style="display:none">
          <table class="metadatatable">
          <% foreach key=key value=value from=$picture[metadata_array] %>
          <tr class="<% cycle values="rowbgcolor1, rowbgcolor2" %>"><td align="left"><% $key %></td><td><% $value %></td></tr>
          <% /foreach %>
          </table>
        </div><!--//metadatadiv-->
    <% /if %>
    <% if $picture[type] != 'image' %>
    <a href="<% $picture[url] %><% if ! $use_direct_urls %>&amp;mode=saveas<% /if %>"><img src="base/images/save-as.png" class="icon" alt="<% $txt[Save_as] %>" title="<% $txt[Save_as] %>" /></a>
    <% /if %>

    <% if $config[use_comments] %>
    <div id="comments">
    <span id="commentstitle"><% $txt[comments] %></span>
    <% if $picture[user_can_post_comments] %>
        <span id="addcomment"><a href="#" onclick="enterWindow=window.open('?picname=<% $picture[path] %>&amp;addcomment=1&amp;popup=1','commentadd','width=400,height=260,top=250,left=500'); return false"><% $txt[add_comment] %></a></span>
    <% /if %>
    <% if $comments %>
        <% foreach value=comment from=$comments %>
        <div class="small commentfrom"><% $txt[comment_from] %><b><% $comment[user] %></b><% $txt[comment_on] %> <% $comment[datetime] %>
        <% if $admin %>
             | <a href="?display=<% $picture[path] %>&amp;delcom=<% $comment[id] %>"><% $txt[del_comment] %></a>
        <% /if %>
        </div>
        <div class="usercomment"><% $comment[text] %></div>
        <% /foreach %>
    <% /if %>
    </div><!--//comments-->
    <% /if %>

</div><!--//displaypicture-->
