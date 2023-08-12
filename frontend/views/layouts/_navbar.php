<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

?>
<header>
    <?php

    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-light bg-light shadow py-4',
        ],
    ]);
    ?>

    <form class="d-flex" action="<?= Url::toRoute(['/video/search']) ?>" method="get">
        <!-- I needed to add the hidden value because yii has troubles managing that with url manager disabled -->
        <input type="hidden" name="r" value="video/search">
        <input class="form-control me-2" type="search" placeholder="Search" name="keyword" value="<?= Yii::$app->request->get('keyword') ?>">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>



    <?php
    $menuItems = [

    ];

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);
    if (Yii::$app->user->isGuest) {
        echo Html::tag('div', Html::a('Login', ['/site/login'], ['class' => ['btn btn-link login text-decoration-none']]), ['class' => ['d-flex w-auto']]);
        echo Html::tag('div', Html::a('SignUp', ['/site/signup'], ['class' => ['btn btn-link login text-decoration-none']]), ['class' => ['d-flex w-auto']]);
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex w-auto'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            )
            . Html::endForm();
    }
    NavBar::end();
    ?>
</header>