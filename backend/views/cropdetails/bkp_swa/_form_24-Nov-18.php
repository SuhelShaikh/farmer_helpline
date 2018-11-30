<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CropDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="crop-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'crop_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'crop_type')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
