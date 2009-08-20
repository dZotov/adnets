<div id="fixedbody">
	<div class="padt15">
		<table>
			<tr>
				{if $ACCOUNT_ID}
				
				
				
				{foreach from=$MENU item=m}
				<td class="padl10">[ <a href="{$m.url}" {if $MENU_SD == $m.name}class="b"{/if} >{$m.title}</a> ]</td>
				{/foreach}
				{/if}
			</tr>
		</table>
	<div>
	