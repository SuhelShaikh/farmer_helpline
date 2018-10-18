<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EaAnswers */

$this->title = 'Update Ea Answers: ' . $model->ea_resp_id;
$this->params['breadcrumbs'][] = ['label' => 'Ea Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ea_resp_id, 'url' => ['view', 'id' => $model->ea_resp_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ea-answers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
