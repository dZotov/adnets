{include file="layout/header_l.tpl"}

<div id="container_registr">
<div id="corner">
	<h1><a href="index.php"><span></span>Adnets.ru</a></h1>
	<h2>Регистрация</h2>
	
<form id="registration">
	<div id="reg">
		<span class="errors" id="reg_error"></span>
		<input type="hidden" name="owner" id="owner" value="{$smarty.cookies.ref_id}">
		<label for="email">Адрес электронной почты </label> <span class="errors" id="email_error"></span>
		<input type="text" name="email" id="email" value="" />
		
		<label for="password">Пароль </label> <span class="errors" id="password_error"></span>
		<input type="password" name="password" id="password" value="" />
					
		<label for="repeat_password">Подтверждение пароля </label> <span class="errors" id="repeat_password_error"></span>
		<input type="password" name="repeat_password" id="repeat_password" value="" />
					
		<label for="wmr">WMR </label> <span class="errors" id="wmr_error"></span>
		<input type="text" name="wmr" id="wmr" value="R" />
					
		<div id="work_as">
			<h3>Начать работу</h3>
			<div class="block">
			<label for="webmaster">Вебмастером </label>
			<input type="radio" name="work_as" id="work_as" checked="checked" value="webmaster" />
			</div>
			<div class="block">
			<label for="advertiser">Рекламодателем </label>
			<input type="radio" name="work_as" id="work_as" value="advertiser" />
			</div>
		</div>
								
		<a href="#" id="registr" onclick="javascript:registration();"><span>Зарегестрироваться</span></a>
		<span id="loader" style="display:none;"> <img src="./images/loading.gif"></span>
	</div>
	<div id="suc">
		<strong>Вы успешно зарегестрировались!</strong>
			<a href="index.php" class="btn"><span>Ok</span></a>
	</div>
</form>	
</div>		
</div>

{include file="layout/footer_l.tpl"}