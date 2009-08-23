<?
//$AUTH = 'member';
include('./include/init.php');

$ad= new Adwerts();

$cols = array(
	1 => 'ID|id',
	2 => 'Email|email',
	3 => 'Статус|status',
	4 => 'Дата регистрации'.'|regdate',
	5 => 'Действие',
);

$a=$ad->GetSortTable("1",$cols, get_get('sort', 1), get_get('page', 1), get_get('perpage', 25));
$smarty->assign("TABLE",$a);
Display('adwerts.tpl');
?>