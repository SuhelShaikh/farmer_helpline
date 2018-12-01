<?php

use yii\helpers\Html;
use kartik\depdrop\DepDrop;
use backend\models\State;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$states = State::find()->all();
$stateList = ArrayHelper::map($states, 'state_id', 'name');
/* @var $this yii\web\View */
/* @var $model backend\models\FarmDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="progress-steps">
    <div class="wizard">
        <div class="wizard-inner">
            <div class="connecting-line"></div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="disabled" onclick="return false">
                    <a href="javascript:void(0)" data-toggle="tab" aria-controls="step1" role="tab" title="Farmer Detail" disabled>
                        <span class="round-tab">
                            <i class="glyphicon glyphicon-folder-open"></i>
                        </span>
                    </a>
                </li>

                <li role="presentation" class="active">
                    <a href="javascript:void(0)" data-toggle="tab" aria-controls="step2" role="tab" title="Farm Detail" disabled>
                        <span class="round-tab">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </span>
                    </a>
                </li>
                <li role="presentation"  class="disabled" onclick="return false">
                    <a href="javascript:void(0)" data-toggle="tab" aria-controls="complete" role="tab" title="Crop Detail">
                        <span class="round-tab">
                            <i class="glyphicon glyphicon-ok"></i>
                        </span>
                    </a>
                </li>
            </ul>
        </div></div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="farm-details-form">

    <?php
    $form = ActiveForm::begin([
                'layout' => 'horizontal',
                'id' => 'alert-message-form',
                'options' => ['enctype' => 'multipart/form-data'],
    ]);
    ?>

    <?= $form->field($model, 'farm_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'elevation_farm_location')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'state')->dropDownList($stateList, ['prompt' => 'Select State', 'id' => 'state-id']); ?>

    <?php
    echo $form->field($model, 'district')->widget(DepDrop::classname(), [
        'options' => ['id' => 'district-id'],
        'pluginOptions' => [
            'depends' => ['state-id'],
            'placeholder' => 'Select...',
            'url' => Url::to(['/site/district'])
        ]
    ]);
    ?>

    <?php
    echo $form->field($model, 'mandal')->widget(DepDrop::classname(), [
        'options' => ['id' => 'mandal-id'],
        'pluginOptions' => [
            'depends' => ['district-id'],
            'placeholder' => 'Select...',
            'url' => Url::to(['/site/mandal'])
        ]
    ]);
    ?>

    <?php
    echo $form->field($model, 'village')->widget(DepDrop::classname(), [
        'options' => ['id' => 'village-id'],
        'pluginOptions' => [
            'depends' => ['mandal-id'],
            'placeholder' => 'Select...',
            'url' => Url::to(['/site/village'])
        ]
    ]);
    ?>

    <?= $form->field($model, 'survey_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_area')->textInput() ?>

    <?= $form->field($model, 'area_unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area_of_plot')->textInput() ?>


    <div class="form-group">
        <label class="control-label col-sm-3"></label>
        <div class="col-sm-6">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/progress.js" type="text/javascript"></script>