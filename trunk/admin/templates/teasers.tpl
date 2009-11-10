{include file="layout/head.tpl"}
{include file="layout/top.tpl"}

<div class="padt15">
	<table>
		<tr class="t_head">
			{foreach from=$TABLE.cols item=c}
			<td>{sort_table attr=$c}</td> 
			{/foreach}
		</tr>
		{foreach from=$TABLE.items item=t}
		<tr class="{cycle values='t1, t2'}">
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

</div>

{include file="layout/bottom.tpl"}
{include file="layout/footer.tpl"}