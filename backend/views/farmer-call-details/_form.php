<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\FarmerCallDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="farmer-call-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'farmer_id')->textInput() ?>

    <?= $form->field($model, 'executive_id')->textInput() ?>

    <?= $form->field($model, 'call_duration')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'call_date_time')->textInput() ?>

    <?= $form->field($model, 'call_response')->textInput() ?>

    <?= $form->field($model, 'call_remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'question')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'answer')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
