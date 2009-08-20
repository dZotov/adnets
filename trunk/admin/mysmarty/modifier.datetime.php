<?

require_once $smarty->_get_plugin_filepath('modifier','date_format');

function smarty_modifier_datetime($string, $format = "%e %b  %Y", $default_date = NULL) {
    return smarty_modifier_date_format($string,  "%d.%m.%Y - %H");
}

?>
