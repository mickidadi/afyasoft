<?php

use Yii;
use yii\helpers\Html;
use yii\web\JsExpression;
use common\models\Concept;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\modules\pharmancy\models\Drug;
$url = \yii\helpers\Url::to(['/clinical/default/drug-list']);
 
?>

<div class="bl-sale-quote-line-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>
    <div class="col-lg-12">
  <?php
   $dataList = Drug::find()->andWhere(['drug_id' => $model->item])->all();
   $data = ArrayHelper::map($dataList, 'drug_id', 'name');
    
   echo $form->field($model, 'item')->widget(Select2::classname(), [
       'data' => $data,
       'options' => ['multiple'=>false, 'placeholder' => 'Search for a Medication ...'],
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
  </div>
<div class="col-lg-4">
    <?= $form->field($model, 'dose')->textInput(['placeholder' => 'Dose']) ?>
          
<?= $form->field($model, 'frequency')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(Concept::getConceptAnswer(Yii::$app->params['concept_data']['dosagefrequency']), 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Frequency')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    </div>
<div class="col-lg-4">
 
    <?= $form->field($model, 'dose_units')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(Concept::getConceptSet(Yii::$app->params['concept_data']['dose_units']), 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose ')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
   <?= $form->field($model, 'route')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(Concept::getConceptSet(Yii::$app->params['concept_data']['drug_routes']), 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Route')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    </div>
<div class="col-lg-4">
    <?= $form->field($model, 'duration')->textInput(['placeholder' => 'Duration']) ?>
 
    <?= $form->field($model, 'duration_units')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(Concept::getConceptSet(Yii::$app->params['concept_data']['duration_units']), 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose ')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
   
 </div>
 <div class="col-lg-12">
 <?= $form->field($model, 'comment')->textarea(['rows' => 2]) ?>
    <div class="form-group">
    
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
     
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
</div>

 
