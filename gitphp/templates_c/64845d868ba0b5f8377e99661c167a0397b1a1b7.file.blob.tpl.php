<?php /* Smarty version Smarty-3.1.7, created on 2012-02-20 12:01:31
         compiled from ".\templates\blob.tpl" */ ?>
<?php /*%%SmartyHeaderCode:64634f42361ab4c8b2-32213109%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64845d868ba0b5f8377e99661c167a0397b1a1b7' => 
    array (
      0 => '.\\templates\\blob.tpl',
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
    '1415ef08094230f98c99c392ab838d49d2a55930' => 
    array (
      0 => '.\\templates\\path.tpl',
      1 => 1327762713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64634f42361ab4c8b2-32213109',
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
  'unifunc' => 'content_4f42361b56402',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f42361b56402')) {function content_4f42361b56402($_smarty_tpl) {?><?php if (!is_callable('smarty_block_t')) include 'C:\\dev\\gitstack\\gitphp/include/smartyplugins\\block.t.php';
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
    
<?php if ($_smarty_tpl->tpl_vars['geshicss']->value){?>
  <style type="text/css">
  <?php echo $_smarty_tpl->tpl_vars['geshicss']->value;?>

  </style>
<?php }?>

    <?php if ($_smarty_tpl->tpl_vars['javascript']->value){?>
    
    <script src="js/ext/require.js"></script>
    <?php /*  Call merged included template "jsconst.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('jsconst.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '64634f42361ab4c8b2-32213109');
content_4f42361ac3f1e($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "jsconst.tpl" */?>
    <script type="text/javascript">
    var GitPHPJSPaths = {
	<?php if ($_smarty_tpl->tpl_vars['googlejs']->value){?>
		jquery: 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min'
	<?php }else{ ?>
		jquery: 'ext/jquery-1.7.1.min'
	<?php }?>
    };
    
<?php if (file_exists('js/blob.min.js')){?>
GitPHPJSPaths.blob = "blob.min";
<?php }?>


    var GitPHPJSModules = null;
    
GitPHPJSModules = ['blob'];


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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('treecommit'=>$_smarty_tpl->tpl_vars['commit']->value), 0, '64634f42361ab4c8b2-32213109');
content_4f42361ae3c1b($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "nav.tpl" */?>
   <br />
   <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blob_plain&amp;h=<?php echo $_smarty_tpl->tpl_vars['blob']->value->GetHash();?>
&amp;f=<?php echo rawurlencode($_smarty_tpl->tpl_vars['blob']->value->GetPath());?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
plain<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a> | 
   <?php if (($_smarty_tpl->tpl_vars['commit']->value->GetHash()!=$_smarty_tpl->tpl_vars['head']->value->GetHash())&&($_smarty_tpl->tpl_vars['head']->value->PathToHash($_smarty_tpl->tpl_vars['blob']->value->GetPath()))){?>
     <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blob&amp;hb=HEAD&amp;f=<?php echo rawurlencode($_smarty_tpl->tpl_vars['blob']->value->GetPath());?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
HEAD<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
   <?php }else{ ?>
     <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
HEAD<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['blob']->value->GetPath()){?>
    | <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=history&amp;h=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;f=<?php echo rawurlencode($_smarty_tpl->tpl_vars['blob']->value->GetPath());?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
history<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
   <?php if (!$_smarty_tpl->tpl_vars['datatag']->value){?> | <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blame&amp;h=<?php echo $_smarty_tpl->tpl_vars['blob']->value->GetHash();?>
&amp;f=<?php echo rawurlencode($_smarty_tpl->tpl_vars['blob']->value->GetPath());?>
&amp;hb=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
" id="blameLink"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
blame<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a><?php }?>
   <?php }?>
   <br />
 </div>

 <?php /*  Call merged included template "title.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('title.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('titlecommit'=>$_smarty_tpl->tpl_vars['commit']->value), 0, '64634f42361ab4c8b2-32213109');
content_4f42361b15877($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "title.tpl" */?>

<?php /*  Call merged included template "path.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('path.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('pathobject'=>$_smarty_tpl->tpl_vars['blob']->value,'target'=>'blobplain'), 0, '64634f42361ab4c8b2-32213109');
content_4f42361b3685d($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "path.tpl" */?>

 <div class="page_body">
   <?php if ($_smarty_tpl->tpl_vars['datatag']->value){?>
     
     <div>
       <img src="data:<?php echo $_smarty_tpl->tpl_vars['mime']->value;?>
;base64,<?php echo $_smarty_tpl->tpl_vars['data']->value;?>
" />
     </div>
   <?php }elseif($_smarty_tpl->tpl_vars['geshi']->value){?>
     
     <?php echo $_smarty_tpl->tpl_vars['geshiout']->value;?>

   <?php }else{ ?>
     
<table class="code" id="blobData">
<tbody>
<tr class="li1">
<td class="ln">
<pre class="de1">
<?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['line']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bloblines']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['bloblines']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value){
$_smarty_tpl->tpl_vars['line']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['bloblines']['iteration']++;
?>
<a id="l<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['bloblines']['iteration'];?>
" href="#l<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['bloblines']['iteration'];?>
" class="linenr"><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['bloblines']['iteration'];?>
</a>
<?php } ?>
</pre></td>
<td class="de1">
<pre class="de1">
<?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['line']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bloblines']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['bloblines']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value){
$_smarty_tpl->tpl_vars['line']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['bloblines']['iteration']++;
?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value, ENT_QUOTES, 'UTF-8', true);?>

<?php } ?>
</pre>
</td>
</tr>
</tbody>
</table>
   <?php }?>
 </div>


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
<?php }} ?><?php /* Smarty version Smarty-3.1.7, created on 2012-02-20 12:01:31
         compiled from ".\templates\jsconst.tpl" */ ?>
<?php if ($_valid && !is_callable('content_4f42361ac3f1e')) {function content_4f42361ac3f1e($_smarty_tpl) {?><?php if (!is_callable('smarty_block_t')) include 'C:\\dev\\gitstack\\gitphp/include/smartyplugins\\block.t.php';
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
<?php }} ?><?php /* Smarty version Smarty-3.1.7, created on 2012-02-20 12:01:31
         compiled from ".\templates\nav.tpl" */ ?>
<?php if ($_valid && !is_callable('content_4f42361ae3c1b')) {function content_4f42361ae3c1b($_smarty_tpl) {?><?php if (!is_callable('smarty_block_t')) include 'C:\\dev\\gitstack\\gitphp/include/smartyplugins\\block.t.php';
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
<?php }} ?><?php /* Smarty version Smarty-3.1.7, created on 2012-02-20 12:01:31
         compiled from ".\templates\title.tpl" */ ?>
<?php if ($_valid && !is_callable('content_4f42361b15877')) {function content_4f42361b15877($_smarty_tpl) {?><?php if (!is_callable('smarty_block_t')) include 'C:\\dev\\gitstack\\gitphp/include/smartyplugins\\block.t.php';
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('refbadges.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('commit'=>$_smarty_tpl->tpl_vars['titlecommit']->value), 0, '64634f42361ab4c8b2-32213109');
content_4f42361b24622($_smarty_tpl);
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
<?php }} ?><?php /* Smarty version Smarty-3.1.7, created on 2012-02-20 12:01:31
         compiled from ".\templates\refbadges.tpl" */ ?>
<?php if ($_valid && !is_callable('content_4f42361b24622')) {function content_4f42361b24622($_smarty_tpl) {?>

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
<?php }} ?><?php /* Smarty version Smarty-3.1.7, created on 2012-02-20 12:01:32
         compiled from ".\templates\path.tpl" */ ?>
<?php if ($_valid && !is_callable('content_4f42361b3685d')) {function content_4f42361b3685d($_smarty_tpl) {?>
<div class="page_path">
	<?php if ($_smarty_tpl->tpl_vars['pathobject']->value){?>
		<?php $_smarty_tpl->tpl_vars['pathobjectcommit'] = new Smarty_variable($_smarty_tpl->tpl_vars['pathobject']->value->GetCommit(), null, 0);?>
		<?php $_smarty_tpl->tpl_vars['pathobjecttree'] = new Smarty_variable($_smarty_tpl->tpl_vars['pathobjectcommit']->value->GetTree(), null, 0);?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=tree&amp;hb=<?php echo $_smarty_tpl->tpl_vars['pathobjectcommit']->value->GetHash();?>
&amp;h=<?php echo $_smarty_tpl->tpl_vars['pathobjecttree']->value->GetHash();?>
"><strong>[<?php echo $_smarty_tpl->tpl_vars['project']->value->GetProject();?>
]</strong></a> / 
		<?php  $_smarty_tpl->tpl_vars['pathtreepiece'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pathtreepiece']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pathobject']->value->GetPathTree(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pathtreepiece']->key => $_smarty_tpl->tpl_vars['pathtreepiece']->value){
$_smarty_tpl->tpl_vars['pathtreepiece']->_loop = true;
?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=tree&amp;hb=<?php echo $_smarty_tpl->tpl_vars['pathobjectcommit']->value->GetHash();?>
&amp;h=<?php echo $_smarty_tpl->tpl_vars['pathtreepiece']->value->GetHash();?>
&amp;f=<?php echo rawurlencode($_smarty_tpl->tpl_vars['pathtreepiece']->value->GetPath());?>
"><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pathtreepiece']->value->GetName(), ENT_QUOTES, 'UTF-8', true);?>
</strong></a> / 
		<?php } ?>
		<?php if ($_smarty_tpl->tpl_vars['pathobject']->value instanceof GitPHP_Blob){?>
			<?php if ($_smarty_tpl->tpl_vars['target']->value=='blobplain'){?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blob_plain&amp;h=<?php echo $_smarty_tpl->tpl_vars['pathobject']->value->GetHash();?>
&amp;hb=<?php echo $_smarty_tpl->tpl_vars['pathobjectcommit']->value->GetHash();?>
&amp;f=<?php echo rawurlencode($_smarty_tpl->tpl_vars['pathobject']->value->GetPath());?>
"><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pathobject']->value->GetName(), ENT_QUOTES, 'UTF-8', true);?>
</strong></a>
			<?php }elseif($_smarty_tpl->tpl_vars['target']->value=='blob'){?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=blob&amp;h=<?php echo $_smarty_tpl->tpl_vars['pathobject']->value->GetHash();?>
&amp;hb=<?php echo $_smarty_tpl->tpl_vars['pathobjectcommit']->value->GetHash();?>
&amp;f=<?php echo rawurlencode($_smarty_tpl->tpl_vars['pathobject']->value->GetPath());?>
"><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pathobject']->value->GetName(), ENT_QUOTES, 'UTF-8', true);?>
</strong></a>
			<?php }else{ ?>
				<strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pathobject']->value->GetName(), ENT_QUOTES, 'UTF-8', true);?>
</strong>
			<?php }?>
		<?php }elseif($_smarty_tpl->tpl_vars['pathobject']->value->GetName()){?>
			<?php if ($_smarty_tpl->tpl_vars['target']->value=='tree'){?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=tree&amp;hb=<?php echo $_smarty_tpl->tpl_vars['pathobjectcommit']->value->GetHash();?>
&amp;h=<?php echo $_smarty_tpl->tpl_vars['pathobject']->value->GetHash();?>
&amp;f=<?php echo rawurlencode($_smarty_tpl->tpl_vars['pathobject']->value->GetPath());?>
"><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pathobject']->value->GetName(), ENT_QUOTES, 'UTF-8', true);?>
</strong></a> / 
			<?php }else{ ?>
				<strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pathobject']->value->GetName(), ENT_QUOTES, 'UTF-8', true);?>
</strong> / 
			<?php }?>
		<?php }?>
	<?php }else{ ?>
		&nbsp;
	<?php }?>
</div>
<?php }} ?>