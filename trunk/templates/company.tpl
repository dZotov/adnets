{include file="layout/header.tpl"}

<p class="anotation">
	{foreach from=$FORM item=f}
	<div class="padt8 anotation">
		{$f.title} <br />
		{$f.field}
	</div>
	{/foreach}
	<div>
		<input type="checkbox" name="type_ero" /> ���-��������
	</div>
	
	<div class="padt15">
		<a class="button" href="companies.php">��������</a> &nbsp;
		<a class="button" href="logout.php">������</a>
	</div>
	
</p>

{include file="layout/footer.tpl"}