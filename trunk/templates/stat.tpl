{include file="layout/header.tpl"}
<h3>���������� �� ������� ��������� ������</h3>
			
<ul id="types_of_statistic">
	<li><a href="#n" class="inactive">�����</a></li>
	<li><a href="#n">������</a></li>
	<li><a href="#n">��������</a></li>
</ul>

<form id="choose_period">
	<select name="period">
		<option>������� ��������� ������</option>
	</select>
	
	<label for="from_date">c </label><input type="text" name="from_date" id="from_date" value="01.01.01" />
	<label for="to_date">�� </label><input type="text" name="to_date" id="to_date" value="31.01.01" />
	
	<input type="submit" id="accept" name="accept" value="���������" />
</form>	

<ul id="switch_type">
	<li class="active">����� <a href="#n">>>>></a></li>
	<li><a href="#n">�� ������</a></li>
	<li><a href="#n">�� ���������</a></li>
	<li><a href="#n">�� ���������</a></li>
	
</ul>

<table id="stat">
	<tr>
		<th class="date"><a href="#n">����</a></th>
		<th class="views_blocks">������� ������</th>
		<th class="views_ads">������� ����������</th>
		<th class="clicks">�����</th>
		<th class="ctr_blocks">CTR �����</th>
		<th class="ctr_ads">CTR ����������</th>
		<th class="money">������</th>
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