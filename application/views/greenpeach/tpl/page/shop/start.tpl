<style>
body
{ overflow:hidden;}
</style>
[{capture append="oxidBlock_content"}]
    [{assign var="oConfig" value=$oViewConf->getConfig()}]
    [{assign var='rsslinks' value=$oView->getRssLinks()}]
    [{oxscript include="js/pages/start.min.js"}]

    [{oxifcontent ident="oxstartwelcome" object="oCont"}]
        <div class="welcome-teaser">[{$oCont->oxcontents__oxcontent->value}]</div>
    [{/oxifcontent}]



    [{assign var="oBargainArticles" value=$oView->getBargainArticleList()}]
    [{assign var="oNewestArticles" value=$oView->getNewestArticles()}]
    [{assign var="oTopArticles" value=$oView->getTop5ArticleList()}]

     [{if $oBargainArticles && $oBargainArticles->count()}]
        [{include file="widget/product/list.tpl" type=$oViewConf->getViewThemeParam('sStartPageListDisplayType') head="START_BARGAIN_HEADER"|oxmultilangassign subhead="START_BARGAIN_SUBHEADER"|oxmultilangassign listId="bargainItems" products=$oBargainArticles rsslink=$rsslinks.bargainArticles rssId="rssBargainProducts" showMainLink=true iProductsPerLine=4}]
    [{/if}]

   [{if $oViewConf->getViewThemeParam('bl_showManufacturerSlider')}]
        [{include file="widget/manufacturersslider.tpl"}]
    [{/if}]


   [{if $oNewestArticles && $oNewestArticles->count()}]
        [{include file="widget/product/list.tpl" type=$oViewConf->getViewThemeParam('sStartPageListDisplayType') head="START_NEWEST_HEADER"|oxmultilangassign subhead="START_NEWEST_SUBHEADER"|oxmultilangassign listId="newItems" products=$oNewestArticles rsslink=$rsslinks.newestArticles rssId="rssNewestProducts" showMainLink=true iProductsPerLine=4}]
    [{/if}]

     [{if $oNewestArticles && $oNewestArticles->count() && $oTopArticles && $oTopArticles->count()}]
        <div class="row">
            <hr>
        </div>
    [{/if}]

    [{if $oTopArticles && $oTopArticles->count()}]
        [{include file="widget/product/list.tpl" type="infogrid" head="START_TOP_PRODUCTS_HEADER"|oxmultilangassign subhead="START_TOP_PRODUCTS_SUBHEADER"|oxmultilangassign listId="topBox" products=$oTopArticles rsslink=$rsslinks.topArticles rssId="rssTopProducts" showMainLink=true iProductsPerLine=2}]
    [{/if}]


     [{insert name="oxid_tracker"}] 


[{/capture}]

[{include file="layout/page.tpl"}]
<!-- <div id="preloader">
<img src="https://www.greenpeach.mx/out/greenpeach/img/logo-greenpeachsuperfoods.png" style="border:0px; margin:2% 45%;" alt="green peach" />
    <div id="loader">&nbsp;</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#preloader').fadeOut('slow');
	$('body').css({'overflow':'visible'});
})
</script> -->
