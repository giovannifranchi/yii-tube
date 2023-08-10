<?php
/** @var yii\data\ActiveDataProvider $dataProvider */

use yii\widgets\ListView;

?>

<?=

ListView::widget([
    'dataProvider' => $dataProvider
]);

?>