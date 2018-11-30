<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AlertMaster */

$this->title = 'Update Alert Messages';

?>
<div class="alert-master-update">

    <h1 class="mt-0"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
