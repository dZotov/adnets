<style>
	{literal}
	a, img, ul, li, form, div, h1, h2, h3, h4, h5, h6, h7, html, body, p {margin: 0; padding: 0;}
	html, body {width: 100%; height: 100%;}
	{/literal}
	div,table{ldelim}
			background:{$SETTINGS.field_fon};
			width:{$SETTINGS.tiser_width}%{*$SETTINGS.tiser_width_param|default:'%'*}; 
			font-size:{$SETTINGS.block_font_size}{$SETTINGS.block_font_param};
		{rdelim}
	a,a:visited{ldelim}
			font-size:{$SETTINGS.block_font_size}{$SETTINGS.block_font_param};
			color:{$SETTINGS.field_norm};
		{rdelim}
	a:hover{ldelim}
			font-size:{$SETTINGS.block_font_size_naved}{$SETTINGS.block_font_hover_param};
			color:{$SETTINGS.field_naved};
		{rdelim}
	img{ldelim}
			border: 1px {$SETTINGS.block_line} {$SETTINGS.field_bbrd};
			width:{$SETTINGS.block_text_size}; height:{$SETTINGS.block_text_size};
		{rdelim}
	td{ldelim}
			text-align:center;
			width:{$SETTINGS.block_text_size}; height:{$SETTINGS.block_text_size};
			vertical-align:top;
		{rdelim}
</style>
<table>
	<tbody>
		<tr>
		{foreach from=$DATA.items item=i name=data}
			<td{if $SETTINGS.block_border} style="border:{$SETTINGS.block_border}{$SETTINGS.block_line}{$SETTINGS.field_bbrd};"{/if}>
				<a href="{link attr=$i block=$DATA.block_id}" target="_blank"><img src="http://stat.adnets.ru/teaser/{$SETTINGS.block_text_size}x{$SETTINGS.block_text_size}/{$i.id}.{$i.ext}" alt="{$i.title}" width="{$SETTINGS.block_text_size}px" height="{$SETTINGS.block_text_size}px"/></a>
				{if $SETTINGS.block_text_align=="under_text"} 
					<p><a href="{link attr=$i block=$DATA.block_id ref=$REF}" target="_blank">{$i.desc}</a></p>
				{else}
					<span><a href="{link attr=$i block=$DATA.block_id ref=$REF}" target="_blank">{$i.desc}</a></span>
				{/if}
			</td>
			{if $smarty.foreach.data.iteration %$SETTINGS.hor_tiser_count==0}</tr><tr>{/if}
		{/foreach}
		</tr>
	</tbody>			
</table>