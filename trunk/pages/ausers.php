		<br>
		<div align="center"><b>
			������������ �������
		</b></div><br>
		<script type="text/javascript" language="JavaScript">
<!--

var confirmMsg  = '�� ������������� ������ ������� ������������';

function confirmLink(theLink, theSqlQuery)
{
    // Confirmation is not required in the configuration file
    // or browser is Opera (crappy js implementation)
    if (confirmMsg == '' || typeof(window.opera) != 'undefined') {
        return true;
    }

    var is_confirmed = confirm(confirmMsg + ' :\n' + theSqlQuery);
    if (is_confirmed) {
        if ( typeof(theLink.href) != 'undefined' ) {
            theLink.href += '&is_js_confirmed=1';
        } else if ( typeof(theLink.form) != 'undefined' ) {
            theLink.form.action += '?is_js_confirmed=1';
        }
    }

    return is_confirmed;
} // end of the 'confirmLink()' function

function onSelChange(select) {
  document.getElementById('user').action=select.options[select.selectedIndex].value;
}
-->
</script>
<form method='post'>
<table class=window width='97%' cellpadding='3' cellspacing='1' align=center>
			<tr><td class='text2'>�������: 
			<select name='sample' class='field4'>
				<option value='id'>ID
				<option value='login'>�����
				<option value='domen'>�����
			</select>
			</td><td class='text2'>��������: <input type='text' name='value' class=field></td><td class='text2'><input type='submit' value='OK' class=field5></td></tr></table></form>
		<?
		
		if (isset($_GET[touser])) {
			$query = "UPDATE `user` SET `key` = '1' WHERE `id` = '$_GET[touser]'";
			updata($query);
		}
		if (isset($_GET[toadm])) {
			$query = "UPDATE `user` SET `key` = '2' WHERE `id` = '$_GET[toadm]'";
			updata($query);
		}
		if (isset($_GET[block])) {
			$query = "UPDATE `user` SET `key` = '0' WHERE `id` = '$_GET[block]'";
			updata($query);
		}
		if (isset($_GET[delid])) {
			$query = "DELETE FROM user WHERE id = '$_GET[delid]'";
			if (insert($query)) {
				$query = "DELETE FROM balance WHERE id = '$_GET[delid]'";
				insert($query);
				$query = "DELETE FROM `sites` WHERE `id_user` = '$_GET[delid]'";
				insert($query);
				$query = "DELETE FROM `tizers` WHERE `id_user` = '$_GET[delid]'";
				insert($query);
			}
		}
		if ($_POST[mult]) {
			switch ($_GET[option]) {
				case "block":
				
				break;
			}	
		}
		if (isset($_POST[sample]) AND ($_POST[value] != "")) {
			switch ($_POST[sample]) {
				case 'id':
				$and = "AND u.id = '$_POST[value]'";
				$query = "SELECT u.key, u.login, u.id FROM `user` u WHERE u.id != '$id_user' $and";
				break;
				case 'login':
				$and = "AND u.login = '$_POST[value]'";
				$query = "SELECT u.key, u.login, u.id FROM `user` u WHERE u.id != '$id_user' $and";
				break;
				case 'domen':
				$and = "AND s.id_user = u.id AND s.url = '$_POST[value]'";
				$query = "SELECT u.key, u.login, u.id FROM `user` u, `sites` s WHERE u.id != '$id_user' $and";
				break;
			}
		} else {
			if (empty($_GET[page])) $page = 1;
			else $page=$_GET[page];   								//   ���� �������� �� ������- 
			$n=30;													//   ���������� ��������� �� ��������
			$start = ($page-1)*$n;
			$query = "SELECT u.key, u.login, u.id FROM `user` u WHERE u.id != '$id_user' ORDER BY u.id DESC LIMIT $start,$n";
		}
	//	$query = "SELECT u.key, u.login, u.id FROM `user` u, `sites` s WHERE u.id != '$id_user' $and ORDER BY u.id DESC LIMIT $start,$n";
		$set = select($query);
		echo "<table class=text2 width='97%' style='border:solid 1px green' cellpadding='3' cellspacing='1' align=center>
			<tr><td class='main1'>&nbsp;</td><td class='main1'>�����</td><td class='main1'>�����</td><td class='main1'>������</td><td class='main1'>����������</td><td class='main1'>��������</td></tr><form id=\"user\" method=post>";
		while ($row = mysql_fetch_row($set)) {
			$query = "SELECT count(s.id)FROM sites s WHERE s.id_user = '$row[2]'";
			$ts = select($query);
			$rts = mysql_fetch_row($ts);
			$query = "SELECT count(t.id) FROM tizers t WHERE t.id_user = '$row[2]'";
			$ts1 = select($query);
			$rts1 = mysql_fetch_row($ts1);
			switch ($row[0]) {
				case "0":
				$right = "������������";
				$movement = "[<a href='?touser=$row[2]'>��������������</a>]";
				break;
				case "1":
				$right = "������������";
				$movement = "[<a href='?toadm=$row[2]'>�������������</a>]<br>
							[<a href='?block=$row[2]'>�������������</a>]";
				break;
				case "2":
				$right = "�������������";
				$movement = "[<a href='?touser=$row[2]'>������������</a>]<br>
							[<a href='?block=$row[2]'>�������������</a>]";
				break;
				default:
				$right = "�� �����������";
				$movement = "[<a href='".BASE_URL."/finalofreg.php?login=" . $row[login] . "&key=" . $row[key] ."'>������������</a>]";
				break;
			}
			echo "<tr><td><input type='Checkbox' name='delul[$n]' value='$row[2]'></td><td>$row[1]</td><td><a href='asites.html?id_u=$row[2]'>�����</a> ($rts[0])</td><td><a href='atizers.html?id_u=$row[2]'>������</a> ($rts1[0])</td><td><a href='aumain.html?id_u=$row[2]'>����������</a></td><td>$movement<br>
						[<a href='?delid=$row[2]' onclick=\"return confirmLink(this," . "'$row[1]'" . ")\">�������</a>]
					</td></tr>";
		}
		echo "<tr>
				<td colspan=6>
					<select class='field4' onchange=\"onSelChange(this)\">
						<option>�������� ��������:
					<!--	<option value=\"".BASE_URL."/aumain.html\">����������</option> -->
						<option value=\"".BASE_URL."/asites.html\">�����</option>
						<option value=\"".BASE_URL."/atizers.html\">������</option>
					<!--	<option value=\"?option=block\">�������������</option>
						<option value=\"?option=unblock\">��������������</option>
						<option value=\"?option=delete\">�������</option> -->
					</select>
					<input type='hidden' name='mult' value=true>
					<input type='submit' value='OK' class=window>
				</td>
			</tr></form>";
		echo "</table>";
		if (empty($_POST[sample]) OR ($_POST[value] == "")) {
			$query = "select COUNT(*) from `user`";
			$set = select($query);
			$row = mysql_fetch_row($set);
			$count = ceil($row[0]/$n);
			if ($count > 1) {
				echo "<center>";
				for ($i=1;$i<=$count;$i++) {
					if ($page != $i) echo "<a href='?page=$i'>$i</a>&nbsp;";
					else echo "$i&nbsp;";
				}
				echo "</center>";
			}
		}
		
		?>