<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CropDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Crop Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crop-details-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Crop Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'crop_id',
            'farmer_id',
            'crop_name',
            'crop_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
