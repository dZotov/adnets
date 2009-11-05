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

ini_set('display_errors', SHOW_PHP_ERRORS);
error_reporting(E_ALL);

require_once ROOT_PATH.'./include/smarty/Smarty.class.php';
$smarty = new Smarty;
$smarty->template_dir = ROOT_PATH."templates/";
$smarty->compile_dir = ROOT_PATH."templates_c/";
$smarty->plugins_dir = array('mysmarty', 'plugins');

if (!isset($AUTH)) $AUTH = 'free';
auth($AUTH);

$SCRIPTNAME = substr(strrchr($_SERVER['SCRIPT_NAME'], '/'), 1);
$SCRIPTPATH = substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
define('SITE_URL', 'http://'.$_SERVER['HTTP_HOST'].$SCRIPTPATH);
$smarty->assign('SITE_URL', SITE_URL);

$ERRORS = array();
$JS = array();
$PAGE_TITLE = '';
$HEAD_ICON = '';
$HEAD_TITLE = '';
$MENU_TYPE = '';
$smarty->assign_by_ref('ERRORS', $ERRORS);
$smarty->assign_by_ref('PAGE_TITLE', $PAGE_TITLE);
$smarty->assign_by_ref('DB_QUERY', $DB_QUERY);
$smarty->assign_by_ref('JS', $JS);
$smarty->assign_by_ref('HEAD_ICON', $HEAD_ICON);
$smarty->assign_by_ref('HEAD_TITLE', $HEAD_TITLE);
$smarty->assign_by_ref('MENU_TYPE', $MENU_TYPE);

$JS[] = 'jquery.js';
$JS[] = 'jquery.form.js';
$JS[] = 'scripts.js';
$JS[] = 'tiny_mce/tiny_mce.js';


$MENU_WEB = array();
$MENU_SELLER = array();

$MENU[] = array('name' => 'adw', 'title' => 'Партнеры', 'url' => 'adwerts.php');
$MENU[] = array('name' => 'sites', 'title' => 'Сайты', 'url' => 'sites.php');
$MENU[] = array('name' => 'stat', 'title' => 'Статистика', 'url' => 'stat.php');
$MENU[] = array('name' => 'news', 'title' => 'Новости', 'url' => 'news.php');
$MENU[] = array('name' => 'tiz', 'title' => 'Тизеры', 'url' => 'tisers.php');
$MENU[] = array('name' => 'pay', 'title' => 'Выплаты', 'url' => 'pay.php');
		
$MENU_SELLER[] = array('name' => 'companies', 'title' => 'Компании', 'url' => 'rcompanies.php');
$MENU_SELLER[] = array('name' => 'rstat', 'title' => 'Статистика', 'url' => 'rstat.php');
$MENU_SELLER[] = array('name' => 'rnews', 'title' => 'Новости', 'url' => 'rnews.php');
$MENU_SELLER[] = array('name' => 'rtiz', 'title' => 'Тизеры', 'url' => 'rtisers.php');


foreach ($MENU as $k => $v) {
	if ($v['url'] && strpos($_SERVER['REQUEST_URI'], '/'.$v['url']) !== false) {
		$smarty->assign('MENU_SD', $v['name']);
		$MENU_TYPE = 'webmaster';
	}
}	
foreach ($MENU_SELLER as $k => $v) {
	if ($v['url'] && strpos($_SERVER['REQUEST_URI'], '/'.$v['url']) !== false) {
		$smarty->assign('MENU_SD', $v['name']);
		$MENU_TYPE = 'adverts';
	}			
}	
		
$SCRIPT_NAME=script_name();		
$smarty->assign('SCRIPT_NAME', $SCRIPT_NAME);
$smarty->assign('MENU', $MENU);
$smarty->assign('MENU_SELLER', $MENU_SELLER);

$smarty->assign('YEAR', date("Y"));
$smarty->assign('SERVER_TIME', sqlDateTime());

$c = new Cat();
$cats = $c->GetManyByCond("1");
$CATEGORY_LIST = array();
foreach($cats as $v) {
	$CATEGORY_LIST[$v['id']] = $v['title'];
}

?>