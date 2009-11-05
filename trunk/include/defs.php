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
define('TBLOCKSTAT', 'stat_blocks');
define('TTEASERSTAT', 'stat_teaser');
define('TREFSTAT', 'refstat');


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
);

$TEASER_TYPES = array(
	1 => '50x50',
	2 => '60x60',
	3 => '700x70',
	4 => '100x100',
	5 => '120x120',
);

?>