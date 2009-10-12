<?
include("./include/init.php");	

if (!IsAdv()) redirect("edit_playground.php");

$PAGE_TITLE = $HEAD_TITLE = "Новая рекламная компания";

$id = (int) get_get('id');
$c = new Company($id);
if ($c->GetId() && !$c->IsMy()) redirect('companies.php');

if ($c->GetId()) {
	$PAGE_TITLE = $HEAD_TITLE = $c->GetTitle();
}

$ts = new Teaser();
$cond = "adid = '{$account_id}' AND company_id = '{$id}'";
$t = $ts->GetPagedTable($cond);

$smarty->assign("TABLE", $t);
$smarty->assign("COMPANY", $c->attr);
Display("teasers.tpl");
?>