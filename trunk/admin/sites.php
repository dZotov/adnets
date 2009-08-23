<?
//$AUTH = 'member';
include('./include/init.php');

$site= new Sites();

$cols = array(
	1 => 'ID|id',
	2 => 'WID',
	3 => 'Название|name',
	4 => 'URL',
	5 => 'Статус|status',
	6 => 'Дата'.'|date',
	7 => 'Действие',
);

$s=$site->GetSortTable("1",$cols, get_get('sort', 1), get_get('page', 1), get_get('perpage', 25));
$smarty->assign("TABLE",$s);
Display('sites.tpl');
?>