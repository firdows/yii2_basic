<?php
namespace app\controllers;


class HelloController extends \yii\web\Controller{

  #hello/index
  public function actionIndex(){
    $weigth = 75;
    $first = 'สุรกิจ';
    $last = 'ชูเดช';

    return $this->render('index',[
      'lastname'=> $last,
      'firstname' => $first,
      'weigth' => $weigth
    ]
  );
  }

  #hello/profile
  public function actionProfile(){
    return $this->render('profile');
  }

  public function actionProduct($id,$brand=null,$price){
    return $this->render('product',[
      'id'=>$id,
      'brand'=>$brand,
      'price' => $price
    ]);
  }

}






 ?>
