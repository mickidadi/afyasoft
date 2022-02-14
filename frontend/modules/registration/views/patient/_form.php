<?php

use common\models\base\VisitType;
use common\models\Concept;
use common\models\Location;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Patient */
/* @var $form yii\widgets\ActiveForm */
//print_r($model);
//find insurance type
$insurance_type=Concept::getConceptAnswer(6217);
//end find 
//find clinic name
$clinic_name=Concept::getConceptAnswer(10001);
//end find 
//start  payment scheme 10004
$track_scheme=Concept::getConceptAnswer(10004);
//end find 
//start visit type
$visit_type=VisitType::find()->asArray()->all();
//end

 
?>
<script>
 
function checkservice(data){
     //alert(data.value);
   var status=data.value;
      if(status==1||status==3){
        $("#clinic_name_id").hide();
      }else if(status==2){
        $("#clinic_name_id").show();
      }
         
}

function checkpayment(data){
   //alert(data.value); payment_scheme_id
   var status=data.value;
      if(status==4030){
        $("#insurance_type_id").hide();
        $("#insurance_number_id").hide();
        $("#payment_scheme_id").show();
      }else if(status==4031){
        $("#insurance_type_id").show();
        //insurance_number_id
        $("#insurance_number_id").show();
        $("#payment_scheme_id").hide();
      }
         
}
function loadroom(){
    /*swal({
                        title: 'Good job!',
                        text: "Data Saved Successfully!",
                        type: 'success',
                        padding: '2em'
                    });*/
                //    alert("alert");
         $.ajax({
            type: 'post',
            url: "<?php echo \Yii::$app->getUrlManager()->createUrl('/registration/default/room-status')  ; ?>",
            data: {room_id:67},
            success: function (data) {
                $('#room_status_id').html(data);
                return false;  
            }
          });
}
function loadmessage(){
    swal({
                        title: 'Good job!',
                        text: "Data Saved Successfully!",
                        type: 'success',
                        padding: '2em'
                    });
}
</script>
<?php
    if($action==200){
$script = <<< JS
    $(document).ready(function() {
     
        loadmessage();
                      
              });
JS;
$this->registerJs($script);
            }
       
$script = <<< JS
    $(document).ready(function() {
     
        loadroom();
            
              });
JS;
$this->registerJs($script);
         ?>
<div class="patient-form">

<?php $form = ActiveForm::begin(['action' => ['create'],
                                                    'options' => [
                                                        "class"=>"needs-validation",
                                                        "novalidate"=>"novalidate",
                                                        'id' => 'create_patient_id'
                                                        
                                                    ]
                                                ]);
                                              // print_r($model->errors); 
                                                ?>
    <div class="form-row">
        <div class="col-md-6 mb-12">
          
           <?= $form->field($model, 'given_name')->textInput(['maxlength' => true,'class'=>'form-control form-control-sm']) ?>
           <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true,'class'=>'form-control form-control-sm']) ?>
           <?= $form->field($model, 'family_name')->textInput(['maxlength' => true,'class'=>'form-control form-control-sm']) ?>
           
           <?= $form->field($model, 'gender')->widget(\kartik\widgets\Select2::classname(), [
        'data' =>["M"=>"Male","F"=>"Female","O"=>"Other"],
        'options' => ['placeholder' => Yii::t('app', 'Choose Gender')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
          <?= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>
      
           
         <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
             
         </div> 
         <div class="col-md-6 mb-12">
             <div id="room_status_id">
             </div>
           </div>
           <div class="col-md-12 mb-12">
         <div class="col-md-12 mb-12">
         <?= $form->field($model, 'living_place')->textInput(['maxlength' => true,"id"=>"validationTooltip011"]) ?>
        
        <?= $form->field($model, 'visit_type')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map($visit_type, 'visit_type_id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Visit Type')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
           
        </div>
        <div class="col-md-12 mb-12">
        <?= $form->field($model, 'opd_service')->widget(\kartik\widgets\Select2::classname(), [
        'data' => [1=>"General OPD",2=>"Specialized Clinic",3=>"Diagnostic Service"],
        'options' => ['placeholder' => Yii::t('app', 'Choose Service'),'onchange'=>"return checkservice(this)"],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
       
        </div>
        <div class="col-md-12 mb-12" id="clinic_name_id" style="display:none">
        
        <?= $form->field($model, 'clinic_name')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map($clinic_name, 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Clinic')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
        
       
        </div>
        <div class="col-md-12 mb-12">
        <?= $form->field($model, 'payment_category_concept_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => ["4030"=>"Cash","4031"=>"Insurance"],
        'options' => ['placeholder' => Yii::t('app', 'Choose Payment Category'),"onchange"=>"return checkpayment(this)"],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
        
        </div>
        <div class="col-md-12 mb-12" id="insurance_type_id" style="display:none">
        
        <?= $form->field($model, 'insurance_concept_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map($insurance_type, 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Insurance Type')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
        
        </div>
        <div class="col-md-12 mb-12" id="insurance_number_id" style="display:none">
            <label for="validationTooltip01">Insurance Number</label>
           <?= $form->field($model, 'insurance_number')->label(false)->textInput(['maxlength' => true,"id"=>"validationTooltip011"]) ?>
            
        </div>
        <div class="col-md-12 mb-12" id="payment_scheme_id"style="display:none">
        <?= $form->field($model, 'track_scheme_concept_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map($track_scheme, 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Track Scheme')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
        </div>
        <div class="col-md-12 mb-12">
       
    <?= $form->field($model, 'room')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Location::find()->where(["parent_location"=>133])->orderBy('location_id')->asArray()->all(), 'location_id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Location')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
        </div>
    
  
    <?php //= $form->field($model, 'insurance_number')->textInput(['maxlength' => true]) ?>

    <div class="form-group text-right">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>