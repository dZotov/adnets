{include file="layout/header.tpl"}

<h3>Новости {$DATA.title}</h3>
{if !$DATA}
	<p class="anotation"><strong>Новостей нет</strong></p>	
{else}
	<p class="anotation"><strong>{$DATA.date|date}</strong></p>
	<p class="anotation">{$DATA.full}</p>
{/if}
{include file="layout/footer.tpl"}