<?php

namespace backend\controllers;

use Yii;
use backend\models\AlertMaster;
use backend\models\AlertMasterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * AlertMasterController implements the CRUD actions for AlertMaster model.
 */
class AlertmasterController extends Controller
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
     * Lists all AlertMaster models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlertMasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
	    'from'=>'all',
        ]);
    }

    /**
     * Displays a single AlertMaster model.
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
     * Creates a new AlertMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AlertMaster();

        if ($model->load(Yii::$app->request->post())) {  
            $model->created_at = date('Y-m-d H:i:s');
            if($model->save()) {
                return $this->redirect(['index']);
            } else {
                echo '<pre>';print_r($model->errors);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AlertMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AlertMaster model.
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
     * Finds the AlertMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AlertMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AlertMaster::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionActive() {
        $searchModel = new AlertMasterSearch();
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
       $searchModel = new AlertMasterSearch();
       $dataProvider = $searchModel->search(Yii::$app->request->queryParams,'0');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'from'=>'inactive',
        ]);
    }
}
