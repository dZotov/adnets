{include file="layout/header2.tpl"}

<p class="anotation">	
	<div>
		<div><img src="{teaser attr=$TEASER}" alt="" /></div>	
		<div>
			������: {$TEASER.format} <br />
			������: {$TEASER.size|filesize}�� <br />
		</div>
	</div>
	<div>{include file="layout/errors.tpl"}</div>	
	<form name="teaser" action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="mode" value="upload" />
		
	<div class="padt15"> 	
		<table class="pad3">
			<tr>
				<td>����:</td>
				<td>
					<input type="file" size="35" name="uploadfile" /> jpg, gif
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="  ���������  " />	</td>
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
			<tr>
				<td></td>
				<td><input type="button" value=" ��������� " onclick="javascript: Submit('teaser');" /></td>
			</tr>
		</table>	
	</div>
	
	
	
	</form>
</p>

{include file="layout/footer.tpl"}