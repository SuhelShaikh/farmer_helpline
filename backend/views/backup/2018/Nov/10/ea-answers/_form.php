<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\arrayHelper;
use backend\models\User;
/* @var $this yii\web\View */
/* @var $model backend\models\EaAnswers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ea-answers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ea_question_id')->textInput() ?>

    <?= $form->field($model, 'ea_id')->dropDownList(
		arrayHelper::map(User::find()->all(),'id','username'),
		['prompt'=>"Select User"]
		) ?>

	<?= $form->field($model, 'response')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
