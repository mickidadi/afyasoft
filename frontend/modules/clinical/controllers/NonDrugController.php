<?php

namespace frontend\modules\clinical\controllers;

use Yii;
use frontend\modules\clinical\models\NonDrug;
use frontend\modules\billing\models\NonDrugSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NonDrugController implements the CRUD actions for NonDrug model.
 */
class NonDrugController extends Controller
{
    public function behaviors()
    {
        $this->layout = '@frontend/views/layouts/default_main';
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
     * Lists all NonDrug models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NonDrugSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NonDrug model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerBlDiscount = new \yii\data\ArrayDataProvider([
            'allModels' => $model->blDiscounts,
        ]);
        $providerBlSaleQuoteReferenceMap = new \yii\data\ArrayDataProvider([
            'allModels' => $model->blSaleQuoteReferenceMaps,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerBlDiscount' => $providerBlDiscount,
            'providerBlSaleQuoteReferenceMap' => $providerBlSaleQuoteReferenceMap,
        ]);
    }

    /**
     * Creates a new NonDrug model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($patient_uuid)
    {
        $model = new NonDrug();

        if ($model->load(Yii::$app->request->post())&&$model->validate()) {
            // $patient_id=Patient::getPatientIdByUuid($patient_uuid);
            // $visit_id=Visit::getVisitIdByPatientId($patient_id); 
                // print_r($model);
               //     exit();
             $status_code=BlSaleQuote::saveQuoteMedication($model,$patient_uuid);
             if($status_code==200){
                 $sms = Yii::$app->params['code_constants']['create_alert'];
                 Yii::$app->getSession()->setFlash('success', $sms);
              }else{
                 $sms = Yii::$app->params['code_constants']['errors_alert'];
                 Yii::$app->getSession()->setFlash('dangers', $sms);
             }
                /*if($model->save()){
                  //    print_r($model);
                   //     exit();
                   $sms = Yii::$app->params['code_constants']['create_alert'];
                   Yii::$app->getSession()->setFlash('success', $sms);
                
                }*/
         return $this->redirect(['create', 'patient_uuid' =>$patient_uuid]);   
         } else {
             
             return $this->render('create', [
                 'model' => $model,
                 'patient_uuid'=>$patient_uuid
             ]);
         }
    }

    /**
     * Updates an existing NonDrug model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->quote_line_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing NonDrug model.
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
     * Finds the NonDrug model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NonDrug the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NonDrug::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for BlDiscount
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddBlDiscount()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('BlDiscount');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formBlDiscount', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for BlSaleQuoteReferenceMap
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddBlSaleQuoteReferenceMap()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('BlSaleQuoteReferenceMap');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formBlSaleQuoteReferenceMap', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
