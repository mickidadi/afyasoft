<?php

use Yii;
use yii\helpers\Html;
use common\models\Visit;
use common\models\Patient;
use kartik\detail\DetailView;
use frontend\modules\clinical\models\PatientDiagnosis;
   $updatelink="";
   $heading="Diagnosis Note #";
   $patient_id=Patient::getPatientIdByUuid($patient_uuid);
   $visit_id=Visit::getVisitIdByPatientId($patient_id);
   $model_diagnosis=PatientDiagnosis::find()->where(["patient_id"=>$patient_id,"visit_id"=>$visit_id,"diagnosis_type"=>1])->orderBy("patient_diagnosis_id DESC")->all();
   $sn=1;
   foreach ($model_diagnosis as $model) {
   echo $this->render('view', [
        'model'=>$model,
        'patient_uuid'=>$patient_uuid
    ]);
   
$sn++;
}