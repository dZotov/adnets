<?
include("./include/init.php");


$smarty->assign("PRE_DATE", date("d/m/Y",( strtotime(date("d.m.Y"))-(3600*48))));
$smarty->assign("DATE_NOW",date("d/m/Y"));

$PAGE_TITLE = "Статистика";
Display("stat.tpl");
?>