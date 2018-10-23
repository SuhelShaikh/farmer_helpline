<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "modules".
 *
 * @property integer $modules_id
 * @property string $module_name
 * @property string $created_on
 */
class Modules extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'modules';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['module_name'], 'required'],
            [['created_on'], 'safe'],
            [['module_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'modules_id' => 'Modules ID',
            'module_name' => 'Module Name',
            'created_on' => 'Created On',
        ];
    }
	
	public static function getModulesList()
	{
		return self::find()->all();
	}
}
