<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$path = '/farmer_helpline/backend/web/uploads/user/photo/';
/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">	
		<div class="row">
			<div class="col-md-12">
				<div class="small-12 medium-2 large-2 columns">
					<div class="upload-img-wrap mlr-auto">
						<div class="circle img-pos-upload bg-white">
						<!-- User Profile Image -->
						
						<img class="profile-pic" src="<?php echo $path.$model->image; ?>">
					   <!-- Default Image -->
					   <!-- <i class="fa fa-user fa-5x"></i> -->
						</div>
						<div class="p-image btn-upload-pic">
							<i class="fa fa-camera upload-button"></i>
							<?= $form->field($model, 'imageTemp')->fileInput([]) ?>
							<!--<input class="file-upload" type="file" accept="image/*"/ name="SignupForm[image]" style="visibility: hidden;margin-left: 154px;">-->
						</div>
					</div>	
				</div>
			</div>	
		</div>	
		<div class="clearfix">&nbsp;</div>
		<div class="row">
			<div class="col-md-6">
				<?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
			</div>
			<div class="col-md-6">
				<?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>
			</div>
			<div class="col-md-6">
				<?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
			</div>
		
			<div class="col-md-6">
				<?= $form->field($model, 'email')->textInput(['maxlength' => true,'readonly'=>'readonly']) ?>
			</div>
			<div class="col-md-6">
				<?= $form->field($model, 'mobile_number')->textInput(['maxlength' => true]) ?>
			</div>
		
			<div class="col-md-6">
				<?= $form->field($model, 'username')->textInput(['maxlength' => true,'readonly'=>'readonly']) ?>
			</div>
			<div class="col-md-6">
				<?= $form->field($model, 'birth_date')->textInput(['maxlength' => true,'readonly'=>'readonly']) ?>
			</div>
		
			<div class="col-md-6">
				<?= $form->field($model, 'age')->textInput(['readonly'=>'readonly']) ?>
			</div>
			<div class="col-md-6">
				<?= $form->field($model, 'gender')->dropDownList([ 1 => 'Male', 0 => 'Female', ], ['prompt' => '']) ?>
			</div>
		</div>
		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			<?= Html::a('Cancel', ['index'], ['class' => 'btn btn-secondary btncancel']) ?>
		</div>
	</div>	
</div>	

    <?php ActiveForm::end(); ?>

</div>
<?php 
    $js = "
	 $(document).ready(function() {
	$('#user-imagetemp').css('visibility','hidden');
	var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $('#user-imagetemp').on('change', function(){
        readURL(this);
    });
    
    $('.upload-button').on('click', function() {
       $('#user-imagetemp').click();
    });
});";
$this->registerJs($js);
?>
