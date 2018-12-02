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
<script src="../web/js/audiojs/audio.min.js"></script>
<script>
      audiojs.events.ready(function() {
        audiojs.createAll();
      });
    </script>
<div class="ea-questions-create">
    <?php
    $flag=1;
    foreach($data AS $models){
    ?>
	<div class="question">
		    <img src="images/default.png" alt="images/default.png" class="profile-img">&nbsp;
        <span style="font-weight:bold;color:#05059c;"><?= $models->user->username ?> </span>
		    <span><?php echo $models->question; ?></span>
        <?php if(isset($models->audio_video_path) && $models->audio_video_path != NULL && $models->audio_video_path!= ''){?>
            <audio src="../web/audio_file/<?= $models->audio_video_path ?>" preload="auto">TEST</audio>
        <?php } ?>
        <span style="float:right;">Asked On - <?php  echo $models->created_on; ?></span>  
		</div>
         <?php if(isset($models->answer) && $models->answer != NULL){ ?>
			     <div class="response">
            <img src="images/default.png" alt="images/default.png" class="profile-img">&nbsp;
			       <span style="font-weight:bold;color:grey;"><?= $models->userEa->username ?></span>
		        	<span><?php echo $models->answer->response; ?></span>
              <span style="float:right;">Replied On - <?php  echo $models->created_on; ?></span>  
			     </div>
            <?php 
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