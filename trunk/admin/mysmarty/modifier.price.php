<?

function smarty_modifier_price($content) {
	if ($content == 0.00) {
		return 0;
	}
	
 	return round($content, 2); 
}

?>