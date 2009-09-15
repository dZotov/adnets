{include file="layout/header.tpl"}

<h3>Площадки</h3>
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
				<p><a href="edit_playground.php?id={$i.id}">Авто/мото</a></p>
			</td>
			<td>
				<p class="spec_blocks">
					<a href="javascript: show_hide('')">Добавить блок</a> ()
						<div class="">
							asdadasd
						</div>
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