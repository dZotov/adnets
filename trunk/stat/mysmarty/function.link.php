<?
//teaserid:blockid:url:adwert:companyid
function smarty_function_link($params) {
	$attr = get($params, 'attr');
	$blockid = get($params, 'block');
	$companyid = get($params, 'company_id');
	$url=$attr['id']."|".$blockid."|".$attr['url']."|".$attr['adid']."|".$companyid;
	
	//return "http://stat.adnets.ru/out.php?attr=".str_replace("=","",base64_encode($url));
	return "http://localhost:88/seo/adnets/stat/out.php?attr=".str_replace("=","",base64_encode($url));
}

?>