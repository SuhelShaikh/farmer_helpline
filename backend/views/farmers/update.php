<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use backend\models\TblLocations;
use backend\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use backend\models\FarmDetails;
use backend\models\Plot;
use yii\bootstrap\Modal;
use backend\models\FarmerFarmDetails;

$this->title = 'Update Farmer';

//$farmData = FarmDetails::find()->where(['farmer_id' => $_REQUEST['id']])->all();
//$plotData = FarmDetails::find()->where(['farmer_id' => $_REQUEST['id']])->all();
$model->age = date_diff(date_create($model->birth_date), date_create('today'))->y;
$tagTo = ArrayHelper::map(User::find()->where(['status' => 10])->orderBy('username')->all(), 'id', 'username');
?>
<!-- Main content -->
<div class="manage-farmer-index">
	<div>
		<h2 class="mt-0">
			<?= Html::encode($this->title) ?>
		</h2>
	</div>
	<div class="clearfix">&nbsp;</div>
	<?php if (Yii::$app->session->hasFlash('insert')): ?>
			<div class="row">
				<div class="col-sm-12">
					<div class="alert alert-success alert-dismissable">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?= Yii::$app->session->getFlash('insert') ?></strong>
					</div>
				</div>
			</div>
	<div class="clearfix">&nbsp;</div>
	<?php endif; ?>
	<?php if (isset($_SESSION['farmInsert'])): ?>
			<div class="row">
				<div class="col-sm-12">
					<div class="alert alert-success alert-dismissable">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?= $_SESSION['farmInsert']; ?></strong>
					</div>
				</div>
			</div>
	<div class="clearfix">&nbsp;</div>
		<?php unset($_SESSION["farmInsert"]); ?>
	<?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading bg-orange c-pointer" data-toggle="collapse" data-parent="#accordion" data-target="#collapse1">
                        <h4 class="panel-title">
                            <a class="font-weight-bold">Personal Details</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">
                        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                            <div class="row">
                                <div class="col-sm-4 col-md-2">
                                    <b>First Name: </b>
                                </div>
                                <div class="col-sm-8 col-md-4">
                                 <?php echo $form->field($model, 'first_name')->textInput(['class' => 'form-control', 'placeholder' => 'First Name'])->label(false); ?>
                                </div>
                                <div class="col-sm-4 col-md-2">
                                    <b>Middle Name: </b>
                                </div>
                                <div class="col-sm-8 col-md-4">
                                    <?php echo $form->field($model, 'middle_name')->textInput(['class' => 'form-control', 'placeholder' => 'Middle Name'])->label(false); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-2">
                                    <b>Last Name: </b>
                                </div>
                                <div class="col-sm-8 col-md-4">
                                    <?php echo $form->field($model, 'last_name')->textInput(['class' => 'form-control', 'placeholder' => 'Last Name'])->label(false); ?>
                                </div>
                                <div class="col-sm-4 col-md-2">
                                    <b>Photo: </b>
                                </div>
                                <div class="col-sm-8 col-md-4">
                                    <?= $form->field($model, 'profile_pic')->fileInput()->label(false); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-2">
                                    <b>Gender: </b>
                                </div>
                                <div class="col-sm-8 col-md-4">
                                    <?php
                                    echo $form->field($model, 'gender')->label(FALSE)->widget(Select2::classname(), [
                                        'data' => ['1' => 'Male', '0' => 'Female'],
                                        'options' => [
                                            'placeholder' => 'Select Gender'
                                        ],
                                        'pluginOptions' => [
                                            'allowClear' => true,
                                        ],
                                    ]);
                                    ?>
                                </div>
                                <div class="col-sm-4 col-md-2">
                                    <b>Language: </b>
                                </div>
                                <div class="col-sm-8 col-md-4">
                                    <?php
                                    echo $form->field($model, 'language')->label(FALSE)->widget(Select2::classname(), [
                                        'data' => ['M' => 'Marathi', 'E' => 'English'],
                                        'options' => [
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
                                <div class="col-sm-4 col-md-2">
                                    <b>Birth Date: </b>
                                </div>
                                <div class="col-sm-8 col-md-4">
                                    <?php
                                    echo $form->field($model, 'birth_date')->widget(DatePicker::classname(), [
                                        'options' => ['placeholder' => 'Enter birth date'],
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'endDate' => "5y",
                                            'todayHighlight' => true
                                        ]
                                    ])->label(false);
                                    ?>
                                </div>
                                <div class="col-sm-4 col-md-2">
                                    <b>Age: </b>
                                </div>
                                <div class="col-sm-8 col-md-4">
<?php echo $form->field($model, 'age')->textInput(['class' => 'form-control', 'placeholder' => 'Age', 'disabled' => true])->label(false); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-2">
                                    <b>Is Registered: </b>
                                </div>
                                <div class="col-sm-8 col-md-4">
                                    <?php
                                    echo $form->field($model, 'is_registered')->label(FALSE)->widget(Select2::classname(), [
                                        'data' => ['0' => 'No', '1' => 'Yes'],
                                        'options' => [
                                            'placeholder' => 'Select'
                                        ],
                                        'pluginOptions' => [
                                            'allowClear' => true,
                                        ],
                                    ]);
                                    ?>
                                </div>
                                <?php
                                $type = 1;
                                if ($type == 1):
                                    ?>
                                    <div class="col-sm-4 col-md-2">
                                        <b>Tagged To: </b>
                                    </div>
                                    <div class="col-sm-8 col-md-4">
                                        <?php
                                        echo $form->field($model, 'user_id')->label(FALSE)->widget(Select2::classname(), [
                                            'data' => $tagTo,
                                            'options' => [
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
                                <div class="col-sm-4 col-md-2">
                                    <b>Mobile No.: </b>
                                </div>
                                <div class="col-sm-8 col-md-4">
<?php echo $form->field($model, 'mobile_no')->textInput(['class' => 'form-control', 'placeholder' => 'Mobile Number'])->label(false); ?>
                                </div>
                                <div class="col-sm-4 col-md-2">
                                    <b>WhatsApp No.: </b>
                                </div>
                                <div class="col-sm-8 col-md-4">
<?php echo $form->field($model, 'whatsapp_no')->textInput(['class' => 'form-control', 'placeholder' => 'WhatsApp Number'])->label(false); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-2">
                                    <b>Address: </b>
                                </div>
                                <div class="col-sm-8 col-md-4">
<?php echo $form->field($model, 'home_address')->textArea(['class' => 'form-control', 'placeholder' => 'Address'])->label(false); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
<?php echo Html::submitButton("Update", ['class' => 'btn btn-success btn-flat', 'id' => 'btnSubmit']); ?>
                            <?php echo Html::resetButton("Reset", ['class' => 'btn btn-default btn-flat']); ?>
                                </div>
                            </div>
<?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading bg-orange c-pointer" data-toggle="collapse" data-parent="#accordion" data-target="#collapse2">
                        <h4 class="panel-title">
                            <a class="font-weight-bold">Farm Details</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 text-right">
<?php //echo Html::Button("Add Farm",['class'=>'btn btn-primary btn-flat','data-toggle'=>'modal','data-target'=>'#farmModel']);  ?>
<?php echo Html::Button("Add Farm", ['class' => 'btn btn-success btn-flats', 'href' => 'javascript:void(0);']); ?>
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="row">
                                <div class="col-sm-12">
									<div class="table-responsive">
                                    <table id="myTable" class="table table-striped">
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
                                        <?php for ($i = 0; $i < count($data->farm); $i++): ?>
                                                <tr>
                                                    <td><?php echo $i + 1; ?></td>
                                                    <td><?php echo $data->farm[$i]['farm_name']; ?></td>
                                                    <td><?php echo $data->farm[$i]['elevation_farm_location']; ?></td>
                                                    <td><?php echo $data->farm[$i]['survey_number']; ?></td>
                                                    <td><?php echo $data->farm[$i]['total_area']; ?></td>
                                                    <?php if ($data->farm[$i]['farm_image'] == null): ?>
                                                        <td>-</td>
                                                    <?php else: ?>
                                                        <?php
                                                        $picArr = explode(",", $data->farm[$i]['farm_image']);
                                                        ?>
                                                        <td>
                                                            <?php for ($x = 0; $x < count($picArr); $x++): ?>
                                                                <?php $url = "images/farmImages/" . $picArr[$x]; ?>
                                                                <a href="<?php echo $url; ?>" target="_blank">Pic <?php echo $x + 1; ?> |</a>
                                                        <?php endfor; ?>
                                                        </td>

                                                <?php endif; ?>
                                                    <td class="action-btns"><?php echo Html::a("<i class='fa fa-trash'></i>", ['farmers/delete-farm', 'id' => $data->farm[$i]['farm_id'], 'farmerId' => $_REQUEST['id']]); ?></td>
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
                <div class="panel panel-default">
                    <div class="panel-heading bg-orange c-pointer" data-toggle="collapse" data-parent="#accordion" data-target="#collapse3">
                        <h4 class="panel-title">
                            <a class="font-weight-bold">Plot Details</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 text-right">
<?php echo Html::Button("Add Plot", ['class' => 'btn btn-success btn-plot', 'href' => 'javascript:void(0);']); ?>
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="row">
                                <div class="col-sm-12">
									<div class="table-responsive">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Crop Name</th>
                                                <th>Plot Area</th>
                                                <th>Water Capacity</th>
                                                <!--<th>Soil Details</th>-->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>             
                                            <?php $i=1;
                                            if (isset($data->plot) && !empty($data->plot)) {
                                            foreach ($data->plot AS $plot) { 
                                                if (isset($plot) && !empty($plot)) {

                                                foreach ($plot AS $plot1){ ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $plot1['crop_name']; ?></td>
                                                    <td><?php echo $plot1['plot_area']; ?></td>
                                                    <td><?php echo $plot1['water_capacity']; ?></td>
                                                    <!--<td><?php //echo $plot1['soil_details']; ?></td>-->
                                                    <td class="action-btns"><?php echo Html::a("<i class='fa fa-trash'></i>", ['farmers/delete-plot', 'id' => $plot1['plot_id'], 'farmerId' => $_REQUEST['id']]); ?></td>
                                                </tr>
                                            <?php }}}} ?>
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
    </div>
</section>
</div>
<?php
yii\bootstrap\Modal::begin(['header' => '<h2 class="heading-text">Add Farm</h2>', 'id' => 'farm-form']);
echo $this->render('farm_details', ['model' => new \backend\models\FarmDetails(), 'id' => $_REQUEST['id']]);
yii\bootstrap\Modal::end();

yii\bootstrap\Modal::begin(['header' => '<h2 class="heading-text">Add Plot</h2>', 'id' => 'plot-form']);
echo $this->render('plot_details', ['model' => new \backend\models\Plot(),'cropModel' => new \backend\models\CropDetails(), 'id' => $_REQUEST['id']]);
yii\bootstrap\Modal::end();
?>
<?php
$tab = $_REQUEST['tab'];
$script = "$('#farmers-birth_date').on('change', function () {
		var dob=$('#farmers-birth_date').val();
        dob = new Date(dob);
		var today = new Date();
		var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
		$('#farmers-age').val(age);
    });
	$('.btn-flats').click(function(){
		$('#farm-form').modal('show');
	});
        $('.btn-plot').click(function(){
		$('#plot-form').modal('show');
	});
    $('#collapse" . $tab . "').collapse('toggle');";	
$this->registerJs($script);
?>
