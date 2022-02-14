<?php

use kartik\helpers\Html;
use common\models\Concept;
use common\models\Patient;
use common\models\base\Visit;
use common\models\VisitAttribute;
$patient_name=Patient::getPatientName($model->person_id);
$this->title = Yii::t('app', 'Patient Details');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-data-content layout-top-spacing">
<div class="panel panel-info">
        <div class="panel-heading">
         <h2><?= Html::encode($this->title) ?><label class="pull-right" style="font-size:16px"></label></h2>
        </div>
        <div class="panel-body">
             
    <div class="row layout-spacing">
        <!-- Content -->
        <div class="col-xl-6 col-lg-6 col-md-4 col-sm-12 layout-top-spacing">

            <div class="user-profile layout-spacing">
                <div class="widget-content widget-content-area">
                    <div class="d-flex justify-content-between">
                       
                                <path d="M12 20h9"></path>
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                            </svg></a>
                    </div>
                    <div class="text-center user-info">
                        <img src="themes/assets/img/90x90.jpg" alt="avatar">
                        <h4 class=""><?=$patient_name?></h4>
                    </div>
                    <div class="user-info-list">

                        <div class="">
                            <?= $this->render('_form_service', [
                                'model' => $model,
                                'action'=>$action,
                                'model_person_name' => $model_person_name,

                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 layout-top-spacing">
 
                    <h3 class="">Service History</h3>

                     
                                    <div id="service_load_id">
                                     <table id="style-1" class="table dt-table-hover dataTable" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Visit Description</th>
                                                    <th>Room</th>
                                                    <th>Date Started</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                     $patient_id=$model->person_id;
                                                $model_visit_data = VisitAttribute::findBySql("SELECT v.patient_id,v.visit_id, `payment_category_concept_id`, `insurance_concept_id`, `insurance_number`, `track_scheme_concept_id`, `attribute_type_id`, `value_reference`, `date_started`, `date_stopped` FROM `visit_attribute` va JOIN visit v ON va.visit_id = v.visit_id WHERE v.patient_id='{$patient_id}' order by visit_attribute_id DESC")->all();
                                               // print_r($model_visits);
                                               // exit();
                                                foreach ($model_visit_data as $row_visits) {
                                                      // print_r($row_visits);
                                                       //exit();
                                                       $doctors_room=Patient::getDoctorRoom($row_visits->visit->patient_id,$row_visits->visit_id);
                                                          $description="";
                                                           $payment_status="";
                                                            if($row_visits->payment_category_concept_id==4030){
                                                                $cash_id=$row_visits->track_scheme_concept_id;
                                                                $scheme_name=Concept::getCashType($cash_id);
                                                                $payment_status="Cash :".$scheme_name;
                                                            }else{
                                                            //get insurance name
                                                            $insurance_id=$row_visits->insurance_concept_id;
                                                            $insurance_name=Concept::getInsuranceName($insurance_id);
                                                            //end 
                                                            $payment_status="Insurance : ".$insurance_name; 
                                                            }
                                                            $description=$row_visits->visit->visitType->name."(".$payment_status.")";
                                                    echo "<tr>
                                                        <td>" .$description."</td>
                                                        <td>" . $doctors_room. "</td>
                                                        <td>" . $row_visits->visit->date_started. "</td>
                                                    </tr>";
                                                }
                                                ?>

                                            </tbody>

                                        </table>
                                         
                                    </div>
                                </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>