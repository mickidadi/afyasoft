<?php

namespace frontend\modules\clinical\controllers;

use Yii;
use yii\web\Controller;
use common\models\Visit;
use common\models\Patient;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use frontend\modules\clinical\models\PatientConsultation;
use frontend\modules\billing\models\PatientConsultationSearch;

/**
 * PatientConsultationController implements the CRUD actions for PatientConsultation model.
 */
class PatientConsultationController extends Controller
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
     * Lists all PatientConsultation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatientConsultationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PatientConsultation model.
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
     * Creates a new PatientConsultation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($patient_uuid)
    {
        $model = new PatientConsultation();

        if ($model->load(Yii::$app->request->post())) {
            $patient_id=Patient::getPatientIdByUuid($patient_uuid);
            $visit_id=Visit::getVisitIdByPatientId($patient_id);
            $model->patient_id=$patient_id;
            $model->visit_id=$visit_id;
               if($model->save()){
                 //    print_r($model);
                  //     exit();
                  $sms = Yii::$app->params['code_constants']['create_alert'];
                  Yii::$app->getSession()->setFlash('success', $sms);
                return $this->redirect(['create', 'patient_uuid' =>$patient_uuid]);    
               }
          
        } else {
            
            return $this->render('create', [
                'model' => $model,
                'patient_uuid'=>$patient_uuid
            ]);
        }
    }

    /**
     * Updates an existing PatientConsultation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$patient_uuid)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new PatientConsultation();
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
     * Deletes an existing PatientConsultation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id,$patient_uuid)
    {
        $model1=$model=$this->findModel($id);
        $model1->delete();
    return $this->redirect(['create', 'patient_uuid' =>$patient_uuid]); 
    }

   
    
    /**
     * Finds the PatientConsultation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PatientConsultation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PatientConsultation::find()->where(["uuid"=>$id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
