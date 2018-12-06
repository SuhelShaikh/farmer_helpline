<?php

namespace backend\models;

use Yii;

class MasterVarietyType extends \yii\db\ActiveRecord
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
            [['crop_variety_id','crop_id','crop_variety_name'],'required'],
            [['crop_variety_id', 'crop_id'], 'integer'],
            [['crop_type_name',], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'crop_variety_id' => 'ID',
            'crop_id' => 'Crop ID',
            'crop_variety_name' => 'Crop Veriety Name',
        ];
    }
}
