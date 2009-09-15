{include file="layout/header.tpl"}
<h3>Редактирование площадок</h3>
<div id="playground">
	<label for="title">Название площадки</label>
	<input type="text" name="title" id="title" value="{$DATA.title}" />
	
	<label for="url">Url (без http://)</label>
	<input type="text" name="url" id="url" value="{$DATA.url}" />
	
	<label for="cat">Категории</label>
	<select name="cat" id="cat">
		<option value="0">-Выберите-</option>
		{foreach from=$CAT item=c}
			<option value="{$c.id}" {if $c.id==$DATA.category}selected{/if}>-{$c.title}</option>
		{/foreach}
	</select>
	<label for="ignore">Отметьте запрещенные к показу тематики</label>
	<select name="ignore" id="ignore" class="select_ignore" multiple>
		{foreach from=$CAT item=c}
			<option value="{$c.id}" {if $c.selected}selected{/if}>-{$c.title}</option>
		{/foreach}
	</select>
	<p class="btn"><a class="button" href="javascript:add_playdround();">{$EDIT_SITE|default:"Добавить сайт"}</a></p>
	<span id="loader" style="display:none;"> <img src="./images/loading.gif"></span>
</div>

{include file="layout/footer.tpl"}