<?
include("./include/init.php");	

if (!IsAdv()) redirect("playgrounds.php");


$PAGE_TITLE = "Рекламные компании";
Display("companies.tpl");
?>