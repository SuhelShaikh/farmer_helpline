<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Crops */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="crops-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'crop_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'crop_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
