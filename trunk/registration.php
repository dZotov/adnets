<?
include("./include/init.php");


$adw=new Adwerts();
$f = new Form('reg',$adw);
require_once('./form/registration.php');

$smarty->assign('FORM', $f->HTML);
Display("registration.tpl");
?>