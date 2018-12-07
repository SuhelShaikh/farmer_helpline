<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Manage Users';

?>
<!-- Main content -->
  <section class="content-header">
      <h1>
        Manage Farmers
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><?php echo Html::a("<i class='fa fa-dashboard'></i> Home", ['main/admin-dashboard']); ?></li>
        <li class="active">Manage Farmers</li>
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
                <?php echo Html::a("Add Farmer", ['farmers/create'],['class'=>'btn btn-primary btn-flat']); ?>
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
                        <th>Mobile Number</th>
                        <th>Birth Date</th>
                        <th>Gender</th>
                        <th>Call Details</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>             
                    <?php for($i=0;$i<count($data);$i++): ?>
                        <tr>
                            <td><?php echo $i+1; ?></td>
                            <td><?php echo $data[$i]['full_name']; ?></td>
                            <td><?php echo $data[$i]['mobile_no']; ?></td>
                            <td><?php echo $data[$i]['birth_date']; ?></td>
                            <td><?php echo $data[$i]['gender']; ?></td>
                            <td><?php echo Html::a("Call Details", ['farmers/call-details','id'=>$data[$i]['farmer_id']]); ?></td>
                            <td><?php echo Html::a("<i class='fa fa-edit'></i>", ['farmers/update','id'=>$data[$i]['farmer_id'],'tab'=>1]); ?>
                            <?php echo Html::a("<i class='fa fa-eye'></i>", ['farmers/profile','id'=>$data[$i]['farmer_id']]); ?></td>
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
