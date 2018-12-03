<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use kartik\widgets\Select2;
use kartik\select2\Select2;
//use kartik\widgets\DatePicker;
use kartik\date\DatePicker;
use backend\models\TblLocations;
use backend\models\User;
use yii\helpers\ArrayHelper;
use	yii\helpers\Url;
$this->title = 'Add New Farmer';

$states=ArrayHelper::map(TblLocations::find()->where(['status'=>10])->orderBy('name')->all(), 'id', 'name');
$tagTo=ArrayHelper::map(User::find()->orderBy('username')->all(), 'id', 'username');
//$type=Yii::$app->user->identity->type;
?>
<!-- Main content -->
  <section class="content-header">
      <h1>
        Add New Farmer
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><?php echo Html::a("<i class='fa fa-dashboard'></i> Home", ['main/admin-dashboard']); ?></li>
        <li><?php echo Html::a("Manage Farmers", ['farmers/index']); ?></li>
        <li class="active">Add New Farmer</li>
      </ol>
  </section>
  <hr />
  <section class="content">
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel-group" id="accordion">
			    <div class="panel panel-default">
			      <div class="panel-heading">
			        <h4 class="panel-title">
			          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Personal Details</a>
			        </h4>
			      </div>
			      <div id="collapse1" class="panel-collapse collapse in">
			        <div class="panel-body">
			        	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
					      <div class="row">
					        <div class="col-sm-2">
					           <b>First Name: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php echo $form->field($model, 'f_name')->textInput(['class'=>'form-control','placeholder'=>'First Name'])->label(false); ?>
					        </div>
					        <div class="col-sm-2">
					           <b>Middle Name: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php echo $form->field($model, 'm_name')->textInput(['class'=>'form-control','placeholder'=>'Middle Name'])->label(false); ?>
					        </div>
					      </div>
					      <div class="row">
					        <div class="col-sm-2">
					           <b>Last Name: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php echo $form->field($model, 'l_name')->textInput(['class'=>'form-control','placeholder'=>'Last Name'])->label(false); ?>
					        </div>
					        <div class="col-sm-2">
					           <b>Photo: </b>
					        </div>
					        <div class="col-sm-4">
					          <?= $form->field($model, 'photo_url')->fileInput()->label(false); ?>
					        </div>
					      </div>
					      <div class="row">
					        <div class="col-sm-2">
					           <b>Gender: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php
					              echo $form->field($model, 'gender')->label(FALSE)->widget(Select2::classname(), [
					                  'data' => ['M'=>'Male','F'=>'Female'],
					                  'options' =>[
					                      'placeholder' => 'Select Gender'
					                  ],
					                  'pluginOptions' => [
					                      'allowClear' => true,
					                  ],
					                ]);
					          ?>
					        </div>
					        <div class="col-sm-2">
					           <b>Language: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php
					              echo $form->field($model, 'language')->label(FALSE)->widget(Select2::classname(), [
					                  'data' => ['M'=>'Marathi','E'=>'English'],
					                  'options' =>[
					                      'placeholder' => 'Select Language'
					                  ],
					                  'pluginOptions' => [
					                      'allowClear' => true,
					                  ],
					                ]);
					          ?>
					        </div>
					      </div>
					      <div class="row">
					        <div class="col-sm-2">
					           <b>Birth Date: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php
					          	echo $form->field($model, 'birth_date')->widget(DatePicker::classname(), [
								    'options' => ['placeholder' => 'Enter birth date'],
								    'pluginOptions' => [
								        'autoclose'=>true,
								        'endDate' => "5y",
								        'todayHighlight' => true
								    ]
								])->label(false);
					          ?>
					        </div>
					        <div class="col-sm-2">
					           <b>Age: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php echo $form->field($model, 'age')->textInput(['class'=>'form-control','placeholder'=>'Age', 'disabled'=>true])->label(false); ?>
					        </div>
					      </div>
					    <div class="row">
					        <div class="col-sm-2">
					           <b>Is Registered: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php
					              echo $form->field($model, 'is_registered')->label(FALSE)->widget(Select2::classname(), [
					                  'data' => ['0'=>'No','1'=>'Yes'],
					                  'options' =>[
					                      'placeholder' => 'Select'
					                  ],
					                  'pluginOptions' => [
					                      'allowClear' => true,
					                  ],
					                ]);
					          ?>
					        </div>
        					<?php //if($type==1): ?>
						        <div class="col-sm-2">
						           <b>Tagged To: </b>
						        </div>
						        <div class="col-sm-4">
						          <?php
						              echo $form->field($model, 'tagged_to')->label(FALSE)->widget(Select2::classname(), [
						                  'data' => $tagTo,
						                  'options' =>[
						                      'placeholder' => 'Select Tagged To'
						                  ],
						                  'pluginOptions' => [
						                      'allowClear' => true,
						                  ],
						                ]);
						          ?>
						        </div>
						    <?php //else: ?>
						    	<?php echo $form->field($model, 'tagged_to')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false); ?>
					    	<?php //endif; ?>
					      </div>
					      <div class="row">
					        <div class="col-sm-2">
					           <b>Mobile No.: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php echo $form->field($model, 'mobile_no')->textInput(['class'=>'form-control','placeholder'=>'Mobile Number'])->label(false); ?>
					        </div>
					        <div class="col-sm-2">
					           <b>WhatsApp No.: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php echo $form->field($model, 'whatsapp_no')->textInput(['class'=>'form-control','placeholder'=>'WhatsApp Number'])->label(false); ?>
					        </div>
					      </div>
					      <div class="row">
					        <div class="col-sm-2">
					           <b>Address: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php echo $form->field($model, 'address')->textArea(['class'=>'form-control','placeholder'=>'Address'])->label(false); ?>
					        </div>
					      </div>
					      <div class="row">
					        <div class="col-sm-12">
					            <?php echo Html::submitButton("Submit",['class'=>'btn btn-primary btn-flat','id'=>'btnSubmit']); ?>
					            <?php echo Html::resetButton("Reset",['class'=>'btn btn-default btn-flat']); ?>
					        </div>
					      </div>
					    <?php ActiveForm::end(); ?>
			        </div>
			      </div>
			    </div>
			    <div class="panel panel-default">
			      <div class="panel-heading">
			        <h4 class="panel-title" style="cursor: not-allowed;">
			          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="disabled">Farm Details</a>
			        </h4>
			      </div>
			      <div id="collapse2" class="panel-collapse collapse">
			        <div class="panel-body">
			        	
			        	
			        </div>
			      </div>
			    </div>
			    <div class="panel panel-default">
			      <div class="panel-heading">
			        <h4 class="panel-title" style="cursor: not-allowed;">
			          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="disabled">Plot Details</a>
			        </h4>
			      </div>
			      <div id="collapse3" class="panel-collapse collapse">
			        <div class="panel-body">
			        	
			        </div>
			      </div>
			    </div>
			  </div> 
    	</div>
    </div>
  </section>





<style type="text/css">
	a.disabled {
	   pointer-events: none;
	   color: cadetblue;
	}
</style>

<?php
$script="$('#farmers-birth_date').on('change', function () {
		var dob=$('#farmers-birth_date').val();
        dob = new Date(dob);
		var today = new Date();
		var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
		$('#farmers-age').val(age);
    });"; 
    $this->registerJs($script);
?>