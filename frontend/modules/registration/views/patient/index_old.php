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

<div class="widget-content searchable-container list">

    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5 col-sm-7 filtered-list-search layout-spacing align-self-center">
            <form class="form-inline my-2 my-lg-0">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <input type="text" class="form-control product-search" id="input-search" placeholder="Search">
                </div>
            </form>
        </div>

        <div class="col-xl-8 col-lg-7 col-md-7 col-sm-5 text-sm-right text-center layout-spacing align-self-center">
            <div class="d-flex justify-content-sm-end justify-content-center">
                <?= Html::a('<svg id="btn-add-contact" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>', ['create']) ?>
                

                <div class="switch align-self-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list view-list active-view"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid view-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                </div>
            </div>
 
        </div>
    </div>
    <div class="animated animatedFadeInUp fadeInUp">
    <div class="searchable-items list">
        <div class="items items-header-section">
            <div class="item-content">
                <div class="">
                    
                    <h4>Name</h4>
                </div>
                 
                <div class="user-email">
                    <h4>Doctor's Room</h4>
                </div>
            </div>
        </div>
        
      <?php
      $model_patient=Patient::find()->where("voided=0")->orderBy("patient_id DESC")->limit(100)->all();
       foreach($model_patient as $rows){
              $name=$rows->patient->given_name." ".$rows->patient->middle_name." ".$rows->patient->family_name;
              $gender=$rows->patient->gender;
              $living_place=$rows->patient->living_place;
              $phone_number=$rows->patient->phone_number;
               $doctors_room=Patient::getDoctorRoomActive($rows->patient_id);
      
        echo ' 
        <div class="items">
            <div class="item-content">
                <div class="user-profile">
                    
                    <img src="themes/assets/img/90x90.jpg" alt="avatar">
                    <div class="user-meta-info">
                        <p class="user-name" data-name="'.$name.'">'. Html::a($name, ['view', 'id' => $rows->patient_id]).'</p>
                        <p class="user-work" data-occupation="Gender">Gender :'.$gender.'</p>
                        <p class="usr-ph-no" data-phone="'.$phone_number.'">Phone:'.$phone_number.'</p>
                    </div>
                </div>
             
                <div class="user-room">
                <p class="info-title">Doctor Room </p>
                <p class="usr-title"><span class="badge badge-success">'.$doctors_room.'</span></p>
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
