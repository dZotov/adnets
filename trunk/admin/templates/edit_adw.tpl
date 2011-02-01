{include file="layout/head.tpl"}
{include file="layout/top.tpl"}

<div class="padt15">
	<form action="" name="logon" method="post">
	
	<table cellpadding="3" class="vat" align="center">
		{foreach from=$FORM item=f}
		<tr>
			<td class="padt5">{$f.title}</td>
			<td class="padt5">{$f.field}</td>
			<td class="padt5">{$f.error}</td>
		</tr>
		{/foreach}
		{if $smarty.get.save=='ok'}
		<tr>
			<td></td>
			<td colspan="2" class="b green">
				Сохранено
			</td>
		</tr>
		{/if}
		<tr>
			<td></td>
			<td><input type="submit" /></td>
		</tr>	
	</table>

	</form>
</div>



{include file="layout/bottom.tpl"}
{include file="layout/footer.tpl"}