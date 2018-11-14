<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\EaQuestions */

$this->title = $model->query_id;
$this->params['breadcrumbs'][] = ['label' => 'Ea Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ea-questions-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->query_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->query_id], [
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
            'query_id',
            'user_id',
            'question:ntext',
            'image_path',
            'audio_video_path',
            'created_on',
            'updated_on',
            'status',
        ],
    ]) ?>

</div>
