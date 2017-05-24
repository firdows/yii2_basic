<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\ProductType;
use yii\helpers\ArrayHelper;

$productType = ProductType::find()->all();
$productTypeList = ArrayHelper::map($productType,'id','title');

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout'=>"{summary}\n{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            //'detail:ntext',
            'price:decimal',
            //'product_type_id',
            [
                'attribute' => 'product_type_id',
                'filter' => $productTypeList,
                'value' => function($model){
                    return $model->productType->title;
                }
            ],

            // 'amount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
