<?

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

// �������
$IMG_MIME_TYPE = array(
	'image/bmp'  => 'bmp',
	'image/gif'  => 'gif',
	'image/pjpeg' => 'jpg',
	'image/jpeg' => 'jpg',
	'image/png'  => 'png',
	'image/x-png' => 'png',
);

define('STATE_ACTIVE', 1); // �������� 
define('STATE_INACTIVE', -1); // �� ��������
define('STATE_BAN', 2); // �� ��������

$STATUS_LIST = array(
	STATE_INACTIVE => '�� ���������',
	STATE_ACTIVE => '��������',
	STATE_BAN => '����������',
);

$PAY_STATUS = array(
	STATE_INACTIVE => '� ���������',
	STATE_ACTIVE => '���������',
);

$TYPE_LIST = array(
	1 => '�����������',
	2 => '��������������',
)

?>