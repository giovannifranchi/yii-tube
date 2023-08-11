<?php

/** @var common\models\Video $model */

use yii\helpers\Url;

?>

<div class="card h-100">
    <a href="<?= Url::to(['/video/view', 'video_id' => $model->video_id]) ?>">
        <div class="ratio ratio-16x9">
            <video src="<?= $model->getVideoLink() ?>" title="<?= $model->video_name ?>" allowfullscreen poster="<?= $model->getThumbLink() ?>"></video>
        </div>
    </a>
    <div class="card-body">
        <h5 class="card-title"><?= $model->title ?></h5>
        <a href="<?= Url::to(['/channel/view', 'channel_id' => $model->created_by]) ?>" class="text-decoration-none"><?= $model->createdBy->username ?></a>
        <p class="card-text">
            views <?= $model->getViews()->count() ?> • <?= YII::$app->formatter->asRelativeTime($model->created_at) ?>
        </p>
    </div>
</div>