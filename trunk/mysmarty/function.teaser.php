<?

function smarty_function_teaser($params) {
	global $TEASER_TYPES;
	
	$attr = get($params, 'attr');
	
	$src = "./images/nophoto.jpg";
	
	if (get($attr, 'id')) {
		$type = get($TEASER_TYPES, get($attr, 'type'));
		$src = "./stat/teaser/{$type}/{$attr['id']}.{$attr['format']}";
	}
	
	echo $src;
	
	//~ return $src;
}

?>