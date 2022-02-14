<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\clinical\models\PatientDiagnosis */

$this->title = Yii::t('app', 'Patient Condition');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Diagnosis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-diagnosis-create">
<div class="panel panel-info">
        <div class="panel-heading">
         <h2><?= Html::encode($this->title) ?><label class="pull-right" style="font-size:16px"></label></h2>
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