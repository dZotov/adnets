<?
session_start();
Header("Content-type: text/html; charset=cp1251");

$root_dir = str_replace("\\", "/", __FILE__);
$root_dir = substr($root_dir, 0, strpos($root_dir, "/crons/"));
define("ROOT_PATH", $root_dir."/");

require_once ROOT_PATH.'include/config.php';
require_once ROOT_PATH.'include/defs.php';
require_once ROOT_PATH.'include/utils.php';
require_once ROOT_PATH.'include/db.php';
require_once ROOT_PATH.'include/language.php';

ini_set('display_errors', 1);
ini_set('memory_limit', "2048M");
error_reporting(E_ALL);

define('SCRIPTTIME_START', get_microtime()); 
$DB_QUERY =  0; 

?>