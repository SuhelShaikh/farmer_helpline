<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use backend\models\FarmerFarmDetails;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use backend\models\CropType;
use backend\models\VarietyType;
use backend\models\SoilType;
use backend\models\IrigationType;

//use backend\models\MasterLateralType;
//use backend\models\MasterFilterationType;
//use backend\models\MasterMulchingMethodType;
//use backend\models\MasterFirtigationType;
//use backend\models\MasterWaterSourceType;
//use backend\models\MasterPreleventDisType;

$farmerId = $_REQUEST['id'];
$farms = ArrayHelper::map(FarmerFarmDetails::find()->where(['farmer_id' => $farmerId])->orderBy('farm_name')->all(), 'farm_id', 'farm_name');
$crops = ArrayHelper::map(backend\models\Crops::find()->orderBy('crop_name')->all(), 'crop_id', 'crop_name');
$cropTypes = ArrayHelper::map(CropType::find()->orderBy('crop_type_name')->all(), 'crop_type_id', 'crop_type_name');
$varietyTypes = ArrayHelper::map(VarietyType::find()->orderBy('crop_variety_name')->all(), 'crop_variety_id', 'crop_variety_name');
$soilTypes = ArrayHelper::map(SoilType::find()->orderBy('soil_type_name')->all(), 'soil_type_id', 'soil_type_name');
$irigationTypes = ArrayHelper::map(IrigationType::find()->orderBy('irrigation_type_name')->all(), 'irrigation_type_id', 'irrigation_type_name');
//$lateralTypes = ArrayHelper::map(MasterLateralType::find()->orderBy('dripping_method_name')->all(), 'dripping_method_id', 'dripping_method_name');
/* $filterationTypes=ArrayHelper::map(MasterFilterationType::find()->where(['status'=>1])->orderBy('name')->all(), 'id', 'name');
  $mulchingTypes=ArrayHelper::map(MasterMulchingMethodType::find()->where(['status'=>1])->orderBy('name')->all(), 'id', 'name');
  $firtigationTypes=ArrayHelper::map(MasterFirtigationType::find()->where(['status'=>1])->orderBy('name')->all(), 'id', 'name');
  $waterSourceTypes=ArrayHelper::map(MasterWaterSourceType::find()->where(['status'=>1])->orderBy('name')->all(), 'id', 'name');
  $preleventTypes=ArrayHelper::map(MasterPreleventDisType::find()->where(['status'=>1])->orderBy('name')->all(), 'id', 'name');
 * 
 */
$filterationTypes = array('1' => 'filteration 1', '2' => 'filteration 2');
$mulchingTypes = array('1' => 'mulching 1', '2' => 'mulching 2');
$firtigationTypes = array('1' => 'firtigation 1', '2' => 'firtigation 2');
$waterSourceTypes = array('1' => 'waterSource 1', '2' => 'waterSource 2');
$preleventTypes = array('1' => 'prelevent 1', '2' => 'prelevent 2');

//'number_of_valves', 'planting_method', 'expected_yield_per_plant', 'total_expected_yield', 'water_liters', 'soil_type', 'water_capacity', 'drain_out_period', 'irigation_type', 'water_source'

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => 'index.php?r=farmers/plotdetails&id=' . $farmerId]);
?>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-2">
            <b>Select Farm: </b>
        </div>
        <div class="col-sm-4">
            <?php echo $form->field($model, 'farmer_id')->hiddenInput(['value' => $farmerId])->label(false); ?>
            <?php
            echo $form->field($model, 'farm_id')->label(FALSE)->widget(Select2::classname(), [
                'data' => $farms,
                'options' => [
                    'placeholder' => 'Select Farm'
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);
            ?>
            <?php echo $form->field($model, 'farmer_id')->hiddenInput(['value' => $_REQUEST['id']])->label(false); ?>
        </div>
        <div class="col-sm-2"><b>Plot Name</b></div>
        <div class="col-sm-4"><?php echo $form->field($model, 'plot_name')->textInput(['class' => 'form-control', 'placeholder' => 'Plot Name'])->label(false); ?></div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <b>Plot Area: </b>
        </div>
        <div class="col-sm-4">
            <?php echo $form->field($model, 'plot_area')->textInput(['class' => 'form-control', 'placeholder' => 'Plot Area'])->label(false); ?>
        </div>
        <div class="col-sm-2">
            <b>Crop Name: </b>
        </div>
        <div class="col-sm-4">
            <?php
            echo $form->field($cropModel, 'crop_id')->label(FALSE)->widget(Select2::classname(), [
                'data' => $crops,
                'options' => [
                    'placeholder' => 'Crops'
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
            <b>Crop Type: </b>
        </div>
        <div class="col-sm-4">
            <?php
            echo $form->field($cropModel, 'crop_type_id')->label(FALSE)->widget(Select2::classname(), [
                'data' => $cropTypes,
                'options' => [
                    'placeholder' => 'Crop Type'
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);
            ?>
        </div>
        <div class="col-sm-2">
            <b>Variety Type: </b>
        </div>
        <div class="col-sm-4">
            <?php
            echo $form->field($cropModel, 'crop_variety_id')->label(FALSE)->widget(Select2::classname(), [
                'data' => $varietyTypes,
                'options' => [
                    'placeholder' => 'Variety Type'
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);
            ?>
        </div>
    </div> 
    <div class="row">
        <div class="col-sm-2"><b>No of valves:</b></div>
        <div class="col-sm-4">
            <?php echo $form->field($model, 'number_of_valves')->textInput(['class' => 'form-control', 'placeholder' => 'No Of valves'])->label(false); ?>
        </div>
        <div class="col-sm-2"><b>Planting Method</b></div>
        <div class="col-sm-4">
            <?php echo $form->field($model, 'planting_method')->textInput(['class' => 'form-control', 'placeholder' => 'Planting Methods'])->label(false); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <b>Soil Type: </b>
        </div>
        <div class="col-sm-4">
            <?php
            echo $form->field($model, 'soil_type')->label(FALSE)->widget(Select2::classname(), [
                'data' => $soilTypes,
                'options' => [
                    'placeholder' => 'Soil Type'
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);
            ?>
        </div>
        <div class="col-sm-2">
            <b>Water Capacity: </b>
        </div>
        <div class="col-sm-4">
            <?php echo $form->field($model, 'water_capacity')->textInput(['class' => 'form-control', 'placeholder' => 'Water holding capacity'])->label(false); ?>
        </div>
        
    </div> 
    <div class="row">
        <div class="col-sm-2">
            <b>Distance(Two Lines): </b>
        </div>
        <div class="col-sm-4">
            <?php echo $form->field($cropModel, 'dist_two_lines')->textInput(['class' => 'form-control', 'placeholder' => 'Distance between two lines'])->label(false); ?>
        </div>
        <div class="col-sm-2">
            <b>Distance(Two Plants): </b>
        </div>
        <div class="col-sm-4">
            <?php echo $form->field($cropModel, 'dist_two_crop')->textInput(['class' => 'form-control', 'placeholder' => 'Distance between two plots'])->label(false); ?>
        </div>
    </div> 
    <div class="row">
        <div class="col-sm-2">
            <b>Planting Date: </b>
        </div>
        <div class="col-sm-4">
            <?php
            echo $form->field($model, 'plot_planted_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Planting date'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'endDate' => "5y",
                    'todayHighlight' => true
                ]
            ])->label(false);
            ?>
        </div>
        <div class="col-sm-2">
            <b>Defoilation Date: </b>
        </div>
        <div class="col-sm-4">
            <?php
            echo $form->field($model, 'defoliation_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Defoilation date'],
                'pluginOptions' => [
                    'autoclose' => true
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
            echo $form->field($model, 'irigation_type')->label(FALSE)->widget(Select2::classname(), [
                'data' => $irigationTypes,
                'options' => [
                    'placeholder' => 'Irrigation Type'
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
                'options' => [
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
            <b>Drainout Period: </b>
        </div>
        <div class="col-sm-4">
            <?php echo $form->field($model, 'drain_out_period')->textInput(['class' => 'form-control', 'placeholder' => 'Drainout Period'])->label(false); ?>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="row">
        <div class="col-sm-12">
            <?php echo Html::submitButton("Submit", ['class' => 'btn btn-primary btn-flat', 'id' => 'btnSubmit']); ?>
            <?php echo Html::Button("Close", ['class' => 'btn btn-default btn-flat', 'data-dismiss' => 'modal', 'onclick' => 'closePopup();']); ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>


<?php
$script = "$('#farmerplotdetails-planting_date').on('change', function () {
		var dob=$('#farmerplotdetails-planting_date').val();
        dob = new Date(dob);
		var today = new Date();
		var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
		$('#farmerplotdetails-plant_age').val(age);
    });";
$this->registerJs($script);
?>
<script type="text/javascript">
    function closePopup() {
        $('#plotModel', window.parent.document).trigger("click");
    }
</script>