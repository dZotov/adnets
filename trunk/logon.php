<?
$AUTH = "free";
include("./include/init.php");

$url = "playgrounds.php";
	if (IsAdv()) $url = "companies.php";

if ($account_id) redirect($url);

$ad = new Adwerts();

$ad->LoadByCond("email='".get_post('email')."' AND password='".md5(get_post('password'))."'");
if ($ad->GetId()) {
	$_SESSION['account_id'] = $ad->GetId();
	
	if (!get($_COOKIE, 'user_type')) {
		SetCookie("user_type", 1, time() + 3600*360*360, "/");
	}
	
	redirect($url);
}
elseif(count($_POST))
	$smarty->assign("ERROR","Ошибка входа в систему! Проверьте введенные данные");
	
Display("logon.tpl");
?>