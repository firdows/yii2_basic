<?php

namespace app\modules\webboard\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mongosoft\file\UploadBehavior;

/**
 * This is the model class for table "webboard".
 *
 * @property integer $id
 * @property string $topic
 * @property string $detail
 * @property integer $webboard_category_id
 * @property integer $user_id
 * @property string $file
 * @property integer $view
 * @property integer $date_post
 *
 * @property WebboardCategory $webboardCategory
 * @property WebboardComment[] $webboardComments
 */
class Webboard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'webboard';
    }

    public function behaviors()
    {
        return [
            [
              'class' => TimestampBehavior::className(),
              'createdAtAttribute' => 'date_post',
              'updatedAtAttribute' => 'date_post',
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'user_id',
                'updatedByAttribute' => 'user_id',
            ],
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'file',
                'scenarios' => ['insert', 'update'],
                'path' => '@webroot/upload/webboard/{id}',
                'url' => '@web/upload/webboard/{id}',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['topic',  'webboard_category_id'], 'required'],
            [['detail'], 'string'],
            [['webboard_category_id', 'user_id', 'view', 'date_post'], 'integer'],
            [['topic'], 'string', 'max' => 255],
            [['webboard_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => WebboardCategory::className(), 'targetAttribute' => ['webboard_category_id' => 'id']],
            ['file', 'file', 'extensions' => 'jpg,png,doc,pdf', 'on' => ['insert', 'update']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'topic' => 'Topic',
            'detail' => 'Detail',
            'webboard_category_id' => 'Webboard Category ID',
            'user_id' => 'User ID',
            'file' => 'File',
            'view' => 'View',
            'date_post' => 'Date Post',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebboardCategory()
    {
        return $this->hasOne(WebboardCategory::className(), ['id' => 'webboard_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebboardComments()
    {
        return $this->hasMany(WebboardComment::className(), ['webboard_id' => 'id']);
    }


    public function getUser(){
      $user = Yii::$app->user->identityClass;
      return $this->hasOne($user::className(),['id'=>'user_id']);
    }
}
