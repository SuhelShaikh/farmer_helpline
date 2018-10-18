<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Schedules;

/**
 * SchedulesSearch represents the model behind the search form about `backend\models\Schedules`.
 */
class SchedulesSearch extends Schedules
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sched_id', 'crop_id'], 'integer'],
            [['schedule_inst', 'ceated_on', 'updated_on'], 'safe'],
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
        $query = Schedules::find();

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
            'sched_id' => $this->sched_id,
            'crop_id' => $this->crop_id,
            'ceated_on' => $this->ceated_on,
            'updated_on' => $this->updated_on,
        ]);

        $query->andFilterWhere(['like', 'schedule_inst', $this->schedule_inst]);

        return $dataProvider;
    }
}
