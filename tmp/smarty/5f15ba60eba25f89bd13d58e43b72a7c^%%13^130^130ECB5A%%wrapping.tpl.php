<?php /* Smarty version 2.6.28, created on 2017-04-05 06:42:45
         compiled from page/checkout/inc/wrapping.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'page/checkout/inc/wrapping.tpl', 9, false),array('function', 'oxscript', 'page/checkout/inc/wrapping.tpl', 96, false),array('function', 'counter', 'page/checkout/inc/wrapping.tpl', 124, false),array('modifier', 'strip_tags', 'page/checkout/inc/wrapping.tpl', 47, false),)), $this); ?>
<?php $this->assign('currency', $this->_tpl_vars['oView']->getActCurrency()); ?>

<div class="modal fade" id="giftoptions" tabindex="-1" role="dialog" aria-labelledby="giftoptions_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
                    <span class="h4 modal-title" id="giftoptions_modal_label"><?php echo smarty_function_oxmultilang(array('ident' => 'GIFT_OPTION'), $this);?>
</span>
                
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('gift-wrapping.jpg'); ?>
" alt="<?php echo smarty_function_oxmultilang(array('ident' => 'ADD_WRAPPING'), $this);?>
" class="img-thumbnail">
                    </div>
                    <div class="col-md-9">
                        <p><?php echo smarty_function_oxmultilang(array('ident' => 'WRAPPING_DESCRIPTION'), $this);?>
</p>
                    </div>
                </div>

                
                    <h3 class="page-header blockHead"><?php echo smarty_function_oxmultilang(array('ident' => 'ADD_WRAPPING'), $this);?>
</h3>

                    <?php if (! $this->_tpl_vars['oxcmp_basket']->getProductsCount()): ?>
                        <div class="alert alert-danger"><?php echo smarty_function_oxmultilang(array('ident' => 'BASKET_EMPTY'), $this);?>
</div>
                    <?php else: ?>
                        <form name="basket" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfActionLink(); ?>
" method="post" role="form" id="giftoptions_modal_form">
                            <div class="hidden">
                                <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

                                <input type="hidden" name="cl" value="basket">
                                <input type="hidden" name="fnc" value="changewrapping">
                            </div>

                            <?php $this->assign('oWrapList', $this->_tpl_vars['oView']->getWrappingList()); ?>
                            <?php if ($this->_tpl_vars['oWrapList']->count()): ?>
                                                                <?php $this->assign('icounter', '0'); ?>
                                <?php $this->assign('basketitemlist', $this->_tpl_vars['oView']->getBasketArticles()); ?>
                                <?php $_from = $this->_tpl_vars['oxcmp_basket']->getContents(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['wrappArt'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['wrappArt']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['basketindex'] => $this->_tpl_vars['basketitem']):
        $this->_foreach['wrappArt']['iteration']++;
?>
                                    <div class="well well-sm">
                                        <div class="row">
                                            
                                                <?php $this->assign('basketproduct', $this->_tpl_vars['basketitemlist'][$this->_tpl_vars['basketindex']]); ?>

                                                <div class="col-xs-4">
                                                    <img src="<?php echo $this->_tpl_vars['basketproduct']->getIconUrl(); ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['basketitem']->getTitle())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" class="img-thumbnail img-responsive">
                                                </div>

                                                <div class="col-xs-8">
                                                    <p class="lead"><?php echo $this->_tpl_vars['basketitem']->getTitle(); ?>
</p>
                                                </div>

                                        </div>


                                        <div id="wrapp_<?php echo $this->_foreach['wrappArt']['iteration']; ?>
" class="row">
                                            <div class="col-md-12">
                                                <div class="col-xs-3">
                                                </div>
                                                <div class="col-xs-9 col-sm-offset-3">
                                                    <div class="form-group">
                                                        <div class="radio">
                                                            <label>
                                                                <input class="radiobox" type="radio" name="wrapping[<?php echo $this->_tpl_vars['basketindex']; ?>
]" id="wrapping_<?php echo $this->_tpl_vars['basketindex']; ?>
" value="0" <?php if (! $this->_tpl_vars['basketitem']->getWrappingId()): ?>CHECKED<?php endif; ?>>
                                                                <?php echo smarty_function_oxmultilang(array('ident' => 'NONE'), $this);?>
 <strong>0,00 <?php echo $this->_tpl_vars['currency']->sign; ?>
</strong>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php $this->assign('ictr', '1'); ?>
                                            <?php $_from = $this->_tpl_vars['oView']->getWrappingList(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['Wraps'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['Wraps']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['wrapping']):
        $this->_foreach['Wraps']['iteration']++;
?>
                                                <div class="col-md-12">
                                                    <?php if ($this->_tpl_vars['wrapping']->oxwrapping__oxpic->value): ?>
                                                        <div class="col-xs-3">
                                                            <img src="<?php echo $this->_tpl_vars['wrapping']->getPictureUrl(); ?>
" alt="<?php echo $this->_tpl_vars['wrapping']->oxwrapping__oxname->value; ?>
" class="img-thumbnail">
                                                        </div>
                                                        <div class="col-xs-9">
                                                    <?php else: ?>
                                                        <div class="col-xs-12">
                                                    <?php endif; ?>
                                                        <div class="form-group">
                                                            <div class="radio">
                                                                <label>
                                                                    <input class="radiobox" type="radio" name="wrapping[<?php echo $this->_tpl_vars['basketindex']; ?>
]" id="wrapping_<?php echo $this->_tpl_vars['wrapping']->oxwrapping__oxid->value; ?>
" value="<?php echo $this->_tpl_vars['wrapping']->oxwrapping__oxid->value; ?>
" <?php if ($this->_tpl_vars['basketitem']->getWrappingId() == $this->_tpl_vars['wrapping']->oxwrapping__oxid->value): ?>CHECKED<?php endif; ?>>
                                                                    <?php echo $this->_tpl_vars['wrapping']->oxwrapping__oxname->value; ?>
 <strong><?php echo $this->_tpl_vars['wrapping']->getFPrice(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
</strong>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $this->assign('ictr', ($this->_tpl_vars['ictr']+1)); ?>
                                            <?php endforeach; endif; unset($_from); ?>
                                            <?php echo smarty_function_oxscript(array('add' => "$( '#wrapp_".($this->_foreach['wrappArt']['iteration'])." img' ).click(function(){ $(this).parent().parent().find('input').click(); });"), $this);?>

                                        </div>

                                                <?php $this->assign('icounter', ($this->_tpl_vars['icounter']+1)); ?>
                                            
                                        </div>
                                <?php endforeach; endif; unset($_from); ?>
                            <?php endif; ?>

                            <?php $this->assign('oCardList', $this->_tpl_vars['oView']->getCardList()); ?>
                            <?php if ($this->_tpl_vars['oCardList']->count()): ?>
                                
                                    <h3 class="page-header blockHead"><?php echo smarty_function_oxmultilang(array('ident' => 'GREETING_CARD'), $this);?>
</h3>
                                    <div class="wrappingCard clear" id="wrappCard">
                                        <div class="well well-sm">
                                            <div class="row">
                                                <div class="col-sm-9 col-sm-offset-3">
                                                    <div class="form-group">
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" class="radiobox" name="chosencard" id="chosencard" value="0" <?php if (! $this->_tpl_vars['oxcmp_basket']->getCardId()): ?>CHECKED<?php endif; ?>> <?php echo smarty_function_oxmultilang(array('ident' => 'NO_GREETING_CARD'), $this);?>

                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $this->assign('icounter', '0'); ?>
                                        <?php echo smarty_function_counter(array('start' => 0,'print' => false), $this);?>

                                        <?php $this->assign('icounter', '0'); ?>
                                        <?php $_from = $this->_tpl_vars['oCardList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['GreetCards'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['GreetCards']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['card']):
        $this->_foreach['GreetCards']['iteration']++;
?>
                                            <div class="well well-sm">
                                                <div class="row">
                                                    <?php if ($this->_tpl_vars['card']->oxwrapping__oxpic->value): ?>
                                                        <div class="col-xs-3">
                                                            <img src="<?php echo $this->_tpl_vars['card']->getPictureUrl(); ?>
" alt="<?php echo $this->_tpl_vars['card']->oxwrapping__oxname->value; ?>
" class="img-thumbnail">
                                                        </div>
                                                        <div class="col-xs-9">
                                                    <?php else: ?>
                                                        <div class="col-xs-12">
                                                    <?php endif; ?>
                                                        <div class="form-group">
                                                            <div class="radio">
                                                                <label>
                                                                    <input class="radiobox" type="radio" name="chosencard" id="chosen_<?php echo $this->_tpl_vars['card']->oxwrapping__oxid->value; ?>
" value="<?php echo $this->_tpl_vars['card']->oxwrapping__oxid->value; ?>
" <?php if ($this->_tpl_vars['oxcmp_basket']->getCardId() == $this->_tpl_vars['card']->oxwrapping__oxid->value): ?>CHECKED<?php endif; ?>> <?php echo $this->_tpl_vars['card']->oxwrapping__oxname->value; ?>
 <strong><?php echo $this->_tpl_vars['card']->getFPrice(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
</strong>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $this->assign('icounter', ($this->_tpl_vars['icounter']+1)); ?>
                                        <?php endforeach; endif; unset($_from); ?>
                                        <?php echo smarty_function_oxscript(array('add' => "$( '#wrappCard img' ).click(function(){ $(this).parent().siblings().find('input').click(); });"), $this);?>

                                    </div>

                                
                                
                                    <div class="form-group wrappingComment">
                                        <label for="giftmessage" class="control-label"><?php echo smarty_function_oxmultilang(array('ident' => 'GREETING_MESSAGE'), $this);?>
</label>
                                        <textarea cols="102" rows="5" name="giftmessage" id="giftmessage" class="form-control"><?php echo $this->_tpl_vars['oxcmp_basket']->getCardMessage(); ?>
</textarea>
                                    </div>
                                
                            <?php endif; ?>
                        </form>
                    <?php endif; ?>
                
            </div>
            <div class="modal-footer">
                
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo smarty_function_oxmultilang(array('ident' => 'CANCEL'), $this);?>
</button>
                    <button type="submit" class="btn btn-primary" onclick="window.giftoptions_modal_form.submit();return false;"><?php echo smarty_function_oxmultilang(array('ident' => 'APPLY'), $this);?>
</button>
                
            </div>
        </div>
    </div>
</div>