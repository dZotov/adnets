{include file="layout/header.tpl"}

<div class="padt15">
	<form action="" method="post">
		<table cellpadding="3" class="vat" align="center">
			{foreach from=$FORM item=f}
			<tr>
				<td class="padt5">{$f.title}</td>
				<td class="padt5">{$f.field}</td>
				<td class="padt5">{$f.error}</td>
			</tr>
			{/foreach}
			<tr>
				<td></td>
				<td><input type="submit" value="Геристрация" id="registration" /></td>
			</tr>	
		</table>
	</form>
</div>


{include file="layout/footer.tpl"}