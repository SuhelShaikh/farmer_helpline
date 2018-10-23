<?php

namespace backend\controllers;

use Yii;
use backend\models\EaQuestions;
use backend\models\EaAnswers;
use backend\models\EaQuestionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EaQuestionsController implements the CRUD actions for EaQuestions model.
 */
class EaQuestionsController extends Controller
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
        ];
    }

    /**
     * Lists all EaQuestions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EaQuestionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EaQuestions model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $model = EaQuestions::findOne($id);        
        //Get all request & response
        $data = EaQuestions::find()
        ->joinWith(['answer'])
        ->where('ea_answers.token=ea_questions.token AND ea_questions.token='.$model->token)
        ->all();
        //Get Not answerd Questions
        $questionModel = EaQuestions::find()
        ->where(["=","status","0"])
        ->andWhere(["=","token", $model->token])
        ->all();
        //get Question having no response
        $queModel = new EaQuestions();
        $queModel['user_id'] = 2;
        $queModel['token'] = $model->token;
        return $this->render('view', [
            'model' => $queModel,
            'data' => $data,
            'questionModel'=>$questionModel
        ]);

    }

    /**
     * Creates a new EaQuestions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EaQuestions();
        if ($model->load(Yii::$app->request->post())) {
            if(!isset($model['token'])){
                $model['token'] = $this->getToken();
                $model['main_question'] =1;
            }
            if($model->save()) {
                return $this->redirect(['index', 'id' => $model->query_id]);
            }else{
                return $this->render('create', [
                'model' => $model,
            ]);
            }
            
        } else {
            $model['user_id'] = 2;
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EaQuestions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
			$model['updated_on'] = date('Y-m-d h:i:s');
			$model->save();
            return $this->redirect(['view', 'id' => $model->query_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EaQuestions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

public function getToken(){
    $num = rand(10,99);
    return time().$num;

}
    public function actionQuestions($id)
    {
        $model = new EaQuestions();
        $QuesModel = EaAnswers::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            $model['status'] = '1';
            if($model->save()){
            return $this->redirect(['questionView', 'id' => $model->ea_resp_id]);
            }
        } else {
            
            return $this->render('questions', [
                'model' => $model
            ]);
        }
    }

    /**
     * Finds the EaQuestions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EaQuestions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EaQuestions::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
