<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "village".
 *
 * @property integer $village_id
 * @property integer $mandal_id
 * @property string $name
 */
class Village extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'village';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mandal_id', 'name'], 'required'],
            [['mandal_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'village_id' => 'Village ID',
            'mandal_id' => 'Mandal ID',
            'name' => 'Name',
        ];
    }
}
