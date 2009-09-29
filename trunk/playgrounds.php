<?
include("./include/init.php");

//~ print_r($_COOKIE)

if (IsAdv()) redirect("companies.php");

$pl = new Playgrounds();
$p = $pl->GetManyByCond("adid='{$account_id}'");

foreach($p as $k=>$v)
{
	$cat= new Cat($v['category']);
	$p[$k]['cat_title']=$cat->Get('title');
	$bl= new Blocks();
	$b=$bl->GetManyByCond("pl_id='{$v['id']}'");
	$p[$k]['num_blocks']=sizeof($b);
	$counter=0;
	foreach($b as $bk=>$bv)
	{
		$p[$k]['blocks'][$counter]['id']=$bv['id'];
		$p[$k]['blocks'][$counter]['settings']=unserialize($bv['settings']);
		$counter++;
	}
}

$smarty->assign("DATA",$p);
$smarty->assign("MENU_SD",'play_gr');
$smarty->assign("STATUS_LIST",$STATUS_LIST);
$smarty->assign("PAGE_TITLE","AdNets.ru Площадки");
Display("playgrounds.tpl");
?>