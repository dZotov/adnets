{include file="layout/header_l.tpl"}
<div id="container_registr_logon">
<div id="corner">
	<h1><a href="index.php"><span></span>Adnets.ru</a></h1>
	<h2>Вход</h2> <span class="errors" id="log_error">{$ERROR}</span>
	
<form id="registration" action="" method="post">
	<div id="logon">
		<label for="email">Адрес электронной почты </label>
		<input type="text" name="email" id="email" value="" />
		
		<label for="password">Пароль </label>
		<input type="password" name="password" id="password" value="" />
		<a href="javascript: Submit('registration');" id="registr"><span>Войти</span></a>
	</div>
</form>	
</div>		
</div>
{include file="layout/footer_l.tpl"}