{include file="layout/header.tpl"}
{if !$DATA}
<p class="anotation"><strong>��� ����������� ��� �� �����������!</strong></p>	
{else}
<table>
	<tr>
		<th class="blocks">���������</th>
		<th class="blocks">������</th>
		<th class="blocks">�����</th>
		<th class="blocks">CRT</th>
		<th class="blocks">����������, ���.</th>
	</tr>
	{foreach from=$DATA item=i key=k name=data}
		<tr {if $smarty.foreach.data.iteration %2==0}class="invert"{/if}>
			<td>
				<p class="spec_blocks">{$i.ad_top_name}</p>
			</td>
			<td>
				<p class="spec_blocks">{$i.shows}</p>
			</td>
			<td>
				<p class="spec_blocks">{$i.clicks}</p>
			</td>
			<td>
				<p class="spec_blocks">{$i.crt}</p>
			</td>
			<td>
				<p class="spec_blocks">{$i.balance}</p>
			</td>
		</tr>
	{/foreach}
</table>
{/if}

{include file="layout/footer.tpl"}