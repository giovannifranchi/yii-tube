<?php

use yii\helpers\Url;

/** @var common\models\Video $video */
?>



<a href="<?php echo Url::to(['/video/like', 'video_id' => $model->video_id]) ?>" class="btn btn-sm" data-method="post" data-pjax="1">
    <i class="fas fa-thumbs-up"></i> 8
</a>
<a href="<?php echo Url::to(['/video/dislike', 'video_id' => $model->video_id]) ?>" class="btn btn-sm" data-method="post" data-pjax="1">
    <i class="fas fa-thumbs-down"></i> 9
</a>