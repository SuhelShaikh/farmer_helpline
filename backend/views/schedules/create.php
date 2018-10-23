<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Schedules */

$this->title = 'Create Schedules';
$this->params['breadcrumbs'][] = ['label' => 'Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedules-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
