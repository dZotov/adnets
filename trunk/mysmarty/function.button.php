<?

function smarty_function_button($params) {
	$title = get($params, 'title');
	$href = get($params, 'href');
	
	$html = '<input type="button" class="button2" value=" '.$title.' " />';
	return $html;
}

?>