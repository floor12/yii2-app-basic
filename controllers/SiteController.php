<?php

namespace app\controllers;

use app\logic\SitemapLinks;
use floor12\pages\components\SitemapWidget;
use Yii;
use yii\base\InvalidConfigException;
use yii\web\Controller;


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
     * @return string
     * @throws InvalidConfigException
     */
    public function actionSitemap()
    {
        return SitemapWidget::widget(['links' => Yii::createObject(SitemapLinks::class, [])->execute()]);
    }


}
