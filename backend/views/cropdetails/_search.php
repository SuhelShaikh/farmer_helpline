<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CropDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="crop-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'crop_id') ?>

    <?= $form->field($model, 'farmer_id') ?>

    <?= $form->field($model, 'crop_name') ?>

    <?= $form->field($model, 'crop_type') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
