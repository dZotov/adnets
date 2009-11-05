<script type="text/javascript">
		if (typeof adtens == 'undefined') {ldelim}
			var adtens ={ldelim}{rdelim} ; var adtens_blockid = {$BLOCK_ID};
			{rdelim} else {ldelim}
				adtens_blockid = {$BLOCK_ID};
			{rdelim}
			
			adtens[adtens_blockid] = {ldelim}
				'plid': {$PLID},
				'ad_id': {$ACCOUNT_ID}
			{rdelim};
			
			document.write('<div id="adtens_' + adtens_blockid + '">Загрузка...</div>');
	</script> 
	
	<script type="text/javascript">
	{literal}
		if (typeof adtens != 'undefined' && typeof adtens_blocks_exists == 'undefined') {
			for (var blockid in adtens) {
				 var newScr = document.createElement('script'); newScr.type = 'text/javascript';
				 newScr.src = 'http://stat.adnets.ru/in.php?blockid=' + blockid + '&plid=' + adtens[blockid].plid +'&ad_id='+ adtens[blockid].ad_id+ '&ref=' + escape(document.referrer);
				 var el = document.getElementById('adtens_' + adtens_blockid); if (el) { el.appendChild(newScr); }
			}
			var adtens_blocks_exists = true;
		}
	{/literal}
	</script> 
