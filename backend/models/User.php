<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property integer $age
 * @property string $birth_date
 * @property string $gender
 * @property string $mobile_number
 * @property string $image
 * @property string $home_address
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends \yii\db\ActiveRecord
{

public $role_id;
public $imageTemp;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'first_name', 'last_name', 'mobile_number', 'created_at', 'updated_at'], 'required'],
            [['age', 'status', 'created_at', 'updated_at','role_id'], 'integer'],
            [['gender'], 'string'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['first_name', 'middle_name', 'last_name', 'image','imageTemp'], 'string', 'max' => 100],
            [['birth_date', 'mobile_number'], 'string', 'max' => 10],
            [['home_address'], 'string', 'max' => 300],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'age' => 'Age',
            'birth_date' => 'Birth Date',
            'gender' => 'Gender',
            'mobile_number' => 'Mobile Number',
            'image' => 'Image',
            'home_address' => 'Home Address',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
			'role_id'=>'Role',
        ];
    }
	
	public function getRole()
	{
		$role = Role::find()->select('role_name')->where(['role_id'=>$this->role_id])->one();
		return $role->role_name;
	}
}
