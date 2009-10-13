<?
//teaserid:blockid:url:adwert

include("./include/ajax_init.php");

$attr=get_get("attr");

$array=explode(":",$attr);

echo base64_decode($attr);
?>