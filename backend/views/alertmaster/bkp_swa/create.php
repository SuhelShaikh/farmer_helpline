<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AlertMaster */

$this->title = 'Create Alert Messages';
?>
<div class="alert-master-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
