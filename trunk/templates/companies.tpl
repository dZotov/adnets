{include file="layout/header.tpl"}

<p class="anotation">
	<img src="./images/add.gif" alt="Добавить" />
	<a href="company.php" class="s11">Добавить компанию</a>
</p>

<div>
	<table>
		<tr>
			{foreach from=$TABLE.cols item=c}
			<td>{sort_table attr=$c}</td> 
			{/foreach}
		</tr>
		{foreach from=$TABLE.items item=t}
		<tr>
			<td>{$t.title}</td>
			<td>{$t.category}</td>
			<td>0/0/0/0/</td>
			<td>0/<span class="red">0</span></td>
			<td>0/<span class="red">0</span></td>
			<td>{$t.ctr|default:0}</td>
			<td>{$t.money|default:0.00}</td>
			<td>{$t.date|date_format}</td>
		</tr>
		{/foreach}
	</table>	

	{include file="layout/pagenav.tpl"}

</div>

{include file="layout/footer.tpl"}