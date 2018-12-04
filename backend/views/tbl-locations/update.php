<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblLocations */

$this->title = 'Update Tbl Locations: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-locations-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
