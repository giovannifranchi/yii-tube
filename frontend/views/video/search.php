<?php

/** @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = 'Search videos | '. Yii::$app->name;
?>
<h1>Found videos</h1>
<?php echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_video_item',
    'options' => ['class' => 'row gy-5'],
    'itemOptions' => [
        'class' => 'col-sm-4 h-100'
    ]
]) ?>