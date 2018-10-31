<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UserRelation */

$this->title = 'Update User Relation: ' . $model->relation_id;
$this->params['breadcrumbs'][] = ['label' => 'User Relations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->relation_id, 'url' => ['view', 'id' => $model->relation_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-relation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
