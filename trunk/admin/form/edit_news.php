<?

$f->Field(FORM_SELECT, '������', 'status', array(
		'_list' => $STATUS_LIST,
	)
);

$f->Field(FORM_TEXT, '��������', 'title', array(
		'_mandatory' => true,
		'_pattern' => '/^[\S ]{1,50}$/',
		'_msg' => '������! ������� �������� ���������',
	)
);

$f->Field(FORM_MEMO, '������', 'preview', array(
		'_mandatory' => true,
		'cols' => 47, 
		'rows' => 12,
		//'_pattern' => '/^[\S ]{1,100}$/',
		'_msg' => '������! ������� ������ �������',
		// 'onkeypress' => "javascript: if(this.value.length > 100) this.value = this.value.substring(0, 90);",
		//'_nosave'=> true,

	)
);

$f->Field(FORM_MEMO, '�������', 'full', array(
		'_mandatory' => true,
		'cols' => 47, 
		'rows' => 12,
		//'_pattern' => '/^[\S ]{1,500}$/',
		'_msg' => '������! ������� �������',
		//'onkeypress' => "javascript: if(this.value.length > 500) this.value = this.value.substring(0, 490);",
		//'_nosave'=> true,
	)
);

$f->Field(FORM_SELECT, '���', 'type', array(
		'_list' => $TYPE_LIST,
		//'_def' => $LANGUAGE,
	)
);

?>