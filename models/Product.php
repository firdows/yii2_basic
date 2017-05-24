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
 * @property integer $product_type_id
 * @property integer $amount
 *
 * @property ProductType $productType
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
            [['title', 'price', 'product_type_id', 'amount'], 'required'],
            [['detail'], 'string'],
            [['price'], 'number'],
            [['product_type_id', 'amount'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['product_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductType::className(), 'targetAttribute' => ['product_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'ชื่อ',
            'detail' => 'รายละเอียด',
            'price' => 'ราคา',
            'product_type_id' => 'ประเภทสินค้า',
            'amount' => 'จำนวน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductType()  
    {
        return $this->hasOne(ProductType::className(), ['id' => 'product_type_id']);
    }
}
