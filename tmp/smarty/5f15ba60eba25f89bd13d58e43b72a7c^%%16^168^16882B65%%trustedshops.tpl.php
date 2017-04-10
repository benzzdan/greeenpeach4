<?php /* Smarty version 2.6.28, created on 2017-04-10 04:34:15
         compiled from page/checkout/inc/trustedshops.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'page/checkout/inc/trustedshops.tpl', 4, false),array('block', 'oxifcontent', 'page/checkout/inc/trustedshops.tpl', 34, false),)), $this); ?>

    <?php if ($this->_tpl_vars['oView']->getTSExcellenceId()): ?>
        <div id="tsBox">
            <h3 class="blockHead" id="tsProtectionHeader"><?php echo smarty_function_oxmultilang(array('ident' => 'TRUSTED_SHOP_BUYER_PROTECTION'), $this);?>
</h3>
            <div class="etrustlogocol">
                <a href="https://www.trustedshops.com/shop/certificate.php?shop_id=<?php echo $this->_tpl_vars['oView']->getTSExcellenceId(); ?>
" target="_blank">
                    <img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('trustedshops_m.gif'); ?>
" title="<?php echo smarty_function_oxmultilang(array('ident' => 'TRUSTED_SHOPS_IMGTITLE'), $this);?>
">
                </a>
            </div>
            <div>
                <input type="checkbox" name="bltsprotection" value="1" <?php if ($this->_tpl_vars['oView']->getCheckedTsProductId()): ?>checked<?php endif; ?>>
                <?php $this->assign('aTsProtections', $this->_tpl_vars['oView']->getTsProtections()); ?>
                <?php if (count ( $this->_tpl_vars['aTsProtections'] ) > 1): ?>
                    <select name="stsprotection">
                        <?php $_from = $this->_tpl_vars['aTsProtections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['oTsProduct']):
?>
                            <?php if ($this->_tpl_vars['oView']->isPaymentVatSplitted()): ?>
                                <option value="<?php echo $this->_tpl_vars['oTsProduct']->getTsId(); ?>
" <?php if ($this->_tpl_vars['oView']->getCheckedTsProductId() == $this->_tpl_vars['oTsProduct']->getTsId()): ?>SELECTED<?php endif; ?>><?php echo smarty_function_oxmultilang(array('ident' => 'TRUSTED_SHOP_PROTECTION_FROM'), $this);?>
 <?php echo $this->_tpl_vars['oTsProduct']->getAmount(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
 (<?php echo $this->_tpl_vars['oTsProduct']->getFNettoPrice(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
 <?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_CHECKOUT_BASKETCONTENTS_PLUSTAX1'), $this);?>
 <?php echo $this->_tpl_vars['oTsProduct']->getFVatValue(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
 ) </option>
                            <?php else: ?>
                                <option value="<?php echo $this->_tpl_vars['oTsProduct']->getTsId(); ?>
" <?php if ($this->_tpl_vars['oView']->getCheckedTsProductId() == $this->_tpl_vars['oTsProduct']->getTsId()): ?>SELECTED<?php endif; ?>><?php echo smarty_function_oxmultilang(array('ident' => 'TRUSTED_SHOP_PROTECTION_FROM'), $this);?>
 <?php echo $this->_tpl_vars['oTsProduct']->getAmount(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
 (<?php echo $this->_tpl_vars['oTsProduct']->getFPrice(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
 <?php echo smarty_function_oxmultilang(array('ident' => 'INCLUDE_VAT'), $this);?>
) </option>
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                    <?php else: ?>
                    <?php $this->assign('oTsProduct', $this->_tpl_vars['aTsProtections'][0]); ?>
                    <?php if ($this->_tpl_vars['oView']->isPaymentVatSplitted()): ?>
                        <input type="hidden" name="stsprotection" value="<?php echo $this->_tpl_vars['oTsProduct']->getTsId(); ?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'TRUSTED_SHOP_PROTECTION_FROM'), $this);?>
 <?php echo $this->_tpl_vars['oTsProduct']->getAmount(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
 (<?php echo $this->_tpl_vars['oTsProduct']->getFNettoPrice(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
 <?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_CHECKOUT_BASKETCONTENTS_PLUSTAX1'), $this);?>
 <?php echo $this->_tpl_vars['oTsProduct']->getFVatValue(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
)
                    <?php else: ?>
                        <input type="hidden" name="stsprotection" value="<?php echo $this->_tpl_vars['oTsProduct']->getTsId(); ?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'TRUSTED_SHOP_PROTECTION_FROM'), $this);?>
 <?php echo $this->_tpl_vars['oTsProduct']->getAmount(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
 (<?php echo $this->_tpl_vars['oTsProduct']->getFPrice(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
 <?php echo smarty_function_oxmultilang(array('ident' => 'INCLUDE_VAT'), $this);?>
)
                    <?php endif; ?>
                <?php endif; ?>
                <br>
                <br>
                <div class="cmsContent">
                    <?php $this->_tag_stack[] = array('oxifcontent', array('ident' => 'oxtsprotectiontext','object' => 'oCont')); $_block_repeat=true;smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                        <?php echo $this->_tpl_vars['oCont']->oxcontents__oxcontent->value; ?>

                    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    <?php endif; ?>