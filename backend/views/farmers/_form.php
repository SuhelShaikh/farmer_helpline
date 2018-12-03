<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Farmers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="farmers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'farmer_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'farmer_mname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'farmer_lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alt_mobile_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'whatsapp_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'village')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taluka')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cretaed_by')->textInput() ?>

    <?= $form->field($model, 'cretaed_at')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
