<?php

function smarty_function_page_navigation($params, &$smarty) {
	$o = '';
	$first = 1;
	$last = $params['total'];
	$page = intval($params['page']);
	if ($page < 1)
		$page = 1;
	if ($page > $last)
		$page = $last;
	
	$opts = $_GET;
	
	$opts['page'] = $page-1;
	
	$start = $first;
	$end = $last;
	if ($start < $page-5) {
		$o .= ' ... ';
		$start = $page-5;
	}
	if ($end > $start + 10) {
		$end = $start + 10;
	}
	for($i = $start; $i <= $end; $i++) {
		$opts['page'] = $i;
		if ($page == $i)
			$o .= '<span class="b">'.$i.'</span> ';
		else
			$o .= '<a href="'.make_self_url($opts).'" class="nu">'.$i.'</a> ';
		if($i != $end) 
			$o .= ' <span style="color:#999999">|</span> ';	
	}
	
	if ($end < $last) {
		$o .= ' ... ';
	}
	
	$opts['page'] = $page+1;
	
	$_SESSION['last_page'] = $page;	
	return $o;
}

?>
