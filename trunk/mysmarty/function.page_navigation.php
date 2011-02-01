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
	if ($end > $start + 20) {
		$end = $start + 20;
	}
	
	$html = '';
	
	for($i = $start; $i <= $end; $i++) {
		$opts['page'] = $i;
		if ($page == $i)
			$html .= '<span>'.$i.'</span>';
		else
			$html .= '<a href="'.make_self_url($opts).'">'.$i.'</a>';
		
	}
	
	if ($end < $last) {
		$html .= ' <span>...</span>';
	}
	
	
	$opts['page'] = $page+1;
	
	$_SESSION['last_page'] = $page;	
	return $html;
}

?>
