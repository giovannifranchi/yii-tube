<?php

/** @var common\models\Video $model */

?>


<div class="row">
    <div class="col-8 p-5">
        <div class="ratio ratio-16x9 mb-3">
            <video src="<?= $model->getVideoLink() ?>" title="<?= $model->video_name ?>" controls allowfullscreen poster="<?= $model->getThumbLink() ?>"></video>
        </div>
        <h4><?= $model->title ?></h4>
        <h5> <a href=""><?= $model->createdBy->username ?> </a></h5>
        <p>views 123 • <?= YII::$app->formatter->asRelativeTime($model->created_at) ?> </p>
    </div>
    <div class="col-4">
        other videos
    </div>
</div>