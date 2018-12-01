<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SmsManagement */

$this->title = $model->sms_mng_id;
//$this->params['breadcrumbs'][] = ['label' => 'Sms Managements', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sms-management-view">

    <h1 class="mt-0">
		<?= Html::encode($this->title) ?>

		<p class="pull-right">
			<?= Html::a('Update', ['update', 'id' => $model->sms_mng_id], ['class' => 'btn btn-primary']) ?>
			<?= Html::a('Delete', ['delete', 'id' => $model->sms_mng_id], [
				'class' => 'btn btn-danger',
				'data' => [
					'confirm' => 'Are you sure you want to delete this item?',
					'method' => 'post',
				],
			]) ?>
		</p>
	</h1>
	<div class="clearfix">&nbsp;</div>
	<div class="table-responsive w-100">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sms_mng_id',
            'sms_gateway_name',
            'sms_gateway_security',
            'sms_gateway_key',
            'sms_gateway_url:url',
            'status',
            'created_on',
            'updated_on',
        ],
    ]) ?>
	</div>
</div>
