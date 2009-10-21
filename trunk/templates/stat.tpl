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
	<li><a href="statistic.php?act=block_stat" class="inactive">�����</a></li>
	<li><a href="statistic.php?act=ref_stat">��������</a></li>
</ul>

<form id="choose_period">
	<label for="from_date">c </label><input type="text" name="from_date" id="from_date" value="{$PRE_DATE}" />
	<label for="to_date">�� </label><input type="text" name="to_date" id="to_date" value="{$DATE_NOW}" />
	
	<input type="submit" value="���������" />
</form>	

<ul id="switch_type">
	<li class="active">����� <a href="#n">>>>></a></li>
	<li><a href="statistic.php?act=block_stat">�� ������</a></li>
	<li><a href="statistic.php?act=pl_stat">�� ���������</a></li>
	
</ul>

<table id="stat">
	<thead>
		<tr>
			<th class="date"><a href="#n">����</a></th>
			<th class="views_blocks">������� ������</th>
			<th class="views_ads">������� ����������</th>
			<th class="clicks">�����</th>
			<th class="ctr_blocks">CTR �����</th>
			<th class="ctr_ads">CTR ����������</th>
			<th class="money">������</th>
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