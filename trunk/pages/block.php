		<?
		
		if (isset($_POST[f_ok])) {
			if ($_POST[f_border] != 1) $_POST[f_border] = 0;
			$query = "SELECT COUNT(*) FROM `blocks` WHERE `id` = '$_POST[id]' AND `number` = '$_POST[b]'";
			$set = select($query);
			$row = mysql_fetch_row($set);
			if ($row[0] > 0) {
				$query = "UPDATE `blocks` b, `sites` s SET b.cols = '$_POST[f_qty]', b.row = '$_POST[f_type]', b.background = '$_POST[f_colbg]', b.link_color = '$_POST[f_coltext]', b.border = '$_POST[f_border]', b.align = '$_POST[f_align]', b.size = '" . $_POST['format_tizer'] . "', b.font = '" . $_POST['font_link'] . "', b.font_size = '" . $_POST['size_link'] . "', b.text_decoration = '" . $_POST['text_decoration'] . "' WHERE b.id = '$_POST[id]' AND b.number = '$_POST[b]' AND s.id = b.id AND s.id_user = $id_user";
				updata($query);
			} else {
				$query = "INSERT INTO `blocks` VALUES('$_POST[id]', '$_POST[b]', '$_POST[f_qty]', '$_POST[f_type]', '$_POST[f_colbg]', '$_POST[f_coltext]', '$_POST[f_border]', '$_POST[f_align]','" . $_POST['format_tizer'] . "', '" . $_POST['font_link'] . "', '10', '2', '')";
				insert($query);
			}
		}
		if ($_GET[b] != 2) $_GET[b] = 1;
		$query = "SELECT COUNT(*) FROM `blocks` WHERE `id` = '$_GET[id]' AND `number` = '$_GET[b]'";	
		$set = select($query);
		$row = mysql_fetch_row($set);
		if ($yn = ($row[0] > 0)) {
			// ��������� �������: 07.09.08
			// $query = "SELECT * FROM `blocks` WHERE `id` = '$_GET[id]' AND `number` = '$_GET[b]'";
			$query = "SELECT b.row AS row, b.cols AS cols, b.background AS background, b.link_color AS link_color, b.border AS border, b.align AS align, s.height AS size_height, s.width AS size_width, f.font AS font, b.font_size AS font_size, t.name AS text_decoration, b.hide_text AS hide_text, b.size AS format FROM `blocks` b, `size` s, `font` f, `text_decoration` t WHERE b.id = '" . $_GET['id'] . "' AND b.number = '" . $_GET['b'] . "' AND b.size = s.id AND b.font = f.id AND b.text_decoration = t.id";
			// �����
			$set = select($query);
			$row = mysql_fetch_array($set);
		} else {
			$row[row] = 1;
			$row[cols] = 3;
			$row[background] = '#FFFFFF';
			$row[link_color] = '#000000';
			$row[border] = 0;
			$row[align] = 1;
			// 07.09.08
			$row['size_height'] = 60;
			$row['size_width'] = 80;
			$row['font'] = 'arial';
			$row['font_size'] = 12;
			$row['text_decoration'] = 'underline';
			$row['hide_text'] = 0;
			$row['format'] = 3;
			// �����
		}
		$format_tizer = '';
		$set = select("SELECT * FROM `size`");
		while($form = mysql_fetch_array($set)) {
			if($form[0] == $row['format']) $select = ' selected';
			else $select = '';
			$format_tizer .= '<option value="' . $form[0] . '"' . $select . '>' . $form[1] . ' X ' . $form[2];
		}
		$font_link = '';
		$set = select("SELECT * FROM `font`");
		while($form = mysql_fetch_array($set)) {
			if($form[1] == $row['font']) $select = ' selected';
			else $select = '';
			$font_link .= '<option value="' . $form[0] . '"' . $select . '>' . $form[1];
		}
		$size_link = '';
		for($i=10;$i<=20;$i=$i+2) {
			if($i == $row['font_size']) $select = ' selected';
			else $select = '';
			$size_link .= '<option value="' . $i . '"' . $select . '>' . $i;
		}
		$text_decoration = '';
		$set = select("SELECT * FROM `text_decoration`");
		while($form = mysql_fetch_array($set)) {
			if($form[1] == $row['text_decoration']) $select = ' checked';
			else $select = '';
			$text_decoration .= '<input type="radio" name="text_decoration" value="' . $form[0] . '"' . $select . '><a style="text-decoration:' . $form[1] . '">����� ������</a>&nbsp;&nbsp;&nbsp;';
		}
		// 07.09.08
		if ($row[row] == 1) $height = $row['size_height'] + 10; 
		else $height = ($row['size_height'] + 10)*$row[cols];
		// �����
		if ($row[align] == 0) $height = $height*1.5;
		
		?>
		<script language="JavaScript" type="text/javascript" src="wz_tooltip.js"></script>		<div align="center">
			��������! ���� ��� ��� ���������� �� ��������, ������� ��������� �� ��������� ��� ����� �� �����, ���������� ������������� �����.
��� ���� ��� �� ���������� �� ����� �������������� ���� � �����������, ��������� �� ��������� - �������� � ��������� �������������� ����.
		</div><br>
		<table width="500" class='window' border='0' align='center' cellpadding='0' cellspacing='0'>
<form method="post" name="add">
  <tr class='WindowHeader'>
							<td align=left>&nbsp;&#9643; <b>��������� ����� �������: </b>						<script language="JavaScript" type="text/JavaScript">
						<!--
						function jumpMenu(selObj){ eval("parent.location='"+selObj.options[selObj.selectedIndex].value+"'"); }
						//-->
						</script><select name="change_block" onChange="jumpMenu(this)">
<option value="block.html?id=<?=$_GET[id]?>" >��������</option>
<option value="block.html?id=<?=$_GET[id]?>&b=2" <? if ($_GET[b] == 2) echo 'selected';?>>��������������</option>
</select>
</td><td align='right'>&#9679;&nbsp;</td>
						</tr>
  <tr bgcolor="#FFFFFF" class="Text2" align="center"><td colspan=2>
        <table width="100%">
          <tr class=Table1>
            <td width="40%" align="right">������������:&nbsp;<img onmouseover="Tip('�������� ������������ ������� � �����. ��� ������������ ������������ ������ ����������� �������������� �������.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;</td>
            <td>&nbsp;<input type="radio" value="1" name="f_type" <? if ($row[row] == 1) echo 'checked';?>>&nbsp;��������������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="0" name="f_type" <? if ($row[row] == 0) echo 'checked';?>>&nbsp;������������</td>
          </tr>
          <tr class=Table2>
            <td align="right">���-�� � �����:&nbsp;<img onmouseover="Tip('�������� ���������� ������� � �����. ����������� ���������� ��� ��������������� ������������ 3-5, ��� ������������� 5-7.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;</td>
            <td>&nbsp;<input type="radio" value="2" name="f_qty" <? if ($row[cols] == 2) echo 'checked';?>> 2
            	&nbsp;&nbsp;&nbsp;<input type="radio" value="3" name="f_qty" <? if ($row[cols] == 3) echo 'checked';?>> 3
            	&nbsp;&nbsp;&nbsp;<input type="radio" value="4" name="f_qty" <? if ($row[cols] == 4) echo 'checked';?>> 4
            	&nbsp;&nbsp;&nbsp;<input type="radio" value="5" name="f_qty" <? if ($row[cols] == 5) echo 'checked';?>> 5
            	&nbsp;&nbsp;&nbsp;<input type="radio" value="6" name="f_qty" <? if ($row[cols] == 6) echo 'checked';?>> 6
            	&nbsp;&nbsp;&nbsp;<input type="radio" value="7" name="f_qty" <? if ($row[cols] == 7) echo 'checked';?>> 7</td>
          </tr>
          <tr class=Table1>
            <td align="right">���� ���� IFRAME:&nbsp;<img onmouseover="Tip('������� ���� ����, �� ������� ����� ���������� ������. ������ ��������������� ����, ��������������� ����� ����� ���������� ����� �� ��������.</b>', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;</td>
            <td>&nbsp;<input name="f_colbg" type="text" class="field5" id="f_colbg" size="9" maxlength="7" value="<?=$row[background]?>">
            				</td>
          </tr>
          <tr class=Table2>
            <td align="right">���� ������ ������:&nbsp;<img onmouseover="Tip('������� ���� ������ ������, ������� ����� ���������� ������ �� �������. ������ ��������������� ����, ��������������� ����� ������ �� ��������.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;</td>
            <td>&nbsp;<input name="f_coltext" type="text" class="field5" id="f_coltext" size="9" maxlength="7" value="<?=$row[link_color]?>">
            				</td>
          </tr>
          <tr class=Table1>
            <td align="right">����� �������:&nbsp;<img onmouseover="Tip('���������� �������, ���� ������ ��� �� ������ ������ ��� ������� ������ (1px). ���� ����� ������������� ����� ������ ������.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;</td>
            <td>&nbsp;<input type="checkbox" value="1" name="f_border" <? if ($row[border] == 1) echo 'checked';?>>&nbsp;��������</td>
          </tr>
          <tr class=Table2>
            <td align="right">������������:&nbsp;<img onmouseover="Tip('���� ����������� ������������ <b>� ������</b> - ��������� ������ ����� ���������� ������ �� �������, ���� <b>� �������</b> - ��������� ������ ����� ���������� ��� �������� � ������������ � ����� ����� �� ������.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;</td>
            <td>&nbsp;<input type="radio" value="1" name="f_align" <? if ($row[align] == 1) echo 'checked';?>>&nbsp;� ������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="0" name="f_align" <? if ($row[align] == 0) echo 'checked';?>>&nbsp;� �������</td>
          </tr>
		  <tr class=Table1>
            <td align="right">������ ������:&nbsp;<img onmouseover="Tip('��������������� ������ ������.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;</td>
            <td><select name="format_tizer"><?=$format_tizer?></select> ������ � ������ (������)</td>
          </tr>
		  <tr class=Table2>
            <td align="right">����� ������ ������:&nbsp;<img onmouseover="Tip('����� ������.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;</td>
            <td><select name="font_link"><?=$font_link?></select></td>
          </tr>
		  <tr class=Table1>
            <td align="right">������ ������ ������:&nbsp;<img onmouseover="Tip('������ ������ ������.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;</td>
            <td><select name="size_link"><?=$size_link?></select></td>
          </tr>
		  <tr class=Table2>
            <td align="right">������������� ������ ������:&nbsp;<img onmouseover="Tip('������������� ������ ������.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;</td>
            <td><?=$text_decoration?></td>
          </tr>
          <tr class=Table1>
            <td align="center" colspan="2"><input name="f_ok" type="hidden" value= "1"><input name="id" type="hidden" value= "<?=$_GET[id]?>"><input name="b" type="hidden" value= "<?=$_GET[b]?>"><input type="submit" style="width:100px" class="field2" value="���������"></td>
          </tr>
        </table>
  </td></tr>
</form>
</table><br>
<div align='center'><b><font color="#0000ff">��� ��� ������� �� �����</font></b><br><br><textarea class='field6'><? if ($yn) { ?>
<!--MediaNovosti.Ru-->
<script>
  var rnd = Math.round(Math.random() * 100000);
   document.write("<"+"if"+"rame src="+"<?=BASE_URL?>/if"+"rame.php?r="+rnd+"&id=<?echo $_GET[id]; if ($_GET[b] == 2) echo "&b=2";?> width=100% height=<?=   $height?> marginwidth=0 marginheight=0 scrolling=no frameborder=0></"+"if"+"ram"+"e>");
  </script>
<!--/MediaNovosti.Ru-->
<? } ?></textarea></div>
<br><br>
<? if ($yn) { ?>
<div align="center">
<!--MediaNovosti.Ru-->
  <script>
  var rnd = Math.round(Math.random() * 100000);
   document.write("<"+"if"+"rame src="+"<?=BASE_URL?>/if"+"rame.php?r="+rnd+"&id=<?echo $_GET[id]; if ($_GET[b] == 2) echo "&b=2";?> width=100% height=<?=   $height?> marginwidth=0 marginheight=0 scrolling=no frameborder=0></"+"if"+"ram"+"e>");
  </script>
<!--/MediaNovosti.Ru-->
</div> <? } ?>