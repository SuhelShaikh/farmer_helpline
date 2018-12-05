<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "farmer_farm_details".
 *
 * @property int $id
 * @property int $farmer_id
 * @property string $farm_name
 * @property string $farm_photo
 * @property string $farm_location
 * @property int $village
 * @property int $tehsil
 * @property int $district
 * @property int $state
 * @property string $survey_no
 * @property string $total_area
 * @property int $area_unit
 */
class FarmerFarmDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'farm_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['farmer_id','farm_name','village', 'mandal', 'district', 'state','survey_number','elevation_farm_location'],'required'],
            [['farmer_id', 'village', 'mandal', 'district', 'state', 'area_unit'], 'integer'],
            [['farm_image'],'file','maxFiles'=>5],
            [['farm_name', 'farm_image', 'elevation_farm_location', 'survey_number', 'total_area'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'farmer_id' => 'Farmer ID',
            'farm_name' => 'Farm Name',
            'farm_image' => 'Farm Photo',
            'elevation_farm_location' => 'Farm Location',
            'village' => 'Village',
            'mandal' => 'Tehsil',
            'district' => 'District',
            'state' => 'State',
            'survey_number' => 'Survey No',
            'total_area' => 'Total Area',
            'area_unit' => 'Area Unit',
        ];
    }
}
