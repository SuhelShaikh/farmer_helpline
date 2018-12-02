<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CropDetails */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="clearfix">&nbsp;</div>
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

                <li role="presentation" class="disabled">
                    <a href="javascript:void(0)" data-toggle="tab" aria-controls="step2" role="tab" title="Farm Detail" disabled>
                        <span class="round-tab">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </span>
                    </a>
                </li>
                <li role="presentation"  class="active" onclick="return false">
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
<div class="crop-details-form">

    <?php
    $form = ActiveForm::begin([
                'layout' => 'horizontal',
                'id' => 'crop-details-form',
                'options' => ['enctype' => 'multipart/form-data'],
    ]);
    ?>

    <?= $form->field($model, 'crop_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'crop_type')->textInput(['maxlength' => true]) ?>

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