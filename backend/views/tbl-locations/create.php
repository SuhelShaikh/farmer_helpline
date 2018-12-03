<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblLocations */

$this->title = 'Create Tbl Locations';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-locations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
