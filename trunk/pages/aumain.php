		<script language="JavaScript" type="text/javascript" src="wz_tooltip.js"></script>
		<script language="JavaScript" type="text/JavaScript">
						<!--
						function jumpMenu(selObj){ eval("parent.location='"+selObj.options[selObj.selectedIndex].value+"'"); }
						//-->
		</script>
		<br>
		<div align="center">
			Информация о пользователе
		</div><br>
		<?
		
		if ($_GET[id_u]) $and = $_GET[id_u]; 
		$set = select("SELECT u.id, u.login, u.name, u.key, b.balance, b.rezerv, b.comission, b.uchet, b.otkrutka FROM user u, balance b WHERE u.id = $and AND b.id = $and");
		$row = mysql_fetch_row($set);
		if ($row[3] >= 1) $status = "Активен";
		else $status = "Неактивен";
		
		$set = select("SELECT SUM(s.show), SUM(s.cliks) FROM sites s WHERE s.id_user = $and");
		$sc = mysql_fetch_row($set);
		$set = select("SELECT SUM(t.show), SUM(t.cliks) FROM tizers t WHERE t.id_user = $and");
		$tc = mysql_fetch_row($set);
		$ctrs = round($sc[1]/$sc[0]*100, 2);
		$ctrt = round($tc[1]/$tc[0]*100, 2);
		$freebalance = $row[4] + $row[5];
		
		?>
		<table width=97% align=center><tr><td valign=top>
					<table width=100% class='window' border='0' align='center' cellpadding='0' cellspacing='0'>
						<tr class='WindowHeader'>
							<td align=left>
								&nbsp;&#9643; <b>Пользователь
							</td>
							<td align='right'>&#9679;&nbsp;</td>
						</tr>
						<tr class=Table1>
							<td align=right width=60%>
								ID аккаунта:&nbsp;<img onmouseover="Tip('ID аккаунта нужен для идентификации в системе и для переводов показов.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
							</td>
							<td align=left width=40%>
								<?=$row[0]?>
							</td>
						</tr>
						<tr class=Table2>
							<td align=right>
								Ник (логин):&nbsp;<img onmouseover="Tip('Логин для входа в систему.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
							</td>
							<td align=left>
								<?=$row[2]?> (<?=$row[1]?>)
							</td>
						</tr>
						<tr class=Table1>
							<td align=right>
								Статус:&nbsp;<img onmouseover="Tip('Статус аккаунта (Активен/Забанен).', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
							</td>
							<td align=left>
								<?=$status?>
							</td>
						</tr>
						<tr class=Table2>
							<td align=right>
								Комиссия системы:&nbsp;<img onmouseover="Tip('Комиссия сервиса, учитывается при расчете балансов. Базовая комиссия - <b>10%</b>', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
							</td>
							<td align=left>
								<?=$row[6]?>%
							</td>
						</tr>
						<tr class=Table1>
							<td align=right>
								Коэффициент открутки:&nbsp;<img onmouseover="Tip('Чем ниже %, тем больше показов будут зачислены на накопительный счет. При значении <b>100%</b> все показы откручиваются (при наличии активных тизеров), при <b>0%</b> - все показы зачисляются на накопительный счет. <br><b>Настройка производится в меню `Настройки`</b>', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
							</td>
							<td align=left>
								<?=$row[8]?>%
							</td>
						</tr>
						<tr class=Table2>
							<td align=right>
								Коэффициент учета:&nbsp;<img onmouseover="Tip('Коэффициент учета ваших показов для расчета баланса (чем ниже %, тем меньше учитывается показов). Используется при низком CTR (если Ваш CTR будет гораздо ниже среднего по сети, значение будет уменьшено модератором сети).', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
							</td>
							<td align=left>
								<?=$row[7]?>%
							</td>
						</tr>
					</table>
					</td><td valign=top>
					<table width=100% class='window' border='0' align='center' cellpadding='0' cellspacing='0'>
						<tr class='WindowHeader'>
							<td align=left>&nbsp;&#9643; <b>Счёт</td>
							<td align='right'>&#9679;&nbsp;</td>
						</tr>
						<tr bgcolor='#FFFFFF' class='Text1' align='center'><td colspan=2><table width='100%'>
							<tr><td class='TableHeader' align='center'>
								&nbsp;
							</td>
							<td class='TableHeader' align='center'>
								Показы
							</td>
							<td class='TableHeader' align='center'>
								Клики
							</td>
							<td class='TableHeader' align='center'>
								CTR
							</td>
						</tr>
						<tr class=Table1>
							<td align=left>
								Показы на ваших сайтах
							</td>
							<td align=center>
								<?=$sc[0]?>
							</td>
							<td align=center>
								<?=$sc[1]?>
							</td>
							<td align=center>
								<?=$ctrs?>
							</td>
						</tr>
						<tr class=Table2>
							<td align=left>
								Показы ваших тизеров
							</td>
							<td align=center>
								<?=$tc[0]?>
							</td>
							<td align=center>
								<?=$tc[1]?>
							</td>
							<td align=center>
								<?=$ctrt?>
							</td>
						</tr>
						<tr>
							<td class='TableHeader' align=right>
								Баланс
							</td>
							<td align=center class='TableHeader'>
								<?=$row[4]?>
							</td>
							<td colspan=2 class='TableHeader'>
								&nbsp;
							</td>
						</tr>
						<tr class=Table2>
							<td align=right>
								Накопительный счёт
							</td>
							<td align=center>
								<?=$row[5]?>
							</td>
							<td colspan=2>
								
							</td>
						</tr>
						<tr>
							<td align=right class='TableHeader'>
								Свободный баланс:
							</td>
							<td class='TableHeader' align='center'>
								<?=$freebalance?>
							</td>
							<td colspan=2 class='TableHeader' align='center'>
								&nbsp;
							</td>
						</tr>
					</table></td></tr></table></td></tr></table><br><br>
		<?
		
		$new_password = $_POST[password];
		$confirm_new_password = $_POST[password2];
		$ko = trim($_POST[ko]);
		$icq = trim($_POST[icq]);
if (isset($_POST[allow])) {
	$query = "SELECT COUNT(*) FROM `user` WHERE `id` = '$and'";
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
			if ($_POST[email] != "") $in .= "`email` = '$_POST[email]',";
			$len = strlen($in)-1;
			$in = substr($in, 0, $len);
			$query = "UPDATE user as u, balance as b SET " . $in . " WHERE u.id = '$and' AND b.id = u.id";
			if (updata($query)) {
				if ($md5_new_password != '') $_COOKIE['regpass'] = $md5_new_password;
				$description = '<table width="96%">
					<tr>
						<td>
							<div class="text2" align="center">
								Данные были обновлены успешно!
							</div>
						</td>
					</tr>
				</table>';
			} else {
				$description = '<table width="96%">
					<tr>
						<td>
							<div class="text2" align="center" style="color:red;">
								Данные не обновились из-за системной ошибки!<br> Попробуйте позднее.
							</div>
						</td>
					</tr>
				</table>';
			}
		} else {
			$description = '<table width="96%">
					<tr>
						<td>
							<div class="text2" align="center" style="color:red;">
								Вы ввели неверное подтверждение для нового пароля.<br>Попробуйте ещё раз.
							</div>
						</td>
					</tr>
				</table>';
		}
	} else {
		$description = '<table width="96%">
					<tr>
						<td>
							<div class="text2" align="center" style="color:red;">
								Вы ввели неверно свой старый пароль!<br> Попробуйте ещё раз.
							</div>
						</td>
					</tr>
				</table>';
	}
} else {
	$description = '<table width="96%">
					<tr>
						<td>
							<div class="text2" align="center">
								Если поле пустое, то информация в нём не изменится.
							</div>
						</td>
					</tr>
				</table>';
}

		echo "$description<br>";	
		
		$set = select("SELECT u.id, u.login, u.name, u.icq, u.email, b.comission, b.uchet, b.otkrutka, b.allow FROM user u, balance b WHERE u.id = $and AND b.id = $and");
		$row = mysql_fetch_row($set);
		
		?>
		<table width='60%'  class='window' border='0' align='center' cellpadding='0' cellspacing='0'><tr class='WindowHeader'>
							<td align=left>&nbsp;&#9643; <b>Настройки</b></td>
							<td align='right'>&#9679;&nbsp;</td>
						</tr><tr bgcolor='#FFFFFF' class='Text1' align='center'><td colspan=2><table width=100%>
			<tr>
				<td align=center colspan=2 class='TableHeader'>
					<B>Фиксированные данные</b>
				</td>
			</tr>
			<tr class='Table1'>
				<td align=right width=50%>
					ID аккаунта: <img onmouseover="Tip('ID аккаунта нужен для идентификации в системе и для переводов показов.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
				</td>
				<td align=left width=50%>
					<?=$row[0]?>
				</td>
			</tr>
			<tr class='Table2'>
				<td align=right>
					Ник (логин): <img onmouseover="Tip('Логин для входа в систему.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
				</td>
				<td align=left>
					<?=$row[2]?> (<?=$row[1]?>)
				</td>
			</tr><form method=post>
			<tr class='Table1'>
				<td align=right>
					E-mail: <img onmouseover="Tip('E-mail указанный при регистрации используемый для восстановления пароля.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
				</td>
				<td align=left>
					<input name='email' value='<?=$row[4]?>' class='field'>
				</td>
			</tr>
			<tr class='Table2'>
				<td align=right>
					Комиссия системы: <img onmouseover="Tip('Комиссия сервиса, учитывается при расчете балансов. Базовая комиссия - 10%', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
				</td>
				<td align=left>
					<?=$row[5]?>%
				</td>
			</tr>
			<tr class='Table1'>
				<td align=right>
					Коэффициент учета: <img onmouseover="Tip('Коэффициент учета ваших показов для расчета баланса (чем ниже %, тем меньше учитывается показов). Используется при низком CTR (если Ваш CTR будет гораздо ниже среднего по сети, значение будет уменьшено).', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
				</td>
				<td align=left>
					<?=$row[6]?>%
				</td>
			</tr>
			
			<tr>
				<td align=center colspan=2 class='TableHeader'>
					<B>Настройки открутки</b>
				</td>
			</tr>
			<tr class='Table1'>
				<td align=right>
					Коэффициент открутки: <img onmouseover="Tip('Чем ниже %, тем больше показов будут зачислены на накопительный счет. При значении 100% все показы откручиваются (при наличии активных тизеров), при 0% - все показы зачисляются на накопительный счет.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
				</td>
				<td align=left>
					<input name='ko' value='<?=$row[7]?>' class='field5'>
				</td>
			</tr>
			<tr class='Table2'>
				<td align=right>
					Показы на своих сайтах: <img onmouseover="Tip('По умолчанию ваши тизеры не показываются на ваших сайтах (установлена в значение `Запрещены`). Если установить в значение `Разрешены` на ваших сайтах среди прочих будут откручиваться и ваши тизеры - опция удобна для тех кто направляет тизеры не обратно на сайт, а на рекламодателей.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
				</td>
				<td align=left>
					<input type="radio" value="0" name="allow" <? if ($row[8] == 0) echo 'checked';?>>&nbsp;Запрещены&nbsp;&nbsp;<input type="radio" value="1" name="allow" <? if ($row[8] == 1) echo 'checked';?>>&nbsp;Разрешены
				</td>
			</tr>
			<tr>
				<td align=center colspan=2 class='TableHeader'>
					<B>Настройки пользователя</b>
				</td>
			</tr>
			<tr class='Table1'>
				<td align=right>
					ICQ: <img onmouseover="Tip('Icq UIN для быстрой связи.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
				</td>
				<td align=left>
					<input name='icq' value='<?=$row[3]?>' class='field5'>
				</td>
			</tr>
			<tr class='Table2'>
				<td align=right>
					Новый пароль: <img onmouseover="Tip('Для смены пароля необходимо его ввести дважды и указать старый пароль в поле ниже.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
				</td>
				<td align=left>
					<input type = 'password' name='password' class='field5'>&nbsp;&nbsp;Подтверждение:<input type = 'password' name='password2' class='field5'>
				</td>
			</tr>
			<tr  class='Table2'>
				<td align=center colspan=2>
					<input type = 'submit' value='Сохранить' class='field2'>
				</td>
			</tr>
			</form>
		</table></td></tr></table>