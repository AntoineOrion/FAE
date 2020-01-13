<?php
/* Smarty version 3.1.33, created on 2020-01-10 11:53:58
  from '/Users/Antoine/Documents/htdocs/france-auto-expert/modules/blocktopdropdownmenu/blocktopdropdownmenu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e1857c619d199_21163537',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5150ef9d5ef6da29ae0db8110dce7b1d7ddb0574' => 
    array (
      0 => '/Users/Antoine/Documents/htdocs/france-auto-expert/modules/blocktopdropdownmenu/blocktopdropdownmenu.tpl',
      1 => 1578653634,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e1857c619d199_21163537 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '19917875165e1857c61979a6_57390885';
if ($_smarty_tpl->tpl_vars['MENU']->value != '') {?>
	<!-- Menu -->
	<div id="block_top_menu" class="sf-contener clearfix col-lg-12">
		<div class="cat-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Menu",'mod'=>"blocktopdropdownmenu"),$_smarty_tpl ) );?>
</div>
		<ul class="sf-menu clearfix menu-content">
			<?php echo $_smarty_tpl->tpl_vars['MENU']->value;?>

					</ul>
	</div>
	<!--/ Menu -->
<?php }
}
}
