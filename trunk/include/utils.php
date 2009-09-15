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
	return trim(get($_GET, $name, $default));
}

function get_post($name, $default = NULL) {
	return trim(get($_POST, $name, $default));
}

function htmlQuote($t)	{
	return @htmlspecialchars($t);
}

function sqlQuote($t) {
	if (is_null($t)) return 'NULL';
	if (is_array($t)) return 'NULL';
	return "'".AddSlashes($t)."'";
}

function redirect($url) {
	header("Location: $url");
	die();
}

function redirect_posted() {
	$url = get($_SERVER, 'REQUEST_URI');
	header("Location: $url");
	die();
}

function sqlDate($time = NULL) {
	if ($time) 
		return date('Y-m-d',$time);
	return date('Y-m-d');
}

function sqlDateTime() {
	if (!isset($GLOBALS['sqlDateTime'])) {
		$GLOBALS['sqlDateTime'] = date("Y-m-d H:i:s"); // one_result("SELECT NOW()");
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

function Logout() {
	global $account_id;
	
	$acc = new Account($account_id);
	$o = new Online();
	$o->DeleteByCond("account_id = '{$account_id}'");	
	
	$acc = new Account($account_id);
	$acc->Set('model_status', 0);
	$acc->Set('user_status', 0);
	$acc->Set('model_id', 0);
	$acc->Save();
	
	$hash = 'GUEST_'.md5(time());
	SetCookie('hash', $hash);
	
	unset($_SESSION['account_id']) ;
	unset($_SESSION['uid']) ;
}

function attribs2string($attr) {
	$s = '';
	foreach($attr as $key => $val)
		if ($key[0] != '_')
			$s .= " $key=\"".htmlQuote($val).'"';
	return $s;
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

function check_auth() {
	global $smarty;
	
	$account_id = get($_SESSION, 'account_id');
		
	$ad = new Adwerts($account_id);
	if($ad->GetId()) 
	{
		$GLOBALS['account_id'] = $ad->GetId();
		$GLOBALS['account'] = $ad;
		$smarty->assign('ACCOUNT_ID', $ad->GetId());
		$smarty->assign('ACCOUNT', $ad->attr);
		return true;
	} 		
	redirect('logon.php');
}

function gen_dir($path) {
	$w = array("a","b","c","d","e","f","j","k","m","n","p","r","s","t","u","v","w","x","y","z");
	$rand0 = rand(10,99);
	$rand1 = $w[rand(0,19)];
	$rand2 = rand(10,99);
	$rand3 = $w[rand(0,19)];
	
	$new_dir = $rand0.$rand1.$rand2.$rand3;
	if(is_dir($path.$new_dir)) {
		gen_dir($path);
	}
	return $new_dir;
}

function make_url($target, $options = array()) 	{
	$allopt = $options;
	$result = $target;
	$sepa = (strpos($result, '?') === false) ? '?' : $sepa = '&amp;';

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



function NewDate($date, $period) {
	return date('Y-m-d', strtotime($date.$period)); 
}

function GetDay($date) {
	$date = explode(" ", $date);
	$m = explode('-', $date[0]);
	$day = $m[2];
	return $day;
}

function GetHour($date) {
	$date = explode(" ", $date);
	$m = explode(':', $date[1]);
	return($m[0]);
}

function GetMonth($date) {
	$m = explode('-', $date);
	@$m = $m[1];
	return($m);
}

function GetYear($date) {
	$m = explode('-', $date);
	return($m[0]);
}

function get_microtime_end() {
   $round = 3;
   defined('SCRIPTTIME_START') ? $return = round((get_microtime() - SCRIPTTIME_START), $round): $return = "";
   return $return;
} 

function get_microtime() { 
	list($usec, $sec) = explode (" ", microtime()); 
	return $usec + $sec; 
}

function DateDiff($interval, $date1, $date2) {
	$datearr1 = explode('-', $date1);
	$datearr2 = explode('-', $date2);
	
	$date1 = @mktime(0, 0, 0, $datearr1[1], $datearr1[2], $datearr1[0]);
	$date2 = @mktime(0, 0, 0, $datearr2[1], $datearr2[2], $datearr2[0]);
	
	$timedifference = $date2 - $date1;

	switch ($interval) {
        case 'w':
            $retval = bcdiv($timedifference, 604800);
            break;
        case 'd':
            $retval = bcdiv($timedifference, 86400);
            break;
        case 'h':
            $retval =bcdiv($timedifference, 3600);
            break;
        case 'n':
            $retval = bcdiv($timedifference, 60);
            break;
        case 's':
            $retval = $timedifference;
            break;
            
    }
 
	return $retval;
}

function resize($filename, $type) {
	global $IMG_MIME_TYPE;
	
	list($width, $height) = getimagesize($filename);

	$new_width = 130;
	$new_height = 130;
	$image_p = imagecreatetruecolor($new_width, $new_height);
	
	$type = get($IMG_MIME_TYPE, $type);
	switch ($type) {
		case 'bmp':
			$image = @ImageCreateFromWBMP($filename);
			break;
		case 'gif':
			$image = @ImageCreateFromGIF($filename);
			break;
		case 'jpg':
			$image = @ImageCreateFromJPEG($filename);
			break;
		case 'png':
			$image = @ImageCreateFromPNG($filename);
	}
	
	//~ $image = imagecreatefromjpeg($filename);
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

	// Output
	imagejpeg($image_p, $filename, 100);
}

function Display($template, $cache_id = NULL) {
	global $smarty, $DB_QUERY, $AJAX, $SUB_MENU, $HEAD_MENU_SD, $MENU_SUB_SD;
	if (get_get('debug')) {
		echo "<div class=\"ac s10\">DB query: {$DB_QUERY} | Script time: ".EndScript()."</div>";
	} else {
	
		if (count($AJAX)) {
			sajax_init();
			sajax_export($AJAX);
			sajax_handle_client_request();
		}
		
		$smarty->assign('SUB_MENU', get($SUB_MENU, $HEAD_MENU_SD));
		$smarty->assign('HEAD_MENU_SD', $HEAD_MENU_SD);
		$smarty->assign('MENU_SUB_SD', $MENU_SUB_SD);
		
		$smarty->display($template, $cache_id);
	}
}

function file_upload($name, $destination, $options = array()) {
	global $ERRORS;
	
	$file_name = $_FILES[$name]['name'];
	$filedata=$_FILES[$name];
	
	if (!is_array(get($_FILES, $name)) || get($filedata, 'error') != 0) {
		$ERRORS[] = "Ошибка при загрузке файла - {$file_name}";
	}
	
	if ($filedata['size'] > get($options, 'filesize', UPLOAD_MAX_SIZE))
		$ERRORS[] = "Файл слишком большой - {$file_name}";
		
	$tmpname = $filedata['tmp_name'];
	$chmod = get($options, 'chmod', 0640);

	$dest = $destination;
		
	if(move_uploaded_file($filedata['tmp_name'], ROOT_PATH.$dest)) {
		chmod(ROOT_PATH.$dest, $chmod);
		return true;
	} 
	
	return $ERRROS;
}

function human_size($size) {
	if ($size / 1048576 > 1)
		return round($size/1048576, 1) . 'MB';
	else if ($size / 1024 > 1)
		return round($size/1024, 1) . 'KB';
	else
		return round($size, 1) . 'bytes';
}

function IsIMG($type) {
	global $IMG_MIME_TYPE;
	
	if (array_key_exists($type, $IMG_MIME_TYPE)) {
		return true;
	}
	
	return false;
}

function IsOnline($id) {
	global $ONLINE;
	return (in_array($id, $ONLINE));
}

function redirect_301($url) {
	Header("HTTP/1.1 301 Moved Permanently"); 
	redirect($url);
}

function Card_cod($naminal) {
	$n=$naminal;
	$pin_rand0 = rand(0,9);
	$pin_rand1 = rand(0,9);
	$pin_rand2 = rand(0,9);
	$pin_rand3 = rand(0,9);
	$pin_rand4 = rand(0,9);
	$pin_rand5 = rand(0,9);
	$pin_rand6 = rand(0,9);
	$pin_rand7 = rand(0,9);
	$pin_rand8 = rand(0,9);
	$pin_rand9 = rand(0,9);
	$pin_rand9 = rand(0,9);
	$pin_rand10 = rand(0,9);
	//-----------------------------------------------	
	if($pin_rand0==0)
		$pin_rand0=1;
	$pin=$pin_rand0.$pin_rand1.$pin_rand2.$pin_rand3.$pin_rand4.$pin_rand5.$pin_rand6.$pin_rand7.$pin_rand8.$pin_rand9.$pin_rand10;
	//echo $pin."<br>";
	//-----------------------------------------------
	$card_rand0 = rand(0,9);
	$card_rand1 = rand(0,9);
	$card_rand2 = rand(0,9);
	$card_rand3 = rand(0,9);
	$card_rand4 = rand(0,9);
	$card_rand5 = rand(0,9);
	$card_rand6 = rand(0,9);
	//------------------------------------------------------
	if($card_rand0==0)
		$card_rand0=1;
	$card=$card_rand0.$card_rand1.$card_rand2.$card_rand3.$card_rand4.$card_rand5.$card_rand6;
	
	$c =new Cards();
	if($c->ExistsByCond("card='".$card."' AND pin='".$pin."'"))
		Card_cod($n);	
		
	
	return $card."|".$pin;	
}

function dateformat($string, $format = "%e %b  %Y", $default_date = NULL) {
	require_once ROOT_PATH.'./include/smarty/Smarty.class.php';
	$smarty = new Smarty();
	require_once $smarty->_get_plugin_filepath('modifier','date_format');
	
	return smarty_modifier_date_format($string,  "%d.%m.%Y");
}

function NewTransaction($opt = array()) {
	$acc = new Account(get($opt, 'account_id'));
	if ($acc->Get('wmid')) {
		$notes = get($opt, 'notes');
		$t = new Transaction();
		$t->Set("type", $opt['type']);
		$t->Set("cost", $opt['credits']);
		$partner_cost = $opt['credits'] * 0.20; 
		if ($acc->IsModel()) {
			$partner_cost = $opt['credits'] * 0.05; 
		}
		$t->Set("partner_cost", $partner_cost);
		$t->Set("wmid", $acc->Get('wmid'));
		$t->Set("tr_id", $opt['transaction_id']);
		$t->Set("date", sqlDateTime());
		$t->Set("notes", "{$notes}");
		$t->Save();
	} elseif ($acc->Get('pid')) {
		$opt['sid'] = 3;
		$opt['sum'] = $opt['credits'] * 0.25;
		$q = '?';
		if (get($opt, 'notes')) {
			$opt['notes'] = urlencode($opt['notes']);
		}
		foreach($opt as $k => $v) {
			$q .= "{$k}={$v}&";
		}
		$f = fopen("http://therussiankings.com/transaction/{$q}", "r");
		//~ $result = fread($f, 255);
		//~ echo $result;
	}
	
	
}

function black_ip() {
	$ip = new IP();
	
	if($ip->ExistsByCond("ip = '".$_SERVER['REMOTE_ADDR']."'")) {
		redirect("http://ebnvideo.com");
	}
	return true;
}

 // функция превода текста с кириллицы в траскрипт
function ru2en($st) {
    // Сначала заменяем "односимвольные" фонемы.
    $st = strtr($st,"абвгдеёзийклмнопрстуфхъыэ_ ", "abvgdeeziyklmnoprstufh'iei");
    $st = strtr($st, "АБВГДЕЁЗИЙКЛМНОПРСТУФХЪЫЭ_ ", "ABVGDEEZIYKLMNOPRSTUFH'IEI");
	
	// Затем - "многосимвольные".
	$st = strtr($st, array(
			"ж"=>"zh",
			"ц"=>"ts",
			"ч"=>"ch",
			"ш"=>"sh",
			"щ"=>"shch",
			"ь"=>"",
			"ю"=>"yu",
			"я"=>"ya",
			"Ж"=>"ZH",
			"Ц"=>"TS", 
			"Ч"=>"CH",
			"Ш"=>"SH",
			"Щ"=>"SHCH",
			"Ь"=>"",
			"Ю"=>"YU",
			"Я"=>"YA",
			"ї"=>"i",
			"Ї"=>"Yi",
			"є"=>"ie",
			"Є"=>"Ye"
		)
	);
	
	return $st;
}

function debug($array)
{
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}
?>