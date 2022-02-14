<?php

use common\models\Patient;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\registration\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Patients');
$this->params['breadcrumbs'][] = $this->title;
?>
  <link href="themes/assets/css/apps/contacts.css" rel="stylesheet" type="text/css" />
<div class="patient-index">

<div class="admin-data-content layout-top-spacing">

<div class="widget-content searchable-container grid">

   
    <div class="animated animatedFadeInUp fadeInUp">
    <div class="searchable-items grid">
        <div class="items items-header-section">
            <div class="item-content">
                <div class="">
                    <div class="n-chk align-self-center text-center">
                        <label class="new-control new-checkbox checkbox-primary">
                        
                          <span class="new-control-indicator"></span>
                        </label>
                    </div>
                    <h4>Name</h4>
                </div>
                <div class="user-email">
                    <h4>Email</h4>
                </div>
                <div class="user-location">
                    <h4 style="margin-left: 0;">Location</h4>
                </div>
                <div class="user-phone">
                    <h4 style="margin-left: 3px;">Phone</h4>
                </div>
                <div class="action-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                </div>
            </div>
        </div>
        
      <?php
      $model_patient=Patient::find()->where("voided=0")->orderBy("patient_id DESC")->limit(5)->all();
       foreach($model_patient as $rows){
              $name=$rows->patient->given_name." ".$rows->patient->middle_name." ".$rows->patient->family_name;
              $gender=$rows->patient->gender;
              $living_place=$rows->patient->living_place;
              $phone_number=$rows->patient->phone_number;
              $uuid=$rows->patient->uuid;
        echo '<div class="items personal">
            <div class="item-content">
                <div class="user-profile">
                     
                    <img src="themes/assets/img/90x90.jpg" alt="avatar">
                    <div class="user-meta-info">
                        <p class="user-name" data-name="'.$name.'">'. Html::a($name, ['patient-consultation', 'id' => $uuid]).'</p>
                        <p class="user-gender" data-occupation="Gender">Gender :'.$gender.'</p>
                    </div>
                </div>
               
            </div>
        </div>';
        
          }
        ?>

 
    </div>
    </div>
</div>

</div>

</div>
