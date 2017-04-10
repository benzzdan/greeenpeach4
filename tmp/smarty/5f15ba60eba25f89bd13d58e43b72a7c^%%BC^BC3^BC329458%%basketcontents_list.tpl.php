<?php /* Smarty version 2.6.28, created on 2017-04-10 04:33:19
         compiled from page/checkout/inc/basketcontents_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'page/checkout/inc/basketcontents_list.tpl', 17, false),array('modifier', 'cat', 'page/checkout/inc/basketcontents_list.tpl', 37, false),array('modifier', 'trim', 'page/checkout/inc/basketcontents_list.tpl', 39, false),array('modifier', 'nl2br', 'page/checkout/inc/basketcontents_list.tpl', 253, false),array('function', 'oxmultilang', 'page/checkout/inc/basketcontents_list.tpl', 29, false),)), $this); ?>
<ul id="basket_list" class="list-unstyled<?php if ($this->_tpl_vars['oViewConf']->getActiveClassName() == 'order'): ?> orderBasketItems<?php endif; ?>">
        <?php $this->assign('basketitemlist', $this->_tpl_vars['oView']->getBasketArticles()); ?>
    <?php $_from = $this->_tpl_vars['oxcmp_basket']->getContents(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['basketContents'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['basketContents']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['basketindex'] => $this->_tpl_vars['basketitem']):
        $this->_foreach['basketContents']['iteration']++;
?>
        
            <?php $this->assign('basketproduct', $this->_tpl_vars['basketitemlist'][$this->_tpl_vars['basketindex']]); ?>
            <?php $this->assign('oArticle', $this->_tpl_vars['basketitem']->getArticle()); ?>
            <?php $this->assign('oAttributes', $this->_tpl_vars['oArticle']->getAttributesDisplayableInBasket()); ?>

            <li id="list_cartItem_<?php echo $this->_foreach['basketContents']['iteration']; ?>
">

                <div class="row">
                    <div class="col-md-3 col-xs-4">
                        
                                                        <?php if ($this->_tpl_vars['editable']): ?><a href="<?php echo $this->_tpl_vars['basketitem']->getLink(); ?>
"><?php endif; ?>
                            <img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('spinner.gif'); ?>
" data-src="<?php echo $this->_tpl_vars['basketitem']->getIconUrl(); ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['basketitem']->getTitle())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
                            <?php if ($this->_tpl_vars['editable']): ?></a><?php endif; ?>
                        
                    </div>
                    <div class="col-md-6 col-xs-8">
                        
                            <?php if ($this->_tpl_vars['editable']): ?><a rel="nofllow" href="<?php echo $this->_tpl_vars['basketitem']->getLink(); ?>
"><?php endif; ?>
                            <b><?php echo $this->_tpl_vars['basketitem']->getTitle(); ?>
</b>
                            <?php if ($this->_tpl_vars['editable']): ?></a><?php endif; ?>
                            <?php if ($this->_tpl_vars['basketitem']->isSkipDiscount()): ?> <sup><a href="#SkipDiscounts_link" >**</a></sup><?php endif; ?>

                            <div class="smallFont">
                                <?php echo smarty_function_oxmultilang(array('ident' => 'PRODUCT_NO'), $this);?>
 <?php echo $this->_tpl_vars['basketproduct']->oxarticles__oxartnum->value; ?>

                            </div>

                            <div class="smallFont">
                                <?php $this->assign('sep', ", "); ?>
                                <?php $this->assign('result', ""); ?>
                                <?php $_from = $this->_tpl_vars['oAttributes']->getArray(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['attributeContents'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['attributeContents']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['oArtAttributes'] => $this->_tpl_vars['oAttr']):
        $this->_foreach['attributeContents']['iteration']++;
?>
                                    <?php $this->assign('temp', $this->_tpl_vars['oAttr']->oxattribute__oxvalue->value); ?>
                                    <?php $this->assign('result', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['result'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['temp']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['temp'])))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['sep']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['sep']))); ?>
                                <?php endforeach; endif; unset($_from); ?>
                                <small><?php echo ((is_array($_tmp=$this->_tpl_vars['result'])) ? $this->_run_mod_handler('trim', true, $_tmp, $this->_tpl_vars['sep']) : trim($_tmp, $this->_tpl_vars['sep'])); ?>
</small>
                            </div>

                            <?php if (! $this->_tpl_vars['basketitem']->isBundle() || ! $this->_tpl_vars['basketitem']->isDiscountArticle()): ?>
                                <?php $this->assign('oSelections', $this->_tpl_vars['basketproduct']->getSelections(null,$this->_tpl_vars['basketitem']->getSelList())); ?>
                                <?php if ($this->_tpl_vars['oSelections']): ?>
                                    <div class="selectorsBox clear" id="cartItemSelections_<?php echo $this->_foreach['basketContents']['iteration']; ?>
">
                                        <?php $_from = $this->_tpl_vars['oSelections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['selections'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['selections']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['oList']):
        $this->_foreach['selections']['iteration']++;
?>
                                            <?php if ($this->_tpl_vars['oViewConf']->showSelectListsInList()): ?>
                                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/product/selectbox.tpl", 'smarty_include_vars' => array('oSelectionList' => $this->_tpl_vars['oList'],'sFieldName' => "aproducts[".($this->_tpl_vars['basketindex'])."][sel]",'iKey' => ($this->_foreach['selections']['iteration']-1),'blHideDefault' => true,'sSelType' => 'seldrop')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                            <?php else: ?>
                                                <?php $this->assign('oActiveSelection', $this->_tpl_vars['oList']->getActiveSelection()); ?>
                                                <?php if ($this->_tpl_vars['oActiveSelection']): ?>
                                                    <input type="hidden" name="aproducts[<?php echo $this->_tpl_vars['basketindex']; ?>
][sel][<?php echo ($this->_foreach['selections']['iteration']-1); ?>
]" value="<?php if ($this->_tpl_vars['oActiveSelection']): ?><?php echo $this->_tpl_vars['oActiveSelection']->getValue(); ?>
<?php endif; ?>">
                                                    <div><?php echo $this->_tpl_vars['oList']->getLabel(); ?>
: <?php echo $this->_tpl_vars['oActiveSelection']->getName(); ?>
</div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if (! $this->_tpl_vars['editable']): ?>
                                <p class="persparamBox">
                                    <small>
                                        <?php $_from = $this->_tpl_vars['basketitem']->getPersParams(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['persparams'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['persparams']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sVar'] => $this->_tpl_vars['aParam']):
        $this->_foreach['persparams']['iteration']++;
?>
                                            <?php if (! ($this->_foreach['persparams']['iteration'] <= 1)): ?><br /><?php endif; ?>
                                            <?php if (($this->_foreach['persparams']['iteration'] <= 1) && ($this->_foreach['persparams']['iteration'] == $this->_foreach['persparams']['total'])): ?>
                                                <?php echo smarty_function_oxmultilang(array('ident' => 'LABEL'), $this);?>

                                            <?php else: ?>
                                                <?php echo $this->_tpl_vars['sVar']; ?>
 :
                                            <?php endif; ?>
                                            <?php echo $this->_tpl_vars['aParam']; ?>

                                        <?php endforeach; endif; unset($_from); ?>
                                    </small>
                                </p>
                            <?php else: ?>
                                <?php if ($this->_tpl_vars['basketproduct']->oxarticles__oxisconfigurable->value): ?>
                                    <?php if ($this->_tpl_vars['basketitem']->getPersParams()): ?>
                                        <br />
                                        <?php $_from = $this->_tpl_vars['basketitem']->getPersParams(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['persparams'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['persparams']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sVar'] => $this->_tpl_vars['aParam']):
        $this->_foreach['persparams']['iteration']++;
?>
                                            <p>
                                                <input class="textbox persParam form-control" type="text" name="aproducts[<?php echo $this->_tpl_vars['basketindex']; ?>
][persparam][<?php echo $this->_tpl_vars['sVar']; ?>
]" value="<?php echo $this->_tpl_vars['aParam']; ?>
" placeholder="<?php if (($this->_foreach['persparams']['iteration'] <= 1) && ($this->_foreach['persparams']['iteration'] == $this->_foreach['persparams']['total'])): ?><?php echo smarty_function_oxmultilang(array('ident' => 'LABEL'), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['sVar']; ?>
<?php endif; ?>">
                                            </p>
                                        <?php endforeach; endif; unset($_from); ?>
                                    <?php else: ?>
                                        <p>
                                            <input class="textbox persParam form-control" type="text" name="aproducts[<?php echo $this->_tpl_vars['basketindex']; ?>
][persparam][details]" value="" placeholder="<?php echo smarty_function_oxmultilang(array('ident' => 'LABEL'), $this);?>
">
                                        </p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        

                        
                                                        <?php if ($this->_tpl_vars['oView']->isWrapping()): ?>
                                <div class="wrapping">
                                    <?php if (! $this->_tpl_vars['basketitem']->getWrappingId()): ?>
                                        <?php if ($this->_tpl_vars['editable']): ?>
                                            <a href="#" class="btn btn-default btn-xs" title="<?php echo smarty_function_oxmultilang(array('ident' => 'ADD'), $this);?>
" data-toggle="modal" data-target="#giftoptions"><?php echo smarty_function_oxmultilang(array('ident' => 'WRAPPING'), $this);?>
 <?php echo smarty_function_oxmultilang(array('ident' => 'ADD'), $this);?>
</a>
                                        <?php else: ?>
                                            <small><?php echo smarty_function_oxmultilang(array('ident' => 'WRAPPING'), $this);?>
: <?php echo smarty_function_oxmultilang(array('ident' => 'NONE'), $this);?>
</small>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php $this->assign('oWrap', $this->_tpl_vars['basketitem']->getWrapping()); ?>
                                        <?php if ($this->_tpl_vars['editable']): ?>
                                            <small><?php echo smarty_function_oxmultilang(array('ident' => 'WRAPPING'), $this);?>
:</small> <a class="btn btn-default btn-xs" href="#" title="<?php echo smarty_function_oxmultilang(array('ident' => 'ADD'), $this);?>
" data-toggle="modal" data-target="#giftoptions"><i class="fa fa-pencil"></i> <?php echo $this->_tpl_vars['oWrap']->oxwrapping__oxname->value; ?>
</a>
                                        <?php else: ?>
                                            <small><?php echo smarty_function_oxmultilang(array('ident' => 'WRAPPING'), $this);?>
: <?php echo $this->_tpl_vars['oWrap']->oxwrapping__oxname->value; ?>
</small>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        

                        
                                                        <span class="unitPrice">
                                <?php if ($this->_tpl_vars['basketitem']->getFUnitPrice()): ?>
                                    <small><?php echo smarty_function_oxmultilang(array('ident' => 'UNIT_PRICE'), $this);?>
: <?php echo $this->_tpl_vars['basketitem']->getFUnitPrice(); ?>
&nbsp;<?php echo $this->_tpl_vars['currency']->sign; ?>
</small>
                                <?php endif; ?>
                            </span>
                        

                        
                                                        <span class="amount">
                                <small>
                                    <?php if ($this->_tpl_vars['basketitem']->getFUnitPrice()): ?> | <?php endif; ?>
                                    <?php if ($this->_tpl_vars['basketitem']->oxarticles__oxunitname->value): ?>
                                        <?php echo $this->_tpl_vars['basketitem']->getAmount(); ?>
 <?php echo $this->_tpl_vars['basketitem']->oxarticles__oxunitname->value; ?>

                                    <?php else: ?>
                                        <?php echo $this->_tpl_vars['basketitem']->getAmount(); ?>
 <?php echo smarty_function_oxmultilang(array('ident' => 'PCS'), $this);?>

                                    <?php endif; ?>
                                </small>
                            </span>
                        
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <?php if ($this->_tpl_vars['editable']): ?>
                            <div class="text-right">
                                <a href="#" class="toggle-actions">
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                            </div>
                        <?php endif; ?>

                        
                                                        <div class="totalPrice text-right">
                                <strong><?php echo $this->_tpl_vars['basketitem']->getFTotalPrice(); ?>
&nbsp;<?php echo $this->_tpl_vars['currency']->sign; ?>
</strong>
                            </div>
                        
                    </div>
                </div>

                <div class="row toggable" style="display:none;">
                    <div class="col-xs-3">
                        
                            <?php if ($this->_tpl_vars['editable']): ?>
                                <input type="hidden" name="aproducts[<?php echo $this->_tpl_vars['basketindex']; ?>
][remove]" id="aproducts_<?php echo $this->_tpl_vars['basketindex']; ?>
_remove" value="0">
                                <button type="submit" name="removeBtn" class="btn btn-sm btn-danger" onclick="document.getElementById( 'aproducts_<?php echo $this->_tpl_vars['basketindex']; ?>
_remove' ).value = '1';">&times; <?php echo smarty_function_oxmultilang(array('ident' => 'REMOVE'), $this);?>
</button>
                            <?php endif; ?>
                        
                    </div>
                    <div class="col-xs-9 text-right">
                        
                                                        <div class="quantity pull-right">
                                <?php if ($this->_tpl_vars['editable']): ?>
                                    <input type="hidden" name="aproducts[<?php echo $this->_tpl_vars['basketindex']; ?>
][aid]" value="<?php echo $this->_tpl_vars['basketitem']->getProductId(); ?>
">
                                    <input type="hidden" name="aproducts[<?php echo $this->_tpl_vars['basketindex']; ?>
][basketitemid]" value="<?php echo $this->_tpl_vars['basketindex']; ?>
">
                                    <input type="hidden" name="aproducts[<?php echo $this->_tpl_vars['basketindex']; ?>
][override]" value="1">
                                    <?php if ($this->_tpl_vars['basketitem']->isBundle()): ?>
                                        <input type="hidden" name="aproducts[<?php echo $this->_tpl_vars['basketindex']; ?>
][bundle]" value="1">
                                    <?php endif; ?>

                                    <?php if (! $this->_tpl_vars['basketitem']->isBundle() || ! $this->_tpl_vars['basketitem']->isDiscountArticle()): ?>
                                        <div class="input-group input-group-sm">
                                            <input id="am_<?php echo $this->_foreach['basketContents']['iteration']; ?>
" type="number" class="textbox form-control text-center" name="aproducts[<?php echo $this->_tpl_vars['basketindex']; ?>
][am]" value="<?php echo $this->_tpl_vars['basketitem']->getAmount(); ?>
" size="3" min="0" style="width:60px;float:right;"<?php if ($this->_tpl_vars['oConfig']->getConfigParam('blAllowUnevenAmounts')): ?> step="any"<?php endif; ?>>
                                            <span class="input-group-addon">
                                                <?php if ($this->_tpl_vars['basketitem']->oxarticles__oxunitname->value): ?>
                                                    <?php echo $this->_tpl_vars['basketitem']->oxarticles__oxunitname->value; ?>

                                                <?php else: ?>
                                                    <?php echo smarty_function_oxmultilang(array('ident' => 'PCS'), $this);?>

                                                <?php endif; ?>
                                            </span>
                                            <span class="input-group-btn">
                                                <button class="btn btn-sm btn-warning pull-right" id="basketUpdate" type="submit" name="updateBtn" title="<?php echo smarty_function_oxmultilang(array('ident' => 'UPDATE'), $this);?>
">
                                                    <i class="fa fa-refresh"></i>
                                                </button>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php echo $this->_tpl_vars['basketitem']->getAmount(); ?>

                                <?php endif; ?>
                                <?php if ($this->_tpl_vars['basketitem']->getdBundledAmount() > 0 && ( $this->_tpl_vars['basketitem']->isBundle() || $this->_tpl_vars['basketitem']->isDiscountArticle() )): ?>
                                    +<?php echo $this->_tpl_vars['basketitem']->getdBundledAmount(); ?>

                                <?php endif; ?>
                            </div>
                        
                    </div>
                </div>

                <hr/>
            </li>
        

        
        
            <?php $_from = $this->_tpl_vars['Errors']['basket']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['oEr']):
?>
                <?php if ($this->_tpl_vars['oEr']->getErrorClassType() == 'oxOutOfStockException'): ?>
                                        <?php if ($this->_tpl_vars['basketindex'] == $this->_tpl_vars['oEr']->getValue('basketIndex')): ?>
                        <tr class="basketError">
                            <?php if ($this->_tpl_vars['editable']): ?><td></td><?php endif; ?>
                                <td colspan="5">
                                    <span class="inlineError"><?php echo $this->_tpl_vars['oEr']->getOxMessage(); ?>
 <strong><?php echo $this->_tpl_vars['oEr']->getValue('remainingAmount'); ?>
</strong></span>
                                </td>
                            <?php if ($this->_tpl_vars['oView']->isWrapping()): ?><td></td><?php endif; ?>
                            <td></td>
                        </tr>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['oEr']->getErrorClassType() == 'oxArticleInputException'): ?>
                    <?php if ($this->_tpl_vars['basketitem']->getProductId() == $this->_tpl_vars['oEr']->getValue('productId')): ?>
                        <tr class="basketError">
                            <?php if ($this->_tpl_vars['editable']): ?><td></td><?php endif; ?>
                            <td colspan="5">
                                <span class="inlineError"><?php echo $this->_tpl_vars['oEr']->getOxMessage(); ?>
</span>
                            </td>
                            <?php if ($this->_tpl_vars['oView']->isWrapping()): ?><td></td><?php endif; ?>
                            <td></td>
                        </tr>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        
            <?php endforeach; endif; unset($_from); ?>

    
        <?php if ($this->_tpl_vars['oViewConf']->getShowGiftWrapping()): ?>
            <?php $this->assign('oCard', $this->_tpl_vars['oxcmp_basket']->getCard()); ?>
            <?php if ($this->_tpl_vars['oCard']): ?>
                <tr>
                    <?php if ($this->_tpl_vars['editable']): ?><td></td><?php endif; ?>
                    <td id="orderCardTitle" colspan="3"><?php echo smarty_function_oxmultilang(array('ident' => 'GREETING_CARD'), $this);?>
 "<?php echo $this->_tpl_vars['oCard']->oxwrapping__oxname->value; ?>
"
                        <br>
                        <b><?php echo smarty_function_oxmultilang(array('ident' => 'YOUR_MESSAGE'), $this);?>
</b>
                        <br>
                        <div id="orderCardText"><?php echo ((is_array($_tmp=$this->_tpl_vars['oxcmp_basket']->getCardMessage())) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>
                    </td>
                    <td id="orderCardPrice"><?php echo $this->_tpl_vars['oCard']->getFPrice(); ?>
&nbsp;<?php echo $this->_tpl_vars['currency']->sign; ?>
</td>
                    <td>
                        <?php if ($this->_tpl_vars['oxcmp_basket']->isProportionalCalculationOn()): ?>
                            <?php echo smarty_function_oxmultilang(array('ident' => 'PROPORTIONALLY_CALCULATED'), $this);?>

                        <?php else: ?>
                            <?php if ($this->_tpl_vars['oxcmp_basket']->getGiftCardCostVat()): ?><?php echo $this->_tpl_vars['oxcmp_basket']->getGiftCardCostVatPercent(); ?>
%<?php endif; ?>
                        <?php endif; ?>
                    </td>
                    <td id="orderCardTotalPrice" align="right"><?php echo $this->_tpl_vars['oCard']->getFPrice(); ?>
&nbsp;<?php echo $this->_tpl_vars['currency']->sign; ?>
</td>
                </tr>
            <?php endif; ?>
        <?php endif; ?>
    

    
</ul>