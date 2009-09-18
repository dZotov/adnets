<?
include("./include/init.php");

$id=(int)get_get('id');
$pl= new Playgrounds($id);
if($pl->Get('adid')!=$account_id && $id)
	redirect("index.php");

$cat= new Cat();

$c=$cat->GetManyByCond("status='".STATE_ACTIVE."'");

if($pl->Getid())
{
	$cats_sel=explode(",",$pl->Get('category'));
	foreach($c as $k=>$v)
	{
		if(in_array($v['id'],$cats_sel))
			$c[$k]['selected']=1;
	}
	$smarty->assign("EDIT_SITE","Изменить");
}

$smarty->assign("PAGE_TITLE","AdNets.ru Редактирование площадок");
$smarty->assign("CAT",$c);
$smarty->assign("DATA",$pl->attr);
$smarty->assign("MENU_SD","play_gr");
Display("edit_pl.tpl");
?>