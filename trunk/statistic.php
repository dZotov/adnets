<?
include("./include/init.php");
$date_start=date("Y-m-d",( strtotime(date("d.m.Y"))-(3600*48)));
$date_end=date("Y-m-d");


if(get_get("from_date") && get_get("to_date"))
{
	$date_start=get_get("from_date");
	$date_end=get_get("to_date");
}
if(!get_get("act"))
{
	$teaser = new Teaserstat();
	$t=$teaser->GetManyByCond("ad_id='{$account_id}' AND (`date` BETWEEN '{$date_start}' AND '{$date_end}')","date DESC");
	foreach($t as $k=>$v)
	{
		$blockstat= new Blockstat();
		$blockstat->LoadbyCond("block_id='{$v['block_id']}' AND date='{$v['date']}'");
		if($blockstat->GetId())
		{
			$t[$k]['block_shows']=$blockstat->Get('shows');
			$t[$k]['block_clicks']=$blockstat->Get('clicks');
		}
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

$PAGE_TITLE = "Статистика";
Display("stat.tpl");
?>