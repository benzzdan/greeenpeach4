[{block name="dd_widget_header_categorylist"}]
    [{if $oxcmp_categories}]
        [{assign var="homeSelected" value="false"}]
        [{if $oViewConf->getTopActionClassName() == 'start'}]
            [{assign var="homeSelected" value="true"}]
        [{/if}]
        [{assign var="oxcmp_categories" value=$oxcmp_categories}]
        [{assign var="blFullwidth" value=$oViewConf->getViewThemeParam('blFullwidthLayout')}]

        <nav id="mainnav" class="navbar navbar-default" role="navigation">

                [{block name="dd_widget_header_categorylist_navbar_list"}]
                    <div class="navbar-header">
                        [{block name="dd_widget_header_categorylist_navbar_header"}]
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button><span class="visible-xs-inline">[{oxmultilang ident="DD_ROLES_BEMAIN_UIROOTHEADER"}]</span>
                            <!--logo -->
                            [{block name="layout_header_logo"}]
                                [{assign var="slogoImg" value=$oViewConf->getViewThemeParam('sLogoFile')}]
                                [{assign var=oConf value=$oView->getConfig()}]
                                [{assign var=slogoImg value=$oConf->getImageUrl(false,null,null,'logo-greenpeachsuperfoods.svg')}]
                                [{assign var="sLogoWidth" value=$oViewConf->getViewThemeParam('sLogoWidth')}]
                                [{assign var="sLogoHeight" value=$oViewConf->getViewThemeParam('sLogoHeight')}]
                                <a href="[{$oViewConf->getHomeLink()}]" title="[{$oxcmp_shop->oxshops__oxtitleprefix->value}]" id="logo_gp">
                                    <img src="[{$slogoImg}]" alt="[{$oxcmp_shop->oxshops__oxtitleprefix->value}]" style="[{if $sLogoWidth}]width:[{$sLogoWidth}]px;[{/if}][{if $sLogoHeight}]height:[{$sLogoHeight}]px;[{/if}]">
                                </a>
                            [{/block}]

                            <!-- end logo -->
                        [{/block}]
                    </div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul id="navigation" class="nav navbar-nav">
                            [{block name="dd_widget_header_categorylist_navbar_list"}]
                                <li [{if $homeSelected == 'true'}]class="active"[{/if}]>
                                    <a class="hvr-underline-from-center" href="[{$oViewConf->getHomeLink()}]">[{oxmultilang ident="HOME"}]</a>
                                </li>

                                [{foreach from=$oxcmp_categories item="ocat" key="catkey" name="root"}]
                                    [{if $ocat->getIsVisible()}]
                                        [{foreach from=$ocat->getContentCats() item="oTopCont" name="MoreTopCms"}]
                                            <li>
                                                <a href="[{$oTopCont->getLink()}]">[{$oTopCont->oxcontents__oxtitle->value}]</a>
                                            </li>
                                        [{/foreach}]

                                        <li class="[{if $homeSelected == 'false' && $ocat->expanded}]active[{/if}][{if $ocat->getSubCats()}] dropdown[{/if}]">
                                            <a class="hvr-underline-from-center" href="[{$ocat->getLink()}]"[{if $ocat->getSubCats()}] class="dropdown-toggle" data-toggle="dropdown"[{/if}]>
                                                [{$ocat->oxcategories__oxtitle->value}]
                                            </a>

                                            [{if $ocat->getSubCats()}]
                                                <ul class="dropdown-menu">
                                                    [{foreach from=$ocat->getSubCats() item="osubcat" key="subcatkey" name="SubCat"}]
                                                        [{if $osubcat->getIsVisible()}]
                                                            [{foreach from=$osubcat->getContentCats() item=ocont name=MoreCms}]
                                                                <li>
                                                                    <a href="[{$ocont->getLink()}]">[{$ocont->oxcontents__oxtitle->value}]</a>
                                                                </li>
                                                            [{/foreach}]

                                                            [{if $osubcat->getIsVisible()}]
                                                                <li [{if $homeSelected == 'false' && $osubcat->expanded}]class="active"[{/if}]>
                                                                    <a [{if $homeSelected == 'false' && $osubcat->expanded}]class="current"[{/if}] href="[{$osubcat->getLink()}]">[{$osubcat->oxcategories__oxtitle->value}]</a>
                                                                    <!-- <a class="hvr-underline-from-center" href="[{$osubcat->getLink()}]">[{$osubcat->oxcategories__oxtitle->value}]</a> -->
                                                                </li>
                                                            [{/if}]
                                                        [{/if}]
                                                    [{/foreach}]
                                                </ul>
                                            [{/if}]
                                        </li>
                                    [{/if}]
                                [{/foreach}]
                            [{/block}]
                        </ul>

                        <ul class="nav navbar-nav navbar-right fixed-header-actions">

                            <li>
                                <a href="[{oxgetseourl ident=$oViewConf->getSelfLink()|cat:"cl=basket"}]" rel="nofollow">
                                    <svg class="shopping-bag-mini[{if $oxcmp_basket->getItemsCount()}] filled[{/if}]" viewBox="0 0 64 64">
                                        <use xlink:href="#shoppingBagMini" /> [{* svg icon included in base.tpl *}]
                                    </svg>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(null)" class="search-toggle" rel="nofollow">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>

                        </ul>

                        [{if $oView->isDemoShop()}]

                            <a href="[{$oViewConf->getBaseDir()}]admin/" class="btn btn-sm btn-danger navbar-btn navbar-right visible-lg">
                                [{oxmultilang ident="DD_DEMO_ADMIN_TOOL"}]
                                <i class="fa fa-external-link" style="font-size: 80%;"></i>
                            </a>

                        [{/if}]

                    </div>
                [{/block}]
        </nav>
    [{/if}]
[{/block}]
