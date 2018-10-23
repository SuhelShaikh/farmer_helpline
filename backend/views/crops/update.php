<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Crops */

$this->title = 'Update Crops: ' . $model->crop_id;
$this->params['breadcrumbs'][] = ['label' => 'Crops', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->crop_id, 'url' => ['view', 'id' => $model->crop_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="crops-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
