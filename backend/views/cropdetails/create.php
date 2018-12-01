<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CropDetails */

$this->title = 'Crop Details';
//$this->params['breadcrumbs'][] = ['label' => 'Crop Details', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crop-details-create">

    <h1 class="mt-0"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
