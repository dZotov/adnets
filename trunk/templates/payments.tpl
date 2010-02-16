{include file="layout/header.tpl"}

<p class="anotation">��� ������ �� ������� ������ - <strong>{$ACCOUNT.balance} ���.</strong></p>
<p class="anotation">
	�� ����������� �������: <input type="checkbox" {if $ACCOUNT.hold}checked{/if}> 
	{if $ACCOUNT.hold}
		<a href="javascript:if_confirm('payments.php?act=payment_on')">�������� �������</a>
	{else}
		<a href="javascript:if_confirm('payments.php?act=payment_off')">��������� �������</a>
	{/if}
</p>

{if !$DATA}
<p class="anotation"><strong>������� �� �����������</strong></p>	
{else}
<table>
	<tr>
		<th class="blocks">����</th>
		<th class="blocks">�������</th>
		<th class="blocks">�����, ���.</th>
		<th class="blocks">������</th>
	</tr>
	{foreach from=$DATA item=i key=k name=data}
		<tr {if $smarty.foreach.data.iteration %2==0}class="invert"{/if}>
			<td>
				<p class="spec_blocks">{$i.date|date}</p>
			</td>
			<td>
				<p class="spec_blocks">{$i.wmr}</p>
			</td>
			<td>
				<p class="spec_blocks">{$i.sum}</p>
			</td>
			<td>
				<p class="spec_blocks">{$PAY_STATUS[$i.status]}</p>
			</td>
		</tr>
	{/foreach}
</table>
{/if}
{include file="layout/footer.tpl"}