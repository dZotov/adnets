<?
include("./include/ajax_init.php");
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
		$ad->Set("owner_id",(int)get_post('owner_id'));
		$ad->Set("regdate", sqlDateTime());
		$ad->Save();
		setcookie("mode",get_post("start"),time()+99999,"/");
		
		echo "ok";
	}
	else
		echo "error";
	
}
if(get_post("act")=='add_pl')
{
	$mess="ok";
	if(get_post('id')=='undefined')
	{
		$pl = new Playgrounds();
		if(!$pl->ExistsByCond("url='".str_replace(array("http://","/"),"",get_post('url'))."'"))
		{
			$pl->Set('title',trim(get_post('title')));
			$pl->Set('url',trim(get_post('url')));
			$pl->Set('category',(int)get_post('cat'));
			$pl->Set('exclude',get_post('ignore'));
			$pl->Set('adid',get_post('adid'));
			$pl->Save();
			
		}
		else
			$mess="Площадка уже существует";
	}
	else
	{
		$pl = new Playgrounds(get_post('id'));
		if($pl->GetId())
		{
			$pl->Set('title',trim(get_post('title')));
			$pl->Set('url',trim(get_post('url')));
			$pl->Set('category',(int)get_post('cat'));
			$pl->Set('exclude',get_post('ignore'));
			$pl->Save();
		}
		else
			$mess="Произошла ошибка. Если она сново вопториться- обратитесь в службу поддержки";
	}
	
	echo $mess;
}

?>