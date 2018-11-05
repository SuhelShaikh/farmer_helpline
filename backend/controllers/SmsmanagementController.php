<?php

namespace backend\controllers;

use Yii;
use backend\models\SmsManagement;
use backend\models\SmsManagementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SmsmanagementController implements the CRUD actions for SmsManagement model.
 */
class SmsmanagementController extends Controller
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
                        'actions' => ['index','create','update','delete','view','active','inactive'],
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
     * Lists all SmsManagement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SmsManagementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'from'=>'all',
        ]);
    }

    /**
     * Displays a single SmsManagement model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SmsManagement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SmsManagement();
	    $status = '';

        if ($model->load(Yii::$app->request->post())) {
            if($model->status == 1){
                SmsManagement::updateAll(['status' => 0]);
            }
            if($model->save()) {
		return $this->redirect(['index']);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
		        'status'=>$status,
            ]);
        }
    }

    /**
     * Updates an existing SmsManagement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
	    $status = '';

        if ($model->load(Yii::$app->request->post())) {
            if($model->status == 1){
			SmsManagement::updateAll(['status' => 0], ['not like', 'sms_mng_id', $id]);
        		if($model->save()) {
        			$this->redirect(['index']);
            		}
            } else {
		$activeGateway = SmsManagement::find()->where(['status'=>'1'])->andWhere(['!=','sms_mng_id', $id])->count();
        if($activeGateway == 0) {
			$status = 'At least one geteway needs to be active';
			return $this->render('update', [
				'model' => $model,
				'status'=>$status,
		    	]);
		} else {
			if($model->save()) {
        			$this->redirect(['index']);
            		}		
		}
	    }
            
            
        } else {
            return $this->render('update', [
                'model' => $model,
		'status'=>$status,
            ]);
        }
    }

    /**
     * Deletes an existing SmsManagement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SmsManagement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SmsManagement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SmsManagement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionActive() {
        $searchModel = new SmsManagementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,'1');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'from'=>'active',
        ]);
    }

    /**
     * Used to display drafted blogs
     * @return searchmodel of drafted blogs
     * Author:Sucheta Parkhi
     */
    public function actionInactive() {
       $searchModel = new SmsManagementSearch();
       $dataProvider = $searchModel->search(Yii::$app->request->queryParams,'0');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'from'=>'inactive',
        ]);
    }
}
