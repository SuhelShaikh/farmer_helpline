<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\User;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use backend\models\State;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$this->title = 'Manage Farmers';
$states = ArrayHelper::map(State::find()->orderBy('name')->all(), 'state_id', 'name');
$executives = ArrayHelper::map(User::find()->orderBy('username')->all(), 'id', 'username');
if (isset($_POST["Farmers"])) {
    print_r($_POST["Farmers"]);
    $model->state = $_POST["Farmers"]["state"];
    $model->district = $_POST["Farmers"]["district"];
    $model->city = $_POST["Farmers"]["city"];
    $model->village = $_POST["Farmers"]["village"];
    $model->executive_id = $_POST["Farmers"]["executive_id"];
}
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => 'index.php?r=farmers/farmdetails']); ?>
<!-- Main content -->
<div class="manage-farmer-index">
    <div>
        <h2 class="mt-0">
            <?= Html::encode($this->title) ?>
            <p class="pull-right"><?php echo Html::a("Add Farmer", ['farmers/create'], ['class' => 'btn btn-success']); ?></p>
        </h2>
    </div>
    <div class="clearfix"></div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-3">
            <label class="font-weight-bold">State: </label>
            <?php
            echo $form->field($model, 'state')->dropDownList($states, ['prompt' => 'Select State', 'id' => 'state-id'])->label(false);
            ?>
        </div>
        <div class="col-sm-3">
            <label class="font-weight-bold">District: </label>
            <?php
            echo $form->field($model, 'district')->label(false)->widget(DepDrop::classname(), [
                'options' => ['id' => 'district-id'],
                'pluginOptions' => [
                    'depends' => ['state-id'],
                    'initialize'=>true,
                    'placeholder' => 'Select...',
                    'url' => Url::to(['/site/district'])
                ]
            ]);
            ?>
        </div>		
        <div class="col-sm-3">
            <label class="font-weight-bold">City / Mandal: </label>
            <?php
            echo $form->field($model, 'city')->label(false)->widget(DepDrop::classname(), [
                'options' => ['id' => 'mandal-id'],
                'pluginOptions' => [
                    'depends' => ['district-id'],
                    'initialize'=>true,
                    'placeholder' => 'Select...',
                    'url' => Url::to(['/site/mandal'])
                ]
            ]);
            ?>
        </div>
        <div class="col-sm-3">
            <label class="font-weight-bold">Village: </label>
            <?php
            echo $form->field($model, 'village')->label(false)->widget(DepDrop::classname(), [
                'options' => ['id' => 'village-id'],
                'pluginOptions' => [
                    'depends' => ['mandal-id'],
                    'initialize'=>true,
                    'placeholder' => 'Select...',
                    'url' => Url::to(['/site/village'])
                ]
            ]);
            ?>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-3">
            <label class="font-weight-bold">Select Executive: </label>
            <?php
            echo $form->field($model, 'executive_id')->widget(Select2::classname(), [
                'data' => $executives,
                'options' => ['placeholder' => 'Select Executive'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])->label(false);
            ?>
        </div>
        <div class="col-md-3">
            <label class="w-100">&nbsp;</label>
            <?php echo Html::submitButton("Search", ['class' => 'btn btn-success btn-flat', 'id' => 'btnSubmit']); ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

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

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Farmer Name</th>
                            <th>Mobile Number</th>
                            <th>Birth Date</th>
                            <th>Gender</th>
                            <th>Tag To</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>             
                        <?php for ($i = 0; $i < count($data); $i++): ?>
                            <tr>
                                <td><?php echo $i + 1; ?></td>
                                <td><?php echo $data[$i]['full_name']; ?></td>
                                <td><?php echo $data[$i]['mobile_no']; ?></td>
                                <td><?php echo $data[$i]['birth_date']; ?></td>
                                <td><?php echo $data[$i]['gender']; ?></td>
                                <td><?php echo $data[$i]['tagName']; ?></td>
                                <td class="action-btns">
                                    <?php echo Html::a("<i class='fa fa-eye'></i>", ['farmers/profile', 'id' => $data[$i]['farmer_id']]); ?>
                                    <?php echo Html::a("<i class='fa fa-edit'></i>", ['farmers/update', 'id' => $data[$i]['farmer_id'], 'tab' => 1]); ?>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
//$script = "$('#myTable').DataTable();";
//$this->registerJs($script);
?>
