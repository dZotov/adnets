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
$cols = array(
	1 => 'Адрес, заголовок, текст|title',
	2 => 'Рисунок',
	3 => 'Статус|status',
	4 => 'Цена|price',
	5 => 'CTR|ctr',
	6 => 'Дата|date',
);
$t = $ts->GetSortTable($cond, $cols, get_get('sort', -1), get_get('page', 1), get_get('perpage', 20));

$smarty->assign("TABLE", $t);
$smarty->assign("COMPANY", $c->attr);
Display("teasers.tpl");
?>