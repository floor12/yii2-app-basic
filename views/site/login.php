<?php
/**
 *
 */

/*  */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\form\LoginForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Вход';

?>
<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php $form = ActiveForm::begin(['id' => 'login-form',]); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= Html::submitButton('войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>

        <?php ActiveForm::end(); ?>

    </div>
</div>