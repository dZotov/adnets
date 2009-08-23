<?

$f->Field(FORM_SELECT, 'Статус', 'status', array(
		'_list' => $STATUS_LIST,
	)
);

$f->Field(FORM_TEXT, 'Название', 'title', array(
		'_mandatory' => true,
		'_pattern' => '/^[\S ]{1,50}$/',
		'_msg' => 'Ошибка! Введите название корректно',
	)
);

$f->Field(FORM_MEMO, 'Превью', 'preview', array(
		'_mandatory' => true,
		'cols' => 47, 
		'rows' => 12,
		//'_pattern' => '/^[\S ]{1,100}$/',
		'_msg' => 'Ошибка! введите превью новости',
		// 'onkeypress' => "javascript: if(this.value.length > 100) this.value = this.value.substring(0, 90);",
		//'_nosave'=> true,

	)
);

$f->Field(FORM_MEMO, 'Новость', 'full', array(
		'_mandatory' => true,
		'cols' => 47, 
		'rows' => 12,
		//'_pattern' => '/^[\S ]{1,500}$/',
		'_msg' => 'Ошибка! Введите новость',
		//'onkeypress' => "javascript: if(this.value.length > 500) this.value = this.value.substring(0, 490);",
		//'_nosave'=> true,
	)
);

$f->Field(FORM_SELECT, 'Тип', 'type', array(
		'_list' => $TYPE_LIST,
		//'_def' => $LANGUAGE,
	)
);

?>