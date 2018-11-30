<?php
namespace backend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
	public $mobile_number;
	public $user_role;
	public $first_name;
	public $middle_name;
	public $last_name;
	public $age;
	public $birth_date;
	public $gender;
	public $home_address;
	public $assign_users;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
			
			['mobile_number','required'],
			['mobile_number','string','max'=>10],
			
			[['user_role','first_name','last_name','age','gender'],'required'],
            /*[['age','birth_date','gender','home_address','assign_users'],'required', 'when' => function($model) {
                return $model->user_role == 6;
                //return $model->user_role == 6;
            }],*/
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->first_name = $this->first_name;
        $user->middle_name = $this->middle_name;
        $user->last_name = $this->last_name;
        $user->age = $this->age;
        $user->birth_date = $this->birth_date;
        $user->gender = $this->gender;
        $user->mobile_number = $this->mobile_number;
        return $user->save() ? $user : null;
    }
}
