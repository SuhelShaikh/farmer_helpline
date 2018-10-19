<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "role".
 *
 * @property integer $role_id
 * @property string $role_name
 * @property string $status
 * @property string $created_on
 * @property string $updated_on
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_name', 'status', 'created_on'], 'required'],
            [['status'], 'string'],
            [['created_on', 'updated_on'], 'safe'],
            [['role_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'role_name' => 'Role Name',
            'status' => 'Status',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
        ];
    }
	
	public static function getUserRoleList()
	{
		$userRoleList = self::find()->all();
		$userRoleDropDownList = ArrayHelper::map($userRoleList,'role_id','role_name');
		return $userRoleDropDownList;
	}
}
