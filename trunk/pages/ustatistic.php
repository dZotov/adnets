<h3>Статистика</h3>
		<SCRIPT>
			function bg_on(aa) { aa.style.backgroundColor='#FFCC99'; }
			function bg_off(aa, sty) { aa.style.backgroundColor=sty; }
		</SCRIPT>
		<br>
		<div align="center">
			Статистика показов и кликов по тизерам и сайтам.
		</div><br>
		<table width=97% class='window' border='0' align='center' cellpadding='0' cellspacing='0'>
						<tr class='WindowHeader'>
							<td align=left>&nbsp;&#9643; <b>Статистика по сайтам (последние 5 дней)</b></td>
							<td align='right'>&#9679;&nbsp;</td>
						</tr>
						<tr bgcolor='#FFFFFF' class='Text1' align='center'><td colspan=2>
		<table width=100%>
			<tr><td rowspan=2 class='TableHeader' align=center>Домен</td>
				<td align=center colspan=7 class='TableHeader'>Показы / Клики / CTR</td>
			</tr>
			<tr>
				<?
				for ($i=4; $i>=0; $i--) {
					$set=select("SELECT DATE_SUB(CURDATE(), INTERVAL $i DAY)");
					$date=mysql_result($set, 0, 0);
					echo "<td class='TableHeader' align=center>$date</td>";
				}
				?>
				<td class='TableHeader' align=center>Сумма</td>
				<td class='TableHeader' align=center>Всего</td>
			</tr>
			<?
			$query = "SELECT `id`, `url` FROM `sites` WHERE `id_user` = '$id_user'";
			$set = select($query);
			while ($row = mysql_fetch_array($set)) {
				$sums = 0;
				$sumc = 0;
				if ($class == 'Table2') $class = 'Table1';
				else $class = 'Table2';
				echo "<tr onmouseover=bg_on(this); onmouseout=\"bg_off(this, '');\" class='$class'><td align=center><a href='http://$row[url]'>$row[url]</a></td>";
				for ($i=4; $i>=0; $i--) {
					$set1 = select("SELECT SUM(`show`), SUM(`cliks`) FROM `statistic` WHERE `date` = DATE_SUB(CURDATE(), INTERVAL $i DAY) AND `sizer` = '1' AND `id` = '$row[id]'");
					$sc = mysql_fetch_row($set1);
					$sums = $sums + $sc[0];
					$sumc = $sumc + $sc[1];
					$ctr = round($sc[1]/$sc[0]*100, 2);
					echo "<td align=center>$sc[0]<br>$sc[1]<br>$ctr</td>";
				}
				$ctr = round($sumc/$sums*100, 2);
				echo "<td class='window' align=center>$sums<br>$sumc<br>$ctr</td>";
				$set2 = select("SELECT SUM(`show`), SUM(`cliks`) FROM `statistic` WHERE `sizer` = '1' AND `id` = '$row[id]'");
				$sc = mysql_fetch_row($set2);
				$ctr = round($sc[1]/$sc[0]*100, 2);
				echo "<td align=center>$sc[0]<br>$sc[1]<br>$ctr</td></tr>";
			}
			echo "<tr><td class='TableHeader' align=center>Все сайты</td>";
			$sums = 0;
			$sumc = 0;
			for ($i=4; $i>=0; $i--) {
				$set = select("SELECT SUM(st.show), SUM(st.cliks) FROM `statistic` st, sites s WHERE st.date = DATE_SUB(CURDATE(), INTERVAL $i DAY) AND st.sizer = '1' AND st.id = s.id AND s.id_user = '$id_user'");
				$sc = mysql_fetch_row($set);
				$sums = $sums + $sc[0];
				$sumc = $sumc + $sc[1];
				$ctr = round($sc[1]/$sc[0]*100, 2);
				echo "<td class='TableHeader' align=center>$sc[0]<br>$sc[1]<br>$ctr</td>";
			}
			$ctr = round($sumc/$sums*100, 2);
			echo "<td class='TableHeader' align=center>$sums<br>$sumc<br>$ctr</td>";
			$set = select("SELECT SUM(st.show), SUM(st.cliks) FROM `statistic` st, sites s WHERE st.sizer = '1' AND st.id = s.id AND s.id_user = '$id_user'");
			$sc = mysql_fetch_row($set);
			$ctr = round($sc[1]/$sc[0]*100, 2);
			echo "<td class='TableHeader' align=center>$sc[0]<br>$sc[1]<br>$ctr</td></tr>";
			?>
		</table></td></tr></table><br><br>
		<table width=97% class='window' border='0' align='center' cellpadding='0' cellspacing='0'>
						<tr class='WindowHeader'>
							<td align=left>&nbsp;&#9643; <b>Статистика по тизерам (последние 5 дней)</b></td>
							<td align='right'>&#9679;&nbsp;</td>
						</tr>
						<tr bgcolor='#FFFFFF' class='Text1' align='center'><td colspan=2>
		<table width=100%>
			<tr><td rowspan=2 class='TableHeader' align=center>Тизеры</td>
				<td align=center colspan=7 class='TableHeader'>Показы / Клики / CTR</td>
			</tr>
			<tr>
				<?
				for ($i=4; $i>=0; $i--) {
					$set=select("SELECT DATE_SUB(CURDATE(), INTERVAL $i DAY)");
					$date=mysql_result($set, 0, 0);
					echo "<td class='TableHeader' align=center>$date</td>";
				}
				?>
				<td class='TableHeader' align=center>Сумма</td>
				<td class='TableHeader' align=center>Всего</td>
			</tr>
			<?
			$query = "SELECT `id`, `url`, `image` FROM `tizers` WHERE `id_user` = '$id_user'";
			$set = select($query);
			while ($row = mysql_fetch_array($set)) {
				$sums = 0;
				$sumc = 0;
				if ($class == 'Table2') $class = 'Table1';
				else $class = 'Table2';
				echo "<tr onmouseover=bg_on(this); onmouseout=\"bg_off(this, '');\" class='$class'><td align=center>$row[id]&nbsp;<a href='$row[url]'><img src='images/user/$row[image]' class=Window></a></td>";
				for ($i=4; $i>=0; $i--) {
					$setsc = select("SELECT SUM(`show`), SUM(`cliks`) FROM `statistic` WHERE `date` = DATE_SUB(CURDATE(), INTERVAL $i DAY) AND `sizer` = '2' AND `id` = '$row[id]'");
					$sc = mysql_fetch_row($setsc);
					$sums = $sums + $sc[0];
					$sumc = $sumc + $sc[1];
					$ctr = round($sc[1]/$sc[0]*100, 2);
					echo "<td align=center>$sc[0]<br>$sc[1]<br>$ctr</td>";
				}
				$ctr = round($sumc/$sums*100, 2);
				echo "<td align=center class=Window>$sums<br>$sumc<br>$ctr</td>";
				$set2 = select("SELECT SUM(`show`), SUM(`cliks`) FROM `statistic` WHERE `sizer` = '2' AND `id` = '$row[id]'");
				$sc = mysql_fetch_row($set2);
				$ctr = round($sc[1]/$sc[0]*100, 2);
				echo "<td align=center>$sc[0]<br>$sc[1]<br>$ctr</td></tr>";
			}
			echo "<tr><td class='TableHeader' align=center>Все тизеры</td>";
			$sums = 0;
			$sumc = 0;
			for ($i=4; $i>=0; $i--) {
				$set = select("SELECT SUM(st.show), SUM(st.cliks) FROM `statistic` st, tizers s WHERE st.date = DATE_SUB(CURDATE(), INTERVAL $i DAY) AND st.sizer = '2' AND st.id = s.id AND s.id_user = '$id_user'");
				$sc = mysql_fetch_row($set);
				$sums = $sums + $sc[0];
				$sumc = $sumc + $sc[1];
				$ctr = round($sc[1]/$sc[0]*100, 2);
				echo "<td class='TableHeader' align=center>$sc[0]<br>$sc[1]<br>$ctr</td>";
			}
			$ctr = round($sumc/$sums*100, 2);
			echo "<td class='TableHeader' align=center>$sums<br>$sumc<br>$ctr</td>";
			$set = select("SELECT SUM(st.show), SUM(st.cliks) FROM `statistic` st, tizers s WHERE st.sizer = '2' AND st.id = s.id AND s.id_user = '$id_user'");
			$sc = mysql_fetch_row($set);
			$ctr = round($sc[1]/$sc[0]*100, 2);
			echo "<td class='TableHeader' align=center>$sc[0]<br>$sc[1]<br>$ctr</td></tr>";
			?>
		</table></td></tr></table><br>