<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Role;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
	<div>
		<h2 class="mt-0">
			<?= Html::encode($this->title) ?>
			<p class="pull-right"> <?= Html::a('Create User', ['site/signup'], ['class' => 'btn btn-success']) ?> </p>
		</h2>
	</div>
	<div class="clearfix">&nbsp;</div>
	<div class="table-responsive w-100">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
             'email:email',
             //'first_name',
             //'middle_name',
             //'last_name',
             'age',
             'birth_date',
            [
				'attribute'=>'gender',
				'headerOptions' => ["class" => "col-md-1"],
				'format'=>'text', 
				'content'=>function($data) {
					return ($data->gender == 1)?"Male":"Female";
				},
				'filter' => false, 
			],
             'mobile_number',
            // 'image',
            // 'home_address',
             [
				'attribute'=>'status',
				'headerOptions' => ["class" => "col-md-1"],
				'format'=>'text', 
				'content'=>function($data) {
					return ($data->status == 1)?"Active":"Inactive";
				},
				'filter' => false, 
			],
			[
                'attribute' => 'role_id',
                'filter' => ArrayHelper::map(Role::find()->where(['<>','role_id','6'])->asArray()->all(), 'role_id', 'role_name'),
                'format' => 'raw',
                'value' => function ($model) {
                return  $model->getRole();
                },
            ],
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	</div>
</div>
