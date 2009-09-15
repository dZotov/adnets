<?
include("./include/init.php");
check_auth();
$news= new News();
$account_id=1;
$n=$news->GetManyByCond("status='".STATE_ACTIVE."' AND type=1");


$smarty->assign("DATA",$n);
$smarty->assign("PAGE_TITLE","AdNets.ru Новости");
Display("news.tpl");
?>