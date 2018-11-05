<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "crops".
 *
 * @property integer $crop_id
 * @property string $crop_name
 * @property string $crop_desc
 * @property string $image
 * @property string $status
 * @property string $created_on
 * @property string $updated_on
 *
 * @property Schedules[] $schedules
 */
class Crops extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'crops';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'crop_name', 'crop_desc',  'status'], 'required'],
            [['crop_id'], 'integer'],
            [['crop_desc', 'status'], 'string'],
            [['created_on', 'updated_on','image',], 'safe'],
            [['crop_name'], 'string', 'max' => 200],
            [['image'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'crop_id' => 'Crop ID',
            'crop_name' => 'Crop Name',
            'crop_desc' => 'Crop Desc',
            'image' => 'Image',
            'status' => 'Status',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedules::className(), ['crop_id' => 'crop_id']);
    }
}
