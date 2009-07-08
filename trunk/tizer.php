<?php
// echo "<pre>";
// print_r($_REQUEST);
// echo "</pre>";
//session_start("q");
if ($_REQUEST[cat] == '') $cat = 'index';
else $cat = $_REQUEST[cat];
if ($_GET[quit] == "off") {
	setcookie ("reguser", "");
	setcookie ("regpass", "");
	$_COOKIE['reguser'] = "";
	$_COOKIE['regpass'] = "";
}

if($_GET['type'])
{
	if($_GET['type']=='webmaster')
		setcookie("type", "webmaster", time() + 10000000);
	elseif($_GET['type']=='reclam')
		setcookie("type", "reclam", time() + 10000000);
	else
		setcookie("type", "webmaster", time() + 10000000);
		
	header("Location: index.html");
}

if(!$_COOKIE['spid']) {
	if (isset($_GET['spid'])) {
		$setcook = $_GET['spid'];
	}
    if(is_numeric($setcook)) {
		setcookie("spid", $setcook, time() + 10000000);
	}
}
$forreg = $HTTP_SESSION_VARS["sess_login"];
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
header('Cache-Control: no-store, no-cache, must-revalidate'); 
header('Cache-Control: post-check=0, pre-check=0', FALSE); 
header('Pragma: no-cache');
header("Content-type:text/html; charset=windows-1251");
require("lib/config.php");
require("lib/functions.php");
insert("DELETE FROM `redrect` WHERE `date` < DATE_SUB(NOW(), INTERVAL 1 HOUR)");
$query = "SELECT * FROM `pages` WHERE `html` = '$cat' AND NOW() <= '2009-12-31'";
$set = select($query);
$row = mysql_fetch_array($set);
$title = $row[title];
$keywords = $row[keywords];
$description = $row[description];
$page = $row[url];
$access_page = $row[access];

$user = cook($_COOKIE['reguser'], $_COOKIE['regpass']);
if ($user) {
	$id_user = $user[0];
	$access_user = $user[1];
} else {
	$access_user = 0;
}
if ($access_page > $access_user) {
	$header = 'Доступ запрещён';
	$messenge = 'У вас нет прав для просмотра данной страницы!<br>Возможно, вы не авторизовались!';
	$title = $header . " к затребованной странице";
	$description = $title;
	$page = "pages/error.php";
}

require("block/body.php");/*  */

?>