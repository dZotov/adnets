<h3>Переводы</h3>
		<?
		
		if(preg_match('/^[a-z0-9]{32}$/',$_POST['cod'],$match) == 1) {
			$set = select("SELECT * FROM `checks` WHERE `cod` = '" . $_POST['cod'] . "'");
			$row = mysql_fetch_row($set);
			if($_POST['cod'] == $row[1]) {
				if($row[3]) $summa = 1000000;
				else $summa = 100000;
				if(updata("UPDATE `balance` SET `balance` = `balance` + " . $summa . " WHERE `id` = '" . $id_user . "'")) {
					select("DELETE FROM `checks` WHERE `cod` = '" . $_POST['cod'] . "'");
					echo "<p style='color:green' align='center'><b>Чек на оплату " . $summa . " показов принят</b></p>";
				}
			}
		}
		
		?>
		<script language="JavaScript" type="text/javascript" src="wz_tooltip.js"></script>
		<script language="JavaScript" type="text/JavaScript">
						<!--
						function jumpMenu(selObj){ eval("parent.location='"+selObj.options[selObj.selectedIndex].value+"'"); }
						//-->
		</script>
		<p class="anotation">
			Операции с переводами показов
		</p>
		<?
		
		if (isset($_GET[del])) {
			if (updata("UPDATE balance as b, transactions as t SET b.rezerv = b.rezerv + t.cash WHERE t.id = '$_GET[del]' AND t.id_from = '$id_user' AND t.id_from = b.id"))
				insert("DELETE FROM `transactions` WHERE `id` = '$_GET[del]'");
		}
		if (isset($_GET[comid])) {
			if (updata("UPDATE balance as b, transactions as t SET b.rezerv = b.rezerv + t.cash WHERE t.id = '$_GET[comid]' AND t.id_to = '$id_user' AND t.id_to = b.id AND t.password = $_POST[password]"))
				insert("DELETE FROM `transactions` WHERE `id` = '$_GET[comid]' AND `password` = $_POST[password]");
		}
		
		switch ($_POST[znak]) {
			case '1':
				if (isset($_POST[fromrezervall])) $cash = $_POST[fromrezervall];
				else $cash = $_POST[fromrezerv];
				updata("UPDATE `balance` SET `balance` = `balance` + IF(`rezerv` <= $cash, `rezerv`, $cash), `rezerv` = `rezerv` - IF(`rezerv` <= $cash, `rezerv`, $cash) WHERE `id` = '$id_user'");
			break;
			case '2':
				if (isset($_POST[frombalanceall])) $cash = $_POST[frombalanceall];
				else $cash = $_POST[frombalance];
				updata("UPDATE `balance` SET `rezerv` = `rezerv` + IF(`balance` <= $cash, `balance`, $cash), `balance` = `balance` - IF(`balance` <= $cash, `balance`, $cash) WHERE `id` = '$id_user'");
			break;
			case '3':
				$set = select("SELECT balance, rezerv, comission FROM balance WHERE `id` = '$id_user'");
				$row = mysql_fetch_array($set);
				if (($row[balance]+$row[rezerv]) >= $_POST[value]) $cash = $_POST[value];
				else $cash = $row[balance]+$row[rezerv];
				if ($cash > 0) {
					if (insert("INSERT INTO `transactions` VALUES('','$id_user','$_POST[id]','$cash','$_POST[password]')"))
					updata("UPDATE `balance` SET `balance` = `balance` - IF((`rezerv` - $cash) < 0, $cash - `rezerv`, 0), `rezerv` = `rezerv` - IF((`rezerv` - $cash) < 0, `rezerv`, $cash) WHERE `id` = '$id_user'");
				}
			break;
		}
		$set = select("SELECT balance, rezerv, comission FROM balance WHERE `id` = '$id_user'");
		$row = mysql_fetch_array($set);
		$common = ceil(($row[rezerv] + $row[balance])*(100 - $row[comission])/100);
		echo "<table width='60%'  class='window' border='0' align='center' cellpadding='0' cellspacing='0'><tr class='WindowHeader'>
							<td align=left>&nbsp;&#9643; <b>Внутренние переводы</b> (внутри аккаунта)</td>
							<td align='right'>&#9679;&nbsp;</td>
						</tr><tr bgcolor='#FFFFFF' class='Text1' align='center'><td colspan=2>";
		if ($row[rezerv] > 0) {
			echo "<form method=post>
					<table width='100%'>
						<tr>
							<td align=center colspan=2 class=TableHeader>
								<B>С накопительного на основной счет</b>
							</td>
						</tr>
						<tr class=Table1>
							<td align=right>
								Число показов для перевода: <img onmouseover=\"Tip('Введите число показов, которое вы собираетесь перевести на основной счет с накопительного.', DELAY, 0)\" src=\"images/help.png\" width=\"11\" height=\"11\">&nbsp;
							</td>
							<td align=left>
								<input name='fromrezerv' value='$row[rezerv]' class='field5'>&nbsp;Макс. [$row[rezerv]]
							</td>
						</tr>
						<tr class=Table2>
							<td align=right>
								Перевести все доступные показы: <img onmouseover=\"Tip('Поставьте галочку для перевода сразу всех показов с накопительного счета на основной.', DELAY, 0)\" src=\"images/help.png\" width=\"11\" height=\"11\">&nbsp;
							</td>
							<td align=left>
								<input name='fromrezervall' type='checkbox' value='$row[rezerv]'>
							</td>
						</tr>
						<tr class=Table1>
							<td align=center colspan=2>
								<input name='znak' value='1' type='hidden'>
								<input name='ok' value='OK' type='submit' class='field2'>
							</td>
						</tr>
					</table>
				</form>";
		}
		if ($row[balance] > 0) {
			echo "<form method=post>
					<table width='100%'>
						<tr>
							<td align=center colspan=2 class=TableHeader>
								<B>С основного счета на накопительный</b>
							</td>
						</tr>
						<tr class=Table1>
							<td align=right>
								Число показов для перевода: <img onmouseover=\"Tip('Введите число показов, которое вы собираетесь перевести на накопительный счет с основного.', DELAY, 0)\" src=\"images/help.png\" width=\"11\" height=\"11\">&nbsp;
							</td>
							<td align=left>
								<input name='frombalance' value='$row[balance]' class='field5'>&nbsp;Макс. [$row[balance]]
							</td>
						</tr>
						<tr class=Table2>
							<td align=right>
								Перевести все доступные показы: <img onmouseover=\"Tip('Поставьте галочку для перевода всех доступных показов с основного счета на накопительный.', DELAY, 0)\" src=\"images/help.png\" width=\"11\" height=\"11\">&nbsp;
							</td>
							<td align=left>
								<input name='frombalanceall' type='checkbox' value='$row[balance]'>
							</td>
						</tr>
						<tr class='Table1'>
							<td align=center colspan=2>
								<input name='znak' value='2' type='hidden'>
								<input name='ok' value='OK' type='submit' class='field2'>
							</td>
						</tr>
					</table>
				</form>";
		}
		echo "</td></tr></table>";
		if (($row[balance]+$row[rezerv]) > 0) {
			echo "<form method=post>
					<table width='60%'  class='window' border='0' align='center' cellpadding='0' cellspacing='0'><tr class='WindowHeader'>
							<td align=left>&nbsp;&#9643; <b>Внешние переводы</b> (с аккаунта на аккаунт)</td>
							<td align='right'>&#9679;&nbsp;</td>
						</tr>
						<tr class=Table1>
							<td align=right>
								Номер аккаунта получателя: <img onmouseover=\"Tip('Введите номера аккаунта на который собираетесь сделать перевод показов. Узнать номер можно на главной странице при входе в сервис.', DELAY, 0)\" src=\"images/help.png\" width=\"11\" height=\"11\">&nbsp;
							</td>
							<td align=left>
								<input name='id' value='' class='field5'>
							</td>
						</tr>
						<tr class=Table2>
							<td align=right>
								Пароль перевода: <img onmouseover=\"Tip('Укажите пароль перевода, затем сообщите его получателю перевода. Если пароль не указан, перевод будет выполнен без возможности отмены. Допускаются цифры и буквы латинского алфавита (до 10 символов).', DELAY, 0)\" src=\"images/help.png\" width=\"11\" height=\"11\">&nbsp;
							</td>
							<td align=left>
								<input name='password' value='' class='field5'>
							</td>
						</tr>
						<tr class=Table1>
							<td align=right>
								Число показов для перевода: <img onmouseover=\"Tip('Введите число показов, которое вы собираетесь перевести. <b>Указывается число, которое должен получить получатель. </b><br>Комиссия за перевод не взымается.', DELAY, 0)\" src=\"images/help.png\" width=\"11\" height=\"11\">&nbsp;
							</td>
							<td align=left>
								<input name='value' value='' class='field5'>&nbsp;Макс. [$common]
							</td>
						</tr>
						<tr class=Table2>
							<td align=center colspan=2>
								<input name='znak' value='3' type='hidden'>
								<input name='ok' value='OK' type='submit' class='field2'>
							</td>
						</tr>
					</table>
				</form><br>";
		}
		$set = select("SELECT * FROM `transactions` WHERE `id_from` = '$id_user'");
		while ($row = mysql_fetch_array($set)) {
			echo "<div align=center>Транзакция №$row[id], отправка $row[cash] на счёт $row[id_to] [<a href='?del=$row[id]'>Удалить</a>]</div>";
		}
		$set = select("SELECT * FROM `transactions` WHERE `id_to` = '$id_user'");
		while ($row = mysql_fetch_array($set)) {
			echo "<form method=post action='?comid=$row[id]'><div align=center>Транзакция №$row[id], вход $row[cash] пароль <input name='password' class='field5'><input name='ok' value='OK' type='submit'></div></form>";
		}
		
		?>
		<center>
		<br><br>
	    Ввод кода для получения показов
		<br>
		<form method="post" >
			Код: <input name='cod' class='field5'> <input name='ok' value='OK' type='submit'>
		</form>
		</center>