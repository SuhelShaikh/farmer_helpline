<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use kartik\widgets\Select2;
use kartik\select2\Select2;
//use kartik\widgets\DatePicker;
use kartik\date\DatePicker;
use backend\models\TblLocations;
use backend\models\User;
use yii\helpers\ArrayHelper;
use	yii\helpers\Url;
use backend\models\FarmDetails;
$this->title = 'Update Farmer';
$farmData =FarmDetails::find()->where(['farmer_id'=>$_REQUEST['id']])->all();
//$states=ArrayHelper::map(TblLocations::find()->where(['status'=>1,'type'=>1])->orderBy('name')->all(), 'id', 'name');
$model->age=date_diff(date_create($model->birth_date), date_create('today'))->y;
$tagTo=ArrayHelper::map(User::find()->where(['status'=>10])->orderBy('username')->all(), 'id', 'username');
//$type=Yii::$app->user->identity->type;
?>
<!-- Main content -->
  <section class="content-header">
      <h1>
        Update Farmer
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><?php echo Html::a("<i class='fa fa-dashboard'></i> Home", ['main/admin-dashboard']); ?></li>
        <li><?php echo Html::a("Manage Farmers", ['farmers/index']); ?></li>
        <li class="active">Update Farmer</li>
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
    <?php if(isset($_SESSION['farmInsert'])): ?>
    	<div class="row">
            <div class="col-sm-12">
                <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong><?= $_SESSION['farmInsert']; ?></strong>
                </div>
            </div>
        </div>
        <?php unset($_SESSION["farmInsert"]); ?>
    <?php endif; ?>
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel-group" id="accordion">
			    <div class="panel panel-default">
			      <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#collapse1">
			        <h4 class="panel-title">
			          <a>Personal Details</a>
			        </h4>
			      </div>
			      <div id="collapse1" class="panel-collapse collapse">
			        <div class="panel-body">
			        	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
					      <div class="row">
					        <div class="col-sm-2">
					           <b>First Name: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php echo $form->field($model, 'first_name')->textInput(['class'=>'form-control','placeholder'=>'First Name'])->label(false); ?>
					        </div>
					        <div class="col-sm-2">
					           <b>Middle Name: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php echo $form->field($model, 'middle_name')->textInput(['class'=>'form-control','placeholder'=>'Middle Name'])->label(false); ?>
					        </div>
					      </div>
					      <div class="row">
					        <div class="col-sm-2">
					           <b>Last Name: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php echo $form->field($model, 'last_name')->textInput(['class'=>'form-control','placeholder'=>'Last Name'])->label(false); ?>
					        </div>
					        <div class="col-sm-2">
					           <b>Photo: </b>
					        </div>
					        <div class="col-sm-4">
					          <?= $form->field($model, 'profile_pic')->fileInput()->label(false); ?>
					        </div>
					      </div>
					      <div class="row">
					        <div class="col-sm-2">
					           <b>Gender: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php
					              echo $form->field($model, 'gender')->label(FALSE)->widget(Select2::classname(), [
					                  'data' => ['1'=>'Male','0'=>'Female'],
					                  'options' =>[
					                      'placeholder' => 'Select Gender'
					                  ],
					                  'pluginOptions' => [
					                      'allowClear' => true,
					                  ],
					                ]);
					          ?>
					        </div>
					        <div class="col-sm-2">
					           <b>Language: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php
					              echo $form->field($model, 'language')->label(FALSE)->widget(Select2::classname(), [
					                  'data' => ['M'=>'Marathi','E'=>'English'],
					                  'options' =>[
					                      'placeholder' => 'Select Language'
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
					           <b>Birth Date: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php
					          	echo $form->field($model, 'birth_date')->widget(DatePicker::classname(), [
								    'options' => ['placeholder' => 'Enter birth date'],
								    'pluginOptions' => [
								        'autoclose'=>true,
								        'endDate' => "5y",
								        'todayHighlight' => true
								    ]
								])->label(false);
                                                        
					          ?>
					        </div>
					        <div class="col-sm-2">
					           <b>Age: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php echo $form->field($model, 'age')->textInput(['class'=>'form-control','placeholder'=>'Age', 'disabled'=>true])->label(false); ?>
					        </div>
					      </div>
					      <div class="row">
					        <div class="col-sm-2">
					           <b>Is Registered: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php
					              echo $form->field($model, 'is_registered')->label(FALSE)->widget(Select2::classname(), [
					                  'data' => ['0'=>'No','1'=>'Yes'],
					                  'options' =>[
					                      'placeholder' => 'Select'
					                  ],
					                  'pluginOptions' => [
					                      'allowClear' => true,
					                  ],
					                ]);
					          ?>
					        </div>
					        <?php
                                                $type=1;
                                                if($type==1): ?>
						        <div class="col-sm-2">
						           <b>Tagged To: </b>
						        </div>
						        <div class="col-sm-4">
						          <?php
						              echo $form->field($model, 'user_id')->label(FALSE)->widget(Select2::classname(), [
						                  'data' => $tagTo,
						                  'options' =>[
						                      'placeholder' => 'Select Tagged To'
						                  ],
						                  'pluginOptions' => [
						                      'allowClear' => true,
						                  ],
						                ]);
						          ?>
						        </div>
					    	<?php endif; ?>
					      </div>
					      <div class="row">
					        <div class="col-sm-2">
					           <b>Mobile No.: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php echo $form->field($model, 'mobile_no')->textInput(['class'=>'form-control','placeholder'=>'Mobile Number'])->label(false); ?>
					        </div>
					        <div class="col-sm-2">
					           <b>WhatsApp No.: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php echo $form->field($model, 'whatsapp_no')->textInput(['class'=>'form-control','placeholder'=>'WhatsApp Number'])->label(false); ?>
					        </div>
					      </div>
					      <div class="row">
					        <div class="col-sm-2">
					           <b>Address: </b>
					        </div>
					        <div class="col-sm-4">
					          <?php echo $form->field($model, 'home_address')->textArea(['class'=>'form-control','placeholder'=>'Address'])->label(false); ?>
					        </div>
					      </div>
					      <div class="row">
					        <div class="col-sm-12">
					            <?php echo Html::submitButton("Update",['class'=>'btn btn-primary btn-flat','id'=>'btnSubmit']); ?>
					            <?php echo Html::resetButton("Reset",['class'=>'btn btn-default btn-flat']); ?>
					        </div>
					      </div>
					    <?php ActiveForm::end(); ?>
			        </div>
			      </div>
			    </div>
			    <div class="panel panel-default">
			      <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#collapse2">
			        <h4 class="panel-title">
			          <a>Farm Details</a>
			        </h4>
			      </div>
			      <div id="collapse2" class="panel-collapse collapse">
			        <div class="panel-body">
			        	<div class="row">
					        <div class="col-sm-12 text-right">
					        	<?php echo Html::Button("Add Farm",['class'=>'btn btn-primary btn-flat','data-toggle'=>'modal','data-target'=>'#farmModel']); ?>
					        </div>
					    </div>
					    <br />
			        	<div class="row">
					        <div class="col-sm-12">
					            <table id="myTable" class="table table-bordered">
					                <thead>
					                    <tr>
					                        <th>Sr. No.</th>
					                        <th>Farm Name</th>
					                        <th>Location</th>
					                        <th>Survey No.</th>
					                        <th>Total Area</th>
					                        <th>Images</th>
					                        <th>Action</th>
					                    </tr>
					                </thead>
					                <tbody>             
					                    <?php for($i=0;$i<count($farmData);$i++): ?>
					                        <tr>
					                            <td><?php echo $i+1; ?></td>
					                            <td><?php echo $farmData[$i]['farm_name']; ?></td>
					                            <td><?php echo $farmData[$i]['elevation_farm_location']; ?></td>
					                            <td><?php echo $farmData[$i]['survey_number']; ?></td>
					                            <td><?php echo $farmData[$i]['total_area']; ?></td>
					                            <?php if($farmData[$i]['farm_image']==null): ?>
					                            	<td>-</td>
					                            <?php else: ?>
					                            	<?php
					                            		$picArr=explode(",",$farmData[$i]['farm_image']);
					                            	?>
					                            	<td>
					                            	<?php for($x=0;$x<count($picArr);$x++): ?>
					                            		<?php $url="images/farmImages/".$picArr[$x]; ?>
					                            		<a href="<?php echo $url; ?>" target="_blank">Pic <?php echo $x+1; ?> |</a>
					                            	<?php endfor; ?>
					                            	</td>

					                            <?php endif; ?>
					                            <td><?php echo Html::a("<i class='fa fa-trash'></i>", ['farmers/delete-farm','id'=>$farmData[$i]['farm_id'],'farmerId'=>$_REQUEST['id']]); ?></td>
					                        </tr>
					                    <?php endfor; ?>
					                </tbody>
					            </table>
					        </div>
					    </div>
			        	
			        </div>
			      </div>
			    </div>
			    <div class="panel panel-default">
			      <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#collapse3">
			        <h4 class="panel-title">
			          <a>Plot Details</a>
			        </h4>
			      </div>
			      <div id="collapse3" class="panel-collapse collapse">
			        <div class="panel-body">
			        	<div class="row">
					        <div class="col-sm-12 text-right">
					        	<?php echo Html::Button("Add Plot",['class'=>'btn btn-primary btn-flat','data-toggle'=>'modal','data-target'=>'#plotModel']); ?>
					        </div>
					    </div>
					    <br />
			        	<div class="row">
					        <div class="col-sm-12">
					            <table id="myTable" class="table table-bordered">
					                <thead>
					                    <tr>
					                        <th>Sr. No.</th>
					                        <th>Crop Name</th>
					                        <th>Plot Area</th>
					                        <th>Water Capacity</th>
					                        <th>Soil Details</th>
					                        <th>Action</th>
					                    </tr>
					                </thead>
					                <tbody>             
					                    <?php for($i=0;$i<count($plotData);$i++): ?>
					                        <tr>
					                            <td><?php echo $i+1; ?></td>
					                            <td><?php echo $plotData[$i]['crop_name']; ?></td>
					                            <td><?php echo $plotData[$i]['plot_area']; ?></td>
					                            <td><?php echo $plotData[$i]['water_capacity']; ?></td>
					                            <td><?php echo $plotData[$i]['soil_details']; ?></td>
					                            <td><?php echo Html::a("<i class='fa fa-trash'></i>", ['farmers/delete-plot','id'=>$plotData[$i]['id'],'farmerId'=>$_REQUEST['id']]); ?></td>
					                        </tr>
					                    <?php endfor; ?>
					                </tbody>
					            </table>
					        </div>
					    </div>
			        </div>
			      </div>
			    </div>
			  </div> 
    	</div>
    </div>
  </section>



<div id="farmModel" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
    	<iframe frameborder="0" height="500px" width="100%" border="0" src="<?php echo Yii::$app->urlManager->createAbsoluteUrl(['farmers/farm-details','id'=>$_REQUEST['id']]);  ?>"></iframe>
    	<!--<iframe frameborder="0" height="500px" width="100%" border="0" src="<?php // echo Yii::$app->urlManager->createAbsoluteUrl('farmers/farm-details',['id'=>$_REQUEST['id']]);  ?>"></iframe>-->
    </div>

  </div>
</div>

<div id="plotModel" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
    	<iframe frameborder="0" height="900px" width="100%" border="0" src="<?php echo Yii::$app->urlManager->createAbsoluteUrl(['farmers/plot-details','id'=>$_REQUEST['id']]);  ?>"></iframe>
    </div>

  </div>
</div>


<style type="text/css">
	a.disabled {
	   pointer-events: none;
	   color: cadetblue;
	}
</style>

<?php
$tab=$_REQUEST['tab'];
$script="$('#farmers-birth_date').on('change', function () {
		var dob=$('#farmers-birth_date').val();
        dob = new Date(dob);
		var today = new Date();
		var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
		$('#farmers-age').val(age);
    });
    $('#collapse".$tab."').collapse('toggle');"; 
    $this->registerJs($script);
?>