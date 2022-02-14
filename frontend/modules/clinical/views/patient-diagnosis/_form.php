<?php

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\JsExpression;
use common\models\Concept;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\modules\clinical\models\PatientDiagnosis */
/* @var $form yii\widgets\ActiveForm */
// The controller action that will render the list
$url = \yii\helpers\Url::to(['/clinical/default/concept-list']);
?>

<div class="patient-diagnosis-form">
<div class="panel panel-info">
        <div class="panel-heading">
        
        </div>
        <div class="panel-body">
           
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-12">
    <div class="form-group pull-right">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    
    </div>
</div>
    <?= $form->errorSummary($model); ?>
    <div class="col-lg-6">
  <?php
   $dataList = Concept::find()->andWhere(['concept_id' => $model->concept_id])->all();
   $data = ArrayHelper::map($dataList, 'concept_id', 'concept_name_en');
    
   echo $form->field($model, 'concept_id')->widget(Select2::classname(), [
       'data' => $data,
       'options' => ['multiple'=>false, 'placeholder' => 'Search for a Diagnosis ...'],
       'pluginOptions' => [
           'allowClear' => true,
           'minimumInputLength' => 3,
           'language' => [
               'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
           ],
           'ajax' => [
               'url' => $url,
               'dataType' => 'json',
               'data' => new JsExpression('function(params) { return {q:params.term}; }')
           ],
           'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
           'templateResult' => new JsExpression('function(city) { return city.text; }'),
           'templateSelection' => new JsExpression('function (city) { return city.text; }'),
       ],
   ]);

  ?>
   
     <?= $form->field($model, 'orders')->widget(\kartik\widgets\Select2::classname(), [
        'data' => [1=>'Primary', 2=>' Secondary'],
        'options' => ['placeholder' => Yii::t('app', 'Choose ')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    </div>
    <div class="col-lg-6">
     <?= $form->field($model, 'certainty')->widget(\kartik\widgets\Select2::classname(), [
        'data' =>[1=>"Confirmed",2=>"Presumed"],
        'options' => ['placeholder' => Yii::t('app', 'Choose ')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    <?= $form->field($model, 'status')->widget(\kartik\widgets\Select2::classname(), [
        'data' =>[0=>"InActive",1=>"Active"],
        'options' => ['placeholder' => Yii::t('app', 'Choose ')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    </div>
    <div class="col-lg-12">
    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
    </div>
     
    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
