<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\webboard\models\WebboardCategory;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\modules\webboard\models\Webboard */
/* @var $form yii\widgets\ActiveForm */
print_r($model->getErrors());
?>

<div class="webboard-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'topic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'webboard_category_id')->dropDownList(WebboardCategory::getList()) ?>

    <?= $form->field($model, 'file')->widget(FileInput::classname(), [
      'options' => ['accept' => 'image/*'],
      'pluginOptions' => [
        // 'showPreview' => false,
        // 'showCaption' => true,
        //'showRemove' => true,
        'showUpload' => false
      ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
