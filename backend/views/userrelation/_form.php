<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\UserRelation;
use backend\models\User;
/* @var $this yii\web\View */
/* @var $model backend\models\UserRelation */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="clearfix mt-3"></div>
<div class="user-relation-form">

    <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            'id' => 'user-relation-form',
            'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>
    
    <?= $form->field($model, 'ea_id')->dropDownList(
    	ArrayHelper::map(User::find()->joinWith('userRole')->where('role.role_name="EA"')->all(),'id','username'),
    	['prompt'=>'Select EA']); ?>

    <?= ($model->isNewRecord? $form->field($model, 'farmer_id')->dropDownList(
    	ArrayHelper::map(User::find()->joinWith('userRole')->where('id NOT IN (SELECT distinct farmer_id from user_relation) AND role.role_name="farmer"')->all(),'id','username'),
    	['prompt'=>'Select Farmer']) : $form->field($model, 'farmer_id')->dropDownList(
    	ArrayHelper::map(UserRelation::find()->joinWith('userName')->all(),'userName.id','userName.username'),
    	['prompt'=>'Select Farmer']))?>

    
    		
    <div class="form-group">
		<label class="control-label col-sm-3"></label>
		<div class="col-sm-6">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
