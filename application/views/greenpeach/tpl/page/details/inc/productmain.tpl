[{$oView->getTitle()}]


[{oxscript include="js/pages/details.min.js" priority=10}]

[{assign var="oConfig" value=$oViewConf->getConfig()}]
[{assign var="oManufacturer" value=$oView->getManufacturer()}]
[{assign var="aVariantSelections" value=$oView->getVariantSelections()}]

[{if $aVariantSelections && $aVariantSelections.rawselections}]
    [{assign var="_sSelectionHashCollection" value=""}]
    [{foreach from=$aVariantSelections.rawselections item=oSelectionList key=iKey}]
        [{assign var="_sSelectionHash" value=""}]
        [{foreach from=$oSelectionList item=oListItem key=iPos}]
            [{assign var="_sSelectionHash" value=$_sSelectionHash|cat:$iPos|cat:":"|cat:$oListItem.hash|cat:"|"}]
        [{/foreach}]
        [{if $_sSelectionHash}]
            [{if $_sSelectionHashCollection}][{assign var="_sSelectionHashCollection" value=$_sSelectionHashCollection|cat:","}][{/if}]
            [{assign var="_sSelectionHashCollection" value=$_sSelectionHashCollection|cat:"'`$_sSelectionHash`'"}]
        [{/if}]
    [{/foreach}]
    [{oxscript add="oxVariantSelections  = [`$_sSelectionHashCollection`];"}]

    <form class="js-oxWidgetReload" action="[{$oView->getWidgetLink()}]" method="get">
        <div>
            [{$oViewConf->getHiddenSid()}]
            [{$oViewConf->getNavFormParams()}]
            <input type="hidden" name="cl" value="[{$oView->getClassName()}]">
            <input type="hidden" name="oxwparent" value="[{$oViewConf->getTopActiveClassName()}]">
            <input type="hidden" name="listtype" value="[{$oView->getListType()}]">
            <input type="hidden" name="nocookie" value="1">
            <input type="hidden" name="cnid" value="[{$oView->getCategoryId()}]">
            <input type="hidden" name="anid" value="[{if !$oDetailsProduct->oxarticles__oxparentid->value}][{$oDetailsProduct->oxarticles__oxid->value}][{else}][{$oDetailsProduct->oxarticles__oxparentid->value}][{/if}]">
            <input type="hidden" name="actcontrol" value="[{$oViewConf->getTopActiveClassName()}]">
        </div>
    </form>
[{/if}]

[{oxhasrights ident="TOBASKET"}]
    <form class="js-oxProductForm" action="[{$oViewConf->getSelfActionLink()}]" method="post">
        <div class="hidden">
            [{$oViewConf->getHiddenSid()}]
            [{$oViewConf->getNavFormParams()}]
            <input type="hidden" name="cl" value="[{$oViewConf->getTopActiveClassName()}]">
            <input type="hidden" name="aid" value="[{$oDetailsProduct->oxarticles__oxid->value}]">
            <input type="hidden" name="anid" value="[{$oDetailsProduct->oxarticles__oxnid->value}]">
            <input type="hidden" name="parentid" value="[{if !$oDetailsProduct->oxarticles__oxparentid->value}][{$oDetailsProduct->oxarticles__oxid->value}][{else}][{$oDetailsProduct->oxarticles__oxparentid->value}][{/if}]">
            <input type="hidden" name="panid" value="">
            [{if !$oDetailsProduct->isNotBuyable()}]
                <input type="hidden" name="fnc" value="tobasket">
            [{/if}]
        </div>
[{/oxhasrights}]



<div class="detailsInfo clear" itemscope itemtype="http://schema.org/Product">
    <div class="row">
        <div class="col-xs-12 col-md-4 details-col-left text8">
            [{* article picture with zoom *}]
            [{block name="details_productmain_zoom"}]
                [{oxscript include="js/libs/photoswipe.min.js" priority=8}]
                [{oxscript include="js/libs/photoswipe-ui-default.min.js" priority=8}]
                [{oxscript add="$( document ).ready( function() { if( !window.isMobileDevice() ) Flow.initDetailsEvents(); });"}]

                [{* Wird ausgeführt, wenn es sich um einen AJAX-Request handelt *}]
                [{if $blWorkaroundInclude}]
                    [{oxscript add="$( document ).ready( function() { Flow.initEvents();});"}]
                [{/if}]

                [{if $oView->showZoomPics()}]
                    [{* ToDo: This logical part should be ported into a core function. *}]
                    [{if $oConfig->getConfigParam('sAltImageUrl') || $oConfig->getConfigParam('sSSLAltImageUrl')}]
                        [{assign var="aPictureInfo" value=$oPictureProduct->getMasterZoomPictureUrl(1)|@getimagesize}]
                    [{else}]
                        [{assign var="sPictureName" value=$oPictureProduct->oxarticles__oxpic1->value}]
                        [{assign var="aPictureInfo" value=$oConfig->getMasterPicturePath("product/1/`$sPictureName`")|@getimagesize}]
                    [{/if}]

                    <div class="picture text-center">
                        <a href="[{$oPictureProduct->getMasterZoomPictureUrl(1)}]" id="zoom1"[{if $aPictureInfo}] data-width="[{$aPictureInfo.0}]" data-height="[{$aPictureInfo.1}]"[{/if}]>
                            <img src="[{$oView->getActPicture()}]" alt="[{$oPictureProduct->oxarticles__oxtitle->value|strip_tags}] [{$oPictureProduct->oxarticles__oxvarselect->value|strip_tags}]" itemprop="image" class="img-responsive img-detail">
                        </a>
                    </div>

                [{else}]
                    <div class="picture text-center">
                        <img src="[{$oView->getActPicture()}]" alt="[{$oPictureProduct->oxarticles__oxtitle->value|strip_tags}] [{$oPictureProduct->oxarticles__oxvarselect->value|strip_tags}]" itemprop="image" class="img-responsive img-detail">
                    </div>
                [{/if}]
            [{/block}]

            [{block name="details_productmain_morepics"}]
                [{include file="page/details/inc/morepics.tpl"}]
            [{/block}]


              <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58e31adc8df3689a"></script>
              <div class="addthis_inline_share_toolbox" data-url="http://ottersite.com.mx/pruebas/greenpeach/detalle-producto.php" data-title="Green Peach Superfoods - Productos" style="clear: both; margin-top: 10px; text-align:center;"><div id="atstbx" class="at-resp-share-element at-style-responsive addthis-smartlayers addthis-animated at4-show" aria-labelledby="at-098340a4-f41a-4ba3-8e9d-7bf7cb180e75" role="region"><span id="at-098340a4-f41a-4ba3-8e9d-7bf7cb180e75" class="at4-visually-hidden">AddThis Sharing Buttons</span><div class="at-share-btn-elements"><a role="button" tabindex="1" class="at-icon-wrapper at-share-btn at-svc-facebook" style="background-color: rgb(59, 89, 152); border-radius: 0px;"><span class="at4-visually-hidden">Share to Facebook</span><span class="at-icon-wrapper" style="line-height: 20px; height: 20px; width: 20px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" class="at-icon at-icon-facebook" style="fill: rgb(255, 255, 255); width: 20px; height: 20px;"><g><path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill-rule="evenodd"></path></g></svg></span></a><a role="button" tabindex="1" class="at-icon-wrapper at-share-btn at-svc-twitter" style="background-color: rgb(29, 161, 242); border-radius: 0px;"><span class="at4-visually-hidden">Share to Twitter</span><span class="at-icon-wrapper" style="line-height: 20px; height: 20px; width: 20px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" class="at-icon at-icon-twitter" style="fill: rgb(255, 255, 255); width: 20px; height: 20px;"><g><path d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336" fill-rule="evenodd"></path></g></svg></span></a><a role="button" tabindex="1" class="at-icon-wrapper at-share-btn at-svc-pinterest_share" style="background-color: rgb(203, 32, 39); border-radius: 0px;"><span class="at4-visually-hidden">Share to Pinterest</span><span class="at-icon-wrapper" style="line-height: 20px; height: 20px; width: 20px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" class="at-icon at-icon-pinterest_share" style="fill: rgb(255, 255, 255); width: 20px; height: 20px;"><g><path d="M7 13.252c0 1.81.772 4.45 2.895 5.045.074.014.178.04.252.04.49 0 .772-1.27.772-1.63 0-.428-1.174-1.34-1.174-3.123 0-3.705 3.028-6.33 6.947-6.33 3.37 0 5.863 1.782 5.863 5.058 0 2.446-1.054 7.035-4.468 7.035-1.232 0-2.286-.83-2.286-2.018 0-1.742 1.307-3.43 1.307-5.225 0-1.092-.67-1.977-1.916-1.977-1.692 0-2.732 1.77-2.732 3.165 0 .774.104 1.63.476 2.336-.683 2.736-2.08 6.814-2.08 9.633 0 .87.135 1.728.224 2.6l.134.137.207-.07c2.494-3.178 2.405-3.8 3.533-7.96.61 1.077 2.182 1.658 3.43 1.658 5.254 0 7.614-4.77 7.614-9.067C26 7.987 21.755 5 17.094 5 12.017 5 7 8.15 7 13.252z" fill-rule="evenodd"></path></g></svg></span></a><a role="button" tabindex="1" class="at-icon-wrapper at-share-btn at-svc-email" style="background-color: rgb(132, 132, 132); border-radius: 0px;"><span class="at4-visually-hidden">Share to Email</span><span class="at-icon-wrapper" style="line-height: 20px; height: 20px; width: 20px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" class="at-icon at-icon-email" style="fill: rgb(255, 255, 255); width: 20px; height: 20px;"><g><g fill-rule="evenodd"></g><path d="M27 22.757c0 1.24-.988 2.243-2.19 2.243H7.19C5.98 25 5 23.994 5 22.757V13.67c0-.556.39-.773.855-.496l8.78 5.238c.782.467 1.95.467 2.73 0l8.78-5.238c.472-.28.855-.063.855.495v9.087z"></path><path d="M27 9.243C27 8.006 26.02 7 24.81 7H7.19C5.988 7 5 8.004 5 9.243v.465c0 .554.385 1.232.857 1.514l9.61 5.733c.267.16.8.16 1.067 0l9.61-5.733c.473-.283.856-.96.856-1.514v-.465z"></path></g></svg></span></a></div></div></div>



              <!-- para checar el stock -->

              [{block name="details_productmain_stockstatus"}]
              [{if $oDetailsProduct->getStockStatus() == -1}]
              <span class="stockFlag notOnStock">
                <i class="fa fa-circle text-danger"></i>
                [{if $oDetailsProduct->oxarticles__oxnostocktext->value}]
                <link itemprop="availability" href="http://schema.org/OutOfStock"/>
                [{$oDetailsProduct->oxarticles__oxnostocktext->value}]
                [{elseif $oViewConf->getStockOffDefaultMessage()}]
                <link itemprop="availability" href="http://schema.org/OutOfStock"/>
                [{oxmultilang ident="MESSAGE_NOT_ON_STOCK"}]
                [{/if}]
                [{if $oDetailsProduct->getDeliveryDate()}]
                <link itemprop="availability" href="http://schema.org/PreOrder"/>
                [{oxmultilang ident="AVAILABLE_ON"}] [{$oDetailsProduct->getDeliveryDate()}]
                [{/if}]
              </span>
              [{elseif $oDetailsProduct->getStockStatus() == 1}]
              <link itemprop="availability" href="http://schema.org/InStock"/>
              <span class="stockFlag lowStock">
                <i class="fa fa-circle text-warning"></i> [{oxmultilang ident="LOW_STOCK"}]
              </span>
              [{elseif $oDetailsProduct->getStockStatus() == 0}]
              <span class="stockFlag">
                <link itemprop="availability" href="http://schema.org/InStock"/>
                <i class="fa fa-circle text-success"></i>
                [{if $oDetailsProduct->oxarticles__oxstocktext->value}]
                [{$oDetailsProduct->oxarticles__oxstocktext->value}]
                [{elseif $oViewConf->getStockOnDefaultMessage()}]
                [{oxmultilang ident="READY_FOR_SHIPPING"}]
                [{/if}]
              </span>
              [{/if}]
              [{/block}]

                <br>

              <!--  price section -->
                              <div class="pricebox" style="text-align: left;">


                                <!-- discount price -->


                                  <!-- [{block name="details_productmain_tprice"}]
                                      [{oxhasrights ident="SHOWARTICLEPRICE"}]
                                          [{assign var=tprice value=$oDetailsProduct->getTPrice()}]
                                          [{assign var=price  value=$oDetailsProduct->getPrice()}]
                                          [{if $tprice && $tprice->getBruttoPrice() > $price->getBruttoPrice()}]
                                              <del>[{$oDetailsProduct->getFTPrice()}] [{$currency->sign}]</del>
                                              <br/>
                                          [{/if}]
                                      [{/oxhasrights}]
                                  [{/block}]

                                  [{block name="details_productmain_watchlist"}][{/block}] -->


                                      <!--  main price-->



                                  [{block name="details_productmain_price"}]
                                      [{oxhasrights ident="SHOWARTICLEPRICE"}]
                                          [{block name="details_productmain_price_value"}]
                                              [{if $oDetailsProduct->getFPrice()}]
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <span>Precio: </span><br>
                                                  <label id="productPrice" class="price">
                                                    [{assign var="sFrom" value=""}]
                                                    [{assign var="fPrice" value=$oDetailsProduct->getFPrice()}]
                                                    [{if $oDetailsProduct->isParentNotBuyable()}]
                                                    [{assign var="fPrice" value=$oDetailsProduct->getFVarMinPrice()}]
                                                    [{if $oDetailsProduct->isRangePrice()}]
                                                    [{assign var="sFrom" value="PRICE_FROM"|oxmultilangassign}]
                                                    [{/if}]
                                                    [{/if}]

                                                    <span class="text8b">
                                                      <span class="price-from">[{$sFrom}]</span>
                                                      <span>$</span>
                                                      <span class="price">[{$fPrice}]</span>
                                                      <span class="currency">[{$currency->sign}]</span>

                                                      <span class="hidden">
                                                        <span itemprop="price">[{$fPrice}] [{$currency->sign}]</span>
                                                      </span>
                                                    </span>
                                                  </label>

                                                </div>
                                                <div class="col-md-6">

                                                  <span>Precio +10 piezas: </span>
                                                  <label id="productPriceGranel" class="price">
                                                    <span class="text8b">
                                                      [{assign var="article" value=$oDetailsProduct}]
                                                      <span>$</span>
                                                      <span class="price">[{$article->oxarticles__ottpricegranel->value}]</span>
                                                      <span class="currency">[{$currency->sign}]</span>
                                                    </span>
                                                </div>
                                              </div>

                                                      <!-- <span[{if $tprice && $tprice->getBruttoPrice() > $price->getBruttoPrice()}] class="text-danger"[{/if}]>
                                                          <span class="price-from">[{$sFrom}]</span>
                                                          <span class="price">[{$fPrice}]</span>
                                                          <span class="currency">[{$currency->sign}]</span>

                                                          <span class="hidden">
                                                              <span itemprop="price">[{$fPrice}] [{$currency->sign}]</span>
                                                          </span>
                                                      </span> -->
                                                  </label>

                                              [{/if}]
                                              [{if $oDetailsProduct->loadAmountPriceInfo()}]
                                                  [{include file="page/details/inc/priceinfo.tpl"}]
                                              [{/if}]
                                          [{/block}]
                                      [{/oxhasrights}]
                                  [{/block}]
                              </div>

                              <div class="tobasket">
                                  [{* pers params *}]
                                  [{block name="details_productmain_persparams"}]
                                      [{if $oView->isPersParam()}]
                                          <div class="persparamBox clear form-group">
                                              <label for="persistentParam" class="control-label">[{oxmultilang ident="LABEL"}]</label>
                                              <input type="text" id="persistentParam" name="persparam[details]" value="[{$oDetailsProduct->aPersistParam.text}]" size="35" class="form-control">
                                          </div>
                                      [{/if}]
                                  [{/block}]


                                  <!-- boton add to cart  -->

                                  [{block name="details_productmain_tobasket"}]
                                      <div class="tobasketFunction clear">
                                          [{oxhasrights ident="TOBASKET"}]
                                              [{if !$oDetailsProduct->isNotBuyable()}]
                                                  <div class="input-group">
                                                      <input id="amountToBasket" type="text" name="am" value="1" autocomplete="off" class="form-control">
                                                      <div class="input-group-tweak">
                                                          <button id="toBasket" type="submit"  class="btn btn-primary submitButton largeButton"><i class="fa fa-shopping-cart"></i> [{oxmultilang ident="TO_CART"}]</button>
                                                      </div>
                                                  </div>
                                              [{/if}]
                                          [{/oxhasrights}]
                                      </div>
                                  [{/block}]






            </div>




        </div>


        <div class="col-xs-12 col-sm-8 col-md-5 col-lg-6 details-col-middle" style="text-align: left;">
            [{block name="details_productmain_title"}]
                <h1 id="productTitle" itemprop="name">
                    [{$oDetailsProduct->oxarticles__oxtitle->value}] [{$oDetailsProduct->oxarticles__oxvarselect->value}]
                </h1>
            [{/block}]

            [{* article number *}]
            <!-- [{block name="details_productmain_artnumber"}]
                <span class="small text-muted">[{oxmultilang ident="ARTNUM" suffix="COLON"}] [{$oDetailsProduct->oxarticles__oxartnum->value}]</span>
            [{/block}] -->

            [{* ratings *}]
            <!-- <div class="star-ratings">
                [{if $oView->ratingIsActive()}]
                    [{block name="details_productmain_ratings"}]
                        [{include file="widget/reviews/rating.tpl" itemid="anid=`$oDetailsProduct->oxarticles__oxnid->value`" sRateUrl=$oDetailsProduct->getLink()}]
                    [{/block}]
                [{/if}]
            </div> -->

            [{* short description *}]
            <!-- [{block name="details_productmain_shortdesc"}]
                [{oxhasrights ident="SHOWSHORTDESCRIPTION"}]
                    [{if $oDetailsProduct->oxarticles__oxshortdesc->rawValue}]
                        <p class="shortdesc" id="productShortdesc" itemprop="description">[{$oDetailsProduct->oxarticles__oxshortdesc->rawValue}]</p>
                    [{/if}]
                [{/oxhasrights}]
            [{/block}] -->

            [{* article main info block *}]
            <div class="information" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                <div class="productMainInfo[{if $oManufacturer->oxmanufacturers__oxicon->value}] hasBrand[{/if}]">

                    [{* additional info *}]
                    <div class="additionalInfo clearfix">
                        [{assign var="oUnitPrice" value=$oDetailsProduct->getUnitPrice()}]
                        [{block name="details_productmain_priceperunit"}]
                            [{if $oUnitPrice}]
                                <span id="productPriceUnit">[{oxprice price=$oUnitPrice currency=$currency}]/[{$oDetailsProduct->getUnitName()}]</span>
                            [{/if}]
                        [{/block}]
                    </div>

                    [{if $oDetailsProduct->oxarticles__oxweight->value}]
                        <div class="weight">
                            [{block name="details_productmain_weight"}]
                                [{oxmultilang ident="WEIGHT" suffix="COLON"}] [{$oDetailsProduct->oxarticles__oxweight->value}] [{oxmultilang ident="KG"}]
                            [{/block}]
                        </div>
                    [{/if}]

                    [{block name="details_productmain_vpe"}]
                        [{if $oDetailsProduct->oxarticles__oxvpe->value > 1}]
                            <span class="vpe small">[{oxmultilang ident="DETAILS_VPE_MESSAGE_1"}] [{$oDetailsProduct->oxarticles__oxvpe->value}] [{oxmultilang ident="DETAILS_VPE_MESSAGE_2"}]</span>
                            <br>
                        [{/if}]
                    [{/block}]

                    [{assign var="blCanBuy" value=true}]
                    [{* variants | md variants *}]
                    [{block name="details_productmain_variantselections"}]
                        [{if $aVariantSelections && $aVariantSelections.selections}]
                            [{oxscript include="js/widgets/oxajax.min.js" priority=10 }]
                            [{oxscript include="js/widgets/oxarticlevariant.min.js" priority=10 }]
                            [{oxscript add="$( '#variants' ).oxArticleVariant();"}]
                            [{assign var="blCanBuy" value=$aVariantSelections.blPerfectFit}]
                            [{if !$blHasActiveSelections}]
                                [{if !$blCanBuy && !$oDetailsProduct->isParentNotBuyable()}]
                                    [{assign var="blCanBuy" value=true}]
                                [{/if}]
                            [{/if}]
                            <div id="variants" class="selectorsBox js-fnSubmit clear">
                                [{assign var="blHasActiveSelections" value=false}]
                                [{foreach from=$aVariantSelections.selections item=oList key=iKey}]
                                    [{if $oList->getActiveSelection()}]
                                        [{assign var="blHasActiveSelections" value=true}]
                                    [{/if}]
                                    [{include file="widget/product/selectbox.tpl" oSelectionList=$oList iKey=$iKey blInDetails=true}]
                                    <div class="clearfix"></div>
                                [{/foreach}]
                            </div>
                        [{/if}]
                    [{/block}]
                </div>

                [{* selection lists *}]
                [{block name="details_productmain_selectlists"}]
                    [{if $oViewConf->showSelectLists()}]
                        [{assign var="oSelections" value=$oDetailsProduct->getSelections()}]
                        [{if $oSelections}]
                            <div class="selectorsBox js-fnSubmit clear" id="productSelections">
                                [{foreach from=$oSelections item=oList name=selections}]
                                    [{include file="widget/product/selectbox.tpl" oSelectionList=$oList sFieldName="sel" iKey=$smarty.foreach.selections.index blHideDefault=true sSelType="seldrop"}]
                                [{/foreach}]
                            </div>
                        [{/if}]
                    [{/if}]
                [{/block}]

                <br>

                      <!-- get Attributes -->
                      [{foreach from=$oDetailsProduct->getAttributes() item=oAttr name=attribute}]
                        [{if $oAttr->oxattribute__oxtitle == 'Beneficios'}]
                            [{assign var="myString" value=$oAttr->oxattribute__oxvalue->value}]
                            [{assign var="atributos" value="|"|explode:$myString}]
                            <strong>[{$oAttr->oxattribute__oxtitle->value}]:</strong><br>
                            <ul>
                              [{foreach from=$atributos item=benef name=beneficio}]
                                <li>[{$benef}]</li>
                              [{/foreach}]
                            </ul>
                            <br>
                        [{else}]
                          <strong style="margin-right: 5px;"> [{$oAttr->oxattribute__oxtitle->value}]:</strong><br><span>[{$oAttr->oxattribute__oxvalue->value}]</span><br><br>
                        [{/if}]
                      [{/foreach}]










                    [{oxhasrights ident="TOBASKET"}]
                        <!-- [{if $oDetailsProduct->isBuyable()}]
                            <span class="deliverytime">
                                [{block name="details_productmain_deliverytime"}]
                                    [{include file="page/details/inc/deliverytime.tpl"}]
                                [{/block}]
                            </span>
                        [{/if}] -->
                    [{/oxhasrights}]

                    [{block name="details_productmain_social"}]
                        <div class="social">
                            [{if ( $oView->isActive('FbShare') || $oView->isActive('FbLike') && $oViewConf->getFbAppId() )}]
                                [{if $oView->isActive('FacebookConfirm') && !$oView->isFbWidgetVisible() }]
                                    <div class="socialButton" id="productFbShare">
                                        [{include file="widget/facebook/enable.tpl" source="widget/facebook/share.tpl" ident="#productFbShare"}]
                                        [{include file="widget/facebook/like.tpl" assign="fbfile"}]
                                        [{assign var='fbfile' value=$fbfile|strip|escape:'url'}]
                                        [{oxscript add="oxFacebook.buttons['#productFbLike']={html:'`$fbfile`',script:''};"}]
                                    </div>
                                    <div class="socialButton" id="productFbLike"></div>
                                [{else}]
                                    <div class="socialButton" id="productFbShare">
                                        [{include file="widget/facebook/enable.tpl" source="widget/facebook/share.tpl" ident="#productFbShare"}]
                                    </div>
                                    <div class="socialButton" id="productFbLike">
                                        [{include file="widget/facebook/enable.tpl" source="widget/facebook/like.tpl" ident="#productFbLike"}]
                                    </div>
                                [{/if}]
                            [{/if}]
                        </div>
                    [{/block}]
                </div>
            </div> <!--ends the col-xs -->
        </div>



        <div class="row" >

        </div>


        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 details-col-right">
            [{if $oManufacturer}]
                <div class="brandLogo">
                    [{block name="details_productmain_manufacturersicon"}]
                        <a href="[{$oManufacturer->getLink()}]" title="[{$oManufacturer->oxmanufacturers__oxtitle->value}]">
                            [{if $oManufacturer->oxmanufacturers__oxicon->value}]
                                <img src="[{$oManufacturer->getIconUrl()}]" alt="[{$oManufacturer->oxmanufacturers__oxtitle->value}]">
                            [{/if}]
                        </a>
                        <span itemprop="brand" class="hidden">[{$oManufacturer->oxmanufacturers__oxtitle->value}]</span>
                    [{/block}]
                </div>
            [{/if}]

            [{assign var="oSession" value=$oConfig->getSession()}]

            [{block name="details_productmain_productlinksselector"}]
                [{block name="details_productmain_productlinks"}]
                    <!-- <ul class="list-unstyled action-links">
                        <li>
                            [{if $oViewConf->getShowCompareList()}]
                                [{oxid_include_dynamic file="page/details/inc/compare_links.tpl" testid="" type="compare" aid=$oDetailsProduct->oxarticles__oxid->value anid=$oDetailsProduct->oxarticles__oxnid->value in_list=$oDetailsProduct->isOnComparisonList() page=$oView->getActPage() text_to_id="COMPARE" text_from_id="REMOVE_FROM_COMPARE_LIST"}]
                            [{/if}]
                        </li>
                        <li>
                            <a id="suggest" href="[{oxgetseourl ident=$oViewConf->getSelfLink()|cat:"cl=suggest" params="anid=`$oDetailsProduct->oxarticles__oxnid->value`"|cat:$oViewConf->getNavUrlParams()}]">[{oxmultilang ident="RECOMMEND"}]</a>
                        </li>
                        <li>
                            [{if $oViewConf->getShowListmania()}]
                                [{if $oxcmp_user}]
                                    <a id="recommList" href="[{oxgetseourl ident=$oViewConf->getSelfLink()|cat:"cl=recommadd" params="aid=`$oDetailsProduct->oxarticles__oxnid->value`&amp;anid=`$oDetailsProduct->oxarticles__oxnid->value`"|cat:$oViewConf->getNavUrlParams()|cat:"&amp;stoken="|cat:$oSession->getSessionChallengeToken()}]">[{oxmultilang ident="ADD_TO_LISTMANIA_LIST"}]</a>
                                [{else}]
                                    <a id="loginToRecommlist" href="[{oxgetseourl ident=$oViewConf->getSelfLink()|cat:"cl=account" params="anid=`$oDetailsProduct->oxarticles__oxnid->value`"|cat:"&amp;sourcecl="|cat:$oViewConf->getTopActiveClassName()|cat:$oViewConf->getNavUrlParams()}]">[{oxmultilang ident="ADD_TO_LISTMANIA_LIST"}]</a>
                                [{/if}]
                            [{/if}]
                        </li>
                        <li>
                            [{if $oxcmp_user}]
                                <a id="linkToNoticeList" href="[{oxgetseourl ident=$oViewConf->getSelfLink()|cat:"cl="|cat:$oViewConf->getTopActiveClassName() params="aid=`$oDetailsProduct->oxarticles__oxnid->value`&amp;anid=`$oDetailsProduct->oxarticles__oxnid->value`&amp;fnc=tonoticelist&amp;am=1"|cat:$oViewConf->getNavUrlParams()|cat:"&amp;stoken="|cat:$oSession->getSessionChallengeToken()}]">[{oxmultilang ident="ADD_TO_WISH_LIST"}]</a>
                            [{else}]
                                <a id="loginToNotice" href="[{oxgetseourl ident=$oViewConf->getSelfLink()|cat:"cl=account" params="anid=`$oDetailsProduct->oxarticles__oxnid->value`"|cat:"&amp;sourcecl="|cat:$oViewConf->getTopActiveClassName()|cat:$oViewConf->getNavUrlParams()}]">[{oxmultilang ident="ADD_TO_WISH_LIST"}]</a>
                            [{/if}]
                        </li>
                        <li>
                            [{if $oViewConf->getShowWishlist()}]
                                [{if $oxcmp_user}]
                                    <a id="linkToWishList" href="[{oxgetseourl ident=$oViewConf->getSelfLink()|cat:"cl="|cat:$oViewConf->getTopActiveClassName() params="aid=`$oDetailsProduct->oxarticles__oxnid->value`&anid=`$oDetailsProduct->oxarticles__oxnid->value`&amp;fnc=towishlist&amp;am=1"|cat:$oViewConf->getNavUrlParams()|cat:"&amp;stoken="|cat:$oSession->getSessionChallengeToken()}]">[{oxmultilang ident="ADD_TO_GIFT_REGISTRY"}]</a>
                                [{else}]
                                    <a id="loginToWish" href="[{oxgetseourl ident=$oViewConf->getSelfLink()|cat:"cl=account" params="anid=`$oDetailsProduct->oxarticles__oxnid->value`"|cat:"&amp;sourcecl="|cat:$oViewConf->getTopActiveClassName()|cat:$oViewConf->getNavUrlParams()}]">[{oxmultilang ident="ADD_TO_GIFT_REGISTRY"}]</a>
                                [{/if}]
                            [{/if}]
                        </li>
                        <li>
                            [{mailto extra='id="questionMail"' address=$oDetailsProduct->oxarticles__oxquestionemail->value|default:$oxcmp_shop->oxshops__oxinfoemail->value subject='QUESTIONS_ABOUT_THIS_PRODUCT'|oxmultilangassign|cat:" "|cat:$oDetailsProduct->oxarticles__oxartnum->value text='QUESTIONS_ABOUT_THIS_PRODUCT'|oxmultilangassign}]
                        </li>
                    </ul> -->
                [{/block}]
            [{/block}]
        </div>
    </div>
</div>

[{oxhasrights ident="TOBASKET"}]
    </form>
[{/oxhasrights}]
