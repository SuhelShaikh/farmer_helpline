<?php

namespace backend\controllers;

use Yii;
use backend\models\Farmers;
use backend\models\FarmersSearch;
use backend\models\FarmerFarmDetails;
use backend\models\FarmDetails;
use backend\models\Plot;
use backend\models\FarmerPlotDetails;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\Crops;
use backend\models\CropDetails;

/**
 * FarmersController implements the CRUD actions for Farmers model.
 */
class FarmersController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * Lists all Farmers models.
     * @return mixed
     */
    public function actionIndex() {
        //$this->layout='dashboard';
        $model = new Farmers();
        $data = $model->getFarmersList(Yii::$app->request->post());
        return $this->render('index', [
                    'model' => $model,
                    'data' => $data,
        ]);
    }

    /**
     * Displays a single Farmers model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Farmers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {

        $model = new Farmers();

        if ($model->load(Yii::$app->request->post())) {

            $model->created_dt = date("Y-m-d");
            $model->birth_date = date("Y-m-d", strtotime($model->birth_date));
            $model->created_by = Yii::$app->user->identity->id;
            //echo "<pre>";print_r($model);die;

            if ($model->validate()) {
                $model->profile_pic = UploadedFile::getInstance($model, 'profile_pic');

                if ($model->profile_pic && $model->validate()) {
                    $fileName = date("Y-m-d") . "_" . rand(100, 500000) . ".jpg";
                    $model->profile_pic->saveAs('images/farmerImages/' . $fileName);
                    $model->profile_pic = $fileName;
                } else {
                    $model->profile_pic = null;
                }

                if ($model->save()) {
                    Yii::$app->session->setFlash('insert', "Farmer added successfully. Please add farm details.");
                    return $this->redirect(['update', 'id' => $model->farmer_id, 'tab' => 2]);
                }
            } else {

                return $this->render('create', [
                            'model' => $model
                ]);
            }
        }
        return $this->render('create', [
                    'model' => $model
        ]);
    }

    /**
     * Updates an existing Farmers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        //$this->layout='dashboard';
        $model = $this->findModel($id);
        $data = $model->getFarmerDetails($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->birth_date = date("Y-m-d", strtotime($model->birth_date));
            if ($model->validate()) {
                if ($_FILES['Farmers']['name']['profile_pic'] != "") {
                    $model->profile_pic = UploadedFile::getInstance($model, 'profile_pic');
                    if ($model->profile_pic && $model->validate()) {
                        $fileName = date("Y-m-d") . "_" . rand(100, 500000) . ".jpg";
                        $model->profile_pic->saveAs('images/farmerImages/' . $fileName);
                        $model->profile_pic = $fileName;
                    }
                }
                if ($model->save()) {
                    Yii::$app->session->setFlash('insert', "Farmer updated successfully. Please add farm details.");
                    return $this->redirect(['update', 'id' => $model->farmer_id, 'tab' => 2]);
                }
            } else {
                return $this->render('update', [
                            'model' => $model,
                            'data' => $data,
                ]);
            }
        }
        return $this->render('update', [
                    'model' => $model,
                    'data' => $data,
        ]);
    }

    public function actionFarmdetails() {

        //$this->layout='blank';
        $model = new FarmDetails();
        if ($model->load(Yii::$app->request->post())) {
            $id = $model->farmer_id;
//            echo '<pre>';print_r($model);
//            echo "<pre>";print_r($_FILES);die;
            //if ($model->validate()) {

            if (!empty($_FILES['FarmDetails']['name']['farm_image'])) {
                $model->farm_image = UploadedFile::getInstances($model, 'farm_image');
                $fullFileName = "";
                $cnt = 1;

                foreach ($model->farm_image as $file) {
                    $fileName = $cnt . "_" . $model->farmer_id . "_" . date("Y-m-d") . "_" . rand(100, 500000) . ".jpg";
                    $file->saveAs('images/farmImages/' . $fileName);
                    $fullFileName.=$fileName . ",";
                    $cnt++;
                }
                $fullFileName = rtrim($fullFileName, ",");
                $model->farm_image = $fullFileName;
            } else {
                $model->farm_image = null;
            }
            if ($model->save(false)) {
                Yii::$app->session->setFlash('insert', "Farm added successfully.");
                $externel_url = Yii::$app->urlManager->createAbsoluteUrl(['farmers/update', 'id' => $model->farmer_id, 'tab' => 2]);
                $_SESSION['farmInsert'] = "Farm added successfully.";
                echo "<script>";
                echo "this.parent.location.href = '$externel_url'";
                echo "</script>";
            }


            //} else {
            //     return $this->render('farm_details', [
            //         'model' => $model,
            //		'id'=>$id,
            //     ]);
            // }
        }
        return $this->render('farm_details', [
                    'model' => $model,
                    'id' => $_REQUEST['id']
        ]);
    }

    public function actionPlotdetails() {
        $model = new plot();
        $cropModel = new CropDetails();
        if ($model->load(Yii::$app->request->post())) {
//            if ($model->validate()) {
            $model->plot_planted_date = date("Y-m-d", strtotime($model->plot_planted_date));
            $model->defoliation_date = date("Y-m-d", strtotime($model->defoliation_date));
//            $model->irrigation_date=date("Y-m-d",strtotime($model->irrigation_date));
            if ($model->save(false)) {
                if ($cropModel->load(Yii::$app->request->post())) {
//                        if ($cropModel->validate()) {
                    $cropModel->plot_id = $model->plot_id;
                    $cropModel->save(false);
//                        } .
                    Yii::$app->session->setFlash('insert', "Plot added successfully.");
                    $externel_url = Yii::$app->urlManager->createAbsoluteUrl(['farmers/update', 'id' => $_REQUEST['id'], 'tab' => 3]);
                    $_SESSION['farmInsert'] = "Plot added successfully.";
                    echo "<script>";
                    echo "this.parent.location.href = '$externel_url'";
                    echo "</script>";
                }
            }
//            } else {
//                return $this->render('plot_details', [
//                            'model' => $model,
//                            'cropModel' => $cropModel
//                ]);
//            }
        }
        return $this->render('plot_details', [
                    'model' => $model,
                    'cropModel' => $cropModel
        ]);
    }

    public function actionDeletePlot($id, $farmerId) {
        $model = Plot::find($id)->one()->delete();
        $cropModel = CropDetails::find(['plot_id' => $id])->one()->delete();
        Yii::$app->session->setFlash('insert', "Plot deleted successfully.");
        return $this->redirect(['update', 'id' => $farmerId, 'tab' => 3]);
    }

    public function actionDeleteFarm($id, $farmerId) {
        $connection = Yii::$app->getDb();
        $command2 = $connection->createCommand("DELETE FROM farm_details WHERE farm_id=$id");
        $command2->execute();

        $plotModel = Plot::find(['farm_id' => $id])->all();
        foreach ($plotModel AS $plot) {
            $command1 = $connection->createCommand("DELETE FROM crop_details WHERE plot_id=$plot->plot_id");
            $command1->execute();
        }

        $command = $connection->createCommand("DELETE FROM plot WHERE farm_id=$id");
        $command->execute();

        Yii::$app->session->setFlash('insert', "Farm deleted successfully.");
        return $this->redirect(['update', 'id' => $farmerId, 'tab' => 2]);
    }

    public function actionTagFarmers() {
        //$this->layout='dashboard';
        $model = new Farmers();
        $data = $model->getFarmersListForTag(Yii::$app->request->post());
        return $this->render('tagFarmers', [
                    'model' => $model,
                    'data' => $data,
        ]);
    }

    public function actionTagFarmersToExe() {
        $vals = $_POST['vals'];
        $executiveId = $_POST['executiveId'];

        $valArr = explode(",", $vals);
        $connection = Yii::$app->getDb();
        for ($i = 0; $i < count($valArr); $i++) {
            $farmerId = $valArr[$i];
            $command = $connection->createCommand("UPDATE farmer_profile SET user_id=$executiveId WHERE farmer_id=$farmerId");
            $command->execute();
        }
        Yii::$app->session->setFlash('insert', "Farmers tagged successfully.");
        return $this->redirect(['tag-farmers']);
    }

    public function actionUntagFarmers() {
        //$this->layout='dashboard';
        $model = new Farmers();
        $data = array();
        if ($model->load(Yii::$app->request->post())) {
            $data = $model->getTaggedFarmers($model->executive_id);
        }
        return $this->render('unTagFarmers', [
                    'model' => $model,
                    'data' => $data,
        ]);
    }

    public function actionUntagFarmersToExe() {
        $vals = $_POST['vals'];
        $executiveId = $_POST['executiveId'];

        $valArr = explode(",", $vals);
        $connection = Yii::$app->getDb();
        for ($i = 0; $i < count($valArr); $i++) {
            $farmerId = $valArr[$i];
            $command = $connection->createCommand("UPDATE farmer_personal_details SET tagged_to=NULL WHERE id=$farmerId");
            $command->execute();
        }
        Yii::$app->session->setFlash('insert', "Farmers untagged successfully.");
        return $this->redirect(['untag-farmers']);
    }

    public function actionCallDetails($id) {
        //$this->layout='dashboard';
        $model = new Farmers();
        $data = $model->getCallDetails($id);
        return $this->render('call_details', [
                    'model' => $model,
                    'data' => $data,
        ]);
    }

    /**
     * Deletes an existing Farmers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Farmers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Farmers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Farmers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionProfile($id) {
        $model = new Farmers();
        $data = $model->getFarmerDetails($id);
        return $this->render('profile', [
                    'model' => $model,
                    'data' => $data
        ]);
    }

}
