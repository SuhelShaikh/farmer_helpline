<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "farmers".
 *
 * @property int $id
 * @property string $farmer_fname
 * @property string $farmer_mname
 * @property string $farmer_lname
 * @property string $mobile_no
 * @property string $alt_mobile_no
 * @property string $whatsapp_no
 * @property string $village
 * @property string $taluka
 * @property string $district
 * @property string $state
 * @property int $cretaed_by
 * @property string $cretaed_at
 * @property int $status
 */
class Farmers extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public $executive_id;
    public $filter;

    public static function tableName() {
        return 'farmer_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['language', 'first_name', 'middle_name', 'last_name', 'birth_date', 'mobile_no', 'gender', 'is_registered'], 'required'],
            [['farm_name'], 'required', 'on' => 'farmDetails'],
            [['first_name', 'middle_name', 'last_name'], 'string', 'max' => 255],
            [['mobile_no', 'whatsapp_no'], 'number'],
            [['mobile_no', 'whatsapp_no'], 'string', 'max' => 10, 'min' => 10],
            [['mobile_no'], 'unique'],
            [['executive_id'], 'check_executive'],
            [['age', 'home_address', 'user_id', 'executive_id'], 'safe']
                /* [['cretaed_by', 'status'], 'integer'],
                  [['cretaed_at'], 'safe'],
                  [['farmer_fname', 'farmer_mname', 'farmer_lname', 'village', 'taluka', 'district', 'state'], 'string', 'max' => 255],
                  [['mobile_no', 'alt_mobile_no', 'whatsapp_no'], 'string', 'max' => 15], */
        ];
    }

    public function check_executive($attribute, $params){
        if($attribute == ''){
          $this->addError($attribute,'Please Select Executive..');
        }

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
                /* 'id' => 'ID',
                  'farmer_fname' => 'Farmer Fname',
                  'farmer_mname' => 'Farmer Mname',
                  'farmer_lname' => 'Farmer Lname',
                  'mobile_no' => 'Mobile No',
                  'alt_mobile_no' => 'Alt Mobile No',
                  'whatsapp_no' => 'Whatsapp No',
                  'village' => 'Village',
                  'taluka' => 'Taluka',
                  'district' => 'District',
                  'state' => 'State',
                  'cretaed_by' => 'Cretaed By',
                  'cretaed_at' => 'Cretaed At',
                  'status' => 'Status', */
        ];
    }

    public function getFarmersList($params) {
        if (isset($params) && !empty($params)) {
            foreach ($params["Farmers"] AS $key => $param) {
                if ($param != "") {
                    if ($key == 'city'){
                        $this->filter .= " AND fd.mandal = '$param'";
                    } else if ($key == 'executive_id'){
                        $this->filter .= " AND fp.user_id = '$param'";
                    } else {
                        $this->filter .= " AND fd.$key = '$param'";
                    }
                }
            }
        }
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT DISTINCT fd.farmer_id,CONCAT(fp.first_name, ' ', fp.middle_name, ' ', fp.last_name) AS full_name,fp.birth_date,fp.mobile_no, (CASE WHEN fp.gender='1' THEN 'Male' ELSE 'Female' END) as gender,CONCAT(IFNULL(u.first_name,''), ' ', IFNULL(u.last_name,'')) AS tagName FROM farmer_profile fp LEFT JOIN farm_details fd ON fd.farmer_id=fp.farmer_id LEFT JOIN user u ON u.id=fp.user_id WHERE fp.user_id !='0' {$this->filter} ORDER BY farmer_id DESC");

        $data = $command->queryAll();
        //echo "<pre>";print_r($data);die;
        return $data;
    }

    public function getFarmersListForTag($params) {
        if (isset($params) && !empty($params)) {
            foreach ($params["Farmers"] AS $key => $param) {
                if ($param != "") {
                    if ($key == 'city')
                        $this->filter .= " AND fd.mandal = '$param'";
                    else
                        $this->filter .= " AND fd.$key = '$param'";
                }
            }
        }
        $connection = Yii::$app->getDb();
        //$command = $connection->createCommand("SELECT a.farmer_id,CONCAT(a.first_name, ' ', a.middle_name, ' ', a.last_name) AS full_name,a.birth_date,a.mobile_no, (CASE WHEN a.gender='M' THEN 'Male' ELSE 'Female' END) as gender,b.user_fullname AS tagged_name FROM farmer_profile a LEFT JOIN user b ON a.user_id=b.id WHERE a.status=1 ORDER BY a.farmer_id DESC");
        $command = $connection->createCommand("SELECT DISTINCT a.farmer_id,CONCAT(a.first_name, ' ', a.middle_name, ' ', a.last_name) AS full_name,a.birth_date,a.mobile_no, (CASE WHEN a.gender='1' THEN 'Male' ELSE 'Female' END) as gender,CONCAT(b.first_name, ' ', b.middle_name, ' ', b.last_name) AS tagged_name FROM farmer_profile a LEFT JOIN farm_details fd ON fd.farmer_id=a.farmer_id LEFT JOIN user b ON a.user_id=b.id WHERE a.user_id=0 {$this->filter} ORDER BY a.farmer_id DESC");
        $data = $command->queryAll();
        //echo "<pre>";print_r($data);die;
        return $data;
    }

    public function getFarmDataByFarmer($id) {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT * FROM farmer_profile WHERE farmer_id=$id");
        $data = $command->queryAll();
        return $data;
    }

    public function getPlotDataByFarmer($id) {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT a.* FROM farmer_plot_details a LEFT JOIN farmer_farm_details b ON a.farm_id=b.id WHERE b.farmer_id=$id");
        $data = $command->queryAll();
        //echo "<pre>";print_r($data);die;
        return $data;
    }

    public function getTaggedFarmers($executiveId) {
        //echo $executiveId;die;
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT a.id,CONCAT(a.first_name, ' ', a.middle_name, ' ', a.last_name) AS full_name,a.birth_date,a.mobile_no, (CASE WHEN a.gender='M' THEN 'Male' ELSE 'Female' END) as gender,b.user_fullname AS tagged_name FROM farmer_profile a LEFT JOIN user b ON a.user_id=b.id WHERE a.status=1 AND user_id=$executiveId ORDER BY a.id DESC");
        $data = $command->queryAll();
        //echo "<pre>";print_r($data);die;
        return $data;
    }

    public function getCallDetails($farmerId) {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT a.*, b.user_fullname,c.name FROM farmer_call_details a LEFT JOIN user b ON a.executive_id=b.id LEFT JOIN master_call_response c ON a.call_response=c.id WHERE a.farmer_id=$farmerId ORDER BY a.id DESC");
        $data = $command->queryAll();
        for ($i = 0; $i < count($data); $i++) {
            $callId = $data[$i]['id'];
            $command2 = $connection->createCommand("SELECT * FROM call_questions WHERE call_id=$callId");
            $data2 = $command2->queryAll();
            $data[$i]['call_questions'] = $data2;
        }
        //echo "<pre>";print_r($data);die;
        return $data;
    }

    public function getFarmerDetails($farmerId) {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT fp.*,b.first_name AS tagName FROM farmer_profile fp LEFT JOIN user b ON b.id=fp.user_id WHERE fp.farmer_id=$farmerId ");
        $data = $command->queryAll();
        for ($i = 0; $i < count($data); $i++) {
            $command2 = $connection->createCommand("SELECT fd.farm_id, fd.`farm_name`,fd.`state` as state_id,s.name as state_name,
                fd.`district` as district_id,d.name AS district_name,fd.`mandal` as mandal_id,m.name as mandal_name,fd.`village` as village_id , v.name as village_name,
                `survey_number`,`total_area`,`area_unit`,`area_of_plot`, fd.`elevation_farm_location`, fd.farm_image
            FROM `farm_details` fd
                JOIN state s ON s.state_id=fd.state
                JOIN district d ON d.dis_id=fd.district
                JOIN mandal m ON m.mandal_id=fd.mandal
                JOIN village v ON v.village_id=fd.village
            WHERE fd.farmer_id=$farmerId");
            $data2 = $command2->queryAll();
            for ($j = 0; $j < count($data2); $j++) {
                $farm_id = $data2[$j]['farm_id'];
                $command3 = $connection->createCommand("SELECT p.farm_id, p.plot_id, p.plot_name, p.plot_area , cd.crop_id, cr.crop_name, ct.crop_type_id, ct.crop_type_name, cv.crop_variety_id, cv.crop_variety_name, p.number_of_valves, p.number_of_plants, p.plot_planted_date, p.planting_method, p.expected_yield_per_plant, p.total_expected_yield, p.defoliation_date, p.first_water_date, p.water_liters, p.mulching_date,p.water_capacity
                        FROM plot p
                            JOIN crop_details cd ON cd.plot_id = p.plot_id
                            LEFT JOIN crops cr ON cr.crop_id=cd.crop_id
                            LEFT JOIN crop_type ct On ct.crop_type_id = cd.crop_type_id
                            LEFT JOIN crop_variety cv ON cv.crop_variety_id = cd.crop_variety_id
                        WHERE p.farm_id=$farm_id");
                $data3 = $command3->queryAll();
                if (!empty($data3))
                    $data[$i]['plot'][$j] = $data3;
            }
            $data[$i]['farm'] = $data2;
        }
        return (object) $data[0];
    }

}
