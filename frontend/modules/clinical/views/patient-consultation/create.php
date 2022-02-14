<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\clinical\models\PatientConsultation */

$this->title = Yii::t('app', 'Consultation Note');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Consultation'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-consultation-create">
<div class="panel panel-info">
        <div class="panel-heading">
         <?= Html::encode($this->title) ?><label class="pull-right" style="font-size:16px"></label>
        </div>
        <div class="panel-body">
              <div class="panel-body">  

    <?= $this->render('_form', [
        'model' => $model,
        'patient_uuid'=>$patient_uuid
    ]) ?>
<?= $this->render('index', [
        'patient_uuid'=>$patient_uuid
    ]) ?>
</div>
</div>
</div>
</div>

