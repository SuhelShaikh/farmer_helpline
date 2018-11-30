<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FarmDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Farm Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="farm-details-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Farm Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'farm_id',
            'farm_name',
            'elevation_farm_location',
            'village',
            'mandal',
            // 'district',
            // 'state',
            // 'survey_number',
            // 'total_area',
            // 'area_unit',
            // 'area_of_plot',
            // 'farmer_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
