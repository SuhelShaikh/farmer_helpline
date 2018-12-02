<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
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
<div class="clearfix"></div>
<div class="sms-management-form mt-3">

    <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            'id' => 'sms-management-form',
            'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'sms_gateway_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sms_gateway_security')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sms_gateway_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sms_gateway_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList($statusArray, ['prompt' => 'Select Status']) ?>

    <div class="form-group">
		<label class="control-label col-sm-3"></label>
		<div class="col-sm-6">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?></div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
