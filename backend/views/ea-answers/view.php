<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use backend\models\User;
use yii\filters\AccessControl;

$path = '/farmer_helpline/backend/web/uploads/user/photo/';
$path1 = '/farmer_helpline/backend/web/images/';
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EaQuestionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Answers';
//$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
?>

    <script src="js/audiojs/audio.min.js"></script>
    <script>
      audiojs.events.ready(function() {
        audiojs.createAll();
      });
    </script>
<div class="ea-answers-create form-group">
<div class="clearfix"></div>
<div class="col-md-12 chat-wrapper">
	<ul>	
	<?php
     $flag = 1;
    foreach($data AS $models){
    ?>
		<li>
			<div class="question">
				<table style="width:100%" border="0">
					<tr>
						<td style="width:50px;"> <img src="<?php echo $path1; ?>/default.png" alt="images/default.png" class="profile-img" /> </td>
						<td> 
							<p style="font-weight:bold;color:#05059c;margin-bottom:0px;"><?= $models->user->username ?> </p>
							<span><?php echo $models->question; ?></span>
							<?php //echo '2323'.$models->audio_video_path; ?>
							<?php if(isset($models->audio_video_path) && $models->audio_video_path != NULL && $models->audio_video_path!= ''){?>
								<audio src="../web/audio_file/<?= $models->audio_video_path ?>" preload="auto">TEST</audio>
							<?php } ?>
							<span style="float:right;"><small class="font-weight-bold">Asked On - <?php  echo $models->created_on; ?></small></span>
						</td>
					</tr>
				</table>	
			</div>
		</li>
        <!--?= Html::tag('div', $models->question, ['class' => 'question']) ?-->
        <?php if(isset($models->answer) && $models->answer != NULL){ ?>
		<li>
			<div class="response">
				<table style="width:100%" border="0">
					<tr>
						<td style="width:50px;"> <img src="<?php echo $path1; ?>/default.png" alt="images/default.png" class="profile-img" /> </td>
						<td>
							<p style="font-weight:bold;color:grey;margin-bottom:0px;"><?= $models->userEa->username ?></p>
							<span><?php  echo $models->answer->response; ?></span>
							<span style="float:right;"><small class="font-weight-bold">Replied On - <?php  echo $models->answer->created_on; ?></small></span>
						</td>
					</tr>
				</table>		
			</div>
		</li>	
            <!--?= Html::tag('div ', $answer->response, ['class' => 'response']) ?-->
          <?php $flag=0; ?>
         <hr>
    <?php }else{
        $flag=1;
        $model['ea_question_id'] = $models->query_id;
    } 
}?>
</ul>
</div>
<div class="clearfix"></div>
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
<div class="clearfix"></div>