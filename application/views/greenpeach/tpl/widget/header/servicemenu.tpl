[{if $oxcmp_user}]
    [{assign var="noticeListCount" value=$oxcmp_user->getNoticeListArtCnt()}]
    [{assign var="wishListCount" value=$oxcmp_user->getWishListArtCnt()}]
    [{assign var="recommListCount" value=$oxcmp_user->getRecommListsCount()}]
[{else}]
    [{assign var="noticeListCount" value="0"}]
    [{assign var="wishListCount" value="0"}]
    [{assign var="recommListCount" value="0"}]
[{/if}]
[{math equation="a+b+c+d" a=$oView->getCompareItemsCnt() b=$noticeListCount c=$wishListCount d=$recommListCount assign="notificationsCounter"}]

<div class="btn-group service-menu [{if !$oxcmp_user}]showLogin[{/if}]">
    <button id="myaccount" type="button" class="btn dropdown-toggle hidden-xs" data-toggle="dropdown" data-href="[{oxgetseourl ident=$oViewConf->getSelfLink()|cat:"cl=account"}]">
        [{block name="dd_layout_page_header_icon_menu_account_button"}]
            [{if !$oxcmp_user}]
              Iniciar Sesión
            [{else}]
                [{oxmultilang ident="MY_ACCOUNT"}]
            [{/if}]
            [{if $notificationsCounter > 0}]
                <span class="badge">[{$notificationsCounter}]</span>
            [{/if}]

        [{/block}]
    </button>
    <div class="visible-xs">
      <a href="[{oxgetseourl ident=$oViewConf->getSslSelfLink()|cat:"cl=account"}]">
        [{block name="dd_layout_page_header_icon_menu_account_button"}]
            [{if !$oxcmp_user}]
              Iniciar Sesión
            [{else}]
                [{oxmultilang ident="MY_ACCOUNT"}]
            [{/if}]
            [{if $notificationsCounter > 0}]
                <span class="badge">[{$notificationsCounter}]</span>
            [{/if}]

        [{/block}]
      </a>
    </div>
    [{if !$oxcmp_user}]
    <ul class="dropdown-menu dropdown-menu-right pull-right" id="myaccountmenu"role="menu">
      [{else}]
      <ul class="dropdown-menu dropdown-menu-right pull-right"  role="menu">
      [{/if}]
        [{block name="dd_layout_page_header_icon_menu_account_list"}]
            <li>
                <div class="row">
                    <div class="[{if !$oxcmp_user}]col-xs-12 col-sm-5[{else}]col-xs-12[{/if}] pull-right">
                        <div class="service-menu-box clearfix">
                            [{include file="widget/header/servicebox.tpl"}]
                            [{if $oxcmp_user}]
                                <div class="divider"></div>
                                <div class="text-right">
                                    <a class="btn btn-danger" role="button" href="[{$oViewConf->getLogoutLink()}]" title="[{oxmultilang ident="LOGOUT"}]">
                                      [{oxmultilang ident="LOGOUT"}]
                                    </a>
                                </div>
                            [{/if}]
                        </div>
                    </div>
                    [{if !$oxcmp_user}]
                        <div class="col-xs-12 col-sm-12">
                            <div class="service-menu-box clearfix">
                                [{include file="widget/header/loginbox.tpl"}]
                            </div>
                        </div>
                    [{/if}]
                </div>
            </li>
        [{/block}]
    </ul>
    <div class="visible-xs" style="float: right; margin-right: 12%;">
      <a href="[{oxgetseourl ident=$oViewConf->getSelfLink()|cat:"cl=basket"}]">
        <img src="[{$oViewConf->getImageUrl()}]movil_cart.png" alt="carrito" />
      </a>
    </div>
</div>
