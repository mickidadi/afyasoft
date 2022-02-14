<?php

use kartik\tabs\TabsX;

echo "<iframe src='" . \yii\helpers\Url::to(['/clinical/patient-consultation/create', 'patient_uuid'=>$patient_uuid]) . "' width='100%' height='675px'></iframe>";
 
 /*$items = [
     [
     'label'=>'<i class="fa fa-help"></i>Details',
         'content'=>$patient_consult,
    
     'active'=>true
     ],
   
 ];
 echo TabsX::widget([
     'items'=>$items,
     'position'=>TabsX::POS_ABOVE,
     'bordered'=>true,
     'encodeLabels'=>false
 ]);*/
 ?>