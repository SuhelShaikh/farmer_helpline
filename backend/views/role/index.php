<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">
	<div>
		<h1 class="mt-0">
			<?= Html::encode($this->title) ?>
			<p class="pull-right"><?= Html::a('Create Role', ['create'], ['class' => 'btn btn-success']) ?></p>
		</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<div class="clearfix"></div>
    <div class="table-responsive w-100">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        //	['class' => 'yii\grid\SerialColumn'],

          //  'role_id',
            'role_name',
            'status',
         //   'created_on',
           // 'updated_on',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {delete}'],
        ],
    ]); ?>
	</div>
</div>