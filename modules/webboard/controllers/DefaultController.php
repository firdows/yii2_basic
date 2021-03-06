<?php

namespace app\modules\webboard\controllers;

use Yii;
use app\modules\webboard\models\Webboard;
use app\modules\webboard\models\WebboardComment;
use app\modules\webboard\models\WebboardSeach;
use app\modules\webboard\models\WebboardCommentSeach;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

#ดัก action
use yii\filters\AccessControl;

/**
 * DefaultController implements the CRUD actions for Webboard model.
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
          'access' => [
              'class' => AccessControl::className(),
              'rules' => [
                  [
                      'actions' => ['index',  'view'],
                      'allow' => true,  #อนุญาติเข้า
                  ],
                  [
                      'actions' => ['create','update','delete'],
                      'allow' => true,
                      'roles' => ['@'], # @ ต้องลงชื่อเข้าใช้
                  ],
              ],
          ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Webboard models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WebboardSeach();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Webboard model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $searchModel = new WebboardCommentSeach(['webboard_id'=>$id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        $newComment = new WebboardComment(['webboard_id'=>$id]);
        if ($newComment->load(Yii::$app->request->post()) && $newComment->save()) {
            return $this->redirect(['view', 'id' => $id]);
        }

        $model =$this->findModel($id);
        $model->updateCounters(['view' => 1]);

        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'newComment'=>$newComment
        ]);
    }

    /**
     * Creates a new Webboard model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Webboard();
        $model->setScenario('insert');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Webboard model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->setScenario('update');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Webboard model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Webboard model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Webboard the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Webboard::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
