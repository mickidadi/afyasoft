<?php

use yii\helpers\Html;
use common\widgets\Alert;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\clinical\models\PatientConsultation */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="patient-consultation-form">
    
       <?= Alert::widget() ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>
 
    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'uuid')->label(false)->hiddenInput(['maxlength' => true,'value'=>$patient_uuid]) ?>
     

    <div class="form-group">
    
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
     
    </div>

    <?php ActiveForm::end(); ?>

</div>
