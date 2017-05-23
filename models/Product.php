<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $title
 * @property string $detail
 * @property string $price
 * @property integer $type
 * @property integer $amount
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'price', 'type', 'amount'], 'required'],
            [['detail'], 'string'],
            [['price'], 'number'],
            [['type', 'amount'], 'integer'],
            [['title'], 'string', 'max' => 100],
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
            'detail' => 'Detail',
            'price' => 'Price',
            'type' => 'Type',
            'amount' => 'Amount',
        ];
    }
}
