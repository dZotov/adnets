<?php


// Copy current URL while adding/changing/removing some parameters
// Parameters starting with underscore will be removed

function smarty_function_self_url($params, &$smarty) {
	$opts = $_GET;
	foreach ($params as $key=>$value) {
		if ($key[0]!='_')
			$opts[$key] = $value;
		else
			unset($opts[substr($key,1)]);
	}
	
	return make_self_url($opts);
}

?>
