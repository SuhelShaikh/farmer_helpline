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
            <?php $form = ActiveForm::begin([
				'layout' => 'horizontal',
				'id' => 'form-farmer-signup',
				'options' => ['enctype' => 'multipart/form-data'],
				]); ?>
				
				<?php //echo $form->field($model, 'user_role')->dropDownList($userRoleList,['prompt'=>'Select Role']);?>

                
              <?php if($userRole == 1) { echo $form->field($model, 'assign_users')->widget(Select2::classname(), [
                  'data' => $users,
                    'options' => ['placeholder' => 'Select a User to Assign ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
              ]); } ?>
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
                <?= $form->field($model, 'age')->textInput() ?>
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

<?php /*$js = "
    $(document).ready(function(){
        $('.field-signupform-birth_date').hide();
        $('.field-signupform-assign_users').hide();
        $('.field-signupform-age').hide();   
        $('.field-signupform-gender').hide();
        $('.field-signupform-home_address').hide();
        if($('#signupform-user_role').val() == 6) {
            $('.field-signupform-birth_date').show();
            $('.field-signupform-age').show();   
            $('.field-signupform-gender').show();
            $('.field-signupform-home_address').show();   
            $('.field-signupform-assign_users').show();
        }
    });
    $('.field-signupform-birth_date').hide();
    $('.field-signupform-age').hide();   
    $('.field-signupform-gender').hide();
    $('.field-signupform-home_address').hide();
    $('#signupform-user_role').change(function(){
		if($(this).val() == 6) {
            $('.field-signupform-birth_date').show();
            $('.field-signupform-age').show();   
            $('.field-signupform-gender').show();
            $('.field-signupform-home_address').show();  
            $('.field-signupform-assign_users').show();    
        } else {
            $('.field-signupform-birth_date').hide();
            $('.field-signupform-age').hide();   
            $('.field-signupform-gender').hide();
            $('.field-signupform-home_address').hide();
            $('.field-signupform-assign_users').hide();
        }
	});";
$this->registerJs($js);*/
?>