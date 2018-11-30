<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
$genderArray = [1=>'Male',2=>'Female'];
$this->title = 'Signup';
?>
<div class="clearfix"></div>
<div class="site-signup">
    <h1 class="mt-0"><?= Html::encode($this->title) ?></h1>
	<div class="clearfix"></div>
    <p class="mb-3">Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'form-signup',			
            'layout' => 'horizontal',
            'id' => 'site-signup-step-1',
            'options' => ['enctype' => 'multipart/form-data'],
			]); ?>
				
				<?php echo $form->field($model, 'user_role')->dropDownList($userRoleList,['prompt'=>'Select Role']);?>

                <?= $form->field($model, 'username')->textInput() ?>
                              
                <?= $form->field($model, 'first_name')->textInput() ?>
                <?= $form->field($model, 'middle_name')->textInput() ?>
                <?= $form->field($model, 'last_name')->textInput() ?>
				<?php echo $form->field($model, 'birth_date')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Enter birth date ...'],
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy',
                        'autoclose'=>true
                    ]
                ]);	 ?>
                <?= $form->field($model, 'age')->textInput(['readyonly'=>'readonly','disabled'=>'disabled']) ?>
                <?php echo $form->field($model, 'gender')->dropDownList(
                    $genderArray,
                    ['prompt'=>'Gender']
                    );?>
                <?= $form->field($model, 'home_address')->textInput() ?>

                <?= $form->field($model, 'email') ?>
				
				<?= $form->field($model, 'mobile_number')->textInput(['maxlength'=>10]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
				<?php //echo '<label class="control-label">Birth Date</label>';
//                 echo DatePicker::widget([
//                     'name' => 'birth_date',
//                     'type' => DatePicker::TYPE_COMPONENT_PREPEND,
//                     'value' => '23-Feb-1982',
//                     'pluginOptions' => [
//                         'autoclose'=>true,
//                         'format' => 'dd-M-yyyy'
//                     ]
//                 ]); ?>
                <div class="form-group">
					<label class="control-label col-sm-3"></label>
					<div class="col-sm-6">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
					</div>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php $js = " 
$('#signupform-birth_date').on('blur',function(){
     dob = $('#signupform-birth_date').val();
     dob = dob.split('-');
     dob = dob[1]+'-'+dob[0]+'-'+dob[2];
     dob = new Date(dob);
     var today = new Date();
     var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
	 if(isNaN(age) == false) { 
		$('#signupform-age').val(age);
	}
 });";
$this->registerJs($js);
?>