{include file="layout/header.tpl"}
<h3>Редактирование площадок</h3>
<div id="playground">
	<label for="title">Название площадки</label>
	<input type="text" name="title" id="title" value="{$DATA.title}" />
	
	<label for="url">Url (без http://)</label>
	<input type="text" name="url" id="url" value="{$DATA.url}" />
	
	<label for="cat">Категории</label>
	<select name="cat" id="cat" multiple>
		{foreach from=$CAT item=c}
			<option value="{$c.id}" {if $c.selected}selected{/if}>-{$c.title}</option>
		{/foreach}
	</select>			
</div>
<div id="blocks">
	<label for="block">Добавить блок</label>
	<div>
	</div>
</div>
{include file="layout/footer.tpl"}