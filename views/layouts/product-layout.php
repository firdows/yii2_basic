<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use app\assets\AppAsset;
AppAsset::register($this);

use app\models\ProductType;
$list = ProductType::find()->all();

 ?>


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

  </head>
  <body>
    <?php $this->beginBody() ?>
    <div class="wrap">

      <?php
      NavBar::begin([
          'brandLabel' => 'My Company',
          'brandUrl' => Yii::$app->homeUrl,
          'options' => [
              'class' => 'navbar-inverse navbar-fixed-top',
          ],
      ]);
      echo Nav::widget([
          'options' => ['class' => 'navbar-nav navbar-right'],
          'items' => [
              ['label' => 'Home', 'url' => ['/site/index']],
              ['label' => 'Hello World', 'url' => ['/hello/index']],
              ['label' => 'Product', 'url' => ['/product'],
              'items'=>[
                  ['label' => 'รายการสินค้า', 'url' => ['/product'] ],
                  ['label' => 'ประเภทสินค้า', 'url' => ['/product-type'] ]
                ]
            ],
              ['label' => 'About', 'url' => ['/site/about']],
              ['label' => 'Contact', 'url' => ['/site/contact']],
              Yii::$app->user->isGuest ? (
                  ['label' => 'Login', 'url' => ['/site/login']]
              ) : (
                  '<li>'
                  . Html::beginForm(['/site/logout'], 'post')
                  . Html::submitButton(
                      'Logout (' . Yii::$app->user->identity->username . ')',
                      ['class' => 'btn btn-link logout']
                  )
                  . Html::endForm()
                  . '</li>'
              )
          ],
      ]);
      NavBar::end();
      ?>

  <div class="container">

    <div class="row">
      <div class="col-sm-3">
          <h3>Menu</h3>
          <ul class="nav nav-pills nav-stacked">
            <?php foreach($list as $model): ?>
            <li role="presentation" >
              <a href="<?=Url::to(['/product','ProductSearch[product_type_id]'=>$model->id])?>"><?=$model->title?>
                <?php
                $count = count($model->products);
                if($count):
                 ?>
                <span class="badge"><?=$count?></span>
              <?php endif;?>
              </a>
            </li>
          <?php endforeach; ?>
          </ul>
      </div>
      <div class="col-sm-9">
          <?=$content?>
      </div>
    </div>

  </div>

</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Ahamad <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
