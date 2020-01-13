<?php
/* Smarty version 3.1.33, created on 2019-12-12 17:29:56
  from '/Users/Antoine/Documents/htdocs/france-auto-expert/admin993qskt3x/themes/default/template/helpers/tree/tree_toolbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5df26b04eb7690_02471641',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e68acb943f223a63773e3e7582bdb901397d95d0' => 
    array (
      0 => '/Users/Antoine/Documents/htdocs/france-auto-expert/admin993qskt3x/themes/default/template/helpers/tree/tree_toolbar.tpl',
      1 => 1561372892,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5df26b04eb7690_02471641 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="tree-actions pull-right">
	<?php if (isset($_smarty_tpl->tpl_vars['actions']->value)) {?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['actions']->value, 'action');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['action']->value) {
?>
		<?php echo $_smarty_tpl->tpl_vars['action']->value->render();?>

	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<?php }?>
</div>
<?php }
}
