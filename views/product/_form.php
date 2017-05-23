<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form ActiveForm */
?>
<div class="product-_form">

    <!-- <form action='' method="post"> -->
    <?php $form = ActiveForm::begin(); ?>

        <!-- <input type="text" name="title" value=""> -->
        <?= $form->field($model, 'title')->textInput(['placeholder'=>'ชื่อสินค้า']) ?>

        <?= $form->field($model, 'price')?>
        <?= $form->field($model, 'type')->dropDownList(['1'=>'Phone','2'=>'Computer'],['prompt'=>'เลือกประเภท']) ?>
        <?= $form->field($model, 'amount')->textInput(['type'=>'number']) ?>
        <?= $form->field($model, 'detail')->textArea() ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- product-_form -->
