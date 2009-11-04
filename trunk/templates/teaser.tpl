{include file="layout/header2.tpl"}

<p class="anotation">	
	<div>
		<div><img src="{teaser attr=$TEASER}" alt="" /></div>	
		<div>
			Формат: {$TEASER.format} <br />
			Размер: {$TEASER.size|filesize}кб <br />
		</div>
	</div>
	<div>{include file="layout/errors.tpl"}</div>	
	<form name="teaser" action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="mode" value="upload" />
		
	<div class="padt15"> 	
		<table class="pad3">
			{*
			<tr>
				<td>Формат:</td>
				<td>
					<select name="type">
					{html_options options=$TEASER_TYPES selected=$TEASER.type}
					</select>
				</td>
			</tr>
			*}
			<tr>
				<td>Файл:</td>
				<td>
					<input type="file" size="35" name="uploadfile" /> jpg, gif
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="  Загрузить  " />	</td>
			</tr>
			
		</table>	
	</div>
	
	<div class="padt15">
		<table class="pad3">
			{foreach from=$FORM item=f}
			<tr>
				<td>{$f.title}</td>
				<td>{$f.field}</td>
			</tr>
			{/foreach}
		</table>	
	</div>
	
	<div class="padt15">
		<a class="button" href="javascript: Submit('teaser');">Сохранить</a> &nbsp;
		<a class="button" href="teaser.php?company={$COMPANY.id}">Добавить</a> &nbsp;
		<a class="button" href="teasers.php?id={$COMPANY.id}">К списку</a>
	</div>
	
	</form>
</p>

{include file="layout/footer.tpl"}