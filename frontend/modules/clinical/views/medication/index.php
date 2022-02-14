<?php

use Yii;
use yii\helpers\Html;
use common\models\Visit;
use common\models\Patient;
use kartik\detail\DetailView;
use common\models\base\BlSaleQuoteLine;
   $updatelink="";
   $heading="Drugs  Data#";
   $service_type=Yii::$app->params['concept_data']['medicine_service'];
   $patient_id=Patient::getPatientIdByUuid($patient_uuid);
   $visit_id=Visit::getVisitIdByPatientId($patient_id);
   $model_drug=BlSaleQuoteLine::find()->joinWith("saleQuote")->where("bl_sale_quote.patient='{$patient_id}' AND bl_sale_quote.visit='{$visit_id}' AND service_type='{$service_type}'")->orderBy("quote_line_id DESC")->all();
   $sn=1;
   foreach ($model_drug as $model) {
   echo $this->render('view', [
        'model'=>$model,
        'patient_uuid'=>$patient_uuid
    ]);
   
$sn++;
}