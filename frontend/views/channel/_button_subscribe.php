<?php


/** @var common\models\User $model */

use yii\helpers\Url;
use yii\widgets\Pjax;

?>

<?php if ($model->id === Yii::$app->user->id) : ?>

    <h3 class="text-danger mt-3">
        <strong>You have <?= $model->getSubscribers()->count() ?> Subscribers</strong>
    </h3>

<?php else : ?>

    <?php Pjax::begin() ?>
    <a href="<?= Url::to(['/channel/subscribe', 'channel_id' => $model->id]) ?>"
    class="btn btn-sm mt-3 <?= $model->isSubscribedBy(Yii::$app->user->id) ? 'btn-outline-secondary' : 'btn-danger' ?>"
    data-method="post" data-pjax="1">
        <?= $model->isSubscribedBy(Yii::$app->user->id) ? 'Unsubscribe' : 'Subscribe' ?> 
        <?= $model->getSubscribers()->count() ?>
        <i class="fa-solid fa-bell"></i>
    </a>
    <?php Pjax::end() ?>

<?php endif; ?>