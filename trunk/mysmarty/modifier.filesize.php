<?

function smarty_modifier_filesize($content) {
	return sprintf("%0.2f", $content/1024);
}

?>