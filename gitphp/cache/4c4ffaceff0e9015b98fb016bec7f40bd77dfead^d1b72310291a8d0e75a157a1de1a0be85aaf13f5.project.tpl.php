<?php /*%%SmartyHeaderCode:66534f42424bc3a3c2-35013949%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1b72310291a8d0e75a157a1de1a0be85aaf13f5' => 
    array (
      0 => '.\\templates\\project.tpl',
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
    '8c48cc2783cd32639f82862c36ac07beb5acfb7a' => 
    array (
      0 => '.\\templates\\taglist.tpl',
      1 => 1327762713,
      2 => 'file',
    ),
    '48a979bbeb1d8dd0d7bc9138f3bd17d1f3b971f5' => 
    array (
      0 => '.\\templates\\headlist.tpl',
      1 => 1327762713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66534f42424bc3a3c2-35013949',
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f43aba48b9b1',
  'has_nocache_code' => false,
  'cache_lifetime' => 3600,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f43aba48b9b1')) {function content_4f43aba48b9b1($_smarty_tpl) {?><?php echo '<?'; ?>xml version="1.0" encoding="utf-8"<?php echo '?>'; ?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"> <head> <title>
    
gitphp 0.2.6 :: test3.git/summary
    </title> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> <link rel="alternate" title="test3.git log (Atom)" href="/gitphp/index.php?p=test3.git&amp;a=atom" type="application/atom+xml" /> <link rel="alternate" title="test3.git log (RSS)" href="/gitphp/index.php?p=test3.git&amp;a=rss" type="application/rss+xml" /> <link rel="stylesheet" href="css/gitphp.min.css" type="text/css" /> <link rel="stylesheet" href="css/gitphpskin.min.css" type="text/css" /> <link rel="stylesheet" href="css/ext/jquery.qtip.css" type="text/css" /> <script src="js/ext/require.js"></script> <script type="text/javascript">

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
    
        GitPHPJSPaths.common = "common.min";
        

    var GitPHPJSModules = null;
    
    GitPHPJSModules = ['common'];
    

    require({
    	baseUrl: 'js',
	paths: GitPHPJSPaths,
	priority: ['jquery']
    }, GitPHPJSModules);
    </script> </head> <body> <div class="page_header"> <a href="http://git-scm.com" title="git homepage"> <img src="images/git-logo.png" width="72" height="27" alt="git" class="logo" /> </a> <div class="lang_select"> <form action="/gitphp/index.php" method="get" id="frmLangSelect"> <div> <input type="hidden" name="p" value="test3.git" /> <input type="hidden" name="a" value="summary" /> <label for="selLang">language:</label> <select name="l" id="selLang"> <option selected="selected" value="en_US">English (en_US)</option> <option  value="de_DE">Deutsch (de_DE)</option> <option  value="fr_FR">Français (fr_FR)</option> <option  value="ja_JP">日本語 (ja_JP)</option> <option  value="ru_RU">Русский (ru_RU)</option> <option  value="zh_CN">中文简体 (zh_CN)</option> </select> <input type="submit" value="set" id="btnLangSet" /> </div> </form> </div> <a href="index.php">projects</a> / 
  <a href="/gitphp/index.php?p=test3.git&amp;a=summary">test3.git</a>
       / summary
        <form method="get" action="index.php" enctype="application/x-www-form-urlencoded"> <div class="search"> <input type="hidden" name="p" value="test3.git" /> <input type="hidden" name="a" value="search" /> <input type ="hidden" name="h" value="HEAD" /> <select name="st"> <option  value="commit">commit</option> <option  value="author">author</option> <option  value="committer">committer</option> <option  value="file">file</option> </select> search: <input type="text" name="s" /> </div> </form> </div> <div class="page_nav">
 
        summary
      | 
        shortlog
      | 
        log
      | 
        commit
      | 
        commitdiff
      | 
        tree
    <br /><br /> </div> <div class="title">
						&nbsp;
			</div> <table cellspacing="0"> <tr><td>description</td><td>Unnamed repository; edit this file 'description' to name the repository.
</td></tr> <tr><td>owner</td><td></td></tr> </table> <div class="title">
									  shortlog
						</div> <table cellspacing="0"> <tr><td><em>No commits</em></td></tr> </table> <div class="page_footer"> <div class="page_footer_text">
    Unnamed repository; edit this file 'description' to name the repository.

    </div> <a href="/gitphp/index.php?p=test3.git&amp;a=rss" class="rss_logo">RSS</a> <a href="/gitphp/index.php?p=test3.git&amp;a=atom" class="rss_logo">Atom</a> </div> <div class="attr_footer"> <a href="http://xiphux.com/programming/gitphp/" target="_blank">GitPHP by Chris Han</a> </div> </body> </html><?php }} ?>