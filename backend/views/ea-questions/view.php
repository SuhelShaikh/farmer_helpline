<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EaQuestionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Questions';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
?>
<div class="ea-questions-create">
 <?php //echo "<pre>"; print_r($questionModel); ?>

    

    <?php
    foreach($data AS $models){
    ?>
        <?= Html::tag('div', $models->question, ['class' => 'question','align'=>'left']) ?><br>
         <?php foreach($models->answer AS $answer){ ?>
        <?= Html::tag('div', $answer->response, ['class' => 'response','align'=>'right',]) ?>
         <?php } ?>
         <hr>
    <?php } 
    if(!empty($questionModel)){
    foreach($questionModel AS $quesnModel){
    ?>
        <?= Html::tag('div', $quesnModel->question, ['class' => 'question','align'=>'left']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $quesnModel->query_id], [
            'style'=>'float:right',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>&nbsp;
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $quesnModel->query_id], ['style'=>'float:right']) ?>
    <?php } 
    }else{ $form = ActiveForm::begin(['action' => ['ea-questions/create'],'options' => ['method' => 'post']]); ?>

    <?= $form->field($model, 'user_id')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'token')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'question')->widget(CKEditor::className(), ['options' => ['rows' => 6],'preset' => 'basic']) ?>
    <div class="form-group">
        <?= Html::submitButton('Post', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); }?>


    
</div>