[{block name="footer_main"}]
    [{assign var="blShowFullFooter" value=$oView->showSearch()}]
    [{assign var="blFullwidth" value=$oViewConf->getViewThemeParam('blFullwidthLayout')}]
    [{$oView->setShowNewsletter($oViewConf->getViewThemeParam('blFooterShowNewsletterForm'))}]

    [{if $oxcmp_user}]
        [{assign var="force_sid" value=$oView->getSidForWidget()}]
    [{/if}]
[{if $oView->getTemplateName() == 'page/shop/start.tpl'}]
   [{assign var='fflag' value=true}]
[{/if}]

    <footer id="footer">
      <div class="bottombanner">
        <div class="row">
          <div class="container">
        [{if $fflag == true}]
           <div class="col-md-12" style="text-align: center">
                <a style="margin-left: 50px;" href="[{$oViewConf->getHomeLink()}]terminos">Leer terminos y condiciones</a> © Green Peach Superfoods 2017
           </div>
            [{else}]
            <div class="col-md-6">
              <img src="[{$oViewConf->getImageUrl()}]icon-whatsapp1.svg" alt="icon" style="width:100%; max-width:30px;" /> &nbsp; <a href="tel:3338091918">+52 133 380 919 18</a> &nbsp; | &nbsp; <a href="tel:3339544216">+52 133 395 442 16</a>
              <img src="[{$oViewConf->getImageUrl()}]icon-email1.svg" alt="icon" style="width:100%; max-width:30px; margin-left: 30px;" /> &nbsp; <a href="mailto:venta@greenpeach.mx">ventas@greenpeach.mx</a>
            </div>
            <div class="col-md-6">
              <span>Síguenos: </span>
              <a href="http://www.facebook.com/GPSUPERFOODS/" class="hvr-float"><img alt="facebook" style="width:100%; max-width:25px;" src="[{$oViewConf->getImageUrl()}]icon-facebook3.png" /></a> &nbsp;
              <a href="https://www.instagram.com/greenpeachsuperfoods/" class="hvr-float"><img alt="instagram" style="width:100%; max-width:25px;" src="[{$oViewConf->getImageUrl()}]icon-ig3.png" /></a> &nbsp;
              <a style="margin-left: 50px;" href="#">Leer terminos y condiciones</a> © Green Peach Superfoods 2017
            </div>
        [{/if}]
          </div>
            </div>
        </div>
        <!-- <div class="[{if $blFullwidth}]container[{else}]container-fluid[{/if}]">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="row">
                        <div class="footer-left-part">
                            [{block name="dd_footer_servicelist"}]
                                <section class="col-xs-12 [{if $blShowFullFooter}]col-sm-3[{else}]col-sm-6[{/if}] footer-box footer-box-service">
                                    <div class="h4 footer-box-title">[{oxmultilang ident="SERVICES"}]</div>
                                    <div class="footer-box-content">
                                        [{block name="dd_footer_servicelist_inner"}]
                                            [{oxid_include_widget cl="oxwServiceList" noscript=1 nocookie=1 force_sid=$force_sid}]
                                        [{/block}]
                                    </div>
                                </section>
                            [{/block}]
                            [{block name="dd_footer_information"}]
                                <section class="col-xs-12 [{if $blShowFullFooter}]col-sm-3[{else}]col-sm-6[{/if}] footer-box footer-box-information">
                                    <div class="h4 footer-box-title">[{oxmultilang ident="INFORMATION"}]</div>
                                    <div class="footer-box-content">
                                        [{block name="dd_footer_information_inner"}]
                                            [{oxid_include_widget cl="oxwInformation" noscript=1 nocookie=1 force_sid=$force_sid}]
                                        [{/block}]
                                    </div>
                                </section>
                            [{/block}]
                            [{if $blShowFullFooter}]
                            [{block name="dd_footer_manufacturerlist"}]
                                <section class="col-xs-12 col-sm-3 footer-box footer-box-manufacturers">
                                    <div class="h4 footer-box-title">[{oxmultilang ident="OUR_BRANDS"}]</div>
                                    <div class="footer-box-content">
                                        [{block name="dd_footer_manufacturerlist_inner"}]
                                            [{oxid_include_widget cl="oxwManufacturerList" _parent=$oView->getClassName() noscript=1 nocookie=1}]
                                        [{/block}]
                                    </div>
                                </section>
                            [{/block}]
                                [{block name="dd_footer_categorytree"}]
                                    <section class="col-xs-12 col-sm-3 footer-box footer-box-categories">
                                        <div class="h4 footer-box-title">[{oxmultilang ident="CATEGORIES"}]</div>
                                        <div class="footer-box-content">
                                            [{block name="dd_footer_categorytree_inner"}]
                                                [{oxid_include_widget cl="oxwCategoryTree" _parent=$oView->getClassName() sWidgetType="footer" noscript=1 nocookie=1}]
                                            [{/block}]
                                        </div>
                                    </section>
                                [{/block}]
                            [{/if}]
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="row">
                        <div class="footer-right-part">
                            <div class="col-xs-6 col-xs-offset-3 col-sm-12 col-sm-offset-0">
                                [{if $oView->showNewsletter()}]
                                    <section class="footer-box footer-box-newsletter">
                                        <div class="h4 footer-box-title">[{oxmultilang ident="NEWSLETTER"}]</div>
                                        <div class="footer-box-content">
                                            [{block name="dd_footer_newsletter"}]
                                                <p class="small">[{oxmultilang ident="FOOTER_NEWSLETTER_INFO"}]</p>
                                                [{include file="widget/footer/newsletter.tpl"}]
                                            [{/block}]
                                        </div>
                                    </section>
                                [{/if}]
                                [{if ($oView->isActive('FbLike') && $oViewConf->getFbAppId())}]
                                    <section class="footer-box footer-box-facebook">
                                        [{block name="footer_fblike"}]
                                            [{if $oView->isActive('FbLike') && $oViewConf->getFbAppId()}]
                                                <div class="facebook pull-left" id="footerFbLike">
                                                    [{include file="widget/facebook/enable.tpl" source="widget/facebook/like.tpl" ident="#footerFbLike" parent="footer"}]
                                                </div>
                                            [{/if}]
                                        [{/block}]
                                    </section>
                                [{/if}]
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="spacer"></div>

            [{* <<START>> Social Links *}]
            [{block name="dd_footer_social_links"}]
                [{if $oViewConf->getViewThemeParam('sFacebookUrl') || $oViewConf->getViewThemeParam('sGooglePlusUrl') || $oViewConf->getViewThemeParam('sTwitterUrl') || $oViewConf->getViewThemeParam('sYouTubeUrl') || $oViewConf->getViewThemeParam('sBlogUrl')}]
                    <div class="social-links">
                        <div class="row">
                            <section class="col-xs-12">
                                <div class="text-center">
                                    [{block name="dd_footer_social_links_inner"}]
                                        <ul class="list-inline">
                                            [{block name="dd_footer_social_links_list"}]
                                                [{if $oViewConf->getViewThemeParam('sFacebookUrl')}]
                                                    <li>
                                                        <a target="_blank" href="[{$oViewConf->getViewThemeParam('sFacebookUrl')}]">
                                                            <i class="fa fa-facebook"></i> <span>Facebook</span>
                                                        </a>
                                                    </li>
                                                [{/if}]
                                                [{if $oViewConf->getViewThemeParam('sGooglePlusUrl')}]
                                                    <li>
                                                        <a target="_blank" href="[{$oViewConf->getViewThemeParam('sGooglePlusUrl')}]">
                                                            <i class="fa fa-google-plus-square"></i> <span>Google+</span>
                                                        </a>
                                                    </li>
                                                [{/if}]
                                                [{if $oViewConf->getViewThemeParam('sTwitterUrl')}]
                                                    <li>
                                                        <a target="_blank" href="[{$oViewConf->getViewThemeParam('sTwitterUrl')}]">
                                                            <i class="fa fa-twitter"></i> <span>Twitter</span>
                                                        </a>
                                                    </li>
                                                [{/if}]
                                                [{if $oViewConf->getViewThemeParam('sYouTubeUrl')}]
                                                    <li>
                                                        <a target="_blank" href="[{$oViewConf->getViewThemeParam('sYouTubeUrl')}]">
                                                            <i class="fa fa-youtube-square"></i> <span>YouTube</span>
                                                        </a>
                                                    </li>
                                                [{/if}]
                                                [{if $oViewConf->getViewThemeParam('sBlogUrl')}]
                                                    <li>
                                                        <a target="_blank" href="[{$oViewConf->getViewThemeParam('sBlogUrl')}]">
                                                            <i class="fa fa-wordpress"></i> <span>Blog</span>
                                                        </a>
                                                    </li>
                                                [{/if}]
                                            [{/block}]
                                        </ul>
                                    [{/block}]
                                </div>
                            </section>
                        </div>
                    </div>
                [{/if}]
            [{/block}]
            [{* <<ENDE>> Social Links *}]
        </div>

        [{if $oView->isPriceCalculated()}]
        [{block name="layout_page_vatinclude"}]
        [{block name="footer_deliveryinfo"}]
        [{oxifcontent ident="oxdeliveryinfo" object="oCont"}]
        [{/oxifcontent}]
        [{/block}]
        [{/block}]
        [{/if}] -->
        <!--Start of Zendesk Chat Script-->
<script type="text/javascript">
        window.$zopim||(function(d,s){var z=$zopim=function(c){
        z._.push(c)},$=z.s=
        d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
        _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
        $.src='https://v2.zopim.com/?4lOioMvuh1x1KL5wWzaxs8u1kACiTapI';z.t=+new Date;$.
        type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zendesk Chat Script-->

    </footer>
[{/block}]

[{if $oView->isRootCatChanged()}]
    <div id="scRootCatChanged" class="popupBox corners FXgradGreyLight glowShadow">
        [{include file="form/privatesales/basketexcl.tpl"}]
    </div>
[{/if}]
