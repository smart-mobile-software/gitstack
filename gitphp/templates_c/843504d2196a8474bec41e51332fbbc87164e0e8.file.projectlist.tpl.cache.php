<?php /* Smarty version Smarty-3.1.7, created on 2012-02-20 12:16:09
         compiled from ".\templates\projectlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:290284f423989f1bb56-91994337%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '843504d2196a8474bec41e51332fbbc87164e0e8' => 
    array (
      0 => '.\\templates\\projectlist.tpl',
      1 => 1327762713,
      2 => 'file',
    ),
    '325c040ac3eb2e57c3cb2db39552570ef3cca8a8' => 
    array (
      0 => '.\\templates\\main.tpl',
      1 => 1327762713,
      2 => 'file',
    ),
    '1a44282d013b0ddc1fdf40ca6ea0e2561e236bc7' => 
    array (
      0 => '.\\templates\\jsconst.tpl',
      1 => 1327762713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '290284f423989f1bb56-91994337',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'version' => 0,
    'pagetitle' => 0,
    'stylesheet' => 0,
    'javascript' => 0,
    'googlejs' => 0,
    'supportedlocales' => 0,
    'SCRIPT_NAME' => 0,
    'requestvars' => 0,
    'var' => 0,
    'val' => 0,
    'locale' => 0,
    'currentlocale' => 0,
    'language' => 0,
    'homelink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f42398a4193e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f42398a4193e')) {function content_4f42398a4193e($_smarty_tpl) {?><?php if (!is_callable('smarty_block_t')) include 'C:\\dev\\gitstack\\gitphp/include/smartyplugins\\block.t.php';
if (!is_callable('smarty_function_cycle')) include 'C:\\dev\\gitstack\\gitphp\\lib\\smarty\\libs\\plugins\\function.cycle.php';
if (!is_callable('smarty_modifier_agestring')) include 'C:\\dev\\gitstack\\gitphp/include/smartyplugins\\modifier.agestring.php';
?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <!-- gitphp web interface <?php echo $_smarty_tpl->tpl_vars['version']->value;?>
, (C) 2006-2011 Christopher Han <xiphux@gmail.com> -->
  <head>
    <title>
    
    <?php echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>

    
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    
    
    <?php if (file_exists('css/gitphp.min.css')){?>
    <link rel="stylesheet" href="css/gitphp.min.css" type="text/css" />
    <?php }else{ ?>
    <link rel="stylesheet" href="css/gitphp.css" type="text/css" />
    <?php }?>
    <?php if (file_exists("css/".($_smarty_tpl->tpl_vars['stylesheet']->value).".min.css")){?>
    <link rel="stylesheet" href="css/<?php echo $_smarty_tpl->tpl_vars['stylesheet']->value;?>
.min.css" type="text/css" />
    <?php }else{ ?>
    <link rel="stylesheet" href="css/<?php echo $_smarty_tpl->tpl_vars['stylesheet']->value;?>
.css" type="text/css" />
    <?php }?>
    <link rel="stylesheet" href="css/ext/jquery.qtip.css" type="text/css" />
    
    
    <?php if ($_smarty_tpl->tpl_vars['javascript']->value){?>
    
    <script src="js/ext/require.js"></script>
    <?php /*  Call merged included template "jsconst.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('jsconst.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0, '290284f423989f1bb56-91994337');
content_4f42398a075b6($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "jsconst.tpl" */?>
    <script type="text/javascript">
    var GitPHPJSPaths = {
	<?php if ($_smarty_tpl->tpl_vars['googlejs']->value){?>
		jquery: 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min'
	<?php }else{ ?>
		jquery: 'ext/jquery-1.7.1.min'
	<?php }?>
    };
    
<?php if (file_exists('js/projectlist.min.js')){?>
GitPHPJSPaths.projectlist = "projectlist.min";
<?php }?>


    var GitPHPJSModules = null;
    
GitPHPJSModules = ['projectlist'];


    require({
    	baseUrl: 'js',
	paths: GitPHPJSPaths,
	priority: ['jquery']
    }, GitPHPJSModules);
    </script>
    
    <?php }?>
  </head>
  <body>
    <div class="page_header">
      <a href="http://git-scm.com" title="git homepage">
        <img src="images/git-logo.png" width="72" height="27" alt="git" class="logo" />
      </a>
      <?php if ($_smarty_tpl->tpl_vars['supportedlocales']->value){?>
      <div class="lang_select">
        <form action="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
" method="get" id="frmLangSelect">
         <div>
	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['requestvars']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['var']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
	<?php if ($_smarty_tpl->tpl_vars['var']->value!="l"){?>
	<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['var']->value;?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['val']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
	<?php }?>
	<?php } ?>
	<label for="selLang"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
language:<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</label>
	<select name="l" id="selLang">
	  <?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_smarty_tpl->tpl_vars['locale'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['supportedlocales']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
 $_smarty_tpl->tpl_vars['locale']->value = $_smarty_tpl->tpl_vars['language']->key;
?>
	    <option <?php if ($_smarty_tpl->tpl_vars['locale']->value==$_smarty_tpl->tpl_vars['currentlocale']->value){?>selected="selected"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['locale']->value;?>
"><?php if ($_smarty_tpl->tpl_vars['language']->value){?><?php echo $_smarty_tpl->tpl_vars['language']->value;?>
 (<?php echo $_smarty_tpl->tpl_vars['locale']->value;?>
)<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['locale']->value;?>
<?php }?></option>
	  <?php } ?>
	</select>
	<input type="submit" value="<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
set<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" id="btnLangSet" />
         </div>
	</form>
      </div>
      <?php }?>
      
      <a href="index.php"><?php if ($_smarty_tpl->tpl_vars['homelink']->value){?><?php echo $_smarty_tpl->tpl_vars['homelink']->value;?>
<?php }else{ ?><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
projects<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?></a> /
      
    </div>


<div class="index_header">
<?php if (file_exists('templates/hometext.tpl')){?>
<?php echo $_smarty_tpl->getSubTemplate ('hometext.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php }else{ ?>

<p>
git source code archive
</p>
<?php }?>
</div>

<div class="projectSearch">
<form method="get" action="index.php" id="projectSearchForm" enctype="application/x-www-form-urlencoded">
<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Search projects<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
: <input type="text" name="s" class="projectSearchBox" <?php if ($_smarty_tpl->tpl_vars['search']->value){?>value="<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
"<?php }?> /> <a href="index.php" class="clearSearch" <?php if (!$_smarty_tpl->tpl_vars['search']->value){?>style="display: none;"<?php }?>>X</a> <?php if ($_smarty_tpl->tpl_vars['javascript']->value){?><img src="images/search-loader.gif" class="searchSpinner" style="display: none;" /><?php }?>
</form>
</div>

<table cellspacing="0" class="projectList">
  <?php  $_smarty_tpl->tpl_vars['proj'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['proj']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projectlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['proj']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['proj']->key => $_smarty_tpl->tpl_vars['proj']->value){
$_smarty_tpl->tpl_vars['proj']->_loop = true;
 $_smarty_tpl->tpl_vars['proj']->index++;
 $_smarty_tpl->tpl_vars['proj']->first = $_smarty_tpl->tpl_vars['proj']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['projects']['first'] = $_smarty_tpl->tpl_vars['proj']->first;
?>
    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['projects']['first']){?>
      
      <tr class="projectHeader">
        <?php if ($_smarty_tpl->tpl_vars['order']->value=="project"){?>
          <th><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Project<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</th>
        <?php }else{ ?>
          <th><a class="header" href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?o=project"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Project<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></th>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['order']->value=="descr"){?>
          <th><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Description<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</th>
        <?php }else{ ?>
          <th><a class="header" href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?o=descr"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Description<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></th>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['order']->value=="owner"){?>
          <th><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Owner<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</th>
        <?php }else{ ?>
          <th><a class="header" href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?o=owner"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Owner<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></th>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['order']->value=="age"){?>
          <th><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Last Change<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</th>
        <?php }else{ ?>
          <th><a class="header" href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?o=age"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Last Change<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></th>
        <?php }?>
        <th><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Actions<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</th>
      </tr>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['currentcategory']->value!=$_smarty_tpl->tpl_vars['proj']->value->GetCategory()){?>
      <?php $_smarty_tpl->tpl_vars['currentcategory'] = new Smarty_variable($_smarty_tpl->tpl_vars['proj']->value->GetCategory(), null, 0);?>
      <?php if ($_smarty_tpl->tpl_vars['currentcategory']->value!=''){?>
        <tr class="light categoryRow">
          <th class="categoryName"><?php echo $_smarty_tpl->tpl_vars['currentcategory']->value;?>
</th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      <?php }?>
    <?php }?>

    <tr class="<?php echo smarty_function_cycle(array('values'=>"light,dark"),$_smarty_tpl);?>
 projectRow">
      <td class="projectName">
        <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['proj']->value->GetProject());?>
&amp;a=summary" class="list <?php if ($_smarty_tpl->tpl_vars['currentcategory']->value!=''){?>indent<?php }?>"><?php echo $_smarty_tpl->tpl_vars['proj']->value->GetProject();?>
</a>
      </td>
      <td class="projectDescription"><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['proj']->value->GetProject());?>
&amp;a=summary" class="list"><?php echo $_smarty_tpl->tpl_vars['proj']->value->GetDescription();?>
</a></td>
      <td class="projectOwner"><em><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['proj']->value->GetOwner(), ENT_QUOTES, 'UTF-8', true);?>
</em></td>
      <?php $_smarty_tpl->tpl_vars['projecthead'] = new Smarty_variable($_smarty_tpl->tpl_vars['proj']->value->GetHeadCommit(), null, 0);?>
      <td class="projectAge">
        <?php if ($_smarty_tpl->tpl_vars['projecthead']->value){?>
          <?php if ($_smarty_tpl->tpl_vars['proj']->value->GetAge()<7200){?>   
            <span class="agehighlight"><strong><em><?php echo smarty_modifier_agestring($_smarty_tpl->tpl_vars['proj']->value->GetAge());?>
</em></strong></span>
          <?php }elseif($_smarty_tpl->tpl_vars['proj']->value->GetAge()<172800){?>   
            <span class="agehighlight"><em><?php echo smarty_modifier_agestring($_smarty_tpl->tpl_vars['proj']->value->GetAge());?>
</em></span>
          <?php }else{ ?>
            <em><?php echo smarty_modifier_agestring($_smarty_tpl->tpl_vars['proj']->value->GetAge());?>
</em>
          <?php }?>
	<?php }else{ ?>
	  <em class="empty"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
No commits<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</em>
	<?php }?>
      </td>
      <td class="link">
        <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['proj']->value->GetProject());?>
&amp;a=summary"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
summary<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
	<?php if ($_smarty_tpl->tpl_vars['projecthead']->value){?>
	| 
	<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['proj']->value->GetProject());?>
&amp;a=shortlog"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
shortlog<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a> | 
	<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['proj']->value->GetProject());?>
&amp;a=log"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
log<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a> | 
	<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['proj']->value->GetProject());?>
&amp;a=tree"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tree<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a> | 
	<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['proj']->value->GetProject());?>
&amp;a=snapshot&amp;h=HEAD" class="snapshotTip"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
snapshot<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
	<?php }?>
      </td>
    </tr>
  <?php }
if (!$_smarty_tpl->tpl_vars['proj']->_loop) {
?>
    <?php if ($_smarty_tpl->tpl_vars['search']->value){?>
    <div class="message"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array(1=>$_smarty_tpl->tpl_vars['search']->value)); $_block_repeat=true; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['search']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
No matches found for "%1"<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['search']->value), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</div>
    <?php }else{ ?>
    <div class="message"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
No projects found<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</div>
    <?php }?>
  <?php } ?>

</table>


    <div class="page_footer">
      
  <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?a=opml" class="rss_logo"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
OPML<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
  <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?a=project_index" class="rss_logo"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
TXT<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>

    </div>
    <div class="attr_footer">
    	<a href="http://xiphux.com/programming/gitphp/" target="_blank">GitPHP by Chris Han</a>
    </div>
  </body>
</html>
<?php }} ?><?php /* Smarty version Smarty-3.1.7, created on 2012-02-20 12:16:09
         compiled from ".\templates\jsconst.tpl" */ ?>
<?php if ($_valid && !is_callable('content_4f42398a075b6')) {function content_4f42398a075b6($_smarty_tpl) {?><?php if (!is_callable('smarty_block_t')) include 'C:\\dev\\gitstack\\gitphp/include/smartyplugins\\block.t.php';
?>
<script type="text/javascript">

var GitPHP = GitPHP || {};

GitPHP.Resources = {
	Loading: "<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array('escape'=>'js')); $_block_repeat=true; echo smarty_block_t(array('escape'=>'js'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Loading…<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array('escape'=>'js'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
",
	LoadingBlameData: "<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array('escape'=>'js')); $_block_repeat=true; echo smarty_block_t(array('escape'=>'js'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Loading blame data…<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array('escape'=>'js'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
",
	Snapshot: "<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array('escape'=>'js')); $_block_repeat=true; echo smarty_block_t(array('escape'=>'js'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
snapshot<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array('escape'=>'js'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
",
	NoMatchesFound: '<?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array('escape'=>'no')); $_block_repeat=true; echo smarty_block_t(array('escape'=>'no'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
No matches found for "%1"<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array('escape'=>'no'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
'
};

GitPHP.Snapshot = {

	Formats: {
		<?php  $_smarty_tpl->tpl_vars['extension'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['extension']->_loop = false;
 $_smarty_tpl->tpl_vars['format'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['snapshotformats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['extension']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['extension']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['extension']->key => $_smarty_tpl->tpl_vars['extension']->value){
$_smarty_tpl->tpl_vars['extension']->_loop = true;
 $_smarty_tpl->tpl_vars['format']->value = $_smarty_tpl->tpl_vars['extension']->key;
 $_smarty_tpl->tpl_vars['extension']->iteration++;
 $_smarty_tpl->tpl_vars['extension']->last = $_smarty_tpl->tpl_vars['extension']->iteration === $_smarty_tpl->tpl_vars['extension']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['formats']['last'] = $_smarty_tpl->tpl_vars['extension']->last;
?>
		"<?php echo $_smarty_tpl->tpl_vars['format']->value;?>
": "<?php echo $_smarty_tpl->tpl_vars['extension']->value;?>
"<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['formats']['last']){?>,<?php }?>
		<?php } ?>
	}

}
		
</script>
<?php }} ?>