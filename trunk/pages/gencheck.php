<?

$date = date("Y-m-d");
if(isset($_POST['stot']) OR isset($_POST['mln'])) {
	for($i=0;$i<$_POST['stot'];$i++) {
		$rand = rand(0,999999999);
		$cod = md5($rand);
		insert("INSERT INTO `checks` VALUES('','" . $cod . "','" . $date . "','0')");
	}
	for($i=0;$i<$_POST['mln'];$i++) {
		$rand = rand(0,999999999);
		$cod = md5($rand);
		insert("INSERT INTO `checks` VALUES('','" . $cod . "','" . $date . "','1')");
	}
}

$set = select("SELECT * FROM `checks` WHERE `date` < '" . $date . "'");
echo '<table align="center">';
while($stot = mysql_fetch_row($set)) {
	if($stot[3] == '0') $name = '100 000';
	else $name = '1 000 000';
	echo "<tr><td width='30'>" . $stot[0] . "</td><td>" . $stot[2] . "</td><td align='center' width='250'><b>" . $stot[1] . "</b></td><td>" . $name . "</td></tr>";
}
echo '</table><br><br>';

?>
<form method="post">
	<table align="center">
		<tr><td>100000 показов</td><td><input type="text" name="stot" class="field5"></td></tr>
		<tr><td>1 млн. показов</td><td><input type="text" name="mln" class="field5"></td></tr>
		<tr><td colspan="2" align="center"><input type="submit" value="—генерировать" class="field5"></td></tr>
	</table>
</form><br><br>
<?

$set = select("SELECT * FROM `checks` WHERE `date` = '" . $date . "'");
echo '<table align="center">';
while($stot = mysql_fetch_row($set)) {
	if($stot[3] == '0') $name = '100 000';
	else $name = '1 000 000';
	echo "<tr><td width='30'>" . $stot[0] . "</td><td>" . $stot[2] . "</td><td align='center' width='250'><b>" . $stot[1] . "</b></td><td>" . $name . "</td></tr>";
}
echo '</table>';

?>