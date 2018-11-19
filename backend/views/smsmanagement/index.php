<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SmsManagementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sms Managements';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sms-management-index">

    <div>
		<h2 class="mt-0"><?= Html::encode($this->title) ?>
			<p class="pull-right"><?= Html::a('Create Sms Management', ['create'], ['class' => 'btn btn-success']) ?></p>
		</h2>
		<div class="clearfix"></div>
		<p class="pull-right">
			<?php
				$draft = $publish = $all = '';
				switch($from) {
					case 'inactive' :
						$draft = 'visitedlink';
						break;
					case 'active' :
						$publish = 'visitedlink';
						break;
					case 'all' :
						$all = 'visitedlink';
						break;
				}
			?>
			<?= Html::a('Active', ['active'], ['class' => $publish]) ?> |
			<?= Html::a('Inactive', ['inactive'], ['class' => $draft]) ?> |
			<?= Html::a('Show All', ['index'], ['class' => $all]) ?>
		</p>
	</div>

    
    
	<div class="table-responsive w-100">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'sms_mng_id',

            [
                'attribute' => 'sms_gateway_name',
            ],

            [
                'attribute' => 'sms_gateway_url',
                'format'=>'url',
            ],

            [
                'attribute' => 'status',
                'filter'=>false,
                'value' => function($model) {
                    return ($model->status == 1)? "Active" : "Inactive";
                }                
            ],

            // 'created_on',
            // 'updated_on',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	</div>
</div>