<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\clinical\models\PatientConsultation */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Patient Consultation Note',
]);
 
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="patient-consultation-update">
<div class="panel panel-info">
        <div class="panel-heading">
         <?= Html::encode($this->title) ?><label class="pull-right" style="font-size:16px"></label>
        </div>
        <div class="panel-body">
              <div class="panel-body"> 
    <?= $this->render('_form_update', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>