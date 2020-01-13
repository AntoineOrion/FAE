<?php
/* Smarty version 3.1.33, created on 2019-12-12 17:14:42
  from '/Users/Antoine/Documents/htdocs/france-auto-expert/themes/bizkick/templates/_partials/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5df26772955c55_15602786',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61d1878a1391b6e5884394b633caf03608e78bd1' => 
    array (
      0 => '/Users/Antoine/Documents/htdocs/france-auto-expert/themes/bizkick/templates/_partials/footer.tpl',
      1 => 1576165313,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5df26772955c55_15602786 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<div class="newsletter-section">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10221985715df26772938772_04469215', 'hook_footer_before');
?>

</div>
<div class="footer-container">
    <div class="container">
        <div class="row">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2002024435df2677293b4e5_36716247', 'hook_footer');
?>

        </div>
        <div class="row">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6956723355df2677293f1a9_43905217', 'hook_footer_after');
?>

        </div>
        <div class="col-md-12 footer-bottom">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-sm-center">
                        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14398302715df26772942d62_82708460', 'copyright_link');
?>

                    </p>
                </div>
                <div class="cards col-md-6">
                    <ul>
                        <li>
                            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['img_url'], ENT_QUOTES, 'UTF-8');?>
/americanexpress.png">
                        </li>
                        <li>
                            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['img_url'], ENT_QUOTES, 'UTF-8');?>
/discover.png">
                        </li>
                        <li>
                            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['img_url'], ENT_QUOTES, 'UTF-8');?>
/maestro.png">
                        </li>
                        <li>
                            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['img_url'], ENT_QUOTES, 'UTF-8');?>
/master.png">
                        </li>
                        <li>
                            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['img_url'], ENT_QUOTES, 'UTF-8');?>
/visa.png">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php }
/* {block 'hook_footer_before'} */
class Block_10221985715df26772938772_04469215 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_footer_before' => 
  array (
    0 => 'Block_10221985715df26772938772_04469215',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooterBefore'),$_smarty_tpl ) );?>

    <?php
}
}
/* {/block 'hook_footer_before'} */
/* {block 'hook_footer'} */
class Block_2002024435df2677293b4e5_36716247 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_footer' => 
  array (
    0 => 'Block_2002024435df2677293b4e5_36716247',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooter'),$_smarty_tpl ) );?>

            <?php
}
}
/* {/block 'hook_footer'} */
/* {block 'hook_footer_after'} */
class Block_6956723355df2677293f1a9_43905217 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_footer_after' => 
  array (
    0 => 'Block_6956723355df2677293f1a9_43905217',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooterAfter'),$_smarty_tpl ) );?>

            <?php
}
}
/* {/block 'hook_footer_after'} */
/* {block 'copyright_link'} */
class Block_14398302715df26772942d62_82708460 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'copyright_link' => 
  array (
    0 => 'Block_14398302715df26772942d62_82708460',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                            <a class="_blank" href="http://www.prestashop.com" target="_blank">
                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'%copyright% %year% - Ecommerce software by %prestashop%','sprintf'=>array('%prestashop%'=>'PrestaShop™','%year%'=>date('Y'),'%copyright%'=>'©'),'d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>

                            </a>
                        <?php
}
}
/* {/block 'copyright_link'} */
}
