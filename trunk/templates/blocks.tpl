{include file="layout/header.tpl"}
<h3>Добавление/редактирование блоков</h3>
<div class="ed_blocks">
<form action="" method="post">
	<div class="m10">
		<label for="title">Название блока</label>
			<input type="text" name="block_titile" id="block_titile" value="{$PARAM.block_titile|default:'Блок'}" size="30%">
		<div class="clear"></div>
		<input type="hidden" name="block_id" value="{$smarty.get.id}">
		<input type="hidden" name="site_id" value="{$smarty.get.sid}">
		<table>
			<tr>
				<td>
					<span>Количество тизеров</span>
				</td>
				<td>
					<span>По вертикали</span>
					<select name="hor_tiser_count">
						{foreach from=$TISER_COUNT item=i}
							<option value="{$i}" {if $PARAM.hor_tiser_count==$i}selected{/if}>{$i}</option>
						{/foreach}
					</select>
					
					<span>По горизонтали</span>
					<select name="vert_tiser_count">
						{foreach from=$TISER_COUNT item=i}
							<option value="{$i}" {if $PARAM.vert_tiser_count==$i}selected{/if}>{$i}</option>
						{/foreach}
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<span>Длинна</span>
				</td>
				<td>
					<input type="text" name="width" id="width" value="{$PARAM.width|default:100}">
					<select name="tiser_width_param">
						<option value="%" {if $PARAM.tiser_width_param=='%'}selected{/if} >%</option>
						<option value="px" {if $PARAM.tiser_width_param=='px'}selected{/if}>px</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<span>Цвет фона</span>
				</td>
				<td>
					<div class="color_block">
						<input id="field_fon" name="field_fon" type="text" value="{$PARAM.field_fon|default:'#f0f0f0'}" class="blocksfield" />
					</div>
					<div class="color_block_selector">
						<div class="color_block_s" id="fon" onclick="javascript:colorselector('fon','{$PARAM.field_fon|default:'#f0f0f0'}')"></div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<span>Граница</span>
				</td>
				<td>
					<div class="color_block">
						<select name="tiser_border">
							{foreach from=$TISER_BORDER item=i}
								<option value="{$i}" {if $PARAM.tiser_border==$i}selected{/if}>{$i}</option>
							{/foreach}
						</select>
						<span>px</span>
						<select name="tiser_border_line">
							<option value="solid" {if $PARAM.tiser_border_line=='solid'}selected{/if}>сплошная</option>
							<option value="dashed" {if $PARAM.tiser_border_line=='dashed'}selected{/if}>пунктир</option>
							<option value="dotted" {if $PARAM.tiser_border_line=='dotted'}selected{/if}>точки</option>
						</select>
					</div>
					<div class="color_block">
						<input id="field_brd" name="field_brd" type="text" value="{$PARAM.field_brd|default:'#f0f0f0'}" class="blocksfield" />
					</div>
					<div class="color_block_selector">
						<div class="color_block_s" id="brd" onclick="javascript:colorselector('brd','{$PARAM.field_brd|default:'#f0f0f0'}')"></div>
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
						<input id="field_colorfon" name="field_colorfon" type="text" value="{$PARAM.field_colorfon|default:'#f0f0f0'}" class="blocksfield" />
					</div>
					<div class="color_block_selector">
						<div class="color_block_s" id="colorfon" onclick="javascript:colorselector('colorfon','{$PARAM.field_colorfon|default:'#f0f0f0'}')"></div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<span>Граница</span>
				</td>
				<td>
					<div class="color_block">
						<select name="block_border">
							{foreach from=$TISER_BORDER item=i}
								<option value="{$i}" {if $PARAM.block_border==$i}selected{/if}>{$i}</option>
							{/foreach}
						</select>
						<span>px</span>
						<select name="block_line">
							<option value="solid" {if $PARAM.block_line=='solid'}selected{/if}>сплошная</option>
							<option value="dashed" {if $PARAM.block_line=='dashed'}selected{/if}>пунктир</option>
							<option value="dotted" {if $PARAM.block_line=='dotted'}selected{/if}>точки</option>
						</select>
					</div>
					<div class="color_block">
						<input id="field_bbrd" name="field_bbrd" type="text" value="{$PARAM.field_bbrd|default:'#f0f0f0'}" class="blocksfield" />
					</div>
					<div class="color_block_selector">
						<div class="color_block_s" id="bbrd" onclick="javascript:colorselector('bbrd','{$PARAM.field_bbrd|default:'#f0f0f0'}')"></div>
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
					<select name="block_text_align">
						<option value="under_text" {if $PARAM.block_text_align=='under_text'}selected{/if}>Над текстом</option>
						<option value="left_text" {if $PARAM.block_text_align=='left_text'}selected{/if}>Слева от текста</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<span>Размеры, px</span>
				</td>
				<td>
					<select name="block_text_size">
						<option value="50" {if $PARAM.block_text_size=='50'}selected{/if}>50&times;50</option> 
						<option value="60" {if $PARAM.block_text_size=='60'}selected{/if}>60&times;60</option> 
						<option value="70" {if $PARAM.block_text_size=='70'}selected{/if}>70&times;70</option> 
						<option value="80" {if $PARAM.block_text_size=='80'}selected{/if}>80&times;80</option> 
						<option value="90" {if $PARAM.block_text_size=='90'}selected{/if}>90&times;90</option> 
						<option value="100" {if $PARAM.block_text_size=='100'}selected{/if}>100&times;100</option> 
						<option value="120" {if $PARAM.block_text_size=='120'}selected{/if}>120&times;120</option> 
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
						<input type="text" class="pxtext" value="{$PARAM.block_font_size|default:'10'}" name="block_font_size">
						<select name="block_font_param">
							<option value="px" {if $PARAM.block_font_param=='px'}selected{/if}>px</option>
							<option value="em" {if $PARAM.block_font_param=='em'}selected{/if}>em</option>
							<option value="pt" {if $PARAM.block_font_param=='pt'}selected{/if}>pt</option>
						</select>
					</div>
					<div class="color_block">
						<input id="field_norm" name="field_norm" type="text" value="{$PARAM.field_norm|default:'#f0f0f0'}" class="blocksfield" />
					</div>
					<div class="color_block_selector">
						<div class="color_block_s" id="norm" onclick="javascript:colorselector('norm','{$PARAM.field_norm|default:'#f0f0f0'}')"></div>
					</div>
					<div class="clear"></div>
					<span>При наведении</span>
					<div class="clear"></div>
					<div class="color_block">
						<input type="text" class="pxtext" value="{$PARAM.block_font_size_naved|default:'10'}" name="block_font_size_naved">
						<select  name="block_font_hover_param">
							<option value="px" {if $PARAM.block_font_hover_param=='px'}selected{/if}>px</option>
							<option value="em" {if $PARAM.block_font_hover_param=='em'}selected{/if}>em</option>
							<option value="pt" {if $PARAM.block_font_hover_param=='pt'}selected{/if}>pt</option>
						</select>
					</div>
					<div class="color_block">
						<input id="field_naved" name="field_naved" type="text" value="{$PARAM.field_naved|default:'#f0f0f0'}" class="blocksfield" />
					</div>
					<div class="color_block_selector">
						<div class="color_block_s" id="naved" onclick="javascript:colorselector('naved','{$PARAM.field_naved|default:'#f0f0f0'}')"></div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<span>Описание</span>
				</td>
				<td>
					<div class="color_block">
						<input type="text" class="pxtext" value="{$PARAM.block_font_desc|default:'10'}" name="block_font_desc">
						<select name="block_font_hover_param_deck">
							<option value="px" {if $PARAM.block_font_hover_param_deck=='px'}selected{/if}>px</option>
							<option value="em" {if $PARAM.block_font_hover_param_deck=='em'}selected{/if}>em</option>
							<option value="pt" {if $PARAM.block_font_hover_param_deck=='pt'}selected{/if}>pt</option>
						</select>
					</div>
					<div class="color_block">
						<input id="field_decr" name="field_decr" type="text" value="{$PARAM.field_decr|default:'#000000'}" class="blocksfield" />
					</div>
					<div class="color_block_selector">
						<div class="color_block_s" id="decr" onclick="javascript:colorselector('decr','{$PARAM.field_decr|default:'#000000'}')"></div>
					</div>
				</td>
			</tr>
		</table>
		<input type="submit" value="{if $smarty.get.id}Изменить{else}Добавить{/if} блок">
	</div>
</form>	
</div>
<div style="padding-left:10px;float:left; width:1%">&nbsp;</div>
<div class="code_block">
		<p class="anotation">Разместите этот код там, где хотите чтобы обображался ваш блок:</p>
		<textarea cols="38" rows="8" id="block_show_script">
			<script type="text/javascript">
				if (typeof adtens == 'undefined') {ldelim}
					var adtens ={ldelim}{rdelim} ; var adtens_blockid = {$smarty.get.id};
					{rdelim} else {ldelim}
						adtens_blockid = {$smarty.get.id};
					{rdelim}
					
					adtens[adtens_blockid] = {ldelim}
						'plid': {$PLID}
					{rdelim};
					
					document.write('<div id="adtens_' + adtens_blockid + '"></div>');
				
			</script> 
		</textarea>
		
		<p class="anotation">Разместите этот код внизу странице:</p>
		<textarea cols="38" rows="8" id="block_footer_script">
			<script type="text/javascript">
			{literal}
				if (typeof adtens != 'undefined' && typeof adtens_blocks_exists == 'undefined') {
					for (var blockid in adtens) {
						 var newScr = document.createElement('script'); newScr.type = 'text/javascript';
						 newScr.src = 'http://localhost:88/seo/adnets/stat/in.php?blockid=' + blockid + '&plid=' + adtens[blockid].plid + '&ref=' + escape(document.referrer);
						 var el = document.getElementById('adtens_' + blockid); if (el) { el.appendChild(newScr); }
					}
					var adtens_blocks_exists = true;
				}
			{/literal}
			</script> 
		</textarea>
		<p> <a href="javascript:show_hide('show_block');">Посмотреть блок</a></p>
	</div>
<div style="clear:both;padding-top:20px;"></div>

{include file="layout/footer.tpl"}