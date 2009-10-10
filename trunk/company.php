<?
include("./include/init.php");	

if (!IsAdv()) redirect("edit_playground.php");

$PAGE_TITLE = $HEAD_TITLE = "Новая рекламная компания";

$id = (int) get_get('id');
$c = new Company($id);
if ($c->GetId() && !$c->IsMy()) redirect('companies.php');

$min_price = 0;
if ($c->GetId()) {
	$PAGE_TITLE = $HEAD_TITLE = $c->GetTitle();
	$cat = new Cat($c->Get('category'));
	$min_price = $cat->Get('price');
}

$f = new Form('company', $c);

include('./form/company.php');

if ($f->Filled()) {
	$f->SaveToEntity();
	$c->Set('date', sqlDateTime());
	$c->Set('adid', $account_id);
	$c->save();

	redirect("company.php?id={$c->GetId()}&save=ok");
}
	
$JS[] = 'company.js';	
	
$smarty->assign("FORM", $f->HTML);
Display("company.tpl");
?>