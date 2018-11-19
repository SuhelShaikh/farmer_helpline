<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Role */

$this->title = 'Create Role';
//$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-create">

    <h1 class="mt-0"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'modulesData'=>$modulesData,
    ]) ?>

</div>
