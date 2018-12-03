<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "farmer_plot_details".
 *
 * @property int $id
 * @property int $farm_id
 * @property string $plot_area
 * @property string $crop_name
 * @property int $crop_type
 * @property int $variety_type
 * @property string $crop_grown_area
 * @property int $plot_numbers
 * @property int $soil_type
 * @property string $water_capacity
 * @property string $drain_out_period
 * @property string $line_distance
 * @property string $plant_distance
 * @property string $planting_date
 * @property int $plant_age
 * @property string $defoilation_date
 * @property string $irrigation_date
 * @property int $irrigation_type
 * @property int $lateral_type
 * @property int $filterartion_system
 * @property int $mulching_method
 * @property int $firtigation_equipments
 * @property int $water_source
 * @property string $soil_details
 * @property string $water_details
 * @property string $soil_test_report
 * @property string $water_test_report
 * @property int $prelevant_diseases
 */
class FarmerPlotDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $farmer_id;
    public static function tableName()
    {
        return 'farmer_plot_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['farm_id', 'crop_name'], 'required'],
            [['farm_id', 'crop_type', 'variety_type', 'plot_numbers', 'soil_type', 'plant_age', 'irrigation_type', 'lateral_type', 'filterartion_system', 'mulching_method', 'firtigation_equipments', 'water_source', 'prelevant_diseases'], 'integer'],
            [['farmer_id'],'safe'],
            [['planting_date', 'defoilation_date', 'irrigation_date'], 'safe'],
            [['soil_details', 'water_details'], 'string'],
            [['plot_area', 'crop_name', 'crop_grown_area', 'water_capacity', 'drain_out_period', 'line_distance', 'plant_distance', 'soil_test_report', 'water_test_report'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'farm_id' => 'Farm ID',
            'plot_area' => 'Plot Area',
            'crop_name' => 'Crop Name',
            'crop_type' => 'Crop Type',
            'variety_type' => 'Variety Type',
            'crop_grown_area' => 'Crop Grown Area',
            'plot_numbers' => 'Plot Numbers',
            'soil_type' => 'Soil Type',
            'water_capacity' => 'Water Capacity',
            'drain_out_period' => 'Drain Out Period',
            'line_distance' => 'Line Distance',
            'plant_distance' => 'Plant Distance',
            'planting_date' => 'Planting Date',
            'plant_age' => 'Plant Age',
            'defoilation_date' => 'Defoilation Date',
            'irrigation_date' => 'Irrigation Date',
            'irrigation_type' => 'Irrigation Type',
            'lateral_type' => 'Lateral Type',
            'filterartion_system' => 'Filterartion System',
            'mulching_method' => 'Mulching Method',
            'firtigation_equipments' => 'Firtigation Equipments',
            'water_source' => 'Water Source',
            'soil_details' => 'Soil Details',
            'water_details' => 'Water Details',
            'soil_test_report' => 'Soil Test Report',
            'water_test_report' => 'Water Test Report',
            'prelevant_diseases' => 'Prelevant Diseases',
        ];
    }
}
