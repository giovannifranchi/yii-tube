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

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <div class="col-sm-4">
        <h3>Video</h3>
        <div class="ratio ratio-16x9 mb-4">
            <video src="<?= $model->getVideoLink() ?>" title="<?= $model->video_name ?>" allowfullscreen controls></video>
        </div>

        <h4 class="text-muted">Video Link</h4>
        <h5 ><a href="<?= $model->getVideoLink() ?>" class="text-decoration-none">Open Link</a></h5>
        <h4 class="text-muted">Video Name</h4>
        <h5 class="mb-3"><?= $model->video_name ?></h5>
        <h4 class="text-muted">Uploaded At</h4>
        <h5 ><?= Yii::$app->formatter->asDatetime($model->created_at) ?></h5>

        <?= $form->field($model, 'status')->Html::dropDownList($name, $selection = null, $items = [], $options = []) ?>


    </div>

    <?php Bootstrap5ActiveForm::end(); ?>

</div>