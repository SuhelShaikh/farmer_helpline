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
        return 'farmer_farm_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['farmer_id','farm_name','village', 'tehsil', 'district', 'state','survey_no','farm_location'],'required'],
            [['farmer_id', 'village', 'tehsil', 'district', 'state', 'area_unit'], 'integer'],
            [['farm_photo'],'file','maxFiles'=>5],
            [['farm_name', 'farm_photo', 'farm_location', 'survey_no', 'total_area'], 'safe'],
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
            'farm_photo' => 'Farm Photo',
            'farm_location' => 'Farm Location',
            'village' => 'Village',
            'tehsil' => 'Tehsil',
            'district' => 'District',
            'state' => 'State',
            'survey_no' => 'Survey No',
            'total_area' => 'Total Area',
            'area_unit' => 'Area Unit',
        ];
    }
}
