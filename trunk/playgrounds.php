<?
include("./include/init.php");
check_auth();
$pl= new Playgrounds();

$p=$pl->GetManyByCond("adid='{$account_id}'");


$smarty->assign("DATA",$p);
$smarty->assign("MENU_SD",'play_gr');
$smarty->assign("STATUS_LIST",$STATUS_LIST);
$smarty->assign("PAGE_TITLE","AdNets.ru Площадки");
Display("playgrounds.tpl");
?>