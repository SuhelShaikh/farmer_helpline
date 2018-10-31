<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EaQuestionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ea-questions-pending">
<?php //echo "<pre>";print_r($dataProvider);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'question:html',
            [
                'attribute' => 'user_id',
                'value' => 'userEa.username'
            ],
            'created_on',
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}'],
        ],
    ]); ?>
</div>