<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserRelation */

$this->title = $model->relation_id;
//$this->params['breadcrumbs'][] = ['label' => 'Assign Farmer', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clearfix"></div>
<div class="user-relation-view">
	<div>
		<p class="pull-right">
			<?= '';//Html::a('Update', ['update', 'id' => $model->relation_id], ['class' => 'btn btn-primary']) ?>
			<?= Html::a('Delete', ['delete', 'id' => $model->relation_id], [
				'class' => 'btn btn-danger',
				'data' => [
					'confirm' => 'Are you sure you want to delete this item?',
					'method' => 'post',
				],
			]) ?>
		</p>
	</div>
	<div class="clearfix"></div>
	<div class="table-responsive">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'relation_id',
            [
              'label' => 'EA',
              'attribute' => 'ea_id',
              'value' => $model->assignedEa->username,
            ],
            [
              'label' => 'Farmer',
              'attribute' => 'farmer_id',
              'value' => $model->userName->username,
            ],
        ],
    ]) ?>
	</div>
</div>