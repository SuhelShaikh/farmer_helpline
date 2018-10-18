<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\RoleModules */

$this->title = 'Create Role Modules';
$this->params['breadcrumbs'][] = ['label' => 'Role Modules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-modules-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
