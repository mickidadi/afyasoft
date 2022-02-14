<?php

namespace frontend\modules\billing\controllers;

use Yii;
use frontend\modules\billing\models\BlSaleOrders;
use frontend\modules\billing\models\BlSaleOrdersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SaleOrdersController implements the CRUD actions for BlSaleOrders model.
 */
class SaleOrdersController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all BlSaleOrders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlSaleOrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
 /**
     * Lists all BlSaleOrders models.
     * @return mixed
     */
    public function actionOrderIndex()
    {
        $searchModel = new BlSaleOrdersSearch();
        $dataProvider = $searchModel->searchAll(Yii::$app->request->queryParams);

        return $this->render('paid_index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single BlSaleOrders model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerBlSaleOrdersLine = new \yii\data\ArrayDataProvider([
            'allModels' => $model->blSaleOrdersLines,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerBlSaleOrdersLine' => $providerBlSaleOrdersLine,
        ]);
    }

    /**
     * Creates a new BlSaleOrders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BlSaleOrders();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->order_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BlSaleOrders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->order_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BlSaleOrders model.
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
     * Finds the BlSaleOrders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BlSaleOrders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BlSaleOrders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    public function actionPaymentCash($id)
    {
        $model = BlSaleOrders::find()->where(["uuid"=>$id])->One();
            if($model){
            $model->status=1;
        $model->save();
            }
 return $this->redirect(['index']);
    }
}
