<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mandal".
 *
 * @property integer $mandal_id
 * @property integer $district_id
 * @property string $name
 */
class Mandal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mandal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['district_id', 'name'], 'required'],
            [['district_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mandal_id' => 'Mandal ID',
            'district_id' => 'District ID',
            'name' => 'Name',
        ];
    }
}
