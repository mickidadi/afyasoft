<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\clinical\models\PatientDiagnosisSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-patient-condition-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'patient_diagnosis_id')->textInput(['placeholder' => 'Patient Diagnosis']) ?>

    <?= $form->field($model, 'patient_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\modules\clinical\models\Patient::find()->orderBy('patient_id')->asArray()->all(), 'patient_id', 'patient_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Patient')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'visit_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\modules\clinical\models\Visit::find()->orderBy('visit_id')->asArray()->all(), 'visit_id', 'visit_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Visit')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'concept_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\modules\clinical\models\Concept::find()->orderBy('concept_id')->asArray()->all(), 'concept_id', 'concept_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Concept')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'orders')->textInput(['placeholder' => 'Orders']) ?>

    <?php /* echo $form->field($model, 'certainty')->textInput(['placeholder' => 'Certainty']) */ ?>

    <?php /* echo $form->field($model, 'comment')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'condition_date')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Condition Date'),
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'status')->textInput(['placeholder' => 'Status']) */ ?>

    <?php /* echo $form->field($model, 'uuid')->textInput(['maxlength' => true, 'placeholder' => 'Uuid']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
