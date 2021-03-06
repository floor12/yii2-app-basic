<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AppAsset;
use floor12\adminWidget\AdminWidget;
use floor12\banner\widgets\PopupWidget;
use floor12\pages\components\Breadcrumbs;
use floor12\pages\components\DropdownMenuWidget;
use floor12\pages\components\MobileMenuWidget;
use floor12\pages\components\SideMenuWidget;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?= AdminWidget::widget([]) ?>
<?php PopupWidget::widget([]) ?>

<div id="mobile-menu">
    <?= MobileMenuWidget::widget(['parent_id' => 0, 'model' => isset($this->params['currentPage']) ? $this->params['currentPage'] : NULL]) ?>
</div>


<div class="wrap">

    <div class="top-menu">
        <div class="container">
            <?= DropdownMenuWidget::widget(['parent_id' => 0]) ?>

            <?php if (Yii::$app->user->isGuest)
                echo Html::a('Вход', ['/user/frontend/login'], ['class' => 'pull-right']);
            else
                echo Html::a('Выйти', ['/user/frontend/logout'], ['class' => 'pull-right']);
            ?>

        </div>
    </div>

    <div class="container main">
        <aside>
            <?= SideMenuWidget::widget([]) ?>
        </aside>
        <main>
            <?= (Yii::$app->request->url != '/') ? Breadcrumbs::widget(['items' => !empty($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) : NULL; ?>
            <?= $content ?>
        </main>

    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
