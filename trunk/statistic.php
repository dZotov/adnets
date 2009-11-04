<?
include("./include/init.php");

if (IsAdv()) redirect("advstat.php");

$date_start=date("Y-m-d",( strtotime(date("d.m.Y"))-(3600*48)));
$date_end=date("Y-m-d");


if(get_get("from_date") && get_get("to_date"))
{
	$date_start=get_get("from_date");
	$date_end=get_get("to_date");
}
if(!get_get("act"))
{
	
	$max = datediff('d', $date_start, $date_end);
	for($i = 0; $i <= $max; $i++) 
	{
		$date = NewDate($date_start, "+$i DAY");
		$key = explode(" ", $date);	
		$key = $key[0];
		$t['items'][$key]['date'] = $date;
		
		$teaser = new Teaserstat();
				
		$t['items'][$key]['shows']=$teaser->SelectSum("shows","ad_id='{$account_id}' AND `date`='{$key}'");
		$t['items'][$key]['clicks']=$teaser->SelectSum("clicks","ad_id='{$account_id}' AND `date`='{$key}'");
		$t['items'][$key]['amdst']=$teaser->SelectSum("amdst","ad_id='{$account_id}' AND `date`='{$key}'");
		
		$blockstat= new Blockstat();
			
		$t['items'][$key]['block_shows']=$blockstat->SelectSum("shows","ad_id='{$account_id}' AND `date`='{$key}'");
		$t['items'][$key]['block_clicks']=$blockstat->SelectSum("clicks","ad_id='{$account_id}' AND `date`='{$key}'");
	}
	// Total
	foreach($t['items'] as $k => $v) {
		@$t['total']['shows'] +=  $v['shows'];
		@$t['total']['clicks'] +=  $v['clicks'];
		@$t['total']['block_shows'] +=  $v['block_shows'];
		@$t['total']['block_clicks'] +=  $v['block_clicks'];
		@$t['total']['amdst'] +=  $v['amdst'];
	}
	
}
if(get_get("act")=="block_stat")
{
	$blockstat= new Blockstat();
	$t=$blockstat->GetManyByCond("ad_id='{$account_id}' AND (`date` BETWEEN '{$date_start}' AND '{$date_end}')");
	
	foreach($t as $k=>$v)
	{
		$b= new Blocks($v['block_id']);
		$t[$k]['block_title']=$b->Get("title");
	}
}
if(get_get("act")=="pl_stat")
{
	$blockstat= new Blockstat();
	$t=$blockstat->GetManyByCond("ad_id='{$account_id}' AND (`date` BETWEEN '{$date_start}' AND '{$date_end}')");
}


$smarty->assign("PRE_DATE",$date_start);
$smarty->assign("DATE_NOW",$date_end);
$smarty->assign("RES",$t);

$PAGE_TITLE = $HEAD_TITLE = "Статистика";
Display("stat.tpl");
?>