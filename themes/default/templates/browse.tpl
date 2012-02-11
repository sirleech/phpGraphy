<%*
    Default browse template

    Used when browsing directory and thumbnails

    Layout
      - Navigation bar (Using an include of navbar.tpl)
      - Folders
      - Thumbnails

*%>

<%* !! Navigation bar !! *%>

<% include file="navbar.tpl" %>


<%* !! Special Pages Links - only displayed when there is no welcome file !! *%>

<% if ! $welcome_file %>
<div id="specialpageslinks">
<% if $config[use_comments] %>
<a href="?lastcommented=<% $dir_url %>"><% $txt_last_commented %></a> |
<% /if %>
<% if $config[use_rating] %>
<a href="?toprated=<% $dir_url %>"><% $txt_top_rated %></a> |
<% /if %>
<a href="?lastaddedpictures=1"><% $txt_last_added %></a> |
<a href="?lastaddedpicturesperdir=1"><% $txt_last_added_per_directory %></a>
</div>
<% /if %>

<%* !! Admin menus / .welcome file !!  *%>

<%* Will only be displayed for admin *%>
<% if $admin %>
    <% $admin_directory_settings %>
    <% $admin_edit_welcome %>
<% /if %>

<% $welcome_file %>

<%* !! Displaying folders (only on the first page) !!  *%>
<% if ! $startpic %>

    <div id="dirlist">

    <% if $admin %>
        <form name="deletedir" method="get" action="<% $script_name %>">
        <input type="hidden" name="dir" value="" />
        <input type="hidden" name="deldir" value="" />
    <% /if %>

    <%*
        Directories Properties

            $directory[name]             - Directory Real Name
            $directory[title]            - Directory Title
            $directory[cover_url]        - Directory Cover Picture URL
            $directory[url]              - Directory URL (to use within href)
            $directory[nb_subdirs]       - Numbers of subdirectories
            $directory[nb_files]         - Numbers of files
            $directory[frame_width]      - Width of the frame (calculated by adding 40px to the directory cover width)
            $directory[delete_dir_cross] - Delete Cross HTML code

        NOTE: Display will differ depending on value of 'directory_display_mode' directive

    *%>
    <% foreach value=directory from=$directories %>
    <div class="direntry">

        <% if $config[directory_display_mode] == 'picture' %>

           <div class="dirframe">
               <div class="fftop" style="width: <% $directory[frame_width] %>px"><div><div>&nbsp;
               </div></div></div><!-- /fftop -->
               <div class="ffcontentwrap">
               <div class="ffcontent" style="width: <% $directory[frame_width] %>px">
                  <a href="?dir=<% $directory[url] %>" title="<% $directory[title]  %>">
                  <img src="<% $directory[cover_url] %>" class="dirthumbnail" alt="<% $directory[title] %>" /></a>
               </div><!-- /ffcontent -->
               </div><!-- /ffcontentwrap -->
               <div class="ffbottom" style="width: <% $directory[frame_width] %>px"><div><div>&nbsp;
               </div></div></div><!-- /ffbottom -->
            </div><!-- /dirframe -->
            <div class="dirtitlepicture">
                <a href="?dir=<% $directory[url] %>"><% $directory[title] %></a>
            <% if $admin %>
                <% $directory[delete_dir_cross] %>
            <% /if %>
            <div class="dirinfo">
                <%* !!- Compute and display information about directory (subdirs and files) -!! *%>
                <% if $directory[nb_subdirs] %>
                    <% $directory[nb_subdirs] %> <% $txt[dirs] %>
                <% /if %> 
                <% if $directory[nb_subdirs] && $directory[nb_files] %> - <% /if %>
                <% if $directory[nb_files] %>
                    <% $directory[nb_files] %> <% $txt[files] %>
                <% /if %> 
            </div><!--//dirinfo-->
            </div><!--//dirtitlepicture-->

        <% elseif $config[directory_display_mode] == 'icon'  %>

        <a href="?dir=<% $directory[url] %>" title="<% $directory[title] %>">
            <img src="base/images/folder.gif" class="diricon" alt="<% $directory[title] %>" title="<% $directory[title] %>" /> <% $directory[title] %>
        </a>

        <% else %>

            <a href="?dir=<% $directory[url] %>" title="<% $directory[title] %>"><% $directory[title] %></a>

        <% /if %>

    </div><!--//direntry-->
    <% /foreach %>

    <% if $admin %></form><% /if %>
    </div><!--//dirlist-->

<% /if %>


<%* !! Displaying thumbnails !!  *%>

<table id="dircontent">
    <%*
        Thumbnails properties

            $thumb[name]            - Real filename
            $thumb[title]           - Title
            $thumb[type]            - Type (picture or icon)
            $thumb[url]             - URL of the thumb/icon (to use within img)
            $thumb[link]            - URL to the lowres/file (to use within ahref)
            $thumb[nb_comments]     - Number of comments
            $thumb[rating]          - Current rating
            $thumb[select_as_cover] - Icon to select picture as directory cover

    *%>
    <% if ! $thumbnails %>
    <%* This is only to ensure XHTML 1.1 compatibility *%>
    <tr><td>&nbsp;</td></tr>
    <% /if %>
    <% foreach value=tablerow from=$thumbnails %>
    <tr>
        <% foreach value=thumb from=$tablerow %>
        <td style="width: <% $td_width %>%">
            <% if $thumb[link] %><a href="<% $thumb[link] %>" title="<% $thumb[title] %>" class="picthumbnail"><% /if %>
            <img src="<% $thumb[url] %>" alt="<% $thumb[title] %>" class="<% $thumb[class] %>" />
            <% if $thumb[link] %></a><% /if %>
            <div class="picinfo">
            <% if $thumb[link] %><a href="<% $thumb[link] %>" title="<% $thumb[title] %>"><% /if %>
            <% if $thumb[title] %>
                <% $thumb[title] %>
            <% else %>
                <% $thumb[name] %>
            <% /if %>
            <% if $thumb[link] %></a><% /if %>
            <% if $thumb[nb_comments] %>
                <span><% $thumb[nb_comments] %> <% $txt[thumb_comments] %></span>
            <% /if %>
            <% if $thumb[rating] %>
                <span><% $txt[thumb_rating] %> <b><% $thumb[rating] %></b></span>
            <% /if %>
            <% if $admin && $config[directory_display_mode] %>
                <span><% $thumb[select_as_cover] %></span>
            <% /if %>
            </div><!--//picinfo-->
        </td>
        <% /foreach %>
    </tr>
    <% /foreach %>
</table>
<div id="pagenav"><% $pager %></div>

