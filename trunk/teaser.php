<?
include("./include/init.php");	

DisableCache();

if (!IsAdv()) redirect("edit_playground.php");

$PAGE_TITLE = $HEAD_TITLE = "Тизер";

$id = (int) get_get('id');
$cid = (int) get_get('company');
$cp = new Company($cid);

$ts = new Teaser($id);
if (!$cp->GetId() || !$cp->IsMy()) redirect('companies.php');

$ts = new Teaser($id);

if ($ts->GetId()) {
	$PAGE_TITLE = $HEAD_TITLE = $ts->GetTitle();
}

$f = new Form('teaser', $ts);

$min_price = 0;
if ($cp->GetId()) {
	$PAGE_TITLE = $HEAD_TITLE = $cp->GetTitle();
	$cat = new Cat($cp->Get('category'));
	$min_price = $cat->Get('price');
}

include("./form/teaser.php");

$file = get($_FILES, 'uploadfile');
if (count($_POST)) {
	$f->SaveToEntity();
	
	$type = (int) get_post('type');
	$type_str = get($TEASER_TYPES, $type);
	
	$img_format = get($IMG_MIME_TYPE, get($file, 'type'));
	if ($file['error'] == 0) {
		if (!$img_format) {
			$ERRORS[] = 'Формат гафического файла не подходит!';
		}
		if (!$type) {
			$ERRORS[] = 'Формат тизера не выбран!';
		}
	}
	
	if (!count($ERRORS)) {
		$ts->Set('adid', $account_id);
		$ts->Set('company_id', $cp->GetId());
		$ts->Set('date', sqlDateTime());
		$ts->Set('type', $type);
		$ts->Set('size', get($file, 'size'));
		$ts->Set('ext', $img_format);
		$ts->Set('status', STATE_INACTIVE);
		$ts->Save();
			
		$path = "stat/teaser/{$type_str}/";
		copy($file['tmp_name'], $path."{$ts->GetId()}.{$img_format}");
		
		redirect("teaser.php?company={$cp->GetId()}&id={$ts->GetId()}&save=ok");
	}	
	

	
}

$smarty->assign("FORM", $f->HTML);
$smarty->assign("TEASER", $ts->attr);
$smarty->assign("COMPANY", $cp->attr);
$smarty->assign("TEASER_TYPES", $TEASER_TYPES);
Display("teaser.tpl");
?>