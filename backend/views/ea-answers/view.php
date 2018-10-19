<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\EaAnswers */

$this->title = $model->ea_resp_id;
$this->params['breadcrumbs'][] = ['label' => 'Ea Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ea-answers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ea_resp_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ea_resp_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ea_resp_id',
            'eaQuestion.question',
            'ea.username',
            'response:html',
            'created_on',
            'updated_on',
        ],
    ]) ?>

</div>
