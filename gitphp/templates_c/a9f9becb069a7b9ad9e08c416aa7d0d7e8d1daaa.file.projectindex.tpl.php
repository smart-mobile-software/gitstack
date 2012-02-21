<?php /* Smarty version Smarty-3.1.7, created on 2012-02-21 15:06:07
         compiled from ".\templates\projectindex.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184704f43b2dfd55954-08853475%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9f9becb069a7b9ad9e08c416aa7d0d7e8d1daaa' => 
    array (
      0 => '.\\templates\\projectindex.tpl',
      1 => 1327762713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184704f43b2dfd55954-08853475',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'projectlist' => 0,
    'proj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f43b2dfd9d38',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f43b2dfd9d38')) {function content_4f43b2dfd9d38($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['proj'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['proj']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projectlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['proj']->key => $_smarty_tpl->tpl_vars['proj']->value){
$_smarty_tpl->tpl_vars['proj']->_loop = true;
?>
<?php echo $_smarty_tpl->tpl_vars['proj']->value->GetProject();?>

<?php } ?>
<?php }} ?>