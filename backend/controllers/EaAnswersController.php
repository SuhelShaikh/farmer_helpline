<?php

namespace backend\controllers;

use Yii;
use backend\models\EaAnswers;
use backend\models\EaAnswersSearch;
use backend\models\EaQuestions;
use backend\models\EaQuestionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * EaAnswersController implements the CRUD actions for EaAnswers model.
 */
class EaAnswersController extends Controller
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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','pendingquesadmin','pending','view','create','update','respond'],
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
     * Lists all EaAnswers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EaAnswersSearch();
        $dataProvider = $searchModel->searchResponse(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EaAnswers model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = EaQuestions::findOne($id);        
        //Get all request & response
        $data = EaQuestions::getQuestionAndAnswer($model);

        //get Question having no response
        $queModel = new EaAnswers();
        $queModel->ea_id = $_SESSION['__id'];
        $queModel->token = $model->token;
        return $this->render('view', [
            'model' => $queModel,
            'data' => $data
        ]);
    }

    /**
     * Creates a new EaAnswers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EaAnswers();
        if ($model->load(Yii::$app->request->post())) {
            if($model->save()) {
                //update questin status
                $respModel = EaQuestions::findOne($model->ea_question_id);
                $respModel->status = '1';
                $respModel->save();
                return $this->redirect(['index']);
            }else{
                return $this->render('view', [
                'model' => $model,
            ]);
            }
        } else {
            return $this->render('view', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EaAnswers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
			$model->updated_on = date('Y-m-d h:i:s');
			$model->save();
            return $this->redirect(['view', 'id' => $model->ea_resp_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
	public function actionRespond($id)
    {
        $model = new EaAnswers();
		$QuesModel = EaQuestions::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
			$model->status = '1';
			if($model->save()){
            return $this->redirect(['view', 'id' => $model->ea_resp_id]); 
			}
        } else {
			
			$model->ea_question_id = $QuesModel->query_id;
			//logged ea user id
			$model->ea_id = $_SESSION['__id'];
			$model->ea_id = $QuesModel->query_id;
            $model->token = $QuesModel->token;
            return $this->render('respond', [
                'model' => $model,
				'Quemodel'=>$QuesModel
            ]);
        }
    }

    public function actionPending()
    {
       $searchModel = new EaQuestionsSearch();
       $dataProvider = $searchModel->searchPending(Yii::$app->request->queryParams,0);

        return $this->render('pending', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPendingquesadmin()
    {
       $searchModel = new EaQuestionsSearch();
       $dataProvider = $searchModel->searchPending(Yii::$app->request->queryParams,1);
        return $this->render('pendingquesadmin', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing EaAnswers model.
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
     * Finds the EaAnswers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EaAnswers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EaAnswers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
