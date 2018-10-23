<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "schedules".
 *
 * @property integer $sched_id
 * @property integer $crop_id
 * @property string $schedule_inst
 * @property string $ceated_on
 * @property string $updated_on
 *
 * @property Crops $crop
 */
class Schedules extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schedules';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['crop_id', 'schedule_inst'], 'required'],
            [['crop_id'], 'integer'],
            [['schedule_inst'], 'string'],
            [['ceated_on', 'updated_on'], 'safe'],
            [['crop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Crops::className(), 'targetAttribute' => ['crop_id' => 'crop_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sched_id' => 'Sched ID',
            'crop_id' => 'Crop ID',
            'schedule_inst' => 'Schedule Inst',
            'ceated_on' => 'Ceated On',
            'updated_on' => 'Updated On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrop()
    {
        return $this->hasOne(Crops::className(), ['crop_id' => 'crop_id']);
    }
}
