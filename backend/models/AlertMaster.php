<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "alert_master".
 *
 * @property integer $id
 * @property string $alert_msg
 * @property string $alert_type
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class AlertMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alert_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alert_msg', 'alert_type'], 'required'],
            [['alert_msg'],'unique'],
            [['status'], 'integer'],
            [['alert_msg'], 'string', 'max' => 500],
            [['alert_type'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alert_msg' => 'Alert Msg',
            'alert_type' => 'Alert Type',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
