				<?
				
				if (isset($_POST[go])) {
					updata("UPDATE `properties` SET `value` = '$_POST[comission]' WHERE `name` = 'comission'");
				}
				$set = select("SELECT * FROM `properties` WHERE `name` = 'comission'");
				$row = mysql_fetch_array($set);
				
				?>
				<br><br>
				<form method='post' name='registrationForm'>
					<table width=27% class='window' border='0' align='center' cellpadding='0' cellspacing='0'>
						<tr class='WindowHeader'>
							<td align=left>&nbsp;&#9643; <b>Настройки</b></td>
							<td align='right'>&#9679;&nbsp;</td>
						</tr>
						
				
					<tr class='Table1'><td align=right>Комиссия:</td><td><input type='text' name='comission' class='window' size='3' value='<?=$row[value]?>'></td></tr>
					<tr class='Table1'><td align=center colspan=2><input type='hidden' name='go' value = 'true'><input type='submit' value='Сохранить'  class='field2'></td></tr></table>
				</form>