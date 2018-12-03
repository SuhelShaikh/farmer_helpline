<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FarmersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="farmers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'farmer_fname') ?>

    <?= $form->field($model, 'farmer_mname') ?>

    <?= $form->field($model, 'farmer_lname') ?>

    <?= $form->field($model, 'mobile_no') ?>

    <?php // echo $form->field($model, 'alt_mobile_no') ?>

    <?php // echo $form->field($model, 'whatsapp_no') ?>

    <?php // echo $form->field($model, 'village') ?>

    <?php // echo $form->field($model, 'taluka') ?>

    <?php // echo $form->field($model, 'district') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'cretaed_by') ?>

    <?php // echo $form->field($model, 'cretaed_at') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
