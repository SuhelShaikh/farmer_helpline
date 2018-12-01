<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FarmDetails */

$this->title = $model->farm_id;
$this->params['breadcrumbs'][] = ['label' => 'Farm Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="farm-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->farm_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->farm_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'farm_id',
            'farm_name',
            'elevation_farm_location',
            'village',
            'mandal',
            'district',
            'state',
            'survey_number',
            'total_area',
            'area_unit',
            'area_of_plot',
            'farmer_id',
        ],
    ]) ?>

</div>
