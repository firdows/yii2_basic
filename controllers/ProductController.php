<?php

namespace app\controllers;

use Yii;
use app\models\Product;

class ProductController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $modelProduct = Product::find()->all();
        //SELECT * FROM product ;

        return $this->render('index',[
          'model'=>$modelProduct,
        ]);
    }

    public function actionCreate()
    {

        $modelProduct = new Product();

        #if (isset($_POST['submit']))
        if ($modelProduct->load(Yii::$app->request->post())) {
            if ($modelProduct->save()) {
                // form inputs are valid, do something here
                return $this->redirect(['index']);
            }
        }


        return $this->render('create',[
          'model'=>$modelProduct,
        ]);
    }

    public function actionUpdate($id)
    {

        $modelProduct = Product::findOne($id);
        //SElECT * FROM product WHERE id=$_GET['id'];

        #if (isset($_POST['submit']))
        if ($modelProduct->load(Yii::$app->request->post())) {
            if ($modelProduct->save()) {
                // form inputs are valid, do something here
                return $this->redirect(['index']);//กลับหน้า actionIndex
            }
        }
        return $this->render('update',[
          'model'=>$modelProduct,
        ]);
    }

    public function actionDelete($id)
    {

        $modelProduct = Product::findOne($id);
        //SElECT * FROM product WHERE id=$_GET['id'];

          if ($modelProduct->delete()) {
              // form inputs are valid, do something here
              return $this->redirect(['index']);//กลับหน้า actionIndex
          }
    }



}
