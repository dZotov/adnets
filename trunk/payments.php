<?
include("./include/init.php");
check_auth();
$pay= new Payments();

$p=$pay->GetManyByCond("adid='{$account_id}'","date DESC");
$smarty->assign("DATA",$p);
$smarty->assign("PAY_STATUS",$PAY_STATUS);
$smarty->assign("PAGE_TITLE","AdNets.ru Выплаты");
Display("payments.tpl");
?>