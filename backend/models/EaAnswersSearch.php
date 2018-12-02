<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\EaAnswers;
use backend\models\EaQuestions;

/**
 * EaAnswersSearch represents the model behind the search form about `backend\models\EaAnswers`.
 */
class EaAnswersSearch extends EaAnswers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ea_resp_id', 'ea_question_id', 'ea_id'], 'integer'],
            [['response', 'created_on', 'updated_on'], 'safe'],
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
        $query = EaAnswers::find()
        ->select("ea_question_id,question,ea_id,response,ea_question_id")
        ->joinWith('eaQuestion',true,'RIGHT JOIN')
        //->rightJoin('ea_questions','ea_answers.ea_question_id=ea_questions.query_id')
        ->where(['ea_questions.main_question' => '1']);

       // ->joinWith('eaQuestion')
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
            'ea_resp_id' => $this->ea_resp_id,
            'ea_question_id' => $this->ea_question_id,
            'ea_id' => $this->ea_id,
            'created_on' => $this->created_on,
            'updated_on' => $this->updated_on,
        ]);

        $query->andFilterWhere(['like', 'response', $this->response]);

        return $dataProvider;
    }
    public function searchResponse($params){
        $query = EaQuestions::find()
        ->joinWith('answer',true,'LEFT JOIN')
        ->where(['ea_questions.main_question' => '1'])
        ->orderBy(['status'=>SORT_ASC],['created_on' => SORT_DESC]);

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

        return $dataProvider;
    }
}
