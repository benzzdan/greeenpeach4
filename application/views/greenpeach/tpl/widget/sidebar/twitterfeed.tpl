[{assign var=aTwitterFeed value=$oView->getTwitterFeed()}]

<style type="text/css">
    div#twitterFeedBox ul {
        border: 0px;
    }

    div#twitterFeedBox ul li {
        margin-top: 5px;
        margin-bottom: 5px;
        color: #999;
    }
</style>
<div id="twitterFeedBox" class="box twitterFeed">
    <h3>[{ oxmultilang ident="WIDGET_TWITTER_FEED_HEADER" }]</h3>
    <div class="content">
        <ul>
            [{foreach from=$aTwitterFeed item=sTweet key=iCount}]
            <li>[{$sTweet->text}].<br />on: [{$sTweet->created_at|date_format:"%e/%m/%Y"}]</li>
            [{/foreach}]
        </ul>
    </div>
</div>
