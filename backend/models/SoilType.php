<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "soil_type".
 *
 * @property integer $soil_type_id
 * @property string $soil_type_name
 */
class SoilType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'soil_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['soil_type_name'], 'required'],
            [['soil_type_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'soil_type_id' => 'Soil Type ID',
            'soil_type_name' => 'Soil Type Name',
        ];
    }
}
