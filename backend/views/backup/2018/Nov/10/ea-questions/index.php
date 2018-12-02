<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EaQuestionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Questions';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->registerJsFile('js/audiojs/audio.min.js', [yii\web\JqueryAsset::className()]); ?> 
<script>
      audiojs.events.ready(function() {
        audiojs.createAll();
      });
    </script>
<div class="ea-questions-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Ask Questions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'question:html',
            'audio_video_path',
            
           /* [
                'value' => '<audio src="http://kolber.github.io/audiojs/demos/mp3/juicy.mp3" preload="auto"></audio>',
            ],*/
            /*[
              'attribute' => 'Pending Question Count',
              'filter' => false,
              'format' => 'raw',
              'value' => function ($dataProvider) {
                   return  $dataProvider->getPendingQuestionCount($dataProvider->query_id);
               },
            ],*/
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}'],
        ],
    ]); ?>
</div>
