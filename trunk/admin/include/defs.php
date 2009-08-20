<?

define('AUTO', 0);
define('TCAT', '_cat');
define('TAVATAR', '_avatar');
define('TSMS', '_sms');

// Таблицы
$IMG_MIME_TYPE = array(
	'image/bmp'  => 'bmp',
	'image/gif'  => 'gif',
	'image/pjpeg' => 'jpg',
	'image/jpeg' => 'jpg',
	'image/png'  => 'png',
	'image/x-png' => 'png',
);



define('STATE_ACTIVE', 1); // Активный 
define('STATE_INACTIVE', -1); // Не активный


$STATUS_LIST = array(
	STATE_INACTIVE => 'Неактивная',
	STATE_ACTIVE => 'Активная',
);

?>