<?php

namespace frontend\modules\registration\controllers;

use common\models\base\Visit;
use Yii;
use common\models\Patient;
use common\models\PatientDoctorRoom;
use common\models\Person;
use common\models\PersonAddress;
use common\models\PersonName;
use common\models\VisitAttribute;
use frontend\modules\registration\models\PatientSearch;
use frontend\modules\registration\models\PatientVisitService;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * PatientController implements the CRUD actions for Patient model.
 */
class PatientController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Patient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Patient model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id,$action=201)
    {
        $model_person_name = new PatientVisitService();
        if ($model_person_name->load(Yii::$app->request->post())) {
               //save  the patient visit
               $model_visit= new Visit();
               $model_visit->patient_id=$model_person_name->patient_id;
               $model_visit->visit_type_id=$model_person_name->visit_type;
               $model_visit->date_started=date("Y-m-d H:m:s");
               $model_visit->location_id=1;
             $model_visit->save(false);
            //end
            //save visit attribute
            $payment_model=$model_person_name->payment_category_concept_id; 
            $model_visit_attr= new VisitAttribute();
                   $model_visit_attr->visit_id=$model_visit->visit_id;
                   $model_visit_attr->payment_category_concept_id=$payment_model;
                        if($payment_model==4031){
                   $model_visit_attr->insurance_concept_id=$model_person_name->insurance_concept_id;
                   $model_visit_attr->insurance_number=$model_person_name->insurance_number;
                        }else{
                   $model_visit_attr->track_scheme_concept_id=$model_person_name->track_scheme_concept_id;
                        }
                   $model_visit_attr->attribute_type_id=1;
                   $model_visit_attr->value_reference="OPD";
                   $model_visit_attr->location_id=$model_person_name->room;
            $model_visit_attr->save(false);
            //doctor room history
            //update room set to 0
           Yii::$app->db->createcommand("update patient_doctor_room set status=0 where patient_id='{$model_person_name->patient_id}'")->execute();
               //end
                $model_room= new PatientDoctorRoom();
                   $model_room->patient_id=$model_person_name->patient_id;
                   $model_room->location_id=$model_person_name->room;
                   $model_room->status=1;
                   $model_room->visit_id=$model_visit->visit_id;
               $model_room->save(false);
               return $this->redirect(['view', 'id' => $id,'action'=>200]);
           }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'model_person_name'=>$model_person_name,
            'action'=>$action
        ]);
    }
    public function actionRegistration()
    {
        
        $model_person_name = new PersonName();
       Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
       // return Yii::$app->request->post();
      
      
        if (Yii::$app->request->isAjax) {
           
     if ($model_person_name->load(Yii::$app->request->post())) {

        $day=Yii::$app->request->post("day");
        $month=Yii::$app->request->post("month");
        $year=Yii::$app->request->post("year");
         if($day==""){
           $day="01";
         }
         if($month==""){
            $month="01";
          }
          if($year==""){
            $year="1990";
          }
          $dob=$year."-".$month."-".$day;
           $model_person_name->birthdate=$dob;
           
        $model_person_name->living_place=Yii::$app->request->post("living_place");
            if($model_person_name->save()){
             $model = new Patient();
                $model->patient_id=$model_person_name->person_id;
             $model->save(false);
             //save  the patient visit
              $model_visit= new Visit();
                $model_visit->patient_id=$model->patient_id;
                $model_visit->visit_type_id=Yii::$app->request->post("visit_type");
                $model_visit->date_started=date("Y-m-d H:m:s");
                $model_visit->location_id=1;
              $model_visit->save(false);
             //end
             //save visit attribute
             $payment_model=Yii::$app->request->post("payment_category_concept_id"); 
             $model_visit_attr= new VisitAttribute();
                    $model_visit_attr->visit_id=$model_visit->visit_id;
                    $model_visit_attr->payment_category_concept_id=$payment_model;
                         if($payment_model==4031){
                    $model_visit_attr->insurance_concept_id=Yii::$app->request->post("insurance_concept_id");
                    $model_visit_attr->insurance_number=$model_person_name->insurance_number;
                         }else{
                    $model_visit_attr->track_scheme_concept_id=Yii::$app->request->post("track_scheme_concept_id");
                         }
                    $model_visit_attr->attribute_type_id=1;
                    $model_visit_attr->location_id=$model_person_name->room;
                    $model_visit_attr->value_reference="OPD";
             $model_visit_attr->save(false);
             //doctor room history
                 $model_room= new PatientDoctorRoom();
                 $model_room->patient_id=$model->patient_id;
                 $model_room->location_id=$model_person_name->room;
                 $model_room->visit_id=$model_visit->visit_id;
                $model_room->save(false);
             //end
             //end
            }
    //create encounter
        $model_person_address = new PersonAddress();
        return [
            'data' => [
                'success' =>true,
                'model' =>$model_person_name,
                'message' => 'Model has been saved.',
            ],
            'code' =>1,
        ];
      
         //$model_person_name->save()

         return [
            'data' => [
                'success' =>true,
                'model' => $model,
                'message' => 'Model has been saved.',
            ],
            'code' =>200,
        ];
         //   return $this->redirect(['view', 'id' => $model->patient_id]);
        }
       }else{
        return [
            'data' => [
                'success' =>false,
                'model' =>Yii::$app->request->post(),
                'message' => 'Model has been saved.',
            ],
            'code' =>1,
        ];
       }
    }
    public function actionRegisterVisitService()
    {
        
        $model_person_name = new PatientVisitService();
          Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
       // return Yii::$app->request->post();
        if (Yii::$app->request->isAjax) {
           
     if ($model_person_name->load(Yii::$app->request->post())) {
 
             //save  the patient visit
              $model_visit= new Visit();
                $model_visit->patient_id=$model_person_name->patient_id;
                $model_visit->visit_type_id=Yii::$app->request->post("visit_type");
                $model_visit->date_started=date("Y-m-d H:m:s");
                $model_visit->location_id=1;
              $model_visit->save(false);
             //end
             //save visit attribute
             $payment_model=Yii::$app->request->post("payment_category_concept_id"); 
             $model_visit_attr= new VisitAttribute();
                    $model_visit_attr->visit_id=$model_visit->visit_id;
                    $model_visit_attr->payment_category_concept_id=$payment_model;
                         if($payment_model==4031){
                    $model_visit_attr->insurance_concept_id=Yii::$app->request->post("insurance_concept_id");
                    $model_visit_attr->insurance_number=$model_person_name->insurance_number;
                         }else{
                    $model_visit_attr->track_scheme_concept_id=Yii::$app->request->post("track_scheme_concept_id");
                         }
                    $model_visit_attr->attribute_type_id=1;
                    $model_visit_attr->value_reference="OPD";
                    $model_visit_attr->location_id=$model_person_name->room;
             $model_visit_attr->save(false);
             //doctor room history
                //update room set to 0
            Yii::$app->db->createcommand("update patient_doctor_room set status=0 where patient_id='{$model_person_name->patient_id}'")->execute();
                //end
                 $model_room= new PatientDoctorRoom();
                    $model_room->patient_id=$model_person_name->patient_id;
                    $model_room->location_id=$model_person_name->room;
                    $model_room->status=1;
                    $model_room->visit_id=$model_visit->visit_id;
                $model_room->save(false);
             //end
             //end
         //   }
    //create encounter
   
        return [
            'data' => [
                'success' =>true,
                'model' =>$model_person_name,
                'message' => 'Model has been saved.',
            ],
            'code' =>1,
        ];
        
        }
       }else{
        return [
            'data' => [
                'success' =>false,
                'model' =>Yii::$app->request->post(),
                'message' => 'Model has been saved.',
            ],
            'code' =>1,
        ];
       }
    }
    /**
     * Creates a new Patient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($action=203)
    {
        // $model = new Patient();
      //  $model_person = new Person();
        $model = new PersonName();
        $model_person_address = new PersonAddress();
     if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        
         // $dob=$year."-".$month."-".$day;
         //  $model->birthdate=$dob;
       // $model->living_place=$living_place");
           $status= PersonName::registerpatient($model);
              if($status==200){
        return $this->redirect(['create','action'=>200]);
              }
            //  print_r($status);
            //   exit();
        }
    return $this->render('create', [
            'model' => $model,
         //   'model_person' => $model_person,
           // 'model_person_name' => $model_person_name,
            'action'=>$action,
            'model_person_address' => $model_person_address,

        ]);
    }

    /**
     * Updates an existing Patient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id,$action=203)
    {
        $model = $this->findModel1($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            return $this->redirect(['update', 'id'=>$model->person_id,'action' =>200]);
        }
        return $this->render('update', [
            'model' => $model,
            "action"=>$action
        ]);
    }

    /**
     * Deletes an existing Patient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Patient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Patient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        // $model = new PersonName();
        if (($model = PersonName::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    protected function findModel1($id)
    {
        // $model = new PersonName();
        if (($model = Person::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    public function actionListVisitService()
    {
       $id=Yii::$app->request->post("patient_id");
        return $this->renderAjax('_list_patient_visit_service', [
            'model' => $this->findModel($id)
        ]);
    }
}
