{include file="layout/head.tpl"}
{include file="layout/top.tpl"}
<div style="padding-top:50px;">
	<table width="100%">
		<tr class="t_head">
			{foreach from=$TABLE.cols item=c}
				<td>{sort_table attr=$c}</td>
			{/foreach}
		</tr>
		{foreach from=$TABLE.items item=i}
		<tr class="ac {cycle values='t1, t2'}">
			<td>{$i.id}.</td>
			<td>{$i.email}</td>
			<td>
				{if $i.status==$smarty.const.STATE_ACTIVE}
					<span class="green">
						Активный
					</span>
				{elseif $i.status==$smarty.const.STATE_INACTIVE}
					<span class="red">
						Неактивный
					</span>
				{/if}
			</td>
			<td>{$i.regdate|date}</td>
			<td>{$i.balance}</td>
			<td>
				<a href="edit_adw.php?id={$i.id}">редакт.</a>
			</td>
		</tr>
		{/foreach}
	</table>
</div>
<div class="ac">
	{include file="./layout/pagenav.tpl"}
</div>

{include file="layout/bottom.tpl"}
{include file="layout/footer.tpl"}