<?
$AUTH = 'free';
include("./include/init.php");

$news = new News();
$n = $news->GetManyByCond("status='".STATE_ACTIVE."' AND type=1");

$smarty->assign("DATA", $n);
$PAGE_TITLE = $HEAD_TITLE = "Новости";
Display("news.tpl");
?>