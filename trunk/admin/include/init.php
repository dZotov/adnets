<?
session_start();

Header("Content-type: text/html; charset=cp1251");

$root_dir=str_replace("\\", "/", __FILE__);
$root_dir=substr($root_dir, 0, strpos($root_dir, "/include/"));
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
require_once ROOT_PATH.'include/utils.php';

define('SCRIPTTIME_START', StartScript()); 
$DB_QUERY =  0; 

require_once ROOT_PATH.'include/defs.php';
require_once ROOT_PATH.'include/db.php';

// Ajax lib
//require_once("./include/sajax.php");
// $sajax_request_type = "POST";

ini_set('display_errors', SHOW_PHP_ERRORS);
error_reporting(E_ALL);

require_once ROOT_PATH.'./include/smarty/Smarty.class.php';
$smarty = new Smarty;
$smarty->template_dir = ROOT_PATH."templates/";
$smarty->compile_dir = ROOT_PATH."templates_c/";
$smarty->plugins_dir = array('mysmarty', 'plugins');

if (!isset($AUTH))
	$AUTH = 'free';
auth($AUTH);

$SCRIPTNAME = substr(strrchr($_SERVER['SCRIPT_NAME'], '/'), 1);
$SCRIPTPATH = substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
define('SITE_URL', 'http://'.$_SERVER['HTTP_HOST'].$SCRIPTPATH);
$smarty->assign('SITE_URL', SITE_URL);

$ERRORS = array();
$PAGE_TITLE = '';
$HEAD_ICON = '';
$HEAD_TITLE = '';
$smarty->assign_by_ref('ERRORS', $ERRORS);
$smarty->assign_by_ref('PAGE_TITLE', $PAGE_TITLE);
$smarty->assign_by_ref('DB_QUERY', $DB_QUERY);
$smarty->assign_by_ref('JS', $JS);
$smarty->assign_by_ref('HEAD_ICON', $HEAD_ICON);
$smarty->assign_by_ref('HEAD_TITLE', $HEAD_TITLE);

$MENU = array();

	$MENU[] = array('name' => 'cat', 'title' => 'Категории', 'url' => 'cat.php');
	$MENU[] = array('name' => 'temp', 'title' => 'Шаблоны', 'url' => 'temp.php');
	$MENU[] = array('name' => 'add_temp', 'title' => 'Добавить шаблон', 'url' => 'add_temp.php');
	$MENU[] = array('name' => 'stat', 'title' => 'Статистика', 'url' => 'stat.php');
	$MENU[] = array('name' => 'det_stat', 'title' => 'Подробная статистика', 'url' => 'detail_stat.php');
	$MENU[] = array('name' => 'logout', 'title' => 'Выход', 'url' => 'logout.php');

foreach ($MENU as $k => $v)
	if ($v['url'] && strpos($_SERVER['REQUEST_URI'], '/'.$v['url']) !== false)
		$smarty->assign('MENU_SD', $v['name']);
$smarty->assign('MENU', $MENU);

$smarty->assign('YEAR', date("Y"));
$smarty->assign('SERVER_TIME', sqlDateTime());

?>