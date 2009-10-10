{include file="layout/header.tpl"}

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
			<table>
				<tr>
					<td>По дням</td>
				</tr>
				<tr>
					<td>
						<table>
							<tr>
								<td>{$FORM.days.field}</td> 
								<td>
									<a href="javascript: SelectMulti('_form_days', 0, 7);">Выделить все</a> <br />
									<a href="javascript: SelectMulti('_form_days', 0, 5);">Будни</a> <br />
									<a href="javascript: SelectMulti('_form_days', 5, 7);">Выходные</a> <br />
									<a href="javascript: ClearMulti('_form_days');">Очистить</a> <br />
								</td>
							</tr>
						</table>	
					</td>
				</tr>
				<tr>
					<td>По часам</td>
				</tr>
				<tr>
					<td>
						<table>
							<tr>
								<td>{$FORM.hours.field}</td> 
								<td>
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
					</td>
				</tr>
			</table>	
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
	
	
	<div class="padt15">
		<a class="button" href="companies.php">Отменить</a> &nbsp;
		<a class="button" href="javascript: Submit('company');">Сохранить</a>
	</div>
	
	</form>
</p>

{include file="layout/footer.tpl"}