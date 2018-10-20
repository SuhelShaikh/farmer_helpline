<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EaQuestionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Answers';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
?>
<div class="ea-answers-create">
 <?php //echo "<pre>"; print_r($questionModel); ?>

    

    <?php
    foreach($data AS $models){
    ?>
        <?= Html::tag('div', $models->question, ['class' => 'question','align'=>'left']) ?>
         <?php foreach($models->answer AS $answer){ ?>
        <?= Html::tag('div', $answer->response, ['class' => 'response','align'=>'right','style'=>'background-color:#f9f9f9']) ?>
         <?php } ?>
         <hr>
    <?php } 
    if(!empty($questionModel)){
    ?><?php foreach($questionModel AS $quesnModel){ ?>
        <?= Html::tag('div', $quesnModel->question, ['class' => 'question','align'=>'left']) ?>
       <?php
   }
         $form = ActiveForm::begin(['action' => ['ea-answers/create'],'options' => ['method' => 'post']]); ?>

    <?= $form->field($model, 'ea_id')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'ea_question_id')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'token')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'response')->widget(CKEditor::className(), ['options' => ['rows' => 6],'preset' => 'basic']) ?>
    <div class="form-group">
        <?= Html::submitButton('Post', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); }?>


    
</div>