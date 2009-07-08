<?php

function cook ($log, $pass) {
	$log = strtolower (trim($log));
	$query = "SELECT count(*) from user where login = \"$log\" and password = \"$pass\";";
	if ($set = select ($query)) {
		$row = mysql_fetch_row ($set);
		if ($row[0] > 0) {
			$query = "SELECT `id`,`key` from user where login = \"$log\" and password = \"$pass\";";
			$set = select ($query);
			$row = mysql_fetch_array ($set);
			$return[0] = $row[id];
			$return[1] = $row[key];
			return $return;
		}
	}
	return false;
}
	
function identification ($login) {
	$query = "select login from user where (login = '$login')";
	$set = select ($query);
	$row = mysql_fetch_array ($set);
	if (($row['login'] == $login)) {
		return TRUE;
	} else {
		return false;
	}
}
 
function select ($a) {
	if ($link = connect ()) {
		if (!($pq=mysql_query ($a, $link))) {
			print("Не могу выполнить запрос!");
			print(mysql_errno() . ":" . mysql_error());
		} else {
			return $pq;
		}
	} else return false;
}
	
function insert ($query) {
	if ($link = connect ()) {
		if (!($pq=mysql_query ($query, $link))) {
			$alert = false;
		} else {
			$alert = mysql_insert_id ();
		}
	} else $alert = false;
	return $alert;
}

function updata ($query) {
	if ($link = connect ()) {
		if (!($pq=mysql_query ($query, $link))) {
			$alert = false;
		} else {
			$alert = true;
		}
	} else $alert = false;
	return $alert;
}

function connect () {
	$host = HOST_BD;
	$user = USER_BD;
	$password_bd = PASSWORD_BD;
	$bd_name = NAME_BD;
	$link = mysql_connect ($host, $user, $password_bd) or die ("Не могу подключиться к базе данных, обратитесь к
   														    	администратору");
     @mysql_query("SET NAMES CP1251");
     @mysql_query("SET COLLATION_CONNECTION=CP1251_GENERAL_CI");

	if (!$link) return false;
	if (!mysql_select_db ($bd_name)) return false;
	return $link;
}

function mixer($out, $count) {
	if ($out <= $count) {
		$i=0;
		while ($i<$out) {
			$flag = true;
			$rand = rand(0, $count-1);
			for ($j=0; $j<$i; $j++) {
				if ($rand == $array[$j]) $flag = false;
			}
			if ($flag) {
				$array[$i] = $rand;
				$i++;
			}
		}
	} else {
		while ($i<$count) {
			$flag = true;
			$rand = rand(0, $count-1);
			for ($j=0; $j<$i; $j++) {
				if ($rand == $array[$j]) $flag = false;
			}
			if ($flag) {
				$array[$i] = $rand;
				$i++;
			}
		}
	}
	return $array;
}

function alert($header, $messenge) {
$alert = '<table id="Table_01" width="387" height="231" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="2" height="36" rowspan="5" bgcolor="#000000">
			<img src="images/spacer.gif" width="2" height="36" alt=""></td>
		<td width="199" height="2" colspan="3" bgcolor="#000000">
			<img src="images/spacer.gif" width="199" height="2" alt=""></td>
		<td width="2" height="36" rowspan="5" bgcolor="#000000">
			<img src="images/spacer.gif" width="2" height="36" alt=""></td>
		<td width="183" height="17" colspan="2" rowspan="2" bgcolor="#FFFFFF">
			</td>
		<td>
			<img src="images/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="3" rowspan="3" bgcolor="green" width="199" height="32">
			<div align="center" style="color:#F3FFF1; font-family:arial;">
				<b>' . $header . '</b>
			</div>
		</td>
		<td>
			<img src="images/spacer.gif" width="1" height="15" alt=""></td>
	</tr>
	<tr>
		<td width="183" height="2" colspan="2" bgcolor="#000000">
			<img src="images/spacer.gif" width="183" height="2" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td width="181" height="17" rowspan="2" bgcolor="#F3FFF1">
			</td>
		<td width="2" height="17" rowspan="2" bgcolor="#000000">
			<img src="images/spacer.gif" width="2" height="17" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="15" alt=""></td>
	</tr>
	<tr>
		<td width="199" height="2" colspan="3" bgcolor="#000000">
			<img src="images/spacer.gif" width="199" height="2" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="2" width="19" height="194">
			</td>
		<td width="2" height="194" rowspan="2" bgcolor="#000000">
			<img src="images/spacer.gif" width="2" height="194" alt=""></td>
		<td colspan="3">
			<table id="Table_02" width="363" height="192" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td bgcolor="#F3FFF1" width="363" height="192">
						<div align="center" style="color:green; font-family:arial;padding:10 10 10 10">' .
							$messenge .
						'</div>
					</td>
				</tr>
			</table></td>
		<td width="2" height="194" rowspan="2" bgcolor="#000000">
			<img src="images/spacer.gif" width="2" height="194" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="192" alt=""></td>
	</tr>
	<tr>
		<td width="363" height="2" colspan="3" bgcolor="#000000">
			<img src="images/spacer.gif" width="363" height="2" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="17" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="180" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="181" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="2" height="1" alt=""></td>
		<td></td>
	</tr>
</table>';
print("$alert");
}

function header_of_form($header, $messenge) {
	$output = '<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td width="40%" height="5%">
			<div class="header" style="PADDING-RIGHT: 5px; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px">
				' . $header . '
			</div>
		</td>
		<td width="2" bgcolor="#2451a8" height="5%"><img src="images/spacer.gif" width="2"></td>
		<td height="5%">&nbsp;</td>
	</tr>
	<tr>
		<td height="2" bgcolor="#2451a8" colspan="3"></td>
	</tr>
	<tr>
		<td width="40%">
			&nbsp;
		</td>
		<td width="2" bgcolor="#2451a8"><img src="images/spacer.gif" width="2"></td>
		<td align="center" style="padding:10 10 10 10">' . $messenge . '</td>
	</tr>
</table>';
	return $output;
}

function month($m) {
	switch ($m) {
		case "1":
		$month = "Январь";
		break;
		case "2":
		$month = "Февраль";
		break;
		case "3":
		$month = "Март";
		break;
		case "4":
		$month = "Апрель";
		break;
		case "5":
		$month = "Май";
		break;
		case "6":
		$month = "Июнь";
		break;
		case "7":
		$month = "Июль";
		break;
		case "8":
		$month = "Август";
		break;
		case "9":
		$month = "Сентябрь";
		break;
		case "10":
		$month = "Октябрь";
		break;
		case "11":
		$month = "Ноябрь";
		break;
		case "12":
		$month = "Декабрь";
		break;
	}
	return $month;
}

function statistic($id, $sizer, $show, $cliks) {
	$set = select("SELECT COUNT(*) FROM `statistic` WHERE `id` = $id AND `sizer` = $sizer AND `date` = CURDATE()");
	$count = mysql_result($set, 0, 0);
	if ($count > 0) updata("UPDATE `statistic` SET `show` = `show` + $show, `cliks` = `cliks` + $cliks WHERE `id` = '$id' AND `sizer` = '$sizer' AND `date` = CURDATE()");
	else insert("INSERT INTO `statistic` VALUES('$id', '$sizer', '$show', '$cliks', CURDATE())");
}

function filter($st)
{
  $st=ereg_replace("[:;=\"\"'~#$%&()><?]","",$st);
  return $st;
}

function filterd($st)
{
  $st=ereg_replace("[:;=\"\"'~#%&()><?]","",$st);
  return $st;
}

function filterurl($st)
{
  $st=ereg_replace("[;\"\"'~#%!$()><]","",$st);
  return $st;
}

function sites($id_user, $i=null) {
	if ($i == 1) $id_u = "&id_u=$id_user";
	$query = "SELECT COUNT(*) FROM `sites` WHERE `id_user` = '$id_user'";
	$set = select($query);
	$row = mysql_fetch_row($set);
	if ($row[0] > 0) {
		echo "<table width=97% class='window' border='0' align='center' cellpadding='0' cellspacing='0'>
					<tr class='WindowHeader'>
						<td align=left>&nbsp;&#9643; <b>Сайты</b></td>
						<td align='right'>&#9679;&nbsp;</td>
					</tr>
					<tr bgcolor='#FFFFFF' class='Text1' align='center'><td colspan=2>
			<table width=100%><tr><td width='10%' class='TableHeader' align=center>ID</td><td width='50%' class='TableHeader'>Ресурс</td><td width='20%' class='TableHeader' align=center>Статус</td><td width='20%' class='TableHeader' align=center>Действие</td></tr>";
		$query = "SELECT s.id, s.url, s.name, s.show, s.cliks, st.status, s.status, s.title FROM sites s, status st WHERE s.id_user = '$id_user' AND st.id = s.status";
		$set = select($query);
		while ($row = mysql_fetch_row($set)) {
			if ($class == 'Table2') $class = 'Table1';
			else $class = 'Table2';
			$ctr = round($row[4]/$row[3]*100, 2);
			if ($row[6] == 2) $nabl = "<br>[<a href='block.html?id=$row[0]'>Настройка блока</a>]";
			echo "<tr onmouseover=bg_on(this); onmouseout=\"bg_off(this, '');\" class='$class'><td width='10%' align=center>$row[0]</td><td width='50%'>$row[1]<br>$row[2]<br>Показы: $row[3] клики: $row[4] CTR: $ctr</td><td width='20%' align=center><a title='$row[7]'>$row[5]</a></td><td width='20%'>[<a href='sites.html?delid=$row[0]$id_u' onclick=\"return confirmLink(this," . "'$row[1]'" . ")\">Удалить</a>]$nabl</td></tr>";
		}
		echo "</table></td></tr></table>";
	}
}

function referal($user_to, $user_from) {
	$set = select("SELECT COUNT(*) FROM `referal_history` WHERE `to_user` = '" . $user_to . "' AND `from_user` = '" . $user_from . "' AND `date` = CURDATE()");
	$count = mysql_result($set, 0, 0);
	if ($count > 0) updata("UPDATE `referal_history` SET `shows` = `shows` + 1 WHERE `to_user` = '" . $user_to . "' AND `from_user` = '" . $user_from . "' AND `date` = CURDATE()");
	else insert("INSERT INTO `referal_history` VALUES('" . $user_to . "', '" . $user_from . "', CURDATE(), '1' )");
    updata("UPDATE `balance` SET `balance` = `balance` + 1 WHERE `id` = '" . $user_to . "'");
}

function IPDetect() {
        $serverVars = array(
            "HTTP_X_FORWARDED_FOR",
            "HTTP_X_FORWARDED",
            "HTTP_FORWARDED_FOR",
            "HTTP_FORWARDED",
            "HTTP_VIA",
            "HTTP_X_COMING_FROM",
            "HTTP_COMING_FROM",
            "HTTP_CLIENT_IP"
        );
        foreach ($serverVars as $serverVar)
            if (!empty($_SERVER[$serverVar]))
                $proxyIP = $_SERVER[$serverVar];
        if (!empty($proxyIP)) {
            $isIP = preg_match('|^([0-9]{1,3}\.){3,3}[0-9]{1,3}|', $proxyIP, $regs);
            if ($isIP && (sizeof($regs) > 0))
                return $regs[0];
        }
        return $_SERVER['REMOTE_ADDR'];
}

function sql($sql)
{
	$result=mysql_query($sql) or write_sql_error_log($sql,mysql_error());
    return $result;
}

function mr2array($result) 
{
	$i=0;$ret = array();
	while ($row = mysql_fetch_assoc($result)) 
	{
		foreach ($row as $key => $value) 
		{
			$ret[$i][$key] = $value;
		}
		$i++;
	}
	return ($ret);
}


?>