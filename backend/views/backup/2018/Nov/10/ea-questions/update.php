<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EaQuestions */

$this->title = 'Update Ea Questions: ' . $model->query_id;
$this->params['breadcrumbs'][] = ['label' => 'Ea Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->query_id, 'url' => ['view', 'id' => $model->query_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ea-questions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
