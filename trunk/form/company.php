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



?>