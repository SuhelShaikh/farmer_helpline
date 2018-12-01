<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SmsManagement */

$this->title = 'Update Sms Management: ' . $model->sms_mng_id;
$this->params['breadcrumbs'][] = ['label' => 'Sms Managements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sms_mng_id, 'url' => ['view', 'id' => $model->sms_mng_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sms-management-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'status' => $status,
    ]) ?>

</div>
