<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\billing\models\PatientConsultationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-patient-consultation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'patient_consultation_id')->textInput(['placeholder' => 'Patient Consultation']) ?>

    <?= $form->field($model, 'visit_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\modules\clinical\models\Visit::find()->orderBy('visit_id')->asArray()->all(), 'visit_id', 'visit_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Visit')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'patient_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\modules\clinical\models\Patient::find()->orderBy('patient_id')->asArray()->all(), 'patient_id', 'patient_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Patient')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'uuid')->textInput(['maxlength' => true, 'placeholder' => 'Uuid']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
