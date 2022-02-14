<?php

use common\models\Concept;
use common\models\Patient;
use common\models\VisitAttribute;
?>
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

$model_visits = VisitAttribute::findBySql("SELECT v.patient_id,v.visit_id, `payment_category_concept_id`, `insurance_concept_id`, `insurance_number`, `track_scheme_concept_id`, `attribute_type_id`, `value_reference`, `date_started`, `date_stopped` FROM `visit_attribute` va JOIN visit v ON va.visit_id = v.visit_id WHERE v.patient_id='{$model->person_id}' order by visit_attribute_id DESC")->all();
                                               // print_r($model_visits);
                                               // exit();
                                                foreach ($model_visits as $row_visits) {
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