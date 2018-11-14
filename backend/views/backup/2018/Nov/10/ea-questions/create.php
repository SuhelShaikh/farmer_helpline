<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EaQuestions */

$this->title = 'Ask Questions';
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ea-questions-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
