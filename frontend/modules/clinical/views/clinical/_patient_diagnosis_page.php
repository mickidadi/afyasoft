<?php

use kartik\tabs\TabsX;

$patient_condition="<iframe src='" . \yii\helpers\Url::to(['/clinical/patient-condition/create', 'patient_uuid'=>$patient_uuid]) . "' width='100%' height='675px'></iframe>";
$patient_diagnosis="<iframe src='" . \yii\helpers\Url::to(['/clinical/patient-diagnosis/create', 'patient_uuid'=>$patient_uuid]) . "' width='100%' height='675px'></iframe>";
 $items = [
     [
     'label'=>'<i class="fa fa-help"></i>Conditions',
         'content'=>$patient_condition,
    
     'active'=>true
     ],
     [
        'label'=>'<i class="fa fa-help"></i>Diagnosis',
            'content'=>$patient_diagnosis
        ],
   
 ];
 echo TabsX::widget([
     'items'=>$items,
     'position'=>TabsX::POS_ABOVE,
     'bordered'=>true,
     'encodeLabels'=>false
 ]);
 ?>