<?php

use yii\helpers\Url;

class HomeCest
{
    public function ensureThatHomePageWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/'));
        $I->see('Главная страница');

        $I->seeLink('Контакты');
        $I->seeLink('Новости');
        $I->seeLink('Текстовый раздел');

    }
}
