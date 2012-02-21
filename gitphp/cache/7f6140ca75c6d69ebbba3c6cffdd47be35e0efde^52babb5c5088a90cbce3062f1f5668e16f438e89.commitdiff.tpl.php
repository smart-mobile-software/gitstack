<?php /*%%SmartyHeaderCode:187104f4242500c9bf3-91725559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52babb5c5088a90cbce3062f1f5668e16f438e89' => 
    array (
      0 => '.\\templates\\commitdiff.tpl',
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
    '214e9af9128385b0252c65319f53a614e65c8dfe' => 
    array (
      0 => '.\\templates\\filediffsidebyside.tpl',
      1 => 1327762713,
      2 => 'file',
    ),
    '549f4bf62190bc8a46f1d4da487442026a4ac6d5' => 
    array (
      0 => '.\\templates\\filediff.tpl',
      1 => 1327762713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187104f4242500c9bf3-91725559',
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
  'unifunc' => 'content_4f424268d889d',
  'cache_lifetime' => 3600,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f424268d889d')) {function content_4f424268d889d($_smarty_tpl) {?><?php echo '<?'; ?>xml version="1.0" encoding="utf-8"<?php echo '?>'; ?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"> <head> <title>
    
gitphp 0.2.6 :: test4.git/commitdiff
    </title> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> <link rel="alternate" title="test4.git log (Atom)" href="/gitphp/index.php?p=test4.git&amp;a=atom" type="application/atom+xml" /> <link rel="alternate" title="test4.git log (RSS)" href="/gitphp/index.php?p=test4.git&amp;a=rss" type="application/rss+xml" /> <link rel="stylesheet" href="css/gitphp.min.css" type="text/css" /> <link rel="stylesheet" href="css/gitphpskin.min.css" type="text/css" /> <link rel="stylesheet" href="css/ext/jquery.qtip.css" type="text/css" /> <script src="js/ext/require.js"></script> <script type="text/javascript">

var GitPHP = GitPHP || {};

GitPHP.Resources = {
	Loading: "Loading…",
	LoadingBlameData: "Loading blame data…",
	Snapshot: "snapshot",
	NoMatchesFound: 'No matches found for "%1"'
};

GitPHP.Snapshot = {

	Formats: {
				"tar": "tar",				"zip": "zip",				"tbz2": "tar.bz2",				"tgz": "tar.gz"			}

}
		
</script> <script type="text/javascript">
    var GitPHPJSPaths = {
			jquery: 'ext/jquery-1.7.1.min'
	    };
    
GitPHPJSPaths.commitdiff = "commitdiff.min";


    var GitPHPJSModules = null;
    
GitPHPJSModules = ['commitdiff'];


    require({
    	baseUrl: 'js',
	paths: GitPHPJSPaths,
	priority: ['jquery']
    }, GitPHPJSModules);
    </script> </head> <body> <div class="page_header"> <a href="http://git-scm.com" title="git homepage"> <img src="images/git-logo.png" width="72" height="27" alt="git" class="logo" /> </a> <div class="lang_select"> <form action="/gitphp/index.php" method="get" id="frmLangSelect"> <div> <input type="hidden" name="p" value="test4.git" /> <input type="hidden" name="a" value="commitdiff" /> <input type="hidden" name="h" value="8fc725be14c1c800ea0c04232b4a4e8e8d6133bc" /> <label for="selLang">language:</label> <select name="l" id="selLang"> <option selected="selected" value="en_US">English (en_US)</option> <option  value="de_DE">Deutsch (de_DE)</option> <option  value="fr_FR">Français (fr_FR)</option> <option  value="ja_JP">日本語 (ja_JP)</option> <option  value="ru_RU">Русский (ru_RU)</option> <option  value="zh_CN">中文简体 (zh_CN)</option> </select> <input type="submit" value="set" id="btnLangSet" /> </div> </form> </div> <a href="index.php">projects</a> / 
  <a href="/gitphp/index.php?p=test4.git&amp;a=summary">test4.git</a>
       / commitdiff
        <form method="get" action="index.php" enctype="application/x-www-form-urlencoded"> <div class="search"> <input type="hidden" name="p" value="test4.git" /> <input type="hidden" name="a" value="search" /> <input type ="hidden" name="h" value="8fc725be14c1c800ea0c04232b4a4e8e8d6133bc" /> <select name="st"> <option  value="commit">commit</option> <option  value="author">author</option> <option  value="committer">committer</option> <option  value="file">file</option> </select> search: <input type="text" name="s" /> </div> </form> </div> <div class="page_nav"> <a href="/gitphp/index.php?p=test4.git&amp;a=summary">summary</a>
      | 
        <a href="/gitphp/index.php?p=test4.git&amp;a=shortlog&amp;h=8fc725be14c1c800ea0c04232b4a4e8e8d6133bc">shortlog</a>
      | 
        <a href="/gitphp/index.php?p=test4.git&amp;a=log&amp;h=8fc725be14c1c800ea0c04232b4a4e8e8d6133bc">log</a>
      | 
        <a href="/gitphp/index.php?p=test4.git&amp;a=commit&amp;h=8fc725be14c1c800ea0c04232b4a4e8e8d6133bc">commit</a>
      | 
        commitdiff
      | 
        <a href="/gitphp/index.php?p=test4.git&amp;a=tree&amp;hb=8fc725be14c1c800ea0c04232b4a4e8e8d6133bc&amp;h=646965a29773b8389e8a6f217c640f9fb5cc1dba">tree</a> <br /> <a href="/gitphp/index.php?p=test4.git&amp;a=commitdiff&amp;h=8fc725be14c1c800ea0c04232b4a4e8e8d6133bc&amp;o=sidebyside">side by side</a>
      | <a href="/gitphp/index.php?p=test4.git&amp;a=commitdiff_plain&amp;h=8fc725be14c1c800ea0c04232b4a4e8e8d6133bc">plain</a> </div> <div class="title"> <a href="/gitphp/index.php?p=test4.git&amp;a=commit&amp;h=8fc725be14c1c800ea0c04232b4a4e8e8d6133bc" class="title">blab lab lba</a> <span class="refs"> <span class="head"> <a href="/gitphp/index.php?p=test4.git&amp;a=shortlog&amp;h=refs/heads/master">master</a> </span> </span> </div> <div class="page_body">
                   blab lab lba
          <br /> <br /> <div class="diffBlob" id="0000000000000000000000000000000000000000_3d35322462068a4afe6d636360eac8da259d5456"> <div class="diff_info">
     
     
                   file:<a href="/gitphp/index.php?p=test4.git&amp;a=blob&amp;h=3d35322462068a4afe6d636360eac8da259d5456&amp;hb=8fc725be14c1c800ea0c04232b4a4e8e8d6133bc&amp;f=jlkj.rtf">b/jlkj.rtf</a>

                (new)
                 </div> <pre>
<span>Binary files /dev/null and C:\Windows\Temp\gitphp_10760_to differ</span>
<span></span>
</pre> </div> </div> <div class="page_footer"> <div class="page_footer_text">
    Unnamed repository; edit this file 'description' to name the repository.

    </div> <a href="/gitphp/index.php?p=test4.git&amp;a=rss" class="rss_logo">RSS</a> <a href="/gitphp/index.php?p=test4.git&amp;a=atom" class="rss_logo">Atom</a> </div> <div class="attr_footer"> <a href="http://xiphux.com/programming/gitphp/" target="_blank">GitPHP by Chris Han</a> </div> </body> </html><?php }} ?>