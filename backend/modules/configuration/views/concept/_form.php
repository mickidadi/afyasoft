<script type="text/javascript">
function loaddata(){
       
      document.getElementById("concept_set").style.display = "none";
	  document.getElementById("concept_numeric").style.display = "none";
      document.getElementById("concept_answer").style.display = "none";
       
 var datatype_id=document.getElementById('concept-datatype_id').value;
 var is_set=document.getElementById('concept-is_set').value;
      
   if(datatype_id==1){
      //document.getElementById("concept_set").style.display = "none";
	  document.getElementById("concept_numeric").style.display = "";
      document.getElementById("concept_answer").style.display = "none";
  
  }
   if(datatype_id==2){
      //document.getElementById("concept_set").style.display = "none";
	  document.getElementById("concept_numeric").style.display = "none";
      document.getElementById("concept_answer").style.display = "";
  
  }
  if(is_set==1){
      document.getElementById("concept_set").style.display = "";
	  ///document.getElementById("concept_numeric").style.display = "none";
      //document.getElementById("concept_answer").style.display = "none";
  }
 return false;
}

</script>
<?php 
 $script = <<< JS
    $(document).ready(function() {
                  loaddata();
              });
JS;
 $this->registerJs($script);
 
 ?>
<?php

use common\models\base\ConceptClass;
use common\models\base\ConceptDatatype;
use common\models\Concept;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;

/* @var $this yii\web\View */
/* @var $model  */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="birth-age-range-form">

   
    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]); ?>
<?php
echo Form::widget([
'model' => $model,
'form' => $form,
'columns' => 1,
'attributes' => [
    'concept_name_en'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter ...', 'maxlength'=>128]],
    'short_name'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter ...', 'maxlength'=>128]],
    'description'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter ...', 'maxlength'=>128]],
    'datatype_id' => ['type' => Form::INPUT_WIDGET,
    'staticValue' => '',
    'widgetClass' => \kartik\select2\Select2::className(),
     
      'options' => [
    
         'data' => \yii\helpers\ArrayHelper::map(ConceptDatatype::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
                  
    
        'options' => [
            'prompt' => 'Select ','onchange'=>"return loaddata()"
        //'disabled' => $model->isNewrecord ? false : true,
        ],
    ],
    ],
    'class_id' => ['type' => Form::INPUT_WIDGET,
'staticValue' => '',
'widgetClass' => \kartik\select2\Select2::className(),
 

            'options' => [

     'data' => \yii\helpers\ArrayHelper::map(ConceptClass::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
              

    'options' => [
        'prompt' => 'Select ',
    //'disabled' => $model->isNewrecord ? false : true,
    ],
],
],
  
  
      'is_set' => ['type' => \kartik\builder\Form::INPUT_DROPDOWN_LIST,
            'items' => ['1'=>'Yes','0' => 'No'],'options' => ['prompt' => 'Select','onchange'=>"return loaddata()"]],

]


]);
?>
<div id="concept_set" style="display:none">
<?php
echo Form::widget([
'model' => $model_concept_set,
'form' => $form,
'columns' => 1,
'attributes' => [
    'concept_id' => ['type' => Form::INPUT_WIDGET,
    'label'=>"Set Members",
    'staticValue' => '',
    'widgetClass' => \kartik\select2\Select2::className(),
     'options' => [
    
         'data' => \yii\helpers\ArrayHelper::map(Concept::find()->orderBy('concept_id')->asArray()->all(), 'concept_id', 'concept_name_en'),
                  
    
        'options' => [
            'prompt' => 'Select ',
            'multiple'=>true
        //'disabled' => $model->isNewrecord ? false : true,
        ],
    ],
    ],

]
]);
?>
</div>
<div id="concept_answer" style="display:none">
<?php
echo Form::widget([
'model' => $model_concept_answer,
'form' => $form,
'columns' => 1,
'attributes' => [
    'answer_concept' => ['type' => Form::INPUT_WIDGET,
    'staticValue' => '',
    'widgetClass' => \kartik\select2\Select2::className(),
     'options' => [
    
         'data' => \yii\helpers\ArrayHelper::map(Concept::find()->orderBy('concept_id')->asArray()->all(), 'concept_id', 'concept_name_en'),
                  
    
        'options' => [
            'prompt' => 'Select ',
            'multiple'=>true
        //'disabled' => $model->isNewrecord ? false : true,
        ],
    ],
    ],

]


]);
?>
</div>
<div id="concept_numeric" style="display:none">
<?php
echo Form::widget([
'model' => $model_concept_numeric,
'form' => $form,
'columns' => 3,
'attributes' => [
    'hi_absolute'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter ...', 'maxlength'=>128]],
    'hi_critical'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter ...', 'maxlength'=>128]],
    'hi_normal'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter ...', 'maxlength'=>128]],

    'low_absolute'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter ...', 'maxlength'=>128]],
    'low_critical'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter ...', 'maxlength'=>128]],
    'low_normal'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter ...', 'maxlength'=>128]],

    'units'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter ...', 'maxlength'=>128]],
    'precise'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter ...', 'maxlength'=>128]],
    'display_precision'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter ...', 'maxlength'=>128]],

]


]);
?>
</div>
  <div class="text-right">
    <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    <?php
      echo Html::resetButton('Reset', ['class' => 'btn btn-default']);
      echo Html::a("Cancel&nbsp;&nbsp;<span class='label label-warning'></span>", ['index'], ['class' => 'btn btn-warning']);?>
    <?php
    ActiveForm::end();
    ?>
</div>

