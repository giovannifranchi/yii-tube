<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/** @var common\models\Video $model */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>


<div class="row">
    <div class="col-8 p-5">
        <div class="ratio ratio-16x9 mb-3">
            <video src="<?= $model->getVideoLink() ?>" title="<?= $model->video_name ?>" controls allowfullscreen poster="<?= $model->getThumbLink() ?>"></video>
        </div>
        <h4><?= $model->title ?></h4>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>views <?= $model->getViews()->count() ?> • <?= YII::$app->formatter->asDate($model->created_at) ?> </div>
            <div>
                <?php Pjax::begin() ?>
                <?= $this->render('_like_buttons', ['model' => $model]) ?>
                <?php Pjax::end() ?>
            </div>
        </div>
        <h5> <a href="<?= Url::to(['/channel/view', 'channel_id' => $model->created_by]) ?>"><?= $model->createdBy->username ?> </a></h5>
        <p><?= $model->description ?></p>
    </div>
    <div class="col-4 px-5 pt-5">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_similar_video',
            'options' => ['d-flex flex-column align-items-center'],
            'summary' => false
        ]) ?>
    </div>
</div>