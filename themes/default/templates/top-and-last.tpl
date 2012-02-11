<%*

    This template is used by lastcommented, toprated and lastaddedpictures pages

    Available variables depends on the mode but here is a list of all available ones:
        - $page_title / Title of the page
        - $picture / Array containing most of the values, need to parsed with a for loop
          (See page for list of available values)

*%>

<div><span class="title"><% $page_title %></span>&nbsp;
    <a href="<% $page_uri"?"$mode %>&rss=1"><img src="base/images/rss2.gif" alt="RSS Feed" class="icon"></a>
</div>
<table border="0">
    <% foreach value=picture from=$pictures %>
    <tr><td>
        <% if $mode eq "toprated" %>
        <span class="small"><% $picture[place] %>.</span>
        <% /if %>
        <a href="?display=<% $picture[picurl] %>" title="<% $picture[pictitle] %>">
        <img src="?previewpic=<% $picture[picurl] %>" alt="<% $picture[pictitle] %>" class="thumbnail" />
        </a>
    </td>
    <td>

        <% if $mode eq "lastcommented" %>
        <span class="small"><% $picture[datetime] %> <% $txt_comment_by %> <b><% $picture[by] %></b></span>
        <br />
        <% /if %>

        <a href="?display=<% $picture[picurl] %>"><% $picture[pictitle] %></a>

        <% if $mode eq "toprated" %>
        <span class="small"> - <% $picture[X_with_X_votes] %></span>
        <% elseif $mode eq "lastaddedpictures" %>
        <div class="small"><% $picture[datetime] %></div>
        <% /if %>

    </td></tr>
    <% /foreach %>
</table>

<% if $prev lte $nb_of_pictures %>
<a href="?<% $page_from %>=<% $dir_url %>&from=<% $prev %>"><% $txt_previous_page %></a> &nbsp;
<% /if %>

<% if $next gte 0 %>
<a href="?<% $page_from %>=<% $dir_url %>&from=<% $next %>"><% $txt_next_page %></a>
<% /if %>
<br />
<div class="small"><a href="?dir=<% $dir_url %>"><% $txt_go_back %></a></div>
