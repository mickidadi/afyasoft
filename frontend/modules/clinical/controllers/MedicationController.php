<?php

namespace frontend\modules\clinical\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\BlSaleQuote;
use yii\web\NotFoundHttpException;
use frontend\modules\billing\models\DrugQuoteLine;
use frontend\modules\billing\models\DrugQuoteLineSearch;

/**
 * MedicationController implements the CRUD actions for DrugQuoteLine model.
 */
class MedicationController extends Controller
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
     * Lists all DrugQuoteLine models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DrugQuoteLineSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DrugQuoteLine model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DrugQuoteLine model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($patient_uuid)
    {
        $model = new DrugQuoteLine();

       
        if ($model->load(Yii::$app->request->post())) {
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
     * Updates an existing DrugQuoteLine model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new DrugQuoteLine();
        }else{
            $model = $this->findModel($id);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $sms = Yii::$app->params['code_constants']['update_alert'];
            Yii::$app->getSession()->setFlash('success', $sms);
            return $this->redirect(['create', 'patient_uuid' =>$patient_uuid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DrugQuoteLine model.
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
    * Creates a new DrugQuoteLine model by another data,
    * so user don't need to input all field from scratch.
    * If creation is successful, the browser will be redirected to the 'view' page.
    *
    * @param mixed $id
    * @return mixed
    */
    public function actionSaveAsNew($id) {
        $model = new DrugQuoteLine();

        if (Yii::$app->request->post('_asnew') != '1') {
            $model = $this->findModel($id);
        }
    
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->quote_line_id]);
        } else {
            return $this->render('saveAsNew', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Finds the DrugQuoteLine model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DrugQuoteLine the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DrugQuoteLine::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
