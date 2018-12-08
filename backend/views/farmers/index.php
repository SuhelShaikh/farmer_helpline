<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\User;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use backend\models\State;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
$this->title = 'Manage Users';
$states=ArrayHelper::map(State::find()->orderBy('name')->all(), 'state_id', 'name');
$executives=ArrayHelper::map(User::find()->orderBy('username')->all(), 'id', 'username');

?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],'action'=>'index.php?r=farmers/farmdetails']); ?>
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
  <div class="row">
            <div class="col-sm-2">
               <b>State: </b>
            </div>
            <div class="col-sm-4">
              <?php
          echo $form->field($model, 'state')->dropDownList($states, ['prompt' => 'Select State', 'id' => 'state-id'])->label(false);
          ?>
            </div>
            <div class="col-sm-2">
               <b>District: </b>
            </div>
            <div class="col-sm-4">
              <?php
         
         echo $form->field($model, 'district')->label(false)->widget(DepDrop::classname(), [
            'options' => ['id' => 'district-id'],
            'pluginOptions' => [
                'depends' => ['state-id'],
                'placeholder' => 'Select...',
                'url' => Url::to(['/site/district'])
            ]
              ]);
          ?>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-2">
               <b>Tehsil: </b>
            </div>
            <div class="col-sm-4">
              <?php
           /*echo $form->field($model, 'mandal')->label(false)->widget(DepDrop::classname(), [
        'options' => ['id' => 'mandal-id'],
        'pluginOptions' => [
            'depends' => ['district-id'],
            'placeholder' => 'Select...',
            'url' => Url::to(['/site/mandal'])
        ]
    ]);*/
          ?>
            </div>
            <div class="col-sm-2">
               <b>Village: </b>
            </div>
            <div class="col-sm-4">
              <?php
        echo $form->field($model, 'village')->label(false)->widget(DepDrop::classname(), [
        'options' => ['id' => 'village-id'],
        'pluginOptions' => [
            'depends' => ['mandal-id'],
            'placeholder' => 'Select...',
            'url' => Url::to(['/site/village'])
        ]
    ]);
          ?>
            </div>
        </div> 
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
        <div class="col-md-6">
          <?php echo Html::submitButton("Search",['class'=>'btn btn-primary btn-flat','id'=>'btnSubmit']); ?>
        </div>
      </div>
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
                            <td>
                              <?php echo Html::a("<i class='fa fa-eye'></i>", ['farmers/profile','id'=>$data[$i]['farmer_id']]); ?>
                              <?php echo Html::a("<i class='fa fa-edit'></i>", ['farmers/update','id'=>$data[$i]['farmer_id'],'tab'=>1]); ?>
                            </td>
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
