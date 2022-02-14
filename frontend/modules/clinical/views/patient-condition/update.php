<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\clinical\models\PatientDiagnosis */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Patient Diagnosis',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Diagnosis'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->patient_diagnosis_id, 'url' => ['view', 'id' => $model->patient_diagnosis_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="patient-diagnosis-update">
<div class="panel panel-info">
        <div class="panel-heading">
         <?= Html::encode($this->title) ?><label class="pull-right" style="font-size:16px"></label>
        </div>
        <div class="panel-body">
              <div class="panel-body"> 
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>