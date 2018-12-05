<?php

namespace backend\models;

use Yii;

class MasterCropType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'crop_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['crop_type_id','crop_id','crop_type_name'],'required'],
            [['crop_type_id', 'crop_id'], 'integer'],
            [['crop_type_name',], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'crop_type_id' => 'ID',
            'crop_id' => 'Crop ID',
            'crop_type_name' => 'Crop Type Name',
        ];
    }
}
