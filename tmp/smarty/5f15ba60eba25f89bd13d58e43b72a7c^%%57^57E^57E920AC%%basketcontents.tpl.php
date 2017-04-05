<?php /* Smarty version 2.6.28, created on 2017-04-05 02:43:25
         compiled from page/checkout/inc/basketcontents.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'page/checkout/inc/basketcontents.tpl', 2, false),array('function', 'oxmultilang', 'page/checkout/inc/basketcontents.tpl', 37, false),array('function', 'oxprice', 'page/checkout/inc/basketcontents.tpl', 170, false),array('modifier', 'replace', 'page/checkout/inc/basketcontents.tpl', 115, false),)), $this); ?>
<?php echo smarty_function_oxscript(array('include' => "js/widgets/oxbasketchecks.min.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('include' => "js/libs/jqBootstrapValidation.min.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$('#checkAll, #basketRemoveAll').oxBasketChecks();"), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$('input,select,textarea').not('[type=submit]').jqBootstrapValidation();"), $this);?>

<?php $this->assign('currency', $this->_tpl_vars['oView']->getActCurrency()); ?>

<form name="basket<?php echo $this->_tpl_vars['basketindex']; ?>
" id="basket_form" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfActionLink(); ?>
" method="post">
    <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

    <input type="hidden" name="cl" value="basket">
    <input type="hidden" name="fnc" value="changebasket">
    <input type="hidden" name="CustomError" value="basket">

        <div class="visible-xs" id="basketcontents_list">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/checkout/inc/basketcontents_list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
        <div class="hidden-xs" id="basketcontents_table">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/checkout/inc/basketcontents_table.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
</form>

<?php if ($this->_tpl_vars['oViewConf']->getShowVouchers() && $this->_tpl_vars['oViewConf']->getActiveClassName() == 'basket'): ?>
    
        <div id="basketVoucher" class="pull-left">
            <form name="voucher" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfActionLink(); ?>
" method="post" class="js-oxValidate form-inline" role="form" novalidate="novalidate">
                <div class="couponBox" id="coupon">
                    <div class="hidden">
                        <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

                        <input type="hidden" name="cl" value="basket">
                        <input type="hidden" name="fnc" value="addVoucher">
                        <input type="hidden" name="CustomError" value="basket">
                    </div>

                    <div class="form-group">
                        <label class="req sr-only" for="input_voucherNr"><?php echo smarty_function_oxmultilang(array('ident' => 'ENTER_COUPON_NUMBER'), $this);?>
</label>
                        <div class="input-group">
                            <input type="text" name="voucherNr" size="30" class="form-control js-oxValidate js-oxValidate_notEmpty" id="input_voucherNr" placeholder="<?php echo smarty_function_oxmultilang(array('ident' => 'ENTER_COUPON_NUMBER'), $this);?>
" required="required">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary submitButton"><i class="fa fa-gift"></i> <?php echo smarty_function_oxmultilang(array('ident' => 'REDEEM_COUPON'), $this);?>
</button>
                            </span>
                        </div>
                        <div class="help-block"></div>
                    </div>


                    <?php $_from = $this->_tpl_vars['Errors']['basket']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['oEr']):
?>
                        <?php if ($this->_tpl_vars['oEr']->getErrorClassType() == 'oxVoucherException'): ?>
                            <div class="alert alert-danger">
                                <?php echo smarty_function_oxmultilang(array('ident' => 'COUPON_NOT_ACCEPTED','args' => $this->_tpl_vars['oEr']->getValue('voucherNr')), $this);?>

                                <strong><?php echo smarty_function_oxmultilang(array('ident' => 'REASON','suffix' => 'COLON'), $this);?>
</strong>
                                <?php echo $this->_tpl_vars['oEr']->getOxMessage(); ?>

                            </div>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </div>
            </form>
        </div>
    
<?php endif; ?>


    <div id="basketSummary" class="pull-right summary<?php if ($this->_tpl_vars['oViewConf']->getActiveClassName() == 'order'): ?> orderSummary<?php endif; ?>">
                <table class="table table-bordered table-striped">
            <?php if (! $this->_tpl_vars['oxcmp_basket']->getDiscounts()): ?>
                
                    <tr>
                        <th><?php echo smarty_function_oxmultilang(array('ident' => 'TOTAL_NET'), $this);?>
</th>
                        <td id="basketTotalProductsNetto"><?php echo $this->_tpl_vars['oxcmp_basket']->getProductsNetPrice(); ?>
&nbsp;<?php echo $this->_tpl_vars['currency']->sign; ?>
</td>
                    </tr>
                

                
                    <?php $_from = $this->_tpl_vars['oxcmp_basket']->getProductVats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['VATitem']):
?>
                        <tr>
                            <th><?php echo smarty_function_oxmultilang(array('ident' => 'VAT_PLUS_PERCENT_AMOUNT','suffix' => 'COLON','args' => $this->_tpl_vars['key']), $this);?>
</th>
                            <td><?php echo $this->_tpl_vars['VATitem']; ?>
&nbsp;<?php echo $this->_tpl_vars['currency']->sign; ?>
</td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                

                
                    <tr>
                        <th><?php echo smarty_function_oxmultilang(array('ident' => 'TOTAL_GROSS','suffix' => 'COLON'), $this);?>
</th>
                        <td id="basketTotalProductsGross"><?php echo $this->_tpl_vars['oxcmp_basket']->getFProductsPrice(); ?>
&nbsp;<?php echo $this->_tpl_vars['currency']->sign; ?>
</td>
                    </tr>
                
            <?php else: ?>
                <?php if ($this->_tpl_vars['oxcmp_basket']->isPriceViewModeNetto()): ?>
                    
                        <tr>
                            <th><?php echo smarty_function_oxmultilang(array('ident' => 'TOTAL_NET'), $this);?>
</th>
                            <td id="basketTotalProductsNetto"><?php echo $this->_tpl_vars['oxcmp_basket']->getProductsNetPrice(); ?>
&nbsp;<?php echo $this->_tpl_vars['currency']->sign; ?>
</td>
                        </tr>
                    
                <?php else: ?>
                     
                        <tr>
                            <th><?php echo smarty_function_oxmultilang(array('ident' => 'TOTAL_GROSS','suffix' => 'COLON'), $this);?>
</th>
                            <td id="basketTotalProductsGross"><?php echo $this->_tpl_vars['oxcmp_basket']->getFProductsPrice(); ?>
&nbsp;<?php echo $this->_tpl_vars['currency']->sign; ?>
</td>
                        </tr>
                    
                <?php endif; ?>

                
                    <?php $_from = $this->_tpl_vars['oxcmp_basket']->getDiscounts(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['test_Discounts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['test_Discounts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['oDiscount']):
        $this->_foreach['test_Discounts']['iteration']++;
?>
                        <tr>
                            <th>
                                <b><?php if ($this->_tpl_vars['oDiscount']->dDiscount < 0): ?><?php echo smarty_function_oxmultilang(array('ident' => 'SURCHARGE'), $this);?>
<?php else: ?><?php echo smarty_function_oxmultilang(array('ident' => 'DISCOUNT'), $this);?>
<?php endif; ?>&nbsp;</b>
                                <?php echo $this->_tpl_vars['oDiscount']->sDiscount; ?>

                            </th>
                            <td>
                                <?php if ($this->_tpl_vars['oDiscount']->dDiscount < 0): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['oDiscount']->fDiscount)) ? $this->_run_mod_handler('replace', true, $_tmp, "-", "") : smarty_modifier_replace($_tmp, "-", "")); ?>
<?php else: ?>-<?php echo $this->_tpl_vars['oDiscount']->fDiscount; ?>
<?php endif; ?>&nbsp;<?php echo $this->_tpl_vars['currency']->sign; ?>

                            </td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                

                <?php if (! $this->_tpl_vars['oxcmp_basket']->isPriceViewModeNetto()): ?>
                    
                        <tr>
                            <th><?php echo smarty_function_oxmultilang(array('ident' => 'TOTAL_NET'), $this);?>
</th>
                            <td id="basketTotalNetto"><?php echo $this->_tpl_vars['oxcmp_basket']->getProductsNetPrice(); ?>
&nbsp;<?php echo $this->_tpl_vars['currency']->sign; ?>
</td>
                        </tr>
                    
                <?php endif; ?>

                
                    <?php $_from = $this->_tpl_vars['oxcmp_basket']->getProductVats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['VATitem']):
?>
                        <tr>
                            <th><?php echo smarty_function_oxmultilang(array('ident' => 'VAT_PLUS_PERCENT_AMOUNT','suffix' => 'COLON','args' => $this->_tpl_vars['key']), $this);?>
</th>
                            <td><?php echo $this->_tpl_vars['VATitem']; ?>
&nbsp;<?php echo $this->_tpl_vars['currency']->sign; ?>
</td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                

                <?php if ($this->_tpl_vars['oxcmp_basket']->isPriceViewModeNetto()): ?>
                    
                        <tr>
                            <th><?php echo smarty_function_oxmultilang(array('ident' => 'TOTAL_GROSS','suffix' => 'COLON'), $this);?>
</th>
                            <td id="basketTotalGross"><?php echo $this->_tpl_vars['oxcmp_basket']->getFProductsPrice(); ?>
&nbsp;<?php echo $this->_tpl_vars['currency']->sign; ?>
</td>
                        </tr>
                    
                <?php endif; ?>
            <?php endif; ?>

            
                <?php if ($this->_tpl_vars['oViewConf']->getShowVouchers() && $this->_tpl_vars['oxcmp_basket']->getVoucherDiscValue()): ?>
                    <?php $_from = $this->_tpl_vars['oxcmp_basket']->getVouchers(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['Voucher'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['Voucher']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['sVoucher']):
        $this->_foreach['Voucher']['iteration']++;
?>
                        <tr class="couponData">
                            <th><span><strong><?php echo smarty_function_oxmultilang(array('ident' => 'COUPON'), $this);?>
</strong>&nbsp;(<?php echo smarty_function_oxmultilang(array('ident' => 'NUMBER'), $this);?>
 <?php echo $this->_tpl_vars['sVoucher']->sVoucherNr; ?>
)</span>
                            <?php if ($this->_tpl_vars['editable']): ?>
                                <a href="<?php echo $this->_tpl_vars['oViewConf']->getSelfLink(); ?>
&amp;cl=basket&amp;fnc=removeVoucher&amp;voucherId=<?php echo $this->_tpl_vars['sVoucher']->sVoucherId; ?>
&amp;CustomError=basket" class="removeFn"><?php echo smarty_function_oxmultilang(array('ident' => 'REMOVE'), $this);?>
</a>
                            <?php endif; ?>
                            </th>
                            <td>-<strong><?php echo $this->_tpl_vars['sVoucher']->fVoucherdiscount; ?>
&nbsp;<?php echo $this->_tpl_vars['currency']->sign; ?>
</strong></td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
            

            
                <?php $this->assign('deliveryCost', $this->_tpl_vars['oxcmp_basket']->getDeliveryCost()); ?>
                <?php if ($this->_tpl_vars['deliveryCost'] && ( $this->_tpl_vars['oxcmp_basket']->getBasketUser() || $this->_tpl_vars['oViewConf']->isFunctionalityEnabled('blCalculateDelCostIfNotLoggedIn') )): ?>
                    <?php if ($this->_tpl_vars['oViewConf']->isFunctionalityEnabled('blShowVATForDelivery')): ?>
                        <tr>
                            <th><?php echo smarty_function_oxmultilang(array('ident' => 'SHIPPING_NET','suffix' => 'COLON'), $this);?>
</th>
                            <td id="basketDeliveryNetto"><?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['deliveryCost']->getNettoPrice(),'currency' => $this->_tpl_vars['currency']), $this);?>
</td>
                        </tr>
                        <?php if ($this->_tpl_vars['deliveryCost']->getVatValue()): ?>
                        <tr>
                            <?php if ($this->_tpl_vars['oxcmp_basket']->isProportionalCalculationOn()): ?>
                                <th><?php echo smarty_function_oxmultilang(array('ident' => 'BASKET_TOTAL_PLUS_PROPORTIONAL_VAT','suffix' => 'COLON'), $this);?>
</th>
                            <?php else: ?>
                                <th><?php echo smarty_function_oxmultilang(array('ident' => 'VAT_PLUS_PERCENT_AMOUNT','suffix' => 'COLON','args' => $this->_tpl_vars['deliveryCost']->getVat()), $this);?>
</th>
                            <?php endif; ?>
                            <td id="basketDeliveryVat"><?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['deliveryCost']->getVatValue(),'currency' => $this->_tpl_vars['currency']), $this);?>
</td>
                        </tr>
                        <?php endif; ?>
                    <?php else: ?>
                    <tr>
                        <th><?php echo smarty_function_oxmultilang(array('ident' => 'SHIPPING_COST','suffix' => 'COLON'), $this);?>
</th>
                        <td id="basketDeliveryGross"><?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['deliveryCost']->getBruttoPrice(),'currency' => $this->_tpl_vars['currency']), $this);?>
</td>
                    </tr>
                    <?php endif; ?>
                <?php endif; ?>
            

            
                <?php $this->assign('paymentCost', $this->_tpl_vars['oxcmp_basket']->getPaymentCost()); ?>
                <?php if ($this->_tpl_vars['paymentCost'] && $this->_tpl_vars['paymentCost']->getPrice()): ?>
                    <?php if ($this->_tpl_vars['oViewConf']->isFunctionalityEnabled('blShowVATForPayCharge')): ?>
                        <tr>
                            <th><?php if ($this->_tpl_vars['paymentCost']->getPrice() >= 0): ?><?php echo smarty_function_oxmultilang(array('ident' => 'SURCHARGE'), $this);?>
<?php else: ?><?php echo smarty_function_oxmultilang(array('ident' => 'DEDUCTION'), $this);?>
<?php endif; ?> <?php echo smarty_function_oxmultilang(array('ident' => 'PAYMENT_METHOD','suffix' => 'COLON'), $this);?>
</th>
                            <td id="basketPaymentNetto"><?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['paymentCost']->getNettoPrice(),'currency' => $this->_tpl_vars['currency']), $this);?>
</td>
                        </tr>
                        <?php if ($this->_tpl_vars['paymentCost']->getVatValue()): ?>
                            <tr>
                                <?php if ($this->_tpl_vars['oxcmp_basket']->isProportionalCalculationOn()): ?>
                                    <th><?php echo smarty_function_oxmultilang(array('ident' => 'BASKET_TOTAL_PLUS_PROPORTIONAL_VAT','suffix' => 'COLON'), $this);?>
</th>
                                <?php else: ?>
                                    <th><?php echo smarty_function_oxmultilang(array('ident' => 'SURCHARGE_PLUS_PERCENT_AMOUNT','suffix' => 'COLON','args' => $this->_tpl_vars['paymentCost']->getVat()), $this);?>
</th>
                                <?php endif; ?>
                                <td id="basketPaymentVat"><?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['paymentCost']->getVatValue(),'currency' => $this->_tpl_vars['currency']), $this);?>
</td>
                            </tr>
                        <?php endif; ?>
                    <?php else: ?>
                        <tr>
                            <th><?php if ($this->_tpl_vars['paymentCost']->getPrice() >= 0): ?><?php echo smarty_function_oxmultilang(array('ident' => 'SURCHARGE'), $this);?>
<?php else: ?><?php echo smarty_function_oxmultilang(array('ident' => 'DEDUCTION'), $this);?>
<?php endif; ?> <?php echo smarty_function_oxmultilang(array('ident' => 'PAYMENT_METHOD','suffix' => 'COLON'), $this);?>
</th>
                            <td id="basketPaymentGross"><?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['paymentCost']->getBruttoPrice(),'currency' => $this->_tpl_vars['currency']), $this);?>
</td>
                        </tr>
                    <?php endif; ?>
                <?php endif; ?>
            

            
                <?php $this->assign('trustedShopProtectionCost', $this->_tpl_vars['oxcmp_basket']->getTrustedShopProtectionCost()); ?>
                <?php if ($this->_tpl_vars['trustedShopProtectionCost'] && $this->_tpl_vars['trustedShopProtectionCost']->getPrice() > 0): ?>
                    <?php if ($this->_tpl_vars['oViewConf']->isFunctionalityEnabled('blShowVATForPayCharge')): ?>
                        <tr>
                            <th><?php echo smarty_function_oxmultilang(array('ident' => 'TRUSTED_SHOP_BUYER_PROTECTION'), $this);?>
</th>
                            <td id="basketTSNetto"><?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['trustedShopProtectionCost']->getNettoPrice(),'currency' => $this->_tpl_vars['currency']), $this);?>
</td>
                        </tr>
                        <?php if ($this->_tpl_vars['trustedShopProtectionCost']->getVatValue()): ?>
                            <tr>
                                <?php if ($this->_tpl_vars['oxcmp_basket']->isProportionalCalculationOn()): ?>
                                    <th><?php echo smarty_function_oxmultilang(array('ident' => 'BASKET_TOTAL_PLUS_PROPORTIONAL_VAT','suffix' => 'COLON'), $this);?>
</th>
                                <?php else: ?>
                                    <th><?php echo smarty_function_oxmultilang(array('ident' => 'VAT_PLUS_PERCENT_AMOUNT','suffix' => 'COLON','args' => $this->_tpl_vars['trustedShopProtectionCost']->getVat()), $this);?>
</th>
                                <?php endif; ?>
                                <td id="basketTSVat"><?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['trustedShopProtectionCost']->getVatValue(),'currency' => $this->_tpl_vars['currency']), $this);?>
</td>
                            </tr>
                        <?php endif; ?>
                    <?php else: ?>
                        <tr>
                            <th><?php echo smarty_function_oxmultilang(array('ident' => 'TRUSTED_SHOP_BUYER_PROTECTION'), $this);?>
</th>
                            <td id="basketTSGross"><?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['trustedShopProtectionCost']->getBruttoPrice(),'currency' => $this->_tpl_vars['currency']), $this);?>
</td>
                        </tr>
                    <?php endif; ?>
                <?php endif; ?>
            

            
                <?php if ($this->_tpl_vars['oViewConf']->getShowGiftWrapping()): ?>

                    <?php $this->assign('wrappingCost', $this->_tpl_vars['oxcmp_basket']->getWrappingCost()); ?>
                    <?php if ($this->_tpl_vars['wrappingCost'] && $this->_tpl_vars['wrappingCost']->getPrice() > 0): ?>
                        <?php if ($this->_tpl_vars['oViewConf']->isFunctionalityEnabled('blShowVATForWrapping')): ?>
                            <tr>
                                <th><?php echo smarty_function_oxmultilang(array('ident' => 'BASKET_TOTAL_WRAPPING_COSTS_NET','suffix' => 'COLON'), $this);?>
</th>
                                <td id="basketWrappingNetto"><?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['wrappingCost']->getNettoPrice(),'currency' => $this->_tpl_vars['currency']), $this);?>
</td>
                            </tr>
                            <?php if ($this->_tpl_vars['oxcmp_basket']->getWrappCostVat()): ?>
                                <tr>
                                    <th><?php echo smarty_function_oxmultilang(array('ident' => 'PLUS_VAT','suffix' => 'COLON'), $this);?>
</th>
                                    <td id="basketWrappingVat"><?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['wrappingCost']->getVatValue(),'currency' => $this->_tpl_vars['currency']), $this);?>
</td>
                                </tr>
                            <?php endif; ?>
                        <?php else: ?>
                            <tr>
                                <th><?php echo smarty_function_oxmultilang(array('ident' => 'GIFT_WRAPPING','suffix' => 'COLON'), $this);?>
</th>
                                <td id="basketWrappingGross"><?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['wrappingCost']->getBruttoPrice(),'currency' => $this->_tpl_vars['currency']), $this);?>
</td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php $this->assign('giftCardCost', $this->_tpl_vars['oxcmp_basket']->getGiftCardCost()); ?>
                    <?php if ($this->_tpl_vars['giftCardCost'] && $this->_tpl_vars['giftCardCost']->getPrice() > 0): ?>
                        <?php if ($this->_tpl_vars['oViewConf']->isFunctionalityEnabled('blShowVATForWrapping')): ?>
                            <tr>
                                <th><?php echo smarty_function_oxmultilang(array('ident' => 'BASKET_TOTAL_GIFTCARD_COSTS_NET','suffix' => 'COLON'), $this);?>
</th>
                                <td id="basketGiftCardNetto"><?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['giftCardCost']->getNettoPrice(),'currency' => $this->_tpl_vars['currency']), $this);?>
</td>
                            </tr>
                            <tr>
                                <?php if ($this->_tpl_vars['oxcmp_basket']->isProportionalCalculationOn()): ?>
                                    <th><?php echo smarty_function_oxmultilang(array('ident' => 'BASKET_TOTAL_PLUS_PROPORTIONAL_VAT','suffix' => 'COLON'), $this);?>
</th>
                                <?php else: ?>
                                    <th><?php echo smarty_function_oxmultilang(array('ident' => 'VAT_PLUS_PERCENT_AMOUNT','suffix' => 'COLON','args' => $this->_tpl_vars['giftCardCost']->getVat()), $this);?>
 </th>
                                <?php endif; ?>
                                <td id="basketGiftCardVat"><?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['giftCardCost']->getVatValue(),'currency' => $this->_tpl_vars['currency']), $this);?>
</td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <th><?php echo smarty_function_oxmultilang(array('ident' => 'GREETING_CARD','suffix' => 'COLON'), $this);?>
</th>
                                <td id="basketGiftCardGross"><?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['giftCardCost']->getBruttoPrice(),'currency' => $this->_tpl_vars['currency']), $this);?>
</td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            

            
                <tr>
                    <th class="lead"><strong><?php echo smarty_function_oxmultilang(array('ident' => 'GRAND_TOTAL','suffix' => 'COLON'), $this);?>
</strong></th>
                    <td id="basketGrandTotal" class="lead"><strong><?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['oxcmp_basket']->getPrice(),'currency' => $this->_tpl_vars['currency']), $this);?>
</strong></td>
                </tr>
            

            <?php if ($this->_tpl_vars['oxcmp_basket']->hasSkipedDiscount()): ?>
                <tr>
                    <th><span class="note">**</span> <?php echo smarty_function_oxmultilang(array('ident' => 'MESSAGE_COUPON_NOT_APPLIED_FOR_ARTICLES'), $this);?>
</span></th>
                    <td></td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

<div class="clearfix"></div>