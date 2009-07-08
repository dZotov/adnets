		<br>
		<div align="center"><b>
			Добавление, редактирование и удаление новостей
		</b></div><br>
		<?
		
		$up = $_POST[up];
		$deletID = $_GET[deletID];
		$edit = $_GET[edit];
		$value = $_POST[text];
		if (isset($value)) {
			if (isset($up)) {
				$query = "update news set `news` = '$value' where id = '$up'";
				updata($query);
			} else {
				$query = "INSERT INTO `news` VALUES('', NOW(), '$value')";
				insert($query);
			}
		}
		
		echo '<table width = "100%">';


if ($deletID) {
	$query = "DELETE FROM `news` WHERE `id` = '$deletID'";
	if (updata($query)) {
		print ("<tr><td align = center colspan = 4>Новость удалена</td></tr>");
	} else {
		print ("<tr><td align = center colspan = 4>Новость не удалена</td></tr>");
	}
}
$query = "select * from news order by ID desc";
$set = select ($query);
while ($row = mysql_fetch_array ($set)) {
	$text = $row[news];
	$date = substr($row[date],8,2) . "." . substr($row[date],5,2) . "." . substr($row[date],0,4);
	$text = substr($text,0,125) . "...";
	print ("<tr class=text2><td align=\"left\" width=15%>$date</td/>");
	print ("<td width=65%>$text</td><td width=10%><a href=\"news.html?deletID=$row[id]\">Удалить</a></td>
	<td width=10%><a href=\"news.html?edit=$row[id]\">Редактировать</a></td></tr>");
}

echo "</table>
		<br><center>
		<form action='news.html' method='post'>";

if ($edit) {
	$fillinput = "<input type=\"Hidden\" name=\"up\" value=\"$edit\">";
	$query = "select `news` from news where ID = \"$edit\";";
	$set = select ($query);
	$row = mysql_fetch_array ($set);
	$editext = $row[news];
	echo "<textarea name=text cols=50 rows=10 class='field6'>$editext</textarea>";
	echo $fillinput;
} else {
	echo "<textarea name=text cols=50 rows=10 class='field6'></textarea>";
}

?>
			<br><br>
			
			<input type="submit" value="Сохранить" class=field2>
		</form></center>
		