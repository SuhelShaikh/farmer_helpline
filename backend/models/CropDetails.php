<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "crop_details".
 *
 * @property integer $crop_id
 * @property integer $farmer_id
 * @property string $crop_name
 * @property string $crop_type
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
            [['farmer_id', 'crop_name', 'crop_type'], 'required'],
            [['farmer_id'], 'integer'],
            [['crop_name', 'crop_type'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'crop_id' => 'Crop ID',
            'farmer_id' => 'Farmer ID',
            'crop_name' => 'Crop Name',
            'crop_type' => 'Crop Type',
        ];
    }
}
