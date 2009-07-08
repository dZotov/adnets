<?
$login = trim(filter($_POST['login']));
$email = trim(filter($_POST['email']));
$icq = trim($_POST['icq']);
$password1 =  trim($_POST['password']);
$password2 =  trim($_POST['repeat_password']);
$date = date ("Y-m-d H:i:s");
$showform=1;
if($password1==$password2)
{
	
	if(preg_match('/^[A-Za-z0-9\._-]+@[A-Za-z0-9\._-]+\.[A-Za-z]{2,4}$/',$email))
	{
		$res=mr2array(sql("SELECT COUNT(*) as res FROM `user` WHERE login = '$login' AND email = '$email'"));
		if(!$res[0]['res'])
		{
			$str_key = $login . $date;
			$key = md5($str_key);
			$name=$login;
			$password1=md5($password1);
			if(sql("INSERT INTO `user` VALUES( '', '$login', '$password1', '$login', '$email', '$icq', '$date', '', '', '$key','" . $_COOKIE['spid'] . "')"))
			{
				$too.="From: ".SEND_EMAIL."\n";
				$too.="content-type: text/html; charset=windows-1251\n";
				$body = "Уважаемый(ая) $name, Вы зарегистрировалить на сайте <a href='".BASE_URL."'>".BASE_URL."</a>!<br><br>
					Для того, чтобы активировать свою учётную запись, перейдите по ссылке: <a href='".BASE_URL."/finalofreg.php?login=" . $login . "&key=" . $key ."'>".BASE_URL."/finalofreg.php?login=" . $login . "&key=" . $key . "</a>.<br><br>
					Активировать учётную запись можно только в течении 30 дней.<br><br>
					Если Вы не регистрировались на сайте, то просьба - удалите это письмо!
						 <p>Сервис по продвижению сайтов - <a href='".BASE_URL."'>".BASE_URL."</a>";
				$subject = "Регистрация на сайте ".BASE_URL;
				mail($email, $subject, $body, $too);
				$body = "Зарегистрирован $name";
				$subject = "Регистрация нового клиента";
				mail(ADMIN_EMAIL, $subject, $body, $too);
				$description = "Уважаемый(ая) $name! Вы успешно зарегистрировались на сайте.<br>
							На указанный электронный адрес было отправлено письмо для активации
							Вашей учётной записи. После её активации, Вы сможете зайти на сайт под
							своим логином.";
				$showform=0;
			}
		}
		else
			$ERRORS[]="Данный аккаунт уже существует в системе";
	}
	else
		$ERRORS[]="Неверный формат Email";
}
else
	$ERRORS[]="Пароли не совпадают";


?>


<div id="container_registr">

<div id="corner">
	<h1><a href="index.html"><span></span>Adnets.ru</a></h1>
	<h2>Регистрация
	<?
if(!count($ERRORS))
{ 
	echo $description;
}
elseif(count($_POST)) 
{
	foreach($ERRORS as $v)
	{ 
		echo "<div style=\"color:red\">{$v}</div>";
	}
} 

?>
</h2>
<?if($showform){?>
<form id="registration" name="registration" action="" method="post">
	<label for="email">Адрес электронной почты </label>
	<input type="text" name="email" id="email" value="" />
	<label for="email">Логин</label>
	<input type="text" name="login" id="login" value="" />
	
	<label for="password">Пароль </label>
	<input type="password" name="password" id="password" value="" />
				
	<label for="repeat_password">Подтверждение пароля </label>
	<input type="password" name="repeat_password" id="repeat_password" value="" />
				
	<label for="icq">Номер ICQ </label>
	<input type="text" name="icq" id="icq" value="" />
				
	<div id="work_as">
		<h3>Начать работу</h3>
		<div class="block">
		<label for="webmaster">Вебмастером </label>
		<input type="radio" name="work_as" checked="checked" value="webmaster" />
		</div>
		<div class="block">
		<label for="advertiser">Рекламодателем </label>
		<input type="radio" name="work_as" value="advertiser" />
		</div>
	</div>
							
	<a href="javascript:Submit('registration');" id="registr"><span>Зарегестрироваться</span></a>
</form>	
<?}?>
</div>		
</div>
