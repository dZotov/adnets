{include file="layout/header2.tpl"}

<p class="anotation">	
	<div class="padt15">
		<table class="pad3">
			{foreach from=$FORM item=f}
			<tr>
				<td>{$f.title}</td>
				<td>{$f.field}</td>
			</tr>
			{/foreach}
		</table>	
	</div>
	
	<div class="padt15">
		<a class="button" href="javascript: Submit('teaser');">Сохранить</a> &nbsp;
	</div>
	
	</form>
</p>

{include file="layout/footer.tpl"}