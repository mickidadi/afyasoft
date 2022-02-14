<?php
use common\models\Concept;
?>
<style>
 
 
 .cat{
   margin: 4px;
   background-color: #104068;
   border-radius: 4px;
   border: 1px solid #fff;
   overflow: hidden;
   float: left;
 }
 
 .cat label {
   float: left; 
   line-height: 3.0em;
  height: 3.0em;
  width: 20.0em; 
 }
 
 .cat label span {
   text-align: center;
   padding: 3px 0;
   display: block;
 }
 
 .cat label input {
   position: absolute;
   display: none;
   color: #fff !important;
 }
 /* selects all of the text within the input element and changes the color of the text */
 .cat label input + span{color: #fff;}
 
 
 /* This will declare how a selected input will look giving generic properties */
 .cat input:checked + span {
     color: #ffffff;
     text-shadow: 0 0  6px rgba(0, 0, 0, 0.8);
     content: '✔';
    
 }
 
 
 /*
 This following statements selects each category individually that contains an input element that is a checkbox and is checked (or selected) and chabges the background color of the span element.
 */
 
 .action input:checked + span{ content: '✔';}
 .comedy input:checked + span{background-color: #1BB8F7; }
 .crime input:checked + span{background-color: #D9D65D; }
 .history input:checked + span{background-color: #82D44E;}
 .reality input:checked + span{background-color: #F3A4CF; }
 .news input:checked + span{background-color: #8C1B1B; }
 .scifi input:checked + span{background-color: #AC9BD1;}
 .sports input:checked + span{background-color: #214A09;}
 
 </style>
<div class="col-xs-2">
  <!-- required for floating -->
  <!-- Nav tabs -->
  <ul class="nav nav-tabs tabs-left">
  <?php
                            // print_r(Yii::$app->params);
      $orderable_model=Concept::getConceptSet($concept_id);
                        //print_r($orderable_model);
                         // exit();
    foreach($orderable_model as $rows){ 
      $name=$rows["name"];
      $concepts_id=$rows["id"];
       ?>
    <li><a href="#home<?=$concepts_id?>" data-toggle="tab"><?=$name?></a></li>
    <?php
    }
    ?>
    
  </ul>
</div>

<div class="col-xs-12 col-xs-10">
  <!-- Tab panes -->
  <div class="tab-content">
  <?php
  foreach($orderable_model as $rows){ 
   $name=$rows["name"];
   $concepts_id=$rows["id"];
    ?>
  <div class="tab-pane" id="home<?=$concepts_id?>">
      <p class="lead"><?=$name?></p>
      <?=$this->render('_order_items', [
                            'concepts_id' => $concepts_id,
                        ]);?>
    </div>
 <?php
 }
   ?>
    <div class="tab-pane" id="profile<?=$concept_id?>">Profile Tab.</div>
    <div class="tab-pane" id="messages<?=$concept_id?>">Messages Tab.</div>
    <div class="tab-pane" id="settings<?=$concept_id?>">Settings Tab.</div>
  </div>
</div>
 