<?

function smarty_function_sort_table($params) {
	$attr = get($params, 'attr');
	
	$img = '';
	$url = $attr[0];
	if ($attr[1]) {
		if (abs($attr[1]) == abs(get_get('sort'))) {
			if ($attr[1] < 0) {
				$img = '<img src="./images/up.gif" alt="^" />';
			} else {
				$img = '<img src="./images/bot.gif" alt="v" />';
			}
		}
		
		$img = '<a href="'.self_url(array('_sort' => '')).'&sort='.$attr[1].'">'.$img.'</a>';
		$url = '<a href="'.self_url(array('_sort' => '')).'&sort='.$attr[1].'">'.$attr[0].'</a>';
	}	
	
	$str = '<center><table class="sort_table"><tr><td>'.$url.'</td><td class="padt2 padl3">'.$img.'</td></tr></table></center>';
	return $str;
}

?>