<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SmsManagementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sms-management-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sms_mng_id') ?>

    <?= $form->field($model, 'sms_gateway_name') ?>

    <?= $form->field($model, 'sms_gateway_security') ?>

    <?= $form->field($model, 'sms_gateway_key') ?>

    <?= $form->field($model, 'sms_gateway_url') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_on') ?>

    <?php // echo $form->field($model, 'updated_on') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
