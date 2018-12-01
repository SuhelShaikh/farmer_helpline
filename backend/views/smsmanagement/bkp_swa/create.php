<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SmsManagement */

$this->title = 'Create Sms Management';
$this->params['breadcrumbs'][] = ['label' => 'Sms Managements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sms-management-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'status' => $status,
    ]) ?>

</div>
