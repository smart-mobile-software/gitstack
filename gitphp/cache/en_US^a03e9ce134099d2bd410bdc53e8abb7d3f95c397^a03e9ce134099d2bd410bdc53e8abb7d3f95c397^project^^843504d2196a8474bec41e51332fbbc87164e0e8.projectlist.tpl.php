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
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f43a9bb72d74',
  'has_nocache_code' => false,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f43a9bb72d74')) {function content_4f43a9bb72d74($_smarty_tpl) {?><?php echo '<?'; ?>xml version="1.0" encoding="utf-8"<?php echo '?>'; ?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"> <head> <title>
    
    gitphp 0.2.6
    
    </title> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> <link rel="stylesheet" href="css/gitphp.min.css" type="text/css" /> <link rel="stylesheet" href="css/gitphpskin.min.css" type="text/css" /> <link rel="stylesheet" href="css/ext/jquery.qtip.css" type="text/css" /> <script src="js/ext/require.js"></script> <script type="text/javascript">

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
    
GitPHPJSPaths.projectlist = "projectlist.min";


    var GitPHPJSModules = null;
    
GitPHPJSModules = ['projectlist'];


    require({
    	baseUrl: 'js',
	paths: GitPHPJSPaths,
	priority: ['jquery']
    }, GitPHPJSModules);
    </script> </head> <body> <div class="page_header"> <a href="http://git-scm.com" title="git homepage"> <img src="images/git-logo.png" width="72" height="27" alt="git" class="logo" /> </a> <div class="lang_select"> <form action="/gitphp/index.php" method="get" id="frmLangSelect"> <div> <label for="selLang">language:</label> <select name="l" id="selLang"> <option selected="selected" value="en_US">English (en_US)</option> <option  value="de_DE">Deutsch (de_DE)</option> <option  value="fr_FR">Français (fr_FR)</option> <option  value="ja_JP">日本語 (ja_JP)</option> <option  value="ru_RU">Русский (ru_RU)</option> <option  value="zh_CN">中文简体 (zh_CN)</option> </select> <input type="submit" value="set" id="btnLangSet" /> </div> </form> </div> <a href="index.php">projects</a> /
      
    </div> <div class="index_header"> <p>
git source code archive
</p> </div> <div class="projectSearch"> <form method="get" action="index.php" id="projectSearchForm" enctype="application/x-www-form-urlencoded">
Search projects: <input type="text" name="s" class="projectSearchBox" /> <a href="index.php" class="clearSearch" style="display: none;">X</a> <img src="images/search-loader.gif" class="searchSpinner" style="display: none;" /></form> </div> <table cellspacing="0" class="projectList"> <tr class="projectHeader"> <th>Project</th> <th><a class="header" href="/gitphp/index.php?o=descr">Description</a></th> <th><a class="header" href="/gitphp/index.php?o=owner">Owner</a></th> <th><a class="header" href="/gitphp/index.php?o=age">Last Change</a></th> <th>Actions</th> </tr> <tr class="light projectRow"> <td class="projectName"> <a href="/gitphp/index.php?p=test3.git&amp;a=summary" class="list ">test3.git</a> </td> <td class="projectDescription"><a href="/gitphp/index.php?p=test3.git&amp;a=summary" class="list">Unnamed repository; edit this file 'description' to name the repository.
</a></td> <td class="projectOwner"><em></em></td> <td class="projectAge"> <em class="empty">No commits</em> </td> <td class="link"> <a href="/gitphp/index.php?p=test3.git&amp;a=summary">summary</a> </td> </tr> <tr class="dark projectRow"> <td class="projectName"> <a href="/gitphp/index.php?p=test4.git&amp;a=summary" class="list ">test4.git</a> </td> <td class="projectDescription"><a href="/gitphp/index.php?p=test4.git&amp;a=summary" class="list">Unnamed repository; edit this file 'description' to name the repository.
</a></td> <td class="projectOwner"><em></em></td> <td class="projectAge"> <span class="agehighlight"><em>26 hours ago</em></span> </td> <td class="link"> <a href="/gitphp/index.php?p=test4.git&amp;a=summary">summary</a>
		| 
	<a href="/gitphp/index.php?p=test4.git&amp;a=shortlog">shortlog</a> | 
	<a href="/gitphp/index.php?p=test4.git&amp;a=log">log</a> | 
	<a href="/gitphp/index.php?p=test4.git&amp;a=tree">tree</a> | 
	<a href="/gitphp/index.php?p=test4.git&amp;a=snapshot&amp;h=HEAD" class="snapshotTip">snapshot</a> </td> </tr> </table> <div class="page_footer"> <a href="/gitphp/index.php?a=opml" class="rss_logo">OPML</a> <a href="/gitphp/index.php?a=project_index" class="rss_logo">TXT</a> </div> <div class="attr_footer"> <a href="http://xiphux.com/programming/gitphp/" target="_blank">GitPHP by Chris Han</a> </div> </body> </html><?php }} ?>