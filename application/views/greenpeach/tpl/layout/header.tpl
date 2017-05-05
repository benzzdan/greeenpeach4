[{if $oViewConf->getTopActionClassName() != 'clearcookies' && $oViewConf->getTopActionClassName() != 'mallstart'}]
    [{oxid_include_widget cl="oxwCookieNote" _parent=$oView->getClassName() nocookie=1}]
[{/if}]
[{block name="header_main"}]
    [{assign var="blFullwidth" value=$oViewConf->getViewThemeParam('blFullwidthLayout')}]

    <header id="header">

          <div class="topbanner">
            Envios a todo México / Aceptamos Pagos por Paypal, Efectivo en Oxxo y Transferencia Bancaria
          </div>

          <nav class="navbar navbar-default" role="navigation" style="width: 100%">
              <ul class="nav navbar-nav navbar-right">
                  <a class="hvr-float" href="http://www.facebook.com/GPSUPERFOODS/">
                    <div id="icon-face"></div>
                  </a>
                  <a class="hvr-float" href="https://www.instagram.com/greenpeachsuperfoods/">
                    <div id="icon-ig"></div>
                  </a>

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
              </ul>
          </nav>


                    [{block name="layout_header_bottom"}]
                        [{oxid_include_widget cl="oxwCategoryTree" cnid=$oView->getCategoryId() sWidgetType="header" _parent=$oView->getClassName() nocookie=1}]
                    [{/block}]



    </header>

[{/block}]

[{insert name="oxid_newbasketitem" tpl="widget/minibasket/newbasketitemmsg.tpl" type="message"}]
[{oxid_include_dynamic file="widget/minibasket/minibasketmodal.tpl"}]
