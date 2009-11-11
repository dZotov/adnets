<?
//teaserid:blockid:url:adwert:companyid:ref

include("./include/ajax_init.php");

$attr=get_get("attr");
$array=explode("|",base64_decode($attr));
$date=date("Y-m-d");

SetCookie("check", md5($array[0].$array[1].$array[2].$array[3].$HASH), time() + 86400, "/"); // ѕроверочна€ кука(от ботов)
$_COOKIE['check'] = md5($array[0].$array[1].$array[2].$array[3].$HASH);
if (get($_COOKIE, 'check')) {

	$ip=get($_SERVER, 'REMOTE_ADDR');
	$referer = GetRefURL($array[5]);
	
	$traf = new TmpStat();
	$cond = "ip = '{$ip}' AND teaser_id='{$array[0]}' AND date='{$date}'";
	
	$count = $traf->ExistsByCond($cond);		
	if (!$count) {
		$uniq = 1;
	}
	if ($count < 5) 
	{
	
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
		$traf = new TmpStat();
		$traf->LoadByCond($cond);
		$traf->Set("ip",$ip);
		$traf->Set("uniq",$uniq);
		$traf->Set("raw", $traf->Get('raw') + 1);
		$traf->Set("ad_id",$array[3]);
		$traf->Set("referer",$referer);
		$traf->Set("teaser_id",$array[0]);
		$traf->Save();
		
		redirect($array[2]);
	}
	else
		redirect($DEF_URL);
}
else
	redirect($DEF_URL);

?>