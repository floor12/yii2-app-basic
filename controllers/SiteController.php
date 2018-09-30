<?php

namespace app\controllers;

use app\logic\SitemapLinks;
use app\models\form\ContactForm;
use floor12\fprotector\Fprotector;
use floor12\pages\components\SitemapWidget;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;


class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            Fprotector::check('ContactForm');

            if ($model->sendEmail()) {
                return $this->render("info", [
                    'h1' => Yii::t('app', 'Thank you for letter'), '
                    text' => Yii::t('app', 'We will contact you soon.')
                ]);
            } else {
                throw new BadRequestHttpException("Error with sending email...");
            }
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /** build sitemap
     * @return string
     */
    public function actionSitemap()
    {
        return SitemapWidget::widget(['links' => Yii::createObject(SitemapLinks::class, [])->execute()]);
    }


}
