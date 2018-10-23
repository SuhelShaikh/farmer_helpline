<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Schedules */

$this->title = 'Update Schedules: ' . $model->sched_id;
$this->params['breadcrumbs'][] = ['label' => 'Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sched_id, 'url' => ['view', 'id' => $model->sched_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="schedules-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
