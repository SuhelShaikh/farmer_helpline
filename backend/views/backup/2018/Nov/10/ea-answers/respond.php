<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EaQuestions */

$this->title = 'Respond Questions: ';
$this->params['breadcrumbs'][] = ['label' => 'Pending Questions', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->query_id, 'url' => ['view', 'id' => $model->query_id]];
$this->params['breadcrumbs'][] = 'Respond';
?>
<div class="ea-questions-update">

    <?= $this->render('_response_form', [
        'model' => $model,
		'Quemodel' => $Quemodel,
    ]) ?>

</div>