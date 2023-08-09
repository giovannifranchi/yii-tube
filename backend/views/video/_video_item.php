<?php

use yii\helpers\Url;
use yii\helpers\StringHelper;


/** @var common\models\Video  $model */
?>

<div class="media">
    <a href="<?= Url::to(['video/update', 'video_id' => $model->video_id]) ?>">

        <div class="ratio ratio-16x9 mb-3">
            <video src="<?= $model->getVideoLink() ?>" title="<?= $model->video_name ?>" allowfullscreen poster="<?= $model->getThumbLink() ?>"></video>
        </div>
    </a>
    <div class="media-body">
        <h6 class="mt-0"><?php echo $model->title ?></h6>
        <?= StringHelper::truncateWords($model->description, 10) ?>
    </div>
</div>
