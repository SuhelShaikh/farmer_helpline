<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\FarmerCallDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="farmer-call-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'farmer_id') ?>

    <?= $form->field($model, 'executive_id') ?>

    <?= $form->field($model, 'call_duration') ?>

    <?= $form->field($model, 'call_date_time') ?>

    <?php // echo $form->field($model, 'call_response') ?>

    <?php // echo $form->field($model, 'call_remark') ?>

    <?php // echo $form->field($model, 'question') ?>

    <?php // echo $form->field($model, 'answer') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
