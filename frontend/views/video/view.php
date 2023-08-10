<?php

/** @var common\models\Video $model */

?>


<div class="row">
    <div class="col-8 p-5">
        <div class="ratio ratio-16x9 mb-3">
            <video src="<?= $model->getVideoLink() ?>" title="<?= $model->video_name ?>" controls allowfullscreen poster="<?= $model->getThumbLink() ?>"></video>
        </div>
        <h4><?= $model->title ?></h4>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>views 123 • <?= YII::$app->formatter->asDate($model->created_at) ?> </div>
            <div>
                <button class="btn btn-sm btn-outline-secondary">
                    <i class="fa-solid fa-thumbs-up"></i> 9
                </button>
                <button class="btn btn-sm btn-outline-secondary">
                    <i class="fa-solid fa-thumbs-down"></i> 2
                </button>
            </div>
        </div>
        <h5> <a href=""><?= $model->createdBy->username ?> </a></h5>
        <p><?= $model->description ?></p>
    </div>
    <div class="col-4">
        other videos
    </div>
</div>