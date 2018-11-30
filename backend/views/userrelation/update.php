<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UserRelation */

$this->title = 'Update Assigned Farmer: ' . $model->relation_id;
$this->params['breadcrumbs'][] = ['label' => 'User Relations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->relation_id, 'url' => ['view', 'id' => $model->relation_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-relation-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
