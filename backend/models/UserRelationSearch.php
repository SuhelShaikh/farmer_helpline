<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UserRelation;

/**
 * UserRelationSearch represents the model behind the search form about `backend\models\UserRelation`.
 */
class UserRelationSearch extends UserRelation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['relation_id', 'ea_id', 'farmer_id'], 'integer'],
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
        $query = UserRelation::find();

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
            'relation_id' => $this->relation_id,
            'ea_id' => $this->ea_id,
            'farmer_id' => $this->farmer_id,
        ]);

        return $dataProvider;
    }
}
