{include file="layout/header.tpl"}
<link type="text/css" href="./style/base/ui.all.css" rel="stylesheet" />

{literal}
	<script>
	$(function() {
		$("#from_date").datepicker();
		$("#to_date").datepicker();
	});
	</script>
{/literal}		
<ul id="types_of_statistic">
	<li><a href="statistic.php?act=block_stat" class="inactive">Блоки</a></li>
	<li><a href="statistic.php?act=ref_stat">Рефералы</a></li>
</ul>

<form id="choose_period">
	<label for="from_date">c </label><input type="text" name="from_date" id="from_date" value="{$PRE_DATE}" />
	<label for="to_date">до </label><input type="text" name="to_date" id="to_date" value="{$DATE_NOW}" />
	
	<input type="submit" value="Применить" />
</form>	

<ul id="switch_type">
	<li class="active">Общая <a href="#n">>>>></a></li>
	<li><a href="statistic.php?act=block_stat">По блокам</a></li>
	<li><a href="statistic.php?act=pl_stat">По площадкам</a></li>
	
</ul>

<table id="stat">
	<thead>
		<tr>
			<th class="date"><a href="#n">Дата</a></th>
			<th class="views_blocks">Показов блоков</th>
			<th class="views_ads">Показов объявлений</th>
			<th class="clicks">Клики</th>
			<th class="ctr_blocks">CTR блока</th>
			<th class="ctr_ads">CTR объявления</th>
			<th class="money">Деньги</th>
		</tr>
	</thead>
	<tr>
		<td>12.01.09</td>
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