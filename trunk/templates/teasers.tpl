{include file="layout/header.tpl"}
<p class="anotation">
	<img src="./images/add.gif" alt="Добавить" />
	<a href="teaser.php?company={$COMPANY.id}" class="s11">Добавить тизер</a>
</p>

<table>
	<tr>
		{foreach from=$TABLE.cols item=c}
		<th class="name">{sort_table attr=$c}</th> 
		{/foreach}
	</tr>
	{foreach from=$TABLE.items item=t}
	<tr>
		<td>
			<a href="teaser.php?company={$t.company_id}&id={$t.id}">{$t.title}</a> <br />
			{$t.desc} <br />
			{$t.url} <br />
		</td>
		<td>
			<div><a href="teaser.php?company={$t.company_id}&id={$t.id}"><img src="{teaser attr=$t}" alt=""  width="100px" height="100px" /></a></div>
		</td>
		<td>{$t.status|human:STATUS_LIST}</td>
		<td>{$t.price}</td>
		<td>{$t.ctr}</td>
		<td>{$t.date|date}</td>
	</tr>
	{/foreach}
	<tr class="footer_table"> 
		<td colspan="8">{include file="layout/pagenav.tpl"}</td>
	</tr>
</table>	
{include file="layout/footer.tpl"}