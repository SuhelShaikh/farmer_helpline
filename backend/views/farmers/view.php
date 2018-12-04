<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Farmers */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Farmers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="farmers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'farmer_fname',
            'farmer_mname',
            'farmer_lname',
            'mobile_no',
            'alt_mobile_no',
            'whatsapp_no',
            'village',
            'taluka',
            'district',
            'state',
            'cretaed_by',
            'cretaed_at',
            'status',
        ],
    ]) ?>

</div>
