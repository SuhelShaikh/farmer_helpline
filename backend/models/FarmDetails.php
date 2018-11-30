<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "farm_details".
 *
 * @property integer $farm_id
 * @property string $farm_name
 * @property string $elevation_farm_location
 * @property string $village
 * @property string $mandal
 * @property string $district
 * @property string $state
 * @property string $survey_number
 * @property integer $total_area
 * @property string $area_unit
 * @property integer $area_of_plot
 * @property integer $farmer_id
 */
class FarmDetails extends \yii\db\ActiveRecord
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
            [['farm_name', 'elevation_farm_location', 'village', 'mandal', 'district', 'state', 'survey_number', 'total_area', 'area_unit', 'area_of_plot', 'farmer_id'], 'required'],
            [['total_area', 'area_of_plot', 'farmer_id'], 'integer'],
            [['farm_name', 'village', 'district', 'state'], 'string', 'max' => 100],
            [['elevation_farm_location', 'mandal'], 'string', 'max' => 50],
            [['survey_number'], 'string', 'max' => 20],
            [['area_unit'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'farm_id' => 'Farm ID',
            'farm_name' => 'Farm Name',
            'elevation_farm_location' => 'Elevation Farm Location',
            'village' => 'Village',
            'mandal' => 'Mandal',
            'district' => 'District',
            'state' => 'State',
            'survey_number' => 'Survey Number',
            'total_area' => 'Total Area',
            'area_unit' => 'Area Unit',
            'area_of_plot' => 'Area Of Plot',
            'farmer_id' => 'Farmer ID',
        ];
    }
}
