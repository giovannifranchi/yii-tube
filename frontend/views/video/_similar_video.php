<?php

/** @var common\models\Video $model */

use yii\helpers\Url;

?>

<div class="card ">
    <a href="<?= Url::to(['/video/view', 'video_id' => $model->video_id]) ?>">
        <div class="ratio ratio-16x9">
            <video src="<?= $model->getVideoLink() ?>" title="<?= $model->video_name ?>" allowfullscreen poster="<?= $model->getThumbLink() ?>"></video>
        </div>
    </a>
    <div class="card-body">
        <h6 class="card-title mb-0"><?= $model->title ?></h5>
    </div>
</div>