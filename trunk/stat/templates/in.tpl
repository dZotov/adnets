<style>
	
	div
	{ldelim}
		background:{$SETTINGS.field_fon}; 
		width:{$SETTINGS.tiser_width}{$SETTINGS.tiser_width_param|default:'%'}; 
		font-size:{$SETTINGS.block_font_size}{$SETTINGS.block_font_param};
	{rdelim}
	
	a,a:visited
	{ldelim}
		font-size:{$SETTINGS.block_font_size}{$SETTINGS.block_font_param};
		color:{$SETTINGS.field_norm};
	{rdelim}
	
	a:hover
	{ldelim}
		font-size:{$SETTINGS.block_font_size_naved}{$SETTINGS.block_font_hover_param};
		color:{$SETTINGS.field_naved};
	{rdelim}
	img
	{ldelim}
		border: 1px {$SETTINGS.block_line} {$SETTINGS.field_bbrd};
		width:{$SETTINGS.block_text_size}; height:{$SETTINGS.block_text_size};
	{rdelim}
	
	td{ldelim}
		text-align:center;
	{rdelim}
	
</style>

<div>
	<table>
		<tr>
		{foreach from=$DATA item=i name=data}
			<td{if $SETTINGS.block_border}style="border:{$SETTINGS.block_border}{$SETTINGS.block_line}{$SETTINGS.field_bbrd}"{/if}>
				<a href="{*{link attr=$data}*}" target="_blank"><img src="./teaser/{$SETTINGS.block_text_size}x{$SETTINGS.block_text_size}/{$i.id}.{$i.ext}" alt="{$i.title}"/></a>
				{if $SETTINGS.block_text_align=='under_text'} 
					<br />
					<a href="{*{link attr=$data}*}" target="_blank">{$i.desc}</a>
				{else}
					<span><a href="{*{link attr=$data}*}" target="_blank">{$i.desc}</a></span>
				{/if}
				
				
			</td>
			{if $smarty.foreach.data.iteration %$SETTINGS.hor_tiser_count==0}</tr><tr>{/if}
		{/foreach}
		</tr>		
	</table>
</div>
