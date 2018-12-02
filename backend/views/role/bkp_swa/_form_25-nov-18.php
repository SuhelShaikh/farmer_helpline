<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$statusArray = ['0'=>'Inactive','1'=>'Active'];
/* @var $this yii\web\View */
/* @var $model backend\models\Role */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="role-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'role_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList($statusArray , ['prompt' => 'Select Status']) ?>
		<?php foreach($modulesData as $modules) { ?>
					<input type="checkbox" name="modules[]" value="<?php echo $modules->modules_id; ?>"><?php echo $modules->module_name; ?>		<?php } ?>
		<div class="row">
			<div class="col-md-4">
				<span style="color:red;"><?php echo ($assignModuleListError!=='') ? $assignModuleListError:''; ?></span>
			</div>
		</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
