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
			<td>{$i.adid}</td>
			<td>{$i.wmr}</td>
			<td>{$i.sum}</td>
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
			<td>
				{$i.date|date}
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