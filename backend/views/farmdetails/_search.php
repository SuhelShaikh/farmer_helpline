<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FarmDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="farm-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'farm_id') ?>

    <?= $form->field($model, 'farm_name') ?>

    <?= $form->field($model, 'elevation_farm_location') ?>

    <?= $form->field($model, 'village') ?>

    <?= $form->field($model, 'mandal') ?>

    <?php // echo $form->field($model, 'district') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'survey_number') ?>

    <?php // echo $form->field($model, 'total_area') ?>

    <?php // echo $form->field($model, 'area_unit') ?>

    <?php // echo $form->field($model, 'area_of_plot') ?>

    <?php // echo $form->field($model, 'farmer_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
