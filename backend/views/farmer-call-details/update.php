<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\FarmerCallDetails */

$this->title = 'Update Farmer Call Details: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Farmer Call Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="farmer-call-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
