<?php

use common\models\Video;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var common\models\Video  $model */

$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'video',
                'content' => function($model){
                   return $this->render('_video_item', ['model' => $model]);
                }
            ],

            [
                'attribute' => 'status',
                'content' => function($model){
                    return $model->getStatusLabels()[$model->status];
                }
            ],
            // 'tags',
            //'hasThumbnail',
            //'description:ntext',
            //'created_by',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'class' => ActionColumn::class,
                'buttons' => [
                    'delete' => function($url){
                        return Html::a('<i class="fa-solid fa-trash"></i>', $url, [
                            'data-method' => 'post',
                            'data-confirm' => 'Are you sure you want to delete this video?'
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
