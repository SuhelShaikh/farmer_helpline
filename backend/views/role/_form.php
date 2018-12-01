<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

$statusArray = ['0'=>'Inactive','1'=>'Active'];
/* @var $this yii\web\View */
/* @var $model backend\models\Role */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="clearfix mt-3"></div>
<div class="role-form">
    <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            'id' => 'role-form',
            'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'role_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList($statusArray , ['prompt' => 'Select Status']) ?>
	<div class="form-group">
		<label class="control-label col-sm-3"></label>
		<div class="col-sm-6">	
		<?php foreach($modulesData as $modules) { ?>
			<div class="form-check">
				<label class="ckeckbox-wrapper"><input type="checkbox" name="modules[]" value="<?php echo $modules->modules_id; ?>">
				<!--<span class="label-text"></span>-->
				<?php echo $modules->module_name; ?></label>
			</div>	
		<?php } ?>
		</div>
	</div>
	<div class="form-group mb-0">
		<label class="control-label col-sm-3"></label>
		<div class="col-sm-6">	
			<span style="color:red;"><?php echo ($assignModuleListError!=='') ? $assignModuleListError:''; ?></span>
		</div>
	</div>
    <div class="form-group">
		<label class="control-label col-sm-3"></label>
		<div class="col-sm-6">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>