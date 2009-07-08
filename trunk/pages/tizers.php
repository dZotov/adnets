<h3>Тизеры</h3>
		<script language="JavaScript" type="text/javascript" src="wz_tooltip.js"></script>
		<script language="JavaScript" type="text/JavaScript">
						<!--
						function jumpMenu(selObj){ eval("parent.location='"+selObj.options[selObj.selectedIndex].value+"'"); }
						//-->
		</script>
		<SCRIPT>
			function bg_on(aa) { aa.style.backgroundColor='#FFCC99'; }
			function bg_off(aa, sty) { aa.style.backgroundColor=sty; }
		</SCRIPT>
		<br>
		<p class="anotation">
			Добавление, удаление и редактирование тизеров
		</p>
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
		
		function img_resize($src, $dest, $width, $height, $rgb=0xFFFFFF, $proportion=false, $quality=100, $crop=true) {
			if(!file_exists($src)) return false;
			$size = getimagesize($src);
			if($size === false) return false;   
			if($proportion === true) {
				$h0 = $height;
				$height = ($width/$size[0])*$size[1];
				if($height > $h0) { $height = $h0; $width = ($height/$size[1])*$size[0]; }}
			if($width > $size[0]) $width = $size[0];
			if($height > $size[1]) $height = $size[1];
			$format = strtolower(substr($size['mime'], strpos($size['mime'], '/') + 1));
			$icfunc = 'imagecreatefrom'.$format;
			if(!function_exists($icfunc)) return false;
			$x_ratio = $width/$size[0];
			$y_ratio = $height/$size[1];
			if ($crop) $ratio = max($x_ratio, $y_ratio);
			else $ratio = min($x_ratio, $y_ratio);
			$use_x_ratio = ($x_ratio == $ratio);
			if($use_x_ratio) { $new_width = $width; $new_left = 0; } 
			else { $new_width = floor($size[0] * $ratio); $new_left = floor(($width - $new_width) / 2); }
			if(!$use_x_ratio) { $new_height = $height; $new_top = 0; }
			else { $new_height = floor($size[1] * $ratio); $new_top = floor(($height - $new_height) / 2); }
			$isrc = $icfunc($src);
			$idest = imagecreatetruecolor($width, $height);
			if(is_array($dest)) { 
				$nd = explode('.', $src); 
				$ndc = count($nd); 
				$nd[$ndc - 2] .= $dest[0]; $dest = implode('.', $nd); }
			imagefill($idest, 0, 0, $rgb);
			imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0, $new_width, $new_height, $size[0], $size[1]);
			imagejpeg($idest, $dest, $quality);
			imagedestroy($isrc);
			imagedestroy($idest);
			return $dest; }
		
		$path = BASE_PATH."/images/user/";
		$max_size = 20000;
		
		if (isset($_GET[delid])) {
			$query = "SELECT `image` FROM `tizers` WHERE `id` = '$_GET[delid]' AND `id_user` = '$id_user'";
			$set = select($query);
			$row = mysql_fetch_array($set);
			unlink($path.$row[image]);
			$query = "DELETE FROM `tizers` WHERE `id` = '$_GET[delid]' AND `id_user` = '$id_user'";
			insert($query);
		}
		
		if (isset($_GET[off])) {
			$query = "UPDATE `tizers` SET `status` = '5' WHERE `id` = '$_GET[off]' AND `id_user` = '$id_user'";
			updata($query);
		}
		if (isset($_GET[on])) {
			$query = "UPDATE `tizers` SET `status` = '2' WHERE `id` = '$_GET[on]' AND `id_user` = '$id_user'";
			updata($query);
		}
		
		if (is_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'])) {
			$str = md5(rand(1,100000));
			$new_name = substr($str, 6, 6);
			$type = explode (".", $HTTP_POST_FILES['userfile']['name']);
			if ($HTTP_POST_FILES['userfile']['size']>$max_size) { echo "<br><div align=center class='text2'>Слишком большой файл!</div><br>\n";}
			if (($HTTP_POST_FILES['userfile']['type']=="image/gif") || ($HTTP_POST_FILES['userfile']['type']=="image/pjpeg") || ($HTTP_POST_FILES['userfile']['type']=="image/jpeg")) {

				if (file_exists($path . $id_user . "/" . $new_name . "." . $type[1])) { echo "<br><div align=center class='text2'>Файл с таким именем уже существует!</div><br>\n"; exit; }
				if (!file_exists($path . $id_user)) {mkdir($path . $id_user);}
				$res = copy($HTTP_POST_FILES['userfile']['tmp_name'], $path . $id_user . "/" .
				$new_name . "." . $type[1]);
				$filename = $path . $id_user . "/" . $new_name . "." . $type[1];
				list($width, $height) = getimagesize($filename);
				if (($width > 160) OR ($height > 160)) {
					img_resize($filename, $filename, 160, 160);
				}
				if (!$res) { echo "<br><div align=center class='text2'>Файл не загружен!</div><br>\n";} else {
					$des = filterd($_POST[description]);
					$f_url = filterurl($_POST[url]);
					$query = "INSERT INTO `tizers` values('','$id_user','$f_url','".$id_user . "/".$new_name . "." . $type[1]."','$des', '3','0','0', 'Тизер на модерации')";
					insert($query);
				}

			} else { echo "<br><div align=center class='text2'>Неправильный тип файла " . $HTTP_POST_FILES['userfile']['type'] . "</div><br>\n"; exit; }

		}
		$query = "SELECT COUNT(*) FROM `tizers` WHERE `id_user` = '$id_user'";
		$set = select($query);
		$row = mysql_fetch_row($set);
		if ($row[0] > 0) {
			echo "<table width=97% class='window' border='0' align='center' cellpadding='0' cellspacing='0'>
						<tr class='WindowHeader'>
							<td align=left>&nbsp;&#9643; <b>Тизеры</b></td>
							<td align='right'>&#9679;&nbsp;</td>
						</tr>
						<tr bgcolor='#FFFFFF' class='Text1' align='center'><td colspan=2><table width='100%'>
				<tr><td width='5%' class='TableHeader' align='center'>ID</td><td width='15%' class='TableHeader' align='center'>Баннер</td><td width='50%' class='TableHeader' align='center'>Тизер</td><td width='15%' class='TableHeader' align='center'>Статус</td><td width='15%' class='TableHeader' align='center'>Действие</td></tr>";
			$query = "SELECT s.id, s.url, s.description, s.show, s.cliks, st.status, s.status, s.title, s.image FROM tizers s, status st WHERE s.id_user = '$id_user' AND st.id = s.status ORDER BY s.id";
			$set = select($query);
			while ($row = mysql_fetch_row($set)) {
				if ($class == 'Table2') $class = 'Table1';
				else $class = 'Table2';
				$nabl = "";
				$ctr = round($row[4]/$row[3]*100, 2);
				if ($row[6] == 2) $nabl.="[<a href='tizers.html?off=$row[0]'>Отключить</a>]<br>";
				if ($row[6] == 5) $nabl.="[<a href='tizers.html?on=$row[0]'>Включить</a>]<br>";
			//	if (($row[6] == 2) OR ($row[6] == 5)) $nabl.="[<a href='redizer.html?id=$row[0]'>Редактировать</a>]<br>";
				echo "<tr onmouseover=bg_on(this); onmouseout=\"bg_off(this, '');\" class='$class'><td width='5%' align=center>$row[0]</td><td align=center><a href='$row[1]'><img src='images/user/$row[8]' class=Window></a></td><td width='50%' align='left'><a href='$row[1]'>$row[2]</a><br>$row[1]<br>Показы: $row[3], клики: $row[4], CTR: $ctr</td><td width='15%' align=center><a title='$row[7]'>$row[5]</a></td><td width='15%'>".$nabl."[<a href='tizers.html?delid=$row[0]' onclick=\"return confirmLink(this," . "'$row[1]'" . ")\">Удалить</a>]</td></tr>";
				$link = $row[1];
			}
			echo "</table></td></tr></table>";
		}
		
		if ($link == '') $link = 'http://';
		
		?>
				<script type="text/javascript" language="JavaScript">
					<!--

					function CheckLoginForm(form_name) {
						if (!form_name.url.value.match('.+')) {
							alert("Укажите URL!");
							form_name.url.focus();
							form_name.url.value = "";
							return false;
						}
						if (!form_name.description.value.match('.+')) {
							alert("Напишите описание!");
							form_name.description.focus();
							form_name.description.value = "";
							return false;
						}
						return true;
					}

					-->
				</script>
			
				<form id="profile" method='post' name='registrationForm' onsubmit='return CheckLoginForm(this);' enctype="multipart/form-data">
					<p class="anotation">Добавить тизер:</p>
							
					<label for="banner">Баннер:&nbsp;<img onmouseover="Tip('Для более качественного отображения тизера, используйте загружаемую картинку размером 160х160.', DELAY, 0)" src="images/help.png" width="11" height="11"></label>
					<input name="userfile" type="file"  id="f_pic" size="40">
					<label for="url">URL:&nbsp;<img onmouseover="Tip('Используйте любой путь к страницам сайта.', DELAY, 0)" src="images/help.png" width="11" height="11"></label>
					<input type='text' name='url'  maxLength='128' value='<?=$link?>'>
					<label for="desc">Описание:&nbsp;<img onmouseover="Tip('Подберите наиболее привлекательное описание тизера для повышения CTR.', DELAY, 0)" src="images/help.png" width="11" height="11"></label>
					<input type='text' name='description'  maxLength='128'>
					
					<input type='submit' id="accept" name="accept" value='Добавить'>
				</form>
<br>