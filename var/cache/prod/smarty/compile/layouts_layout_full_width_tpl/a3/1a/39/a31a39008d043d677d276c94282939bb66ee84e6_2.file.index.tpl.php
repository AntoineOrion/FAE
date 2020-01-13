<?php
/* Smarty version 3.1.33, created on 2020-01-10 16:21:10
  from '/Users/Antoine/Documents/htdocs/france-auto-expert/themes/bizkick/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e189666cdba09_93816775',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a31a39008d043d677d276c94282939bb66ee84e6' => 
    array (
      0 => '/Users/Antoine/Documents/htdocs/france-auto-expert/themes/bizkick/templates/index.tpl',
      1 => 1576165313,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e189666cdba09_93816775 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10782992845e189666cd58d4_88864120', 'page_content_container');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_content_top'} */
class Block_12450178885e189666cd6a31_78268309 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'hook_home'} */
class Block_3686065925e189666cd8c35_59378978 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>

          <?php
}
}
/* {/block 'hook_home'} */
/* {block 'page_content'} */
class Block_16870394685e189666cd7fd6_16104300 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3686065925e189666cd8c35_59378978', 'hook_home', $this->tplIndex);
?>

        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_10782992845e189666cd58d4_88864120 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_10782992845e189666cd58d4_88864120',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_12450178885e189666cd6a31_78268309',
  ),
  'page_content' => 
  array (
    0 => 'Block_16870394685e189666cd7fd6_16104300',
  ),
  'hook_home' => 
  array (
    0 => 'Block_3686065925e189666cd8c35_59378978',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-home">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12450178885e189666cd6a31_78268309', 'page_content_top', $this->tplIndex);
?>


        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16870394685e189666cd7fd6_16104300', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
}
