<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CropDetails;

/**
 * CropDetailsSearch represents the model behind the search form about `backend\models\CropDetails`.
 */
class CropDetailsSearch extends CropDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['crop_id', 'farmer_id'], 'integer'],
            [['crop_name', 'crop_type'], 'safe'],
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
        $query = CropDetails::find();

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
            'crop_id' => $this->crop_id,
            'farmer_id' => $this->farmer_id,
        ]);

        $query->andFilterWhere(['like', 'crop_name', $this->crop_name])
            ->andFilterWhere(['like', 'crop_type', $this->crop_type]);

        return $dataProvider;
    }
}
