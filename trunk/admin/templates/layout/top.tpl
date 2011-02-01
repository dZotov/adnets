<div id="fixedbody">
	<div class="padt15">
		<table width="70%">
			<tr>
				<td class="vat">
					<a href="#" id="wmm">Вебмастер</a>
				</td>
				<td class="vat" style="padding-left:100px;">
					<a href="#" id="recm">Рекламодатель</a>
				</td>
				<td class="vat">
					<a href="loguot.php">Выход</td>
				</td>
			</tr>
		</table>
	<div>
	<div {if $MENU_TYPE != 'webmaster'}style="display:none;"{/if} class="padt10" id="w_menu">
		<table class="pad3">
			<tr>
				{foreach from=$MENU item=m key=k}
					<td>[<a href="{$m.url}" id="menu_{$k}" {if $MENU_SD == $m.name}class="b"{/if} >{$m.title}</a> ]</td>
				{/foreach}
			</tr>
		</table>
	</div>
	<div {if $MENU_TYPE != 'adverts'}style="display:none;"{/if} id="r_menu" class="padt10">
		<table class="pad3">
			<tr>
				{foreach from=$MENU_SELLER item=m key=k}
					<td>[<a href="{$m.url}" id="rmenu_{$k}" {if $MENU_SD == $m.name}class="b"{/if} >{$m.title}</a> ]</td>
				{/foreach}
			</tr>
		</table>
	</div>