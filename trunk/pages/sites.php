<h3>Площадки</h3>
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
		<p class="anotation">Здесь можно добавить/удалить сайт на котором будут крутиться тизеры и получить код.</p> <br />
		<script type="text/javascript" language="JavaScript">
<!--

var confirmMsg  = 'Вы действительно хотите удалить сайт';

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
		
		if (isset($_GET[delid]) AND ($_GET[is_js_confirmed] == 1)) {
			$query = "DELETE FROM `sites` WHERE `id` = '$_GET[delid]' AND `id_user` = '$id_user'";
			if (insert($query)) {
				$query = "DELETE FROM `blocks` WHERE `id` = '$_GET[delid]'";
				insert($query);
			}
		}
		
		if (isset($_POST[url]) AND isset($_POST[name])) {
			$f_name = filter($_POST[name]);
			$f_url = filter($_POST[url]);
			$query = "INSERT INTO `sites` values('','$id_user','$f_url','$f_name','3', 'На модерации','0','0')";
			insert($query);
		}
		sites($id_user);
		
		?>
				<script type="text/javascript" language="JavaScript">
					<!--

					function CheckLoginForm(form_name) {
						if (!form_name.url.value.match('^[a-zA-Z0-9._-]+$')) {
							alert("Укажите правильно URL! \nИспользуются символы латинского алфавита, цифры и знаки '-' и '_'!\nНе нужно указывать: http://, www. и '/'");
							form_name.url.focus();
							form_name.url.value = "";
							return false;
						}
						if (!form_name.name.value.match('.+')) {
							alert("Напишите название сайта!");
							form_name.name.focus();
							form_name.name.value = "";
							return false;
						}
						return true;
					}

					-->
				</script>
				<form method='post'  id="profile" name='registrationForm' onsubmit='return CheckLoginForm(this);'>
					<p class="anotation">Добавить сайт:</p>
					<label for="domain">Домен:&nbsp;<img onmouseover="Tip('Только доменное имя: без http://, www и слэшей.<br><br>Например, moy_site.com.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;</label>
					<input type="text" name="domain" id="domain" value="" />
				
					<label for="title">Название сайта:&nbsp;<img onmouseover="Tip('Краткое описание или заголовок сайта для отображения в таблице. Допускаются буквы русскиого или латинского алфавита, пробел и тире.<br><br>Пример: <br><b>Коллекция частного видео</b>', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;</label>
					<input type='text' name='title' maxLength='128'>
						
					<input type='submit' id="accept" name="accept" value="Добавить">
						
				</form>
			