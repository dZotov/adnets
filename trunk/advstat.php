<?
include("./include/init.php");	

if (!IsAdv()) redirect("statistic.php");


$PAGE_TITLE = "Статистика";
Display("advstat.tpl");
?>