<?

function forgpasslogin($messenge) {
	$content = '<script type="text/javascript" language="JavaScript">
<!--

function fnforgpasslogin(form_name) {
    if (!form_name.forgpasslogin.value.match(/.+/)) {
      alert("������� ���� �����!");
      form_name.forgpasslogin.focus();
      return false;
	}
	return true;
}

-->
</script>' .
$messenge .
'<table width="100%" cellpadding="0" cellspacing="0"><form method="get" name="forgpass" onsubmit="return fnforgpasslogin(this);">
	<tr>
		<td align="right">
				������� ����� ��� �����:
		</td>
		<td>
			<input name="forgpasslogin" class=window">
		</td>
	</tr>
	<tr>
		<td colspan="2" align=center>
			<input type="submit" value = "���������" class=window>
		</td>
	</tr>
	</form>
</table>';
return $content;
}

$forgpasslogin = $_GET[forgpasslogin];
$key = $_GET[key];
if (isset($forgpasslogin)) {
	$query = "SELECT COUNT(*) FROM `user` WHERE `login` = '$forgpasslogin'";
	$set = select($query);
	$row = mysql_fetch_row($set);
	if ($row[0] > 0) {
		if (!(isset($key))) {
			$query = "SELECT `password`, `email` FROM `user` WHERE `login` = '$forgpasslogin'";
			$set = select($query);
			$row = mysql_fetch_array($set);
			$str = $forgpasslogin . $row[password] . $row[email];
			$key = md5($str);
			$link = BASE_URL . '/forgpass.php?forgpasslogin=' . $forgpasslogin . '&key=' . $key;
			$too.="From: ".SEND_EMAIL."\n";
			$too.="content-type: text/html; charset=windows-1251\n";
			$body = "�� ����� <a href='" . BASE_URL . "'>
					" . BASE_URL . "</a> ��� ������ ������ �� ����� ������!<br><br>
					���� �� ������������� ������������� ����� ������, �� ��������� �� ������: <a href='" . $link . "'>" . $link . "</a>.<br><br>
					����� �������������, �� ���� ���� ����� ������ ����� ������.<br><br>
					���� �� �� ������ ������ �� ����� ������, �� ������ �� �������, � ������ ������� ��� ������!
					<p>����������� ������� - <a href='" . BASE_URL . "'>" . BASE_URL . "</a>";
			$subject = "������ �� ����� ������ � ����� " . BASE_URL;
			mail($row[email], $subject, $body, $too);
			$description = "���������(��) $row[name]! �� ��������� ������ �� ����� ������.<br>
							�� ��������� ����������� ����� ���� ���������� ������ ��� �������������
							����� ������. ����� �������������, ��� ����� ������ ����� ������ �� ����������� ����.";
			echo '<table height="100%" width="100%"><tr><td align="center" valign="middle">';
			alert("����� ������","$description");
			echo '</td></tr></table>';
		} else {
			$query = "SELECT `password`, `email` FROM `user` WHERE `login` = '$forgpasslogin'";
			$set = select($query);
			$row = mysql_fetch_array($set);
			$str = $forgpasslogin . $row[password] . $row[email];
			$key_ = md5($str);
			if ($key == $key_) {
				$str = md5($key);
				$new_password = substr($str, 6, 6);
				$md5_new_password = md5($new_password);
				$query = "UPDATE `user` SET `password` = '$md5_new_password' WHERE `login` = '$forgpasslogin'";
				updata($query);
				$too.="From: ".SEND_EMAIL."\n";
				$too.="content-type: text/html; charset=windows-1251\n";
				$body = "�� ����� <a href='" . BASE_URL . "'>" . BASE_URL . "</a> ��� ������ ������ ��� ������ ��������!<br><br>
						��� ����� ������: $new_password
						<p>����������� ������� - <a href='" . BASE_URL . "'>" . BASE_URL . "</a>";
			$subject = "������ �� ����� ������ � ����� " . BASE_URL;
				mail($row[email], $subject, $body, $too);
				$description = "��� ������ � ������� ��� �����.<br>
								�� ��������� ����������� ����� ���� ���������� ������ � ����� �������.";
				echo '<table height="100%" width="100%"><tr><td align="center" valign="middle">';
				alert("����� ������","$description");
				echo '</td></tr></table>';
			} else {
				$description = '<table width="96%">
						<tr>
							<td>
								<div class="forma" align="justify">
									<span style = "color:red;">��������!</span> ����� ������ �� ���������! ��������������� ���� �� ��� ������.<br>
									��������, �� ��� ������������ ������.<br>
									��������� ��������� ����� ������ ������, ���� ����� ������ �������� ��� ���, �� ���������� � <a href="mailto:'.ADMIN_EMAIL.'" style="color:#004a99">��������������</a> �������.
								</div>
							</td>
						</tr>
					</table>';
				$messenge = $description;
				$forgpasslogin = forgpasslogin($messenge);
				print($forgpasslogin);
			}
		}
	} else {
		$description = '<table width="96%">
					<tr>
						<td>
							<div class="forma" align="justify">
								��������� �����: <span style = "color:red;">' . $forgpasslogin . '</span> � ������� �� ����������. ��������, �� �������� ��� ����� ��� �� ����������������
								��� ��������� �������.
							</div>
						</td>
					</tr>
				</table>';
		$messenge = $description;
		$forgpasslogin = forgpasslogin($messenge);
		print($forgpasslogin);
	}
} else {
	$description = '<table width="96%">
					<tr>
						<td>
							<div class="forma" align="justify">
								������� ���� ����� ��� ����� ������, ���� �� ��� ������.
							</div>
						</td>
					</tr>
				</table>';
	$messenge = $description;
	$forgpasslogin = forgpasslogin($messenge);
	print("$forgpasslogin");
}

?>