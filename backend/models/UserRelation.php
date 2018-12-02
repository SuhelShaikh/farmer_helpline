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
    public $state;
    public $district;
    public $mandal;
    public $village;
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
            [['ea_id'], 'required'],
            ['farmer_id','required','message'=>'Select at least one farmer to assign'],
            [['ea_id', 'farmer_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'relation_id' => 'Relation ID',
            'ea_id' => 'Assign To',
            'farmer_id' => 'Unassined Farmers',
            'state'=>'State',
            'district'=>'District',
            'manda'=>'Mandal',
            'village'=>'Village',
        ];
    }
}
