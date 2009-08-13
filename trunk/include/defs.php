<?
define('TACCOUNT', '_account');
define('TWEBMONEY', 'peyments_webmoney');
define('TDESCBOARD', 'descboard');
define('TDESCOM', 'desc_comments');
define('TMYPOST', 'messsages');
define('TONLINE', 'online');
define('TMADELS', 'models');
define('TATTACH', '_attach');
define('TSTUDIO', 'studio'); 
define('TMODELONLINE', 'models'); 
define('TSMS', '_sms'); 
define('TCREDITCARD', '_credit_card'); 
define('TCATEGORY', '_category'); 
define('TPROFILE', '_profile'); 
define('TCOMMENT', '_comment'); 
define('TVIEWED', '_viewed'); 
define('TFAV', '_favourite'); 
define('TPHOTO', '_photo'); 
define('TCCCPAY', '_cccpay'); 
define('TCARDS', '_cards'); 
define('TPAYHISTORY', '_pay_history'); 
define('TSETTING', '_setting'); 
define('TTRANSACT', '_transactions'); 
define('TPAY', '_pays'); 
define('TCURRENT_P', '_current_payments'); 
define('TIP', '_ip'); 
define('TGEOIP', '_geo_ip'); 
define('TCITYBAN', '_city_ban'); 
define('TCOUNTRYBAN', '_country_ban'); 
define('TTRANSACTION', '_transaction'); 
define('TBAN', '_ban'); 
define('TGUEST', '_guest'); 
define('TMESSAGEENTITY', '_message_log'); 
define('TIVR', '_ivr'); 

define('AUTO', 0);

// Статусы
define('STATE_ACTIVE', 1); // Активный 
define('STATE_INACTIVE', -1); // Не активный

define('ADMIN_EMAIL','test@example.com');

$WEBMONEY_WMZ = array(
	3 => '10 кредитов (3 WMZ)',
	6 => '20 кредитов (6 WMZ)',
	14 => '50 кредитов (14 WMZ)',
	27 => '100 кредитов (27 WMZ)',
	55 => '250 кредитов (55 WMZ)',
	110 => '500 кредитов (110 WMZ)',
);

$WEBMONEY_WMR = array(
	150=>'150 WMR',
	250=>'250 WMR',
	500=>'500 WMR',
	750=>'750 WMR',
	1000=>'1000 WMR',
	1500=>'1500 WMR',
	3000=>'3000 WMR',
	5000=>'5000 WMR',
);

$MSG_STATUS = array(
	STATE_ACTIVE => 'Прочтено',
	STATE_INACTIVE => 'Не прочтено',
);

// Максимальный размер загружаемого файл
define('UPLOAD_MAX_SIZE', 10 * 1024 * 1024); // 10Mb

// таблица `online` поле 'type' 
define('GUEST', 0); // гость 
define('USER', 1); // юзер 
define('MODEL', 2); // модель 
define('PARTNER', 3); // вебмастер
define('STUDIO', 4); // вебмастер

// На странице контактов
$SUBJECT_LIST = array(
	'Регистрация и оплата',
	'Работа видеочатов',
	'Технические проблемы',
	'Работа и сотрудничество',
	'Прочие вопросы',
	'Оплата кредитной картой',
);

// Сумма для оплаты по кредитным картам $
define('CREDIT_CARD_PAY', 4);

$IMG_MIME_TYPE = array(
	'image/bmp'  => 'bmp',
	'image/gif'  => 'gif',
	'image/pjpeg' => 'jpg',
	'image/jpeg' => 'jpg',
	'image/png'  => 'png',
	'image/x-png' => 'png',
);

$PRIVATE_TYPE = array(
	1=>'Приват',
	2=>'Подглядки',
	3=>'Приватное сообщение',
	4=>'1to1',
);

//pay status
define('PAY_WAIT', 0);
define('PAY_FIRED', 1);
define('PAY_FROZEN', 2);
define('PAY_FROM_STUDIO', 3); // Ожидайте оплаты от студии
define('PAY_MIN', 4); // Ожидайте оплаты от студии

$PAY_LIST = array(
	0 => 'Oжидает оплаты',
	1 => 'Выплата произведена',
	2 => 'Выплата заморожена',
	3 => 'Ожидайте оплаты от Вашей студии',
	4 => 'Минимальная сумма не набрана',
);

// credits.php
$NEW_BALANS = array(
	30 => 'WEBKAM_RU',
	35 => 'WEBKAM_RU_00',
	40 => 'WEBKAM_RU_01',
	60 => 'WEBKAM_RU_02',
	70 => 'WEBKAM_RU_03',
	80 => 'WEBKAM_RU_04',
	90 => 'WEBKAM_RU_05',
	1000 => 'WEBKAM_RU_06',
	150 => 'WEBKAM_RU_07',
	200 => 'WEBKAM_RU_08',
);
	
// credits.php
$WMZ_PAY_AMOUNT = array(
	3 => '616548',
	6 => '616550',
	14 => '616552',
	27 => '616553',
	55 => '616555',
	110 => '616557',
);

$CHAT_MODES = array('free' => 4, 'paid' => 3, 'peep' => 2, 'private' => 1);
$MODEL_STATUS = array(
	0 => 'Офлайн',
	1 => 'Приват',
	2 => 'Подглядки',
	3 => 'Платный чат',
	4 => 'Бесплатный чат',
);

$TRANSACTION_TYPE = array(
	1 => 'приватное сообщение(1кр.)', 
	2 => 'подглядки(4кр в мин)', 
	3 => 'приват(от 8 до 15кр в мин)', 
	4 => '1 на 1(16кр. в мин)',
);

$SEX_LIST = array(
	1 => "Муж",
	2 => "Жен",
);

?>
