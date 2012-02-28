<?php
/**
 * GitPHP Config file
 *
 * Copy this example file to config/gitphp.conf.php
 *
 * @author Christopher Han <xiphux@gmail.com>
 * @copyright Copyright (c) 2010 Christopher Han
 * @package GitPHP
 * @subpackage Config
 */
 
 /*
  * Apache repository configuration files
  *
  */
$gitphp_conf['apacherepo'] = 'C:/dev/gitstack/apache/conf/gitstack';


/*
 * projectroot
 * Full directory on server where projects are located
 */
$gitphp_conf['projectroot'] = 'C:/dev/gitstack/repositories';

/*
 * gitbin
 * Path to git binary
 * For example, /usr/bin/git on Linux
 * or C:\\Program Files\\Git\\bin\\git.exe on Windows
 * with msysgit.  You can also omit the full path and just
 * use the executable name to search the user's $PATH.
 * Note: Versions of PHP below 5.2 have buggy handling of spaces
 * in paths.  Use the 8.3 version of the filename if you're
 * having trouble, e.g. C:\\Progra~1\\Git\\bin\\git.exe
 */
// Windows (msysgit):
//$gitphp_conf['gitbin'] = 'C:\\Progra~1\\Git\\bin\\git.exe';
$gitphp_conf['gitbin'] = 'C:/dev/gitstack/git/bin/git.exe';

/*
 * diffbin
 * Path to diff binary
 * Same rules as gitbin
 */
// Windows (msysgit):
$gitphp_conf['diffbin'] = 'C:/dev/gitstack/git/bin/diff.exe';

/*
 * cache
 * Turns on template caching. If in doubt, leave it off
 * You will need to create a directory 'cache' and make it
 * writable by the server
 */
$gitphp_conf['cache'] = false;

/*
 * objectcache
 * Turns on object caching.  This caches immutable pieces of
 * data from the git repository.  You will need to create a
 * directory 'cache' and make it writable by the server.
 * This can be used in place of the template cache, or
 * in addition to it for the maximum benefit.
 */
$gitphp_conf['objectcache'] = false;

/*
 * compat
 * Set this to true to turn on compatibility mode.  This will cause
 * GitPHP to rely more on the git executable for loading data,
 * which will bypass some of the limitations of PHP at the expense
 * of performance.
 * Turn this on if you are experiencing issues viewing data for
 * your projects.
 */
$gitphp_conf['compat'] = false;
$gitphp_conf['title'] = "GitStack Web";
