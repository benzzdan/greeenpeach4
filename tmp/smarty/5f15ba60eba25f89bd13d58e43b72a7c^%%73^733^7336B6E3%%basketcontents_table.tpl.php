<?php /* Smarty version 2.6.28, created on 2017-04-10 04:33:19
         compiled from page/checkout/inc/basketcontents_table.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'page/checkout/inc/basketcontents_table.tpl', 15, false),array('modifier', 'strip_tags', 'page/checkout/inc/basketcontents_table.tpl', 52, false),array('modifier', 'trim', 'page/checkout/inc/basketcontents_table.tpl', 72, false),array('modifier', 'nl2br', 'page/checkout/inc/basketcontents_table.tpl', 254, false),)), $this); ?>
<table id="basket_table" class="table table-bordered table-striped basketitems<?php if ($this->_tpl_vars['oViewConf']->getActiveClassName() == 'order'): ?> orderBasketItems<?php endif; ?>">
    <colgroup>
        <?php if ($this->_tpl_vars['editable']): ?><col class="editCol"><?php endif; ?>
        <col class="thumbCol">
        <?php if ($this->_tpl_vars['oView']->isWrapping()): ?><col class="wrappingCol"><?php endif; ?>
        <col class="coutCol">
        <col class="priceCol">
        <col class="vatCol">
        <col class="totalCol">
    </colgroup>
        <thead>
        <tr>
            <?php if ($this->_tpl_vars['editable']): ?><th></th><?php endif; ?>
            <th><?php echo smarty_function_oxmultilang(array('ident' => 'PRODUCT'), $this);?>
</th>
            <?php if ($this->_tpl_vars['oView']->isWrapping()): ?>
                <th><?php echo smarty_function_oxmultilang(array('ident' => 'WRAPPING'), $this);?>
</th>
            <?php endif; ?>
            <th><?php echo smarty_function_oxmultilang(array('ident' => 'QUANTITY'), $this);?>
</th>
            <th class="unitPrice"><?php echo smarty_function_oxmultilang(array('ident' => 'UNIT_PRICE'), $this);?>
</th>
            <th class="vatPercent"><?php echo smarty_function_oxmultilang(array('ident' => 'VAT'), $this);?>
</th>
            <th><?php echo smarty_function_oxmultilang(array('ident' => 'TOTAL'), $this);?>
</th>
        </tr>
    </thead>

        <tbody>
        <?php $this->assign('basketitemlist', $this->_tpl_vars['oView']->getBasketArticles()); ?>
        <?php $_from = $this->_tpl_vars['oxcmp_basket']->getContents(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['basketContents'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['basketContents']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['basketindex'] => $this->_tpl_vars['basketitem']):
        $this->_foreach['basketContents']['iteration']++;
?>
            
                <?php $this->assign('basketproduct', $this->_tpl_vars['basketitemlist'][$this->_tpl_vars['basketindex']]); ?>
                <?php $this->assign('oArticle', $this->_tpl_vars['basketitem']->getArticle()); ?>
                <?php $this->assign('oAttributes', $this->_tpl_vars['oArticle']->getAttributesDisplayableInBasket()); ?>

                <tr id="table_cartItem_<?php echo $this->_foreach['basketContents']['iteration']; ?>
">

                    
                        <?php if ($this->_tpl_vars['editable']): ?>
                            <td class="checkactive checkbox text-center" style="display:table-cell;margin:0;padding:0;vertical-align:middle;">
                                <input type="checkbox" name="aproducts[<?php echo $this->_tpl_vars['basketindex']; ?>
][remove]" value="1" style="margin:0;float:none;">
                            </td>
                        <?php endif; ?>
                    

                    
                                                <td>
                            
                                                                <div class="pull-left basketImage">
                                    <?php if ($this->_tpl_vars['editable']): ?><a href="<?php echo $this->_tpl_vars['basketitem']->getLink(); ?>
"><?php endif; ?>
                                        <img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('spinner.gif'); ?>
" data-src="<?php echo $this->_tpl_vars['basketitem']->getIconUrl(); ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['basketitem']->getTitle())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
                                        <?php if ($this->_tpl_vars['editable']): ?></a><?php endif; ?>
                                </div>
                            
                            <div class="basketItemDesc">
                                
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
                                            <?php $this->assign('result', ($this->_tpl_vars['result']).($this->_tpl_vars['temp']).($this->_tpl_vars['sep'])); ?>
                                        <?php endforeach; endif; unset($_from); ?>
                                        <?php echo ((is_array($_tmp=$this->_tpl_vars['result'])) ? $this->_run_mod_handler('trim', true, $_tmp, $this->_tpl_vars['sep']) : trim($_tmp, $this->_tpl_vars['sep'])); ?>

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
                                            <?php $_from = $this->_tpl_vars['basketitem']->getPersParams(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['persparams'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['persparams']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sVar'] => $this->_tpl_vars['aParam']):
        $this->_foreach['persparams']['iteration']++;
?>
                                                <?php if (! ($this->_foreach['persparams']['iteration'] <= 1)): ?><br /><?php endif; ?>
                                                <strong>
                                                    <?php if (($this->_foreach['persparams']['iteration'] <= 1) && ($this->_foreach['persparams']['iteration'] == $this->_foreach['persparams']['total'])): ?>
                                                        <?php echo smarty_function_oxmultilang(array('ident' => 'LABEL'), $this);?>

                                                    <?php else: ?>
                                                        <?php echo $this->_tpl_vars['sVar']; ?>
 :
                                                    <?php endif; ?>
                                                </strong> <?php echo $this->_tpl_vars['aParam']; ?>

                                            <?php endforeach; endif; unset($_from); ?>
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
                                                        <label class="persParamLabel">
                                                            <?php if (($this->_foreach['persparams']['iteration'] <= 1) && ($this->_foreach['persparams']['iteration'] == $this->_foreach['persparams']['total'])): ?>
                                                                <?php echo smarty_function_oxmultilang(array('ident' => 'LABEL'), $this);?>

                                                            <?php else: ?>
                                                                <?php echo $this->_tpl_vars['sVar']; ?>
:
                                                            <?php endif; ?>
                                                        </label>
                                                        <input class="textbox persParam" type="text" name="aproducts[<?php echo $this->_tpl_vars['basketindex']; ?>
][persparam][<?php echo $this->_tpl_vars['sVar']; ?>
]" value="<?php echo $this->_tpl_vars['aParam']; ?>
">
                                                    </p>
                                                <?php endforeach; endif; unset($_from); ?>
                                            <?php else: ?>
                                                <p><?php echo smarty_function_oxmultilang(array('ident' => 'LABEL'), $this);?>
 <input class="textbox persParam" type="text" name="aproducts[<?php echo $this->_tpl_vars['basketindex']; ?>
][persparam][details]" value=""></p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                
                            </div>
                        </td>
                    

                    
                                                <?php if ($this->_tpl_vars['oView']->isWrapping()): ?>
                            <td align="center">
                                <?php if (! $this->_tpl_vars['basketitem']->getWrappingId()): ?>
                                    <?php if ($this->_tpl_vars['editable']): ?>
                                        <a href="#" class="btn btn-default btn-xs" title="<?php echo smarty_function_oxmultilang(array('ident' => 'ADD'), $this);?>
" data-toggle="modal" data-target="#giftoptions"><?php echo smarty_function_oxmultilang(array('ident' => 'ADD'), $this);?>
</a>
                                    <?php else: ?>
                                        <?php echo smarty_function_oxmultilang(array('ident' => 'NONE'), $this);?>

                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php $this->assign('oWrap', $this->_tpl_vars['basketitem']->getWrapping()); ?>
                                    <?php if ($this->_tpl_vars['editable']): ?>
                                        <a class="btn btn-default btn-xs" href="#" title="<?php echo smarty_function_oxmultilang(array('ident' => 'ADD'), $this);?>
" data-toggle="modal" data-target="#giftoptions"><i class="fa fa-pencil"></i> <?php echo $this->_tpl_vars['oWrap']->oxwrapping__oxname->value; ?>
</a>
                                    <?php else: ?>
                                        <?php echo $this->_tpl_vars['oWrap']->oxwrapping__oxname->value; ?>

                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                        <?php endif; ?>
                    

                    
                                                <td class="quantity">
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
                                    <p>
                                        <input id="am_<?php echo $this->_foreach['basketContents']['iteration']; ?>
" type="number" class="textbox" name="aproducts[<?php echo $this->_tpl_vars['basketindex']; ?>
][am]" value="<?php echo $this->_tpl_vars['basketitem']->getAmount(); ?>
" size="3" min="0"<?php if ($this->_tpl_vars['oConfig']->getConfigParam('blAllowUnevenAmounts')): ?> step="any"<?php endif; ?>>
                                    </p>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php echo $this->_tpl_vars['basketitem']->getAmount(); ?>

                            <?php endif; ?>
                            <?php if ($this->_tpl_vars['basketitem']->getdBundledAmount() > 0 && ( $this->_tpl_vars['basketitem']->isBundle() || $this->_tpl_vars['basketitem']->isDiscountArticle() )): ?>
                                +<?php echo $this->_tpl_vars['basketitem']->getdBundledAmount(); ?>

                            <?php endif; ?>
                        </td>
                    

                    
                                                <td class="unitPrice">
                            <?php if ($this->_tpl_vars['basketitem']->getFUnitPrice()): ?><?php echo $this->_tpl_vars['basketitem']->getFUnitPrice(); ?>
&nbsp;<?php echo $this->_tpl_vars['currency']->sign; ?>
<?php endif; ?>
                            <?php if (! $this->_tpl_vars['basketitem']->isBundle()): ?>
                                <?php $this->assign('dRegUnitPrice', $this->_tpl_vars['basketitem']->getRegularUnitPrice()); ?>
                                <?php $this->assign('dUnitPrice', $this->_tpl_vars['basketitem']->getUnitPrice()); ?>
                                <?php if ($this->_tpl_vars['dRegUnitPrice']->getPrice() > $this->_tpl_vars['dUnitPrice']->getPrice()): ?>
                                    <br><del class="text-danger"><?php echo $this->_tpl_vars['basketitem']->getFRegularUnitPrice(); ?>
&nbsp;<?php echo $this->_tpl_vars['currency']->sign; ?>
</del>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                    

                    
                                                <td class="vatPercent">
                            <?php echo $this->_tpl_vars['basketitem']->getVatPercent(); ?>
%
                        </td>
                    

                    
                                                <td class="totalPrice">
                            <?php echo $this->_tpl_vars['basketitem']->getFTotalPrice(); ?>
&nbsp;<?php echo $this->_tpl_vars['currency']->sign; ?>

                        </td>
                    
                </tr>
            

            
            
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
</th>
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
        
    </tbody>

    
        <?php if ($this->_tpl_vars['editable']): ?>
            <tfoot id="basketFn" class="basketFunctions">
                <tr>
                    <td class="text-center" style="display:table-cell;vertical-align:middle;">
                        <input type="checkbox" name="checkAll" id="checkAll" title="<?php echo smarty_function_oxmultilang(array('ident' => 'ALL'), $this);?>
">
                    </td>
                    <td colspan="<?php if ($this->_tpl_vars['oView']->isWrapping()): ?>6<?php else: ?>5<?php endif; ?>">
                        <button name="removeAllBtn" class="btn btn-sm" id="basketRemoveAll" type="button"><?php echo smarty_function_oxmultilang(array('ident' => 'ALL'), $this);?>
</button>
                        <button name="removeBtn" class="btn btn-sm btn-danger" id="basketRemove" type="submit"><?php echo smarty_function_oxmultilang(array('ident' => 'REMOVE'), $this);?>
</button>
                        <button name="updateBtn" class="btn btn-sm btn-warning" id="basketUpdate" type="submit"><?php echo smarty_function_oxmultilang(array('ident' => 'UPDATE'), $this);?>
</button>
                    </td>
                </tr>
            </tfoot>
        <?php endif; ?>
    
</table>