<?php

namespace app\models\form;

use floor12\phone\PhoneValidator;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $body;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'email', 'body', 'phone'], 'required'],
            ['email', 'email'],
            ['phone', PhoneValidator::class]
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'body' => Yii::t('app', 'Body'),
        ];
    }

    public function sendEmail()
    {

        // Благодарим пользователя

        Yii::$app
            ->mailer
            ->compose(
                ['html' => 'contact-thanks'],
                ['model' => $this]
            )
            ->setFrom([Yii::$app->params['no-replayEmail'] => Yii::$app->params['no-replayName']])
            ->setTo($this->email)
            ->setSubject(Yii::t('app', 'Thank you for contact us'))
            ->send();


        Yii::$app
            ->mailer
            ->compose(
                ['html' => 'contact'],
                ['model' => $this]
            )
            ->setFrom([Yii::$app->params['no-replayEmail'] => Yii::$app->params['no-replayName']])
            ->setTo(Yii::$app->params['adminEmail'])
            ->setSubject(Yii::t('app', 'New message from contact form'))
            ->send();

        return true;

    }
}
