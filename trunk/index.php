<?
$AUTH = 'free';
include("./include/init.php");

if(get_get('owner_id'))
{
	setcookie("ref_id",(int)get_get('owner_id'),time()+99999,"/");
	redirect("index.php");
}	

if ($account_id) {
	$url = "playgrounds.php";
	if (IsAdv()) $url = "companies.php";
	redirect($url);
}

Display("index.tpl");
?>