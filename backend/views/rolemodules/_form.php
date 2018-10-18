<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RoleModules */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="role-modules-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'module_id')->textInput() ?>

    <?= $form->field($model, 'role_id')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
