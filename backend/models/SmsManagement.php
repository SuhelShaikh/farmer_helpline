<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sms_management".
 *
 * @property integer $sms_mng_id
 * @property string $sms_gateway_name
 * @property string $sms_gateway_security
 * @property string $sms_gateway_key
 * @property string $sms_gateway_url
 * @property string $status
 * @property string $created_on
 * @property string $updated_on
 */
class SmsManagement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sms_management';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sms_gateway_name', 'sms_gateway_url','sms_gateway_security','sms_gateway_key', 'status'], 'required'],
            [['status'], 'string'],
            [['created_on', 'updated_on'], 'safe'],
            [['sms_gateway_name', 'sms_gateway_security', 'sms_gateway_key'], 'string', 'max' => 100],
            [['sms_gateway_url'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sms_mng_id' => 'Sms Mng ID',
            'sms_gateway_name' => 'Sms Gateway Name',
            'sms_gateway_security' => 'Sms Gateway Security',
            'sms_gateway_key' => 'Sms Gateway Key',
            'sms_gateway_url' => 'Sms Gateway Url',
            'status' => 'Status',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
        ];
    }
}
