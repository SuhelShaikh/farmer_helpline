<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\MasterCallResponse;
//use kartik\widgets\Select2;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
$this->title = 'Call Details';
$callResponse=ArrayHelper::map(MasterCallResponse::find()->where(['status'=>1])->all(), 'id', 'name');
?>
<!-- Main content -->
  <section class="content-header">
      <h1>
        Call Details
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><?php echo Html::a("<i class='fa fa-dashboard'></i> Home", ['main/admin-dashboard']); ?></li>
        <li><?php echo Html::a("Manage Farmers", ['farmers/index']); ?></li>
        <li class="active">Call Details</li>
      </ol>
  </section>
  <hr />
  <section class="content">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
      <div class="col-sm-12">
        
        <div class="panel-group" id="accordion">
            <?php for($i=0;$i<count($data);$i++): ?>
              <div class="panel panel-default">
                <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#collapse_<?php echo $i; ?>">
                  <h4 class="panel-title">
                    <a><?php echo $data[$i]['call_date_time']; ?></a>
                  </h4>
                </div>
                <div id="collapse_<?php echo $i; ?>" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-2">
                         <b>Call Duration: </b>
                      </div>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="<?php echo $data[$i]['call_duration']; ?>" disabled="true" />
                      </div>
                      <div class="col-sm-2">
                         <b>Call Response: </b>
                      </div>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" value="<?php echo $data[$i]['name']; ?>" disabled="true" />
                      </div>
                    </div><br />
                    <div class="row">
                      <div class="col-sm-2">
                         <b>Remark: </b>
                      </div>
                      <div class="col-sm-4">
                        <textarea class="form-control" disabled="true"><?php echo $data[$i]['call_remark']; ?></textarea>
                      </div>
                    </div><br />
                    <div class="row">
                      <div class="col-md-12">
                        <table id="myTable" class="table table-bordered">
                          <thead>
                              <tr>
                                  <th>Sr. No.</th>
                                  <th>Question</th>
                                  <th>Answer</th>
                              </tr>
                          </thead>
                          <tbody>             
                              <?php for($n=0;$n<count($data[$i]['call_questions']);$n++): ?>
                                  <tr>
                                      <td><?php echo $n+1; ?></td>
                                      <td><?php echo $data[$i]['call_questions'][$n]['question']; ?></td>
                                      <td><?php echo $data[$i]['call_questions'][$n]['answer']; ?></td>
                                  </tr>
                              <?php endfor; ?>
                          </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endfor; ?>
        </div>  
             
      </div>
    </div>
    <?php ActiveForm::end(); ?>
  </section>