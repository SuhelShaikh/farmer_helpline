<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use frontend\models\Farmers;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
$this->title = 'View Call Details';

$executiveId=Yii::$app->user->identity->id;
$farmers=ArrayHelper::map(Farmers::find()->where(['status'=>1,'tagged_to'=>$executiveId])->orderBy('mobile_no')->all(), 'id', 'mobile_no');
?>
<!-- Main content -->
  <section class="content-header">
      <h1>
        View Call Details
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><?php echo Html::a("<i class='fa fa-dashboard'></i> Home", ['main/executive-dashboard']); ?></li>
        <li><?php echo Html::a("Manage Calls", ['farmer-call-details/index']); ?></li>
        <li class="active">View Call</li>
      </ol>
  </section>
  <hr />
  
  <section class="content">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
      <div class="row">
        <div class="col-sm-2">
           <b>Mobile No.: </b>
        </div>
        <div class="col-sm-4">
          <?php
              echo $form->field($model, 'farmer_id')->label(FALSE)->widget(Select2::classname(), [
                  'data' => $farmers,
                  'options' =>[
                      'placeholder' => '----- Search -----',
                  ],
                  'pluginOptions' => [
                      'allowClear' => true,
                  ],
                ]);
          ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">
           <b>First Name: </b>
        </div>
        <div class="col-sm-4 form-group">
          <input type="text" disabled="true" id="f_name" class="form-control">
        </div>
        <div class="col-sm-2">
           <b>Middle Name: </b>
        </div>
        <div class="col-sm-4 form-group">
          <input type="text" disabled="true" id="m_name" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">
           <b>Last Name: </b>
        </div>
        <div class="col-sm-4 form-group">
          <input type="text" disabled="true" id="l_name" class="form-control">
        </div>
        <div class="col-sm-2">
           <b>Birth Date: </b>
        </div>
        <div class="col-sm-4 form-group">
          <input type="text" disabled="true" id="birth_date" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">
           <b>Call Duration: </b>
        </div>
        <div class="col-sm-4">
          <?php echo $form->field($model, 'call_duration')->textInput(['class'=>'form-control','placeholder'=>'Call Duration','disabled'=>true])->label(false); ?>
        </div>
        <div class="col-sm-2">
           <b>Call Response: </b>
        </div>
        <div class="col-sm-4">
          <?php
              echo $form->field($model, 'call_response')->label(FALSE)->widget(Select2::classname(), [
                  'data' => [1=>'Switch Off',2=>'Not Answered',3=>'Busy',4=>'Out of Range',5=>'Answered'],
                  'options' =>[
                      'placeholder' => '----- Select -----',
                      'disabled'=>true
                  ],
                  'pluginOptions' => [
                      'allowClear' => true,
                  ],
                ]);
          ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">
           <b>Question: </b>
        </div>
        <div class="col-sm-4">
          <?php echo $form->field($model, 'question')->textArea(['class'=>'form-control','placeholder'=>'Question','disabled'=>true])->label(false); ?>
        </div>
        <div class="col-sm-2">
           <b>Answer: </b>
        </div>
        <div class="col-sm-4">
          <?php echo $form->field($model, 'answer')->textArea(['class'=>'form-control','placeholder'=>'Answer','disabled'=>true])->label(false); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">
           <b>Remark: </b>
        </div>
        <div class="col-sm-4">
          <?php echo $form->field($model, 'call_remark')->textArea(['class'=>'form-control','placeholder'=>'Call Remark','disabled'=>true])->label(false); ?>
        </div>
      </div>
    <?php ActiveForm::end(); ?>
  </section>
