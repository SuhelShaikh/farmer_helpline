<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CropDetails */

$this->title = 'Update Crop Details: ' . $model->crop_id;
$this->params['breadcrumbs'][] = ['label' => 'Crop Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->crop_id, 'url' => ['view', 'id' => $model->crop_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="crop-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
