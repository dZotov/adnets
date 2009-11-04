<?
function smarty_function_ctr($params) {
	$attr = get($params, 'params');
	$block = get($params, 'block');
	$companyid = get($params, 'company_id');
	
	if($block)
	{
		if($attr["block_clicks"])
			return round(($attr["block_clicks"]/$attr['block_shows'])*100,2);
		else
			return 0;
	}
	else
	{
		if($attr['clicks'])
			return round(($attr['clicks']/$attr['shows'])*100,2);
		else
			return 0;
	}
}

?>