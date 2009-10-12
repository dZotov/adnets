{include file="layout/header.tpl"}

<p class="anotation">
	<img src="./images/add.gif" alt="��������" />
	<a href="teaser.php" class="s11">�������� �����</a>
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
			<td><a href="teaser.php?id={$t.id}">{$t.title}</td>
			<td>{$t.date|date_format}</td>
		</tr>
		{/foreach}
	</table>	

	{include file="layout/pagenav.tpl"}

</div>

{include file="layout/footer.tpl"}