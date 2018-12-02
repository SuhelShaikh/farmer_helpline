<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\State;
use backend\models\Village;
use backend\models\Mandal;
use backend\models\District;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserRoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Farmer Details';
?>
<div class="user-role-index">
	<div>
	<p class="pull-right" style="margin-top: 43px;">

	</p></div>
<p class="pull-right" style="margin-right: -165px;">
        	<!--?= Html::a('Create Alert Messages', ['create'], ['class' => 'btn btn-success']) ?-->
    	</p>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary'=>false,
        'columns' => [

//             [
//                 'attribute'=>'first_name',
//                 'format'=>'html',
//                 'value'=>'first_name'
//             ],
            [
                'attribute' => 'first_name',
                'filter'=>true,
                'format' => 'raw',
                'contentOptions' => ['class' => 'col-sm-3'],
                'headerOptions' => ['class' => 'col-sm-3'],
                'value' => function ($model) {
                return  $model->first_name;
                },
            ],
            'last_name',
            [
                'attribute' => 'state',
                'filter'=>ArrayHelper::map(State::find()->asArray()->all(), 'state_id', 'name'),
                'format' => 'raw',
                'value' => function ($model) {
                return  $model->getState();
                },
            ],
            [
                'attribute' => 'district',
                'filter' => ArrayHelper::map(District::find()->asArray()->all(), 'dis_id', 'name'),
                'format' => 'raw',
                'value' => function ($model) {
                return  $model->getDistrict();
                },
            ],
            [
                'attribute' => 'mandal',
                'filter' => ArrayHelper::map(Mandal::find()->asArray()->all(), 'mandal_id', 'name'),
                'format' => 'raw',
                'value' => function ($model) {
                return  $model->getMandal();
                },
            ],
            [
                'attribute' => 'village',
                'filter' => ArrayHelper::map(Village::find()->asArray()->all(), 'village_id', 'name'),
                'format' => 'raw',
                'value' => function ($model) {
                return  $model->getVillage();
                },
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} ',
               'buttons' => [
                 
                 //view button
                   'view' => function ($url, $model) {
                       return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                           'title' => Yii::t('app', 'lead-view'),
                       ]);
                   },
                   
               ],  
               'urlCreator' => function ($action, $model, $key, $index) {
                   if ($action === 'view') {
                       $url ='index.php?r=userrole/view&id='.$model->id;
                       return $url;
                   }
               },
            ],
        ],
    ]); ?>
</div>
