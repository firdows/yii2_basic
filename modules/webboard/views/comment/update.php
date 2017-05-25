<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\webboard\models\WebboardComment */

$this->title = 'Update Webboard Comment: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Webboard Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="webboard-comment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
