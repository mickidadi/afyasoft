<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\clinical\models\PatientCondition */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Patient Condition',
]) . ' ' . $model->patient_diagnosis_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Condition'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->patient_diagnosis_id, 'url' => ['view', 'id' => $model->patient_diagnosis_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="patient-condition-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
