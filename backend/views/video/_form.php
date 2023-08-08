<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm as Bootstrap5ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Video $model */
?>

<div class="video-form">

    <?php $form = Bootstrap5ActiveForm::begin(); ?>

    <?= $form->field($model, 'video_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thumbnail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'hasThumbnail')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php Bootstrap5ActiveForm::end(); ?>

</div>
