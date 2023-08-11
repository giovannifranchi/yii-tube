<?php

use frontend\assets\ChannelAsset;
use yii\widgets\ListView;

ChannelAsset::register($this);

/** @var common\models\User $model */
/** @var yii\data\ActiveDataProvider $dataProvider */
?>


<div class="jumbotron d-flex flex-column justify-content-center px-3">
    <h1 class="mb-0"><?= $model->username ?></h1>
    <hr class="w-100 m-0" style="border-width: medium;">
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