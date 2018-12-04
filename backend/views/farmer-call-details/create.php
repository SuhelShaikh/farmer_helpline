<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use frontend\models\Farmers;
use frontend\models\MasterCallResponse;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
$this->title = 'New Call';

$executiveId=Yii::$app->user->identity->id;
$farmers=ArrayHelper::map(Farmers::find()->where(['status'=>1,'tagged_to'=>$executiveId])->orderBy('mobile_no')->all(), 'id', 'mobile_no');
$callResponse=ArrayHelper::map(MasterCallResponse::find()->where(['status'=>1])->all(), 'id', 'name');
?>
<!-- Main content -->
  <section class="content-header">
      <h1>
        New Call
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><?php echo Html::a("<i class='fa fa-dashboard'></i> Home", ['main/executive-dashboard']); ?></li>
        <li><?php echo Html::a("Manage Calls", ['farmer-call-details/index']); ?></li>
        <li class="active">Add New Call</li>
      </ol>
  </section>
  <hr />
  
  <section class="content">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
      <div class="row">
      	<div class="col-sm-2">
           <b>Select Farmer: </b>
        </div>
        <div class="col-sm-4">
          <?php
              echo $form->field($model, 'farmer_id')->label(FALSE)->widget(Select2::classname(), [
                  'data' => $farmers,
                  'options' =>[
                      'placeholder' => '----- Search -----',
                      'onchange'=>'getFarmerDetails(this.value);'
                  ],
                  'pluginOptions' => [
                      'allowClear' => true,
                  ],
                ]);
          ?>
        </div>
        <div class="col-md-6">
        	<span>If mobile number not found, then <?php echo Html::a("Click Here", ['farmers/create']); ?> to add Farmer</span>
            
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
          <?php echo $form->field($model, 'call_duration')->textInput(['class'=>'form-control','placeholder'=>'Call Duration'])->label(false); ?>
        </div>
        <div class="col-sm-2">
           <b>Call Response: </b>
        </div>
        <div class="col-sm-4">
          <?php
              echo $form->field($model, 'call_response')->label(FALSE)->widget(Select2::classname(), [
                  'data' => $callResponse,
                  'options' =>[
                      'placeholder' => '----- Select -----'
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
           <b>Remark: </b>
        </div>
        <div class="col-sm-4">
          <?php echo $form->field($model, 'call_remark')->textArea(['class'=>'form-control','placeholder'=>'Call Remark'])->label(false); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 text-right">
            <?php echo Html::Button("Add Questions",['class'=>'btn btn-primary btn-flat','id'=>'btnSubmit','data-toggle'=>'modal','data-target'=>'#questionModel']); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
            
            <table id="myTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
      <div class="row">
        <div class="col-sm-12">
            <?php echo Html::submitButton("Submit",['class'=>'btn btn-primary btn-flat','id'=>'btnSubmit']); ?>
            <?php echo Html::resetButton("Reset",['class'=>'btn btn-default btn-flat']); ?>
        </div>
      </div>
    <?php ActiveForm::end(); ?>
  </section>
  <div id="questionModel" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Question</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-2">
              <b>Question: </b>
            </div>
            <div class="col-sm-10">
              <?php echo $form->field($model, 'question')->textArea(['class'=>'form-control','placeholder'=>'Question'])->label(false); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
               <b>Answer: </b>
            </div>
            <div class="col-sm-10">
              <?php echo $form->field($model, 'answer')->textArea(['class'=>'form-control','placeholder'=>'Answer'])->label(false); ?>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="row">
              <div class="col-sm-12">
                  <?php echo Html::Button("Add",['class'=>'btn btn-primary btn-flat','onclick'=>'addQuestion();']); ?>
              </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <script type="text/javascript">
  	function getFarmerDetails(farmerId){
  		var url="<?php echo Yii::$app->urlManager->createAbsoluteUrl('farmer-call-details/get-farmer-details'); ?>";
  		$.ajax({
            url:url,
            type:'POST',
            data:{'farmerId':farmerId},
            success:function(response){
            	//alert(response);
                var jsonData=JSON.parse(response);
                $("#f_name").val(jsonData[0]['f_name']);
                $("#m_name").val(jsonData[0]['m_name']);
                $("#l_name").val(jsonData[0]['l_name']);
                $("#birth_date").val(jsonData[0]['birth_date']);
            }
        });
  	}

    function addQuestion(){
      var question=$("#farmercalldetails-question").val().trim();
      if(question==""){
        alert("Please enter question.");
        return false;
      }
      var answer=$("#farmercalldetails-answer").val().trim();
      if(answer==""){
        alert("Please enter answer.");
        return false;
      }

      var table=document.getElementById("myTable");
      var row=table.insertRow();
      var cell1=row.insertCell(0);
      var cell2=row.insertCell(1);
      var cell3=row.insertCell(2);
      var cell4=row.insertCell(3);

      var rowCount = $('#myTable tr').length;
      rowCount--;
      cell1.innerHTML=rowCount;
      cell2.innerHTML=question+"<input type='hidden' name='question[]' value='"+question+"' />";
      cell3.innerHTML=answer+"<input type='hidden' name='answer[]' value='"+answer+"' />";
      cell4.innerHTML="<a href='#' onclick='removeQuestion(this);'><i class='fa fa-trash'></i></a>";

      $("#questionModel").modal("toggle");
    }
    function removeQuestion(ele){
      $(ele).closest("tr").remove();
      var i=1;
      $('#myTable > thead > tr:gt(0)').each(function() {
          $(this).find("td:eq(0)").html(i);
          i++;
      });
    }
  </script>
