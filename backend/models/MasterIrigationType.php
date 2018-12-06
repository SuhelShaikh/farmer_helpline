<?php

namespace backend\models;

use Yii;

class MasterIrigationType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'irrigation_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['irrigation_type_id','irrigation_type_name'],'required'],
            [['irrigation_type_id'], 'integer'],
            [['irrigation_type_name',], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'irrigation_type_id' => 'ID',
            'irrigation_type_name' => 'Irrigation Type Name',
        ];
    }
}
