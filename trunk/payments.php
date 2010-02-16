<?
include("./include/init.php");

if(get_get('act')=='payment_on')
{
	$ad = new Adwerts($account_id);
	$ad->Set('hold',0);
	$ad->Save();
	redirect('payments.php');
}
if(get_get('act')=='payment_off')
{
	$ad = new Adwerts($account_id);
	$ad->Set('hold',1);
	$ad->Save();
	redirect('payments.php');
}


$pay= new Payments();
$p=$pay->GetManyByCond("adid='{$account_id}'","date DESC");
$smarty->assign("DATA",$p);
$smarty->assign("PAY_STATUS",$PAY_STATUS);
$smarty->assign("PAGE_TITLE","AdNets.ru Выплаты");
Display("payments.tpl");
?>