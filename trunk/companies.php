<?
include("./include/init.php");	

if (!IsAdv()) redirect("playgrounds.php");


$PAGE_TITLE = "��������� ��������";
Display("companies.tpl");
?>