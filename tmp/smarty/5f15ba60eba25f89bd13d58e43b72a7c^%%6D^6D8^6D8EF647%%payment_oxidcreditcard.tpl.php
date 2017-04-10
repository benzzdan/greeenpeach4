<?php /* Smarty version 2.6.28, created on 2017-04-10 04:34:15
         compiled from page/checkout/inc/payment_oxidcreditcard.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'page/checkout/inc/payment_oxidcreditcard.tpl', 10, false),)), $this); ?>
<?php $this->assign('dynvalue', $this->_tpl_vars['oView']->getDynValue()); ?>
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

        <div class="form-group">
            <label class="req control-label col-lg-3"><?php echo smarty_function_oxmultilang(array('ident' => 'CREDITCARD'), $this);?>
</label>
            <div class="col-lg-9">
                <select name="dynvalue[kktype]" class="form-control selectpicker" required="required">
                    <option value="mcd" <?php if (( $this->_tpl_vars['dynvalue']['kktype'] == 'mcd' || ! $this->_tpl_vars['dynvalue']['kktype'] )): ?>selected<?php endif; ?>><?php echo smarty_function_oxmultilang(array('ident' => 'CARD_MASTERCARD'), $this);?>
</option>
                    <option value="vis" <?php if ($this->_tpl_vars['dynvalue']['kktype'] == 'vis'): ?>selected<?php endif; ?>><?php echo smarty_function_oxmultilang(array('ident' => 'CARD_VISA'), $this);?>
</option>
                    <!--
                    <option value="amx" <?php if ($this->_tpl_vars['dynvalue']['kktype'] == 'amx'): ?>selected<?php endif; ?>>American Express</option>
                    <option value="dsc" <?php if ($this->_tpl_vars['dynvalue']['kktype'] == 'dsc'): ?>selected<?php endif; ?>>Discover</option>
                    <option value="dnc" <?php if ($this->_tpl_vars['dynvalue']['kktype'] == 'dnc'): ?>selected<?php endif; ?>>Diners Club</option>
                    <option value="jcb" <?php if ($this->_tpl_vars['dynvalue']['kktype'] == 'jcb'): ?>selected<?php endif; ?>>JCB</option>
                    <option value="swi" <?php if ($this->_tpl_vars['dynvalue']['kktype'] == 'swi'): ?>selected<?php endif; ?>>Switch</option>
                    <option value="dlt" <?php if ($this->_tpl_vars['dynvalue']['kktype'] == 'dlt'): ?>selected<?php endif; ?>>Delta</option>
                    <option value="enr" <?php if ($this->_tpl_vars['dynvalue']['kktype'] == 'enr'): ?>selected<?php endif; ?>>EnRoute</option>
                    -->
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="req control-label col-lg-3"><?php echo smarty_function_oxmultilang(array('ident' => 'NUMBER'), $this);?>
</label>
            <div class="col-lg-9">
                <input type="text" class="form-control js-oxValidate js-oxValidate_notEmpty" size="20" maxlength="64" name="dynvalue[kknumber]" value="<?php echo $this->_tpl_vars['dynvalue']['kknumber']; ?>
" required="required">
            </div>
        </div>

        <div class="form-group">
            <label class="req control-label col-lg-3"><?php echo smarty_function_oxmultilang(array('ident' => 'BANK_ACCOUNT_HOLDER'), $this);?>
</label>
            <div class="col-lg-9">
                <input type="text" size="20" class="form-control js-oxValidate js-oxValidate_notEmpty" maxlength="64" name="dynvalue[kkname]" value="<?php if ($this->_tpl_vars['dynvalue']['kkname']): ?><?php echo $this->_tpl_vars['dynvalue']['kkname']; ?>
<?php else: ?><?php echo $this->_tpl_vars['oxcmp_user']->oxuser__oxfname->value; ?>
 <?php echo $this->_tpl_vars['oxcmp_user']->oxuser__oxlname->value; ?>
<?php endif; ?>" required="required">
                <span class="help-block"><?php echo smarty_function_oxmultilang(array('ident' => 'IF_DIFFERENT_FROM_BILLING_ADDRESS'), $this);?>
</span>
            </div>
        </div>

        <div class="form-group">
            <label class="req control-label col-xs-12 col-lg-3"><?php echo smarty_function_oxmultilang(array('ident' => 'VALID_UNTIL'), $this);?>
</label>
            <div class="col-xs-6 col-lg-2">
                <select name="dynvalue[kkmonth]" class="form-control selectpicker" required="required">
                    <option <?php if ($this->_tpl_vars['dynvalue']['kkmonth'] == '01'): ?>selected<?php endif; ?>>01</option>
                    <option <?php if ($this->_tpl_vars['dynvalue']['kkmonth'] == '02'): ?>selected<?php endif; ?>>02</option>
                    <option <?php if ($this->_tpl_vars['dynvalue']['kkmonth'] == '03'): ?>selected<?php endif; ?>>03</option>
                    <option <?php if ($this->_tpl_vars['dynvalue']['kkmonth'] == '04'): ?>selected<?php endif; ?>>04</option>
                    <option <?php if ($this->_tpl_vars['dynvalue']['kkmonth'] == '05'): ?>selected<?php endif; ?>>05</option>
                    <option <?php if ($this->_tpl_vars['dynvalue']['kkmonth'] == '06'): ?>selected<?php endif; ?>>06</option>
                    <option <?php if ($this->_tpl_vars['dynvalue']['kkmonth'] == '07'): ?>selected<?php endif; ?>>07</option>
                    <option <?php if ($this->_tpl_vars['dynvalue']['kkmonth'] == '08'): ?>selected<?php endif; ?>>08</option>
                    <option <?php if ($this->_tpl_vars['dynvalue']['kkmonth'] == '09'): ?>selected<?php endif; ?>>09</option>
                    <option <?php if ($this->_tpl_vars['dynvalue']['kkmonth'] == '10'): ?>selected<?php endif; ?>>10</option>
                    <option <?php if ($this->_tpl_vars['dynvalue']['kkmonth'] == '11'): ?>selected<?php endif; ?>>11</option>
                    <option <?php if ($this->_tpl_vars['dynvalue']['kkmonth'] == '12'): ?>selected<?php endif; ?>>12</option>
                </select>
            </div>
            <div class="col-xs-6 col-lg-2">
                <select name="dynvalue[kkyear]" class="form-control selectpicker">
                    <?php $_from = $this->_tpl_vars['oView']->getCreditYears(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['year']):
?>
                        <option <?php if ($this->_tpl_vars['dynvalue']['kkyear'] == $this->_tpl_vars['year']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['year']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
            </div>
            <div class="col-sm-3"></div>
        </div>

        <div class="form-group">
            <label class="req control-label col-lg-3"><?php echo smarty_function_oxmultilang(array('ident' => 'CARD_SECURITY_CODE'), $this);?>
</label>
            <div class="col-lg-9">
                <input type="text" class="form-control js-oxValidate js-oxValidate_notEmpty" size="20" maxlength="64" name="dynvalue[kkpruef]" value="<?php echo $this->_tpl_vars['dynvalue']['kkpruef']; ?>
" required="required">
                <span class="help-block"><?php echo smarty_function_oxmultilang(array('ident' => 'CARD_SECURITY_CODE_DESCRIPTION'), $this);?>
</span>
            </div>
        </div>

        <div class="clearfix"></div>

        
            <?php if ($this->_tpl_vars['paymentmethod']->oxpayments__oxlongdesc->value): ?>
                <div class="alert alert-info col-lg-offset-3 desc">
                    <?php echo $this->_tpl_vars['paymentmethod']->oxpayments__oxlongdesc->getRawValue(); ?>

                </div>
            <?php endif; ?>
        
    </dd>
</dl>