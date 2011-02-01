<?php

$f->Field(FORM_TEXT, 'Заголовок', 'title', array(
    '_def' => "",
        )
);

$f->Field(FORM_TEXT, 'Описание', 'desc', array(
    '_def' => "",
        )
);

$f->Field(FORM_TEXT, 'URL целевой страницы', 'url', array(
    '_def' => "",
        )
);

$f->Field(FORM_TEXT, 'Стоимость перехода', 'price', array(
    '_def' => $min_price,
    'size' => '10',
        )
);

$cat = new Cat();
$cat_list = $cat->GetList();
$f->Field(FORM_SELECT, 'Категория', 'category', array(
    '_list' => $cat_list,
    '_def' => $cp->Get('category'),
        )
);
?>