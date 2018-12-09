<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
$this->title = 'Users Details';
$path = '/farmer_helpline/backend/web/uploads/user/photo/';
?>
<div class="user-view">
	<div>
		<h2 class="mt-0">
			<?= Html::encode($this->title) ?>
			<p class="pull-right">
				<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
				<?= Html::a('Back', ['index'], [
					'class' => 'btn btn-danger',
					
				]) ?>
			</p>
		</h2>
	</div>	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="w-100">
				<div class="small-12 medium-2 large-2 columns">
					<div class="circle mlr-auto">
					<!-- User Profile Image -->
					
					<img class="profile-pic" src="<?php echo $path.$model->image; ?>">
				   <!-- Default Image -->
				   <!-- <i class="fa fa-user fa-5x"></i> -->
					</div>
				</div>
			</div>
			
			<div class="clearfix">&nbsp;</div>
			<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tr>
					<td class="font-weight-bold">User Name:</td>
					<td><?= $model->username ?></td>
				</tr>
				<tr>
					<td class="font-weight-bold">Email:</td>
					<td><?= $model->email ?></td>
				</tr>
				<tr>
					<td class="font-weight-bold">First Name:</td>
					<td><?= $model->first_name ?></td>
				</tr>
				<tr>
					<td class="font-weight-bold">Middle Name:</td>
					<td><?= $model->middle_name ?></td>
				</tr>				
				<tr>
					<td class="font-weight-bold">Last Name:</td>
					<td><?= $model->last_name ?></td>
				</tr>				
				<tr>
					<td class="font-weight-bold">Age:</td>
					<td><?= $model->age ?></td>
				</tr>				
				<tr>
					<td class="font-weight-bold">Date of Birth:</td>
					<td><?= $model->birth_date ?></td>
				</tr>
				<tr>
					<td class="font-weight-bold">Gender:</td>
					<td><?= ($model->gender == 1)?"Male":"Female" ?></td>
				</tr>				
				<tr>
					<td class="font-weight-bold">Mobile Number:</td>
					<td><?= $model->mobile_number ?></td>
				</tr>				
				<tr>
					<td class="font-weight-bold">Status:</td>
					<td><?= ($model->status == 1)?"Active":"Inactive" ?></td>
				</tr>
			</table>
			</div>
		</div>	
	</div>
</div>
