<?php
namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use backend\models\SignupForm;
use backend\models\FarmerSignupForm;
use backend\models\User;
use backend\models\UserRole;
use backend\models\Role;
use frontend\models\ContactForm;
use yii\helpers\ArrayHelper;
use backend\models\UserRelation;
use yii\bootstrap\ActiveForm;
use yii\web\Response;
use backend\models\District;
use yii\helpers\Json;
use backend\models\Mandal;
use backend\models\Village;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','requestpasswordreset'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','requestpasswordreset','signup','validate','farmersignup','createcrop','district',
                        'mandal','village'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

	/**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $userId = Yii::$app->user->id;
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post('SignupForm');
            $model->user_role = $post['user_role'];
            if ($user = $model->signup()) {
                $userRole = new UserRole();
                $userRole->user_id = $user->id;
                $userRole->role_id = $model->user_role;
                if($userRole->save()) {
                    return $this->goHome();
                } else {
					echo '<pre>';print_r($userRole->errors);
				}
            } else {
				echo '<pre>';print_r($model->errors);
			}
        }
		$userRoleList = Role::getUserRoleList();
		$roles = Role::getRoleIds();
		$userIds = UserRole::getUserIds($roles);
		$users = ArrayHelper::map(
		    User::find()->asArray()->where(['IN','id',$userIds])->all(),
		    'id',
		    function($model) {
		        return $model['first_name'].' '.$model['last_name'];
		    }
		    );
		$userRole = userRole::getUserRole($userId);
        return $this->render('signup', [
            'model' => $model,
			'userRoleList'=>$userRoleList,
            'users'=>$users,
            'userRole'=>$userRole,
        ]);
    }
	
	
	public function actionFarmersignup()
    {
        $session = Yii::$app->session;
        $userId = Yii::$app->user->id;
        $model = new FarmerSignupForm();
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post('FarmerSignupForm');
            $model->user_role = 6;
            if ($user = $model->signup()) {
                $userRole = new UserRole();
                $userRole->user_id = $user->id;
                $userRole->role_id = $model->user_role;
                if($userRole->save()) {
                    if(!empty($post['assign_users'])) {
                        $userRelation = new UserRelation();
                        $userRelation->ea_id = $post['assign_users'];
                        $userRelation->farmer_id = $user->id;
                        if($userRelation->save()) {
                            $session['farmer_id'] = $user->id;
                            return $this->redirect(['farmdetails/create']);
                        }
                    }
                    return $this->goHome();
                } else {
                    echo '<pre>';print_r($userRole->errors);
                }
            }
        }
		//$userRoleList = Role::getUserRoleList();
		$roles = Role::getRoleIds();
		$userIds = UserRole::getUserIds($roles);
		//echo '<pre>';print_r($userIds);exit;
		$users = ArrayHelper::map(
		    User::find()->asArray()->where(['IN','id',$userIds])->all(),
		    'id',
		    function($model) {
		        return $model['first_name'].' '.$model['last_name'];
		    }
		    );
		$userRole = userRole::getUserRole($userId);
        return $this->render('farmersignup', [
            'model' => $model,
			//'userRoleList'=>$userRoleList,
            'users'=>$users,
            'userRole'=>$userRole,
        ]);
    }
    
    
    public function actionCreatecrop()
    {
        echo 3434;
    }
    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestpasswordreset()
    {
		$this->layout = 'main-login';
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                //return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    
    public function actionValidate()
    {
        $model = new SignupForm();
        $request = \Yii::$app->getRequest();      
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post('SignupForm');
            $model->load($post);
            $model->scenario = "farmer";
            return ActiveForm::validate($model);
        }       
    }
    
    // THE CONTROLLER
    public function actionDistrict() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $state_id = $parents[0];
                $districts = District::find()->where(['state_id'=>$state_id])->all();
                foreach($districts as $key=>$district) {
                    $out[$key]['id'] = $district['dis_id'];
                    $out[$key]['name'] = $district['name'];
                }
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }
    
    public function actionMandal() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $district_id = $parents[0];
                $mandals = Mandal::find()->where(['district_id'=>$district_id])->all();
                foreach($mandals as $key=>$mandal) {
                    $out[$key]['id'] = $mandal['mandal_id'];
                    $out[$key]['name'] = $mandal['name'];
                }
                //echo '<pre>';print_r($out);exit;
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }
    
    public function actionVillage() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $mandal_id = $parents[0];
                $villages =Village::find()->where(['mandal_id'=>$mandal_id])->all();
                foreach($villages as $key=>$village) {
                    $out[$key]['id'] = $village['village_id'];
                    $out[$key]['name'] = $village['name'];
                }
                //echo '<pre>';print_r($out);exit;
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }
}
