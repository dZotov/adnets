<?
if (isset($_POST[login]) and isset($_POST[parol])) {
	if ($_POST[number] == $HTTP_SESSION_VARS["sess_login"]) {
		$md5_psw = md5($_POST[parol]);
		$login = $_POST[login];
		$user = mr2array(sql("SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$md5_psw'"));
		if ($user[0]['id']) {
			setcookie("reguser", "$login");
			setcookie("regpass", "$md5_psw");
			$_COOKIE['reguser'] = $login;
			$_COOKIE['regpass'] = $md5_psw;
			$query = "UPDATE `user` SET `last_visit` = `now_visit`, `now_visit` = NOW() WHERE `login` = '$login' AND `password` = '$md5_psw'";
			
			$GLOBALS['c_user']=$user[0];
			$GLOBALS['c_user_id']=$user[0]['id'];
						
			updata($query);
			if(!isset($_COOKIE['type']))
				setcookie("type", "webmaster", time() + 10000000);
			header("Location: index.html");
		} else {
			$title = "Ошибка авторизации!";
			$page = "pages/error.php";
			$header = "Ошибка авторизации!";
			$messenge = "Вы ввели неверный логин или пароль!";
		}
	} else {
		$title = "Ошибка авторизации!";
		$page = "pages/error.php";
		$header = "Ошибка авторизации!";
		$messenge = "Вы ввели неверный проверочный код!";
	}
}

?>


			<script type="text/javascript" language="JavaScript">
					<!--

					function CheckLoginForm(form_name) {
						if (!form_name.login.value.match('^[a-zA-Z0-9._-]+$')) {
							alert("Укажите правильный логин! \nИспользуются символы латинского алфавита, цифры и знаки '-' и '_'");
							form_name.login.focus();
							form_name.login.value = "";
							return false;
						}
						if (!form_name.parol.value.match('^[a-zA-Z0-9._-]+$')) {
							alert("Укажите пароль! \nИспользуются символы латинского алфавита, цифры и знаки '-' и '_'");
							form_name.parol.focus();
							form_name.parol.value = "";
							return false;
						}
						return true;
					}

					function _onfocus()
					{
						if (logonForm.login.value == "Логин") {
						logonForm.login.value = "";
					}
					return true;
					}

					function _ponfocus()
					{
						if (logonForm.parol.value == "Пароль") {
						logonForm.parol.value = "";
					}
					return true;
					}
					
				-->
				</script>
				<div id="container_registr">
					<div id="corner">
						<h1><a href="index.html"><span></span>Adnets.ru</a></h1>
						<h2>Вход</h2>
						<div style="text-align:center;">
							<form action="" method="post" name="logonForm"  onsubmit="return CheckLoginForm(this);">
								<INPUT type="test" height="20" maxLength="16" name="login"  value='Логин' onFocus="_onfocus()"><br>
								<INPUT type="Password" maxLength=16 name="parol" value='Пароль' onFocus="_ponfocus()"><br>
								<br>
								<INPUT type="submit" value='Войти' class="field2">
							</form>
						</div>
						<a href="registration.html" style="FONT-SIZE: 12px; font-family: 'MS Sans Serif', Geneva, sans-serif;" title='Регистрация аккаунта'>Зарегистрироваться</a><br>
				<a href="forgotpass.html" style="FONT-SIZE: 12px; font-family: 'MS Sans Serif', Geneva, sans-serif;" title='Получение нового пароля на E-mail'>Забыли пароль?</a><br /><br />
					</div>
				</div>
				
				