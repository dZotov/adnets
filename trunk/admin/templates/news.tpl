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
			<td>{$i.title}</td>
			<td>{$i.preview|truncate:50}</td>
			<td>{if $i.type==1}<span style="color:blue">Вебмастерам</span>{else}<span style="color:green">Рекламодателям</span>{/if}</td>
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
			<td>
				<a href="edit_news.php?id={$i.id}">редакт.</a>
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