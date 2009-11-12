<?

$cat= new Cat();

$c=$cat->GetList("status='".STATE_ACTIVE."'");


$f->Field(FORM_SELECT, 'Статус', 'status', array(
		'_list' => $STATUS_LIST,
	)
);

$f->Field(FORM_TEXT, 'Название', 'title', array(
		'_mandatory' => true,
		'_pattern' => '/^[\S ]{1,50}$/',
		//'_msg' => 'Ошибка! Введите название корректно',
	)
);

$f->Field(FORM_SELECT, 'Категория', 'category', array(
		'_list' => $c,
	)
);



$f->Field(FORM_CB_ARRAY, 'Категории,запрещенные к показу', 'exclude', array(
		'_perrow' => 3,
		'_list' => $c,
		//'_label' => '<a href="javascript: select_clear(\'tds\', \'site_list_\', 0, 10);">Выбрать все</a>',
	)
);


?>