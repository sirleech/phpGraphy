<%*

    This template is included by browse.tpl and display.tpl

*%>

<%* Navigation bar at the top (path and links) *%>

<div id="dirbarleft">
    <% $nav_path %>
    <% if $nb_dirs %> - <% $nb_dirs %><% /if %>
    <% if $nb_files %> - <% $nb_files %><% /if %>
</div>
<div id="dirbarright">
    <% foreach value=menu_entry from=$navbar_menu %>
    <% $menu_entry %>
    <% /foreach %>
</div>
