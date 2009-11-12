<?
include('./include/init.php');

$id = (int)get_get('id');
$ad= new Adwerts($id);

$f = new Form('adw', $ad);

if (get_get('mode') == 'delete') {
	$ad->Delete();
	redirect(get($_SERVER, 'HTTP_REFERER', 'adwerts.php'));
}

require_once('./form/edit_adw.php');

if($f->Filled()) {
	$f->SaveToEntity();
	$ad->Save();
	redirect('edit_adw.php?id='.$ad->GetId()."&save=ok");
}

$smarty->assign('FORM', $f->HTML);

$smarty->assign('MENU_SD', 'adw');
Display('edit_adw.tpl');
?>