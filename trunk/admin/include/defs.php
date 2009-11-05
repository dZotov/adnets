<?

define('AUTO', 0);
define('TADWERTS', 'adwerts');
define('TSITES', 'playgrounds');
define('TNEWS', 'news');
define('TPAYMENTS', 'payments');
define('TTOP', 'top');
define('TCAT', 'category');
define('TBLOCKS', 'blocks');
define('TBALANCE', 'balance');
define('TCOMPANY', 'company');
define('TTEASER', 'teaser');
define('TBLOCKSTAT', 'stat_blocks');
define('TTEASERSTAT', 'stat_teaser');


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

$TYPE_LIST=array(
	1=>'Вебмастерам',
	2=>'Рекламодателям',
)

?>