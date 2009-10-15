<?
include("./include/ajax_init.php");

$id=(int)get_get('blockid');
$ref=get_get('ref');
$plid=(int)get_get('plid');

$smarty->caching = 1;
$smarty->cache_lifetime = 3600;

$hash=$id.rand(1,100);

$blockstat= new Blockstat();

$date=date("Y-m-d");
$blockstat->LoadByCond("block_id='{$id}' AND date='{$date}' AND pl_id='{$plid}'");
if($blockstat->GetId())
{
	$blockstat->Set('shows',$blockstat->Get('shows')+1);
}
else
{
	$blockstat->Set('ref',$ref);
	$blockstat->Set('block_id',$id);
	$blockstat->Set('pl_id',$plid);
	$blockstat->Set('shows',1);
	$blockstat->Set('date',SqlDateTime());
}
$blockstat->Save();


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
		
		foreach($t['items'] as $k=>$v)
		{
			$tstat=new Teaserstat();
			$tstat->LoadByCond("teaser_id='{$v['id']}' AND block_id='{$id}' AND date='{$date}' AND ad_id='{$v['adid']}'");
			if($tstat->GetId())
				$tstat->Set('shows',$tstat->Get('shows')+1);
			else
			{
				$tstat->Set('shows',1);
				$tstat->Set('date',$date);
				$tstat->Set('block_id',$id);
				$tstat->Set('teaser_id',$v['id']);
				$tstat->Set('ad_id',$v['adid']);
			}
			$tstat->Save();			
			
		}
		
		$smarty->assign("DATA",$t);
		$smarty->assign("SETTINGS",$property);
	}

// }


Display("in.tpl",$hash);
?>