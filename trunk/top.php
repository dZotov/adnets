<?
include("./include/init.php");
check_auth();
$top= new Top();

$t=$top->GetManyByCond("1");


$smarty->assign("DATA",$t);
$smarty->assign("PAGE_TITLE","AdNets.ru Топ вебмастеров");
Display("top.tpl");
?>