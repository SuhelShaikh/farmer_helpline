<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserRelation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-relation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ea_id')->textInput() ?>

    <?= $form->field($model, 'farmer_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
