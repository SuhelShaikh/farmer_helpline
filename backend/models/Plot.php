<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "plot".
 *
 * @property integer $plot_id
 * @property integer $farm_id
 * @property string $plot_name
 * @property string $plot_area
 * @property integer $number_of_valves
 * @property integer $number_of_plants
 * @property string $plot_planted_date
 * @property string $planting_method
 * @property string $expected_yield_per_plant
 * @property string $total_expected_yield
 * @property string $defoliation_date
 * @property string $first_water_date
 * @property integer $water_liters
 * @property string $mulching_date
 * @property integer $soil_type
 * @property string $water_capacity
 * @property string $drain_out_period
 * @property integer $irigation_type
 * @property string $water_source
 */
class Plot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['farm_id', 'plot_name', 'plot_area', 'number_of_valves', 'planting_method', 'soil_type', 'water_capacity', 'drain_out_period'], 'required'],
            [['farm_id', 'number_of_valves', 'number_of_plants', 'water_liters', 'soil_type', 'irigation_type'], 'integer'],
            [['plot_planted_date', 'defoliation_date', 'first_water_date', 'mulching_date','expected_yield_per_plant', 'total_expected_yield', 'water_liters', 'irigation_type', 'water_source'], 'safe'],
            [['plot_name'], 'string', 'max' => 500],
            [['plot_area', 'planting_method', 'expected_yield_per_plant', 'total_expected_yield', 'water_source'], 'string', 'max' => 100],
            [['water_capacity', 'drain_out_period'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'plot_id' => 'Plot ID',
            'farm_id' => 'Farm ID',
            'plot_name' => 'Plot Name',
            'plot_area' => 'Plot Area',
            'number_of_valves' => 'Number Of Valves',
            'number_of_plants' => 'Number Of Plants',
            'plot_planted_date' => 'Plot Planted Date',
            'planting_method' => 'Planting Method',
            'expected_yield_per_plant' => 'Expected Yield Per Plant',
            'total_expected_yield' => 'Total Expected Yield',
            'defoliation_date' => 'Defoliation Date',
            'first_water_date' => 'First Water Date',
            'water_liters' => 'Water Liters',
            'mulching_date' => 'Mulching Date',
            'soil_type' => 'Soil Type',
            'water_capacity' => 'Water Capacity',
            'drain_out_period' => 'Drain Out Period',
            'irigation_type' => 'Irigation Type',
            'water_source' => 'Water Source',
        ];
    }
}
