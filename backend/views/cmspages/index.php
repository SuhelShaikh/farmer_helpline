<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CmsPagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cms Pages';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-pages-index">
	<div>
		<h1 class="mt-0">
			<?= Html::encode($this->title) ?>
			<p class="pull-right"><?= Html::a('Create Cms Pages', ['create'], ['class' => 'btn btn-success']) ?></p>
		</h1>
	</div>	
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<div class="clearfix"></div>
    <div class="table-responsive w-100">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'title',
            'content:html',
            'updated_by',
            'updated_on',

            ['class' => 'yii\grid\ActionColumn',
			'template' => '{update}',],
        ],
    ]); ?>
	</div>
</div>