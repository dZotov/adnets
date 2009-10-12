<?
include("./include/init.php");	

if (!IsAdv()) redirect("edit_playground.php");

$PAGE_TITLE = $HEAD_TITLE = "����� ��������� ��������";

$id = (int) get_get('id');
$c = new Company($id);
if ($c->GetId() && !$c->IsMy()) redirect('companies.php');

if ($c->GetId()) {
	$PAGE_TITLE = $HEAD_TITLE = $c->GetTitle();
}

$ts = new Teaser();
$cond = "adid = '{$account_id}' AND company_id = '{$id}'";
$cols = array(
	1 => '�����, ���������, �����|title',
	2 => '�������',
	3 => '������|status',
	4 => '����|price',
	5 => 'CTR|ctr',
	6 => '����|date',
);
$t = $ts->GetSortTable($cond, $cols, get_get('sort', -1), get_get('page', 1), get_get('perpage', 20));

$smarty->assign("TABLE", $t);
$smarty->assign("COMPANY", $c->attr);
Display("teasers.tpl");
?>