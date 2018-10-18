<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Crops */

$this->title = 'Create Crops';
$this->params['breadcrumbs'][] = ['label' => 'Crops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crops-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
