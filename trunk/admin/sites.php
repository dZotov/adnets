<?
//$AUTH = 'member';
include('./include/init.php');

$site= new Sites();

$cols = array(
	1 => 'ID|id',
	2 => 'WID',
	3 => '��������|name',
	4 => 'URL',
	5 => '������|status',
	6 => '����'.'|date',
	7 => '��������',
);

$s=$site->GetSortTable("1",$cols, get_get('sort', 1), get_get('page', 1), get_get('perpage', 25));
$smarty->assign("TABLE",$s);
Display('sites.tpl');
?>