<?

$cat= new Cat();

$c=$cat->GetList("status='".STATE_ACTIVE."'");


$f->Field(FORM_SELECT, '������', 'status', array(
		'_list' => $STATUS_LIST,
	)
);

$f->Field(FORM_TEXT, '��������', 'title', array(
		'_mandatory' => true,
		'_pattern' => '/^[\S ]{1,50}$/',
		//'_msg' => '������! ������� �������� ���������',
	)
);

$f->Field(FORM_SELECT, '���������', 'category', array(
		'_list' => $c,
	)
);



$f->Field(FORM_CB_ARRAY, '���������,����������� � ������', 'exclude', array(
		'_perrow' => 3,
		'_list' => $c,
		//'_label' => '<a href="javascript: select_clear(\'tds\', \'site_list_\', 0, 10);">������� ���</a>',
	)
);


?>