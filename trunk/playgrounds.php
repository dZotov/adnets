<?
include("./include/init.php");

//~ print_r($_COOKIE)

if (IsAdv()) redirect("companies.php");

$pl = new Playgrounds();
$p = $pl->GetManyByCond("adid='{$account_id}'");


if(get_get('act')=='del_cat' && get_get('sid') && get_get('cat'))
{
	$pl_cat = new Playgrounds((int)get_get('sid'));
	
	
	
	if($pl_cat->GetId() && $pl_cat->Get('adid')==$account_id)
	{	
		
		$array_cat=explode(",",$pl_cat->Get('exclude'));
		
		$index = array_search((int)get_get('cat'),$array_cat);
		if($index!==false)
			unset($array_cat[$index]);
		
		$pl_cat->Set('exclude',implode(",",$array_cat));
		$pl_cat->Save();
	}
	redirect("playgrounds.php");
}



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
	
	if ($v['exclude']) {
		$cat_exclude_arr=$cat->GetManyByCond("id IN({$v['exclude']})");
		$p[$k]['cat_exclude']=$cat_exclude_arr;
	}
	
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
$smarty->assign("PAGE_TITLE",'');
Display("playgrounds.tpl");
?>