<?
$AUTH = 'free';
include("./include/init.php");
check_auth();
$id= (int) get_get('id');
$news= new News($id);
if($news->GetId())
{
	$smarty->assign("DATA",$news->attr);
}
$smarty->assign("PAGE_TITLE","AdNets.ru Новости ".$news->attr['title']);
$smarty->assign("MENU_SD",'news');
Display("news_view.tpl");
?>