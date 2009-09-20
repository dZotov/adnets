{include file="layout/header.tpl"}
<p class="add_site"><a class="button" href="edit_playground.php">Добавить сайт</a></p>

{if !$DATA}
<p class="anotation">У вас не пока нет ни одного сайта, но вы можете <a href="edit_playground.php">добавить сайт</a> прямо сейчас.</p>
{else}
<table>
	<tr>
		<th class="name">Названиe</th>
		<th class="status">Статус</th>
		<th class="category">Категория</th>
		<th class="blocks">Блоки</th>
		<th class="blocks">Фильтры</th>
	</tr>
	{foreach from=$DATA item=i key=k name=data}
		<tr {if $smarty.foreach.data.iteration %2==0}class="invert"{/if}>
			<td>
				<h4>{$i.title}</h4>
				<p class="url"><a href="http://{$i.url}" target="_blank">{$i.url}</a></p>
			</td>
			<td>
				<p>{$STATUS_LIST[$i.status]}</p>
			</td>
			<td>
				<p><a href="edit_playground.php?id={$i.id}">{$i.cat_title}</a></p>
			</td>
			<td>
				<p class="spec_blocks">
					<a href="javascript: show_hide('blocks_{$i.id}')">Блоки</a> ({$i.num_blocks})
					<div class="pl_show" id="blocks_{$i.id}">
						{foreach from=$i.blocks item=b}
							Блок: {$b.settings.size} Тизеры: {$b.settings.size_tizer} <a href="blocks.php?id={$b.id}">редактировать</a>
						{/foreach}
						<br />
					</div>
					<img src="./images/add.gif" alt="Добавить" /><a href="blocks.php">Добавить блок</a>
				</p>
			</td>
			<td>
				<p class="spec_blocks"><a href="javascript: show_hide('')">По тематикам</a>  ()</p>
				<p class="spec_blocks"><a class="alert" href="edit_playground.php?id={$i.id}">Добавить стоп-фильтр</a></p>
			</td>
		</tr>
	{/foreach}
</table>
{/if}
{include file="layout/footer.tpl"}