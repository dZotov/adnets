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
						Уважаемый(ая) $row[name], Ваша учётная запись была успешно активирована на сайте <a href='".BASE_URL."'>".BASE_URL."</a>!<br>
						Теперь Вы можете воспользоваться своим логином и паролем для авторизации на сайте.<br>
						Ваш логин: $row[login]<br>
						Ваш пароль: $row[password]<br>
						Пароль хранится в зашифрованном виде, поэтому старайтесь не терять его.<br><br>
						Сервис по продвижению сайтов - <a href='".BASE_URL."'>".BASE_URL."</a>
					</div>";
			$subject = "Активация учётной записи на сайте ".BASE_URL;
			mail($row[email], $subject, $body, $too);
			$description = "Уважаемый(ая) $row[name], Ваша учётная запись была успешно активирована!<br>
							Теперь Вы можете воспользоваться своим логином и паролем для авторизации на сайте.<br>
							Ваш логин: $row[login]<br>
							Ваш пароль: $row[password]<br>
							На Ваш электронный ящик отправленно письмо с регистрационными данными.";
			echo '<table height="100%" width="100%"><tr><td align="center" valign="middle">';
			alert("Активация аккаунта","$description");
			echo '</td></tr></table>';
		} else {
			$description = "Уважаемый(ая) $row[name], Ваша учётная запись не была активирована из-за системной ошибки!<br>
							Попробуйте ещё раз!";
			echo '<table height="100%" width="100%"><tr><td align="center" valign="middle">';
			alert("Системная ошибка","$description");
			echo '</td></tr></table>';
		}
	} else {
		$query = "SELECT COUNT(*) FROM `user` WHERE `login` = '$_GET[login]' AND `key` = '1'";
		$set = select($query);
		$row = mysql_fetch_row($set);
		if ($row[0] > 0) {
			$description = "Учётная запись уже активирована!";
			echo '<table height="100%" width="100%"><tr><td align="center" valign="middle">';
			alert("Системное сообщение","$description");
			echo '</td></tr></table>';
		} else {
			$query = "SELECT COUNT(*) FROM `user` WHERE `login` = '$_GET[login]'";
			$set = select($query);
			$row = mysql_fetch_row($set);
			if ($row[0] <= 0) {
				$description = "Пользователь с логином $_GET[login] в системе не регистрировался!";
				echo '<table height="100%" width="100%"><tr><td align="center" valign="middle">';
				alert("Системное сообщение","$description");
				echo '</td></tr></table>';
			}
		}
	}
} else {
	$description = "Для активации учётной записи необходимо перейти по ссылке, которая была прислана на электронный ящик!";
	echo '<table height="100%" width="100%"><tr><td align="center" valign="middle">';
	alert("Системное сообщение","$description");
	echo '</td></tr></table>';
}

?>