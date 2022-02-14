<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\clinical\models\PatientConsultation */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Patient Consultation',
]). ' ' . $model->patient_consultation_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Consultation'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->patient_consultation_id, 'url' => ['view', 'id' => $model->patient_consultation_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="patient-consultation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
