{include file="layout/header.tpl"}

<h3>Новости</h3>
{if !$DATA}
<p class="anotation"><strong>Новостей нет</strong></p>	
{else}
	{foreach from=$DATA item=i key=k name=data}
		<div {if $smarty.foreach.data.iteration %2==0}class="invert"{/if} >
			<p class="anotation"><strong>{$i.date|date}</strong> <a href="news_view.php?id={$i.id}">{$i.title}</a></p>
			<p class="anotation">{$i.preview}</p>
		</div>
		
	{/foreach}
{/if}
{include file="layout/footer.tpl"}