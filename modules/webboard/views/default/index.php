<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\webboard\models\WebboardCategory;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\webboard\models\WebboardSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Webboards';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="webboard-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <p>
        <?= Html::a('ตั้งกระทู้', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'topic',
            [
              'attribute' => 'topic',
              'format' => 'raw',
              //'filter' => WebboardCategory::getList(),
              'value'=> function($model){
                return Html::a($model->topic,['view','id'=>$model->id])."<br/>";
              }
            ],
            //'detail:ntext',
            //'webboard_category_id',
            [
              'attribute' => 'webboard_category_id',
              'filter' => WebboardCategory::getList(),
              'value'=> 'webboardCategory.title'
            ],
            //'user_id',
            // 'file',
             'view',
             'date_post:datetime',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
