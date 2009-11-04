<?
include("./include/init.php");

if (!IsAdv()) redirect("profile.php");

$f = new Form();

if ($f->Filled()) {
	$f->SaveToEntity();

	
}

$PAGE_TITLE = $HEAD_TITLE = "Профиль";

$smarty->assign('FORM', $f->HTML);
Display("advprofile.tpl");
?>