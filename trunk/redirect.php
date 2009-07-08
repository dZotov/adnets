<?

require("lib/config.php");
require("lib/functions.php");
if (isset($_GET['me'])) {
// Начало изменений
    $set = select("SELECT * FROM `redrect` WHERE `key` = '" . $_GET['me'] . "'");
    if(mysql_num_rows($set) > 0) {
        $key = mysql_fetch_row($set);
// Конец изменений   
        $ref_url = $_SERVER['HTTP_REFERER'];
        $ref_url = ereg_replace('http://','',$ref_url);
        $ref_url = substr($ref_url,0,strpos($ref_url,'/'));
        $ip = IPDetect();
    
        $query = "SELECT s.id_user, s.url FROM `sites` s WHERE s.id = '" . $key[1] . "'";
        $set = select($query);
        $row = mysql_fetch_row($set);
        $id_to = $row[0];
        $from_url = $row[1];
        preg_match("/^(http:\/\/)?([^\/]+)/i",$from_url, $matches);
        $from_url = $matches[2];
        $query = "SELECT COUNT(*) FROM `history_referal` WHERE `ip` = '$ip' AND `to` = '" . $key[1] . "' AND `from` = '" . $key[2] . "' AND `date` > SUBDATE(NOW(), INTERVAL 27 HOUR)";
        $set = select($query);
        $cont = mysql_fetch_row($set);
        $set = select("SELECT `url` FROM `tizers` WHERE `id` = $key[2]"); // Перебросить
        $url = mysql_result($set, 0, 0);
        if (($cont[0] == '0') AND ($key[3] == 1)) {

            updata("UPDATE sites as s, tizers as t SET s.cliks = s.cliks + 1, t.cliks = t.cliks + 1 WHERE s.id = '$key[1]' AND t.id = '$key[2]'");
            insert("INSERT INTO `history_referal` VALUES('', '$id_to', '$cash_to', '$key[1]', '$id_from', '$cash_from', '$key[2]', '$sponcor', '$cash_referal', '$ip', NOW())");
            statistic($key[1],1, 0, 1);
            statistic($key[2],2, 0, 1);
        }
        insert("DELETE FROM `redrect` WHERE `key` = '" . $_GET['me'] . "'");
    } else {
        $url = BASE_URL;
    }
} else {
	$url = BASE_URL;
}
header("Location: $url");

?>