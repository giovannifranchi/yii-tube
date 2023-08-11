<?php

use frontend\assets\ChannelAsset;
use yii\widgets\ListView;

ChannelAsset::register($this);

/** @var common\models\User $model */
/** @var yii\data\ActiveDataProvider $dataProvider */
?>


<div class="jumbotron d-flex align-items-center justify-content-center">
    <h1 class="text-decoration-underline"><?= $model->username ?></h1>
</div>

<div class="container">
<?=

ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_video_item',
    'options' => ['class' => 'row gy-5'],
    'itemOptions' => ['class' => 'col-sm-4 h-100'],
    'summary' => false
]);

?>
</div>