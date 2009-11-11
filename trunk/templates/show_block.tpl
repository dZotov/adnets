<script type="text/javascript">
		if (typeof adnets == 'undefined') {ldelim}
			var adnets ={ldelim}{rdelim} ; var adnets_blockid = {$BLOCK_ID};
			{rdelim} else {ldelim}
				adnets_blockid = {$BLOCK_ID};
			{rdelim}
			
			adnets[adnets_blockid] = {ldelim}
				'plid': {$PLID},
				'ad_id': {$ACCOUNT_ID}
			{rdelim};
			
			document.write('<div id="adnets_' + adnets_blockid + '"></div>');
	</script> 
	
	<script type="text/javascript">
	{literal}
	if (typeof adnets != 'undefined' && typeof adtens_blocks_exists == 'undefined') {
		for (var blockid in adnets) {
			 var newScr = document.createElement('script'); newScr.type = 'text/javascript';
			 newScr.src = 'http://stat.adnets.ru/in.php?blockid=' + blockid + '&plid=' + adnets[blockid].plid +'&ad_id='+ adnets[blockid].ad_id+ '&ref=' + escape(document.referrer);
			 var el = document.getElementById('adnets_' + adnets_blockid); if (el) { el.appendChild(newScr);}
		}
		var adtens_blocks_exists = true;
	}
	
	{/literal}
	</script> 
