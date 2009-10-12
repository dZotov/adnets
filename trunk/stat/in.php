<?
include("./include/ajax_init.php");

$id=(int)get_get('blockid');
$ref=get_get('ref');
$plid=get_get('plid');

$smarty->caching = 1;
$smarty->cache_lifetime = 3600;

$hash=$id.rand(1,100);

// if (!$smarty->is_cached("in.tpl", $hash)) 
// {
	// $smarty->clear_cache("in.tpl", $hash);
	
	$block = new Blocks ($id);
	
	$pl = new Playgrounds($plid);
	if($block->GetId() && $pl->GetId())
	{
		$property=unserialize($block->Get('settings'));
		$ignore=$pl->Get('exclude');
		
		$teaser= new Teaser();
		
		$t['items']=$teaser->GetManyByCond("cat_id NOT IN ({$ignore}) AND status=".STATE_ACTIVE."","ctr DESC",1,$property['hor_tiser_count']*$property['vert_tiser_count']);
		
		$t['block_id']=$block->GetId();
		
		$smarty->assign("DATA",$t);
		$smarty->assign("SETTINGS",$property);
	}

// }


Display("in.tpl",$hash);
?>