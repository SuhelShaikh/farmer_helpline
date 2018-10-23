<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\RoleModules;

/**
 * RoleModulesSearch represents the model behind the search form about `backend\models\RoleModules`.
 */
class RoleModulesSearch extends RoleModules
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_module_id', 'module_id', 'role_id', 'created_by'], 'integer'],
            [['status', 'created_on'], 'safe'],
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
        $query = RoleModules::find();

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
            'role_module_id' => $this->role_module_id,
            'module_id' => $this->module_id,
            'role_id' => $this->role_id,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
