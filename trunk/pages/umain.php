		<script language="JavaScript" type="text/javascript" src="wz_tooltip.js"></script>
		<script language="JavaScript" type="text/JavaScript">
						<!--
						function jumpMenu(selObj){ eval("parent.location='"+selObj.options[selObj.selectedIndex].value+"'"); }
						//-->
		</script>
		<br>
		<div align="center">
			
		</div><br>
		<?
		
		$set = select("SELECT u.id, u.login, u.name, u.key, b.balance, b.rezerv, b.comission, b.uchet, b.otkrutka FROM user u, balance b WHERE u.id = $id_user AND b.id = $id_user");
		$row = mysql_fetch_row($set);
		if ($row[3] >= 1) $status = "�������";
		else $status = "���������";
		
		$set = select("SELECT SUM(s.show), SUM(s.cliks) FROM sites s WHERE s.id_user = $id_user");
		$sc = mysql_fetch_row($set);
		$set = select("SELECT SUM(t.show), SUM(t.cliks) FROM tizers t WHERE t.id_user = $id_user");
		$tc = mysql_fetch_row($set);
		$ctrs = round($sc[1]/$sc[0]*100, 2);
		$ctrt = round($tc[1]/$tc[0]*100, 2);
		$freebalance = $row[4] + $row[5];
		
		?>
		<table width=97% align=center><tr><td valign=top>
					<table width=100% class='window' border='0' align='center' cellpadding='0' cellspacing='0'>
						<tr class='WindowHeader'>
							<td align=left>
								&nbsp;&#9643; <b>������������
							</td>
							<td align='right'>&#9679;&nbsp;</td>
						</tr>
						<tr class=Table1>
							<td align=right width=60%>
								ID ��������:&nbsp;<img onmouseover="Tip('ID �������� ����� ��� ������������� � ������� � ��� ��������� �������.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
							</td>
							<td align=left width=40%>
								<?=$row[0]?>
							</td>
						</tr>
						<tr class=Table2>
							<td align=right>
								��� (�����):&nbsp;<img onmouseover="Tip('����� ��� ����� � �������.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
							</td>
							<td align=left>
								<?=$row[2]?> (<?=$row[1]?>)
							</td>
						</tr>
						<tr class=Table1>
							<td align=right>
								������:&nbsp;<img onmouseover="Tip('������ �������� (�������/�������).', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
							</td>
							<td align=left>
								<?=$status?>
							</td>
						</tr>
						<tr class=Table2>
							<td align=right>
								�������� �������:&nbsp;<img onmouseover="Tip('�������� �������, ����������� ��� ������� ��������. ������� �������� - <b>5%</b>', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
							</td>
							<td align=left>
								<?=$row[6]?>%
							</td>
						</tr>
						<tr class=Table1>
							<td align=right>
								����������� ��������:&nbsp;<img onmouseover="Tip('��� ���� %, ��� ������ ������� ����� ��������� �� ������������� ����. ��� �������� <b>100%</b> ��� ������ ������������� (��� ������� �������� �������), ��� <b>0%</b> - ��� ������ ����������� �� ������������� ����. <br><b>��������� ������������ � ���� `���������`</b>', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
							</td>
							<td align=left>
								<?=$row[8]?>%
							</td>
						</tr>
						<tr class=Table2>
							<td align=right>
								����������� �����:&nbsp;<img onmouseover="Tip('����������� ����� ����� ������� ��� ������� ������� (��� ���� %, ��� ������ ����������� �������). ������������ ��� ������ CTR (���� ��� CTR ����� ������� ���� �������� �� ����, �������� ����� ��������� ����������� ����).', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;
							</td>
							<td align=left>
								<?=$row[7]?>%
							</td>
						</tr>
					</table>
					</td><td valign=top>
					<table width=100% class='window' border='0' align='center' cellpadding='0' cellspacing='0'>
						<tr class='WindowHeader'>
							<td align=left>&nbsp;&#9643; <b>����</td>
							<td align='right'>&#9679;&nbsp;</td>
						</tr>
						<tr bgcolor='#FFFFFF' class='Text1' align='center'><td colspan=2><table width='100%'>
							<tr><td class='TableHeader' align='center'>
								&nbsp;
							</td>
							<td class='TableHeader' align='center'>
								������
							</td>
							<td class='TableHeader' align='center'>
								�����
							</td>
							<td class='TableHeader' align='center'>
								CTR
							</td>
						</tr>
						<tr class=Table1>
							<td align=left>
								������ �� ����� ������
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
								������ ����� �������
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
								������
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
								������������� ����
							</td>
							<td align=center>
								<?=$row[5]?>
							</td>
							<td colspan=2>
								
							</td>
						</tr>
						<tr>
							<td align=right class='TableHeader'>
								��������� ������:
							</td>
							<td class='TableHeader' align='center'>
								<?=$freebalance?>
							</td>
							<td colspan=2 class='TableHeader' align='center'>
								&nbsp;
							</td>
						</tr>
					</table></td></tr></table></td></tr></table><br>
<table width=97% class='window' border='0' align='center' cellpadding='0' cellspacing='0'>
						<tr class='WindowHeader'>
							<td align=left width=70>
								&nbsp;&#9643; <b>�������
							</td>
							<td align='right'>&#9679;&nbsp;</td>
						</tr>
	<?
	
	$query = "select * from news order by ID desc";
	$set = select ($query);
while ($row = mysql_fetch_array ($set)) {
	$text = $row[news];
	$date = substr($row[date],8,2) . "." . substr($row[date],5,2) . "." . substr($row[date],0,4);
	print ("<tr><td align=\"left\"><b>$date</b></td/>");
	print ("<td align='left'>$text</td></tr>");
}
	
	?>
</table>