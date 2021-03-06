<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Role */

$this->title = 'Update Role: ' . $model->role_id;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->role_id, 'url' => ['view', 'id' => $model->role_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="role-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,		'assignModuleListError'=>$assignModuleListError,
    ]) ?>

</div>
