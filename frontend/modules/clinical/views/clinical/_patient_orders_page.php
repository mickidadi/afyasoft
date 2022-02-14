<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Concept;
?>
<div class="clearfix"></div>
<div class="x_content">
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-align-left"></i> Collapsible / Accordion <small></small></h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <?php $form = ActiveForm::begin(['method' => 'post']); ?>
                      <div class="form-group pull-right">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
        <input type="hidden" name="patient_uuid" value="<?=$patient_uuid?>">
    </div>
                  <div class="x_content">

                    <!-- start accordion -->
                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                      
                       <?php
                            // print_r(Yii::$app->params);
                       $orderable_model=Concept::getConceptSet(Yii::$app->params['concept_data']['allorderable']);
                        //print_r($orderable_model);
                         // exit();
                        foreach($orderable_model as $rows){
                          $name=$rows["name"];
                          $concept_id=$rows["id"];
                      echo '<div class="panel">
                        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne'.$concept_id.'" aria-expanded="true" aria-controls="collapseOne">
                          <h4 class="panel-title">'.$name.'</h4>
                        </a>
                        <div id="collapseOne'.$concept_id.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                          <div class="panel-body">';
                           echo $this->render('_order_page', [
                            'concept_id' => $concept_id,
                        ]);
                          echo '</div>
                        </div>
                      </div>';
                        }
                       ?>
  
                  </div>
                </div>
                <div class="form-group pull-right">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>
                <?php ActiveForm::end(); ?>
              </div>
              </div>
              </div>