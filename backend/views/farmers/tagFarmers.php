<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\User;
use yii\helpers\ArrayHelper;
//use kartik\widgets\Select2;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use backend\models\State;
use backend\models\District;
use backend\models\Mandal;
use backend\models\Village;
use yii\helpers\Url;

$this->title = 'Tag Farmers';
$states = ArrayHelper::map(State::find()->orderBy('name')->all(), 'state_id', 'name');

$executives = ArrayHelper::map(User::find()->orderBy('username')->all(), 'id', 'username');

$districtData = array();
$cityData = array();
$villageData = array();
if (isset($_POST["Farmers"])) {
    $model->state = $_POST["Farmers"]["state"];
    if ($model->state != "") {
        $districtData = ArrayHelper::map(District::find()->where(["state_id" => $model->state])->orderBy('name')->all(), 'dis_id', 'name');
    }
    if (isset($_POST["Farmers"]["district"])) {
        $model->district = $_POST["Farmers"]["district"];
        if ($model->district != "") {
            $cityData = ArrayHelper::map(Mandal::find()->where(["district_id" => $model->district])->orderBy('name')->all(), 'mandal_id', 'name');
        }
    }
    if (isset($_POST["Farmers"]["city"])) {
        $model->city = $_POST["Farmers"]["city"];
        if ($model->city != "") {
            $villageData = ArrayHelper::map(Village::find()->where(["mandal_id" => $model->city])->orderBy('name')->all(), 'village_id', 'name');
        }
    }
    if (isset($_POST["Farmers"]["village"])) {
        $model->village = $_POST["Farmers"]["village"];
    }
    $model->executive_id = $_POST["Farmers"]["executive_id"];
}
?>

<!-- Main content -->
<div class="manage-farmer-index">
    <div>
        <h2 class="mt-0">
            <?= Html::encode($this->title) ?>
        </h2>
    </div>
    <div class="clearfix">&nbsp;</div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-3">
            <label class="font-weight-bold">State: </label>
            <?php echo $form->field($model, 'state')->dropDownList($states, ['prompt' => 'Select State', 'id' => 'state-id'])->label(false); ?>
        </div>
        <div class="col-sm-3">
            <label class="font-weight-bold">District: </label>
            <?php
            echo $form->field($model, 'district')->label(false)->widget(DepDrop::classname(), [
                'options' => ['prompt' => 'Select...', 'id' => 'district-id'],
                'data' => $districtData,
                'pluginOptions' => [
                    'depends' => ['state-id'],
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
                'options' => ['prompt' => 'Select...', 'id' => 'mandal-id'],
                'data' => $cityData,
                'pluginOptions' => [

                    'depends' => ['district-id'],
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
                'options' => ['prompt' => 'Select...', 'id' => 'village-id'],
                'data' => $villageData,
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
        <div class="col-md-3">
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
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <label class="font-weight-bold">Executive: </label>
            <?php
            echo $form->field($model, 'executive_id')->widget(Select2::classname(), [
                'data' => $executives,
                'options' => ['placeholder' => 'Select Executive'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])->label(false);
            ?>
            <div id="executive_id_div" class="help-block" style="display: none">Executive cannot be blank.</div>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered">
                    <thead>
                        <tr><th></th>
                            <th>Sr. No.</th>
                            <th>Farmer Name</th>
                            <th>Mobile Number</th>
                            <th>Birth Date</th>
                            <th>Gender</th>
                            <th>Tagged To</th>
                            <!--<th>Action</th>-->
                        </tr>
                    </thead>
                    <tbody>             
                        <?php for ($i = 0; $i < count($data); $i++): ?>
                            <tr>
                                <td><input type="checkbox" class="farmerId" name="farmerId[]" value="<?php echo $data[$i]['farmer_id']; ?>"></td>
                                <td><?php echo $i + 1; ?></td>
                                <td><?php echo $data[$i]['full_name']; ?></td>
                                <td><?php echo $data[$i]['mobile_no']; ?></td>
                                <td><?php echo $data[$i]['birth_date']; ?></td>
                                <td><?php echo $data[$i]['gender']; ?></td>
                                <td><?php echo $data[$i]['tagged_name']; ?></td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>	
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div id="farmer_div" class="help-block" style="display: none">Please select at least one farmer.</div>
            <div class="col-md-2">
                <?php echo Html::Button("Submit", ['class' => 'btn btn-success btn-flat', 'id' => 'btnSubmit', 'onclick' => 'getempcode();']); ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</section>

<?php
//    $script="$('#myTable').DataTable();"; 
//    $this->registerJs($script);
?>
<script>

    function getempcode() {
        var executiveId = $("#farmers-executive_id").val();
        $("#executive_id_div").hide();
        $("#executive_id_div").parent().removeClass("has-error");
        if (executiveId == "") {
            $("#executive_id_div").parent().addClass("has-error");
            $("#executive_id_div").show();
            return false;
        }
        var vals = "";
        $(".farmerId").each(function () {
            var tuisre = $(this).is(":checked");
            if (tuisre) {
                vals += "," + $(this).val();
            }
        });
        vals = vals.substring(1);
        $("#farmer_div").hide();
        $("#farmer_div").parent().removeClass("has-error");
        if (vals) {
            var url = "<?php echo Yii::$app->urlManager->createAbsoluteUrl('farmers/tag-farmers-to-exe'); ?>";
            $.ajax({
                url: url,
                type: "POST",
                data: {"executiveId": executiveId, "vals": vals},
                success: function (response) {
                    alert(response);
                }
            });
        } else {
            $("#farmer_div").parent().addClass("has-error");
            $("#farmer_div").show();
            return false;

        }
    }
</script>