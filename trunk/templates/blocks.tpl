{include file="layout/header.tpl"}
<h3>Добавление/редактирование блоков</h3>
<div class="ed_blocks">
	<div class="m10">
		<label for="title">Название блока</label>
			<input type="text" name="block_titile" id="block_titile" value="Блок" size="30%">
		<div class="clear"></div>
		<table>
			<tr>
				<td>
					<span>Количество тизеров</span>
				</td>
				<td>
					<span>По вертикали</span>
					<select>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
					</select>
					
					<span>По горизонтали</span>
					<select>
						<option></option>
						<option></option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<span>Длинна</span>
				</td>
				<td>
					<input type="text" name="width" id="width" value="100">
					<select>
						<option>%</option>
						<option>px</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<span>Цвет фона</span>
				</td>
				<td>
					<div class="color_block">
						<input id="field_fon" type="text" value="#00ff00" class="blocksfield" />
					</div>
					<div class="color_block_selector">
						<div class="color_block_s" id="fon" onclick="javascript:colorselector('fon','#00ff00')"></div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<span>Граница</span>
				</td>
				<td>
					<div class="color_block">
						<select>
							<option>0</option>
							<option>1</option>
						</select>
						<span>px</span>
						<select>
							<option>сплошная</option>
							<option>пунктир</option>
							<option>точки</option>
						</select>
					</div>
					<div class="color_block">
						<input id="field_brd" type="text" value="#00ff00" class="blocksfield" />
					</div>
					<div class="color_block_selector">
						<div class="color_block_s" id="brd" onclick="javascript:colorselector('brd','#00ff00')"></div>
					</div>
				</td>
			</tr>
		</table>
		<label for="title">Название блока</label>
		<table>
			<tr>
				<td>
					<label for="title">Блок</label>
				</td>
			</tr>
			<tr>
				<td>
					<span>Цвет фона</span>
				</td>
				<td>
					<div class="color_block">
						<input id="filed_colorfon" type="text" value="#00ff00" class="blocksfield" />
					</div>
					<div class="color_block_selector">
						<div class="color_block_s" id="colorfon" onclick="javascript:colorselector('colorfon','#00ff00')"></div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<span>Граница</span>
				</td>
				<td>
					<div class="color_block">
						<select>
							<option>0</option>
							<option>1</option>
						</select>
						<span>px</span>
						<select>
							<option>сплошная</option>
							<option>пунктир</option>
							<option>точки</option>
						</select>
					</div>
					<div class="color_block">
						<input id="field_bbrd" type="text" value="#00ff00" class="blocksfield" />
					</div>
					<div class="color_block_selector">
						<div class="color_block_s" id="bbrd" onclick="javascript:colorselector('bbrd','#00ff00')"></div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<label for="title">Картинка</label>
				</td>
			</tr>
			<tr>
				<td>
					<span>Положение</span>
				</td>
				<td>
					<select>
						<option>Над текстом</option>
						<option>Слева от текста</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<span>Размеры, px</span>
				</td>
				<td>
					<select>
						<option></option>
						<option></option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for="title">Шрифт</label>
				</td>
			</tr>
			<tr>
				<td>
					<span>Заголовок</span>
				</td>
				<td>
					<span>Обычный</span>
					<div class="clear"></div>
					<div class="color_block">
						<input type="text" class="pxtext">
						<select>
							<option>px</option>
							<option>em</option>
							<option>pt</option>
						</select>
					</div>
					<div class="color_block">
						<input id="field_norm" type="text" value="#00ff00" class="blocksfield" />
					</div>
					<div class="color_block_selector">
						<div class="color_block_s" id="norm" onclick="javascript:colorselector('norm','#00ff00')"></div>
					</div>
					<div class="clear"></div>
					<span>При наведении</span>
					<div class="clear"></div>
					<div class="color_block">
						<input type="text" class="pxtext">
						<select>
							<option>px</option>
							<option>em</option>
							<option>pt</option>
						</select>
					</div>
					<div class="color_block">
						<input id="field_naved" type="text" value="#ff0000" class="blocksfield" />
					</div>
					<div class="color_block_selector">
						<div class="color_block_s" id="naved" onclick="javascript:colorselector('naved','#ff0000')"></div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<span>Описание</span>
				</td>
				<td>
					<div class="color_block">
						<input type="text" class="pxtext">
						<select>
							<option>px</option>
							<option>em</option>
							<option>pt</option>
						</select>
					</div>
					<div class="color_block">
						<input id="field_decr" type="text" value="#000000" class="blocksfield" />
					</div>
					<div class="color_block_selector">
						<div class="color_block_s" id="decr" onclick="javascript:colorselector('decr','#000000')"></div>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>

{include file="layout/footer.tpl"}