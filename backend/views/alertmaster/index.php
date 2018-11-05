<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AlertMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alert Messages';

?>
<div class="alert-master-index">

	
	<div>
	<p class="pull-right" style="margin-top: 43px;">
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
	</p></div>
<p class="pull-right" style="margin-right: -165px;">
        	<?= Html::a('Create Alert Messages', ['create'], ['class' => 'btn btn-success']) ?>
    	</p>
    <h2><?= Html::encode($this->title) ?></h2>
	
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
	'summary'=>false,
        'columns' => [
		[
                	'attribute' => 'alert_msg',
			'filter'=>false,
			'format'=>'html',
			'value' => function ($model) {
			    return $model->alert_msg;
			}
		],
            	[
                	'attribute' => 'alert_type',
		],
            	[
		        'attribute' => 'status',
			'filter'=>false,
		        'value' => function($model) {
		            return ($model->status == 1)? "Active" : "Inactive";
		        }                
            	],
	        [
	        	'attribute' => 'created_at',
			'filter'=>false,
	        	'value' => function($model) {
	            		return date('Y-m-d',strtotime($model->created_at));
        		} 
	    	],
            // 'updated_at',

             ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
        ],
    ]); ?>
</div>
