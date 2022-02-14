<?php

namespace frontend\modules\clinical\controllers;

use Yii;
use yii\web\Controller;
use common\models\Visit;
use common\models\Patient;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use frontend\modules\clinical\models\PatientCondition;
use frontend\modules\clinical\models\PatientDiagnosisSearch;

/**
 * PatientConditionController implements the CRUD actions for PatientCondition model.
 */
class PatientConditionController extends Controller
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
     * Lists all PatientCondition models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatientDiagnosisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PatientCondition model.
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
     * Creates a new PatientCondition model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($patient_uuid)
    {
        $model = new PatientCondition();

        if ($model->load(Yii::$app->request->post())) {
            $patient_id=Patient::getPatientIdByUuid($patient_uuid);
            $visit_id=Visit::getVisitIdByPatientId($patient_id);
            $model->patient_id=$patient_id;
            $model->visit_id=$visit_id;
            $model->diagnosis_type=2;
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
     * Updates an existing PatientCondition model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$patient_uuid)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new PatientCondition();
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
     * Deletes an existing PatientCondition model.
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
     * Finds the PatientCondition model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PatientCondition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PatientCondition::find()->where(["uuid"=>$id])->One()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
