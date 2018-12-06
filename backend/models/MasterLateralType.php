<?php

namespace backend\models;

use Yii;

class MasterLateralType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dripping_method';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dripping_method_id','dripping_method_name'],'required'],
            [['dripping_method_id'], 'integer'],
            [['dripping_method_name',], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dripping_method_id' => 'ID',
            'dripping_method_name' => 'Dripping Method Name',
        ];
    }
}
