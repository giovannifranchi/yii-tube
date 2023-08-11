<?php


/** @var common\models\User $model */

use yii\helpers\Url;
use yii\widgets\Pjax;

?>

<?php if ($model->id === Yii::$app->user->id) : ?>

    <a href="<?= Url::to(['/channel/subscribe', 'channel_id' => $model->id]) ?>" class="btn btn-danger btn-sm mt-3"> 
        this is your profile
    </a>

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