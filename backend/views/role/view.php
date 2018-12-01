<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Role */

$this->title = $model->role_id;
//$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?><div class="clearfix"></div>
<div class="role-view">	<div>		<h1 class="mt-0">			<?= Html::encode($this->title) ?>			<p class="pull-right">				<?= Html::a('Delete', ['delete', 'id' => $model->role_id], [					'class' => 'btn btn-danger',					'data' => [					'confirm' => 'Are you sure you want to delete this item?',					'method' => 'post',					],				]) ?>			</p>		</h1>	</div>	<div class="clearfix"></div>	<div class="table-responsive">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'role_id',
            'role_name',
            'status',
            'created_on',
            'updated_on',
        ],
    ]) ?>	</div>
</div>