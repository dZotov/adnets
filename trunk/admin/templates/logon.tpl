{include file="layout/head.tpl"}
{include file="layout/top.tpl"}

<div class="padt15">
	<form action="" name="logon" method="post">
	<center>
	{include file="layout/errors.tpl"}
	<table class="pad2">
		<tr>
			<td>Логин:</td>
			<td><input type="text" name="login" size="30" /></td>
		</tr>	
		<tr>
			<td>Пароль:</td>
			<td><input type="password" name="password" size="30" /></td>
		</tr>	
		<tr>
			<td></td>
			<td><input type="button" value=" Ok " class="btn" onclick="javascript: Submit('logon');" /></td>
		</tr>	
	</table>
	</center>
	</form>
<div>

{include file="layout/bottom.tpl"}
{include file="layout/footer.tpl"}