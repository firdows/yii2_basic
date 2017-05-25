<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\webboard\models\WebboardCategory */

$this->title = 'Update Webboard Category: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Webboard Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="webboard-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
