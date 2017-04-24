[{capture append="oxidBlock_pageBody"}]
    [{if $oView->showRDFa()}]
        [{include file="rdfa/rdfa.tpl"}]
    [{/if}]

    [{block name="layout_header"}]
        [{include file="layout/header.tpl"}]
    [{/block}]

    [{assign var="blFullwidth" value=$oViewConf->getViewThemeParam('blFullwidthLayout')}]

     [{if $oView->getTemplateName() == 'page/shop/start.tpl'}]
      [{include file="widget/slider/slider.tpl"}]
     [{/if}]

    <div id="wrapper" [{if $sidebar}]class="sidebar[{$sidebar}]"[{/if}]>


        <div class="container">

                <div class="content-box">



<!--
                    [{if $oView->getClassName() != "start" && !$blHideBreadcrumb}]
                        [{block name="layout_breadcrumb"}]
                            [{include file="widget/breadcrumb.tpl"}]
                        [{/block}]
                    [{/if}] -->

                    [{$smarty.capture.loginErrors}]

                    <div class="row">
                        [{if $sidebar && $sidebar != "Right"}]
                            <div class="col-xs-12 col-md-3 [{$oView->getClassName()}]">
                                <div id="sidebar">
                                    [{include file="layout/sidebar.tpl"}]
                                </div>
                            </div>
                        [{/if}]

                        <div class="col-xs-12 [{if $sidebar}]col-md-9[{/if}]">

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
