<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EaAnswersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ea Answers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ea-answers-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ea Answers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
              'attribute'=>'ea_question_id',
              'value'=>'eaQuestion.question'
              ], 
            [
                'attribute' => 'ea_id',
                'value' => 'ea.username'
            ],
            'response:html',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
