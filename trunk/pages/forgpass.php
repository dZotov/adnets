<?

function forgpasslogin($messenge) {
	$content = '<script type="text/javascript" language="JavaScript">
<!--

function fnforgpasslogin(form_name) {
    if (!form_name.forgpasslogin.value.match(/.+/)) {
      alert("Укажите свой логин!");
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
				Введите логин для входа:
		</td>
		<td>
			<input name="forgpasslogin" class=window">
		</td>
	</tr>
	<tr>
		<td colspan="2" align=center>
			<input type="submit" value = "Отправить" class=window>
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
			$body = "На сайте <a href='" . BASE_URL . "'>
					" . BASE_URL . "</a> был сделан запрос на смену пароля!<br><br>
					Если Вы подтверждаете необходимость смены пароля, то перейдите по ссылке: <a href='" . $link . "'>" . $link . "</a>.<br><br>
					После подтверждения, на этот ящик будет выслан новый пароль.<br><br>
					Если Вы не делали запрос на смену пароля, то ничего не делайте, а просто удалите это письмо!
					<p>Контекстная реклама - <a href='" . BASE_URL . "'>" . BASE_URL . "</a>";
			$subject = "Запрос на смену пароля с сайта " . BASE_URL;
			mail($row[email], $subject, $body, $too);
			$description = "Уважаемый(ая) $row[name]! Вы выполнили запрос на смену пароля.<br>
							На указанный электронный адрес было отправлено письмо для подтверждения
							смены пароля. После подтверждения, Вам будет выслан новый пароль на электронный ящик.";
			echo '<table height="100%" width="100%"><tr><td align="center" valign="middle">';
			alert("Смена пароля","$description");
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
				$body = "На сайте <a href='" . BASE_URL . "'>" . BASE_URL . "</a> был изменён пароль для Вашего аккаунта!<br><br>
						Ваш новый пароль: $new_password
						<p>Контекстная реклама - <a href='" . BASE_URL . "'>" . BASE_URL . "</a>";
			$subject = "Запрос на смену пароля с сайта " . BASE_URL;
				mail($row[email], $subject, $body, $too);
				$description = "Ваш пароль в системе был сменён.<br>
								На указанный электронный адрес было отправлено письмо с новым паролем.";
				echo '<table height="100%" width="100%"><tr><td align="center" valign="middle">';
				alert("Смена пароля","$description");
				echo '</td></tr></table>';
			} else {
				$description = '<table width="96%">
						<tr>
							<td>
								<div class="forma" align="justify">
									<span style = "color:red;">Внимание!</span> Смены пароля не произошло! Регистрационный ключ не был принят.<br>
									Возможно, Вы его использовали раннее.<br>
									Проведите процедуру смены пароля заново, если такая ошибка появится ещё раз, то обратитесь к <a href="mailto:'.ADMIN_EMAIL.'" style="color:#004a99">администратору</a> ресурса.
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
								Указанный логин: <span style = "color:red;">' . $forgpasslogin . '</span> в системе не существует. Возможно, Вы ошиблись при вводе или не регистрировались
								под указанным логином.
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
								Введите свой логин для смены пароля, если Вы его забыли.
							</div>
						</td>
					</tr>
				</table>';
	$messenge = $description;
	$forgpasslogin = forgpasslogin($messenge);
	print("$forgpasslogin");
}

?>