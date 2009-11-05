<?
include("./include/init.php");

$smarty->assign("PLID",get_get("plid"));
$smarty->assign("BLOCK_ID",get_get("block"));
Display("show_block.tpl");
?>