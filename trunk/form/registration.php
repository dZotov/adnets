<?

$f->Field(FORM_TEXT, 'Email', 'email', array(
		'_mandatory' => true,
		'_pattern' => '/^[A-Za-z0-9\._-]+@[A-Za-z0-9\._-]+\.[A-Za-z]{2,4}$/',
		'maxlength'=>15,
		'_msg' => '��������� ���� ���������',
		'id' => 'email',
		'size' => 35,
	)
);
$f->Field(FORM_PASSWORD, '������', 'password', array(
		'_mandatory' => true,
		'_pattern' => '/^[A-Za-z0-9]{3,30}$/',
		'_msg' => '������� ������',
		'size' => 35,
		'_nosave'=> true,
		'id' => 'password',
		'maxlength'=>15,
	)
);
$f->Field(FORM_PASSWORD, '����������� ������', 'password_conf', array(
		'_mandatory' => true,
		'_pattern' => '/^[A-Za-z0-9]{3,30}$/',
		'_msg' => '������� ������',
		'size' => 35,
		'_nosave'=> true,
		'id' => 'password_conf',
		'maxlength'=>15,
	)
);

$f->Field(FORM_TEXT, 'WMR', 'wmr', array(
		'_mandatory' => true,
		'_pattern' => '/^[\S ]{1,50}$/',
		'maxlength'=>15,
		'id' => 'wmr',
		'_msg' => '��������� ���� ���������',
		'size' => 35,
	)
);

?>