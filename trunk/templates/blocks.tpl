{include file="layout/header.tpl"}
<h3>����������/�������������� ������</h3>
<div class="ed_blocks">
	<label for="title">�������� �����</label>
		<input type="text" name="title" id="title" value="����">
	<div class="clear"></div>
	
	<div class="color_block">
		<label for="tizers">���������� �������</label>
			<span>�� ���������</span>
			<select>
				<option></option>
				<option></option>
			</select>
	</div>
	<div class="color_block">
		<span>�� �����������</span>
			<select>
				<option></option>
				<option></option>
			</select>
	</div>
	<div class="color_block_field">
		<input id="colorpickerField" type="text" value="#00ff00" class="blocksfield" />
	</div>
	<div class="color_block_selector">
		<div class="color_block" id="colorSelector"></div>
	</div>
</div>

{include file="layout/footer.tpl"}