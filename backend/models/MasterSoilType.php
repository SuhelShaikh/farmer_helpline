<?php

namespace backend\models;

use Yii;

class MasterSoilType extends \yii\db\ActiveRecord
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
            [['soil_type_id','soil_type_name'],'required'],
            [['soil_type_id'], 'integer'],
            [['crop_type_name',], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'soil_type_id' => 'ID',
            'soil_type_name' => 'Soil Type Name',
        ];
    }
}
