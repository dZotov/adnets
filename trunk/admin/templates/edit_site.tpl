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
		<tr>
			<td class="padt5">Вебмастер:</td>
			<td class="padt5 b"><a href="edit_adw.php?id={$ADWERT.id}">{$ADWERT.email}</td>
		</tr>
		{if $smarty.get.save=='ok'}
		<tr>
			<td></td>
			<td colspan="2" class="b green">
				{$DATA_WAS_SAVED}
			</td>
		</tr>
		{/if}
		<tr>
			<td></td>
			<td style="padding-top:15px;"><input type="submit" /></td>
		</tr>	
	</table>

	</form>
</div>



{include file="layout/bottom.tpl"}
{include file="layout/footer.tpl"}