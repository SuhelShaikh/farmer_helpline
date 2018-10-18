<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ea_answers".
 *
 * @property integer $ea_resp_id
 * @property integer $ea_question_id
 * @property integer $ea_id
 * @property string $response
 * @property string $created_on
 * @property string $updated_on
 *
 * @property User $ea
 */
class EaAnswers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ea_answers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ea_question_id', 'ea_id', 'response'], 'required'],
            [['ea_question_id', 'ea_id'], 'integer'],
            [['response'], 'string'],
            [['created_on', 'updated_on'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ea_resp_id' => 'Ea Resp ID',
            'ea_question_id' => 'Question',
            'ea_id' => 'Advice By',
            'response' => 'Response',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEa()
    {
        return $this->hasOne(User::className(), ['id' => 'ea_id']);
    }
	public function getEaQuestion()
    {
        return $this->hasOne(EaQuestions::className(), ['query_id' => 'ea_question_id']);
    }
}
