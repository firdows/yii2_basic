<?php

namespace app\modules\webboard\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "webboard_comment".
 *
 * @property integer $id
 * @property string $title
 * @property integer $user_id
 * @property integer $webboard_id
 * @property integer $date_comment
 *
 * @property Webboard $webboard
 */
class WebboardComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'webboard_comment';
    }

    public function behaviors()
    {
        return [
            [
              'class' => TimestampBehavior::className(),
              'createdAtAttribute' => 'date_comment',
              'updatedAtAttribute' => 'date_comment',
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'user_id',
                'updatedByAttribute' => 'user_id',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['user_id', 'webboard_id', 'date_comment'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['webboard_id'], 'exist', 'skipOnError' => true, 'targetClass' => Webboard::className(), 'targetAttribute' => ['webboard_id' => 'id']],
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
            'user_id' => 'User ID',
            'webboard_id' => 'Webboard ID',
            'date_comment' => 'Date Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebboard()
    {
        return $this->hasOne(Webboard::className(), ['id' => 'webboard_id']);
    }

    public function getUser(){
      $user = Yii::$app->user->identityClass;
      return $this->hasOne($user::className(),['id'=>'user_id']);
    }
}
