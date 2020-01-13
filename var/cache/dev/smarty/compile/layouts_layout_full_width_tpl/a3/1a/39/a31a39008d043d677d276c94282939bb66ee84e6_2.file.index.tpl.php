<?php
/* Smarty version 3.1.33, created on 2019-12-12 17:14:42
  from '/Users/Antoine/Documents/htdocs/france-auto-expert/themes/bizkick/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5df2677217a8f4_82287718',
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
function content_5df2677217a8f4_82287718 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7114572935df2677216bcb6_03639766', 'page_content_container');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_content_top'} */
class Block_11451912825df2677216d675_55842791 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'hook_home'} */
class Block_6713031115df26772170bc8_23609609 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>

          <?php
}
}
/* {/block 'hook_home'} */
/* {block 'page_content'} */
class Block_9123571235df2677216f4c6_21686910 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6713031115df26772170bc8_23609609', 'hook_home', $this->tplIndex);
?>

        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_7114572935df2677216bcb6_03639766 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_7114572935df2677216bcb6_03639766',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_11451912825df2677216d675_55842791',
  ),
  'page_content' => 
  array (
    0 => 'Block_9123571235df2677216f4c6_21686910',
  ),
  'hook_home' => 
  array (
    0 => 'Block_6713031115df26772170bc8_23609609',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-home">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11451912825df2677216d675_55842791', 'page_content_top', $this->tplIndex);
?>


        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9123571235df2677216f4c6_21686910', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
}
