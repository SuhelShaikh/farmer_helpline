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
            [['crop_detail_id', 'plot_id', 'farmer_id', 'crop_id', 'crop_type_id', 'crop_variety_id'], 'integer'],
            [['crop_name', 'dist_two_lines', 'dist_two_crop'], 'safe'],
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
            'crop_detail_id' => $this->crop_detail_id,
            'plot_id' => $this->plot_id,
            'farmer_id' => $this->farmer_id,
            'crop_id' => $this->crop_id,
            'crop_type_id' => $this->crop_type_id,
            'crop_variety_id' => $this->crop_variety_id,
        ]);

        $query->andFilterWhere(['like', 'crop_name', $this->crop_name])
            ->andFilterWhere(['like', 'dist_two_lines', $this->dist_two_lines])
            ->andFilterWhere(['like', 'dist_two_crop', $this->dist_two_crop]);

        return $dataProvider;
    }
}
