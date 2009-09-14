<?
include("./include/init.php");

$errors=array();

if(get_post('act')=='registration')
{
	
	$ad= new Adwerts();
	
	if(!$ad->ExistsByCond("email='".get_post('email')."'"))
	{
		$ad->Set("email",get_post('email'));
		$ad->Set("password",md5(get_post('password')));
		$ad->Set("wmr",get_post('wmr'));
		$ad->Set("status",1);
		$ad->Set("regdate",SqlDateTime());
		$ad->Save();
		setcookie("mode",get_post("start"),time()+99999,"/");
		
		echo "ok";
	}
	else
		echo "error";
	
}
?>