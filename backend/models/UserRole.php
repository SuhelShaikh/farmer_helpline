<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "user_role".
 *
 * @property integer $user_role_id
 * @property integer $user_id
 * @property integer $role_id
 */
class UserRole extends \yii\db\ActiveRecord
{
    public $first_name;
    public $last_name;
    public $age;
    public $state;
    public $district;
    public $mandal;
    public $village;
    public $id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'role_id'], 'required'],
            [['user_id', 'role_id','age'], 'integer'],
            [['first_name','last_name'],'string']
,        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_role_id' => 'User Role ID',
            'user_id' => 'User ID',
            'role_id' => 'Role ID',
        ];
    }
		
	public static function getUserRole($userId)
	{
		$userRoleDetails = self::find()->where(['user_id'=>$userId])->one();
		return $userRoleDetails->role_id;
	}
	
	public static function getUserIds($roles) {
	    $userRoleDetails = self::find()->where(['IN','role_id',$roles])->all();
	    $userIds = [];
	    foreach($userRoleDetails as $userRoleDtls) {
	        $userIds[] = $userRoleDtls->user_id;
	    }
	    return $userIds;
	}
	
	public function getState()
	{
	    $stateDetails = State::find()->select('name')->where(['state_id'=>$this->state])->one();
	    return $stateDetails['name'];
	}
	
	public function getDistrict()
	{
	    $districtDetails = District::find()->select('name')->where(['dis_id'=>$this->district])->one();
	    return $districtDetails['name'];
	}
	
	public function getMandal()
	{
	    $mandalDetails = Mandal::find()->select('name')->where(['mandal_id'=>$this->mandal])->one();
	    return $mandalDetails['name'];
	}
	
	public function getVillage()
	{
	    $villageDetails = Village::find()->select('name')->where(['village_id'=>$this->village])->one();
	    return $villageDetails['name'];
	}
}
