<?
$AUTH = 'member';
include("./include/init.php");	

$PAGE_TITLE = "��������� ��������";

$c = new Company();
$cond = "id IS NOT NULL";
$cols = array(
	1 => '��������|title',
	2 => '��������|category',
	3 => '������',
	4 => '������|view',
	5 => '�����|click',
	6 => 'CTR|ctr',
	7 => '������|money',
	8 => '����|date',
);
$t = $c->GetSortTable($cond, $cols, get_get('sort', -8), get_get('page', 1), get_get('perpage', 20));

$smarty->assign('TABLE', $t);
Display("companies.tpl");
?>