{include file="layout/header2.tpl"}

<p class="anotation">
	<img src="./images/add.gif" alt="Добавить" />
	<a href="edit_playground.php" class="s11">Добавить сайт</a>
</p>

<div class="padt15">
{if !$DATA}
<p class="anotation">У вас не пока нет ни одного сайта, но вы можете <a href="edit_playground.php">добавить сайт</a> прямо сейчас.</p>
{else}
<table>
	<tr class="table_head">
		<td>Названиe</td>
		<td>Статус</td>
		<td>Категория</td>
		<td>Блоки</td>
		<td>Фильтры</td>
	</tr>
	{foreach from=$DATA item=i key=k name=data}
		<tr  class="table">
			<td>
				<h4>{$i.title}</h4>
				<p class="url"><a href="http://{$i.url}" target="_blank">{$i.url}</a> [<a href="edit_playground.php?id={$i.id}">ред.</a>]</p>
			</td>
			<td class="vam">
				<p {if $i.status=='-1'} style="color:red"{else} style="color:green"{/if}>{$STATUS_LIST[$i.status]}</p>
			</td>
			<td class="vam">
				<p>{$i.cat_title} [<a href="edit_playground.php?id={$i.id}">ред.</a>]</p>
			</td>
			<td>
				<p class="spec_blocks">
					<a href="javascript: show_hide('blocks_{$i.id}')">Блоки</a> ({$i.num_blocks})
					<div class="pl_show" id="blocks_{$i.id}">
						{foreach from=$i.blocks item=b}
							{$b.settings.block_titile}: {$b.settings.block_text_size}x{$b.settings.block_text_size} Тизеры: {$b.settings.hor_tiser_count}x{$b.settings.vert_tiser_count} <a href="blocks.php?id={$b.id}&sid={$i.id}">редактировать</a>
							<br /><br />
						{/foreach}
						
					</div>
					<img src="./images/add.gif" alt="Добавить" /><a href="blocks.php?sid={$i.id}">Добавить блок</a>
				</p>
			</td>
			<td>
				<p class="spec_blocks"><a href="javascript: show_hide('blocks_ex_{$i.id}')">По тематикам</a>  ({$i.num_exclude})</p>
				<div class="pl_show" id="blocks_ex_{$i.id}">
					{foreach from=$i.cat_exclude item=ex}
						{$ex.title} <a href="javascript:del_denay_cat('{$ACCOUNT_ID}','{$i.id}','{$ex.id}');"><img src="./images/cross.gif"></a><br />
					{/foreach}
					<br />
				</div>
				<p class="spec_blocks"><img src="./images/add.gif" alt="Добавить" /><a class="alert" href="edit_playground.php?id={$i.id}">Добавить стоп-фильтр</a></p>
			</td>
		</tr>
	{/foreach}
</table>
{/if}

</div>

{include file="layout/footer.tpl"}