<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EaAnswers */

$this->title = 'Create Ea Answers';
$this->params['breadcrumbs'][] = ['label' => 'Ea Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ea-answers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
