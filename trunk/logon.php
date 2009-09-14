<?
include("./include/init.php");

if(isset($account_id))
	redirect('playgrounds.php');

$ad = new Adwerts();

if($ad->ExistsByCond("email='".get_post('email')."' AND password='".md5(get_post('password'))."' AND status='".STATE_ACTIVE."'"))
{
	$ad->LoadByCond("email='".get_post('email')."' AND password='".md5(get_post('password'))."'");
	$_SESSION['account_id'] = $ad->Get('id');
	redirect('playgrounds.php');
}
elseif(count($_POST))
	$smarty->assign("ERROR","Ошибка входа в систему! Проверьте введенные данные");
	
Display("logon.tpl");
?>