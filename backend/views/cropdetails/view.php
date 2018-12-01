<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CropDetails */

$this->title = $model->crop_id;
$this->params['breadcrumbs'][] = ['label' => 'Crop Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crop-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->crop_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->crop_id], [
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
            'crop_id',
            'farmer_id',
            'crop_name',
            'crop_type',
        ],
    ]) ?>

</div>
