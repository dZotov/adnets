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

// �������
define('STATE_ACTIVE', 1); // �������� 
define('STATE_INACTIVE', -1); // �� ��������

define('ADMIN_EMAIL','test@example.com');

$WEBMONEY_WMZ = array(
	3 => '10 �������� (3 WMZ)',
	6 => '20 �������� (6 WMZ)',
	14 => '50 �������� (14 WMZ)',
	27 => '100 �������� (27 WMZ)',
	55 => '250 �������� (55 WMZ)',
	110 => '500 �������� (110 WMZ)',
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
	STATE_ACTIVE => '��������',
	STATE_INACTIVE => '�� ��������',
);

// ������������ ������ ������������ ����
define('UPLOAD_MAX_SIZE', 10 * 1024 * 1024); // 10Mb

// ������� `online` ���� 'type' 
define('GUEST', 0); // ����� 
define('USER', 1); // ���� 
define('MODEL', 2); // ������ 
define('PARTNER', 3); // ���������
define('STUDIO', 4); // ���������

// �� �������� ���������
$SUBJECT_LIST = array(
	'����������� � ������',
	'������ ����������',
	'����������� ��������',
	'������ � ��������������',
	'������ �������',
	'������ ��������� ������',
);

// ����� ��� ������ �� ��������� ������ $
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
	1=>'������',
	2=>'���������',
	3=>'��������� ���������',
	4=>'1to1',
);

//pay status
define('PAY_WAIT', 0);
define('PAY_FIRED', 1);
define('PAY_FROZEN', 2);
define('PAY_FROM_STUDIO', 3); // �������� ������ �� ������
define('PAY_MIN', 4); // �������� ������ �� ������

$PAY_LIST = array(
	0 => 'O������ ������',
	1 => '������� �����������',
	2 => '������� ����������',
	3 => '�������� ������ �� ����� ������',
	4 => '����������� ����� �� �������',
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
	0 => '������',
	1 => '������',
	2 => '���������',
	3 => '������� ���',
	4 => '���������� ���',
);

$TRANSACTION_TYPE = array(
	1 => '��������� ���������(1��.)', 
	2 => '���������(4�� � ���)', 
	3 => '������(�� 8 �� 15�� � ���)', 
	4 => '1 �� 1(16��. � ���)',
);

$SEX_LIST = array(
	1 => "���",
	2 => "���",
);

?>
