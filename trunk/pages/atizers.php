		<br>
		<div align="center"><b>
			Тизеры системы
		</b></div><br>
		<script type="text/javascript" language="JavaScript">
<!--

var confirmMsg  = 'Вы действительно хотите удалить тизер';

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
-->
</script>
		<?
		
		if (isset($_POST[id]) AND isset($_POST[action])) {
			if (empty($_POST[message])) {
				switch ($_POST[action]) {
					case '1':
					$title = 'Тизер активирован';
					break;
					case '2':
					$title = 'Тизер отклонён';
					break;
					case '3':
					$title = 'Тизер заблокирован';
					break;
				}
			} else $title = $_POST[message];
			if ($_POST[action] == 5) insert("DELETE FROM `tizers` WHERE `id` = '$_POST[id]'");
			else updata("UPDATE `tizers` SET `status` = '$_POST[action]', `title` = '$title' WHERE `id` = '$_POST[id]'");
		}
		if ($_GET[id_u]) $and = "AND s.id_user = '$_GET[id_u]'";
		if ($_POST[mult]) {
			$delul = $_POST[delul];
			if (($n = count($delul)) > 0) {
				$delul = array_values($delul);
				$in = "";
				for ($i = 0; $i < $n; $i++) {
					$in .= $delul[$i] . ",";
				}
				$len = strlen($in)-1;
				$in = substr($in, 0, $len);
				$and = "AND s.id_user IN (" . $in . ")";
			}
		}
		if (empty($_GET[page])) $page = 1;
		else $page=$_GET[page];   								//   Если страница не задана- 
		$n=30;													//   Количество элементов на странице
		$start = ($page-1)*$n;
		$query = "SELECT s.id, s.url, s.description, st.status, s.status, s.image FROM tizers s, status st WHERE st.id = s.status $and ORDER BY s.id DESC LIMIT $start,$n";
		$set = select($query);
		echo "<table class=text2 width='97%' style='border:solid 1px green' cellpadding='3' cellspacing='1' align=center>
			<tr><td class='main1'>URL/баннер</td><td class='main1'>Заголовок</td><td class='main1'>Статус/Действие</td><td class='main1' colspan=2>Сообщение</td></tr>";
		while ($row = mysql_fetch_array($set)) {
			switch ($row[4]) {
				case "1":
				$movement = "<SELECT name='action' class='field4'>
								<option value=2 selected>Активировать
								<option value=4>Отклонить
								<option value=3>Запретить
								<option value=5>Удалить
							</select>";
				break;
				case "2":
				$movement = "<SELECT name='action' class='field4'>
								<option value=4 selected>Отклонить
								<option value=3>Запретить
								<option value=5>Удалить
							</select>";
				break;
				case "4":
				$movement = "<SELECT name='action' class='field4'>
								<option value=2 selected>Активировать
								<option value=5>Удалить
							</select>";
				break;
				case "3":
				$movement = "<SELECT name='action' class='field4'>
								<option value=2 selected>Активировать
								<option value=3>Запретить
								<option value=5>Удалить
							</select>";
				break;
			}
			echo "<form method='post'>";
			echo "<tr><td><a href='$row[1]' target='_blank'>$row[1]<br><img src='images/user/$row[5]' class=Window width=80 height=60></a></td><td>$row[2]</td><td>$row[3]<br>$movement</td><td>
						<textarea name='message' rows='3' cols='18' class='field4'></textarea>
					</td><td><input type='hidden' name='id' value='$row[0]'><input type='submit' value='ok'></td></tr>";
			echo "</form>";
		}		
		echo "</table>";
		if (!($_GET[id_u])) {
			$query = "select COUNT(*) from `tizers`";
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