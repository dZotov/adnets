<?

function smarty_modifier_human($content, $type) {
	$arr =& $GLOBALS[strtoupper($type)];
	if (array_key_exists($content,$arr))
		$v =  $arr[$content];
	else
		$v = $arr[intval($content)];

	return $v;
}

?>