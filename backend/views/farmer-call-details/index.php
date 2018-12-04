<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Manage Calls';

?>
<!-- Main content -->
  <section class="content-header">
      <h1>
        Manage Calls
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><?php echo Html::a("<i class='fa fa-dashboard'></i> Home", ['main/executive-dashboard']); ?></li>
        <li class="active">Manage Calls</li>
      </ol>
  </section>
  <hr />
  <section class="content">
      <?php if (Yii::$app->session->hasFlash('insert')): ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong><?= Yii::$app->session->getFlash('insert') ?></strong>
                </div>
            </div>
        </div>
      <?php endif; ?>
        <div class="row">
            <div class="col-md-12 text-right">
                <?php echo Html::a("New Call", ['farmer-call-details/create'],['class'=>'btn btn-primary btn-flat']); ?>
            </div>
        </div>
        <br />
      <div class="row">
        <div class="col-sm-12">
            
            <table id="myTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Farmer Name</th>
                        <th>Call Duration</th>
                        <th>Call Date Time</th>
                        <th>Remark</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>             
                    <?php for($i=0;$i<count($data);$i++): ?>
                        <tr>
                            <td><?php echo $i+1; ?></td>
                            <td><?php echo $data[$i]['farmer_name']; ?></td>
                            <td><?php echo $data[$i]['call_duration']; ?></td>
                            <td><?php echo $data[$i]['call_date_time']; ?></td>
                            <td><?php echo $data[$i]['call_remark']; ?></td>
                            <td><?php echo Html::a("<i class='fa fa-eye'></i>", ['farmer-call-details/view','id'=>$data[$i]['id']]); ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>

  </section>

  <?php
    $script="$('#myTable').DataTable();"; 
    $this->registerJs($script);
?>