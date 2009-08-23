<?
include('./include/init.php');

$id = get_get('id');
$n = new News($id);

$f = new Form('news', $n);

if (get_get('mode') == 'delete') {
	$n->Delete();
	redirect(get($_SERVER, 'HTTP_REFERER', 'news.php'));
}

require_once('./form/edit_news.php');

if($f->Filled()) {
	$f->SaveToEntity();
	
	if(!$n->GetId())
		$n->Set('date', sqlDateTime());
	$n->Save();
	redirect('edit_news.php?id='.$n->GetId()."&save=ok");
}

$smarty->assign('FORM', $f->HTML);

$smarty->assign('MENU_SD', 'news');
Display('edit_news.tpl');
?>