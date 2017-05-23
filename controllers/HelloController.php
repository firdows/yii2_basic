<?php
namespace app\controllers;


class HelloController extends \yii\web\Controller{

  #hello/index
  public function actionIndex(){
    $weigth = 75;

    return $this->render('index',[
      'firstname' => 'อาฮาหมัด',
      'lastname'=> 'เจ๊ะดือราแม',
      'weigth' => $weigth
    ]
  );
  }

  #hello/profile
  public function actionProfile(){
    return $this->render('profile');
  }

}






 ?>
