<?

function smarty_modifier_text($c) {
	$c = stripslashes($c);
	$c = str_replace("\n", "<br />", $c);
	
	return $c;
}

?>