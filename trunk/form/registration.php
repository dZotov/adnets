<?

$f->Field(FORM_TEXT, 'Email', 'email', array(
		'_mandatory' => true,
		'_pattern' => '/^[A-Za-z0-9\._-]+@[A-Za-z0-9\._-]+\.[A-Za-z]{2,4}$/',
		'maxlength'=>15,
		'_msg' => 'Заполните поле корректно',
		'id' => 'email',
		'size' => 35,
	)
);
$f->Field(FORM_PASSWORD, 'Пароль', 'password', array(
		'_mandatory' => true,
		'_pattern' => '/^[A-Za-z0-9]{3,30}$/',
		'_msg' => 'Введите пароль',
		'size' => 35,
		'_nosave'=> true,
		'id' => 'password',
		'maxlength'=>15,
	)
);
$f->Field(FORM_PASSWORD, 'Подтвердите пароль', 'password_conf', array(
		'_mandatory' => true,
		'_pattern' => '/^[A-Za-z0-9]{3,30}$/',
		'_msg' => 'Введите пароль',
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
		'_msg' => 'Заполните поле корректно',
		'size' => 35,
	)
);

?>