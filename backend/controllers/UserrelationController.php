<?php

namespace backend\controllers;

use Yii;
use backend\models\UserRelation;
use backend\models\UserRelationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\UserRole;
use backend\models\User;
use backend\models\Role;
use yii\helpers\ArrayHelper;
use backend\models\State;

/**
 * UserrelationController implements the CRUD actions for UserRelation model.
 */
class UserrelationController extends Controller
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
     * Lists all UserRelation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserRelationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserRelation model.
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
     * Creates a new UserRelation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserRelation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->relation_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UserRelation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->relation_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserRelation model.
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
     * Finds the UserRelation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserRelation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserRelation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionUnassign()
    {
        $model = new UserRelation();
        $users = UserRole::find()->select('user_id')->where(['role_id'=>6])->all();
        $userIdss = [];
        foreach($users as $user) {
            $userRelationData = UserRelation::find()->where(['farmer_id'=>$user['user_id']])->all();
            if(empty($userRelationData)) {
                $userIdss[] =  $user['user_id'];
                
            }
        }
        $details = ArrayHelper::map(
            User::find()->asArray()->where(['IN','id',$userIdss])->all(),
            'id',
            function($model) {
                return $model['first_name'].' '.$model['last_name'];
            }
            );
        $roles = Role::getRoleIds();
        $userIds = UserRole::getUserIds($roles);
        $users = ArrayHelper::map(
            User::find()->asArray()->where(['IN','id',$userIds])->all(),
            'id',
            function($model) {
                return $model['first_name'].' '.$model['last_name'];
            }
            );
        $states = State::find()->all();
        $stateList = ArrayHelper::map($states,'state_id','name');
        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post('UserRelation');
            if(!empty($post['farmer_id'])) {
                $farmers = $post['farmer_id'];
                foreach($farmers as $farmer) {
                    echo 1;
                    $userRelationModel = new UserRelation();
                    $userRelationModel->ea_id = $post['ea_id'];
                    $userRelationModel->farmer_id = $farmer;
                    $userRelationModel->save();
                }
            } 
            return $this->redirect(['unassign']);
        }
        return $this->render('unassign_users',['model'=>$model,'details' => $details,'users'=>$users,'stateList'=>$stateList]);
    }
    
    public function actionGetfilterdfarmer()
    {
        $this->layout = '';
        $model = new UserRelation();
        $users = UserRole::find()->select('user_id')->where(['role_id'=>6])->all();
        $userIdss = [];
        foreach($users as $user) {
            $userRelationData = UserRelation::find()->Join('join','farm_details','user.id=farm_details.farmer_id')->where(['farmer_id'=>$user['user_id'],'farm_details.state' => $_POST['state-id']])->all();
            if(empty($userRelationData)) {
                $userIdss[] =  $user['user_id'];
                
            }
        }
        $details = ArrayHelper::map(
            User::find()->asArray()->where(['IN','id',$userIdss])->all(),
            'id',
            function($model) {
                return $model['first_name'].' '.$model['last_name'];
            }
            );
        $roles = Role::getRoleIds();
        $userIds = UserRole::getUserIds($roles);
        $users = ArrayHelper::map(
            User::find()->asArray()->where(['IN','id',$userIds])->all(),
            'id',
            function($model) {
                return $model['first_name'].' '.$model['last_name'];
            }
            );
        $states = State::find()->all();
        $stateList = ArrayHelper::map($states,'state_id','name');
        return $this->renderPartial('unassign_users_with_filters',['model'=>$model,'details' => $details,'users'=>$users,'stateList'=>$stateList]);
    }
}
