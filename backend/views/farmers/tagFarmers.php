<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\User;
use yii\helpers\ArrayHelper;
//use kartik\widgets\Select2;
use kartik\select2\Select2;
$this->title = 'Tag Users';

$executives=ArrayHelper::map(User::find()->orderBy('username')->all(), 'id', 'username');
?>
<!-- Main content -->
  <section class="content-header">
      <h1>
        Tag Farmers
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><?php echo Html::a("<i class='fa fa-dashboard'></i> Home", ['main/admin-dashboard']); ?></li>
        <li class="active">Tag Farmers</li>
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
        <br />
      <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
      <div class="row">
        <div class="col-md-2">
          <label>Select Executive: </label>
        </div>
        <div class="col-md-4">
          <?php
            echo $form->field($model, 'executive_id')->widget(Select2::classname(), [
                 'data' => $executives,
                  'options' =>['placeholder' => 'Select Executive'],
                  'pluginOptions' => [
                      'allowClear' => true,
                  ],
            ])->label(false);
          ?>
        </div>
      </div>
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
                        <th>Tagged To</th>
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
                            <td><?php echo $data[$i]['tagged_name']; ?></td>
                            <td><input type="checkbox" value="<?php echo $data[$i]['farmer_id']; ?>"></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <?php echo Html::Button("Submit",['class'=>'btn btn-primary btn-flat','id'=>'btnSubmit','onclick'=>'getempcode();']); ?>
      </div>
    </div>
    <?php ActiveForm::end(); ?>
  </section>

  <?php
    $script="$('#myTable').DataTable();"; 
    $this->registerJs($script);
?>
<script>

function getempcode(){
    var executiveId=$("#farmers-executive_id").val();
    if(executiveId==""){
      alert("Please select executive");
      return false;
    }
    var vals = "";
    var oTable = $("#myTable").dataTable();
    $("input:checkbox", oTable.fnGetNodes()).each(function () {
        var tuisre = $(this).is(":checked");
        if (tuisre) {
            vals += ","+ $(this).val();
        }
    });
    vals = vals.substring(1);
    if(vals){
        
        var url="<?php echo Yii::$app->urlManager->createAbsoluteUrl('farmers/tag-farmers-to-exe'); ?>";
        $.ajax({
            url:url,
            type:"POST",
            data:{"executiveId":executiveId,"vals":vals},
            success:function(response){
                alert(response);
            }
        });
    }else{
      alert("Please select at least one farmer");
      return false;
   
    }
}
</script>