<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\registration\models\PatientSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'created_by') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_by') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'voided') ?>

    <?php // echo $form->field($model, 'voided_by') ?>

    <?php // echo $form->field($model, 'date_voided') ?>

    <?php // echo $form->field($model, 'void_reason') ?>

    <?php // echo $form->field($model, 'allergy_status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
