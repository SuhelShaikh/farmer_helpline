<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Farmers;

/**
 * FarmersSearch represents the model behind the search form of `frontend\models\Farmers`.
 */
class FarmersSearch extends Farmers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cretaed_by', 'status'], 'integer'],
            [['farmer_fname', 'farmer_mname', 'farmer_lname', 'mobile_no', 'alt_mobile_no', 'whatsapp_no', 'village', 'taluka', 'district', 'state', 'cretaed_at'], 'safe'],
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
        $query = Farmers::find();

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
            'id' => $this->id,
            'cretaed_by' => $this->cretaed_by,
            'cretaed_at' => $this->cretaed_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'farmer_fname', $this->farmer_fname])
            ->andFilterWhere(['like', 'farmer_mname', $this->farmer_mname])
            ->andFilterWhere(['like', 'farmer_lname', $this->farmer_lname])
            ->andFilterWhere(['like', 'mobile_no', $this->mobile_no])
            ->andFilterWhere(['like', 'alt_mobile_no', $this->alt_mobile_no])
            ->andFilterWhere(['like', 'whatsapp_no', $this->whatsapp_no])
            ->andFilterWhere(['like', 'village', $this->village])
            ->andFilterWhere(['like', 'taluka', $this->taluka])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'state', $this->state]);

        return $dataProvider;
    }
}
