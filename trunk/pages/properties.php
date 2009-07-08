<h3>Настройки</h3>
		<script language="JavaScript" type="text/javascript" src="wz_tooltip.js"></script>
		<script language="JavaScript" type="text/JavaScript">
						<!--
						function jumpMenu(selObj){ eval("parent.location='"+selObj.options[selObj.selectedIndex].value+"'"); }
						//-->
		</script>
		<br>
		<p class="anotation">
			Настройка данных:
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
				$description = '<p class="anotation"><b style="color:green;">Ваши данные были обновлены успешно!</b></p>';
			} else {
				$description = '<p class="anotation"><b style="color:red;">Ваши данные не обновились из-за системной ошибки!<br> Попробуйте позднее.</b></b>';
			}
		} else {
			$description = '<p class="anotation"><b style="color:red;">Вы ввели неверное подтверждение для нового пароля.<br>Попробуйте ещё раз.
							</b></p>';
		}
	} else {
		$description = '<p class="anotation"><b style="color:red;">Вы ввели неверно свой старый пароль!<br> Попробуйте ещё раз.</b></p>';
	}
} else {
	$description = '<p class="anotation"><b>Для подтверждения изменения данных введите свой пароль. Если поле пустое, то информация в нём не изменится.</b></p>';
}

		echo "$description<br>";	
		
		$set = select("SELECT u.id, u.login, u.name, u.icq, u.email, b.comission, b.uchet, b.otkrutka, b.allow FROM user u, balance b WHERE u.id = $id_user AND b.id = $id_user");
		$row = mysql_fetch_row($set);
		
		?>
		<p class="anotation"><b>Фиксированные данные</b></p>
			<p class="anotation">
					ID аккаунта: <img onmouseover="Tip('ID аккаунта нужен для идентификации в системе и для переводов показов.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp; <b><?=$row[0]?></b>
				</p>
			<p class="anotation">
				Ник (логин): <img onmouseover="Tip('Логин для входа в систему.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;	<b><?=$row[2]?> (<?=$row[1]?>)</b>
			</p>
			<p class="anotation">
					E-mail: <img onmouseover="Tip('E-mail указанный при регистрации используемый для восстановления пароля.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;<b><?=$row[4]?></b></p>
			<p class="anotation">
					Комиссия системы: <img onmouseover="Tip('Комиссия сервиса, учитывается при расчете балансов. Базовая комиссия - 10%', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
				<b><?=$row[5]?>%</b></p>
			<p class="anotation">
					Коэффициент учета: <img onmouseover="Tip('Коэффициент учета ваших показов для расчета баланса (чем ниже %, тем меньше учитывается показов). Используется при низком CTR (если Ваш CTR будет гораздо ниже среднего по сети, значение будет уменьшено).', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
				<b><?=$row[6]?>%</b></p>
			<form action="" id="profile" method="post">
			<p class="anotation"><b>Настройки:</b></p>
				
			<label for="settings">
					Коэффициент открутки: <img onmouseover="Tip('Чем ниже %, тем больше показов будут зачислены на накопительный счет. При значении 100% все показы откручиваются (при наличии активных тизеров), при 0% - все показы зачисляются на накопительный счет.', DELAY, 0)" src="images/help.png" width="11" height="11">
			</label>
			<input name='ko' value='<?=$row[7]?>'>
			
			<label for="shows">
					Показы на своих сайтах: <img onmouseover="Tip('По умолчанию ваши тизеры не показываются на ваших сайтах (установлена в значение `Запрещены`). Если установить в значение `Разрешены` на ваших сайтах среди прочих будут откручиваться и ваши тизеры - опция удобна для тех кто направляет тизеры не обратно на сайт, а на рекламодателей.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
			</label>
			<p class="anotation"><input type="radio" value="0" name="allow" <? if ($row[8] == 0) echo 'checked';?>>&nbsp;Запрещены&nbsp;&nbsp;</p>
			<p class="anotation"><input type="radio" value="1" name="allow" <? if ($row[8] == 1) echo 'checked';?>>&nbsp;Разрешены</p>
				
				<p class="anotation"><b>Настройки пользователя</b></p>
			</tr>
			<label for="settings">
					ICQ: <img onmouseover="Tip('Icq UIN для быстрой связи.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
			</label>
					<input name='icq' value='<?=$row[3]?>'>
			<label for="settings">
					Новый пароль: <img onmouseover="Tip('Для смены пароля необходимо его ввести дважды и указать старый пароль в поле ниже.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
			</label>
			<input type = 'password' name='password'>
			<label for="settings">Подтверждение:</label>
			<input type = 'password' name='password2'>
			<input type = 'submit'  id="accept" name="accept" value='Сохранить'>
		
			</form>
		