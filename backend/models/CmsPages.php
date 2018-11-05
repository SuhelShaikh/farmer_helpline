<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cms_pages".
 *
 * @property integer $cms_page_id
 * @property string $title
 * @property string $content
 * @property string $updated_by
 * @property string $updated_on
 */
class CmsPages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['updated_on', 'updated_by'], 'safe'],
            [['title'], 'string', 'max' => 500],
            [['updated_by'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cms_page_id' => 'Page ID',
            'title' => 'Title',
            'content' => 'Content',
            'updated_by' => 'Updated By',
            'updated_on' => 'Updated On',
        ];
    }
}
