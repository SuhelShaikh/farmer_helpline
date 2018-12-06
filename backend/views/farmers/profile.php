<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use kartik\widgets\Select2;
use kartik\select2\Select2;
use kartik\widgets\DatePicker;
use backend\models\TblLocations;
use yii\helpers\ArrayHelper;
use	yii\helpers\Url;

$this->title = 'Farmer Profile';
print_r($model);
$this->title = $model->farmer_id;

?>
<h1><?= Html::encode($this->title) ?></h1>
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
				<label class="font-weight-bold">User Full Name</label>
				<div class="clearfix"></div>				
				<label class="user-phone"><i class="fa fa-phone font-weight-bold mr-1"></i> (+91 1234567890)</label>
				<div class="clearfix"></div>				
				<label class="user-email"><i class="fa fa-envelope font-weight-bold mr-1"></i> usermail@gmail.com</label>
			</div>
			<div class="user-address">
				<i class="fa fa-map-marker font-weight-bold mr-1"></i> user address
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
						<li class=""><a href="#tab2success" data-toggle="tab"><strong>Farmer (1)</strong></a></li>
						<li><a href="#tab3success" data-toggle="tab"><strong>Crop (1)</strong></a></li>
						<li class=""><a href="#tab4success" data-toggle="tab"><strong>Advices History (8)</strong></a></li>
						<li class=""><a href="#tab5success" data-toggle="tab"><strong>Farmer Schedules</strong></a></li>
						<li class=""><a href="#tab6success" data-toggle="tab"><strong>Schedules Prescription</strong></a></li>
					</ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab1success">Farmer Profile content</div>
                        <div class="tab-pane fade" id="tab2success">Farmer (1) content</div>
                        <div class="tab-pane fade" id="tab3success">Crop (1) content</div>
                        <div class="tab-pane fade" id="tab4success">Advices History content</div>
                        <div class="tab-pane fade" id="tab5success">Farmer Schedules content</div>
                        <div class="tab-pane fade" id="tab6success">Schedules Prescription content</div>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<!-- user profile tabs added -->
	
</section>
