<?
include("./include/init.php");	

if (!IsAdv()) redirect("statistic.php");


$PAGE_TITLE = "����������";
Display("advstat.tpl");
?>