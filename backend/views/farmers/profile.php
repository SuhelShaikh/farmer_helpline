<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use kartik\widgets\Select2;
use kartik\select2\Select2;
//use kartik\widgets\DatePicker;
use kartik\date\DatePicker;
use backend\models\TblLocations;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$this->title = 'Farmer Profile';
$this->title = $data->farmer_id;
//echo "<pre>";
//print_r($data);exit;
?>
<!--<h1><?= Html::encode($this->title) ?></h1>-->
<section class="content">                	
    <h2 class="mt-0">
        Farmer Profile
    </h2>
    <div class="clearfix">&nbsp;</div>
    <div class="row">
        <div class="user-image col-sm-12 col-md-2 text-center">
            <div class="user-image-wrap">
                <img src="http://aadityaled.com/img/profile.jpg" class="img-responsive" alt="farmer name" />
            </div>
        </div>
        <div class="user-info col-sm-12 col-md-10">
            <div class="basic-info">
                <label class="font-weight-bold"><?php echo $data->first_name . " " . $data->last_name; ?></label>
                <div class="clearfix"></div>				
                <label class="user-phone"><i class="fa fa-phone font-weight-bold mr-1"></i> (+91 <?php echo $data->mobile_no ?>)</label>
                <div class="clearfix"></div>				
                <label class="user-email"><i class="fa fa-envelope font-weight-bold mr-1"></i> usermail@gmail.com</label>
            </div>
            <div class="user-address">
                <i class="fa fa-map-marker font-weight-bold mr-1"></i> <?php echo $data->home_address ?>
            </div>
        </div>
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class=""></div>
    <!-- user profile tabs added -->
    <div class="row">
        <div class="col-xs-12 profile-tabs">
            <div class="panel with-nav-tabs panel-success">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1success" data-toggle="tab"><strong>Farmer Profile</strong></a></li>
                        <li><a href="#tab2success" data-toggle="tab"><strong>Farm <?php echo (isset($data->farm) && !empty($data->farm))?" (".count($data->farm).")": " (0)"; ?></strong></a></li>
                        <li><a href="#tab3success" data-toggle="tab"><strong>Crop <?php echo (isset($data->plot) && !empty($data->plot))?" (".count($data->plot).")": " (0)"; ?></strong></a></li>
                        <li><a href="#tab4success" data-toggle="tab"><strong>Advices History </strong></a></li>
                        <li><a href="#tab5success" data-toggle="tab"><strong>Farmer Schedules</strong></a></li>
                        <li><a href="#tab6success" data-toggle="tab"><strong>Schedules Prescription</strong></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content row">
                        <div class="tab-pane fade active in col-md-12" id="tab1success">
                            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                            <div class="row">
                                <div class="col-sm-2"><b>First Name: </b></div>
                                <div class="col-sm-4"><b><?php echo $data->first_name; ?></b></div>
                                <div class="col-sm-2"><b>Middle Name: </b></div>
                                <div class="col-sm-4"><b><?php echo $data->middle_name; ?></b></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"><b>Last Name: </b></div>
                                <div class="col-sm-4"><b><?php echo $data->last_name; ?></b></div>
                                <div class="col-sm-2"><b>Gender: </b></div>
                                <div class="col-sm-4"><b><?php echo ($data->gender == 1 ? "Male" : "Female" ); ?></b></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"><b>Language: </b></div>
                                <div class="col-sm-4"><b><?php echo ($data->language == "M" ? "Marathi" : "English" ); ?></b></div>
                                <div class="col-sm-2"><b>Birth Date: </b></div>
                                <div class="col-sm-4"><b><?php echo $data->birth_date ?> </b></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"><b>Age: </b></div>
                                <div class="col-sm-4"><b><?php echo $data->age ?> </b></div>
                                <div class="col-sm-2"><b>Is Registered: </b></div>
                                <div class="col-sm-4"><b><?php echo ($data->is_registered == 1 ? 'Yes' : 'No'); ?> </b></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"><b>Mobile No.: </b></div>
                                <div class="col-sm-4"><b><?php echo $data->mobile_no ?> </b></div>
                                <div class="col-sm-2"><b>WhatsApp No.: </b></div>
                                <div class="col-sm-4"><b><?php echo $data->whatsapp_no ?> </b></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"><b>Address: </b></div>
                                <div class="col-sm-4"><b><?php echo $data->home_address ?></b></div>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                        <div class="tab-pane fade" id="tab2success">
                            <?php
                            $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
                            foreach ($data->farm AS $farm) {
                                $farm = (object) $farm;
                                ?><div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><?php echo $farm->farm_name; ?></a>
                                            </h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-2"><b>Farm Name: </b></div>
                                                <div class="col-sm-4"><b><?php echo $farm->farm_name; ?></b></div>
                                                <div class="col-sm-2"><b>Location: </b></div>
                                                <div class="col-sm-4"><b><?php echo $farm->elevation_farm_location; ?></b></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2"><b>Servey No.: </b></div>
                                                <div class="col-sm-4"><b><?php echo $farm->survey_number; ?></b></div>
                                                <div class="col-sm-2"><b>State: </b></div>
                                                <div class="col-sm-4"><b><?php echo $farm->state_name; ?></b></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2"><b>District: </b></div>
                                                <div class="col-sm-4"><b><?php echo $farm->district_name; ?></b></div>
                                                <div class="col-sm-2"><b>Mandal: </b></div>
                                                <div class="col-sm-4"><b><?php echo $farm->mandal_name; ?></b></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2"><b>Village: </b></div>
                                                <div class="col-sm-4"><b><?php echo $farm->village_name; ?></b></div>
                                                <div class="col-sm-2"><b>Area Of plot: </b></div>
                                                <div class="col-sm-4"><b><?php echo $farm->total_area; ?></b></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2"><b>Area Of Unit: </b></div>
                                                <div class="col-sm-4"><b><?php echo $farm->area_unit; ?></b></div>
                                            </div></div></div></div>
                            <?php } ActiveForm::end(); ?>
                        </div>
                        <div class="tab-pane fade" id="tab3success">
                            <?php
                            $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
                            if (isset($data->plot) && !empty($data->plot)) {
                                foreach ($data->plot AS $plot1) {
                                    if (isset($plot1) && !empty($plot1)) {
                                        foreach ($plot1 AS $plot) {
                                            $plot = (object) $plot;
                                            ?><div class="panel-group" id="accordion">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><?php echo $plot->plot_name; ?></a>
                                                        </h4>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-sm-2"><b>Plot Name: </b></div>
                                                            <div class="col-sm-4"><b><?php echo $plot->plot_name; ?></b></div>
                                                            <div class="col-sm-2"><b>Plot Area: </b></div>
                                                            <div class="col-sm-4"><b><?php echo $plot->plot_area; ?></b></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2"><b>Crop Name: </b></div>
                                                            <div class="col-sm-4"><b><?php echo $plot->crop_name; ?></b></div>
                                                            <div class="col-sm-2"><b>Crop Type: </b></div>
                                                            <div class="col-sm-4"><b><?php echo $plot->crop_type_name; ?></b></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2"><b>Variety Name: </b></div>
                                                            <div class="col-sm-4"><b><?php echo $plot->crop_variety_name; ?></b></div>
                                                            <div class="col-sm-2"><b>No Of Valves: </b></div>
                                                            <div class="col-sm-4"><b><?php echo $plot->number_of_valves; ?></b></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2"><b>No. Of Plants: </b></div>
                                                            <div class="col-sm-4"><b><?php echo $plot->number_of_plants; ?></b></div>
                                                            <div class="col-sm-2"><b>Plot Platnted Date: </b></div>
                                                            <div class="col-sm-4"><b><?php echo $plot->plot_planted_date; ?></b></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2"><b>Planting Method: </b></div>
                                                            <div class="col-sm-4"><b><?php echo $plot->planting_method; ?></b></div>
                                                            <div class="col-sm-2"><b>Expected Yield/Plant: </b></div>
                                                            <div class="col-sm-4"><b><?php echo $plot->expected_yield_per_plant; ?></b></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2"><b>Total Expected Yield: </b></div>
                                                            <div class="col-sm-4"><b><?php echo $plot->total_expected_yield; ?></b></div>
                                                            <div class="col-sm-2"><b>Defoilation Date: </b></div>
                                                            <div class="col-sm-4"><b><?php echo $plot->defoliation_date; ?></b></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2"><b>First Water Date: </b></div>
                                                            <div class="col-sm-4"><b><?php echo $plot->first_water_date; ?></b></div>
                                                            <div class="col-sm-2"><b>Water in Liters: </b></div>
                                                            <div class="col-sm-4"><b><?php echo $plot->water_liters; ?></b></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2"><b>Mulching Date: </b></div>
                                                            <div class="col-sm-4"><b><?php echo $plot->mulching_date; ?></b></div>
                                                        </div></div></div></div>
                                        <?php
                                        }
                                    }
                                }
                            } ActiveForm::end();
                            ?>
                        </div>
                        <div class="tab-pane fade" id="tab4success">Coming Soon..</div>
                        <div class="tab-pane fade" id="tab5success">Coming Soon..</div>
                        <div class="tab-pane fade" id="tab6success">Coming Soon..</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- user profile tabs added -->

</section>
