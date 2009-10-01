{include file="layout/header.tpl"}



{if !$BALANCE}
Ваш баланс на текущий момент — {$ACCOUNT.balance} руб.
<a href="javascript: show_hide('_balance_form');">Пополнить баланс</a>
<div class="padt15" style="display: none;" id="_balance_form">
	<form action="" method="post">
	<input type="hidden" name="mode" value="pay" /> руб.
	<input type="text" name="sum" value="3000" size="8" /> руб.
	<input type="submit" value="Пополнить" />
	</form>
</div>

{else}
<div class="padt15">
	<form id="wmpay" name="pay" method="POST" action="https://merchant.webmoney.ru/lmi/payment.asp">
	<input type="hidden" name="LMI_PAYMENT_AMOUNT" value="{$BALANCE.sum}" />
	<input type="hidden" name="LMI_PAYMENT_DESC" value="Adnets.ru | {$ACCOUNT.email}" />
	<input type="hidden" name="LMI_PAYMENT_NO" value="{$BALANCE.id}" />
	<input type="hidden" name="LMI_PAYEE_PURSE" value="R122684558758" />
	<input type="hidden" name="LMI_SIM_MODE" value="0">
	<p class="anotation">
	Вы хотите выполнить платёж <br /><br />
	Сумма платежа: {$BALANCE.sum} <br />
	Назначение платежа: "Пополнение баланса для аккаунта {$ACCOUNT.email}"
	</p>	
	<input type="submit" value=" Перейти к оплате " />
	</form>
</div>
{/if}

{include file="layout/footer.tpl"}