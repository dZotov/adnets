<?

$f->Field(FORM_SELECT, '������', 'status', array(
		'_list' => $STATUS_LIST,
	)
);

$f->Field(FORM_TEXT, 'Email', 'email', array(
		'_mandatory' => true,
		'_pattern' => '/^[\S ]{1,50}$/',
		//'_msg' => '������! ������� �������� ���������',
	)
);

$f->Field(FORM_TEXT, 'Icq', 'icq', array(
		'_mandatory' => true,
		'_pattern' => '/^[\S ]{1,50}$/',
		//'_msg' => '������! ������� �������� ���������',
	)
);

$f->Field(FORM_TEXT, 'Wmr', 'wmr', array(
		'_mandatory' => true,
		'_pattern' => '/^[\S ]{1,50}$/',
		//'_msg' => '������! ������� �������� ���������',
	)
);

$f->Field(FORM_TEXT, '������', 'balance', array(
		//'_mandatory' => true,
		'_pattern' => '/^[\S ]{1,50}$/',
		//'_msg' => '������! ������� �������� ���������',
		'disabled'=>'disabled',
	)
);


?>