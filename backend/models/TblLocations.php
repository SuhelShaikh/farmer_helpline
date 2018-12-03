<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_locations".
 *
 * @property int $id
 * @property int $type
 * @property int $parent_id
 * @property string $name
 * @property int $status
 */
class TblLocations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_locations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name'], 'required'],
            [['type', 'parent_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'status' => 'Status',
        ];
    }
}
