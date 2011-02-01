{include file="layout/header2.tpl"}

<p class="anotation">
	<form action="" name="company" method="post">
	
	<div class="padt8 anotation">
		{$FORM.title.title} <br />
		{$FORM.title.field}
	</div>
	<div class="padt8 anotation">
		{$FORM.category.title} <br />
		{$FORM.category.field}
	</div>
	
	<div>
		<input type="checkbox" name="type_ero" /> эро-кампания
	</div>
	
	<br />
	
	<div class="padt8 anotation">
		<div><a href="javascript: show_hide('_time_settings');">Временной таргетинг</a></div>
		<div id="_time_settings" style="display: none;">
			<div style="float:left;width:49%">
				<label>По дням</label>
				<table>
					<tr>
						<td>{$FORM.days.field}</td> 
						<td style="padding-left:15px">
							<a href="javascript: SelectMulti('_form_days', 0, 7);">Выделить все</a> <br />
							<a href="javascript: SelectMulti('_form_days', 0, 5);">Будни</a> <br />
							<a href="javascript: SelectMulti('_form_days', 5, 7);">Выходные</a> <br />
							<a href="javascript: ClearMulti('_form_days');">Очистить</a> <br />
						</td>
					</tr>
				</table>	
			</div>
			<div style="float:left;width:49%">
				<label>По часам</label>
				<table>
					<tr>
						<td>{$FORM.hours.field}</td> 
						<td style="padding-left:15px">
							<a href="javascript: SelectMulti('_form_hours', 0, 24);">Выделить все</a> <br />
							<a href="javascript: SelectMulti('_form_hours', 9, 20);">Рабочие</a> <br />
							<a href="javascript: SelectMulti('_form_hours', 0, 10, 19, 24);">Не рабочие</a> <br />
							<a href="javascript: SelectMulti('_form_hours', 7, 12);">Утро</a> <br />
							<a href="javascript: SelectMulti('_form_hours', 12, 16);">Обед</a> <br />
							<a href="javascript: SelectMulti('_form_hours', 18, 24);">Вечер</a> <br />
							<a href="javascript: SelectMulti('_form_hours', 0, 8);">Ночь</a> <br />
							<a href="javascript: ClearMulti('_form_hours');">Очистить</a> <br />
						</td>
					</tr>
				</table>	
			</div>
		</div>	
	</div>
	
	<div class="padt8 anotation">
		<div><a href="javascript: show_hide('_limit_settings');">Лимиты</a></div>
			
		<div id="_limit_settings" style="display: none;">
			<table>
				<tr>
					<td>{$FORM.price.title}</td> 	
					<td>{$FORM.price.field}</td> 	
				</tr>
				<tr>
					<td>{$FORM.maxrun.title}</td> 	
					<td>{$FORM.maxrun.field}</td> 	
				</tr>
				<tr>
					<td>{$FORM.day_limit.title}</td> 	
					<td>{$FORM.day_limit.field}</td> 	
				</tr>
				<tr>
					<td>{$FORM.limit.title}</td> 	
					<td>{$FORM.limit.field}</td> 	
				</tr>
				
				
			</table>
		</div>		
	</div>
	
	<div class="padt8 anotation">
		<div><a href="javascript: show_hide('_category_settings');">Категории</a></div>
			
		<div id="_category_settings" style="display: none;">
			<table>
				<tr>
					<td>{$FORM.categories.title}</td> 	
					<td>{$FORM.categories.field}</td> 	
				</tr>
			</table>	
		</div>
	</div>
	
	<div class="padt8 anotation">
		<div><a href="javascript: show_hide('_exceptions_settings');">Исключения</a></div>
			
		<div id="_exceptions_settings" style="display: none;">
			<table>
				<tr>
					<td>{$FORM.exceptions.title}</td> 	
					<td>
						Исключить показ на площадках(каждая площадка с новой строки)
						{$FORM.exceptions.field}
						<div>
						
						</div>
					</td> 	
				</tr>
				<tr>
					<td></td>
					<td>
						{$FORM.no_ero.field}{$FORM.no_ero.title}
					</td>
				</tr>	
			</table>	
		</div>
	</div>
	
	
	<div class="padt15">
		<a class="button" href="companies.php">Отменить</a> &nbsp;
		<a class="button" href="javascript: Submit('company');">Сохранить</a> &nbsp;
		{if $smarty.get.id}<a class="button" href="teasers.php?id={$smarty.get.id}">Перейти к тизерам</a>{/if}
	</div>
	
	</form>
</p>

{include file="layout/footer.tpl"}