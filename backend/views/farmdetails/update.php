<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FarmDetails */

$this->title = 'Update Farm Details: ' . $model->farm_id;
$this->params['breadcrumbs'][] = ['label' => 'Farm Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->farm_id, 'url' => ['view', 'id' => $model->farm_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="farm-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
