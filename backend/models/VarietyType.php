<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "crop_variety".
 *
 * @property integer $crop_variety_id
 * @property integer $crop_id
 * @property string $crop_variety_name
 */
class VarietyType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'crop_variety';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['crop_id', 'crop_variety_name'], 'required'],
            [['crop_id'], 'integer'],
            [['crop_variety_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'crop_variety_id' => 'Crop Variety ID',
            'crop_id' => 'Crop ID',
            'crop_variety_name' => 'Crop Variety Name',
        ];
    }
}
