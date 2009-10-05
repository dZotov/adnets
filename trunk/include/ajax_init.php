<?
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
require_once ROOT_PATH.'./include/smarty/Smarty.class.php';
$smarty = new Smarty;
$smarty->template_dir = ROOT_PATH."templates";
$smarty->compile_dir = ROOT_PATH."templates_c";
$smarty->cache_dir = ROOT_PATH."templates_c/cache";
$smarty->cache_lifetime = 60 * 10; // 10 мин
$smarty->plugins_dir = array('mysmarty', 'plugins');

$DB_QUERY =  0; 

$account_id = get($_SESSION, 'account_id');

if (!isset($AUTH)) $AUTH = "member";
check_auth($AUTH);

$user_type = get_get('user_type');
if ($user_type) { // 1 - вебмастер, 2 - рекламодатель
	SetCookie("user_type", $user_type, time() + 3600*360, "/");
	redirect("index.php");
}
$USER_TYPE = (int) get($_COOKIE, 'user_type');
if (!$USER_TYPE || !array_key_exists($USER_TYPE, $TYPE_LIST)) {
	redirect("index.php?user_type=1");
}

$SCRIPTNAME = substr(strrchr($_SERVER['SCRIPT_NAME'], '/'), 1);
$SCRIPTPATH = substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
define('SITE_URL', 'http://'.$_SERVER['HTTP_HOST'].$SCRIPTPATH);
$smarty->assign('SITE_URL', SITE_URL);

$JS = array();
$JS[] = 'jquery.js';
$JS[] = 'jquery.form.js';
$JS[] = 'colorpicker.js';
$JS[] = 'scripts.js';
$ERRORS = array();
$smarty->assign_by_ref('ERRORS', $ERRORS);
$smarty->assign_by_ref('JS', $JS);
$smarty->assign_by_ref('DB_QUERY', $DB_QUERY);
>