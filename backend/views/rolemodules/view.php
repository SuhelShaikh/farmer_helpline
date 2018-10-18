<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\RoleModules */

$this->title = $model->role_module_id;
$this->params['breadcrumbs'][] = ['label' => 'Role Modules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-modules-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->role_module_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->role_module_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'role_module_id',
            'module_id',
            'role_id',
            'status',
            'created_by',
            'created_on',
        ],
    ]) ?>

</div>
