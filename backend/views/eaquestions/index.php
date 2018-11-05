<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EaQuestionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ea Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ea-questions-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ea Questions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			[
				'attribute'=>'user_id',
				'value'=>'user.username'
				],
            'question:html',
            'image_path',
            'audio_video_path',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
