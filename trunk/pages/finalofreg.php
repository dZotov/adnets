<?

$set = select("SELECT * FROM `properties` WHERE `name` = 'comission'");
$com = mysql_fetch_array($set);
if (isset($_GET['login']) AND isset($_GET['key'])) {
	$query = "SELECT COUNT(*) FROM `user` WHERE `login` = '$_GET[login]' AND `key` = '$_GET[key]'";
	$set = select($query);
	$row = mysql_fetch_row($set);
	if ($row[0] > 0) {
		$query = "SELECT * FROM `user` WHERE `login` = '$_GET[login]'";
		$set = select($query);
		$row = mysql_fetch_array($set);
		$pas_md5 = md5($row[password]);
		$query = "UPDATE `user` SET `key` = 1, `password` = '$pas_md5' WHERE `login` = '$_GET[login]' AND `key` = '$_GET[key]'";
		if (updata($query)) {
			$query = "INSERT INTO `balance` VALUES('$row[id]', 0, 0, '$com[value]', 100, 100, 0)";
			insert($query);
			$too.="From: ".SEND_EMAIL."\n";
			$too.="content-type: text/html; charset=windows-1251\n";
			$body = "<div class='forma' style='border:thick double #336666; padding: 10 10 10 10;'>
						���������(��) $row[name], ���� ������� ������ ���� ������� ������������ �� ����� <a href='".BASE_URL."'>".BASE_URL."</a>!<br>
						������ �� ������ ��������������� ����� ������� � ������� ��� ����������� �� �����.<br>
						��� �����: $row[login]<br>
						��� ������: $row[password]<br>
						������ �������� � ������������� ����, ������� ���������� �� ������ ���.<br><br>
						������ �� ����������� ������ - <a href='".BASE_URL."'>".BASE_URL."</a>
					</div>";
			$subject = "��������� ������� ������ �� ����� ".BASE_URL;
			mail($row[email], $subject, $body, $too);
			$description = "���������(��) $row[name], ���� ������� ������ ���� ������� ������������!<br>
							������ �� ������ ��������������� ����� ������� � ������� ��� ����������� �� �����.<br>
							��� �����: $row[login]<br>
							��� ������: $row[password]<br>
							�� ��� ����������� ���� ����������� ������ � ���������������� �������.";
			echo '<table height="100%" width="100%"><tr><td align="center" valign="middle">';
			alert("��������� ��������","$description");
			echo '</td></tr></table>';
		} else {
			$description = "���������(��) $row[name], ���� ������� ������ �� ���� ������������ ��-�� ��������� ������!<br>
							���������� ��� ���!";
			echo '<table height="100%" width="100%"><tr><td align="center" valign="middle">';
			alert("��������� ������","$description");
			echo '</td></tr></table>';
		}
	} else {
		$query = "SELECT COUNT(*) FROM `user` WHERE `login` = '$_GET[login]' AND `key` = '1'";
		$set = select($query);
		$row = mysql_fetch_row($set);
		if ($row[0] > 0) {
			$description = "������� ������ ��� ������������!";
			echo '<table height="100%" width="100%"><tr><td align="center" valign="middle">';
			alert("��������� ���������","$description");
			echo '</td></tr></table>';
		} else {
			$query = "SELECT COUNT(*) FROM `user` WHERE `login` = '$_GET[login]'";
			$set = select($query);
			$row = mysql_fetch_row($set);
			if ($row[0] <= 0) {
				$description = "������������ � ������� $_GET[login] � ������� �� ���������������!";
				echo '<table height="100%" width="100%"><tr><td align="center" valign="middle">';
				alert("��������� ���������","$description");
				echo '</td></tr></table>';
			}
		}
	}
} else {
	$description = "��� ��������� ������� ������ ���������� ������� �� ������, ������� ���� �������� �� ����������� ����!";
	echo '<table height="100%" width="100%"><tr><td align="center" valign="middle">';
	alert("��������� ���������","$description");
	echo '</td></tr></table>';
}

?>