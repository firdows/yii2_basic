<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\webboard\models\Webboard */

$this->title = 'Update Webboard: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Webboards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="webboard-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
