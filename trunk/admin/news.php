<?
//$AUTH = 'member';
include('./include/init.php');

$news= new News();

$cols = array(
	1 => 'ID|id',
	2 => '��������|title',
	3 => '������|preview',
	4 => '���|type',
	5 => '������|status',
	6 => '����'.'|date',
	7 => '��������',
);

$n=$news->GetSortTable("1",$cols, get_get('sort', 1), get_get('page', 1), get_get('perpage', 25));
$smarty->assign("TABLE",$n);
Display('news.tpl');
?>