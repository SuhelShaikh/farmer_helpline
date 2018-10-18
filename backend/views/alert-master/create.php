<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AlertMaster */

$this->title = 'Create Alert Master';
$this->params['breadcrumbs'][] = ['label' => 'Alert Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alert-master-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
