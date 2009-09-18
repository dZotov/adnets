<?
include("./include/init.php");

if(get_post("update"))
{
	$ad= new Adwerts($account_id);
	if($ad->GetId())
	{
		if(get_post("icq"))
			$ad->Set('icq',get_post("icq"));
		if(get_post("login_in_top"))
			$ad->Set('intop',get_post("login_in_top"));
		$ad->Save();
	}
	redirect("profile.php");
}

$smarty->assign("PAGE_TITLE","AdNets.ru Профиль");
Display("profile.tpl");
?>