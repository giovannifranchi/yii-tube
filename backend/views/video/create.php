<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Video $model */

$this->title = 'Create Video';
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-create">

    <h1 class="mb-5"><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'd-flex justify-content-center align-items-center',
        'enctype'=>'multipart/form-data'
        ]
    ]);?>

        <div class="icon-wrap">
            <i class="fa-solid fa-upload mb-5"></i>
            <p class="text-center">Start uploadind your favorite moments of enterntainement</p>
            <p class="text-muted text-center">Your easy way to connet with the world</p>
            <button  class="btn btn-primary btn-file">
            Select File
            <input type="file" id="video_file" name="video">
        </button>

        </div>

    <?php ActiveForm::end() ?>



</div>
