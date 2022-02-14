<?php

use Yii;
use yii\helpers\Html;
use common\models\Visit;
use common\models\Patient;
use kartik\detail\DetailView;
use frontend\modules\clinical\models\PatientConsultation;
   $updatelink="";
   $heading="Consultation Note #";
   $patient_id=Patient::getPatientIdByUuid($patient_uuid);
   $visit_id=Visit::getVisitIdByPatientId($patient_id);
   $model_consultation=PatientConsultation::find()->where(["patient_id"=>$patient_id,"visit_id"=>$visit_id])->orderBy("patient_consultation_id DESC")->all();
   $sn=1;
   foreach ($model_consultation as $model) {
   echo $this->render('view', [
        'model'=>$model,
        'patient_uuid'=>$patient_uuid
    ]);
   
$sn++;
}