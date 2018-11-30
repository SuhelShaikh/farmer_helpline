<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use common\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\bootstrap\ActiveForm;
use yii\web\Response;
use common\models\Mailer;
use yii\filters\AccessControl;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [  
                    [
                    'actions' => ['uploadphoto','profile'],
                    'allow' => true,
                    'roles' => ['@'],
                    ],
                    [
                        'actions' => [],
                        'allow'=>true,
                        'roles'=>['?'], 
                    ],
                ],
                
            ],
        ];
    }
    public function beforeAction($action) 
    {    
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
   
    /*
     * Added By : Sushrut Deshpande.
     * Added On : 07/09/2017.
     * Function to store image in folder from profile section.
     */
    public function actions()
    {
        $id = Yii::$app->user->getId();
        return [
            'uploadphoto' => [
                'class' => 'budyaga\cropper\actions\UploadAction',
                'url' => Url::toRoute('/backend/web/uploads/user/photo/original_images/'.$id.'/'),
                'path' => '@backend/web/uploads/user/photo/original_images/'.$id.'/',
                'width'=>100,
                'height'=>100,
                'imageType'=>'profile'
            ]
        ];
    }   
    
    
    /**
     * Action will redirect to edit profile page
     * Author: Pratap Deshpande
     */
    public function actionProfile()
    {
        //$this->layout="mainuser";
        Yii::$app->view->title = "Profile";
        $id = Yii::$app->user->getId();
        $session = Yii::$app->session;
        //        echo '<pre>';
        //        print_r($_SESSION);exit;
        $clientId = $session->get('businessId');
        $editProfile = 1;
        if($editProfile != 1) {
            Yii::$app->response->redirect(Url::to(['/site/invalidrequest']));
            return false;
        }
        
        $model = User::findOne($id);
        $userEmail = $model->email;
         $encodedEmailUniqueId = substr(base64_encode($model->email),0,8);
        if(file_exists(Yii::getAlias('@frontend').'/web/uploads/user/photo/original_images/'.$id.'/'.$encodedEmailUniqueId.'.jpg')) {
            $model->image = Yii::getAlias('@frontImages').'/'.$id.'/'.$encodedEmailUniqueId.'.jpg';
        }
        if(!file_exists(Yii::getAlias('@frontend').'/web/uploads/user/')) {
            mkdir(Yii::getAlias('@frontend').'/web/uploads/user/', 0775, true);
            if(!file_exists(Yii::getAlias('@frontend').'/web/uploads/user/photo/')) {
                mkdir(Yii::getAlias('@frontend').'/web/uploads/user/photo/', 0775, true);
                if(!file_exists(Yii::getAlias('@frontend').'/web/uploads/user/photo/original_images/')) {
                    mkdir(Yii::getAlias('@frontend').'/web/uploads/user/photo/original_images/', 0775, true);
                }
            }
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->business_name = $_POST['User']['business_name'];
            $model->first_name = $_POST['User']['first_name'];
            $model->last_name = $_POST['User']['last_name'];
            $model->date_format = $_POST['User']['date_format'];
            if($userEmail == $_POST['User']['email']) {
                if($model->save(false)) {
                    Yii::$app->session->setFlash('success', 'Your Profile has been updated successfully ...');
                }
            } else {
                $model->email = $userEmail;
                Yii::$app->session->setFlash('error', 'Something went wrong while updating record ...');
            }
        }
        return $this->render('editProfile',['model' => $model]);
    }
}

