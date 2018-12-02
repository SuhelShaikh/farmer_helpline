<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "crop_type".
 *
 * @property integer $crop_type_id
 * @property integer $crop_id
 * @property string $crop_type_name
 */
class CropType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'crop_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['crop_id', 'crop_type_name'], 'required'],
            [['crop_id'], 'integer'],
            [['crop_type_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'crop_type_id' => 'Crop Type ID',
            'crop_id' => 'Crop ID',
            'crop_type_name' => 'Crop Type Name',
        ];
    }

	public static function getCropType()
	{
		$cropTypeList = self::find()->all();
		$cropTypeDropDownList = ArrayHelper::map($cropTypeList,'crop_type_id','crop_type_name');
		return $cropTypeDropDownList;
	}
}
