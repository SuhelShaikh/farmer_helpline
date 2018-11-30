<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property integer $dis_id
 * @property integer $state_id
 * @property string $name
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state_id', 'name'], 'required'],
            [['state_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dis_id' => 'Dis ID',
            'state_id' => 'State ID',
            'name' => 'Name',
        ];
    }
}
