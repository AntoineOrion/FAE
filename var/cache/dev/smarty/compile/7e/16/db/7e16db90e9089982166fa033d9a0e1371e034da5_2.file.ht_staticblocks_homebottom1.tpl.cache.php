<?php
/* Smarty version 3.1.33, created on 2019-12-12 17:14:42
  from '/Users/Antoine/Documents/htdocs/france-auto-expert/modules/ht_staticblocks/views/templates/hook/ht_staticblocks_homebottom1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5df267725b7ee4_60443289',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e16db90e9089982166fa033d9a0e1371e034da5' => 
    array (
      0 => '/Users/Antoine/Documents/htdocs/france-auto-expert/modules/ht_staticblocks/views/templates/hook/ht_staticblocks_homebottom1.tpl',
      1 => 1576165313,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5df267725b7ee4_60443289 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '6368875115df267725aa382_40940337';
?>

<!-- Static Block module -->
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['block_list']->value, 'block');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['block']->value) {
?>
	<?php if (isset($_smarty_tpl->tpl_vars['block']->value['content'])) {?>
		<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['block']->value['content'],'quotes','UTF-8' ));?>

	<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<!-- /Static block module --><?php }
}
