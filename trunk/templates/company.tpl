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
		<input type="checkbox" name="type_ero" /> ���-��������
	</div>
	
	<div class="padt8 anotation">
		<div>��������� ���������</div>
		<table>
			<tr>
				<td>�� ����</td>
				<td>�� �����</td>
			</tr>
			<tr>
				<td>
					{$FORM.days.field} 
					<a href="javascript: SelectMulti('_form_days', 0, 7);">�������� ���</a> <br />
					<a href="javascript: SelectMulti('_form_days', 0, 5);">�����</a> <br />
					<a href="javascript: SelectMulti('_form_days', 5, 7);">��������</a> <br />
					<a href="javascript: ClearMulti('_form_days');">��������</a> <br />
				</td>
				<td>{$FORM.hours.field} </td>
			</tr>
		</table>	
	</div>
	
	<div class="padt15">
		<a class="button" href="companies.php">��������</a> &nbsp;
		<a class="button" href="javascript: Submit('company');">���������</a>
	</div>
	
	</form>
</p>

{include file="layout/footer.tpl"}