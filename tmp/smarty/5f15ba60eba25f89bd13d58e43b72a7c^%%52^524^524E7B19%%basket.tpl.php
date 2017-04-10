<?php /* Smarty version 2.6.28, created on 2017-04-10 04:33:19
         compiled from page/checkout/basket.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'page/checkout/basket.tpl', 15, false),array('insert', 'oxid_tracker', 'page/checkout/basket.tpl', 115, false),)), $this); ?>


<?php $this->assign('oConfig', $this->_tpl_vars['oViewConf']->getConfig()); ?>
<?php ob_start(); ?>


        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/checkout/inc/steps.tpl", 'smarty_include_vars' => array('active' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    
        <?php $this->assign('currency', $this->_tpl_vars['oView']->getActCurrency()); ?>

        <?php if ($this->_tpl_vars['oView']->isLowOrderPrice()): ?>
            
                <div class="alert alert-info"><?php echo smarty_function_oxmultilang(array('ident' => 'MIN_ORDER_PRICE'), $this);?>
 <?php echo $this->_tpl_vars['oView']->getMinOrderPrice(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
</div>
                <div class="spacer"></div>
            
        <?php endif; ?>

        <?php if (! $this->_tpl_vars['oxcmp_basket']->getProductsCount()): ?>
            
                <div class="spacer"></div>
                <div class="alert alert-danger" id="empty-basket-warning">
                    <a href="<?php echo $this->_tpl_vars['oViewConf']->getHomeLink(); ?>
" title="<?php echo $this->_tpl_vars['oxcmp_shop']->oxshops__oxtitleprefix->value; ?>
" class="btn btn-default"><i class="fa fa-caret-left"></i> <?php echo smarty_function_oxmultilang(array('ident' => 'DD_BASKET_BACK_TO_SHOP'), $this);?>
</a>
                    <?php echo smarty_function_oxmultilang(array('ident' => 'BASKET_EMPTY'), $this);?>

                </div>
            
        <?php else: ?>
            
                <div class="well well-sm clear cart-buttons">
                    
                        <?php if ($this->_tpl_vars['oView']->showBackToShop()): ?>
                            <form action="<?php echo $this->_tpl_vars['oViewConf']->getSslSelfLink(); ?>
" method="post" class="pull-left">
                                <div class="hidden">
                                    <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

                                    <input type="hidden" name="cl" value="basket">
                                    <input type="hidden" name="fnc" value="backtoshop">
                                </div>
                                <button type="submit" class="btn btn-default submitButton largeButton pull-left">
                                    <i class="fa fa-caret-left"></i> <?php echo smarty_function_oxmultilang(array('ident' => 'CONTINUE_SHOPPING'), $this);?>

                                </button>
                            </form>
                        <?php else: ?>
                            <a href="<?php echo $this->_tpl_vars['oViewConf']->getHomeLink(); ?>
" class="btn btn-default submitButton largeButton pull-left">
                                <i class="fa fa-caret-left"></i> <?php echo smarty_function_oxmultilang(array('ident' => 'CONTINUE_SHOPPING'), $this);?>

                            </a>
                        <?php endif; ?>
                    

                    <?php if (! $this->_tpl_vars['oView']->isLowOrderPrice()): ?>
                        
                            <form action="<?php echo $this->_tpl_vars['oViewConf']->getSslSelfLink(); ?>
" method="post" class="pull-right">
                                <div class="hidden">
                                    <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

                                    <input type="hidden" name="cl" value="user">
                                </div>
                                <button type="submit" class="btn btn-primary submitButton largeButton nextStep pull-right">
                                    <?php echo smarty_function_oxmultilang(array('ident' => 'CONTINUE_TO_NEXT_STEP'), $this);?>
 <i class="fa fa-caret-right"></i>
                                </button>
                            </form>
                        
                    <?php endif; ?>
                    <div class="clearfix"></div>
                </div>
            

            <div class="lineBox">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/checkout/inc/basketcontents.tpl", 'smarty_include_vars' => array('editable' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>

            
                <div class="well well-sm clear cart-buttons">
                    

                    
                        <?php if ($this->_tpl_vars['oView']->showBackToShop()): ?>
                            <form action="<?php echo $this->_tpl_vars['oViewConf']->getSslSelfLink(); ?>
" method="post" class="pull-left">
                                <div class="backtoshop">
                                    <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

                                    <input type="hidden" name="cl" value="basket">
                                    <input type="hidden" name="fnc" value="backtoshop">
                                    <button type="submit" class="btn btn-default submitButton largeButton pull-left">
                                        <i class="fa fa-caret-left"></i> <?php echo smarty_function_oxmultilang(array('ident' => 'CONTINUE_SHOPPING'), $this);?>

                                    </button>
                                </div>
                            </form>
                        <?php else: ?>
                            <a href="<?php echo $this->_tpl_vars['oViewConf']->getHomeLink(); ?>
" class="btn btn-default submitButton largeButton pull-left">
                                <i class="fa fa-caret-left"></i> <?php echo smarty_function_oxmultilang(array('ident' => 'CONTINUE_SHOPPING'), $this);?>

                            </a>
                        <?php endif; ?>
                    

                    <?php if (! $this->_tpl_vars['oView']->isLowOrderPrice()): ?>
                        
                            <form action="<?php echo $this->_tpl_vars['oViewConf']->getSslSelfLink(); ?>
" method="post">
                                <div class="hidden">
                                    <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

                                    <input type="hidden" name="cl" value="user">
                                </div>
                                <button type="submit" class="btn btn-primary submitButton largeButton nextStep pull-right">
                                    <?php echo smarty_function_oxmultilang(array('ident' => 'CONTINUE_TO_NEXT_STEP'), $this);?>
 <i class="fa fa-caret-right"></i>
                                </button>
                            </form>
                        
                    <?php endif; ?>
                    <div class="clearfix"></div>
                </div>
            
        <?php endif; ?>
        <?php if ($this->_tpl_vars['oView']->isWrapping()): ?>
           <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/checkout/inc/wrapping.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
    
    <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'oxid_tracker', 'title' => $this->_tpl_vars['template_title'])), $this); ?>

<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('oxidBlock_content', ob_get_contents());ob_end_clean(); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layout/page.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>