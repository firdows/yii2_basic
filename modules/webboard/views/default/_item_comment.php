<?php
//use app\modules\webboard
use yii\helpers\Html;
 ?>

<div class="media">
  <div class="media-left">
    <a href="#">
      <?=Html::img($model->user->profile->getAvatarUrl(24));?>
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><?=$model->title?></h4>
    <small>
      <?=$model->user->username?>
    </small> |
    <small><?=Yii::$app->formatter->asDateTime($model->date_comment)?></small>
  </div>
</div>
<hr/>
