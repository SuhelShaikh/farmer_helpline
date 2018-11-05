<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Crops */

$this->title = $model->crop_id;
$this->params['breadcrumbs'][] = ['label' => 'Crops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crops-view">

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
            'crop_name',
            'crop_desc:ntext',
            'image',
            'status',
            'created_on',
            'updated_on',
        ],
    ]) ?>

</div>
