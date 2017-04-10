<?php /* Smarty version 2.6.28, created on 2017-04-10 04:50:17
         compiled from page/checkout/payment.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'page/checkout/payment.tpl', 20, false),array('function', 'oxprice', 'page/checkout/payment.tpl', 42, false),array('function', 'oxscript', 'page/checkout/payment.tpl', 92, false),array('function', 'oxgetseourl', 'page/checkout/payment.tpl', 142, false),array('block', 'oxifcontent', 'page/checkout/payment.tpl', 153, false),array('modifier', 'cat', 'page/checkout/payment.tpl', 158, false),array('insert', 'oxid_tracker', 'page/checkout/payment.tpl', 166, false),)), $this); ?>
<?php ob_start(); ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/checkout/inc/steps.tpl", 'smarty_include_vars' => array('active' => 3)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    
        <?php $this->assign('currency', $this->_tpl_vars['oView']->getActCurrency()); ?>
        
            <?php if ($this->_tpl_vars['oView']->getAllSets()): ?>
                <?php $this->assign('aErrors', $this->_tpl_vars['oView']->getFieldValidationErrors()); ?>
                <form action="<?php echo $this->_tpl_vars['oViewConf']->getSslSelfLink(); ?>
" name="shipping" id="shipping" method="post">
                    <div class="hidden">
                        <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

                        <?php echo $this->_tpl_vars['oViewConf']->getNavFormParams(); ?>

                        <input type="hidden" name="cl" value="<?php echo $this->_tpl_vars['oViewConf']->getActiveClassName(); ?>
">
                        <input type="hidden" name="fnc" value="changeshipping">
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php if ($this->_tpl_vars['oView']->getAllSetsCnt() > 1): ?><?php echo smarty_function_oxmultilang(array('ident' => 'SELECT_SHIPPING_METHOD'), $this);?>
<?php else: ?><?php echo smarty_function_oxmultilang(array('ident' => 'SELECTED_SHIPPING_CARRIER'), $this);?>
<?php endif; ?></h3>
                        </div>
                        <div class="panel-body">
                            
                                <div class="form-group">
                                    <select class="form-control selectpicker" name="sShipSet" onchange="this.form.submit();">
                                        <?php $_from = $this->_tpl_vars['oView']->getAllSets(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ShipSetSelect'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ShipSetSelect']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sShipID'] => $this->_tpl_vars['oShippingSet']):
        $this->_foreach['ShipSetSelect']['iteration']++;
?>
                                            <option value="<?php echo $this->_tpl_vars['sShipID']; ?>
" <?php if ($this->_tpl_vars['oShippingSet']->blSelected): ?>SELECTED<?php endif; ?>><?php echo $this->_tpl_vars['oShippingSet']->oxdeliveryset__oxtitle->value; ?>
</option>
                                        <?php endforeach; endif; unset($_from); ?>
                                    </select>
                                </div>
                                <noscript>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success submitButton largeButton"><?php echo smarty_function_oxmultilang(array('ident' => 'UPDATE_SHIPPING_CARRIER'), $this);?>
</button>
                                    </div>
                                </noscript>
                            

                            <?php $this->assign('oDeliveryCostPrice', $this->_tpl_vars['oxcmp_basket']->getDeliveryCost()); ?>
                            <?php if ($this->_tpl_vars['oDeliveryCostPrice'] && $this->_tpl_vars['oDeliveryCostPrice']->getPrice() > 0): ?>
                                <?php if ($this->_tpl_vars['oViewConf']->isFunctionalityEnabled('blShowVATForDelivery')): ?>
                                    <div id="shipSetCost">
                                        <b><?php echo smarty_function_oxmultilang(array('ident' => 'CHARGES','suffix' => 'COLON'), $this);?>
 <?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['oDeliveryCostPrice']->getNettoPrice(),'currency' => $this->_tpl_vars['currency']), $this);?>

                                            (<?php echo smarty_function_oxmultilang(array('ident' => 'PLUS_VAT'), $this);?>
 <?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['oDeliveryCostPrice']->getVatValue(),'currency' => $this->_tpl_vars['currency']), $this);?>
)
                                        </b>
                                    </div>
                                <?php else: ?>
                                    <div id="shipSetCost">
                                        <b><?php echo smarty_function_oxmultilang(array('ident' => 'CHARGES','suffix' => 'COLON'), $this);?>
 <?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['oDeliveryCostPrice']->getBruttoPrice(),'currency' => $this->_tpl_vars['currency']), $this);?>
</b>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        

        
            <?php $this->assign('iPayError', $this->_tpl_vars['oView']->getPaymentError()); ?>

            <?php if ($this->_tpl_vars['iPayError'] == 1): ?>
                <div class="alert alert-danger"><?php echo smarty_function_oxmultilang(array('ident' => 'ERROR_MESSAGE_COMPLETE_FIELDS_CORRECTLY'), $this);?>
</div>
            <?php elseif ($this->_tpl_vars['iPayError'] == 2): ?>
                <div class="alert alert-danger"><?php echo smarty_function_oxmultilang(array('ident' => 'MESSAGE_PAYMENT_AUTHORIZATION_FAILED'), $this);?>
</div>
            <?php elseif ($this->_tpl_vars['iPayError'] == 4): ?>
                <div class="alert alert-danger"><?php echo smarty_function_oxmultilang(array('ident' => 'MESSAGE_UNAVAILABLE_SHIPPING_METHOD'), $this);?>
</div>
            <?php elseif ($this->_tpl_vars['iPayError'] == 5): ?>
                <div class="alert alert-danger"><?php echo smarty_function_oxmultilang(array('ident' => 'MESSAGE_PAYMENT_AUTHORIZATION_FAILED'), $this);?>
</div>
            <?php elseif ($this->_tpl_vars['iPayError'] == 6): ?>
                <div class="alert alert-danger"><?php echo smarty_function_oxmultilang(array('ident' => 'TRUSTED_SHOP_UNAVAILABLE_PROTECTION'), $this);?>
</div>
            <?php elseif ($this->_tpl_vars['iPayError'] > 6): ?>
                <!--Add custom error message here-->
                <div class="alert alert-danger"><?php echo smarty_function_oxmultilang(array('ident' => 'MESSAGE_PAYMENT_AUTHORIZATION_FAILED'), $this);?>
</div>
            <?php elseif ($this->_tpl_vars['iPayError'] == -1): ?>
                <div class="alert alert-danger"><?php echo smarty_function_oxmultilang(array('ident' => 'MESSAGE_PAYMENT_UNAVAILABLE_PAYMENT_ERROR'), $this);?>
 "<?php echo $this->_tpl_vars['oView']->getPaymentErrorText(); ?>
").</div>
            <?php elseif ($this->_tpl_vars['iPayError'] == -2): ?>
                <div class="alert alert-danger"><?php echo smarty_function_oxmultilang(array('ident' => 'MESSAGE_NO_SHIPPING_METHOD_FOUND'), $this);?>
</div>
            <?php elseif ($this->_tpl_vars['iPayError'] == -3): ?>
                <div class="alert alert-danger"><?php echo smarty_function_oxmultilang(array('ident' => 'MESSAGE_PAYMENT_SELECT_ANOTHER_PAYMENT'), $this);?>
</div>
            <?php elseif ($this->_tpl_vars['iPayError'] == -4): ?>
                <div class="alert alert-danger"><?php echo smarty_function_oxmultilang(array('ident' => 'MESSAGE_PAYMENT_BANK_CODE_INVALID'), $this);?>
</div>
            <?php elseif ($this->_tpl_vars['iPayError'] == -5): ?>
                <div class="alert alert-danger"><?php echo smarty_function_oxmultilang(array('ident' => 'MESSAGE_PAYMENT_ACCOUNT_NUMBER_INVALID'), $this);?>
</div>
            <?php endif; ?>
        

        <div class="card-errors">

        </div>

        
            <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxpayment.min.js",'priority' => 10), $this);?>

            <?php echo smarty_function_oxscript(array('include' => "js/libs/jqBootstrapValidation.min.js",'priority' => 10), $this);?>

            <?php echo smarty_function_oxscript(array('add' => "$( '#payment' ).oxPayment();"), $this);?>

            <?php echo smarty_function_oxscript(array('add' => "$('input,select,textarea').not('[type=submit]').jqBootstrapValidation();"), $this);?>


            <form action="<?php echo $this->_tpl_vars['oViewConf']->getSslSelfLink(); ?>
" class="form-horizontal js-oxValidate payment" id="payment" name="order" method="post" novalidate="novalidate">
                <div class="hidden">
                    <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

                    <?php echo $this->_tpl_vars['oViewConf']->getNavFormParams(); ?>

                    <input type="hidden" name="cl" value="<?php echo $this->_tpl_vars['oViewConf']->getActiveClassName(); ?>
">
                    <input type="hidden" name="fnc" value="validatepayment">
                </div>

                <?php if ($this->_tpl_vars['oView']->getPaymentList()): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 id="paymentHeader" class="panel-title"><?php echo smarty_function_oxmultilang(array('ident' => 'PAYMENT_METHOD'), $this);?>
</h3>
                        </div>
                        <div class="panel-body">
                            <?php $this->assign('inptcounter', "-1"); ?>
                            <?php $_from = $this->_tpl_vars['oView']->getPaymentList(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['PaymentSelect'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['PaymentSelect']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sPaymentID'] => $this->_tpl_vars['paymentmethod']):
        $this->_foreach['PaymentSelect']['iteration']++;
?>
                                <?php $this->assign('inptcounter', ($this->_tpl_vars['inptcounter']+1)); ?>
                                
                                    <div class="well well-sm">
                                        <?php if ($this->_tpl_vars['sPaymentID'] == 'oxidcashondel'): ?>
                                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/checkout/inc/payment_oxidcashondel.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                        <?php elseif ($this->_tpl_vars['sPaymentID'] == 'oxidcreditcard'): ?>
                                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/checkout/inc/payment_oxidcreditcard.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                        <?php elseif ($this->_tpl_vars['sPaymentID'] == 'oxiddebitnote'): ?>
                                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/checkout/inc/payment_oxiddebitnote.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                        <?php else: ?>
                                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/checkout/inc/payment_other.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                        <?php endif; ?>
                                    </div>
                                
                            <?php endforeach; endif; unset($_from); ?>

                                                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/checkout/inc/trustedshops.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                                    </div>
                    </div>

                    
                        <?php if ($this->_tpl_vars['oView']->isLowOrderPrice()): ?>
                            <div class="alert alert-info">
                                <b><?php echo smarty_function_oxmultilang(array('ident' => 'MIN_ORDER_PRICE'), $this);?>
 <?php echo $this->_tpl_vars['oView']->getMinOrderPrice(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
</b>
                            </div>
                        <?php else: ?>
                            <div class="well well-sm">
                                <a href="<?php echo smarty_function_oxgetseourl(array('ident' => $this->_tpl_vars['oViewConf']->getOrderLink()), $this);?>
" class="btn btn-default pull-left prevStep submitButton largeButton" id="paymentBackStepBottom"><i class="fa fa-caret-left"></i> <?php echo smarty_function_oxmultilang(array('ident' => 'PREVIOUS_STEP'), $this);?>
</a>
                                <button type="submit" name="userform" class="btn btn-primary pull-right submitButton nextStep largeButton" id="paymentNextStepBottom"><?php echo smarty_function_oxmultilang(array('ident' => 'CONTINUE_TO_NEXT_STEP'), $this);?>
 <i class="fa fa-caret-right"></i></button>
                                <div class="clearfix"></div>
                            </div>
                        <?php endif; ?>
                    

                <?php elseif ($this->_tpl_vars['oView']->getEmptyPayment()): ?>
                    
                        <div class="lineBlock"></div>
                        <h3 id="paymentHeader" class="blockHead"><?php echo smarty_function_oxmultilang(array('ident' => 'PAYMENT_INFORMATION'), $this);?>
</h3>
                        <?php $this->_tag_stack[] = array('oxifcontent', array('ident' => 'oxnopaymentmethod','object' => 'oCont')); $_block_repeat=true;smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                            <?php echo $this->_tpl_vars['oCont']->oxcontents__oxcontent->value; ?>

                        <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                        <input type="hidden" name="paymentid" value="oxempty">
                        <div class="lineBox clear">
                            <a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=user") : smarty_modifier_cat($_tmp, "cl=user"))), $this);?>
" class="btn btn-default pull-left prevStep submitButton largeButton"><i class="fa fa-caret-left"></i> <?php echo smarty_function_oxmultilang(array('ident' => 'PREVIOUS_STEP'), $this);?>
</a>
                            <button type="submit" name="userform" class="btn btn-primary pull-right submitButton nextStep largeButton" id="paymentNextStepBottom"><?php echo smarty_function_oxmultilang(array('ident' => 'CONTINUE_TO_NEXT_STEP'), $this);?>
 <i class="fa fa-caret-right"></i></button>
                        </div>
                    
                <?php endif; ?>
            </form>
        
    
    <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'oxid_tracker', 'title' => $this->_tpl_vars['template_title'])), $this); ?>

<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('oxidBlock_content', ob_get_contents());ob_end_clean(); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layout/page.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>