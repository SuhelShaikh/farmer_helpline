<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UserRole;

/**
 * UserRoleSearch represents the model behind the search form about `backend\models\UserRole`.
 */
class UserRoleSearch extends UserRole
{
    public $first_name;
    public $last_name;
    public $age;
    public $state;
    public $district;
    public $mandal;
    public $village;
    public $id;
    //public $assign_to;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_role_id', 'user_id', 'role_id','age','state','district','mandal','village','id'], 'integer'],
            [['first_name','last_name'],'string'],
            [['first_name', 'last_name','state','district','mandal','village'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = UserRole::find()->select(['user.id','user.first_name','user.last_name','user.age','farm_details.state','farm_details.district','farm_details.mandal','farm_details.village'])
        //->joinWith('user')
        ->Join('join','user','user.id=user_role.user_id')
        ->Join('join','user_relation','user.id=user_relation.farmer_id')
        ->Join('left join','farm_details','user.id=farm_details.farmer_id')
        ->where(['role_id' => '6']);

        //$query = "SELECT `user`.`first_name`, `user`.`last_name`, `user`.`age`, (select`user`.`first_name` from user join user_relation on user.id = user_relation.ea_id)  AS `ea_id` FROM `user_role` join `user` ON user.id=user_role.user_id join `user_relation` ON user.id=user_relation.farmer_id WHERE `role_id`='6'";
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user_role_id' => $this->user_role_id,
            'user_id' => $this->user_id,
            'role_id' => $this->role_id,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'age'=>$this->age,
            'state'=>$this->state,
            'district'=>$this->district,
            'mandal'=>$this->mandal,
            'village'=>$this->village,
            //'assign_to'=>$this->assign_to,
        ]);
        return $dataProvider;
    }
}
