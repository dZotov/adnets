<?
//$AUTH = 'member';
include('./include/init.php');

$news= new News();

$cols = array(
	1 => 'ID|id',
	2 => 'Название|title',
	3 => 'Превью|preview',
	4 => 'Тип|type',
	5 => 'Статус|status',
	6 => 'Дата'.'|date',
	7 => 'Действие',
);

$n=$news->GetSortTable("1",$cols, get_get('sort', 1), get_get('page', 1), get_get('perpage', 25));
$smarty->assign("TABLE",$n);
Display('news.tpl');
?>