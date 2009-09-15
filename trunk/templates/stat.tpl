{include file="layout/header.tpl"}
<h3>Статистика за текущий платежный период</h3>
			
<ul id="types_of_statistic">
	<li><a href="#n" class="inactive">Блоки</a></li>
	<li><a href="#n">Ссылки</a></li>
	<li><a href="#n">Рефералы</a></li>
</ul>

<form id="choose_period">
	<select name="period">
		<option>Текущий платежный период</option>
	</select>
	
	<label for="from_date">c </label><input type="text" name="from_date" id="from_date" value="01.01.01" />
	<label for="to_date">до </label><input type="text" name="to_date" id="to_date" value="31.01.01" />
	
	<input type="submit" id="accept" name="accept" value="Применить" />
</form>	

<ul id="switch_type">
	<li class="active">Общая <a href="#n">>>>></a></li>
	<li><a href="#n">По блокам</a></li>
	<li><a href="#n">По площадкам</a></li>
	<li><a href="#n">По тематикам</a></li>
	
</ul>

<table id="stat">
	<tr>
		<th class="date"><a href="#n">Дата</a></th>
		<th class="views_blocks">Показов блоков</th>
		<th class="views_ads">Показов объявлений</th>
		<th class="clicks">Клики</th>
		<th class="ctr_blocks">CTR блока</th>
		<th class="ctr_ads">CTR объявления</th>
		<th class="money">Деньги</th>
	</tr>
	<tr>
		<td>13.01.09</td>
		<td>100</td>
		<td>300</td>
		<td>10</td>
		<td>10%</td>
		<td>3.3%</td>
		<td>100</td>
	</tr>
	<tr class="invert">
		<td>13.01.09</td>
		<td>100</td>
		<td>300</td>
		<td>10</td>
		<td>10%</td>
		<td>3.3%</td>
		<td>100</td>
	</tr>
	<tr>
		<td>13.01.09</td>
		<td>100</td>
		<td>300</td>
		<td>10</td>
		<td>10%</td>
		<td>3.3%</td>
		<td>100</td>
	</tr>
	<tr class="invert">
		<td>13.01.09</td>
		<td>100</td>
		<td>300</td>
		<td>10</td>
		<td>10%</td>
		<td>3.3%</td>
		<td>100</td>
	</tr>
</table>
{include file="layout/footer.tpl"}