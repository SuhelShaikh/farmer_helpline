<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "irrigation_type".
 *
 * @property integer $irrigation_type_id
 * @property string $irrigation_type_name
 */
class IrigationType extends \yii\db\ActiveRecord
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
            [['irrigation_type_name'], 'required'],
            [['irrigation_type_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'irrigation_type_id' => 'Irrigation Type ID',
            'irrigation_type_name' => 'Irrigation Type Name',
        ];
    }
}
