<?
//teaserid:blockid:url:adwert:companyid

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

$company = new Company($array[4]);
if($company->GetId())
{
	$price=$company->Get("price");
	$amdst=$price*0.80;//площадкам
	$amsrc=$price+($price*0.20);//рекламсам
}
else
{
	$price=0;
	$amdst=0.1;
	$amsrc=0.3+(0.3*0.2);
}


$tstat=new Teaserstat();
$tstat->LoadByCond("teaser_id='{$array[0]}' AND block_id='{$array[1]}' AND date='{$date}' AND ad_id='{$array[3]}'");
if($tstat->GetId())
{
	$tstat->Set('clicks',$tstat->Get('clicks')+1);
	$tstat->Set('amdst',$tstat->Get('amdst')+$amdst);
	$tstat->Set('amsrc',$tstat->Get('amsrc')+$amsrc);
}
else
{
	$tstat->Set('clicks',1);
	$tstat->Set('date',$date);
	$tstat->Set('block_id',$array[1]);
	$tstat->Set('teaser_id',$array[0]);
	$tstat->Set('ad_id',$array[3]);
	$tstat->Set('amdst',$tstat->Get('amdst'));
	$tstat->Set('amsrc',$tstat->Get('amsrc'));
}
$tstat->Save();

redirect($array[2]);



?>