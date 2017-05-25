<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\modules\webboard\models\Webboard */

$this->title = $model->topic;
$this->params['breadcrumbs'][] = ['label' => 'Webboards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="webboard-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->user->id == $model->user_id):?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
  <?php endif; ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'topic',
            'detail:ntext',
            'webboard_category_id',
            'user.username',
            //'file',
            [
              'attribute' => 'file',
              'format' => 'raw',
              //'visible'=> ($model->file==null)?false:true,
              'value'=>function($model){
                return ($model->file!=null)?Html::a('ไฟล์แนบ',$model->getUploadUrl('file'),['target'=>"_blank"]):null;
              }
            ],
            'view',
            'date_post:datetime',
        ],
    ]) ?>



    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView'=>'_item_comment',
        // 'itemView' => function ($model, $key, $index, $widget) {
        //     return Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);
        // },
    ]) ?>

    <?php if(!Yii::$app->user->isGuest){
      echo $this->render('../comment/_form',['model'=>$newComment]);
    } ?>





</div>
