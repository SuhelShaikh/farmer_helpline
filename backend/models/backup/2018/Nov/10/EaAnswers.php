<?php

namespace backend\models;

use Yii;
use yii\base\Model;
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
            [['created_on', 'updated_on','token','status','email','content'], 'safe'],
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
    public function sendNotificationEmail()
    {
        /* @var $user User */
        $questionModel = EaQuestions::find()
        ->joinWith('userEa',true, 'INNER JOIN')
        ->andWhere("(UNIX_TIMESTAMP(ea_questions.`created_on`) + 43200) < " . time() . " AND ea_questions.status='0' AND ea_questions.mail_sent='0'")
        ->all();
        //print_r($questionModel);
        foreach ($questionModel as $key => $value) {
            Yii::$app->mailer->compose()
              ->setFrom(['gawaderc@gmail.com'=>'Ravindra'])
              ->setTo($value->userEa->email)
              ->setSubject('Notification')
              ->setHtmlBody("Our EA- ".$value->userEa->username . ' didnt respond to farmer.')
              ->send();

        //update flag
            $model = EaQuestions::findOne($value->query_id);
            $model['mail_sent'] = '1';
            $model->save();
        }
        return 1;
    }
}
