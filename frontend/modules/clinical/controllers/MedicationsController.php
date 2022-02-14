<?php

namespace frontend\modules\clinical\controllers;

use Yii;
use yii\web\Controller;
use common\models\Visit;
use common\models\Patient;
use yii\filters\VerbFilter;
use common\models\BlItemPrice;
use common\models\BlSaleQuote;
use common\models\BlSaleQuoteLine;
use yii\web\NotFoundHttpException;
use frontend\modules\clinical\models\Medications;
use frontend\modules\billing\models\BlSaleQuoteLineSearch;

/**
 * MedicationsController implements the CRUD actions for BlSaleQuoteLine model.
 */
class MedicationsController extends Controller
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
     * Lists all BlSaleQuoteLine models.
     * @return mixed
     */
    public function actionIndex($patient_uuid)
    {
        
        $patient_id=Patient::getPatientIdByUuid($patient_uuid);
        $visit_id=Visit::getVisitIdByPatientId($patient_id);
        $service_type=Yii::$app->params['concept_data']['medicine_service'];
        $searchModel = new BlSaleQuoteLineSearch();
        $dataProvider = $searchModel->searchclinical(Yii::$app->request->queryParams,$patient_id,$visit_id,$service_type);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BlSaleQuoteLine model.
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
     * Creates a new BlSaleQuoteLine model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($patient_uuid)
    {
        $model = new Medications();
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
     * Updates an existing BlSaleQuoteLine model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $item_price=0;
           $patient_uuid=Patient::getPatientUuidByPatientId($model->saleQuote->patient);
           $visitattributeData=Visit::getVisitattributeIdByVisitId($model->saleQuote->visit);
           $payment_category=$visitattributeData->payment_category_concept_id;
           $service_type=Yii::$app->params['concept_data']['medicine_service'];
           $payment_sub_category=$visitattributeData->insurance_concept_id>0?$visitattributeData->insurance_concept_id:$visitattributeData->track_scheme_concept_id;
            $model_price=BlItemPrice::find()->where(["item"=>$model->item,"payment_category"=>$payment_category,"payment_sub_category"=>$payment_sub_category,"retired"=>0,'service_type'=> $service_type])->one();
               if($model_price){
                 $item_price=$model_price->item_price_id;
               }
                    if($item_price>0){
                $model->item_price=$item_price;
                $model->quoted_amount=$model_price->selling_price;
                $model->payable_amount=0;
                    }
                $model->quantity=0;
                // $quoteline->unit=1;
                $model->payment_category=$payment_category;
                $model->payment_sub_category=$payment_sub_category;
                $model->status=Yii::$app->params['billing_status']['quote_line_new'];
         $model->save();
            $sms = Yii::$app->params['code_constants']['update_alert'];
            Yii::$app->getSession()->setFlash('success', $sms);
            return $this->redirect(['index', 'patient_uuid' =>$patient_uuid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BlSaleQuoteLine model.
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
     * Finds the BlSaleQuoteLine model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BlSaleQuoteLine the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BlSaleQuoteLine::findOne($id)) !== null) {
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
