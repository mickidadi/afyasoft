<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\modules\billing\models\BlFinancialPeriod */
/* @var $form yii\widgets\ActiveForm */

 
?>

<div class="bl-financial-period-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>
 
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

   
       <?= $form->field($model, 'start_date')->label(FALSE)->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         'class'=>'span8',
         // modify template for custom rendering
       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
         'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
             
        ]
]);?>
   <?= $form->field($model, 'end_date')->label(FALSE)->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         'class'=>'span8',
         // modify template for custom rendering
       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
         'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
             
        ]
]);?>
     <?= $form->field($model, 'status')->widget(\kartik\widgets\Select2::classname(), [
        'data' =>[0=>"InActive",1=>"Active"],
        'options' => ['placeholder' => Yii::t('app', 'Choose Status')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    <div class="form-group">
       <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
