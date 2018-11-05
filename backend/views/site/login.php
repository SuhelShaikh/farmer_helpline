<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

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
<style>
body {background: url(images/bg-img.png) !important;background-repeat: repeat;}
.login-box, .register-box {width: 90% !important;margin: 10% auto !important;max-width: 350px !important;background: rgba(245, 245, 245, 0.8);
box-shadow: 1px 1px 15px #ccc;border-radius: 5px;}
.login-box-body, .register-box-body{background:transparent !important;}
.form-control{border: 1px solid #ced4da !important;    border-radius: .25rem !important;
transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out !important;}
.form-control:focus {color: #495057;background-color: #fff;border-color: #80bdff;outline: 0;box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);}
.btn, .btn.btn-flat{border-radius:3px !important;}
.login-logo.text-center{width:100%;text-align:center;}
.login-logo.text-center img.img-responsive{display:inline-block;margin-top:25px;}
.login-box-body, .register-box-body{padding:0 30px 30px 30px;}
.login-box-msg, .register-box-msg{font-size:18px;}
</style>
<div class="login-box">
    
	<div class="login-logo text-center">
        <a href="javascript:void(0);"><img src="<?php echo Yii::$app->request->baseUrl ?>/images/future-farms.png" alt="<?php echo Yii::$app->name ?>" class="img-responsive" /></a>
    </div>
	<div class="clearfix"></div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <!--div class="col-xs-8">
                <!--?= $form->field($model, 'rememberMe')->checkbox() ?-->
            <!--/div-->
            <!-- /.col -->
            <div class="col-xs-12">
                <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-flat pull-left', 'name' => 'login-button']) ?>
            </div>
			<div class="clearfix">&nbsp;</div>
			<div class="col-xs-12 text-center">
				<a class="btn btn-link" href="<?php echo Url::to(['site/requestpasswordreset']); ?>">Forgot Password?</a>
			</div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

        <!--div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in
                using Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign
                in using Google+</a>
        </div-->
        <!-- /.social-auth-links -->
        <!--a href="register.html" class="text-center">Register a new membership</a-->

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
