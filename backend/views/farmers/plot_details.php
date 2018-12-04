<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use kartik\widgets\Select2;
use kartik\select2\Select2;
use kartik\widgets\DatePicker;
use backend\models\FarmerFarmDetails;
use yii\helpers\ArrayHelper;
use	yii\helpers\Url;

use backend\models\MasterCropType;
use backend\models\MasterVarietyType;
use backend\models\MasterSoilType;
use backend\models\MasterIrigationType;
use backend\models\MasterLateralType;
use backend\models\MasterFilterationType;
use backend\models\MasterMulchingMethodType;

use backend\models\MasterFirtigationType;
use backend\models\MasterWaterSourceType;
use backend\models\MasterPreleventDisType;


$farmerId=$_REQUEST['id'];
$farms=ArrayHelper::map(FarmerFarmDetails::find()->where(['farmer_id'=>$farmerId])->orderBy('farm_name')->all(), 'id', 'farm_name');
$cropTypes=ArrayHelper::map(MasterCropType::find()->where(['status'=>1])->orderBy('name')->all(), 'id', 'name');
$varietyTypes=ArrayHelper::map(MasterVarietyType::find()->where(['status'=>1])->orderBy('name')->all(), 'id', 'name');
$soilTypes=ArrayHelper::map(MasterSoilType::find()->where(['status'=>1])->orderBy('name')->all(), 'id', 'name');
$irigationTypes=ArrayHelper::map(MasterIrigationType::find()->where(['status'=>1])->orderBy('name')->all(), 'id', 'name');
$lateralTypes=ArrayHelper::map(MasterLateralType::find()->where(['status'=>1])->orderBy('name')->all(), 'id', 'name');
$filterationTypes=ArrayHelper::map(MasterFilterationType::find()->where(['status'=>1])->orderBy('name')->all(), 'id', 'name');
$mulchingTypes=ArrayHelper::map(MasterMulchingMethodType::find()->where(['status'=>1])->orderBy('name')->all(), 'id', 'name');
$firtigationTypes=ArrayHelper::map(MasterFirtigationType::find()->where(['status'=>1])->orderBy('name')->all(), 'id', 'name');
$waterSourceTypes=ArrayHelper::map(MasterWaterSourceType::find()->where(['status'=>1])->orderBy('name')->all(), 'id', 'name');
$preleventTypes=ArrayHelper::map(MasterPreleventDisType::find()->where(['status'=>1])->orderBy('name')->all(), 'id', 'name');
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" onclick="closePopup();">&times;</button>
        <h4 class="modal-title">Add Plot</h4>
      </div>
      <div class="modal-body">
			<div class="row">
				<div class="col-sm-2">
					<b>Select Farm: </b>
				</div>
				<div class="col-sm-4">
		          	<?php
					    echo $form->field($model, 'farm_id')->label(FALSE)->widget(Select2::classname(), [
					        'data' => $farms,
					        'options' =>[
					            'placeholder' => 'Select Farm'
					        ],
					        'pluginOptions' => [
					            'allowClear' => true,
					        ],
					    ]);
					?>
					<?php echo $form->field($model, 'farmer_id')->hiddenInput(['value'=>$_REQUEST['id']])->label(false); ?>
		        </div>
		        <div class="col-sm-2">
		           <b>Plot Area: </b>
		        </div>
		        <div class="col-sm-4">
		          <?php echo $form->field($model, 'plot_area')->textInput(['class'=>'form-control','placeholder'=>'Plot Area'])->label(false); ?>
		        </div>
		    </div>
		    <div class="row">
		        <div class="col-sm-2">
		           <b>Crop Name: </b>
		        </div>
		        <div class="col-sm-4">
		          <?php echo $form->field($model, 'crop_name')->textInput(['class'=>'form-control','placeholder'=>'Crop Name'])->label(false); ?>
		        </div>
		        <div class="col-sm-2">
		           <b>Crop Type: </b>
		        </div>
		        <div class="col-sm-4">
		          	<?php
					    echo $form->field($model, 'crop_type')->label(FALSE)->widget(Select2::classname(), [
					        'data' => $cropTypes,
					        'options' =>[
					            'placeholder' => 'Crop Type'
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
		           <b>Variety Type: </b>
		        </div>
		        <div class="col-sm-4">
		        	<?php
					    echo $form->field($model, 'variety_type')->label(FALSE)->widget(Select2::classname(), [
					        'data' => $varietyTypes,
					        'options' =>[
					            'placeholder' => 'Variety Type'
					        ],
					        'pluginOptions' => [
					            'allowClear' => true,
					        ],
					    ]);
					?>
		        </div>
		        <div class="col-sm-2">
		           <b>Crop Grown Area: </b>
		        </div>
		        <div class="col-sm-4">
		          <?php echo $form->field($model, 'crop_grown_area')->textInput(['class'=>'form-control','placeholder'=>'Crop Grown Area'])->label(false); ?>
		        </div>
		    </div>
		    <div class="row">
		    	<div class="col-sm-2">
		           <b>Plot Numbers: </b>
		        </div>
		        <div class="col-sm-4">
		          <?php echo $form->field($model, 'plot_numbers')->textInput(['class'=>'form-control','placeholder'=>'Number of plots of this crop'])->label(false); ?>
		        </div>
		        <div class="col-sm-2">
		           <b>Soil Type: </b>
		        </div>
		        <div class="col-sm-4">
		        	<?php
					    echo $form->field($model, 'soil_type')->label(FALSE)->widget(Select2::classname(), [
					        'data' => $soilTypes,
					        'options' =>[
					            'placeholder' => 'Soil Type'
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
		           <b>Water Capacity: </b>
		        </div>
		        <div class="col-sm-4">
		          <?php echo $form->field($model, 'water_capacity')->textInput(['class'=>'form-control','placeholder'=>'Water holding capacity'])->label(false); ?>
		        </div>
		        <div class="col-sm-2">
		           <b>Drainout Period: </b>
		        </div>
		        <div class="col-sm-4">
		          <?php echo $form->field($model, 'drain_out_period')->textInput(['class'=>'form-control','placeholder'=>'Drainout Period'])->label(false); ?>
		        </div>
		    </div> 
		    <div class="row">
		    	<div class="col-sm-2">
		           <b>Distance(Two Lines): </b>
		        </div>
		        <div class="col-sm-4">
		          <?php echo $form->field($model, 'line_distance')->textInput(['class'=>'form-control','placeholder'=>'Distance between two lines'])->label(false); ?>
		        </div>
		        <div class="col-sm-2">
		           <b>Distance(Two Plants): </b>
		        </div>
		        <div class="col-sm-4">
		          <?php echo $form->field($model, 'plant_distance')->textInput(['class'=>'form-control','placeholder'=>'Distance between two plots'])->label(false); ?>
		        </div>
		    </div> 
		    <div class="row">
		    	<div class="col-sm-2">
		           <b>Planting Date: </b>
		        </div>
		        <div class="col-sm-4">
		        	<?php
					    echo $form->field($model, 'planting_date')->widget(DatePicker::classname(), [
						    'options' => ['placeholder' => 'Planting date'],
						    'pluginOptions' => [
						        'autoclose'=>true,
								'endDate' => "5y",
								'todayHighlight' => true
						    ]
						])->label(false);
					?>
		        </div>
		        <div class="col-sm-2">
		           <b>Plant Age: </b>
		        </div>
		        <div class="col-sm-4">
		          <?php echo $form->field($model, 'plant_age')->textInput(['class'=>'form-control','placeholder'=>'Planting Age','disabled'=>true])->label(false); ?>
		        </div>
		    </div> 
		    <div class="row">
		    	<div class="col-sm-2">
		           <b>Defoilation Date: </b>
		        </div>
		        <div class="col-sm-4">
		        	<?php
					    echo $form->field($model, 'defoilation_date')->widget(DatePicker::classname(), [
						    'options' => ['placeholder' => 'Defoilation date'],
						    'pluginOptions' => [
						        'autoclose'=>true
						    ]
						])->label(false);
					?>
		        </div>
		        <div class="col-sm-2">
		           <b>Irrigation Date: </b>
		        </div>
		        <div class="col-sm-4">
		        	<?php
					    echo $form->field($model, 'irrigation_date')->widget(DatePicker::classname(), [
						    'options' => ['placeholder' => 'First Irrigation date'],
						    'pluginOptions' => [
						        'autoclose'=>true
						    ]
						])->label(false);
					?>
		        </div>
		    </div> 
		    <div class="row">
		    	<div class="col-sm-2">
		           <b>Irrigation Type: </b>
		        </div>
		        <div class="col-sm-4">
		          	<?php
					    echo $form->field($model, 'irrigation_type')->label(FALSE)->widget(Select2::classname(), [
					        'data' => $irigationTypes,
					        'options' =>[
					            'placeholder' => 'Irrigation Type'
					        ],
					        'pluginOptions' => [
					            'allowClear' => true,
					        ],
					    ]);
					?>
		        </div>
		        <div class="col-sm-2">
		           <b>Drip Lateral Type: </b>
		        </div>
		        <div class="col-sm-4">
		        	<?php
					    echo $form->field($model, 'lateral_type')->label(FALSE)->widget(Select2::classname(), [
					        'data' => $lateralTypes,
					        'options' =>[
					            'placeholder' => 'Lateral Type'
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
		           <b>Filterartion System: </b>
		        </div>
		        <div class="col-sm-4">
		          	<?php
					    echo $form->field($model, 'filterartion_system')->label(FALSE)->widget(Select2::classname(), [
					        'data' => $filterationTypes,
					        'options' =>[
					            'placeholder' => 'Filterartion System'
					        ],
					        'pluginOptions' => [
					            'allowClear' => true,
					        ],
					    ]);
					?>
		        </div>
		        <div class="col-sm-2">
		           <b>Mulching Method: </b>
		        </div>
		        <div class="col-sm-4">
		        	<?php
					    echo $form->field($model, 'mulching_method')->label(FALSE)->widget(Select2::classname(), [
					        'data' => $mulchingTypes,
					        'options' =>[
					            'placeholder' => 'Mulching Method'
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
		           <b>Fertigation Equipments: </b>
		        </div>
		        <div class="col-sm-4">
		          	<?php
					    echo $form->field($model, 'firtigation_equipments')->label(FALSE)->widget(Select2::classname(), [
					        'data' => $firtigationTypes,
					        'options' =>[
					            'placeholder' => 'Fertigation Equipments'
					        ],
					        'pluginOptions' => [
					            'allowClear' => true,
					        ],
					    ]);
					?>
		        </div>
		        <div class="col-sm-2">
		           <b>Water Source: </b>
		        </div>
		        <div class="col-sm-4">
		          	<?php
					    echo $form->field($model, 'water_source')->label(FALSE)->widget(Select2::classname(), [
					        'data' => $waterSourceTypes,
					        'options' =>[
					            'placeholder' => 'Water Source'
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
		           <b>Soil Details: </b>
		        </div>
		        <div class="col-sm-4">
		        	<?php echo $form->field($model, 'soil_details')->textArea(['class'=>'form-control','placeholder'=>'Soil Details'])->label(false); ?>
		        </div>
		        <div class="col-sm-2">
		           <b>Water Details: </b>
		        </div>
		        <div class="col-sm-4">
		        	<?php echo $form->field($model, 'water_details')->textArea(['class'=>'form-control','placeholder'=>'Water Details'])->label(false); ?>
		        </div>
		    </div>
		    <div class="row">
		    	<div class="col-sm-2">
		           <b>Soil Test Report: </b>
		        </div>
		        <div class="col-sm-4">
		        	<?php echo $form->field($model, 'soil_test_report')->fileInput()->label(false); ?>
		        </div>
		        <div class="col-sm-2">
		           <b>Water Test Report: </b>
		        </div>
		        <div class="col-sm-4">
		        	<?php echo $form->field($model, 'water_test_report')->fileInput()->label(false); ?>
		        </div>
		    </div>
		    <div class="row">
		    	<div class="col-sm-2">
		           <b>Prelevant Diseases: </b>
		        </div>
		        <div class="col-sm-4">
		          	<?php
					    echo $form->field($model, 'prelevant_diseases')->label(FALSE)->widget(Select2::classname(), [
					        'data' => $preleventTypes,
					        'options' =>[
					            'placeholder' => 'Prelevant Diseases'
					        ],
					        'pluginOptions' => [
					            'allowClear' => true,
					        ],
					    ]);
					?>
		        </div>
		    </div>
      </div>
      <div class="modal-footer">
		<div class="row">
		    <div class="col-sm-12">
		        <?php echo Html::submitButton("Submit",['class'=>'btn btn-primary btn-flat','id'=>'btnSubmit']); ?>
		        <?php echo Html::Button("Close",['class'=>'btn btn-default btn-flat','data-dismiss'=>'modal','onclick'=>'closePopup();']); ?>
		    </div>
		</div>
      </div>
      <?php ActiveForm::end(); ?>


<?php
$script="$('#farmerplotdetails-planting_date').on('change', function () {
		var dob=$('#farmerplotdetails-planting_date').val();
        dob = new Date(dob);
		var today = new Date();
		var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
		$('#farmerplotdetails-plant_age').val(age);
    });"; 
    $this->registerJs($script);
?>
<script type="text/javascript">
    	function closePopup(){
    		$('#plotModel', window.parent.document).trigger("click");
    	}
 </script>