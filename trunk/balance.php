<?
include("./include/init.php");

$PAGE_TITLE = "Баланс";

if (count($_POST)) {
	$mode = get_post('mode');
	if ($mode == 'pay') {
		$sum = get_post('sum');
		$b = new Balance();
		$b->Set('sum', $sum);
		$b->Set('adid', $account_id);
		$b->Set('date', sqlDateTime());
		$b->Set('status', -1);
		$b->Save();
		
		redirect("balance.php?pay={$b->GetId()}");
	}
}

$pay = get_get('pay');
$b = new Balance($pay);
if ($b->GetId() && $b->IsMy()) {
	$smarty->assign('BALANCE', $b->attr);
}

Display("balance.tpl");
?>