<?php use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use budyaga\cropper\Widget;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;

use yii\helpers\Url;?>
<div class="form-farmer-signup">
			<?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            'id' => 'form-farmer-signup',
            'options' => ['enctype' => 'multipart/form-data'],
			]); ?>
			
            
	<?php echo $form->field($model, 'state')->dropDownList($stateList, ['prompt'=>'Select State','id'=>'state-id']); ?>
    
    <?php echo $form->field($model, 'district')->widget(DepDrop::classname(), [
        'options'=>['id'=>'district-id'],
        'pluginOptions'=>[
            'depends'=>['state-id'],
            'placeholder'=>'Select...',
            'url'=>Url::to(['/site/district'])
        ]
    ]); ?>
    
    <?php echo $form->field($model, 'mandal')->widget(DepDrop::classname(), [
        'options'=>['id'=>'mandal-id'],
        'pluginOptions'=>[
            'depends'=>['district-id'],
            'placeholder'=>'Select...',
            'url'=>Url::to(['/site/mandal'])
        ]
    ]); ?>
    
	<?php echo $form->field($model, 'village')->widget(DepDrop::classname(), [
        'options'=>['id'=>'village-id'],
        'pluginOptions'=>[
            'depends'=>['mandal-id'],
            'placeholder'=>'Select...',
            'url'=>Url::to(['/site/village'])
        ]
    ]); ?>
<?php
echo $form->field($model, 'ea_id')->widget(Select2::classname(), [
    'data' => $users,
    'options' => ['placeholder' => 'Select a User to Assign ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
?>

<?= $form->field($model, 'farmer_id')->inline(true)->checkboxList($details); ?>

	<div class="form-group">	
		<label class="control-label col-sm-3"></label>
		<div class="col-sm-6">
                    <?= Html::submitButton('Assign', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
	</div>	
 <?php ActiveForm::end(); ?>