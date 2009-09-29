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
	
	$exclude_cat=explode(",",$v['exclude']);
	$p[$k]['num_exclude']=sizeof($exclude_cat);
	$cat= new Cat();
	
	$cat_exclude_arr=$cat->GetManyByCond("id IN({$v['exclude']})");
	$p[$k]['cat_exclude']=$cat_exclude_arr;
	
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
$smarty->assign("PAGE_TITLE","Площадки");
Display("playgrounds.tpl");
?>