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
 
    <?= $form->field($model, 'dose')->textInput(['placeholder' => 'Dose']) ?>
  
 <?= $form->field($model, 'comment')->textarea(['rows' => 2]) ?>
    <div class="form-group">
    
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
     
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
</div>

 
