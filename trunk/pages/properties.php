<h3>���������</h3>
		<script language="JavaScript" type="text/javascript" src="wz_tooltip.js"></script>
		<script language="JavaScript" type="text/JavaScript">
						<!--
						function jumpMenu(selObj){ eval("parent.location='"+selObj.options[selObj.selectedIndex].value+"'"); }
						//-->
		</script>
		<br>
		<p class="anotation">
			��������� ������:
		</p>
		<?
		
		$new_password = $_POST[password];
		$confirm_new_password = $_POST[password2];
		$ko = trim($_POST[ko]);
		$icq = trim($_POST[icq]);
if (isset($_POST[allow])) {
	$query = "SELECT COUNT(*) FROM `user` WHERE `id` = '$id_user'";
	$set = select($query);
	$row = mysql_fetch_row($set);
	if ($row[0] > 0) {
		if ($new_password == $confirm_new_password) {
			$in = "";
			if ($ko != "") $in .= "b.otkrutka = '$ko',";
			if ($_POST[allow] != "") $in .= "b.allow = '$_POST[allow]',";
			if ($icq != "") $in .= "u.icq = '$icq',";
			if ($new_password != "") {
				$md5_new_password = md5($new_password);
				$in .= "`password` = '$md5_new_password',";
			}
			$len = strlen($in)-1;
			$in = substr($in, 0, $len);
			$query = "UPDATE user as u, balance as b SET " . $in . " WHERE u.id = '$id_user' AND b.id = u.id";
			if (updata($query)) {
				if ($md5_new_password != '') $_COOKIE['regpass'] = $md5_new_password;
				$description = '<p class="anotation"><b style="color:green;">���� ������ ���� ��������� �������!</b></p>';
			} else {
				$description = '<p class="anotation"><b style="color:red;">���� ������ �� ���������� ��-�� ��������� ������!<br> ���������� �������.</b></b>';
			}
		} else {
			$description = '<p class="anotation"><b style="color:red;">�� ����� �������� ������������� ��� ������ ������.<br>���������� ��� ���.
							</b></p>';
		}
	} else {
		$description = '<p class="anotation"><b style="color:red;">�� ����� ������� ���� ������ ������!<br> ���������� ��� ���.</b></p>';
	}
} else {
	$description = '<p class="anotation"><b>��� ������������� ��������� ������ ������� ���� ������. ���� ���� ������, �� ���������� � �� �� ���������.</b></p>';
}

		echo "$description<br>";	
		
		$set = select("SELECT u.id, u.login, u.name, u.icq, u.email, b.comission, b.uchet, b.otkrutka, b.allow FROM user u, balance b WHERE u.id = $id_user AND b.id = $id_user");
		$row = mysql_fetch_row($set);
		
		?>
		<p class="anotation"><b>������������� ������</b></p>
			<p class="anotation">
					ID ��������: <img onmouseover="Tip('ID �������� ����� ��� ������������� � ������� � ��� ��������� �������.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp; <b><?=$row[0]?></b>
				</p>
			<p class="anotation">
				��� (�����): <img onmouseover="Tip('����� ��� ����� � �������.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;	<b><?=$row[2]?> (<?=$row[1]?>)</b>
			</p>
			<p class="anotation">
					E-mail: <img onmouseover="Tip('E-mail ��������� ��� ����������� ������������ ��� �������������� ������.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;<b><?=$row[4]?></b></p>
			<p class="anotation">
					�������� �������: <img onmouseover="Tip('�������� �������, ����������� ��� ������� ��������. ������� �������� - 10%', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
				<b><?=$row[5]?>%</b></p>
			<p class="anotation">
					����������� �����: <img onmouseover="Tip('����������� ����� ����� ������� ��� ������� ������� (��� ���� %, ��� ������ ����������� �������). ������������ ��� ������ CTR (���� ��� CTR ����� ������� ���� �������� �� ����, �������� ����� ���������).', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
				<b><?=$row[6]?>%</b></p>
			<form action="" id="profile" method="post">
			<p class="anotation"><b>���������:</b></p>
				
			<label for="settings">
					����������� ��������: <img onmouseover="Tip('��� ���� %, ��� ������ ������� ����� ��������� �� ������������� ����. ��� �������� 100% ��� ������ ������������� (��� ������� �������� �������), ��� 0% - ��� ������ ����������� �� ������������� ����.', DELAY, 0)" src="images/help.png" width="11" height="11">
			</label>
			<input name='ko' value='<?=$row[7]?>'>
			
			<label for="shows">
					������ �� ����� ������: <img onmouseover="Tip('�� ��������� ���� ������ �� ������������ �� ����� ������ (����������� � �������� `���������`). ���� ���������� � �������� `���������` �� ����� ������ ����� ������ ����� ������������� � ���� ������ - ����� ������ ��� ��� ��� ���������� ������ �� ������� �� ����, � �� ��������������.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
			</label>
			<p class="anotation"><input type="radio" value="0" name="allow" <? if ($row[8] == 0) echo 'checked';?>>&nbsp;���������&nbsp;&nbsp;</p>
			<p class="anotation"><input type="radio" value="1" name="allow" <? if ($row[8] == 1) echo 'checked';?>>&nbsp;���������</p>
				
				<p class="anotation"><b>��������� ������������</b></p>
			</tr>
			<label for="settings">
					ICQ: <img onmouseover="Tip('Icq UIN ��� ������� �����.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
			</label>
					<input name='icq' value='<?=$row[3]?>'>
			<label for="settings">
					����� ������: <img onmouseover="Tip('��� ����� ������ ���������� ��� ������ ������ � ������� ������ ������ � ���� ����.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
			</label>
			<input type = 'password' name='password'>
			<label for="settings">�������������:</label>
			<input type = 'password' name='password2'>
			<input type = 'submit'  id="accept" name="accept" value='���������'>
		
			</form>
		