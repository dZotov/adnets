<h3>������������ ���������</h3>
<?

$set = select("SELECT `id`,`login` FROM `user` WHERE `spid` = '" . $id_user . "'");
$i=0;
while ($row = mysql_fetch_row($set)) {
    $referal['id'][$i] = $row[0];
    $referal['login'][$i] = $row[1]; 
    $i++;
}
for($i=0;$i<count($referal['id']);$i++) {
    $set = select("SELECT SUM(`shows`) FROM `referal_history` WHERE `to_user` = '" . $id_user . "' AND `from_user` = '" . $referal['id'][$i] . "'");
    $row = mysql_fetch_row($set);
    if($row[0] > 0)
    $referal['shows'][$i] = $row[0];
    else $referal['shows'][$i] = 0;
}
$count_fereral = count($referal['id']);

?>
<SCRIPT>
	function bg_on(aa) { aa.style.backgroundColor='#FFCC99'; }
	function bg_off(aa, sty) { aa.style.backgroundColor=sty; }
</SCRIPT>
        
<p class="anotation">
��������� ����� ����������� � ���� ���� , �� ������ ��������� �������� 5% �� ������� �� �������� <br>
��� ����� ��� ���� ����� ���� ������� � ���������� �� ��������� ������ �����  ���� �� �������� , �������������� ����<br><br>
</p>

<p class="small_anotation profile_anotation">�������������� ��������� �� ������������ ���������� ��� �������������. ������������ ������:</a></p>
<p class="small_anotation profile_anotation"><span>http://adnets.ru/?spid=<?=$id_user?></span></p>
<p class="anotation">
������� ��� ������� �� ����:
</p>
<table>
    <tr>
        <td><a href="http://adnets.ru/?spid=<?=$id_user?>"><img src="http://adnets.ru/images/banner/83x31-1-a.gif" border="0" alt="�������� ���� ������ � �������� ������!" /></a></td>
        <td><textarea rows="4" cols="56"><a href="http://adnets.ru/?spid=<?=$id_user?>"><img src="http://adnets.ru/images/banner/83x31-1-a.gif" border="0" alt="�������� ���� ������ � �������� ������!"></a></textarea></td>
    </tr>
    <tr>
        <td><a href="http://adnets.ru/?spid=<?=$id_user?>"><img src="http://adnets.ru/images/banner/100x100-1-a.gif" border="0" alt="�������� ���� ������ � �������� ������!" /></a></td>
        <td><textarea rows="4" cols="56"><a href="http://adnets.ru/?spid=<?=$id_user?>"><img src="http://adnets.ru/images/banner/100x100-1-a.gif" border="0" alt="�������� ���� ������ � �������� ������!"></a></textarea></td>
    </tr>
    <tr>
        <td><a href="http://adnets.ru/?spid=<?=$id_user?>"><img src="http://adnets.ru/images/banner/250x60-1-a.gif" border="0" alt="�������� ���� ������ � �������� ������!" /></a></td>
        <td><textarea rows="4" cols="56"><a href="http://adnets.ru/?spid=<?=$id_user?>"><img src="http://adnets.ru/images/banner/250x60-1-a.gif" border="0" alt="�������� ���� ������ � �������� ������!"></a></textarea></td>
    </tr>
    <tr>
        <td><a href="http://adnets.ru/?spid=<?=$id_user?>"><img src="http://adnets.ru/images/banner/350x19-1-a.gif" border="0" alt="�������� ���� ������ � �������� ������!" /></a></td>
        <td><textarea rows="4" cols="56"><a href="http://adnets.ru/?spid=<?=$id_user?>"><img src="http://adnets.ru/images/banner/350x19-1-a.gif" border="0" alt="�������� ���� ������ � �������� ������!"></a></textarea></td>
    </tr>
    
</table>

<? if($count_fereral > 0) { ?>
<br><br>

	<p class="anotation">���� �������� ��������</p>
	<table width="100%">
		<tr><td width="75%"  align="center">������� <i>(�����)</i></td><td width="20%" align="center" >���-�� �������</td></tr>
    <? for($i=0;$i<$count_fereral;$i++) { 
        if ($class == 'Table2') $class = 'Table1';
		else $class = 'Table2'; ?>
        <tr onmouseover="bg_on(this);" onmouseout="bg_off(this, '');" class="<?=$class?>"><td><b>ID: <?=$referal['id'][$i]?></b> - <?=$referal['login'][$i]?></td><td align="center"><?=$referal['shows'][$i]?></td></tr>
    <? } ?>
</table>
<? } else { ?>
<br />
    <p class="small_anotation profile_anotation">� ��� ���� ��� �������� ���������</p>
<? } ?>