<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\ckeditor\CKEditor;
$statusArray = ['0'=>'Inactive','1'=>'Active'];
/* @var $this yii\web\View */
/* @var $model backend\models\AlertMaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alert-master-form">

    <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            'id' => 'alert-message-form',
            'options' => ['enctype' => 'multipart/form-data'],
    ]); 

        if(!$model->isNewRecord) {
           echo $form->field($model, 'alert_type')->textInput(['maxlength' => true,'readonly'=>'readonly']) ;
        } else {
           echo $form->field($model, 'alert_type')->textInput(['maxlength' => true]) ;
        }
    ?>

    <?= $form->field($model, 'alert_msg')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'custom'
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList($statusArray , ['prompt' => 'Select Status']) ?>

     <div class="form-group" style="margin-left: 180px;margin-top:20px;">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btncreate' : 'btn btn-primary btnupdate']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-success btncancel']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
