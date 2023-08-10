<?php

use yii\helpers\Url;

/** @var common\models\Video $model */
?>



<a href="<?php echo Url::to(['/video/like', 'video_id' => $model->video_id]) ?>" 
class="btn btn-sm btn-outline-<?= $model->getIsLikedBy(Yii::$app->user->id, $model->video_id) ? 'primary' : 'secondary' ?>" 
data-method="post" 
data-pjax="1">
    <i class="fas fa-thumbs-up"></i> <?= $model->getPositiveLikes() ?>
</a>
<a href="<?php echo Url::to(['/video/dislike', 'video_id' => $model->video_id]) ?>" 
class="btn btn-sm btn-outline-<?= $model->getIsDislikedBy(Yii::$app->user->id, $model->video_id) ? 'primary' : 'secondary' ?>" 
data-method="post" 
data-pjax="1">
    <i class="fas fa-thumbs-down"></i> <?= $model->getNegativeLikes() ?>
</a>