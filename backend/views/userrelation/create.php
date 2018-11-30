<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserRelation */

$this->title = 'Assign Farmer';
//$this->params['breadcrumbs'][] = ['label' => 'Assign Farmer', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-relation-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
