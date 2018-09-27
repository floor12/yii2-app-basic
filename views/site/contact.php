<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\form\ContactForm */

use floor12\fprotector\Fprotector;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\MaskedInput;

?>
<div class="site-contact">
    <h1>Контакты</h1>

    <p>
        <?= \Yii::t('app', 'You can send us a message using this form. We will contact you in the nearest future.') ?>
    </p>


    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'data-description-show' => "true", 'data-description' => \Yii::t('app', 'Please enter your full name here.')]) ?>

            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'email')->textInput(['data-description-show' => "true", 'data-description' => \Yii::t('app', 'Please enter your valid email address to give us opportunity to send you a message.')]) ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'phone')
                        ->widget(MaskedInput::class, ['mask' => ['+9 (999) 999-99-99', '+99 (999) 999-99-99'],])
                        ->textInput([
                            'data-description-show' => "true",
                            'data-description' => \Yii::t('app', 'Please enter your valid phone number to give us opportunity to make you a call.')
                        ]);
                    ?>
                </div>
            </div>

            <?= $form->field($model, 'body')->textarea(['rows' => 6, 'data-description-show' => "true", 'data-description' => \Yii::t('app', 'Please put your message here.')]) ?>

            <div class="form-group">
                <?= Fprotector::checkScript('ContactForm'); ?>
                <?= Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
