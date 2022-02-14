<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\clinical\models\PatientDiagnosis */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Patient Diagnosis',
]). ' ' . $model->patient_diagnosis_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Diagnosis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->patient_diagnosis_id, 'url' => ['view', 'id' => $model->patient_diagnosis_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="patient-diagnosis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
