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

$DAYS_LIST = array(
	1 => '��.',
	2 => '��.',
	3 => '��.',
	4 => '��.',
	5 => '��.',
	6 => '��.',
	7 => '��.',
);
$f->Field(FORM_MULTIPLE, '���', 'days', array(
		'_list' => $DAYS_LIST,
		'size' => 7,
		'style' => 'width: 80px;',
	)
);

$HOURS_LIST = array();
for($i = 0; $i < 24; $i++) {
	$HOURS_LIST[$i] = $i;
}

$f->Field(FORM_MULTIPLE, '����', 'hours', array(
		'_list' => $HOURS_LIST,
		'size' => 24,
		'style' => 'width: 80px;',
	)
);

$f->Field(FORM_TEXT, '��������� ��������', 'price', array(
		'_def' => $min_price,
	)
);

$f->Field(FORM_TEXT, '������������ ���������� ��������� � ����', 'maxrun', array(
	
	)
);

$f->Field(FORM_TEXT, '����� ������� �������� � ����', 'day_limit', array(
		
	)
);

$f->Field(FORM_TEXT, '����� ������� �������� � �����', 'limit', array(
	
	)
);





?>