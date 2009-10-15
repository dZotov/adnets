<?
//teaserid:blockid:url:adwert
function smarty_function_link($params) {
	$attr = get($params, 'attr');
	$blockid = get($params, 'block');
	$url=$attr['id']."|".$blockid."|".$attr['url']."|".$attr['adid'];
	
	//return "http://stat.adnets.ru/out.php?attr=".str_replace("=","",base64_encode($url));
	return "http://localhost/seo/adnets/stat/out.php?attr=".str_replace("=","",base64_encode($url));
}

?>