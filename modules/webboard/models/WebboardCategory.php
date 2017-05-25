<?php

namespace app\modules\webboard\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "webboard_category".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Webboard[] $webboards
 */
class WebboardCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'webboard_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebboards()
    {
        return $this->hasMany(Webboard::className(), ['webboard_category_id' => 'id']);
    }

    public static function getList(){
      return ArrayHelper::map(self::find()->all(),'id','title');
    }
}
