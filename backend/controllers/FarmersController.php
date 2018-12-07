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
/**
 * FarmersController implements the CRUD actions for Farmers model.
 */
class FarmersController extends Controller
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
     * Lists all Farmers models.
     * @return mixed
     */
    public function actionIndex()
    { 
        //$this->layout='dashboard';
        $model = new Farmers();
        $data=$model->getFarmersList();
        return $this->render('index', [
            'model' => $model,
            'data'  => $data,
        ]);
    }

    /**
     * Displays a single Farmers model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Farmers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $model = new Farmers();
        
        if ($model->load(Yii::$app->request->post())) {
            
            $model->created_dt=date("Y-m-d");
            $model->birth_date=date("Y-m-d",strtotime($model->birth_date));
            $model->created_by=Yii::$app->user->identity->id;
            //echo "<pre>";print_r($model);die;
            
            if ($model->validate()) {
                $model->profile_pic = UploadedFile::getInstance($model, 'profile_pic');

                if ($model->profile_pic && $model->validate()) {
                    $fileName=date("Y-m-d")."_".rand(100,500000).".jpg";                
                    $model->profile_pic->saveAs('images/farmerImages/' . $fileName);
                    $model->profile_pic=$fileName;
                }else{
                    $model->profile_pic=null;
                }
                
                if($model->save()){
                    Yii::$app->session->setFlash('insert', "Farmer added successfully. Please add farm details.");
                    return $this->redirect(['update', 'farmer_id' => $model->farmer_id, 'tab'=>2]);
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
    public function actionUpdate($id)
    {
        //$this->layout='dashboard';
        $model = $this->findModel($id);
        $farmData=$model->getFarmDataByFarmer($id);
        $plotData=$model->getPlotDataByFarmer($id);
        //echo "<pre>";print_r($plotData);die;
        if ($model->load(Yii::$app->request->post())) {

            $model->birth_date=date("Y-m-d",strtotime($model->birth_date));
            //echo "<pre>";print_r($_FILES);die;
            if ($model->validate()) {
            	if($_FILES['Farmers']['name']['profile_pic']!=""){
	                $model->profile_pic = UploadedFile::getInstance($model, 'profile_pic');
	
	                if ($model->profile_pic && $model->validate()) {
	                    $fileName=date("Y-m-d")."_".rand(100,500000).".jpg";                
	                    $model->profile_pic->saveAs('images/farmerImages/' . $fileName);
	                    $model->profile_pic=$fileName;
	                }
                }
                if($model->save()){
                    Yii::$app->session->setFlash('insert', "Farmer updated successfully. Please add farm details.");
                    return $this->redirect(['update', 'id' => $model->farmer_id, 'tab'=>2]);
                }
            } else {
                return $this->render('update', [
                    'model' => $model,
                    'farmData'=>$farmData,
                    'plotData'=>$plotData
                ]);
            }
        }
        return $this->render('update', [
            'model' => $model,
            'farmData'=>$farmData,
            'plotData'=>$plotData
        ]);
    }
	public function actionFarmdetails(){

        //$this->layout='blank';
        $model=new FarmDetails();
        if ($model->load(Yii::$app->request->post())) {
	$id = $model->farmer_id;
	//echo '<pre>';print_r($model);exit;
     //echo "<pre>";print_r($_FILES);die;
            //if ($model->validate()) {
                
                /*if($_FILES['FarmerFarmDetails']['name']['farm_image']!=""){
                    $model->farm_image = UploadedFile::getInstances($model, 'farm_image');
                    $fullFileName="";
                    //die();
                    if ($model->farm_image && $model->validate()) {
                        $cnt=1;
                        
                        foreach ($model->farm_image as $file) {
                            
                            $fileName=$cnt."_".$model->farmer_id."_".date("Y-m-d")."_".rand(100,500000).".jpg";                
                            $file->saveAs('images/farmImages/' . $fileName);
                            $fullFileName.=$fileName.",";
                            
                            $cnt++;
                        }
                        $fullFileName=rtrim($fullFileName,",");
                        $model->farm_image=$fullFileName;
                    }
                }*/
                $model->farm_image=null;
                if($model->save(false)){
                    Yii::$app->session->setFlash('insert', "Farm added successfully.");
                    $externel_url=Yii::$app->urlManager->createAbsoluteUrl(['farmers/update','id'=>$model->farmer_id,'tab'=>2]);
                    $_SESSION['farmInsert']="Farm added successfully.";
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
'id'=>$id,
        ]);
	}
    public function actionPlotDetails(){
        //$this->layout='blank';
        $model=new FarmerPlotDetails();
        if ($model->load(Yii::$app->request->post())) {
            //echo "<pre>";print_r($model);die;
            if ($model->validate()) {
                if($_FILES['FarmerPlotDetails']['name']['soil_test_report']!=""){
                    $model->soil_test_report = UploadedFile::getInstance($model, 'soil_test_report');
    
                    if ($model->soil_test_report && $model->validate()) {
                        $fileName=$model->farm_id."_".date("Y-m-d")."_soil.jpg";                
                        $model->soil_test_report->saveAs('images/soilImages/' . $fileName);
                        $model->soil_test_report=$fileName;
                    }
                }
                if($_FILES['FarmerPlotDetails']['name']['water_test_report']!=""){
                    $model->water_test_report = UploadedFile::getInstance($model, 'water_test_report');
    
                    if ($model->water_test_report && $model->validate()) {
                        $fileName=$model->farm_id."_".date("Y-m-d")."_water.jpg";                
                        $model->water_test_report->saveAs('images/waterImages/' . $fileName);
                        $model->water_test_report=$fileName;
                    }
                }
                $model->planting_date=date("Y-m-d",strtotime($model->planting_date));
                $model->defoilation_date=date("Y-m-d",strtotime($model->defoilation_date));
                $model->irrigation_date=date("Y-m-d",strtotime($model->irrigation_date));
                if($model->save()){
                    Yii::$app->session->setFlash('insert', "Plot added successfully.");
                    $externel_url=Yii::$app->urlManager->createAbsoluteUrl(['farmers/update','id'=>$model->farmer_id,'tab'=>3]);
                    $_SESSION['farmInsert']="Plot added successfully.";
                    echo "<script>";
                    echo "this.parent.location.href = '$externel_url'";
                    echo "</script>";
                }
            } else {
                return $this->render('plot_details', [
                    'model' => $model
                ]);
            }
        }
        return $this->render('plot_details', [
            'model' => $model
        ]);
    }
    public function actionDeletePlot($id,$farmerId){
		$model = FarmerPlotDetails::find($id)->one()->delete();
    	Yii::$app->session->setFlash('insert', "Plot deleted successfully.");
        return $this->redirect(['update', 'id' => $farmerId, 'tab'=>3]);
    }
    public function actionDeleteFarm($id,$farmerId){
		$model = FarmerFarmDetails::find($id)->one()->delete();
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand("DELETE FROM farmer_plot_details WHERE farm_id=$id");
        $command->execute();
    	Yii::$app->session->setFlash('insert', "Farm deleted successfully.");
        return $this->redirect(['update', 'id' => $farmerId, 'tab'=>2]);
    }
    public function actionTagFarmers(){
    	//$this->layout='dashboard';
        $model = new Farmers();
        $data=$model->getFarmersListForTag();
        return $this->render('tagFarmers', [
            'model' => $model,
            'data'  => $data,
        ]);
    }
    public function actionTagFarmersToExe(){
        $vals=$_POST['vals'];
        $executiveId=$_POST['executiveId'];

        $valArr=explode(",",$vals);
        $connection = Yii::$app->getDb();
        for($i=0;$i<count($valArr);$i++){
            $farmerId=$valArr[$i];
            $command = $connection->createCommand("UPDATE farmer_personal_details SET tagged_to=$executiveId WHERE id=$farmerId");
            $command->execute();
        }
        Yii::$app->session->setFlash('insert', "Farmers tagged successfully.");
        return $this->redirect(['tag-farmers']);
    }
    public function actionUntagFarmers(){
        //$this->layout='dashboard';
        $model = new Farmers();
        $data=array();
        if ($model->load(Yii::$app->request->post())) {
            $data=$model->getTaggedFarmers($model->executive_id);
        }
        return $this->render('unTagFarmers', [
            'model' => $model,
            'data'  => $data,
        ]);
    }
    public function actionUntagFarmersToExe(){
        $vals=$_POST['vals'];
        $executiveId=$_POST['executiveId'];

        $valArr=explode(",",$vals);
        $connection = Yii::$app->getDb();
        for($i=0;$i<count($valArr);$i++){
            $farmerId=$valArr[$i];
            $command = $connection->createCommand("UPDATE farmer_personal_details SET tagged_to=NULL WHERE id=$farmerId");
            $command->execute();
        }
        Yii::$app->session->setFlash('insert', "Farmers untagged successfully.");
        return $this->redirect(['untag-farmers']);
    }
    public function actionCallDetails($id){
        //$this->layout='dashboard';
        $model = new Farmers();
        $data=$model->getCallDetails($id);
        return $this->render('call_details', [
            'model' => $model,
            'data'  => $data,
        ]);
    }
    /**
     * Deletes an existing Farmers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
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
    protected function findModel($id)
    {
        if (($model = Farmers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionProfile($id)
    {
        $model = new Farmers();
        $data=$model->getFarmerDetails($id);
        return $this->render('profile', [
            'model' => $model,
            'data' => $data
        ]);
    }
}
