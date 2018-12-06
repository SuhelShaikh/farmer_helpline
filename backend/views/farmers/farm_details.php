<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
//use kartik\widgets\Select2;
use kartik\select2\Select2;
use kartik\widgets\DatePicker;
use backend\models\State;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$states=ArrayHelper::map(State::find()->orderBy('name')->all(), 'state_id', 'name');
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],'action'=>'index.php?r=farmers/farmdetails']); ?>
      <!--<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" onclick="closePopup();">&times;</button>
        <!--<h4 class="modal-title">Add Farm</h4>
      </div>-->
      <?php //echo $form->field($model, 'farmer_id')->hiddenInput(['value'=>$_REQUEST['id']])->label(false); ?>
      <div class="modal-body">
			<div class="row">
				<div class="col-sm-2">
					<b>Farm Name: </b>
				</div>
				<div class="col-sm-4">
		          <?php echo $form->field($model, 'farm_name')->textInput(['class'=>'form-control','placeholder'=>'Farm Name'])->label(false); ?>
		          <?php echo $form->field($model, 'farmer_id')->hiddenInput(['value'=>$id])->label(false); ?>
		        </div>
		        <div class="col-sm-2">
		           <b>Farm Photo: </b>
		        </div>
		        <div class="col-sm-4">
		          <?= $form->field($model, 'farm_image[]')->fileInput(['multiple'=>true])->label(false); ?>
		        </div>
		    </div>
		    <div class="row">
		        <div class="col-sm-2">
		           <b>Location: </b>
		        </div>
		        <div class="col-sm-4">
		          <?php echo $form->field($model, 'elevation_farm_location')->textInput(['class'=>'form-control','placeholder'=>'Location'])->label(false); ?>
		        </div>
		        <div class="col-sm-2">
		           <b>Survey No.: </b>
		        </div>
		        <div class="col-sm-4">
		          <?php echo $form->field($model, 'survey_number')->textInput(['class'=>'form-control','placeholder'=>'Survey Number'])->label(false); ?>
		        </div>
		    </div> 
<?php  ?>

    <?php
   
    ?>

    <?php
   
    ?>

    <?php
    
    ?>
		    <div class="row">
		        <div class="col-sm-2">
		           <b>State: </b>
		        </div>
		        <div class="col-sm-4">
		        	<?php
					echo $form->field($model, 'state')->dropDownList($states, ['prompt' => 'Select State', 'id' => 'state-id'])->label(false);
					
						/*echo $form->field($model, 'state')->label(FALSE)->widget(Select2::classname(), [
					    	'data' => $states,
					        'options' =>[
					         	'placeholder' => 'Select State',
					         	'onchange'=>'
                                    $("#farmerfarmdetails-district").find("option:gt(0)").remove();
                                    $("#farmerfarmdetails-district").select2("val", "");
                                    $("#farmerfarmdetails-mandal").find("option:gt(0)").remove();
                                    $("#farmerfarmdetails-mandal").select2("val", "");
                                    $("#farmerfarmdetails-village").find("option:gt(0)").remove();
                                    $("#farmerfarmdetails-village").select2("val", "");
                                    if($(this).val()!=""){
                                        $.get( "'.Url::toRoute('district/get-locations').'", { id: $(this).val()} )
                                        .done(function( data )
                                        {
                                            $( "select#farmerfarmdetails-district" ).html( data );
                                        });
                                    }
                                    else{
                                        $( "select#farmerfarmdetails-district" ).html("");
                                        $( "select#farmerfarmdetails-mandal" ).html("");
                                        $( "select#farmerfarmdetails-village" ).html("");
                                    }'
					        ],
					        'pluginOptions' => [
					           	'allowClear' => true,
					        ],
					    ]);*/
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
						/*echo $form->field($model, 'district')->label(FALSE)->widget(Select2::classname(), [
					    	'data' => [],
					        'options' =>[
					         	'placeholder' => 'Select District',
					         	'onchange'=>'
                                    $("#farmerfarmdetails-mandal").find("option:gt(0)").remove();
                                    $("#farmerfarmdetails-mandal").select2("val", "");
                                    $("#farmerfarmdetails-village").find("option:gt(0)").remove();
                                    $("#farmerfarmdetails-village").select2("val", "");
                                    if($(this).val()!=""){
                                        $.get( "'.Url::toRoute('mandal/get-mandal').'", { id: $(this).val() } )
                                        .done(function( data )
                                        {
                                            $( "select#farmerfarmdetails-mandal" ).html( data );
                                        });
                                    }
                                    else{
                                        $( "select#farmerfarmdetails-mandal" ).html("");
                                        $( "select#farmerfarmdetails-village" ).html("");
                                    }'
					        ],
					        'pluginOptions' => [
					           	'allowClear' => true,
					        ],
					    ]);*/
					?>
		        </div>
		    </div> 
		    <div class="row">
		        <div class="col-sm-2">
		           <b>Tehsil: </b>
		        </div>
		        <div class="col-sm-4">
		        	<?php
					 echo $form->field($model, 'mandal')->label(false)->widget(DepDrop::classname(), [
        'options' => ['id' => 'mandal-id'],
        'pluginOptions' => [
            'depends' => ['district-id'],
            'placeholder' => 'Select...',
            'url' => Url::to(['/site/mandal'])
        ]
    ]);
						/*echo $form->field($model, 'mandal')->label(FALSE)->widget(Select2::classname(), [
					    	'data' => [],
					        'options' =>[
					         	'placeholder' => 'Select Taluka',
					         	'onchange'=>'
                                    $("#farmerfarmdetails-village").find("option:gt(0)").remove();
                                    $("#farmerfarmdetails-village").select2("val", "");
                                    if($(this).val()!=""){
                                        $.get( "'.Url::toRoute('village/get-village').'", { id: $(this).val() } )
                                        .done(function( data )
                                        {
                                            $( "select#farmerfarmdetails-village" ).html( data );
                                        });
                                    }
                                    else{
                                        $( "select#farmerfarmdetails-village" ).html("");
                                    }'
					        ],
					        'pluginOptions' => [
					           	'allowClear' => true,
					        ],
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
						/*echo $form->field($model, 'village')->label(FALSE)->widget(Select2::classname(), [
					    	'data' => [],
					        'options' =>[
					         	'placeholder' => 'Select Village'
					        ],
					        'pluginOptions' => [
					           	'allowClear' => true
					        ],
					    ]);*/
					?>
		        </div>
		    </div> 
		    <div class="row">
		        <div class="col-sm-2">
		           <b>Total Area: </b>
		        </div>
		        <div class="col-sm-4">
		          <?php echo $form->field($model, 'total_area')->textInput(['class'=>'form-control','placeholder'=>'Total Area'])->label(false); ?>
		        </div>
		        <div class="col-sm-2">
		           <b>Area Unit: </b>
		        </div>
		        <div class="col-sm-4">
		        	<?php
					    echo $form->field($model, 'area_unit')->label(FALSE)->widget(Select2::classname(), [
					        'data' => ['1'=>'Acre','2'=>'Hectare'],
					        'options' =>[
					            'placeholder' => 'Area Unit'
					        ],
					        'pluginOptions' => [
					            'allowClear' => true,
					        ],
					    ]);
					?>
		        </div>
		    </div> 
      </div>
      <div class="modal-footer">
		<div class="row">
		    <div class="col-sm-12">
		        <?php echo Html::submitButton("Submit",['class'=>'btn btn-primary btn-flat','id'=>'btnSubmit']); ?>
		        <?php echo Html::Button("Close",['class'=>'btn btn-default btn-flat','data-dismiss'=>'modal','onclick'=>'closePopup();']); ?>
		    </div>
		</div>
      </div>
      <?php ActiveForm::end(); ?>

    <script type="text/javascript">
    	function closePopup(){
    		$('#farmModel', window.parent.document).trigger("click");
    	}
    </script>
