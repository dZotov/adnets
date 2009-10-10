<?

$f->Field(FORM_TEXT, 'Название компании', 'title', array(
		'_def' => 'Компания',
	)
);

$cat = new Cat();
$f->Field(FORM_SELECT, 'Тематика компании', 'category', array(
		'_list' => $cat->GetList(),
	)
);

$DAYS_LIST = array(
	1 => 'Пн.',
	2 => 'Вт.',
	3 => 'Ср.',
	4 => 'Чт.',
	5 => 'Пт.',
	6 => 'Сб.',
	7 => 'Вс.',
);
$f->Field(FORM_MULTIPLE, 'Дни', 'days', array(
		'_list' => $DAYS_LIST,
		'size' => 7,
		'style' => 'width: 80px;',
	)
);

$HOURS_LIST = array();
for($i = 0; $i < 24; $i++) {
	$HOURS_LIST[$i] = $i;
}

$f->Field(FORM_MULTIPLE, 'Часы', 'hours', array(
		'_list' => $HOURS_LIST,
		'size' => 24,
		'style' => 'width: 80px;',
	)
);

$f->Field(FORM_TEXT, 'Стоимость перехода', 'price', array(
		'_def' => $min_price,
	)
);

$f->Field(FORM_TEXT, 'Максимальное количество переходов в день', 'maxrun', array(
	
	)
);

$f->Field(FORM_TEXT, 'Лимит бюджета кампании в день', 'day_limit', array(
		
	)
);

$f->Field(FORM_TEXT, 'Лимит бюджета кампании в целом', 'limit', array(
	
	)
);





?>