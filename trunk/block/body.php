<html>
<head>
	<title><?=$title?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<meta name="Keywords" content="<?=$keywords?>">
	<meta name="Description" content="<?=$description?>">
	<script src="scripts.js" language="javascript"></script>
	<? if ($access_user!=0) { ?>
	<link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />
	<? }else{?>
	<link href="css/screen_other.css" rel="stylesheet" type="text/css" media="screen" />
	<?}?>
</head>
<body>
<?
if ($access_user!=0 || $_REQUEST['cat']=='registration' || $_REQUEST['cat']=='log') {
?>
<div id="main">
	<? if($_REQUEST['cat']!='registration' && $_REQUEST['cat']!='log'){?>
	<div id="header">
		<h1><a href="index.html"><span></span>adnets.ru</a></h1>
	</div>
	<?}?>
	<div id="content">
		<? include($page); ?>
	</div>
	<?
					
		if ($access_user >= 1) {
			include('block/user.php');
		if ($access_user == 2) include('block/adm.php');
			}
						
	?>
	<!--
	<div id="sub_menu">
		<p class="registration"><a class="button" href="registration.html">Регистрация</a></p>
		<form id="login_m">
			<label for="e_mail_m">e-mail </label>
			<input type="text" name="e_mail_m" id="e_mail_m" />
			<label for="password_m">Пароль </label><a href="#n" id="remember_password">?</a>
			<input type="text" name="password_m" id="password_m" />
		</form>
		<p class="exit"><a class="button" href="#n">Войти</a></p>
	</div>
	-->
<?if($_REQUEST['cat']!='registration' && $_REQUEST['cat']!='log'){?>
	<div id="sub_menu">
		<p class="balanc"><span>0</span>руб. на балансе</p>
		<ul>
			<li><a href="faq.html">Справка</a></li>
			<li><a href="contacts.html">Контакты</a></li>
		</ul>
		<p class="user_type">
			<?if($_COOKIE['type']=='webmaster') echo "Веб-мастер"; else echo '<a href="index.html?type=webmaster">Веб-мастер</a>'; ?> | 
			<?if($_COOKIE['type']=='reclam') echo "Рекламодатель"; else echo '<a href="index.html?type=reclam">Рекламодатель</a>'; ?>
		</p>
		<p class="email">email@mail.ru</p>
		<p class="exit"><a class="button" href="index.html?quit=off">Выйти</a></p>
	</div>
<?}?>
</div>
<? if($_REQUEST['cat']!='registration' && $_REQUEST['cat']!='log'){?>
<div id="footer">
		<p>© <a href="/">adnets.ru</a> 2009</p>
	</div>
<?}?>
<?
}else{
?>
<div id="container">
	<h1><span></span>Adnets.ru</h1>
	<ul>
		<li id="registration"><a href="registration.html">Регистрация</a></li>
		<li id="enter"><a href="log.html">Вход</a></li>
	</ul>	
</div>
<?}?>


</body>
</html>				