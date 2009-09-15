<?
include("./include/init.php");

if(get_get('owner_id'))
{
	setcookie("ref_id",(int)get_get('owner_id'),time()+99999,"/");
	redirect("index.php");
}	


if(isset($account_id))
	redirect('playgrounds.php');

Display("index.tpl");
?>