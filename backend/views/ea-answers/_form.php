<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EaAnswers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ea-answers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ea_question_id')->textInput() ?>

    <?= $form->field($model, 'ea_id')->textInput() ?>

    <?= $form->field($model, 'response')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
