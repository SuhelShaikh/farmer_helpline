<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "crop_details".
 *
 * @property integer $crop_detail_id
 * @property integer $plot_id
 * @property integer $farmer_id
 * @property integer $crop_id
 * @property string $crop_name
 * @property integer $crop_type_id
 * @property integer $crop_variety_id
 * @property string $dist_two_lines
 * @property string $dist_two_crop
 */
class CropDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'crop_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plot_id', 'farmer_id', 'crop_id', 'crop_name', 'crop_type_id', 'crop_variety_id', 'dist_two_lines', 'dist_two_crop'], 'required'],
            [['plot_id', 'farmer_id', 'crop_id', 'crop_type_id', 'crop_variety_id'], 'integer'],
            [['crop_name'], 'string', 'max' => 50],
            [['dist_two_lines', 'dist_two_crop'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'crop_detail_id' => 'Crop Detail ID',
            'plot_id' => 'Plot ID',
            'farmer_id' => 'Farmer ID',
            'crop_id' => 'Crop ID',
            'crop_name' => 'Crop Name',
            'crop_type_id' => 'Crop Type ID',
            'crop_variety_id' => 'Crop Variety ID',
            'dist_two_lines' => 'Dist Two Lines',
            'dist_two_crop' => 'Dist Two Crop',
        ];
    }
}
