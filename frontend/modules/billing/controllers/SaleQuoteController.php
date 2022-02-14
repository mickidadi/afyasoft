<?php

namespace frontend\modules\billing\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\BlSaleQuote;
use yii\web\NotFoundHttpException;
use frontend\modules\billing\models\BlSaleOrders;
use frontend\modules\billing\models\BlSaleQuoteSearch;

/**
 * SaleQuoteController implements the CRUD actions for BlSaleQuote model.
 */
class SaleQuoteController extends Controller
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
     * Lists all BlSaleQuote models.
     * @return mixed
     */
    public function actionIndex($action=403)
    {
        $searchModel = new BlSaleQuoteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

       
        if (Yii::$app->request->post()) {
            print_r(Yii::$app->request->post());
            $selection=Yii::$app->request->post("selection");
                if(is_array($selection) && count($selection)>0){
             $status=BlSaleOrders::SaveOrders(Yii::$app->request->post());
                    if($status==200){
          return $this->redirect(['index', 'action' => $status]);
                    }
                }
        return $this->redirect(['index', 'action' => 403]);
        } else {
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'action' => $action
            ]);
        }
    }

    /**
     * Displays a single BlSaleQuote model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerBlSaleOrderByQuote = new \yii\data\ArrayDataProvider([
            'allModels' => $model->blSaleOrderByQuotes,
        ]);
        $providerBlSaleQuoteLine = new \yii\data\ArrayDataProvider([
            'allModels' => $model->blSaleQuoteLines,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerBlSaleOrderByQuote' => $providerBlSaleOrderByQuote,
            'providerBlSaleQuoteLine' => $providerBlSaleQuoteLine,
        ]);
    }

    /**
     * Creates a new BlSaleQuote model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BlSaleQuote();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->quote_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BlSaleQuote model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new BlSaleQuote();
        }else{
            $model = $this->findModel($id);
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->quote_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BlSaleQuote model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    /**
    * Creates a new BlSaleQuote model by another data,
    * so user don't need to input all field from scratch.
    * If creation is successful, the browser will be redirected to the 'view' page.
    *
    * @param mixed $id
    * @return mixed
    */
    public function actionSaveAsNew($id) {
        $model = new BlSaleQuote();

        if (Yii::$app->request->post('_asnew') != '1') {
            $model = $this->findModel($id);
        }
    
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->quote_id]);
        } else {
            return $this->render('saveAsNew', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Finds the BlSaleQuote model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BlSaleQuote the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BlSaleQuote::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for BlSaleOrderByQuote
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddBlSaleOrderByQuote()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('BlSaleOrderByQuote');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formBlSaleOrderByQuote', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for BlSaleQuoteLine
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddBlSaleQuoteLine()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('BlSaleQuoteLine');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formBlSaleQuoteLine', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
