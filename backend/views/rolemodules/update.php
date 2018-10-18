<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RoleModules */

$this->title = 'Update Role Modules: ' . $model->role_module_id;
$this->params['breadcrumbs'][] = ['label' => 'Role Modules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->role_module_id, 'url' => ['view', 'id' => $model->role_module_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="role-modules-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
