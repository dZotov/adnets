<?
$AUTH = 'member';
include("./include/init.php");	

$PAGE_TITLE = "Рекламные компании";

$c = new Company();
$cond = "id IS NOT NULL";
$cols = array(
	1 => 'Компания|title',
	2 => 'Тематика|category',
	3 => 'Тизеры',
	4 => 'Показы|view',
	5 => 'Клики|click',
	6 => 'CTR|ctr',
	7 => 'Деньги|money',
	8 => 'Дата|date',
);
$t = $c->GetSortTable($cond, $cols, get_get('sort', -8), get_get('page', 1), get_get('perpage', 20));

$smarty->assign('TABLE', $t);
Display("companies.tpl");
?>