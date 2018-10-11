<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Request password reset';

$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Farmers</b>Helpline</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Please fill out your email. A link to reset password will be sent there.</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
		<div class="row">
            <div class="col-xs-2">
                <?= Html::submitButton('Send', ['class' => 'btn btn-primary ']) ?>
            </div>
			<div class="col-xs-2">
			</div>	
			<div class="col-xs-8">
				<a href="<?php echo Url::to(['site/login']); ?>">Get me back to login page</a><br>
			</div>	
            <!-- /.col -->
        </div>
        <?php ActiveForm::end(); ?>    
	</div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
<!--div class="site-request-password-reset">
    <h1><!--?= Html::encode($this->title) ?></h1>

    <p>Please fill out your email. A link to reset password will be sent there.</p>

    <div class="row">
        <div class="col-lg-5">
            <?php //$form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <!--?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <!--?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php //ActiveForm::end(); ?>
        </div>
    </div>
</div-->
