{include file="layout/header.tpl"}
<h3>�������������� ��������</h3>
<div id="playground">
	<input class="bl" type="hidden" id="pl_id" value="{$smarty.get.id}">
	<input class="bl" type="hidden" id="adid" value="{$ACCOUNT_ID}">
	<label for="title">�������� ��������</label>
	<input class="bl" type="text" name="title" id="title" value="{$DATA.title}" />
	
	<label for="url">Url (��� http://)</label>
	<input class="bl" type="text" name="url" id="url" value="{$DATA.url}" />
	
	<label for="cat">���������</label>
	<select class="bl" name="cat" id="cat">
		<option value="0">-��������-</option>
		{foreach from=$CAT item=c}
			<option value="{$c.id}" {if $c.id==$DATA.category}selected{/if}>-{$c.title}</option>
		{/foreach}
	</select>
	<label  for="ignore">�������� ����������� � ������ ��������</label>
	<div class="ignore">
		{foreach from=$CAT item=c}
			<p><input type="checkbox" class="ign" value="{$c.id}" {if $c.selected}checked="checked"{/if} />-{$c.title}</p>
		{/foreach}
	</div>
	<p class="btn"><a class="button" href="javascript:add_playdround();">{$EDIT_SITE|default:"�������� ����"}</a></p>
	<span id="loader" style="display:none;"><img src="./images/loading.gif"></span>
</div>
{include file="layout/footer.tpl"}