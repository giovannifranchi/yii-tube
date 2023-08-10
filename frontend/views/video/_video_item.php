<?php

/** @var common\models\Video $model */

use yii\helpers\Url;

?>

<div class="card h-100">
    <a href="<?= Url::to(['video/update', 'video_id' => $model->video_id]) ?>">
        <div class="ratio ratio-16x9">
            <video src="<?= $model->getVideoLink() ?>" title="<?= $model->video_name ?>" allowfullscreen poster="<?= $model->getThumbLink() ?>"></video>
        </div>
    </a>
    <div class="card-body">
        <h5 class="card-title"><?= $model->title ?></h5>
        <a href="#" class="text-decoration-none"><?= $model->createdBy->username ?></a>
        <p class="card-text">
            views 123 • <?= YII::$app->formatter->asRelativeTime($model->created_at) ?>
        </p>
    </div>
</div>