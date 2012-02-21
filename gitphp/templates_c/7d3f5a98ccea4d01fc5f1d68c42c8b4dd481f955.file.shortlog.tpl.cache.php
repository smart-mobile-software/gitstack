<?php /* Smarty version Smarty-3.1.7, created on 2012-02-20 13:22:26
         compiled from ".\templates\shortlog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:260144f4249126a2ac9-83168918%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d3f5a98ccea4d01fc5f1d68c42c8b4dd481f955' => 
    array (
      0 => '.\\templates\\shortlog.tpl',
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
    'd6c7688ba8053ef761e0ef9d42b1edf76c98e53a' => 
    array (
      0 => '.\\templates\\shortloglist.tpl',
      1 => 1327762713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '260144f4249126a2ac9-83168918',
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
  'unifunc' => 'content_4f4249131cb7c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f4249131cb7c')) {function content_4f4249131cb7c($_smarty_tpl) {?><?php if (!is_callable('smarty_block_t')) include 'C:\\dev\\gitstack\\gitphp/include/smartyplugins\\block.t.php';
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('jsconst.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0, '260144f4249126a2ac9-83168918');
content_4f42491279191($_smarty_tpl);
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('current'=>'shortlog','logcommit'=>$_smarty_tpl->tpl_vars['commit']->value,'treecommit'=>$_smarty_tpl->tpl_vars['commit']->value,'logmark'=>$_smarty_tpl->tpl_vars['mark']->value), 0, '260144f4249126a2ac9-83168918');
content_4f42491296e65($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "nav.tpl" */?>
   <br />
   <?php if (($_smarty_tpl->tpl_vars['commit']->value&&$_smarty_tpl->tpl_vars['head']->value)&&(($_smarty_tpl->tpl_vars['commit']->value->GetHash()!=$_smarty_tpl->tpl_vars['head']->value->GetHash())||($_smarty_tpl->tpl_vars['page']->value>0))){?>
     <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=shortlog<?php if ($_smarty_tpl->tpl_vars['mark']->value){?>&amp;m=<?php echo $_smarty_tpl->tpl_vars['mark']->value->GetHash();?>
<?php }?>"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
HEAD<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
   <?php }else{ ?>
     <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
HEAD<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

   <?php }?>
     &sdot; 
   <?php if ($_smarty_tpl->tpl_vars['page']->value>0){?>
     <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=shortlog&amp;h=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;pg=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
<?php if ($_smarty_tpl->tpl_vars['mark']->value){?>&amp;m=<?php echo $_smarty_tpl->tpl_vars['mark']->value->GetHash();?>
<?php }?>" accesskey="p" title="Alt-p"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
prev<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
   <?php }else{ ?>
     <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
prev<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

   <?php }?>
     &sdot; 
   <?php if ($_smarty_tpl->tpl_vars['hasmorerevs']->value){?>
     <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=shortlog&amp;h=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;pg=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
<?php if ($_smarty_tpl->tpl_vars['mark']->value){?>&amp;m=<?php echo $_smarty_tpl->tpl_vars['mark']->value->GetHash();?>
<?php }?>" accesskey="n" title="Alt-n"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
next<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
   <?php }else{ ?>
     <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
next<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

   <?php }?>
   <br />
   <?php if ($_smarty_tpl->tpl_vars['mark']->value){?>
     <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
selected<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 &sdot;
     <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=commit&amp;h=<?php echo $_smarty_tpl->tpl_vars['mark']->value->GetHash();?>
" class="list commitTip" <?php if (strlen($_smarty_tpl->tpl_vars['mark']->value->GetTitle())>30){?>title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mark']->value->GetTitle());?>
"<?php }?>><strong><?php echo $_smarty_tpl->tpl_vars['mark']->value->GetTitle(30);?>
</strong></a>
     &sdot;
     <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=shortlog&amp;h=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;pg=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
deselect<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
     <br />
   <?php }?>
 </div>

 <?php /*  Call merged included template "title.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('title.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('target'=>'summary'), 0, '260144f4249126a2ac9-83168918');
content_4f424912bf9cb($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "title.tpl" */?>

 <?php /*  Call merged included template "shortloglist.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('shortloglist.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('source'=>'shortlog'), 0, '260144f4249126a2ac9-83168918');
content_4f424912e1c46($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "shortloglist.tpl" */?>


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
<?php }} ?><?php /* Smarty version Smarty-3.1.7, created on 2012-02-20 13:22:26
         compiled from ".\templates\jsconst.tpl" */ ?>
<?php if ($_valid && !is_callable('content_4f42491279191')) {function content_4f42491279191($_smarty_tpl) {?><?php if (!is_callable('smarty_block_t')) include 'C:\\dev\\gitstack\\gitphp/include/smartyplugins\\block.t.php';
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
<?php }} ?><?php /* Smarty version Smarty-3.1.7, created on 2012-02-20 13:22:26
         compiled from ".\templates\nav.tpl" */ ?>
<?php if ($_valid && !is_callable('content_4f42491296e65')) {function content_4f42491296e65($_smarty_tpl) {?><?php if (!is_callable('smarty_block_t')) include 'C:\\dev\\gitstack\\gitphp/include/smartyplugins\\block.t.php';
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
<?php }} ?><?php /* Smarty version Smarty-3.1.7, created on 2012-02-20 13:22:26
         compiled from ".\templates\title.tpl" */ ?>
<?php if ($_valid && !is_callable('content_4f424912bf9cb')) {function content_4f424912bf9cb($_smarty_tpl) {?><?php if (!is_callable('smarty_block_t')) include 'C:\\dev\\gitstack\\gitphp/include/smartyplugins\\block.t.php';
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('refbadges.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('commit'=>$_smarty_tpl->tpl_vars['titlecommit']->value), 0, '260144f4249126a2ac9-83168918');
content_4f424912c7635($_smarty_tpl);
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
<?php }} ?><?php /* Smarty version Smarty-3.1.7, created on 2012-02-20 13:22:26
         compiled from ".\templates\refbadges.tpl" */ ?>
<?php if ($_valid && !is_callable('content_4f424912c7635')) {function content_4f424912c7635($_smarty_tpl) {?>

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
<?php }} ?><?php /* Smarty version Smarty-3.1.7, created on 2012-02-20 13:22:26
         compiled from ".\templates\shortloglist.tpl" */ ?>
<?php if ($_valid && !is_callable('content_4f424912e1c46')) {function content_4f424912e1c46($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'C:\\dev\\gitstack\\gitphp\\lib\\smarty\\libs\\plugins\\function.cycle.php';
if (!is_callable('smarty_modifier_agestring')) include 'C:\\dev\\gitstack\\gitphp/include/smartyplugins\\modifier.agestring.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\\dev\\gitstack\\gitphp\\lib\\smarty\\libs\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_block_t')) include 'C:\\dev\\gitstack\\gitphp/include/smartyplugins\\block.t.php';
?>

 <table cellspacing="0">
   <?php  $_smarty_tpl->tpl_vars['rev'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rev']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['revlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rev']->key => $_smarty_tpl->tpl_vars['rev']->value){
$_smarty_tpl->tpl_vars['rev']->_loop = true;
?>
     <tr class="<?php echo smarty_function_cycle(array('values'=>"light,dark"),$_smarty_tpl);?>
">
       <td class="monospace"><?php echo $_smarty_tpl->tpl_vars['rev']->value->GetHash(true);?>
</td>
       <td title="<?php if ($_smarty_tpl->tpl_vars['rev']->value->GetAge()>60*60*24*7*2){?><?php echo smarty_modifier_agestring($_smarty_tpl->tpl_vars['rev']->value->GetAge());?>
<?php }else{ ?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['rev']->value->GetCommitterEpoch(),"%Y-%m-%d");?>
<?php }?>"><em><?php if ($_smarty_tpl->tpl_vars['rev']->value->GetAge()>60*60*24*7*2){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['rev']->value->GetCommitterEpoch(),"%Y-%m-%d");?>
<?php }else{ ?><?php echo smarty_modifier_agestring($_smarty_tpl->tpl_vars['rev']->value->GetAge());?>
<?php }?></em></td>
       <td><em><?php echo $_smarty_tpl->tpl_vars['rev']->value->GetAuthorName();?>
</em></td>
       <td>
         <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=commit&amp;h=<?php echo $_smarty_tpl->tpl_vars['rev']->value->GetHash();?>
" class="list commitTip" <?php if (strlen($_smarty_tpl->tpl_vars['rev']->value->GetTitle())>50){?>title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value->GetTitle());?>
"<?php }?>>
         <?php if ($_smarty_tpl->tpl_vars['rev']->value->IsMergeCommit()){?><span class="merge_title"><?php }else{ ?><span class="commit_title"><?php }?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rev']->value->GetTitle(50), ENT_QUOTES, 'UTF-8', true);?>
</span>
         </a>
	 <?php /*  Call merged included template "refbadges.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('refbadges.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('commit'=>$_smarty_tpl->tpl_vars['rev']->value), 0, '260144f4249126a2ac9-83168918');
content_4f424912c7635($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "refbadges.tpl" */?>
       </td>
       <td class="link">
         <?php $_smarty_tpl->tpl_vars['revtree'] = new Smarty_variable($_smarty_tpl->tpl_vars['rev']->value->GetTree(), null, 0);?>
         <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=commit&amp;h=<?php echo $_smarty_tpl->tpl_vars['rev']->value->GetHash();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
commit<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=commitdiff&amp;h=<?php echo $_smarty_tpl->tpl_vars['rev']->value->GetHash();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
commitdiff<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=tree&amp;h=<?php echo $_smarty_tpl->tpl_vars['revtree']->value->GetHash();?>
&amp;hb=<?php echo $_smarty_tpl->tpl_vars['rev']->value->GetHash();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tree<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=snapshot&amp;h=<?php echo $_smarty_tpl->tpl_vars['rev']->value->GetHash();?>
" class="snapshotTip"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
snapshot<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
	 <?php if ($_smarty_tpl->tpl_vars['source']->value=='shortlog'){?>
	  | 
	  <?php if ($_smarty_tpl->tpl_vars['mark']->value){?>
	    <?php if ($_smarty_tpl->tpl_vars['mark']->value->GetHash()==$_smarty_tpl->tpl_vars['rev']->value->GetHash()){?>
	      <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=shortlog&amp;h=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;pg=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
deselect<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
	    <?php }else{ ?>
	      <?php if ($_smarty_tpl->tpl_vars['mark']->value->GetCommitterEpoch()>$_smarty_tpl->tpl_vars['rev']->value->GetCommitterEpoch()){?>
	        <?php $_smarty_tpl->tpl_vars['markbase'] = new Smarty_variable($_smarty_tpl->tpl_vars['mark']->value, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['markparent'] = new Smarty_variable($_smarty_tpl->tpl_vars['rev']->value, null, 0);?>
	      <?php }else{ ?>
	        <?php $_smarty_tpl->tpl_vars['markbase'] = new Smarty_variable($_smarty_tpl->tpl_vars['rev']->value, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['markparent'] = new Smarty_variable($_smarty_tpl->tpl_vars['mark']->value, null, 0);?>
	      <?php }?>
	      <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=commitdiff&amp;h=<?php echo $_smarty_tpl->tpl_vars['markbase']->value->GetHash();?>
&amp;hp=<?php echo $_smarty_tpl->tpl_vars['markparent']->value->GetHash();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
diff with selected<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
	    <?php }?>
	  <?php }else{ ?>
	    <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=shortlog&amp;h=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;pg=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&amp;m=<?php echo $_smarty_tpl->tpl_vars['rev']->value->GetHash();?>
"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
select for diff<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
	  <?php }?>
	<?php }?>
       </td>
     </tr>
   <?php }
if (!$_smarty_tpl->tpl_vars['rev']->_loop) {
?>
     <tr><td><em><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
No commits<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</em></td></tr>
   <?php } ?>

   <?php if ($_smarty_tpl->tpl_vars['hasmorerevs']->value){?>
     <tr>
     <?php if ($_smarty_tpl->tpl_vars['source']->value=='summary'){?>
       <td><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=shortlog">&hellip;</a></td>
     <?php }elseif($_smarty_tpl->tpl_vars['source']->value=='shortlog'){?>
       <td><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?p=<?php echo urlencode($_smarty_tpl->tpl_vars['project']->value->GetProject());?>
&amp;a=shortlog&amp;h=<?php echo $_smarty_tpl->tpl_vars['commit']->value->GetHash();?>
&amp;pg=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
<?php if ($_smarty_tpl->tpl_vars['mark']->value){?>&amp;m=<?php echo $_smarty_tpl->tpl_vars['mark']->value->GetHash();?>
<?php }?>" title="Alt-n"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
next<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></td>
     <?php }?>
     </tr>
   <?php }?>
 </table>

<?php }} ?>