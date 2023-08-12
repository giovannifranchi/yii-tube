<?php

use yii\widgets\ListView;

/** @var yii\data\ActiveDataProvider $dataProvider */
?>

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_video_item',
    'options' => ['class' => 'row gy-5'],
    'itemOptions' => ['class' => 'col-sm-4 h-100'],
    'summary' => false
]); ?>