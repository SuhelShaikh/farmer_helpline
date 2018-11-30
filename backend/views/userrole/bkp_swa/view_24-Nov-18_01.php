<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserRole */

 $this->title = 'Farmer Profile';

// $this->params['breadcrumbs'][] = ['label' => 'User Roles', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>	
<h2 class="mt-0">
	<?= Html::encode($this->title) ?>
	<p class="pull-right"><?= Html::a('Back', ['index'], ['class' => 'btn btn-success']) ?></p>	
</h2>
<div class="clearfix">&nbsp;</div>
	<div class="row basic-info-wrapper">		
		<div class="col-md-12">
			<div class="user-image pull-left mr-3">
				<div class="user-image-wrap mr-3">
					<img src="http://aadityaled.com/img/profile.jpg" class="img-responsive" style="width: 70px;height:auto;border-radius: 50%;border: 1px solid #ccc;" />
				</div>
			</div>
			<div class="user-info pull-left">
				<div class="basic-info">
					<label class="font-weight-bold text-info"><?php echo $userdetails->username;?></label>
					<div class="clearfix"></div>
					<label class="user-phone"><i class="fa fa-phone font-weight-bold mr-1"></i><?php echo $userdetails->mobile_number;?></label>
				</div>
				<div class="user-address">
					<!--<i class="fa fa-map-marker font-weight-bold mr-1"></i> user address Goes Here...-->
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix mt-3 mb-3"></div>
	<div class="row user-details-info">
		<div class="col-md-12">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="farmer-profile">
                <h4 class="panel-title font-weight-bold">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="more-less glyphicon glyphicon-minus mr-1"></i>
                        Farmer Profile
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="farmer-profile">
                <div class="panel-body p-0 table-responsive">					  
					  <table class="table w-100 table-striped mb-0">
						<colgroup>
							<col style="width:200px;" />
							<col />
						</colgroup>
						<tr>
							<td><label>Gender</label></td>
							<td><?php echo $userdetails->gender;?></td>
						</tr>
						<tr>
							<td><label>Date of Birth</label></td>
							<td><?php echo $userdetails->birth_date;?></td>
						</tr>
						<tr>
							<td><label>Age</label></td>
							<td><?php echo $userdetails->age;?></td>
						</tr>
<!-- 						<tr> -->
<!-- 							<td><label>Aadhar Number</label></td> -->
<!-- 							<td>1234 1234 1234 </td> -->
<!-- 						</tr> -->
<!-- 						<tr> -->
<!-- 							<td><label>Pan Number</label></td> -->
<!-- 							<td>BDWXX1011Q</td> -->
<!-- 						</tr> -->
					<?php if(!empty($farmdetails)) {?>
						<tr>
							<td><label>Land Holding Size</label></td>
							<td><?php echo $farmdetails->area_of_plot; ?> </td>
						</tr>
						<?php } else { ?>
        					<tr>
    							<td><label>Land Holding Size</label></td>
    							<td>-</td>
    						</tr>
						<?php } ?>
<!-- 						<tr> -->
<!-- 							<td><label>Crop Grown</label></td> -->
<!-- 							<td> - </td> -->
<!-- 						</tr> -->
					  </table>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="farms">
                <h4 class="panel-title font-weight-bold">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="more-less glyphicon glyphicon-plus mr-1"></i>
                        Farms <small class="count-small"></small>
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="farms">
                <div class="panel-body">
                <?php if(!empty($farmdetails)) {?>
                   <table class="table w-100 table-striped mb-0">
						<colgroup>
							<col style="width:200px;" />
							<col />
						</colgroup>
						<tr>
							<td><label>Farm Name</label></td>
							<td><?php echo $farmdetails->farm_name;?></td>
						</tr>
						<tr>
							<td><label>Elevation</label></td>
							<td><?php echo $farmdetails->elevation_farm_location;?></td>
						</tr>
						<tr>
							<td><label>Survey Number</label></td>
							<td><?php echo $farmdetails->survey_number;?></td>
						</tr>
						<tr>
							<td><label>Total Area</label></td>
							<td><?php echo $farmdetails->total_area;?></td>
						</tr>
						<tr>
							<td><label>Area Unit</label></td>
							<td><?php echo $farmdetails->area_unit;?></td>
						</tr>
					</table>
					<?php } else { ?>
					<span>No Data Found</span>
					<?php } ?>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="crops">
                <h4 class="panel-title font-weight-bold">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="more-less glyphicon glyphicon-plus mr-1"></i>
                        crops <small class="count-small"></small>
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="crops">
                <div class="panel-body">
                <?php if(!empty($cropdetails)) {?>
                	<table class="table w-100 table-striped mb-0">
						<colgroup>
							<col style="width:200px;" />
							<col />
						</colgroup>
						<tr>
							<td><label>Crop Name</label></td>
							<td><?php echo $cropdetails->crop_name;?></td>
						</tr>
						<tr>
							<td><label>Crop Type</label></td>
							<td><?php echo $cropdetails->crop_type;?></td>
						</tr>
					</table>	
					<?php } else { ?>
					<span>No Data Found</span>
					<?php } ?>
                </div>
            </div>
        </div>

    </div><!-- panel-group -->
		</div>
	</div>
