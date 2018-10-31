<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EaQuestionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Answers';
//$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
?>
<div class="ea-answers-create form-group">
     <?php
     $flag = 1;
    foreach($data AS $models){
    ?>
        <?= Html::tag('div', $models->question, ['class' => 'question']) ?>
        <?php if(isset($models->answer) && $models->answer != NULL){
            foreach($models->answer AS $answer){ ?>
            <?= Html::tag('div ', $answer->response, ['class' => 'response']) ?>
            <?php }
            $flag=0; ?>
         <hr>
    <?php }else{
        $flag=1;
        $model['ea_question_id'] = $models->query_id;
    } 
}?>
<div class="col-md-12"><?php
    if($flag == 1){
        $form = ActiveForm::begin(['action' => ['ea-answers/create'],'options' => ['method' => 'post']]); ?>
        <?= $form->field($model, 'ea_id')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'ea_question_id')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'token')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'response')->widget(CKEditor::className(), ['options' => ['rows' => 6],'preset' => 'basic']) ?>
        <div class="form-group">
            <?= Html::submitButton('Post', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end();
    } ?></div>    
</div>