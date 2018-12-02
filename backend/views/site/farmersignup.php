<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use budyaga\cropper\Widget;
use yii\helpers\Url;
$genderArray = [1=>'Male',2=>'Female'];
$this->title = 'Farmer Details';
?>

<div class="site-signup">
    <h1 style="font-family: 'Fredoka One', cursive;"><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>
<div class="progress-steps">
    <div class="wizard">
        <div class="wizard-inner">
            <div class="connecting-line"></div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="javascript:void(0)" data-toggle="tab" aria-controls="step1" role="tab" title="Farmer Detail">
                        <span class="round-tab">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                    </a>
                </li>

                <li role="presentation" class="disabled" onclick="return false">
                    <a href="javascript:void(0)" data-toggle="tab" aria-controls="step2" role="tab" title="Farm Detail" disabled>
                        <span class="round-tab">
                            <i class="glyphicon glyphicon-list-alt"></i>
                        </span>
                    </a>
                </li>
                <li role="presentation"  class="disabled" onclick="return false">
                    <a href="javascript:void(0)" data-toggle="tab" aria-controls="complete" role="tab" title="Crop Detail" disabled>
                        <span class="round-tab">
                            <i class="glyphicon glyphicon-grain"></i>
                        </span>
                    </a>
                </li>
            </ul>
        </div></div>
</div>
<div class="clearfix">&nbsp;</div>

    <div class="row">
		<div class="col-lg-3"></div>
        <div class="col-lg-6">
            <?php $form = ActiveForm::begin(['id' => 'form-farmer-signup','options' => [
        'enctype' => 'multipart/form-data',
    ],]); ?>
				
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
                <?= $form->field($model, 'age')->textInput(['readonly'=>'readonly']) ?>
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
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
        <!--<div class="col-lg-5">
        	<div class="col-md-6">-->
            <?php /*$form = ActiveForm::begin(['id' => 'form-profile']); 
            echo $form->field($model, 'image')->widget(Widget::className(), [
                'noPhotoImage'=>$model->image,
                'uploadUrl' => Url::toRoute('/user/uploadphoto'),
                'width'=>100,
                'height'=>100,
                ]) */
            ?>
        <?php //ActiveForm::end(); ?>
        <!--</div>-->
    </div>
</div>

<?php $js = "
 var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $('.file-upload').on('change', function(){
        readURL(this);
    });
    
    $('.upload-button').on('click', function() {
       $('.file-upload').click();
    });
//    $('.datepicker').datepicker().on(changeDate, function(e) {
//         console.log('sd');
//         // `e` here contains the extra attributes
//     });
     $('#farmersignupform-birth_date').on('blur',function(){
     dob = $('#farmersignupform-birth_date').val();
     dob = dob.split('-');
     dob = dob[1]+'-'+dob[0]+'-'+dob[2];
     dob = new Date(dob);
     var today = new Date();
     var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
	 if(isNaN(age) == false) {
		$('#farmersignupform-age').val(age);
		}
 });
";

$this->registerJs($js);
?>