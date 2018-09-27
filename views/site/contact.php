<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\form\ContactForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;


?>
<div class="site-contact">
    <h1>Контакты</h1>

    <p>
        Точка перегиба концентрирует тригонометрический критерий интегрируемости. Теорема Ферма допускает интеграл
        Пуассона. Используя таблицу интегралов элементарных функций, получим: дифференциальное уравнение упорядочивает
        тригонометрический Наибольший Общий Делитель (НОД).
    </p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'email') ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'phone') ?>
                </div>
            </div>

            <?= $form->field($model, 'subject') ?>

            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
