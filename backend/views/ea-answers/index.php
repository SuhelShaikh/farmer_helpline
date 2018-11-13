<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use backend\models\EaQuestions;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EaAnswersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Answers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ea-answers-index">
<?php //echo "<pre>";print_r($searchModel);?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        /*'rowOptions'=>function($searchModel){
            if($searchModel->answer == ""){
                return ['class' => 'danger'];
            }
        },*/
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             'question:html',
            /*[
              'attribute'=>'ea_question_id',
              'format'=>'html',
              'value'=>'eaQuestion.question'
              ], */
            [
                'attribute' => 'user_id',
                'value' => 'userEa.username'
            ],
            [
                'attribute' => 'response',
                'format'=>'html',
                'value' => 'answer.response',
                'options'=>[ 'style'=>'font-size:bold' ]
            ],
            /*[
              'attribute' => 'Pending Question Count',
              'format'=> 'html',
              'value' => function ($dataProvider) {
                   return  EaQuestions::getPendingQuestionCount($dataProvider->token);
               },
            ],*/
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
            'buttons' => [
            'view' => function ($url, $dataProvider) {
                $url = Url::to(['ea-answers/view', 'id' => $dataProvider->query_id]);
                return Html::a('<span class="fa fa-eye"></span>', $url, ['title' => 'view']);
                }],
            ],
        ],
    ]);
    ?>
</div>
