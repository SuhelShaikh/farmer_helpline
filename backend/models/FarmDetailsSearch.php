<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FarmDetails;

/**
 * FarmDetailsSearch represents the model behind the search form about `backend\models\FarmDetails`.
 */
class FarmDetailsSearch extends FarmDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['farm_id', 'total_area', 'area_of_plot', 'farmer_id'], 'integer'],
            [['farm_name', 'elevation_farm_location', 'village', 'mandal', 'district', 'state', 'survey_number', 'area_unit'], 'safe'],
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
        $query = FarmDetails::find();

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
            'farm_id' => $this->farm_id,
            'total_area' => $this->total_area,
            'area_of_plot' => $this->area_of_plot,
            'farmer_id' => $this->farmer_id,
        ]);

        $query->andFilterWhere(['like', 'farm_name', $this->farm_name])
            ->andFilterWhere(['like', 'elevation_farm_location', $this->elevation_farm_location])
            ->andFilterWhere(['like', 'village', $this->village])
            ->andFilterWhere(['like', 'mandal', $this->mandal])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'survey_number', $this->survey_number])
            ->andFilterWhere(['like', 'area_unit', $this->area_unit]);

        return $dataProvider;
    }
}
