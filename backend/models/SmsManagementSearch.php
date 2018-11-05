<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SmsManagement;

/**
 * SmsManagementSearch represents the model behind the search form about `backend\models\SmsManagement`.
 */
class SmsManagementSearch extends SmsManagement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sms_mng_id'], 'integer'],
            [['sms_gateway_name', 'sms_gateway_security', 'sms_gateway_key', 'sms_gateway_url', 'status', 'created_on', 'updated_on'], 'safe'],
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
    public function search($params,$status=null)
    {
        $query = SmsManagement::find();

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

        if($status!=null) {
            if($status == '1') {
               $this->status = '1'; 
            } else if($status == '0') {
                $this->status = '0'; 
            }
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'sms_mng_id' => $this->sms_mng_id,
            'status' => $this->status,
            'created_on' => $this->created_on,
            'updated_on' => $this->updated_on,
        ]);

        $query->andFilterWhere(['like', 'sms_gateway_name', $this->sms_gateway_name])
            ->andFilterWhere(['like', 'sms_gateway_security', $this->sms_gateway_security])
            ->andFilterWhere(['like', 'sms_gateway_key', $this->sms_gateway_key])
            ->andFilterWhere(['like', 'sms_gateway_url', $this->sms_gateway_url])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
