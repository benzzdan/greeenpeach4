[{if $oViewConf->getTopActionClassName() != 'clearcookies' && $oViewConf->getTopActionClassName() != 'mallstart'}]
    [{oxid_include_widget cl="oxwCookieNote" _parent=$oView->getClassName() nocookie=1}]
[{/if}]
[{block name="header_main"}]
    [{assign var="blFullwidth" value=$oViewConf->getViewThemeParam('blFullwidthLayout')}]

    <header id="header">

          <div class="topbanner">
            Envios a todo México / Aceptamos Pagos por Paypal, Efectivo en Oxxo y Transferencia Bancaria
          </div>

            <div class="header-box container">

                <div class="row">
                    <div class="col-xs-5 col-sm-6 col-md-4 logo-col">
                        <!-- [{block name="layout_header_logo"}]
                            [{assign var="slogoImg" value=$oViewConf->getViewThemeParam('sLogoFile')}]
                            [{assign var="sLogoWidth" value=$oViewConf->getViewThemeParam('sLogoWidth')}]
                            [{assign var="sLogoHeight" value=$oViewConf->getViewThemeParam('sLogoHeight')}]
                            <a href="[{$oViewConf->getHomeLink()}]" title="[{$oxcmp_shop->oxshops__oxtitleprefix->value}]">
                                <img src="[{$oViewConf->getImageUrl($slogoImg)}]" alt="[{$oxcmp_shop->oxshops__oxtitleprefix->value}]" style="[{if $sLogoWidth}]width:auto;max-width:[{$sLogoWidth}]px;[{/if}][{if $sLogoHeight}]height:auto;max-height:[{$sLogoHeight}]px;[{/if}]">
                            </a>
                        [{/block}] -->
                    </div>
                    <div class="col-xs-7 col-sm-6 col-md-4 col-md-push-4 menus-col">
                        [{block name="layout_header_top"}]
                            <div class="menu-dropdowns pull-right" style="position: relative; right: -40%;">
                                <!-- [{block name="dd_layout_page_header_icon_menu_languages"}]
                                    [{* Language Dropdown*}]
                                    [{oxid_include_widget cl="oxwLanguageList" lang=$oViewConf->getActLanguageId() _parent=$oView->getClassName() nocookie=1 _navurlparams=$oViewConf->getNavUrlParams() anid=$oViewConf->getActArticleId()}]
                                [{/block}] -->
                                <!-- [{block name="dd_layout_page_header_icon_menu_currencies"}]
                                    [{* Currency Dropdown*}]
                                    [{oxid_include_widget cl="oxwCurrencyList" cur=$oViewConf->getActCurrency() _parent=$oView->getClassName() nocookie=1 _navurlparams=$oViewConf->getNavUrlParams() anid=$oViewConf->getActArticleId()}]
                                [{/block}] -->

                                  <a class="hvr-float" href="http://www.facebook.com/GPSUPERFOODS/">
                                    <div id="icon-face"></div>
                                    </a> <a class="hvr-float" href="https://www.instagram.com/greenpeachsuperfoods/">
                                    <div id="icon-ig"></div>
                                    </a>
                                    <a id="fancybox-manual-b" href="javascript:;" class="hvr-float"></a>


                                  [{block name="dd_layout_page_header_icon_menu_minibasket"}]
                                  [{* Minibasket Dropdown *}]
                                  [{if $oxcmp_basket->getProductsCount()}]
                                  [{assign var="blAnon" value=0}]
                                  [{assign var="force_sid" value=$oViewConf->getSessionId()}]
                                  [{else}]
                                  [{assign var="blAnon" value=1}]
                                  [{/if}]
                                  [{oxid_include_widget cl="oxwMiniBasket" nocookie=$blAnon force_sid=$force_sid}]
                                  [{/block}]
                                [{block name="dd_layout_page_header_icon_menu_account"}]
                                    [{if $oxcmp_user || $oView->getCompareItemCount() || $Errors.loginBoxErrors}]
                                        [{assign var="blAnon" value=0}]
                                        [{assign var="force_sid" value=$oViewConf->getSessionId()}]
                                    [{else}]
                                        [{assign var="blAnon" value=1}]
                                    [{/if}]
                                    [{* Account Dropdown *}]
                                    [{oxid_include_widget cl="oxwServiceMenu" _parent=$oView->getClassName() force_sid=$force_sid nocookie=$blAnon _navurlparams=$oViewConf->getNavUrlParams() anid=$oViewConf->getActArticleId()}]
                                [{/block}]
                            </div>
                        [{/block}]
                    </div>
                    <!-- <div class="col-xs-12 col-sm-12 col-md-4 col-md-pull-4 search-col">
                        [{include file="widget/header/search.tpl"}]
                    </div> -->
                </div>


                    [{block name="layout_header_bottom"}]
                        [{oxid_include_widget cl="oxwCategoryTree" cnid=$oView->getCategoryId() sWidgetType="header" _parent=$oView->getClassName() nocookie=1}]
                    [{/block}]


            </div>



    </header>

[{/block}]

[{insert name="oxid_newbasketitem" tpl="widget/minibasket/newbasketitemmsg.tpl" type="message"}]
[{oxid_include_dynamic file="widget/minibasket/minibasketmodal.tpl"}]
