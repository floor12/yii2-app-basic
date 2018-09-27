<?php

use app\models\form\ContactForm;
use floor12\phone\PhoneFormatter;

/* @var $this yii\web\View */
/* @var $model ContactForm */
?>
<b><p>На сайте поступило новое обращение из формы контактов.</b>

<ul>
    <li>Имя: <?= $model->name ?></li>
    <li>Телефон: <?= PhoneFormatter::run($model->phone) ?></li>
    <li>Почта: <?= $model->email ?></li>
</ul>

<b>Текст обращения:</b>
<p><?= $model->body ?></p>

