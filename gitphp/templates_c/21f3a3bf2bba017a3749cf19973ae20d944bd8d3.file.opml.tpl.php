<?php /* Smarty version Smarty-3.1.7, created on 2012-02-21 15:06:10
         compiled from ".\templates\opml.tpl" */ ?>
<?php /*%%SmartyHeaderCode:318474f43b2e2801931-89760287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21f3a3bf2bba017a3749cf19973ae20d944bd8d3' => 
    array (
      0 => '.\\templates\\opml.tpl',
      1 => 1327762713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '318474f43b2e2801931-89760287',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pagetitle' => 0,
    'projectlist' => 0,
    'proj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f43b2e2884ed',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f43b2e2884ed')) {function content_4f43b2e2884ed($_smarty_tpl) {?><?php if (!is_callable('smarty_function_scripturl')) include 'C:\\dev\\gitstack\\gitphp/include/smartyplugins\\function.scripturl.php';
?>
<?php echo '<?xml';?> version="1.0" encoding="utf-8"<?php echo '?>';?>
<opml version="1.0">
  <head>
    <title><?php echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
 OPML Export</title>
  </head>
  <body>
    <outline text="git Atom feeds">

      <?php  $_smarty_tpl->tpl_vars['proj'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['proj']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projectlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['proj']->key => $_smarty_tpl->tpl_vars['proj']->value){
$_smarty_tpl->tpl_vars['proj']->_loop = true;
?>
      <outline type="rss" text="<?php echo $_smarty_tpl->tpl_vars['proj']->value->GetProject();?>
" title="<?php echo $_smarty_tpl->tpl_vars['proj']->value->GetProject();?>
" xmlUrl="<?php echo smarty_function_scripturl(array(),$_smarty_tpl);?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['proj']->value->GetProject());?>
&amp;a=atom" htmlUrl="<?php echo smarty_function_scripturl(array(),$_smarty_tpl);?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['proj']->value->GetProject());?>
&amp;a=summary" />

      <?php } ?>
    </outline>
  </body>
</opml>
<?php }} ?>