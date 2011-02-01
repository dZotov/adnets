{include file="layout/header.tpl"}

<p class="anotation">Ваш баланс на текущий момент - <strong>{$ACCOUNT.balance} руб.</strong></p>
<p class="anotation">
	Не производить выплаты: <input type="checkbox" {if $ACCOUNT.hold}checked{/if}> 
	{if $ACCOUNT.hold}
		<a href="javascript:if_confirm('payments.php?act=payment_on')">Включить выплаты</a>
	{else}
		<a href="javascript:if_confirm('payments.php?act=payment_off')">Отключить выплаты</a>
	{/if}
</p>

{if !$DATA}
<p class="anotation"><strong>Выплаты не проводились</strong></p>	
{else}
<table>
	<tr>
		<th class="blocks">Дата</th>
		<th class="blocks">Аккаунт</th>
		<th class="blocks">Сумма, руб.</th>
		<th class="blocks">Статус</th>
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