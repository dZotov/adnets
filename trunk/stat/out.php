<?
//teaserid:blockid:url:adwert

include("./include/ajax_init.php");

$attr=get_get("attr");

$array=explode("|",base64_decode($attr));
$date=date("Y-m-d");


$blockstat = new Blockstat();
$blockstat->LoadByCond("block_id='{$array[1]}' AND date='{$date}'");
if($blockstat->GetId())
{
	$blockstat->Set('clicks',$blockstat->Get('clicks')+1);
	$blockstat->Save();
}

$tstat=new Teaserstat();
$tstat->LoadByCond("teaser_id='{$array[0]}' AND block_id='{$array[1]}' AND date='{$date}' AND ad_id='{$array[3]}'");
if($tstat->GetId())
	$tstat->Set('clicks',$tstat->Get('clicks')+1);
else
{
	$tstat->Set('clicks',1);
	$tstat->Set('date',$date);
	$tstat->Set('block_id',$array[1]);
	$tstat->Set('teaser_id',$array[0]);
	$tstat->Set('ad_id',$array[3]);
}
$tstat->Save();

redirect($array[2]);



?>