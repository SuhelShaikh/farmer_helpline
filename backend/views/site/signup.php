<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
$genderArray = [1=>'Male',2=>'Female'];
$this->title = 'User Details';
?>
<div class="site-signup">
    <h1 style="font-family: 'Fredoka One', cursive;"><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>
	<?php $form = ActiveForm::begin(['id' => 'form-user-signup','options' => ['enctype' => 'multipart/form-data']]); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="small-12 medium-2 large-2 columns">
				<div class="circle">
				<!-- User Profile Image -->
				
				<img class="profile-pic" src="">
			   <!-- Default Image -->
			   <!-- <i class="fa fa-user fa-5x"></i> -->
				</div>
				<div class="p-image" style="top: 91px;margin-left: 107px;">
					<i class="fa fa-camera upload-button"></i>
					<?= $form->field($model, 'image')->fileInput([]) ?>
					<!--<input class="file-upload" type="file" accept="image/*"/ name="SignupForm[image]" style="visibility: hidden;margin-left: 154px;">-->
				</div>
			</div>
		</div>
	</div>	
	<div class="row" style="margin-top:50px;">
		<div class="col-md-4">
			<?php echo $form->field($model, 'user_role')->dropDownList($userRoleList,['prompt'=>'Select Role']);?>
		</div>	
	</div>
    <div class="row">
        <div class="col-lg-4">
			<?= $form->field($model, 'first_name')->textInput() ?>
		</div>
		<div class="col-lg-4">
			<?= $form->field($model, 'middle_name')->textInput() ?>
		</div>
		<div class="col-lg-4">
			 <?= $form->field($model, 'last_name')->textInput() ?>
		</div>
	</div>	
	<div class="row">
		<div class="col-lg-6">
			<?= $form->field($model, 'email') ?>
		</div>
		<div class="col-lg-6">
			<?= $form->field($model, 'mobile_number')->textInput(['maxlength'=>10]) ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<?= $form->field($model, 'username') ?>
		</div>
		<div class="col-lg-6">
		     <?= $form->field($model, 'password')->passwordInput() ?>
		</div>
	</div>
	<div class="row">
        <div class="col-lg-4">
			 <?php echo $form->field($model, 'birth_date')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Enter birth date ...'],
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy',
                        'autoclose'=>true
                    ]
                ]);	 ?>
		</div>
		<div class="col-lg-4">
			<?= $form->field($model, 'age')->textInput(['readonly'=>'readonly']) ?>
		</div>
		<div class="col-lg-4">
			 <?php echo $form->field($model, 'gender')->dropDownList(
                    $genderArray,
                    ['prompt'=>'Gender']
            );?>
		</div>
	</div>	
               
                <!--?= $form->field($model, 'home_address')->textInput() ?-->


                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php $js = "     $('#signupform-birth_date').on('blur',function(){
     dob = $('#signupform-birth_date').val();
     dob = dob.split('-');
     dob = dob[1]+'-'+dob[0]+'-'+dob[2];
    dob = new Date(dob);
     var today = new Date();
     var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
	 if(isNaN(age) == false) {
		$('#signupform-age').val(age);
		}
 });
 
 $(document).ready(function() {
$('#signupform-image').css('visibility','hidden');
    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $('#signupform-image').on('change', function(){
        readURL(this);
    });
    
    $('.upload-button').on('click', function() {
       $('#signupform-image').click();
    });
});";
$this->registerJs($js);
?>