<?
include('init.php');

$teasers=new Teaser();

$t=$teasers->GetManyByCond("status=".STATE_ACTIVE."");

$date=date("Y-m-d");

foreach($t as $k=>$v)
{
	$stat=new TeasetStat();
	$shows=$stat->SelectSum("shows","teaser_id='{$v['id']}' AND date='{$date}'");
	$clicks=$stat->SelectSum("clicks","teaser_id='{$v['id']}' AND date='{$date}'");
	$ctr=round(($clicks/$shows)*100,2);
	
	$teaser= new Teaser($v['id']);
	$teaser->Set('ctr',$ctr);
	$teaser->Save();
	
}

?>