<?

$f->Field(FORM_TEXT, '���������', 'title', array(
		'_def' => "",
	)
);

$f->Field(FORM_TEXT, '��������', 'desc', array(
		'_def' => "",
	)
);

$f->Field(FORM_TEXT, 'URL ������� ��������', 'url', array(
		'_def' => "",
	)
);

$f->Field(FORM_TEXT, '��������� ��������', 'price', array(
		'_def' => $min_price,
		'size' => '10',
	)
);

$cat = new Cat();
$cat_list = $cat->GetList();
$f->Field(FORM_SELECT, '���������', 'category', array(
		'_list' => $cat_list,
		'_def' => $cp->Get('category'),
	)
);

?>