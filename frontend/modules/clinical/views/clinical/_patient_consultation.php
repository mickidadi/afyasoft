<?php
use yii\helpers\Url;
?>
<?php
 $dashboard=$observation=$diagnosis=$admission=$orders=$consultation=$medications=$bacteriology="";
if($action=='dashboard'){
  $dashboard='active';
}else if($action=='observation'){
  $observation='active';
   
}elseif($action=='diagnosis'){
  $diagnosis="active";
}
elseif($action=='admission'){
    $admission='active';
     
  }elseif($action=='consultation'){
    $consultation="active";
  }
  elseif($action=='orders'){
    $orders='active';
     
  }elseif($action=='medications'){
    $medications="active";
  }
  elseif($action=='bacteriology'){
    $bacteriology="active";
  }
$model_search="";
?>

  
  
  <div class="firsttabpanel" style="background-color:#ccc7c6 !important;">
   <ul class="nav nav-tabs" >    
    <li class="<?php echo $dashboard; ?>"><a href="<?=  Url::to(['/clinical/clinical/patient-consultation','action'=>"dashboard",'id'=>$uuid]);?>">Dashboard</a></li>
    <li class="<?php echo $observation; ?>"><a href="<?=  Url::to(['/clinical/clinical/patient-consultation','action'=>'observation','id'=>$uuid]);?>">Observation</a></li>
    <li class="<?php echo $diagnosis; ?>"><a href="<?=  Url::to(['/clinical/clinical/patient-consultation','action'=>'diagnosis','id'=>$uuid]);?>">Diagnosis</a></li>
    <li class="<?php echo $admission; ?>"><a href="<?=  Url::to(['/clinical/clinical/patient-consultation','action'=>'admission','id'=>$uuid]);?>">Admission</a></li>
    <li class="<?php echo $consultation; ?>"><a href="<?=  Url::to(['/clinical/clinical/patient-consultation','action'=>'consultation','id'=>$uuid]);?>">Consultation</a></li>
    <li class="<?php echo $orders; ?>"><a href="<?=  Url::to(['/clinical/clinical/patient-consultation','action'=>'orders','id'=>$uuid]);?>">Order</a></li>
    <li class="<?php echo $medications; ?>"><a href="<?=  Url::to(['/clinical/clinical/patient-consultation','action'=>'medications','id'=>$uuid]);?>">Medications</a></li>
    <li class="<?php echo $bacteriology; ?>"><a href="<?=  Url::to(['/clinical/clinical/patient-consultation','action'=>'bacteriology','id'=>$uuid]);?>">Bacteriology</a></li>
    
    </ul>
       </div>
 
<?php 
   if($action=='dashboard'){
    echo $this->render('_patient_dashboard_page',["model_search"=>$model_search,'patient_uuid'=>$uuid]);
  }else if($action=='observation'){
    echo $this->render('_patient_observation_page',["model_search"=>$model_search,'patient_uuid'=>$uuid]);
     
  }elseif($action=='diagnosis'){
    echo $this->render('_patient_diagnosis_page',["model_search"=>$model_search,'patient_uuid'=>$uuid]);
  }
  elseif($action=='admission'){
    echo $this->render('_patient_admission_page',["model_search"=>$model_search,'patient_uuid'=>$uuid]);
       
    }elseif($action=='consultation'){
        echo $this->render('_patient_consultation_page',["model_search"=>$model_search,'patient_uuid'=>$uuid]);
    }
    elseif($action=='orders'){
        echo $this->render('_patient_orders_page',["model_search"=>$model_search,'patient_uuid'=>$uuid]);
       
    }elseif($action=='medications'){
        echo $this->render('_patient_medication_page',["model_search"=>$model_search,'patient_uuid'=>$uuid]);
    }
    elseif($action=='bacteriology'){
        echo $this->render('_patient_bacteriology_page',["model_search"=>$model_search,'patient_uuid'=>$uuid]);
    }
    
 

?>
