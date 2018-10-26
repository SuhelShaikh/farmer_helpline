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
    <?php
    $flag=1;
    foreach($data AS $models){
    ?>
        <?= Html::tag('div', $models->question, ['class' => 'question','align'=>'left']) ?>
         <?php if(isset($models->answer) && $models->answer != NULL){
            foreach($models->answer AS $answer){ ?>
            <?= Html::tag('div', $answer->response, ['class' => 'response','align'=>'right',]) ?>
            <?php } 
        }else{
           $flag=0;
         }?><hr>
    <?php } 
    if($flag==1){
        ?><div><?php
        $form = ActiveForm::begin(['action' => ['ea-questions/create'],'options' => ['method' => 'post']]); ?>
        <?= $form->field($model, 'user_id')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'token')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'question')->widget(CKEditor::className(), ['options' => ['rows' => 6],'preset' => 'basic']) ?>
        <div class="form-group">
            <?= Html::submitButton('Post', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end();?></div><?php
     } ?>


    
</div>