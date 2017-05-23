<?php
namespace app\controllers;


class HelloController extends \yii\web\Controller{

  #hello/index
  public function actionIndex(){
    return $this->render('index');
  }

  #hello/profile
  public function actionProfile(){
    return $this->render('profile');
  }

}






 ?>
