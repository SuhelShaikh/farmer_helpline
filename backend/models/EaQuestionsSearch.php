<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\EaQuestions;

/**
 * EaQuestionsSearch represents the model behind the search form about `backend\models\EaQuestions`.
 */
class EaQuestionsSearch extends EaQuestions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['query_id', 'user_id'], 'integer'],
            [['question', 'image_path', 'audio_video_path', 'created_on', 'updated_on', 'status'], 'safe'],
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
        $query = EaQuestions::find();

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
            'query_id' => $this->query_id,
            'user_id' => $this->user_id,
            'created_on' => $this->created_on,
            'updated_on' => $this->updated_on,
        ]);

        $query->andFilterWhere(['like', 'question', $this->question])
            ->andFilterWhere(['like', 'image_path', $this->image_path])
            ->andFilterWhere(['like', 'audio_video_path', $this->audio_video_path])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
