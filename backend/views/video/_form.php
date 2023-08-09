<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm as Bootstrap5ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Video $model */
?>

<div class="video-form">

    <?php $form = Bootstrap5ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php Bootstrap5ActiveForm::end(); ?>

</div>
