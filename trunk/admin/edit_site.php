<?
include('./include/init.php');

$id = (int)get_get('id');
$site= new Playgrounds($id);

$f = new Form('adw', $site);

if (get_get('mode') == 'delete') {
	$site->Delete();
	redirect(get($_SERVER, 'HTTP_REFERER', 'sites.php'));
}

require_once('./form/edit_site.php');

if($f->Filled()) {
	$f->SaveToEntity();
	$site->Save();
	redirect('edit_site.php?id='.$site->GetId()."&save=ok");
}

$ad= new Adwerts($site->Get('adid'));



$smarty->assign('FORM', $f->HTML);
$smarty->assign('ADWERT', $ad->attr);

$smarty->assign('MENU_SD', 'sites');
Display('edit_site.tpl');
?>