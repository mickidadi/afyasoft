<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\clinical\models\PatientDiagnosis */

$this->title = Yii::t('app', 'Create Patient Diagnosis');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Diagnosis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-diagnosis-create">
<div class="panel panel-info">
        <div class="panel-heading">
         <?= Html::encode($this->title) ?><label class="pull-right" style="font-size:16px"></label>
        </div>
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