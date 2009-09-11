<?
session_start();
Header("Content-type: text/html; charset=cp1251");

$root_dir = str_replace("\\", "/", __FILE__);
$root_dir = substr($root_dir, 0, strpos($root_dir, "/include/"));
define("ROOT_PATH", $root_dir."/");

function array_stripslashes($arr) {
	if (is_array($arr)) {
		foreach ($arr as $key => $value) {
			if (!is_array($value)) {
				$arr[$key] = stripslashes($value);
			} else {
				$arr[$key] = array_stripslashes($value);
			}
		}
	}
	return $arr;
}

if (get_magic_quotes_gpc()) {
	$_GET = array_map('array_stripslashes',$_GET);
	$_POST = array_map('array_stripslashes',$_POST);
	$_COOKIE = array_map('array_stripslashes',$_COOKIE);
}

require_once ROOT_PATH.'include/config.php';

ini_set('display_errors', SHOW_PHP_ERRORS);
ini_set('session.gc_maxlifetime', 1440 * 20);
error_reporting(E_ALL);

require_once ROOT_PATH.'include/utils.php';
require_once ROOT_PATH.'include/defs.php';
require_once ROOT_PATH.'include/db.php';

$DB_QUERY =  0; 

require_once ROOT_PATH.'./include/smarty/Smarty.class.php';
$smarty = new Smarty;
$smarty->template_dir = ROOT_PATH."templates";
$smarty->compile_dir = ROOT_PATH."templates_c";
$smarty->cache_dir = ROOT_PATH."templates_c/cache";
$smarty->cache_lifetime = 60 * 10; // 10 мин
$smarty->plugins_dir = array('mysmarty', 'plugins');

$SCRIPTNAME = substr(strrchr($_SERVER['SCRIPT_NAME'], '/'), 1);
$SCRIPTPATH = substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
define('SITE_URL', 'http://'.$_SERVER['HTTP_HOST'].$SCRIPTPATH);
$smarty->assign('SITE_URL', SITE_URL);

$JS = array();
$JS[] = 'scripts.js';
$JS[] = 'jquery.js';
$JS[] = 'jquery.form.js';

$ERRORS = array();
$PAGE_TITLE = 'Page title';
$PAGE_DESC = 'desc';
$smarty->assign_by_ref('ERRORS', $ERRORS);
$smarty->assign_by_ref('PAGE_TITLE', $PAGE_TITLE);
$smarty->assign_by_ref('PAGE_DESC', $PAGE_DESC);
$smarty->assign_by_ref('JS', $JS);
$smarty->assign_by_ref('DB_QUERY', $DB_QUERY);

$MENU = array(
	array('name' => 'index', 'title' => 'index', 'url' => 'index.php'),
);
foreach ($MENU as $k => $v) {
	if (get($v, 'url') && strpos($_SERVER['REQUEST_URI'], '/'.$v['url']) !== false) {
		$smarty->assign('MENU_SD', $v['name']);
	}
}
$smarty->assign('MENU', $MENU);

?>