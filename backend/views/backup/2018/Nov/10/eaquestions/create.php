<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EaQuestions */

$this->title = 'Create Ea Questions';
$this->params['breadcrumbs'][] = ['label' => 'Ea Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ea-questions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
