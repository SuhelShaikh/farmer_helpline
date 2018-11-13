<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_relation".
 *
 * @property integer $relation_id
 * @property integer $ea_id
 * @property integer $farmer_id
 */
class UserRelation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_relation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ea_id', 'farmer_id'], 'required'],
            [['ea_id', 'farmer_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'relation_id' => 'ID',
            'ea_id' => 'EA',
            'farmer_id' => 'Farmer',
        ];
    }

    public function getAssignedQuestion(){
        return $this->hasMany(EaQuestions::className(), ['user_id' => 'farmer_id']);   
    }
    public function getAssignedEa(){
        return $this->hasOne(User::className(), ['id' => 'ea_id']);   
    }
    public function getUserName(){
        return $this->hasOne(User::className(), ['id' => 'farmer_id']);   
    }
}