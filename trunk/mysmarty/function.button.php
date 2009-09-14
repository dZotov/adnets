<?

function smarty_function_button($params) {
	$title = get($params, 'title');
	$href = get($params, 'href');
	
<<<<<<< .mine
	$html = '<input type="button" class="button" value=" '.$title.' " alt="'.$title.'" />';
=======
	$html = '<input type="button" class="button2" value=" '.$title.' " />';
>>>>>>> .r21
	return $html;
}

?>