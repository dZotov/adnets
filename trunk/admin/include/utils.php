<?

function __autoload($class) {
	require_once ROOT_PATH.'classes/'.strtolower($class).'.php';
}

function get_param($name, $default = NULL) {
	return get($_POST, $name, get($_GET, $name, $default));
}


function get(&$arr, $key, $default=NULL) {
	if (is_array($arr) && array_key_exists($key, $arr))
		return $arr[$key];

	return $default;
}

function get_get($name, $default = NULL) {
	return get($_GET, $name, $default);
}

function get_post($name, $default = NULL) {
	return get($_POST, $name, $default);
}

function htmlQuote($t)	{
	return @htmlspecialchars($t);
}

function sqlQuote($t) {
	if (is_null($t)) return 'NULL';
	if (is_array($t)) return 'NULL';
	return "'".AddSlashes($t)."'";
}

function get_param_checkbox($name, $default = UNDEF) {
	if (strpos($name, '.') !== false) {
		$a = explode('.', $name);
		$name = $a[1];
		$form = $a[0];
	} else {
		$form = NULL;
	}
	if (count($_POST)) {
		if (!array_key_exists($name, $_POST)) // Checkbox unchecked
			$_POST[$name] = NULL;
		return get($_POST, $name);
	}
	if (($form) && array_key_exists("posted_$form", $_SESSION))
		return get($_SESSION, "posted_{$form}_$name", $default);
	
	return $default;
}

function get_param_cbarray($name, $n = 1, $default = 0) {
	$result = 0;
	$list = array();
	foreach($n as $k => $v) {
		if (get_param_checkbox("{$name}_$k", $default & (1<<$k))) {
			$list[] = $k;	
		}
		
	}
	
	return $list;
}

function get_param_date($name, $default = NULL) {
	$y = get_param("{$name}_2");
	$m = get_param("{$name}_1");
	$d = get_param("{$name}_0");
	$out = sprintf('%04d-%02d-%02d', $y, $m, $d);
	if (is_null($y) and is_null($m) and is_null($d))
		$out = $default;
	return $out;
}

function get_microtime() { 
	list($usec, $sec) = explode (" ", microtime()); 
	return $usec + $sec; 
}

function get_microtime_end() {
   $round = 3;
   defined('SCRIPTTIME_START') ? $return = round((get_microtime() - SCRIPTTIME_START), $round): $return = "";
   return $return;
} 

function StartScript() { 
	list($usec, $sec) = explode (" ", microtime()); 
	return $usec + $sec; 
}

function EndScript() {
	global $smarty;
	$round = 3;
	defined('SCRIPTTIME_START') ? $return = round((StartScript() - SCRIPTTIME_START), $round): $return = "";
  	$smarty->assign('SCRIPT_TIME', $return);
	return $return;
} 

function redirect($url) {
	header("Location: $url");
	die();
}

function sqlDate($time = NULL) {
	if ($time) 
		return date('Y-m-d',$time);
	return date('Y-m-d');
}

function sqlTime() {
	return date("H:i:s");
}

function sqlDateTime() {
	if (!isset($GLOBALS['sqlDateTime'])) {
		$GLOBALS['sqlDateTime'] = one_result("SELECT NOW()");
	}
	return $GLOBALS['sqlDateTime'];
}

function DisableCache() {
	Header("Expire: Mon 10 Apr 1998 01:01:01 GMT");
	Header("Cache-Control: no-cache, must-revalidate");
	Header("Pragma: no-cache");
	Header("Last-Modified: ".gmdate("D, d M Y H:i:s")."GMT");
}
 
function ip() {
	return $_SERVER['REMOTE_ADDR'];
}

function auth($auth) {
	global $smarty;
	
	$account_id = get($_SESSION, 'account_id',0);
	
	if ($auth == 'free') {
		return;
	}
		
	// $acc = new Account($account_id);
	if($auth == 'member' && $account_id) {
		$GLOBALS['account_id'] = $account_id;
		$smarty->assign('ACCOUNT_ID', $account_id);
		//$smarty->assign('ACCOUNT', $acc->attr);	
		return true;
	}
	
	redirect('logon.php');
	
}

function is_admin() {
	return get($_SESSION, 'is_admin');
}

function is_member() {
	return get($_SESSION, 'account_id');
}

function Logout() {
	$_SESSION['account_id'] = NULL;
}

function attribs2string($attr) {
	$s = '';
	foreach($attr as $key => $val)
		if ($key[0] != '_')
			$s .= " $key=\"".htmlQuote($val).'"';
	return $s;
}

function make_url($target, $options = array()) 	{
	$allopt = $options;
	$result = $target;
	$sepa = (strpos($target, '?') === false) ? '?' : $sepa = '&amp;';

	foreach ($allopt as $key => $val) {
		if ($key == '#') continue;
		if (!$val) {
			$result .= $sepa . $key;
		}
		elseif (is_scalar($val)) {
			$result .= $sepa . $key .'='. (($val === NULL || $val == '') ? '' : (urlencode($val)));
		}
		elseif (is_array($val)) {
			foreach($val as $v) {
				$result .= $sepa . urlencode($key.'[]') .'='. (($v === NULL || $v == '') ? '' : (urlencode($v)));
				$sepa = '&';
			}
		} else continue;
		$sepa = '&';
	}

	if (get($allopt, '#'))
		$result .= '#' . get($allopt, '#');

	if(!count($allopt))
		$result .= '?';

	return $result;
}

function make_self_url($options = array()) {
	return make_url($_SERVER['PHP_SELF'], $options);
}

function self_url($params = array()) {
	$opts = $_GET;
	foreach ($params as $key=>$value) {
		if ($key[0] != '_') {
			$opts[$key] = $value;
		} else {
			unset($opts[substr($key,1)]);
		}
	}
	return make_self_url($opts);
}

function error($text) {
	global $ERRORS;
	$ERRORS[] = $text;
}

function GetDay($date) {
	$date = explode(" ", $date);
	$m = explode('-', $date[0]);
	$day = (int) $m[2];
	return $day;
}

function GetHour($date) {
	$date = explode(" ", $date);
	$m = explode(':', $date[1]);
	return($m[0]);
}

function GetMonth($date) {
	$m = explode('-', $date);
	@$m = (int) $m[1];
	return($m);
}

function GetYear($date) {
	$m = explode('-', $date);
	return($m[0]);
}

function NewDate($date, $period) {
	return date('Y-m-d', strtotime($date.$period)); 
}

function DateDiff($interval, $date1, $date2) {
	$datearr1 = explode('-', $date1);
	$datearr2 = explode('-', $date2);
	
	$date1 = @mktime(0, 0, 0, $datearr1[1], $datearr1[2], $datearr1[0]);
	$date2 = @mktime(0, 0, 0, $datearr2[1], $datearr2[2], $datearr2[0]);
	
	$timedifference = $date2 - $date1;

	switch ($interval) {
        case 'w':
            $retval = $timedifference/604800;
            break;
        case 'd':
            $retval = $timedifference/86400;
            break;
        case 'h':
            $retval =$timedifference/3600;
            break;
        case 'n':
            $retval = $timedifference/60;
            break;
        case 's':
            $retval = $timedifference;
            break;
    }
 
	return $retval;
}

function DateFormat($string, $format = "%e %b  %Y", $default_date = NULL) {
	require_once ROOT_PATH.'./include/smarty/Smarty.class.php';
	$smarty = new Smarty();
	require_once $smarty->_get_plugin_filepath('modifier','date_format');
	
	return smarty_modifier_date_format($string,  "%d.%m.%Y");
}

function GenCode($account_id = NULL) {	
	$code = '';
	if ($account_id) {
		$code .= $account_id.'-';
	}
	for($i = 0; $i < 8; $i++) {
		$code .= rand(0, 9);
	}
	
	$s = new MtCode();	
	$cond = "code = '".$code."'";
	if ($code == NULL || $code == 'NULL' || $code == '' || is_null($code) || !isset($code) || $s->ExistsByCond($cond)) {
		return GenCode(); 
	}
	
	return $code;	
}

function GenPromoCode($account_id = NULL) {	
	$code = 'S';
	if ($account_id) {
		$code .= $account_id.'-';
	}
	for($i = 0; $i < 8; $i++) {
		$code .= rand(0, 9);
	}
	
	$s = new MtPromo();
	$s->Init($account_id);	
	$cond = "code = '".$code."'";
	if ($code == NULL || $code == 'NULL' || $code == '' || is_null($code) || !isset($code) || $s->ExistsByCond($cond)) {
		return GenPromoCode(); 
	}
	
	return $code;	
}

//~ function ParseCode($str) {
	//~ $n = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
	//~ $l = strlen($str);
	
	//~ $pid = '';
	//~ for($i = 0; $i < $l; $i++) {
		//~ $j = $str[$i];
		//~ if (in_array($j, $n)) {
			//~ $pid .= $j;
		//~ }
	//~ }
	
	//~ return $pid;
//~ }






function Display($template, $cache_id = NULL) {
	global $smarty, $DB_QUERY;
	
	if (get_get('debug')) {
		echo "<div class=\"ac s10\">DB query: {$DB_QUERY} | Script time: ".EndScript()."</div>";
	} else {
		$smarty->display($template, $cache_id);
	}
}


function Get_Date($date) {
	$date = explode(" ", $date);
	return get($date, 0);
}

function die_script() {
	$date = sqlDateTime();
	$hour = GetHour($date);
	echo "Hour: {$hour} <br /><br />";
	if ($hour < 9 || $hour > 21) {
		die();
	}
}


function DateByWeek($week) {
	$d_cond = ("SELECT NOW() - INTERVAL 49-".$week." WEEK");
	$last_date = one_result($d_cond);
	
	if ($week === 0) {
		$week_start_date = date('Y-m-d ', strtotime("2008-01-01"));
		$week_end_date =  date('Y-m-d ', strtotime($week_start_date."+7 DAY"));
	} else {
		if ($week == 1) {
			$week_start_date = date('Y-m-d ', strtotime("2008-01-07"));
		} else {
			$week--;
			$week_start_date = date('Y-m-d ', strtotime("2008-01-07 +$week WEEK"));
		}
		
		$week_end_date = date('Y-m-d ', strtotime($week_start_date."+6 DAY"));
	} 
	
	$result['date_begin'] = $week_start_date."00:00:00";
	$result['date_end'] = $week_end_date."23:59:59";
	return $result;
}


function IsIMG($type) {
	global $IMG_MIME_TYPE;
	
	if (array_key_exists($type, $IMG_MIME_TYPE)) {
		return true;
	}
	
	return false;
}


function from_url($url,$cat,$name)
{
	if(eregi("jpg|jpeg",$url)) 
	{
				
		$file = fopen($url,"r");
		$in="";
		while(!feof($file))
		{
			$in .=fread($file,1024);
		}
		
		$ava= new Avatar();
		$ava->Set('cat_id',$cat);
		$ava->Set('name',$name);
		$ava->Save();
		$id=$ava->GetId();
		
		$file1 = fopen("../avatar/{$id}.jpg","w+");

		fwrite($file1,$in);
		fclose($file);
		fclose($file1);
	}
}

?>