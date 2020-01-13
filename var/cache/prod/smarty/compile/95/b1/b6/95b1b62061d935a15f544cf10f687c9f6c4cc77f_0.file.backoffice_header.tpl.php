<?php
/* Smarty version 3.1.33, created on 2020-01-10 11:47:47
  from '/Users/Antoine/Documents/htdocs/france-auto-expert/modules/creativeelements/views/templates/hook/backoffice_header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e1856533918e7_84606777',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95b1b62061d935a15f544cf10f687c9f6c4cc77f' => 
    array (
      0 => '/Users/Antoine/Documents/htdocs/france-auto-expert/modules/creativeelements/views/templates/hook/backoffice_header.tpl',
      1 => 1576171715,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e1856533918e7_84606777 (Smarty_Internal_Template $_smarty_tpl) {
?>
<style>.icon-AdminParentCreativeElements:before { content: ""; }</style>
<?php if (!empty($_smarty_tpl->tpl_vars['edit_width_ce']->value)) {
echo '<script'; ?>
 type="text/html" id="tmpl-btn-edit-with-ce">
	<a href="<?php echo $_smarty_tpl->tpl_vars['edit_width_ce']->value;?>
" class="btn pointer btn-edit-with-ce"><i class="material-icons">explicit</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit with Creative Elements','mod'=>'creativeelements'),$_smarty_tpl ) );?>
</a>
<?php echo '</script'; ?>
>
<?php }
}
}
