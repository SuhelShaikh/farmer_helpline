<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FarmDetails */

$this->title = 'Farm Details';
//$this->params['breadcrumbs'][] = ['label' => 'Farm Details', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="farm-details-create">

    <h1 class="mt-0"><?= Html::encode($this->title) ?></h1>
	<div class="clearfix"></div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
