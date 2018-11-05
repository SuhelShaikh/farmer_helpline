<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "role_modules".
 *
 * @property integer $role_module_id
 * @property integer $module_id
 * @property integer $role_id
 * @property string $status
 * @property integer $created_by
 * @property string $created_on
 */
class RoleModules extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role_modules';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['module_id', 'role_id', 'status', 'created_by', 'created_on'], 'required'],
            [['module_id', 'role_id', 'created_by'], 'integer'],
            [['status'], 'string'],
            [['created_on'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_module_id' => 'Role Module ID',
            'module_id' => 'Module ID',
            'role_id' => 'Role ID',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_on' => 'Created On',
        ];
    }
	
	public static function getRoleModulesDetails($userRoleId) {
		return self::find()->select(['module_id'])->where(['role_id'=>$userRoleId])->all();
	}
}
