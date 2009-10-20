{include file="layout/header2.tpl"}

<p class="anotation">
	<img src="./images/add.gif" alt="Добавить" />
	<a href="company.php" class="s11">Добавить компанию</a>
</p>

<div class="padt15">
	<table>
		<tr class="table_head">
			{foreach from=$TABLE.cols item=c}
			<td>{sort_table attr=$c}</td> 
			{/foreach}
		</tr>
		{foreach from=$TABLE.items item=t}
		<tr class="table">
			<td><a href="company.php?id={$t.id}">{$t.title}</td>
			<td>{$t.category}</td>
			<td> <a href="">0</a> / 0 / 0 / 0</td>
			<td>0/<span class="red">0</span></td>
			<td>0/<span class="red">0</span></td>
			<td>{$t.ctr|default:0}</td>
			<td>{$t.money|default:0.00}</td>
			<td>{$t.date|date}</td>
		</tr>
		{/foreach}
		<tr class="footer_table"> 
			<td colspan="8">{include file="layout/pagenav.tpl"}</td>
		</tr>
	</table>	


</div>

{include file="layout/footer.tpl"}