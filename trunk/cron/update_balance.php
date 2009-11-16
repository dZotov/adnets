<?
include('init.php');

$ad=new Adwerts();

$a=$ad=>GetManyByCond("status='".STATE_ACTIVE."'");

foreach($a as $k=>$v)
{
	$t=new TeaserStat();
	
	$balance=$t->SelectSum("amdst","ad_id='{$v['id']}' and date BETWEEN ")
}

?>