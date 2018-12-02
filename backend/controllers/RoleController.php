<?php

namespace backend\controllers;

use Yii;
use backend\models\Role;
use backend\models\RoleSearch;
use backend\models\Modules;
use backend\models\RoleModules;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RoleController implements the CRUD actions for Role model.
 */
class RoleController extends Controller
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
     * Lists all Role models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RoleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Role model.
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
     * Creates a new Role model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {		$assignModuleListError = '';
        $model = new Role();
		$modulesData = Modules::getModulesList();
        if ($model->load(Yii::$app->request->post())) {
			$model->created_on = date('Y-m-d H:i:s');
			$modulesList = Yii::$app->request->post('modules');			if(!empty($modulesList)) {
				if($model->save()) {				
					foreach($modulesList as $modules) {
						$roleModulesModel = new RoleModules();
						$roleModulesModel->module_id = $modules;
						$roleModulesModel->role_id = $model->role_id;
						$roleModulesModel->status = 1;
						$roleModulesModel->created_by = Yii::$app->user->id;
						$roleModulesModel->created_on = date('Y-m-d H:i:s');
						if($roleModulesModel->save(false)) {
							$this->redirect(['index']);
						} else {
							//echo '<pre>';print_r($model->errors);
						}
					}				} else {					echo '<pre>';print_r($model->errors);				}	 			} else {				$assignModuleListError = 'select at least one module';				return $this->render('create', [					'model' => $model,					'modulesData'=>$modulesData,					'assignModuleListError'=>$assignModuleListError,				]);			}

            //return $this->redirect(['view', 'id' => $model->role_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'modulesData'=>$modulesData,				'assignModuleListError'=>$assignModuleListError,
            ]);
        }
    }

    /**
     * Updates an existing Role model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->role_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Role model.
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
     * Finds the Role model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Role the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Role::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
