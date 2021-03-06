[{capture append="oxidBlock_pageBody"}]
    [{if $oView->showRDFa()}]
        [{include file="rdfa/rdfa.tpl"}]
    [{/if}]

    [{block name="layout_header"}]
        [{include file="layout/header.tpl"}]
    [{/block}]

    [{assign var="blFullwidth" value=$oViewConf->getViewThemeParam('blFullwidthLayout')}]

<div class="hidden-xs">

  [{if $oView->getTemplateName() == 'page/shop/start.tpl'}]
  [{include file="widget/slider/slider.tpl"}]
  [{/if}]
</div>


<div class="visible-xs">
  [{if $oView->getTemplateName() == 'page/shop/start.tpl'}]
  [{include file="widget/slider/slider_movil.tpl"}]
  [{/if}]
</div>




     [{if $oView->getTitle() == 'Productos'}]
      [{assign var="flag" value="true"}]
     [{/if}]

     [{if $oView->getTitle() == 'Green Peach'}]
      [{assign var="flag2" value="true"}]
     [{/if}]
     [{if $oView->getTitle() == 'Contacto'}]
      [{assign var="flag3" value="true"}]
     [{/if}]
     [{if $oView->getTemplateName() == 'page/shop/start.tpl'}]
      [{assign var="flag4" value="true"}]
     [{/if}]

     [{if $oView->getTemplateName() == 'page/checkout/basket.tpl'}]

        <div id="wrapper" [{if $flag == true}]class="productlisting"[{elseif $flag3 == true}]class="contacto-page"[{elseif $flag4 == true}]class="start-page"[{/if}]style="margin-bottom: 6%;">
     [{else}]
    <div id="wrapper" [{if $flag == true}]class="productlisting"[{elseif $flag3 == true}]class="contacto-page"[{elseif $flag4 == true}]class="start-page"[{/if}]style=[{if $flag2}]"min-height: 730px;"[{/if}]>
      [{/if}]

        <div class="container">


                          <div class="content-box">





                    [{if $oView->getClassName() != "start" && !$blHideBreadcrumb}]
                      [{if $oView->getTitle() != 'Productos' && $oView->getTitle() != 'Green Peach' && $oView->getTitle() != 'Clientes' && $oView->getTitle() != 'Distribuidores' && $oView->getTitle() != 'Blog' && $oView->getTitle() != 'Contacto' && $oView->getTitle() != 'Registrar' }]
                        [{block name="layout_breadcrumb"}]
                            [{include file="widget/breadcrumb.tpl"}]
                        [{/block}]
                      [{/if}]
                    [{/if}]

                    [{$smarty.capture.loginErrors}]

                    <div class="row">
                        [{if $sidebar && $sidebar != "Right"}]
                            <div class="col-xs-12 col-md-3 [{$oView->getClassName()}]">
                            </div>
                        [{/if}]

                        <div class="col-xs-12 [{if $sidebar}]col-md-8[{/if}]" style="margin-left: 2%;">

                            <div id="content">
                                [{block name="content_main"}]
                                    [{include file="message/errors.tpl"}]

                                    [{foreach from=$oxidBlock_content item="_block"}]
                                        [{$_block}]
                                    [{/foreach}]
                                [{/block}]
                            </div>

                        </div>

                        [{if $sidebar && $sidebar == "Right"}]
                            <div class="col-xs-12 col-md-3 [{$oView->getClassName()}]">
                                <div id="sidebar">
                                    [{include file="layout/sidebar.tpl"}]
                                </div>
                            </div>
                        [{/if}]
                    </div>

                </div>

        </div>

    </div>
    [{if $oView->getTemplateName() == 'page/shop/start.tpl'}]
     [{include file="widget/contact/contact-box.tpl"}]
    [{/if}]


            [{include file="layout/footer.tpl"}]


[{/capture}]


[{include file="layout/base.tpl"}]
