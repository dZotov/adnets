<?
include("./include/init.php");


for($i=0;$i<=12;$i++)
{
	if($i!=0)
		$tiser_count[$i]=$i;
	
	if($i<4)
		$tiser_border[$i]=$i;
}



if(get_post("site_id"))
{
	if(get_post('block_titile'))
		$params['block_titile']=trim(get_post('block_titile'));
	else
		$ERRORS[]="Задайте название блоку";
	
	$params['hor_tiser_count']=(int)get_post('hor_tiser_count');
	$params['vert_tiser_count']=(int)get_post('vert_tiser_count');
	
	if(get_post('width'))	
		$params['tiser_width']=(int)get_post('width');
	else
		$ERRORS[]="Не задана длина блока";
	
	$params['tiser_width_param']=(int)get_post('tiser_width_param');
	if(get_post('field_fon'))
		$params['field_fon']=get_post('field_fon');
	else
		$ERRORS[]="Укажите цвет фона";
	
	if(isset($_POST['tiser_border']))
		$params['tiser_border']=get($_POST,'field_fon',0);
	
	$params['tiser_border']=get_post('tiser_border_line');
	
	if(get_post('field_brd'))
		$params['field_brd']=get_post('field_brd');
	else
		$ERRORS[]="Укажите цвет границы";
		
	if(get_post('field_colorfon'))
		$params['field_colorfon']=get_post('field_colorfon');
	else
		$ERRORS[]="Укажите цвет границы";
	
	$params['block_border']=get($_POST,'block_border',0);
	$params['block_line']=get_post('block_line');
	
	if(get_post('field_bbrd'))
		$params['field_bbrd']=get_post('field_bbrd');
	else
		$ERRORS[]="Укажите цвет границы";
		
	$params['block_text_align']=get_post('block_text_align');
	$params['block_text_size']=get_post('block_text_size');
	
	if(get_post('block_font_size'))
		$params['block_font_size']=(int)get_post('block_font_size');
	else
		$ERRORS[]="Укажите размер шрифта";
	
	$params['block_font_param']=get_post('block_font_param');
	
	if(get_post('field_norm'))
		$params['field_norm']=get_post('field_norm');
	else
		$ERRORS[]="Укажите цвет границы";
		
	
		if(get_post('block_font_size_naved'))
		$params['block_font_size_naved']=(int)get_post('block_font_size_naved');
	else
		$ERRORS[]="Укажите размер шрифта";
		
	$params['block_font_hover_param']=get_post('block_font_hover_param');
	
	if(get_post('field_naved'))
		$params['field_naved']=get_post('field_naved');
	else
		$ERRORS[]="Укажите цвет границы";
	
	
	if(get_post('block_font_desc'))
		$params['block_font_desc']=(int)get_post('block_font_desc');
	else
		$ERRORS[]="Укажите размер шрифта";
		
	$params['block_font_hover_param_deck']=get_post('block_font_hover_param_deck');
	
	if(get_post('field_decr'))
		$params['field_decr']=get_post('field_decr');
	else
		$ERRORS[]="Укажите цвет границы";
		
	if(!count($ERRORS))
	{
		$block = new Blocks(get_post('block_id'));
		$block->Set('pl_id',get_post('site_id'));
		$block->Set('ad_id',$account_id);
		$block->Set('settings',serialize($params));
		$block->Save();
		redirect('blocks.php?id='.$block->GetId().'&sid='.get_post("site_id"));
	}
}


if(get_get('id'))
{
	$block = new Blocks(get_get('id'));
	if(!$block->GetId())
		redirect('playgrounds.php');

	$smarty->assign("PARAM",unserialize($block->Get('settings')));
	$smarty->assign("PLID",$block->Get('pl_id'));
	
}

$smarty->assign("TISER_COUNT",$tiser_count);
$smarty->assign("TISER_BORDER",$tiser_border);
$smarty->assign("MENU_SD","play_gr");
$smarty->assign("PAGE_TITLE","AdNets.ru Добавить/Резактировать блоки");
Display("blocks.tpl");
?>