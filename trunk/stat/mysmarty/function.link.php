<?
//teaserid:blockid:url:adwert:companyid:ref
function smarty_function_link($params) {
	$attr = get($params, 'attr');
	$blockid = get($params, 'block');
	$ref = get($params, 'ref');
	$url=$attr['id']."|".$blockid."|".$attr['url']."|".$attr['adid']."|".$attr['companyid']."|".$ref;
	
	return "http://stat.adnets.ru/out.php?attr=".str_replace("=","",base64_encode($url));
	//return "http://localhost:88/seo/adnets/stat/out.php?attr=".str_replace("=","",base64_encode($url));
}

?>