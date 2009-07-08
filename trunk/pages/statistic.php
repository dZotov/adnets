		<SCRIPT>
			function bg_on(aa) { aa.style.backgroundColor='#FFCC99'; }
			function bg_off(aa, sty) { aa.style.backgroundColor=sty; }
		</SCRIPT>
		<?
		
		$set = select("SELECT s.url, s.name, st.show, st.cliks FROM sites s, statistic st WHERE st.date = CURDATE() AND s.id = st.id AND st.sizer = 1 ORDER BY st.show DESC");
		echo "<br><br><table width=95% class='window' border='0' align='center' cellpadding='0' cellspacing='0'>
		<tr class='WindowHeader'><td>&nbsp;&#9643; <b>Статистика по показам на сайтах</b></td><td align='right'>&#9679;&nbsp;</td></tr>
		<tr bgcolor='#FFFFFF' class='Text1' align='center'><td colspan=2><table width='100%'>
		<tr><td width=75% class='TableHeader' align='center'>Сайт</td><td width=20% align='center' class='TableHeader'>Показы сегодня</td></tr>";
		while ($row = mysql_fetch_row($set)) {
			if ($class == 'Table2') $class = 'Table1';
			else $class = 'Table2';
			$ctr = round($row[3]/$row[2]*100, 2);
			echo "<tr onmouseover=bg_on(this); onmouseout=\"bg_off(this, '');\" class='$class'><td><b><a href='http://$row[0]' target='_blank'>$row[0]</a></b> - $row[1]</td><td align=center>$row[2]</td></tr>";
		}
		$set = select("SELECT SUM(`show`), SUM(`cliks`) FROM `statistic` WHERE `date` = CURDATE() AND `sizer` = '1'");
		$row = mysql_fetch_row($set);
		echo "<tr><td class=TableHeader align=right><b>Всего</b></td><td class=TableHeader align=center colspan=2>$row[0]</td></tr>";
		$ctr = round($row[1]/$row[0]*100, 2);
		echo "</table>Кликов за сегодня: $row[1]<br>Средний CTR за сегодня: $ctr</td></tr>";
		echo "</td></tr></table>";
		echo "<br><br><table width=95% class='window' border='0' align='center' cellpadding='0' cellspacing='0'>
		<tr class='WindowHeader'><td>&nbsp;&#9643; <b>Статистика за 5 дней</b></td><td align='right'>&#9679;&nbsp;</td></tr>
		<tr bgcolor='#FFFFFF' class='Text1' align='center'><td colspan=2><table width='100%'><tr><td width=25% class='TableHeader' align='center'>Дата</td><td width=25% class='TableHeader' align='center'>Показы</td><td width=25% class='TableHeader' align='center'>Клики</td><td width=25% class='TableHeader' align='center'>CTR</td></tr>";
		for ($i=4; $i>=0; $i--) {
			if ($class == 'Table2') $class = 'Table1';
			else $class = 'Table2';
			$set = select("SELECT SUM(`show`), SUM(`cliks`) FROM `statistic` WHERE `date` = DATE_SUB(CURDATE(), INTERVAL $i DAY) AND `sizer` = '1'");
			$row = mysql_fetch_row($set);
			$set = select("SELECT DATE_SUB(CURDATE(), INTERVAL $i DAY)");
			$date = mysql_result($set, 0, 0);
			$ctr = round($row[1]/$row[0]*100, 2);
			echo "<tr onmouseover=bg_on(this); onmouseout=\"bg_off(this, '');\" class='$class'><td width=25% align=center>$date</td><td width=25% align=center>$row[0]</td><td width=25% align=center>$row[1]</td><td width=25% align=center>$ctr</td></tr>";
		}
		echo "</table></td></tr></table>";
		
		?>