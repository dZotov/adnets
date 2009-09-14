<?
include("./include/init.php");

if(isset($account_id))
	redirect('playgrounds.php');

Display("index.tpl");
?>