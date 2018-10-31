<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserrelationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assign Farmers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-relation-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Assign Farmers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'ea_id',
                'value' => 'assignedEa.username'
            ],
            [
                'attribute' => 'farmer_id',
                'value' => 'userName.username'
            ],
            ['class' => 'yii\grid\ActionColumn',
        'template' => '{view}{delete}'],
        ],
    ]); ?>
</div>
