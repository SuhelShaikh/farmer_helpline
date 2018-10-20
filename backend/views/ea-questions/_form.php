<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\arrayHelper;
use backend\models\User;
/* @var $this yii\web\View */
/* @var $model backend\models\EaQuestions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ea-questions-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'user_id')->hiddenInput()->label(false) ?>

	<?= $form->field($model, 'question')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
