<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm as Bootstrap5ActiveForm;
use yii\bootstrap5\Dropdown;

/** @var yii\web\View $this */
/** @var common\models\Video $model */
?>

<div class="video-form">

    <?php $form = Bootstrap5ActiveForm::begin([
        'options' => ['class' => 'row']
    ]); ?>

    <div class="col-sm-8">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status')->textInput() ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <div class="col-sm-4">
        <h3>Video</h3>
        <div class="ratio ratio-16x9">
            <video src="<?= $model->getVideoLink() ?>" title="<?= $model->video_name ?>" allowfullscreen controls></video>
        </div>

        <a href="<?= $model->getVideoLink() ?>" class="btn btn-primary">Open Video</a>
        <h5>Video Name</h5>
        <h6><?= $model->video_name ?></h6>
        <h5 class="text-muted">Uploaded At</h5>
        <h6 class="text-muted"><?= Yii::$app->formatter->asDatetime($model->created_at) ?></h6>



    </div>

    <?php Bootstrap5ActiveForm::end(); ?>

</div>