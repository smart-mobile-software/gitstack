<?php /* Smarty version Smarty-3.1.7, created on 2012-02-20 13:22:12
         compiled from ".\templates\commit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:214394f424904530be3-61067396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'faf699f5a2872ce86a563d37797150031b7b3b77' => 
    array (
      0 => '.\\templates\\commit.tpl',
      1 => 1327762713,
      2 => 'file',
    ),
    'e0276046ddaab007aafc8c83d343afa407e1052c' => 
    array (
      0 => '.\\templates\\projectbase.tpl',
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
    '78dfd564017866b2a07d32220e5f711a454b3ecb' => 
    array (
      0 => '.\\templates\\nav.tpl',
      1 => 1327762713,
      2 => 'file',
    ),
    '8621d053279a5f25a6f5023ee092a9dce34a4fb1' => 
    array (
      0 => '.\\templates\\refbadges.tpl',
      1 => 1327762713,
      2 => 'file',
    ),
    '418ccc1808202e72d7c694db00a81db38041be41' => 
    array (
      0 => '.\\templates\\title.tpl',
      1 => 1327762713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214394f424904530be3-61067396',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'version' => 0,
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
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f4249055c14b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f4249055c14b')) {function content_4f4249055c14b($_smarty_tpl) {?><?php if (!is_callable('smarty_block_t')) include 'C:\\dev\\gitstack\\gitphp/include/smartyplugins\\block.t.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\\dev\\gitstack\\gitphp\\lib\\smarty\\libs\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_buglink')) include 'C:\\dev\\gitstack\\gitphp/include/smartyplugins\\modifier.buglink.php';
if (!is_callable('smarty_function_cycle')) include 'C:\\dev\\gitstack\\gitphp\\lib\\smarty\\libs\\plugins\\function.cycle.php';
?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <!-- gitphp web interface <?php echo $_smarty_tpl->tpl_vars['version']->value;?>
, (C) 2006-2011 Christopher Han <xiphux@gmail.com> -->
  <head>
    <title>
    
<?php echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
 :: <?php echo $_smarty_tpl->tpl_vars['project']->value->GetProject();?>
<?php if ($_smarty_tpl->tpl_vars['actionlocal']->value){?>/<?php echo $_smarty_tpl->tpl_vars['actionlocal']->value;?>
<?php }?>

    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    
  <link rel="alternate" title="<?php echo $_smarty_tpl->tpl_vars['project']->value->GetProject();?>
 log (Atom)" href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=atom" type="application/atom+xml" />
  <link rel="alternate" title="<?php echo $_smarty_tpl->tpl_vars['project']->value->GetProject();?>
 log (RSS)" href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=rss" type="application/rss+xml" />

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('jsconst.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0, '214394f424904530be3-61067396');
content_4f42490460f4a($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "jsconst.tpl" */?>
    <script type="text/javascript">
    var GitPHPJSPaths = {
	<?php if ($_smarty_tpl->tpl_vars['googlejs']->value){?>
		jquery: 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min'
	<?php }else{ ?>
		jquery: 'ext/jquery-1.7.1.min'
	<?php }?>
    };
    
    <?php if (file_exists('js/common.min.js')){?>
    GitPHPJSPaths.common = "common.min";
    <?php }?>
    

    var GitPHPJSModules = null;
    
    GitPHPJSModules = ['common'];
    

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
  <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=summary"><?php echo $_smarty_tpl->tpl_vars['project']->value->GetProject();?>
</a>
  <?php if ($_smarty_tpl->tpl_vars['actionlocal']->value){?>
     / <?php echo $_smarty_tpl->tpl_vars['actionlocal']->value;?>

  <?php }?>
  <?php if ($_smarty_tpl->tpl_vars['enablesearch']->value){?>
    <form method="get" action="index.php" enctype="application/x-www-form-urlencoded">
      <div class="search">
        <input type="hidden" name="p" value="<?php echo $_smarty_tpl->tpl_vars['project']->value->GetProject();?>
" />
        <input type="hidden" name="a" value="search" />
        <input type ="hidden" name="h" value="<?php if ($_smarty_tpl->tpl_vars['commit']->value){?><?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
<?php }else{ ?>HEAD<?php }?>" />
        <select name="st">
          <option <?php if ($_smarty_tpl->tpl_vars['searchtype']->value=='commit'){?>selected="selected"<?php }?> value="commit"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
commit<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</option>
          <option <?php if ($_smarty_tpl->tpl_vars['searchtype']->value=='author'){?>selected="selected"<?php }?> value="author"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
author<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</option>
          <option <?php if ($_smarty_tpl->tpl_vars['searchtype']->value=='committer'){?>selected="selected"<?php }?> value="committer"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
committer<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</option>
          <?php if ($_smarty_tpl->tpl_vars['filesearch']->value){?>
            <option <?php if ($_smarty_tpl->tpl_vars['searchtype']->value=='file'){?>selected="selected"<?php }?> value="file"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</option>
          <?php }?>
        </select> <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
search<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
: <input type="text" name="s" <?php if ($_smarty_tpl->tpl_vars['search']->value){?>value="<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
"<?php }?> />
      </div>
    </form>
  <?php }?>

    </div>


 <div class="page_nav">
   <?php /*  Call merged included template "nav.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('logcommit'=>$_smarty_tpl->tpl_vars['commit']->value,'treecommit'=>$_smarty_tpl->tpl_vars['commit']->value,'current'=>'commit'), 0, '214394f424904530be3-61067396');
content_4f4249048066e($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "nav.tpl" */?>
   <br /><br />
 </div>

<?php if ($_smarty_tpl->tpl_vars['commit']->value->GetParent()){?>
 	<?php /*  Call merged included template "title.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('title.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('titlecommit'=>$_smarty_tpl->tpl_vars['commit']->value,'target'=>'commitdiff'), 0, '214394f424904530be3-61067396');
content_4f42490499350($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "title.tpl" */?>
<?php }else{ ?>
	<?php /*  Call merged included template "title.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('title.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('titlecommit'=>$_smarty_tpl->tpl_vars['commit']->value,'titletree'=>$_smarty_tpl->tpl_vars['tree']->value,'target'=>'tree'), 0, '214394f424904530be3-61067396');
content_4f42490499350($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "title.tpl" */?>
<?php }?>
 
 <div class="title_text">
   
   <table cellspacing="0">
     <tr>
       <td><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
author<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</td>
       <td><?php echo $_smarty_tpl->tpl_vars['commit']->value->GetAuthorName();?>
</td>
     </tr>
     <tr>
       <td></td>
       <td> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['commit']->value->GetAuthorEpoch(),"%a, %d %b %Y %H:%M:%S %z");?>
 
       <?php $_smarty_tpl->tpl_vars['hourlocal'] = new Smarty_variable(smarty_modifier_date_format($_smarty_tpl->tpl_vars['commit']->value->GetAuthorLocalEpoch(),"%H"), null, 0);?>
       <?php if ($_smarty_tpl->tpl_vars['hourlocal']->value<6){?>
       (<span class="latenight"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['commit']->value->GetAuthorLocalEpoch(),"%R");?>
</span> <?php echo $_smarty_tpl->tpl_vars['commit']->value->GetAuthorTimezone();?>
)</td>
       <?php }else{ ?>
       (<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['commit']->value->GetAuthorLocalEpoch(),"%R");?>
 <?php echo $_smarty_tpl->tpl_vars['commit']->value->GetAuthorTimezone();?>
)</td>
       <?php }?>
     </tr>
     <tr>
       <td><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
committer<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</td>
       <td><?php echo $_smarty_tpl->tpl_vars['commit']->value->GetCommitterName();?>
</td>
     </tr>
     <tr>
       <td></td>
       <td> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['commit']->value->GetCommitterEpoch(),"%a, %d %b %Y %H:%M:%S %z");?>
 (<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['commit']->value->GetCommitterLocalEpoch(),"%R");?>
 <?php echo $_smarty_tpl->tpl_vars['commit']->value->GetCommitterTimezone();?>
)</td>
     </tr>
     <tr>
       <td><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
commit<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</td>
       <td class="monospace"><?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
</td>
     </tr>
     <tr>
       <td><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tree<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</td>
       <td class="monospace"><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=tree&amp;h=<?php echo $_smarty_tpl->tpl_vars['tree']->value->GetHash();?>
&amp;hb=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
" class="list"><?php echo $_smarty_tpl->tpl_vars['tree']->value->GetHash();?>
</a></td>
       <td class="link"><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=tree&amp;h=<?php echo $_smarty_tpl->tpl_vars['tree']->value->GetHash();?>
&amp;hb=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tree<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=snapshot&amp;h=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
" class="snapshotTip"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
snapshot<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></td>
     </tr>
     <?php  $_smarty_tpl->tpl_vars['par'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['par']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commit']->value->GetParents(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['par']->key => $_smarty_tpl->tpl_vars['par']->value){
$_smarty_tpl->tpl_vars['par']->_loop = true;
?>
       <tr>
         <td><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
parent<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</td>
	 <td class="monospace"><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=commit&amp;h=<?php echo $_smarty_tpl->tpl_vars['par']->value->GetHash();?>
" class="list"><?php echo $_smarty_tpl->tpl_vars['par']->value->GetHash();?>
</a></td>
         <td class="link"><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=commit&amp;h=<?php echo $_smarty_tpl->tpl_vars['par']->value->GetHash();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
commit<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=commitdiff&amp;h=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;hp=<?php echo $_smarty_tpl->tpl_vars['par']->value->GetHash();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
commitdiff<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></td>
       </tr>
     <?php } ?>
   </table>
 </div>
 <div class="page_body">
   <?php $_smarty_tpl->tpl_vars['bugpattern'] = new Smarty_variable($_smarty_tpl->tpl_vars['project']->value->GetBugPattern(), null, 0);?>
   <?php $_smarty_tpl->tpl_vars['bugurl'] = new Smarty_variable($_smarty_tpl->tpl_vars['project']->value->GetBugUrl(), null, 0);?>
   <?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['line']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commit']->value->GetComment(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value){
$_smarty_tpl->tpl_vars['line']->_loop = true;
?>
     <?php if (strncasecmp(trim($_smarty_tpl->tpl_vars['line']->value),'Signed-off-by:',14)==0){?>
     <span class="signedOffBy"><?php echo smarty_modifier_buglink(htmlspecialchars($_smarty_tpl->tpl_vars['line']->value),$_smarty_tpl->tpl_vars['bugpattern']->value,$_smarty_tpl->tpl_vars['bugurl']->value);?>
</span>
     <?php }else{ ?>
     <?php echo smarty_modifier_buglink(htmlspecialchars($_smarty_tpl->tpl_vars['line']->value),$_smarty_tpl->tpl_vars['bugpattern']->value,$_smarty_tpl->tpl_vars['bugurl']->value);?>

     <?php }?>
     <br />
   <?php } ?>
 </div>
 <div class="list_head">
   <?php if ($_smarty_tpl->tpl_vars['treediff']->value->Count()>10){?>
     <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array('count'=>$_smarty_tpl->tpl_vars['treediff']->value->Count(),1=>$_smarty_tpl->tpl_vars['treediff']->value->Count(),'plural'=>"%1 files changed:")); $_block_repeat=true; echo smarty_block_t(array('count'=>$_smarty_tpl->tpl_vars['treediff']->value->Count(),1=>$_smarty_tpl->tpl_vars['treediff']->value->Count(),'plural'=>"%1 files changed:"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
%1 file changed:<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array('count'=>$_smarty_tpl->tpl_vars['treediff']->value->Count(),1=>$_smarty_tpl->tpl_vars['treediff']->value->Count(),'plural'=>"%1 files changed:"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

   <?php }?>
 </div>
 <table cellspacing="0">
   
   <?php  $_smarty_tpl->tpl_vars['diffline'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['diffline']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['treediff']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['diffline']->key => $_smarty_tpl->tpl_vars['diffline']->value){
$_smarty_tpl->tpl_vars['diffline']->_loop = true;
?>
     <tr class="<?php echo smarty_function_cycle(array('values'=>"light,dark"),$_smarty_tpl);?>
">
	 
       <?php if ($_smarty_tpl->tpl_vars['diffline']->value->GetStatus()=="A"){?>
         <td>
	   <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blob&amp;h=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToHash();?>
&amp;hb=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;f=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetFromFile();?>
" class="list">
	     <?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetFromFile();?>

	   </a>
	 </td>
         <td>
	   <span class="newfile">
	     <?php $_smarty_tpl->tpl_vars['localtotype'] = new Smarty_variable($_smarty_tpl->tpl_vars['diffline']->value->GetToFileType(1), null, 0);?>
	     [
	     <?php if ($_smarty_tpl->tpl_vars['diffline']->value->ToFileIsRegular()){?>
	       <?php $_smarty_tpl->tpl_vars['tomode'] = new Smarty_variable($_smarty_tpl->tpl_vars['diffline']->value->GetToModeShort(), null, 0);?>
	       <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array(1=>$_smarty_tpl->tpl_vars['localtotype']->value,2=>$_smarty_tpl->tpl_vars['tomode']->value)); $_block_repeat=true; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['localtotype']->value,2=>$_smarty_tpl->tpl_vars['tomode']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
new %1 with mode %2<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['localtotype']->value,2=>$_smarty_tpl->tpl_vars['tomode']->value), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

	     <?php }else{ ?>
	     <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array(1=>$_smarty_tpl->tpl_vars['localtotype']->value)); $_block_repeat=true; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['localtotype']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
new %1<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['localtotype']->value), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

	     <?php }?>
	     ]
	   </span>
	 </td>
         <td class="link">
	   <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blob&amp;h=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToHash();?>
&amp;hb=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;f=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetFromFile();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
blob<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
	    | 
	   <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blob_plain&amp;h=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToHash();?>
&amp;f=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetFromFile();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
plain<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
	 </td>
       <?php }elseif($_smarty_tpl->tpl_vars['diffline']->value->GetStatus()=="D"){?>
         <?php $_smarty_tpl->tpl_vars['parent'] = new Smarty_variable($_smarty_tpl->tpl_vars['commit']->value->GetParent(), null, 0);?>
         <td>
	   <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blob&amp;h=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetFromHash();?>
&amp;hb=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;f=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetFromFile();?>
" class="list">
	     <?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetFromFile();?>

	   </a>
	 </td>
         <td>
	   <span class="deletedfile">
	     <?php $_smarty_tpl->tpl_vars['localfromtype'] = new Smarty_variable($_smarty_tpl->tpl_vars['diffline']->value->GetFromFileType(1), null, 0);?>
	     [ <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array(1=>$_smarty_tpl->tpl_vars['localfromtype']->value)); $_block_repeat=true; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['localfromtype']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
deleted %1<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['localfromtype']->value), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 ]
	   </span>
	 </td>
         <td class="link">
	   <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blob&amp;h=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetFromHash();?>
&amp;hb=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;f=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetFromFile();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
blob<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
	    | 
	   <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=history&amp;h=<?php echo $_smarty_tpl->tpl_vars['parent']->value->GetHash();?>
&amp;f=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetFromFile();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
history<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
	    | 
	   <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blob_plain&amp;h=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetFromHash();?>
&amp;f=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetFromFile();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
plain<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
	 </td>
       <?php }elseif($_smarty_tpl->tpl_vars['diffline']->value->GetStatus()=="M"||$_smarty_tpl->tpl_vars['diffline']->value->GetStatus()=="T"){?>
         <td>
           <?php if ($_smarty_tpl->tpl_vars['diffline']->value->GetToHash()!=$_smarty_tpl->tpl_vars['diffline']->value->GetFromHash()){?>
             <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blobdiff&amp;h=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToHash();?>
&amp;hp=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetFromHash();?>
&amp;hb=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;f=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToFile();?>
" class="list">
	       <?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToFile();?>

	     </a>
           <?php }else{ ?>
             <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blob&amp;h=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToHash();?>
&amp;hb=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;f=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToFile();?>
" class="list">
	       <?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToFile();?>

	     </a>
           <?php }?>
         </td>
         <td>
	   <?php if ($_smarty_tpl->tpl_vars['diffline']->value->GetFromMode()!=$_smarty_tpl->tpl_vars['diffline']->value->GetToMode()){?>
	     <span class="changedfile">
	       [
	       <?php if ($_smarty_tpl->tpl_vars['diffline']->value->FileTypeChanged()){?>
	     	 <?php $_smarty_tpl->tpl_vars['localfromtype'] = new Smarty_variable($_smarty_tpl->tpl_vars['diffline']->value->GetFromFileType(1), null, 0);?>
	     	 <?php $_smarty_tpl->tpl_vars['localtotype'] = new Smarty_variable($_smarty_tpl->tpl_vars['diffline']->value->GetToFileType(1), null, 0);?>
	         <?php if ($_smarty_tpl->tpl_vars['diffline']->value->FileModeChanged()){?>
		   <?php if ($_smarty_tpl->tpl_vars['diffline']->value->FromFileIsRegular()&&$_smarty_tpl->tpl_vars['diffline']->value->ToFileIsRegular()){?>
		     <?php $_smarty_tpl->tpl_vars['frommode'] = new Smarty_variable($_smarty_tpl->tpl_vars['diffline']->value->GetFromModeShort(), null, 0);?>
		     <?php $_smarty_tpl->tpl_vars['tomode'] = new Smarty_variable($_smarty_tpl->tpl_vars['diffline']->value->GetToModeShort(), null, 0);?>
		     <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array(1=>$_smarty_tpl->tpl_vars['localfromtype']->value,2=>$_smarty_tpl->tpl_vars['localtotype']->value,3=>$_smarty_tpl->tpl_vars['frommode']->value,4=>$_smarty_tpl->tpl_vars['tomode']->value)); $_block_repeat=true; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['localfromtype']->value,2=>$_smarty_tpl->tpl_vars['localtotype']->value,3=>$_smarty_tpl->tpl_vars['frommode']->value,4=>$_smarty_tpl->tpl_vars['tomode']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
changed from %1 to %2 mode: %3 -> %4<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['localfromtype']->value,2=>$_smarty_tpl->tpl_vars['localtotype']->value,3=>$_smarty_tpl->tpl_vars['frommode']->value,4=>$_smarty_tpl->tpl_vars['tomode']->value), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		   <?php }elseif($_smarty_tpl->tpl_vars['diffline']->value->ToFileIsRegular()){?>
		     <?php $_smarty_tpl->tpl_vars['tomode'] = new Smarty_variable($_smarty_tpl->tpl_vars['diffline']->value->GetToModeShort(), null, 0);?>
		     <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array(1=>$_smarty_tpl->tpl_vars['localfromtype']->value,2=>$_smarty_tpl->tpl_vars['localtotype']->value,3=>$_smarty_tpl->tpl_vars['tomode']->value)); $_block_repeat=true; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['localfromtype']->value,2=>$_smarty_tpl->tpl_vars['localtotype']->value,3=>$_smarty_tpl->tpl_vars['tomode']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
changed from %1 to %2 mode: %3<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['localfromtype']->value,2=>$_smarty_tpl->tpl_vars['localtotype']->value,3=>$_smarty_tpl->tpl_vars['tomode']->value), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		   <?php }else{ ?>
		     <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array(1=>$_smarty_tpl->tpl_vars['localfromtype']->value,2=>$_smarty_tpl->tpl_vars['localtotype']->value)); $_block_repeat=true; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['localfromtype']->value,2=>$_smarty_tpl->tpl_vars['localtotype']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
changed from %1 to %2<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['localfromtype']->value,2=>$_smarty_tpl->tpl_vars['localtotype']->value), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		   <?php }?>
		 <?php }else{ ?>
		   <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array(1=>$_smarty_tpl->tpl_vars['localfromtype']->value,2=>$_smarty_tpl->tpl_vars['localtotype']->value)); $_block_repeat=true; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['localfromtype']->value,2=>$_smarty_tpl->tpl_vars['localtotype']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
changed from %1 to %2<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['localfromtype']->value,2=>$_smarty_tpl->tpl_vars['localtotype']->value), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		 <?php }?>
	       <?php }else{ ?>
	         <?php if ($_smarty_tpl->tpl_vars['diffline']->value->FileModeChanged()){?>
		   <?php if ($_smarty_tpl->tpl_vars['diffline']->value->FromFileIsRegular()&&$_smarty_tpl->tpl_vars['diffline']->value->ToFileIsRegular()){?>
		     <?php $_smarty_tpl->tpl_vars['frommode'] = new Smarty_variable($_smarty_tpl->tpl_vars['diffline']->value->GetFromModeShort(), null, 0);?>
		     <?php $_smarty_tpl->tpl_vars['tomode'] = new Smarty_variable($_smarty_tpl->tpl_vars['diffline']->value->GetToModeShort(), null, 0);?>
		     <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array(1=>$_smarty_tpl->tpl_vars['frommode']->value,2=>$_smarty_tpl->tpl_vars['tomode']->value)); $_block_repeat=true; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['frommode']->value,2=>$_smarty_tpl->tpl_vars['tomode']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
changed mode: %1 -> %2<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['frommode']->value,2=>$_smarty_tpl->tpl_vars['tomode']->value), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		   <?php }elseif($_smarty_tpl->tpl_vars['diffline']->value->ToFileIsRegular()){?>
		     <?php $_smarty_tpl->tpl_vars['tomode'] = new Smarty_variable($_smarty_tpl->tpl_vars['diffline']->value->GetToModeShort(), null, 0);?>
		     <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array(1=>$_smarty_tpl->tpl_vars['tomode']->value)); $_block_repeat=true; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['tomode']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
changed mode: %1<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(1=>$_smarty_tpl->tpl_vars['tomode']->value), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		   <?php }else{ ?>
		     <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
changed<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		   <?php }?>
		 <?php }else{ ?>
		   <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
changed<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		 <?php }?>
	       <?php }?>
	       ]
	     </span>
	   <?php }?>
	 </td>
         <td class="link">
           <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blob&amp;h=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToHash();?>
&amp;hb=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;f=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToFile();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
blob<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
	   <?php if ($_smarty_tpl->tpl_vars['diffline']->value->GetToHash()!=$_smarty_tpl->tpl_vars['diffline']->value->GetFromHash()){?>
	     | <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blobdiff&amp;h=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToHash();?>
&amp;hp=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetFromHash();?>
&amp;hb=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;f=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToFile();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
diff<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
	   <?php }?>
	     | <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=history&amp;h=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;f=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetFromFile();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
history<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
             | <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blob_plain&amp;h=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToHash();?>
&amp;f=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToFile();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
plain<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
	 </td>
       <?php }elseif($_smarty_tpl->tpl_vars['diffline']->value->GetStatus()=="R"){?>
         <td>
	   <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blob&amp;h=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToHash();?>
&amp;hb=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;f=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToFile();?>
" class="list">
	     <?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToFile();?>
</a>
	 </td>
         <td>
	   <span class="movedfile">
	     <?php $_smarty_tpl->_capture_stack[0][] = array('default', 'fromfilelink', null); ob_start(); ?>
	     <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blob&amp;h=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetFromHash();?>
&amp;hb=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;f=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetFromFile();?>
" class="list"><?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetFromFile();?>
</a>
	     <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	     [
	     <?php $_smarty_tpl->tpl_vars['similarity'] = new Smarty_variable($_smarty_tpl->tpl_vars['diffline']->value->GetSimilarity(), null, 0);?>
	     <?php if ($_smarty_tpl->tpl_vars['diffline']->value->GetFromMode()!=$_smarty_tpl->tpl_vars['diffline']->value->GetToMode()){?>
	       <?php $_smarty_tpl->tpl_vars['tomode'] = new Smarty_variable($_smarty_tpl->tpl_vars['diffline']->value->GetToModeShort(), null, 0);?>
	       <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array('escape'=>'no',1=>$_smarty_tpl->tpl_vars['fromfilelink']->value,2=>$_smarty_tpl->tpl_vars['similarity']->value,3=>$_smarty_tpl->tpl_vars['tomode']->value)); $_block_repeat=true; echo smarty_block_t(array('escape'=>'no',1=>$_smarty_tpl->tpl_vars['fromfilelink']->value,2=>$_smarty_tpl->tpl_vars['similarity']->value,3=>$_smarty_tpl->tpl_vars['tomode']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
moved from %1 with %2%% similarity, mode: %3<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array('escape'=>'no',1=>$_smarty_tpl->tpl_vars['fromfilelink']->value,2=>$_smarty_tpl->tpl_vars['similarity']->value,3=>$_smarty_tpl->tpl_vars['tomode']->value), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

	     <?php }else{ ?>
	       <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array('escape'=>'no',1=>$_smarty_tpl->tpl_vars['fromfilelink']->value,2=>$_smarty_tpl->tpl_vars['similarity']->value)); $_block_repeat=true; echo smarty_block_t(array('escape'=>'no',1=>$_smarty_tpl->tpl_vars['fromfilelink']->value,2=>$_smarty_tpl->tpl_vars['similarity']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
moved from %1 with %2%% similarity<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array('escape'=>'no',1=>$_smarty_tpl->tpl_vars['fromfilelink']->value,2=>$_smarty_tpl->tpl_vars['similarity']->value), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

	     <?php }?>
	     ]
	   </span>
	 </td>
         <td class="link">
	   <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blob&amp;h=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToHash();?>
&amp;hb=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;f=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToFile();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
blob<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
	   <?php if ($_smarty_tpl->tpl_vars['diffline']->value->GetToHash()!=$_smarty_tpl->tpl_vars['diffline']->value->GetFromHash()){?>
	     | <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blobdiff&amp;h=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToHash();?>
&amp;hp=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetFromHash();?>
&amp;hb=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;f=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToFile();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
diff<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
	   <?php }?>
	    | <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blob_plain&amp;h=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToHash();?>
&amp;f=<?php echo $_smarty_tpl->tpl_vars['diffline']->value->GetToFile();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
plain<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
	 </td>
       <?php }?>

     </tr>
   <?php } ?>
 </table>


    <div class="page_footer">
      
  <div class="page_footer_text">
  <?php if ($_smarty_tpl->tpl_vars['project']->value->GetWebsite()){?>
  <a href="<?php echo $_smarty_tpl->tpl_vars['project']->value->GetWebsite();?>
"><?php echo $_smarty_tpl->tpl_vars['project']->value->GetDescription();?>
</a>
  <?php }else{ ?>
  <?php echo $_smarty_tpl->tpl_vars['project']->value->GetDescription();?>

  <?php }?>
  </div>
  <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=rss" class="rss_logo"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
RSS<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
  <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=atom" class="rss_logo"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Atom<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>

    </div>
    <div class="attr_footer">
    	<a href="http://xiphux.com/programming/gitphp/" target="_blank">GitPHP by Chris Han</a>
    </div>
  </body>
</html>
<?php }} ?><?php /* Smarty version Smarty-3.1.7, created on 2012-02-20 13:22:12
         compiled from ".\templates\jsconst.tpl" */ ?>
<?php if ($_valid && !is_callable('content_4f42490460f4a')) {function content_4f42490460f4a($_smarty_tpl) {?><?php if (!is_callable('smarty_block_t')) include 'C:\\dev\\gitstack\\gitphp/include/smartyplugins\\block.t.php';
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
<?php }} ?><?php /* Smarty version Smarty-3.1.7, created on 2012-02-20 13:22:12
         compiled from ".\templates\nav.tpl" */ ?>
<?php if ($_valid && !is_callable('content_4f4249048066e')) {function content_4f4249048066e($_smarty_tpl) {?><?php if (!is_callable('smarty_block_t')) include 'C:\\dev\\gitstack\\gitphp/include/smartyplugins\\block.t.php';
?>

   <?php if ($_smarty_tpl->tpl_vars['current']->value=='summary'){?>
     <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
summary<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

   <?php }else{ ?>
     <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=summary"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
summary<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
   <?php }?>
   | 
   <?php if ($_smarty_tpl->tpl_vars['current']->value=='shortlog'||!$_smarty_tpl->tpl_vars['commit']->value){?>
     <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
shortlog<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

   <?php }else{ ?>
     <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=shortlog<?php if ($_smarty_tpl->tpl_vars['logcommit']->value){?>&amp;h=<?php echo $_smarty_tpl->tpl_vars['logcommit']->value->GetHash();?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['logmark']->value){?>&amp;m=<?php echo $_smarty_tpl->tpl_vars['logmark']->value->GetHash();?>
<?php }?>"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
shortlog<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
   <?php }?>
   | 
   <?php if ($_smarty_tpl->tpl_vars['current']->value=='log'||!$_smarty_tpl->tpl_vars['commit']->value){?>
     <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
log<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

   <?php }else{ ?>
     <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=log<?php if ($_smarty_tpl->tpl_vars['logcommit']->value){?>&amp;h=<?php echo $_smarty_tpl->tpl_vars['logcommit']->value->GetHash();?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['logmark']->value){?>&amp;m=<?php echo $_smarty_tpl->tpl_vars['logmark']->value->GetHash();?>
<?php }?>"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
log<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
   <?php }?>
   | 
   <?php if ($_smarty_tpl->tpl_vars['current']->value=='commit'||!$_smarty_tpl->tpl_vars['commit']->value){?>
     <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
commit<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

   <?php }else{ ?>
     <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=commit&amp;h=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
commit<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
   <?php }?>
   | 
   <?php if ($_smarty_tpl->tpl_vars['current']->value=='commitdiff'||!$_smarty_tpl->tpl_vars['commit']->value){?>
     <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
commitdiff<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

   <?php }else{ ?>
     <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=commitdiff&amp;h=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
commitdiff<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
   <?php }?>
   | 
   <?php if ($_smarty_tpl->tpl_vars['current']->value=='tree'||!$_smarty_tpl->tpl_vars['commit']->value){?>
     <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tree<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

   <?php }else{ ?>
     <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=tree<?php if ($_smarty_tpl->tpl_vars['treecommit']->value){?>&amp;hb=<?php echo $_smarty_tpl->tpl_vars['treecommit']->value->GetHash();?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['tree']->value){?>&amp;h=<?php echo $_smarty_tpl->tpl_vars['tree']->value->GetHash();?>
<?php }?>"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tree<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
   <?php }?>
<?php }} ?><?php /* Smarty version Smarty-3.1.7, created on 2012-02-20 13:22:12
         compiled from ".\templates\title.tpl" */ ?>
<?php if ($_valid && !is_callable('content_4f42490499350')) {function content_4f42490499350($_smarty_tpl) {?><?php if (!is_callable('smarty_block_t')) include 'C:\\dev\\gitstack\\gitphp/include/smartyplugins\\block.t.php';
?>

<div class="title">
	<?php if ($_smarty_tpl->tpl_vars['titlecommit']->value){?>
		<?php if ($_smarty_tpl->tpl_vars['target']->value=='commitdiff'){?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=commitdiff&amp;h=<?php echo $_smarty_tpl->tpl_vars['titlecommit']->value->GetHash();?>
" class="title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['titlecommit']->value->GetTitle(), ENT_QUOTES, 'UTF-8', true);?>
</a>
		<?php }elseif($_smarty_tpl->tpl_vars['target']->value=='tree'){?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=tree&amp;h=<?php echo $_smarty_tpl->tpl_vars['titletree']->value->GetHash();?>
&amp;hb=<?php echo $_smarty_tpl->tpl_vars['titlecommit']->value->GetHash();?>
" class="title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['titlecommit']->value->GetTitle(), ENT_QUOTES, 'UTF-8', true);?>
</a>
		<?php }else{ ?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=commit&amp;h=<?php echo $_smarty_tpl->tpl_vars['titlecommit']->value->GetHash();?>
" class="title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['titlecommit']->value->GetTitle(), ENT_QUOTES, 'UTF-8', true);?>
</a>
		<?php }?>
		<?php /*  Call merged included template "refbadges.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('refbadges.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('commit'=>$_smarty_tpl->tpl_vars['titlecommit']->value), 0, '214394f424904530be3-61067396');
content_4f424904a1466($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "refbadges.tpl" */?>
	<?php }else{ ?>
		<?php if ($_smarty_tpl->tpl_vars['target']->value=='summary'){?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=summary" class="title">&nbsp;</a>
		<?php }elseif($_smarty_tpl->tpl_vars['target']->value=='shortlog'){?>
			<?php if ($_smarty_tpl->tpl_vars['disablelink']->value){?>
			  <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
shortlog<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

			<?php }else{ ?>
			  <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=shortlog" class="title"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
shortlog<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
			<?php }?>
		<?php }elseif($_smarty_tpl->tpl_vars['target']->value=='tags'){?>
			<?php if ($_smarty_tpl->tpl_vars['disablelink']->value){?>
			  <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tags<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

			<?php }else{ ?>
			  <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=tags" class="title"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tags<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
			<?php }?>
		<?php }elseif($_smarty_tpl->tpl_vars['target']->value=='heads'){?>
			<?php if ($_smarty_tpl->tpl_vars['disablelink']->value){?>
			  <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
heads<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

			<?php }else{ ?>
			  <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=heads" class="title"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
heads<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
			<?php }?>
		<?php }else{ ?>
			&nbsp;
		<?php }?>
	<?php }?>
</div>
<?php }} ?><?php /* Smarty version Smarty-3.1.7, created on 2012-02-20 13:22:12
         compiled from ".\templates\refbadges.tpl" */ ?>
<?php if ($_valid && !is_callable('content_4f424904a1466')) {function content_4f424904a1466($_smarty_tpl) {?>

<span class="refs">
	<?php  $_smarty_tpl->tpl_vars['commithead'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['commithead']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commit']->value->GetHeads(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['commithead']->key => $_smarty_tpl->tpl_vars['commithead']->value){
$_smarty_tpl->tpl_vars['commithead']->_loop = true;
?>
		<span class="head">
			<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=shortlog&amp;h=refs/heads/<?php echo $_smarty_tpl->tpl_vars['commithead']->value->GetName();?>
"><?php echo $_smarty_tpl->tpl_vars['commithead']->value->GetName();?>
</a>
		</span>
	<?php } ?>
	<?php  $_smarty_tpl->tpl_vars['committag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['committag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commit']->value->GetTags(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['committag']->key => $_smarty_tpl->tpl_vars['committag']->value){
$_smarty_tpl->tpl_vars['committag']->_loop = true;
?>
		<span class="tag">
			<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=tag&amp;h=<?php echo $_smarty_tpl->tpl_vars['committag']->value->GetName();?>
" <?php if (!$_smarty_tpl->tpl_vars['committag']->value->LightTag()){?>class="tagTip"<?php }?>><?php echo $_smarty_tpl->tpl_vars['committag']->value->GetName();?>
</a>
		</span>
	<?php } ?>
</span>
<?php }} ?>