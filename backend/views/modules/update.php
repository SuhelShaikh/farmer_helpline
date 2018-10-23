<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Modules */

$this->title = 'Update Modules: ' . $model->modules_id;
$this->params['breadcrumbs'][] = ['label' => 'Modules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->modules_id, 'url' => ['view', 'id' => $model->modules_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="modules-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
