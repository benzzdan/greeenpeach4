<?php /* Smarty version 2.6.28, created on 2017-04-10 04:34:15
         compiled from page/checkout/inc/payment_other.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxprice', 'page/checkout/inc/payment_other.tpl', 11, false),array('function', 'oxmultilang', 'page/checkout/inc/payment_other.tpl', 13, false),array('modifier', 'strip_tags', 'page/checkout/inc/payment_other.tpl', 33, false),array('modifier', 'trim', 'page/checkout/inc/payment_other.tpl', 33, false),)), $this); ?>
<dl>
    <dt>
        <input id="payment_<?php echo $this->_tpl_vars['sPaymentID']; ?>
" type="radio" name="paymentid" value="<?php echo $this->_tpl_vars['sPaymentID']; ?>
" <?php if ($this->_tpl_vars['oView']->getCheckedPaymentId() == $this->_tpl_vars['paymentmethod']->oxpayments__oxid->value): ?>checked<?php endif; ?>>
        <label for="payment_<?php echo $this->_tpl_vars['sPaymentID']; ?>
"><b><?php echo $this->_tpl_vars['paymentmethod']->oxpayments__oxdesc->value; ?>
</b></label>
    </dt>
    <dd class="<?php if ($this->_tpl_vars['oView']->getCheckedPaymentId() == $this->_tpl_vars['paymentmethod']->oxpayments__oxid->value): ?>activePayment<?php endif; ?>">
        <?php if ($this->_tpl_vars['paymentmethod']->getPrice()): ?>
            <?php $this->assign('oPaymentPrice', $this->_tpl_vars['paymentmethod']->getPrice()); ?>
            <?php if ($this->_tpl_vars['oViewConf']->isFunctionalityEnabled('blShowVATForPayCharge')): ?>
                <?php echo '('; ?><?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['oPaymentPrice']->getNettoPrice(),'currency' => $this->_tpl_vars['currency']), $this);?><?php echo ''; ?><?php if ($this->_tpl_vars['oPaymentPrice']->getVatValue() > 0): ?><?php echo ''; ?><?php echo smarty_function_oxmultilang(array('ident' => 'PLUS_VAT'), $this);?><?php echo ' '; ?><?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['oPaymentPrice']->getVatValue(),'currency' => $this->_tpl_vars['currency']), $this);?><?php echo ''; ?><?php endif; ?><?php echo ')'; ?>

            <?php else: ?>
                (<?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['oPaymentPrice']->getBruttoPrice(),'currency' => $this->_tpl_vars['currency']), $this);?>
)
            <?php endif; ?>
        <?php endif; ?>

        <?php $_from = $this->_tpl_vars['paymentmethod']->getDynValues(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['PaymentDynValues'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['PaymentDynValues']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['value']):
        $this->_foreach['PaymentDynValues']['iteration']++;
?>
            <div class="form-group">
                <label class="control-label col-lg-3" for="<?php echo $this->_tpl_vars['sPaymentID']; ?>
_<?php echo $this->_foreach['PaymentDynValues']['iteration']; ?>
"><?php echo $this->_tpl_vars['value']->name; ?>
</label>
                <div class="col-lg-9">
                    <input id="<?php echo $this->_tpl_vars['sPaymentID']; ?>
_<?php echo $this->_foreach['PaymentDynValues']['iteration']; ?>
" type="text" class="form-control textbox" size="20" maxlength="64" name="dynvalue[<?php echo $this->_tpl_vars['value']->name; ?>
]" value="<?php echo $this->_tpl_vars['value']->value; ?>
">
                </div>
            </div>
        <?php endforeach; endif; unset($_from); ?>

        <div class="clearfix"></div>

        
            <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['paymentmethod']->oxpayments__oxlongdesc->value)) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp))): ?>
                <div class="alert alert-info col-lg-offset-3 desc">
                    <?php echo $this->_tpl_vars['paymentmethod']->oxpayments__oxlongdesc->getRawValue(); ?>

                </div>
            <?php endif; ?>
        
    </dd>
</dl>