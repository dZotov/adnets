<table style="background:{$SETTINGS.field_fon};width:{$SETTINGS.tiser_width}%{*$SETTINGS.tiser_width_param|default:'%'*};font-size:{$SETTINGS.block_font_size}{$SETTINGS.block_font_param};">
	<tbody>
		<tr>
		{foreach from=$DATA.items item=i name=data}
			<td{if $SETTINGS.block_border} style="border:{$SETTINGS.block_border}{$SETTINGS.block_line}{$SETTINGS.field_bbrd}; text-align:center;
			width:{$SETTINGS.block_text_size}px; height:{$SETTINGS.block_text_size}px; font-size:{$SETTINGS.block_font_size}{$SETTINGS.block_font_param};color:{$SETTINGS.field_norm};
			vertical-align:top;"{/if}>
				<a href="{link attr=$i block=$DATA.block_id ref=$REF}" style="font-size:{$SETTINGS.block_font_size}{$SETTINGS.block_font_param};color:{$SETTINGS.field_norm};" target="_blank" onmouseout="this.style.cssText=\'font-size:{$SETTINGS.block_font_size}{$SETTINGS.block_font_param};color:{$SETTINGS.field_norm};\'" onmouseover="this.style.cssText=\'font-size:{$SETTINGS.block_font_size_naved}{$SETTINGS.block_font_hover_param};color:{$SETTINGS.field_naved};\'"><img src="http://stat.adnets.ru/teaser/{$SETTINGS.block_text_size}x{$SETTINGS.block_text_size}/{$i.id}.{$i.ext}" alt="{$i.title}" width="{$SETTINGS.block_text_size}px" height="{$SETTINGS.block_text_size}px" style="border: 1px {$SETTINGS.block_line} {$SETTINGS.field_bbrd};		width:{$SETTINGS.block_text_size}; height:{$SETTINGS.block_text_size};" onmouseout="this.style.cssText=\'border: 1px {$SETTINGS.block_line} {$SETTINGS.field_bbrd};\'" onmouseover="this.style.cssText=\'border: 1px {$SETTINGS.block_line} {$SETTINGS.field_naved};\'"/></a>
				{if $SETTINGS.block_text_align=="under_text"} 
					<p><a href="{link attr=$i block=$DATA.block_id ref=$REF}" target="_blank" style="font-size:{$SETTINGS.block_font_size}{$SETTINGS.block_font_param};color:{$SETTINGS.field_norm};" target="_blank" onmouseout="this.style.cssText=\'font-size:{$SETTINGS.block_font_size}{$SETTINGS.block_font_param};color:{$SETTINGS.field_norm};\'" onmouseover="this.style.cssText=\'font-size:{$SETTINGS.block_font_size_naved}{$SETTINGS.block_font_hover_param};color:{$SETTINGS.field_naved};\'">{$i.desc}</a></p>
				{else}
					<span><a href="{link attr=$i block=$DATA.block_id ref=$REF}" target="_blank" style="font-size:{$SETTINGS.block_font_size}{$SETTINGS.block_font_param};color:{$SETTINGS.field_norm};" target="_blank" onmouseout="this.style.cssText=\'font-size:{$SETTINGS.block_font_size}{$SETTINGS.block_font_param};color:{$SETTINGS.field_norm};\'" onmouseover="this.style.cssText=\'font-size:{$SETTINGS.block_font_size_naved}{$SETTINGS.block_font_hover_param};color:{$SETTINGS.field_naved};\'">{$i.desc}</a></span>
				{/if}
			</td>
			{if $smarty.foreach.data.iteration %$SETTINGS.hor_tiser_count==0}</tr><tr>{/if}
		{/foreach}
		</tr>
	</tbody>			
</table>