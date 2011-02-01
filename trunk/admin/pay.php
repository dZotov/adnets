<?
//$AUTH = 'member';
include('./include/init.php');

$pay= new Payments();

$cols = array(
	1 => 'ID|id',
	2 => 'WID',
	3 => 'WMR',
	4 => 'Сумма',
	5 => 'Статус|status',
	6 => 'Дата'.'|date',
);

$p=$pay->GetSortTable("1",$cols, get_get('sort', 1), get_get('page', 1), get_get('perpage', 25));
$smarty->assign("TABLE",$p);
Display('pay.tpl');
?>