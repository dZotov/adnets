<?
include("./include/init.php");
check_auth();


$smarty->assign("PAGE_TITLE","AdNets.ru ����������");
Display("stat.tpl");
?>