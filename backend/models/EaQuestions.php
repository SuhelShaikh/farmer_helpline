<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ea_questions".
 *
 * @property integer $query_id
 * @property integer $user_id
 * @property string $question
 * @property string $image_path
 * @property string $audio_video_path
 * @property string $created_on
 * @property string $updated_on
 * @property string $status
 *
 * @property User $user
 */
class EaQuestions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ea_questions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'question'], 'required'],
            [['user_id'], 'integer'],
            [['question'], 'string'],
            [['created_on', 'updated_on', 'image_path', 'audio_video_path', 'status','ea_question_id','token'], 'safe'],
            [['image_path', 'audio_video_path', 'status'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'query_id' => 'Query ID',
            'user_id' => 'Responsible EA',
            'question' => 'Question',
            'image_path' => 'Image Path',
            'audio_video_path' => 'Audio Video Path',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public function getUserEa(){
        return $this->hasOne(User::className(), array('id' => 'ea_id'))->viaTable('user_relation', array('farmer_id' => 'user_id'));

    }
    public function getAnswer(){
        return $this->hasMany(EaAnswers::className(), ['ea_question_id' => 'query_id']);   
    }
}
