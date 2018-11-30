<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$statusArray = ['0'=>'Inactive','1'=>'Active'];

/* @var $this yii\web\View */
/* @var $model backend\models\SmsManagement */
/* @var $form yii\widgets\ActiveForm */
?>
<?php 
    if($status !='') { ?>
    <div class="alert alert-danger">
        <strong>Sorry!</strong><?php echo $status; ?>
    </div>
    <?php }
?>
<div class="sms-management-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sms_gateway_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sms_gateway_security')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sms_gateway_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sms_gateway_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList($statusArray, ['prompt' => 'Select Status']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
