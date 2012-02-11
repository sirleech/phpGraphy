<%*

    This RSS feed template is used by lastcommented, toprated and lastaddedpictures pages and display

    Available variables depends on the mode but here is a list of all available ones:
        - $page_title / Title of the page
        - $picture / Array containing most of the values, need to parsed with a for loop
          (See page for list of available values)

*%>
<?xml version="1.0" encoding="UTF-8"?>
<rss xmlns:metaInfo="http://foobar" version="2.0">
    <channel>
    <title>phpGraphy <% $page_title %></title>
    <link><% $page_uri %>/</link>
    <description>phpGraphy <% $page_title %></description>
    <% foreach value=picture from=$pictures %>
    <item>
        <title><% if $mode eq "toprated" %><% $picture[X_with_X_votes] %><% elseif $mode eq "lastaddedpictures" %><% $picture[datetime] %><% elseif $mode eq "lastcommented" %><% $picture[datetime] %> <% $txt_comment_by %> <% $picture[by] %><% /if %></title>
        <link><% $page_uri %>?display=<% $picture[picurl] %></link>
        <guid><% $page_uri %>?display=<% $picture[picurl] %></guid>
        <description><![CDATA[
        <table border="0">
        <tr><td>
            <% if $mode eq "toprated" %>
            <span class="small"><% $picture[place] %>.</span>
            <% /if %>
            <a href="<% $page_uri %>?display=<% $picture[picurl] %>" title="<% $picture[pictitle] %>">
            <img src="<% $page_uri %>?previewpic=<% $picture[picurl] %>" alt="<% $picture[pictitle] %>" class="thumbnail" />
            </a>
        </td>
        <td>

            <a href="<% $page_uri %>?display=<% $picture[picurl] %>"><% $picture[pictitle] %></a>

            <% if $mode eq "toprated" %>
            <span class="small"> - <% $picture[X_with_X_votes] %></span>
            <% elseif $mode eq "lastaddedpictures" %>
            <div class="small"><% $picture[datetime] %></div>
            <% elseif $mode eq "lastcommented" %>
            <span class="small"><% $picture[datetime] %> <% $txt_comment_by %> <b><% $picture[by] %></b></span>
            <% /if %>

        </td></tr>
        </table>
        ]]></description>
    </item>
    <% /foreach %>
    </channel>
</rss>
