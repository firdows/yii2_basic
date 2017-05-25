<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\webboard\models\WebboardCategory */

$this->title = 'Create Webboard Category';
$this->params['breadcrumbs'][] = ['label' => 'Webboard Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="webboard-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
