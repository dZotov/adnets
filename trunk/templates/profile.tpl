{include file="layout/header.tpl"}
<h3>Профиль</h3>
<p class="anotation">Для изменения остальных данных обратитесь в <strong><a href="contacts.php">слубу поддержки</a></strong></p>
<form id="profile" action="" method="post" name="profile">
	<input type="hidden" name="update" value="1">			
	<div id="hide_block">
		<label for="hide">Скрывать </label>
		<input type="checkbox" name="hide" id="hide" checked="checked" />
	</div>
	<label for="login_in_top">Логин в Топ 10 </label>
	<input type="text" name="login_in_top" id="login_in_top" value="{$ACCOUNT.intop|default:'WebMaster'}" disabled="disabled" />
	
	<label for="email">Адрес электронной почты </label>
	<input type="text" name="email" id="email" value="{$ACCOUNT.email}" disabled="disabled" />
	<label for="icq">WMR</label>
	<input type="text" name="wmr" id="wmr" value="{$ACCOUNT.wmr}" disabled="disabled" />
	<label for="icq">Номер ICQ </label>
	<input type="text" name="icq" id="icq" value="{$ACCOUNT.icq}" />
	<p class="change_pass"><a class="button" href="javascript:Submit('profile')">Сохранить изменения</a></p>				
				
</form>	

<p class="small_anotation profile_anotation">Дополнительный заработок от приведенного вебмастера или рекламодателя. Реферальская ссылка:</a></p>
<p class="small_anotation profile_anotation"><span>http://adnets.ru/?owner_id={$ACCOUNT.id}</span>
{include file="layout/footer.tpl"}