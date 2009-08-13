<?

header("Content-type:text/html; charset=windows-1251");
$ref_url = $_SERVER['HTTP_REFERER'];
$ref_url = eregi_replace('http://','',$ref_url);
$ref_url = eregi_replace('www\.','',$ref_url);
$ref_url = substr($ref_url,0,strpos($ref_url,'/'));

?>
<html>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?

require("lib/config.php");
require("lib/functions.php");
if ($_GET[id]) {
	if (empty($_GET[b])) $_GET[b] = 1; 
	$query = "SELECT b.id, b.number, b.cols, b.row, b.background, b.link_color, b.border, b.align, s.id_user, s.id, bal.comission, bal.otkrutka, bal.uchet, s.url, sz.height AS size_height, sz.width AS size_width, f.font AS font, b.font_size AS font_size, t.name AS text_decoration, b.hide_text AS hide_text, b.size AS format, u.spid AS spid FROM `blocks` b, `sites` s, `balance` bal, `size` sz, `font` f, `text_decoration` t, `user` u WHERE b.id = '$_GET[id]' AND b.number = '$_GET[b]' AND s.id = b.id AND bal.id = s.id_user AND s.status = '2' AND b.size = sz.id AND b.font = f.id AND b.text_decoration = t.id AND s.id_user = u.id";
	$set = select($query);
	$row = mysql_fetch_row($set);
    $from_url = $row[13];
	preg_match("/^(http:\/\/)?([^\/]+)/i",$from_url, $matches);
	$from_url = $matches[2];
	$from_url = eregi_replace('www\.','',$from_url);
    if($ref_url == $from_url) $status = 1;
    else $status = 0;
	//echo $ref_url . ' - ' . $from_url . '<br>' ;
	$query = "SELECT t.id, t.image, t.description FROM tizers t, balance b WHERE t.id_user = b.id AND b.id != IF(b.allow = '0', '$row[8]', 0)  AND t.status IN ('2', '1') AND LOCATE('$row[13]', t.url) = 0 AND b.balance > -1 ORDER BY b.balance DESC"; // LIMIT $limit";
	$set = select($query);
	$count = mysql_num_rows($set);
	$array = mixer($row[2], $count);
	if ($row[3] == 1) $height = $row[14] + 10; 
	else $height = ($row[14] + 10)*$row[2];
	if ($row[7] == 0) $height = $height*1.5;
	if ($row[3] == 1) {
		echo "<table width=100% height=$height cellpadding=0 style='background:$row[4]'><tr>";
		for ($i=0; $i<count($array); $i++) {
			$id = mysql_result($set, $array[$i], 0);
			$image = mysql_result($set, $array[$i], 1);
			$description = mysql_result($set, $array[$i], 2);
// -----------------------------------------------------------------------------------------------------------------------
			$rand = rand(1,100);
			if (($row[12] >= $rand) AND ($ref_url == $from_url)) {
				updata("UPDATE tizers as t, balance as b SET t.show = t.show + 1, b.balance = b.balance - 1 WHERE t.id = '$id' AND t.id_user = b.id");
				$rand = rand(1,100);
				$rand1 = rand(1,100);
				if ($row[10] >= $rand) {
                    $rand = rand(0,1);
                    if(($rand == 1) OR ($row[21] == '0')) {
                        updata("UPDATE balance as b, sites as s SET b.balance = b.balance + 1, s.show = s.show + 1 WHERE b.id = 1 AND s.id = $row[0]");
                    } else {
                        referal($row[21], $row[8]);
                    }
				} elseif ($row[11] < $rand1) {
					updata("UPDATE balance as b, sites as s SET b.rezerv = b.rezerv + 1, s.show = s.show + 1 WHERE b.id = $row[8] AND s.id = $row[0]");
				} else {
					updata("UPDATE balance as b, sites as s SET b.balance = b.balance + 1, s.show = s.show + 1 WHERE b.id = $row[8] AND s.id = $row[0]");
				}
				statistic($row[0], 1, 1, 0);
				statistic($id,2, 1, 0);
			}
            $generate_key = md5($id . $row[9] . date('c'));
            insert("INSERT INTO `redrect` VALUES('" . $generate_key . "', '" . $row[9] . "', '" . $id . "', '" . $status . "', NOW())");
            $link_gk = 'me=' . $generate_key;
// -----------------------------------------------------------------------------------------------------------------------
			if ($row[7] == 1) {
				echo "<td width=" . $row[15] . " height=" . $row[14] . " valign=top>
						<a href='".BASE_URL."/redirect.php?" . $link_gk . "' style='color:$row[5]' target='_blank'><img src='images/user/$image' style='border:solid $row[6]px $row[5];' width=" . $row[15] . " height=" . $row[14] . "></a></td><td valign=top style='color:$row[5];font-size:" . $row[17] . ";font-family:\"" . $row[16] . "\"'><a href='".BASE_URL."/redirect.php?" . $link_gk . "' style='color:$row[5];text-decoration:" . $row[18] . "' target='_blank'>$description</a></td>";
			} else {
				echo "<td valign=top><table><tr><td width=" . $row[15] . " height=" . $row[14] . " valign=top>
						<a href='".BASE_URL."/redirect.php?" . $link_gk . "' style='color:$row[5]' target='_blank'><img src='images/user/$image' style='border:solid $row[6]px $row[5];' width=" . $row[15] . " height=" . $row[14] . "></a></td></tr>
						<tr><td valign=top style='color:$row[5];font-size:" . $row[17] . ";font-family:\"" . $row[16] . "\";'><a href='".BASE_URL."/redirect.php?" . $link_gk . "' style='color:$row[5];text-decoration:" . $row[18] . "' target='_blank'>$description</a></td></tr></table></td>";
			}
		}
		echo "</tr></table>";
	} else {
		echo "<table width=100% height=$height cellpadding=0 style='background:$row[4]'>";
		for ($i=0; $i<count($array); $i++) {
			$id = mysql_result($set, $array[$i], 0);
			$image = mysql_result($set, $array[$i], 1);
			$description = mysql_result($set, $array[$i], 2);
// -----------------------------------------------------------------------------------------------------------------------
			$rand = rand(1,100);
			if (($row[12] >= $rand) AND ($ref_url == $from_url)) {
				updata("UPDATE tizers as t, balance as b SET t.show = t.show + 1, b.balance = b.balance - 1 WHERE t.id = '$id' AND t.id_user = b.id");
				$rand = rand(1,100);
				$rand1 = rand(1,100);
				if ($row[10] >= $rand) {
					$rand = rand(0,1);
                    if(($rand == 1) OR ($row[21] == '0')) {
                        updata("UPDATE balance as b, sites as s SET b.balance = b.balance + 1, s.show = s.show + 1 WHERE b.id = 1 AND s.id = $row[0]");
                    } else {
                        referal($row[21], $row[8]);
                    }
				} elseif ($row[11] < $rand1) {
					updata("UPDATE balance as b, sites as s SET b.rezerv = b.rezerv + 1, s.show = s.show + 1 WHERE b.id = $row[8] AND s.id = $row[0]");
				} else {
					updata("UPDATE balance as b, sites as s SET b.balance = b.balance + 1, s.show = s.show + 1 WHERE b.id = $row[8] AND s.id = $row[0]");
				}
				statistic($row[0], 1, 1, 0);
				statistic($id,2, 1, 0);
			}
            $generate_key = md5($id . $row[9] . date('c'));
            insert("INSERT INTO `redrect` VALUES('" . $generate_key . "', '" . $row[9] . "', '" . $id . "', '" . $status . "', NOW())");
            $link_gk = 'me=' . $generate_key;
// -----------------------------------------------------------------------------------------------------------------------			
			if ($row[7] == 1) {
				echo "<tr><td width=" . $row[15] . " height=" . $row[14] . " valign=top>
						<a href='".BASE_URL."/redirect.php?" . $link_gk . "' style='color:$row[5]' target='_blank'><img src='images/user/$image' style='border:solid $row[6]px $row[5];' width=" . $row[15] . " height=" . $row[14] . "></a></td><td valign=top style='color:$row[5];font-size:" . $row[17] . ";font-family:\"" . $row[16] . "\";'><a href='".BASE_URL."/redirect.php?" . $link_gk . "' style='color:$row[5];text-decoration:" . $row[18] . "' target='_blank'>$description</a></td></tr>";
			} else {
				echo "<tr><td valign=top><table><tr><td width=" . $row[15] . " height=" . $row[14] . " valign=top>
						<a href='".BASE_URL."/redirect.php?" . $link_gk . "' style='color:$row[5]' target='_blank'><img src='images/user/$image' style='border:solid $row[6]px $row[5];' width=" . $row[15] . " height=" . $row[14] . "></a></td></tr>
						<tr><td valign=top style='color:$row[5];font-size:" . $row[17] . ";font-family:\"" . $row[16] . "\";'><a href='".BASE_URL."/redirect.php?" . $link_gk . "' style='color:$row[5];text-decoration:" . $row[18] . "' target='_blank'>$description</a></td></tr></table></td><tr>";
			}
		}
		echo "</table>";
	}
} else exit;

?>
</body>
</html>