<?

$f->Field(FORM_TEXT, '�������� ��������', 'title', array(
		'_def' => '��������',
	)
);

$cat = new Cat();
$f->Field(FORM_SELECT, '�������� ��������', 'category', array(
		'_list' => $cat->GetList(),
	)
);



?>