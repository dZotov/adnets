<?
include("./include/init.php");

$top= new Top();

$t=$top->GetManyByCond("1");


$smarty->assign("DATA",$t);
$smarty->assign("PAGE_TITLE","AdNets.ru ��� �����������");
Display("top.tpl");



/* fsdfdsffdsdf
ds
fsdf */
?>