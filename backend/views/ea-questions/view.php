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
	<div class="question">
		<span style="font-weight:bold;color:#05059c;">Farmer Asked </span>
		<span><?php echo $models->question; ?></span>
		</div>
         <?php if(isset($models->answer) && $models->answer != NULL){
            foreach($models->answer AS $answer){ ?>
			<div class="response">
			<span style="font-weight:bold;color:grey;">Admin Replied</span>
			<span><?php echo $answer->response; ?></span>
			</div>
            <?php } 
        }else{
           $flag=0;
         }?><hr>
    <?php } 
    if($flag==1){
        ?><div class="col-md-12"><?php
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