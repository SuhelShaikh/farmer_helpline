<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
$this->title = 'Users Details';
$path = '/farmer_helpline/backend/web/uploads/user/photo/';
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Back', ['index'], [
            'class' => 'btn btn-danger',
            
        ]) ?>
    </p>
	<div class="row">
		<div class="col-md-12">
			<div class="small-12 medium-2 large-2 columns">
				<div class="circle">
				<!-- User Profile Image -->
				
				<img class="profile-pic" src="<?php echo $path.$model->image; ?>">
			   <!-- Default Image -->
			   <!-- <i class="fa fa-user fa-5x"></i> -->
				</div>
			</div>
		</div>	
	</div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'first_name',
            'middle_name',
            'last_name',
            'age',
            'birth_date',
            [
                'label'  => 'Gender',
                'value'  => ($model->gender == 1)?"Male":"Female",
            ],
            'mobile_number',
            //'image',
            //'home_address',
            [
                'label'  => 'Status',
                'value'  => ($model->status == 1)?"Active":"Inactive",
            ],
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

</div>
