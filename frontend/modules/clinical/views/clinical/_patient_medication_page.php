<?php

use kartik\tabs\TabsX;

$patient_drugs="<iframe src='" . \yii\helpers\Url::to(['/clinical/medications/create', 'patient_uuid'=>$patient_uuid]) . "' width='100%' height='675px'></iframe>";
$patient_nondrugs="<iframe src='" . \yii\helpers\Url::to(['/clinical/non-drug/create', 'patient_uuid'=>$patient_uuid]) . "' width='100%' height='675px'></iframe>";
 $items = [
     [
     'label'=>'<i class="fa fa-help"></i>Drugs',
         'content'=>$patient_drugs,
    
     'active'=>true
     ],
     [
        'label'=>'<i class="fa fa-help"></i>Non-Drugs',
            'content'=>$patient_nondrugs
        ],
   
 ];
 echo TabsX::widget([
     'items'=>$items,
     'position'=>TabsX::POS_ABOVE,
     'bordered'=>true,
     'encodeLabels'=>false
 ]);
 ?>