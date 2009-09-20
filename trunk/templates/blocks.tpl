{include file="layout/header.tpl"}
<h3>Добавление/редактирование блоков</h3>
<div class="ed_blocks">
	<label for="title">Название блока</label>
		<input type="text" name="title" id="title" value="Блок">
	<div class="clear"></div>
	
	<div class="color_block">
		<label for="tizers">Количество тизеров</label>
			<span>По вертикали</span>
			<select>
				<option></option>
				<option></option>
			</select>
	</div>
	<div class="color_block">
		<span>По горизонтали</span>
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